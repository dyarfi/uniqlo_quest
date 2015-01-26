<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?=$this->config->item('developer_name');?> | Login Form 2014</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?=admin_theme()?>assets/admin/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?=admin_theme()?>assets/admin/plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="<?=admin_theme()?>assets/admin/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?=admin_theme()?>assets/admin/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="<?=admin_theme()?>assets/admin/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
<script>base_URL = '<?=base_url()?>';</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="<?php echo base_url();?>">
		<img src="<?=admin_theme()?>assets/admin/img/dentsu.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<div class="messageFlash">
		<?php $this->load->view('flashdata'); ?>
	</div>
	<?php $this->load->view($main); ?>
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="logo">
	<div class="copyright">
		 <?php $this->load->view('template/admin/footer'); ?>
	</div>
</div>	
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="<?=admin_theme()?>assets/admin/plugins/respond.min.js"></script>
	<script src="<?=admin_theme()?>assets/admin/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="<?=admin_theme()?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?=admin_theme()?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=admin_theme()?>assets/admin/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?=admin_theme()?>assets/admin/scripts/core/app.js" type="text/javascript"></script>
<script src="<?=admin_theme()?>assets/admin/scripts/custom/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {     
	  App.init();
	  Login.init();
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>