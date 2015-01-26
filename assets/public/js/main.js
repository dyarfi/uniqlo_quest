$(document).ready(function() {
	
	var imgLoad = imagesLoaded('.galeri');
	
	imgLoad.on( 'always', function() {
		//console.log( imgLoad.images.length + ' images loaded' );
		
		// detect which image is broken
		for ( var i = 0, len = imgLoad.images.length; i < len; i++ ) {
		  var image = imgLoad.images[i];
		  var result = image.isLoaded ? 'loaded' : 'broken';
		  //console.log( 'image is ' + result + ' for ' + image.img.src );
		}
	});
	
	imgLoad.on( 'done', function() {
		
		//var loaded = base_URL + 'public/img/ajax-loading.gif';
		//var imaged = image.img.src;
		//alert(image.img.src);
		
		//image.img.src = base_URL + 'assets/public/img/ajax-loading.gif';
		
	});
	
	imgLoad.on( 'progress', function(instance, image) {
		
		var loaded = base_URL + 'assets/public/img/ajax-loading.gif';
		var imaged = image.img.src;
		
		//image.img.src = (imaged) ? imaged : loaded;
		
		//image.before('<div class="asdf"></div>');
		
		//console.log(loaded);
		
		//console.log(image.img.src);
		
	});

	// Plugin
	$(".fancybox").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none',
		helpers : {
    		title : {
    			type : 'over'
    		}
    	}
	});
	
	$('a.fancybox[rel="gallery"]').bind('click',function(e){
		// prevent default behaviour
		e.preventDefault();		
		$.fancybox({
			'autoResize'	: true,
			'aspectRatio'	: true,
			'titleShow'     : false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic',
			'easingIn'      : 'easeOutBack',
			'easingOut'     : 'easeInBack'
		});
		//return false;
	});
	$('.progress').hide();	
	$('#fileupload').fileupload({
		url: $(this).attr('data-url'),
		dataType: 'json',
		acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
		sequentialUploads: false,
        done: function (e, data) {
			e.preventDefault();
			$.each(data.result.files, function (index, file) {	
				//alert(file.error);
				$('.clear .topBotDiv10').html('<h2>Sukses</h2>').show();
				
				$('.img-thumbnail a.fancybox')
				.prop('href',base_URL + file.url).empty()
				.html('<img src="'+base_URL + file.thumbnailUrl+'"//>');

				$('input[name="image_temp"]').attr('value',file.name);
            });			
			$('.clear.topBotDiv10').html('<h2>Sukses</h2>').hide();
			$('.progress').hide();			
        },
        progressall: function (e, data) {
			e.preventDefault();			
            var progress = parseInt(data.loaded / data.total * 100, 10);
			$('.progress').show();
            $('.progress .progress-bar').css(
                'width',
                progress + '%'
            ).html(progress+'% Sedang mengunggah, mohon sabar..');
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	
});