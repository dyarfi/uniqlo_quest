<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6 oldie" lang="en"> <![endif]--> 
<!--[if IE 7 ]>    <html class="no-js ie7 oldie" lang="en"> <![endif]--> 
<!--[if IE 8 ]>    <html class="no-js ie8 oldie" lang="en"> <![endif]--> 
<!--[if IE 9 ]>    <html class="no-js ie9" lang="en"> <![endif]--> 
<!--[if (gte IE 10)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]--> 
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<meta name="description" content="Deskripsi" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Facebook Share -->
	<meta property="og:title" content="Title share di Facebook"/>
	<meta property="og:description" content="Deskripsi share di Facebook" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="_URL" />
	<meta property="og:image" content="_URL_THUMB_" />		
	
    <link href="<?=base_url();?>assets/public/img/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/public/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/public/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/public/css/style.css" />
	
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/public/css/fancybox/jquery.fancybox.css" />


    <!--[if IE]>
      <script src="<?=base_url();?>assets/public/js/html5shiv.js"></script>
      <script src="<?=base_url();?>assets/public/js/respond.min.js"></script>
    <![endif]-->
    
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/modernizr.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/selectivizr.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/bootstrap.min.js"></script>	
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.fancybox.pack.js"></script>
	<!--<script type="text/javascript" src="<?=base_url();?>assets/public/js/SimpleAjaxUploader.min.js"></script>-->
	
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.ui.widget.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.fileupload-process.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/public/js/jquery.fileupload-validate.js"></script>

	<script type="text/javascript" src="<?=base_url();?>assets/public/js/imagesloaded.pkgd.min.js"></script>
	
	<script type="text/javascript">
		var base_URL = '<?php echo base_url();?>';
	</script>
</head>
<body>
<div id="fb-root"></div>
<script src="https://connect.facebook.net/en_US/all.js"></script>
<script>
	FB.init({
	appId : '384917901668087',
	status : false, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml : true // parse XFBML
	});
</script>

<div id="wrapper">
	<div class="container">		
	<?php $this->load->view('template/public/header'); ?>			
	<?php $this->load->view('template/public/navigation'); ?>	
		<div id="main">
			<div class="messageFlash">
				<?php $this->load->view('flashdata'); ?>
			</div>
			<div class="content">
				<?php $this->load->view($main); ?>
			</div>
		</div>	
	<?php $this->load->view('template/public/footer'); ?>
	</div>
</div><!-- End Wrapper -->
<script type="text/javascript" src="<?=base_url();?>assets/public/js/main.js"></script>
</body>
</html>
