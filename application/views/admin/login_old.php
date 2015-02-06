<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <!-- Viewport metatags -->
        <meta name="HandheldFriendly" content="true" />
        <meta name="MobileOptimized" content="320" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- iOS webapp metatags -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />

        <!-- iOS webapp icons -->
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/grocery_crud/images/touch-icon-iphone.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/grocery_crud/images/touch-icon-ipad.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/grocery_crud/images/touch-icon-retina.png" />

        <!-- CSS Reset -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/reset.css" media="screen" />
        <!--  Fluid Grid System -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/fluid.css" media="screen" />
        <!-- Login Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/login.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/css/apprise.min.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>assets/grocery_crud/js/apprise-1.5.min.js"></script>

        <!-- Required JavaScript Files -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/grocery_crud/js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/grocery_crud/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/grocery_crud/js/jquery.validate.min.js"></script>

        <!-- Core JavaScript Files -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/grocery_crud/js/dandelion.login.js"></script>

        <title>Admin Login</title>

    </head>

    <body>
        <?php if ($this->session->flashdata('error') != '') { ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    apprise('<?php echo $this->session->flashdata('error') ?>');
                });
            </script>
        <?php } ?>

        <div id="da-login">
            <div id="da-login-box-wrapper">
                <div align="center">  <img src="<?php echo base_url() ?>assets/img/logo.png"/></div>
                <div id="da-login-top-shadow">
                </div>
                <div id="da-login-box">
                    <div id="da-login-box-header">
                        <h1>Login</h1>
                    </div>
                    <div id="da-login-box-content">
                        <form id="da-login-form" method="post" action="<?php echo base_url() ?>admin/home/do_login">
                            <div id="da-login-input-wrapper">
                                <div class="da-login-input">
                                    <input type="text" name="username" id="da-login-username" placeholder="Username" />
                                </div>
                                <div class="da-login-input">
                                    <input type="password" name="password" id="da-login-password" placeholder="Password" />
                                </div>
                            </div>
                            <div id="da-login-button">
                                <input type="submit" value="Login" id="da-login-submit" />
                            </div>
                        </form>
                    </div>
                    <div id="da-login-box-footer">
                        <div id="da-login-tape"></div>
                    </div>
                </div>
                <div id="da-login-bottom-shadow">
                </div>
            </div>
        </div>

    </body>
</html>
