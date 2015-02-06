<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript">
      window.onload = function() {
        FB.Canvas.setSize({ width: 810, height: 700 });
    }
</script>
<section id="content">
<div class="cover">
<div class="head_tit upload"></div>
<?=form_open_multipart(base_url('upload/selfie?data='.$this->input->get('data', TRUE)), array('id'=>'fileUploadForm'));?>
<div class="listcen">
	<div class="cont">
		<div id="sizeBox">
			
		</div>
		<p class="text-center posit2">
			
			<div class="img_holder_xhr text-center">				
				<div class="img-thumbnail">
					<a class="colorbox" href="<?=base_url();?>assets/public/img/unggah.jpg">
						<img src="<?=base_url();?>assets/public/img/unggah.jpg" alt="" />
					</a>	
				</div>
			</div>
			
		</p>
		<div class="text-center">
			<!-- The global progress bar -->
			<div id="progress" class="progress" style="display:block">
				<div class="progress-bar progress-bar-danger"></div>
			</div>
			
			<div class="clear topBotDiv10"></div>

			<div class="center-block">
				<div class="fileUpload btn btn-primary btn-md center-block">
					<span>Browse</span>
					<input class="upload" type="file" id="fileupload" name="fileupload" data-url="<?=base_url('upload/image');?>">
				</div>
			</div>
			<input type="hidden" name="image_temp" value=""> 
		</div>
		<div>
		<h3 class="text-center popupload">Tunjukkan Ekspresi kamu dari serunya pertandingan<br />
		Persija VS Gamba Osaka di stadion Gelora Bung Karno - Jakarta.<br />
		Setiap peserta boleh mengirimkan lebih dari 1 (satu) foto.</h3>
		</div>	
	</div>
</div>
</div>
<div class="atas">
	<div class="text-center button-submit" style="display:none">
		<button class="btn btn-primary btn-lg" role="button">KIRIM</button>
	</div>
</div>
<?=form_close();?>
</section>