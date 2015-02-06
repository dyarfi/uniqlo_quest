$(document).ready(function() {

	$(".colorbox").colorbox({
		rel: 'nofollow',
		width:'640',
		maxWidth:'640px',
		innerWidth:'640px',
		/*
		title:function() {
			var ids = $(this).attr('data-id');
			var cnt = $(this).attr('data-int');
   			var txt = $(this).attr('title');
   			var descs = 'asdfsadf asdfsadf asdfasdf sadfasd';
   			var url = 'https://www.facebook.com/PanasonicIndonesia/app_384917901668087';
   			var html ='<div class="pull-left"><a href="#" class="shareit facebook" rel="facebook"></a></div><div class="col-xs-5">'+ids+'<div class="pull-right">'+cnt+'<i class="glyphicon glyphicon-heart pull-right"></i></div></div>'
   						+'<div class="pull-right"><a href="#" class="shareit twitter" rel="twitter"></a></div>';
   			return html;
		},
		*/
	});

	$('.twitter-head').hover(function() {
		$(this).attr('style','cursor:pointer');
	});

	$('.twitter-head').click(function() {
		var link = $(this).attr('data-url');
		window.open(link,'_blank')
	});

	$('.btn-hit').click(function() {
		var ahf = $(this);
		var img = $(this).attr('rel');
		var uri = $(this).attr('data-url');
		var ref = $(this).attr('data-ref');		
		var span = $(this).find('span.hit');
		var srel = span.attr('rel');
		$.ajax({
			url  : uri,
			dataType: 'json',
			type : 'POST',
			data : {'image':img},
		}).done(function(msg) {
			//var val = jQuery.parseJSON(msg);
			console.log(msg);
			if (msg == true) {
				// Redirect after request language
				$('.modal-message').modal('show');
				var hit = span.text();
				console.log(hit++);
				$('span.hit[rel="'+srel+'"]').text(hit++);
				ahf.attr('style','pointer-events: none;');
				//location.href = ref;
			}
		});
	});

	$('.progress').hide();	

	$('#fileupload').fileupload({
		url: $(this).attr('data-url'),
		dataType: 'json',
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		maxFileSize:500000, // 500 KB
		sequentialUploads: false,
        done: function (e, data) {
			e.preventDefault();
			$.each(data.result.files, function (index, file) {	
				//alert(file.error);
				$('.clear .topBotDiv10').html('<h2>Sukses</h2>').show();
				
				$('.img-thumbnail a.colorbox')
				.prop('href',base_URL + file.url).empty()
				.html('<img src="'+base_URL + file.thumbnailUrl+'"//>');

				$('input[name="image_temp"]').attr('value',file.name);
            });			
			$('.clear.topBotDiv10').html('<h2>Sukses</h2>').hide();
			$('.progress').hide();			
			$('.button-submit').show();
        },
        progressall: function (e, data) {
			e.preventDefault();			
            var progress = parseInt(data.loaded / data.total * 100, 10);
			$('.progress').show();
            $('.progress .progress-bar').css(
                'width',
                progress + '%'
            ).html(progress+'% Sedang mengunggah, mohon menunggu..');
            $('.button-submit').hide();
        }
    })
	.on('fileuploadfail', function (e, data) {
        $.each(data.files, function (index) {
        	var error = $('<span class="text-danger"/>').text('File upload failed.');
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
            console.log(files);
        })
    })
	.prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
    $('select[name="sort"]').change(function() {
    	var varb = $(this).val();
    	$.ajax({
		  	data: $(this).serializeArray(),
		}).done(function(msg) {
			var redirect = $(location).attr('href');
			var val = jQuery.parseJSON(msg);
			// Redirect after request language
			if (varb != '') {
				location.href = val.url;
			}
		});
    });

});