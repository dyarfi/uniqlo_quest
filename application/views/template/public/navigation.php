<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<nav class="navbar navbar-default navbar-static-top " role="navigation">    
	<div class="navbar-header">
		<div class="brand">
        	<a href="<?=base_url();?>"><img class="img-responsive" src="<?=base_url();?>assets/img/logo.png" alt=""/></a>
    	</div>
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
		<ul class="nav navbar-nav pull-right">
		  <li <?=($this->uri->segment(1)==''||$this->uri->segment(1)=='register'||$this->uri->segment(1)=='terms'||$this->uri->segment(1)=='participant') ? 'class="active"' :''; ?>><a href="<?=base_url();?>">HOME</a></li>
		  <li <?=($this->uri->segment(1)=='mechanism') ? 'class="active"' :''; ?>><a href="<?=base_url('mechanism');?>">MECHANISM</a></li>
		  <li <?=($this->uri->segment(1)=='gallery' || $this->uri->segment(1)=='upload') ? 'class="active"' :''; ?>><a href="<?=base_url('gallery');?>">GALLERY</a></li>
		</ul>  
	</div>	
</nav>
<div class="clear"></div>