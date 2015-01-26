<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<nav class="navbar navbar-default navbar-static-top " role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
    <div class="navbar navbar-header pull-right">
        <a href="<?=base_url();?>"><img class="navbar-brand"  src="<?=base_url();?>assets/public/img/logo.png" alt=""/></a>
    </div>
	<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		<ul class="nav navbar-nav pull-right">
		  <li <?=(uri_string()==''||uri_string()=='register'||uri_string()=='terms') ? 'class="active"' :''; ?>><a href="<?=base_url();?>">HOME</a></li>
		  <li <?=(uri_string()=='mechanism') ? 'class="active"' :''; ?>><a href="<?=base_url('mechanism');?>">MECHANISM</a></li>
		  <li <?=(uri_string()=='gallery' || uri_string()=='upload') ? 'class="active"' :''; ?>><a href="<?=base_url('gallery');?>">GALLERY</a></li>
		</ul>
	</div>	
</nav>