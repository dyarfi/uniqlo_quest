<div id="fb-root"></div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/public/js/jquery.min.js"></script>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '<?php echo $this->config->item('appId') ?>', // App ID from the app dashboard
            status: true, // Check Facebook Login status
            cookie: false                                  // Look for social plugins on the page
        });
        FB.login(function(response) {
            // handle the response
            if (response.status == 'connected') {
                var url = '<?php echo base_url() ?>';
                var form = $('<form action="' + url + '" method="post">' +
                        '<input type="hidden" name="signed_request" value="' + response.authResponse.signedRequest + '" />' +
                        '<input type="hidden" name="liked" value="1" />' +
                        '</form>');
                $('body').append(form);
                $(form).submit();
            } else {
                top.location.reload();
            }
            console.log(response);
        }, {scope: 'read_stream,email'});
        // Additional initialization code here
    };

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>