<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    window.onload = function() {
        FB.Canvas.setSize({ width: 810, height: 752 });
    }
</script>
<section id="content" class="thanks">
	<?=form_open_multipart(base_url('home/register'),array('id'=>'register'));?>
	<input type="hidden" name="picture_url" value="<?php echo @$user_fb->fb_pic ?>"/>
	<input type="hidden" name="fb_id" value="<?php echo @$user_fb->fb_id ?>"/>
	<div class="cover">
		<div class="head_tit regist"></div>
		<div class="listcen">
			<div class="cont text-center">
				<h3 class="text-center">Masukkan data diri untuk mulai bermain.</h3>
				<img src="<?=base_url();?>assets/public/img/regist.png" alt="" />
				<div class="form_G">
					<div class="input-group input-group-lg pull-right">
						<input type="text" class="form-control" placeholder="Nama" value="<?php echo set_value('name', @$user_fb->fb_name) ?>" name="name" required>
					</div>
					<div class="input-group input-group-lg pull-right">
						<input type="text" class="form-control" placeholder="Alamat" value="<?php echo set_value('address', @$user_fb->address) ?>" name="address" required>
					</div>
					<div class="input-group input-group-lg pull-right">
						<input type="text" class="form-control" placeholder="E-mail" value="<?php echo set_value('email', @$user_fb->fb_email) ?>" name="email" required>
					</div>
					<div class="input-group input-group-lg pull-right">
						<input type="text" class="form-control" placeholder="No. Telp" value="<?php echo set_value('phone', @$user_fb->phone) ?>" name="phone">
					</div>   
					<div class="input-group input-group-lg pull-right">
						<input type="text" class="form-control" placeholder="Twitter" value="<?php echo set_value('twitter', @$user_fb->twitter) ?>" name="twitter" required>
					</div>                                   
				</div>
				<div class="row">
				  <div class="col-lg-12 kiri">
					<div class="input-group">
					  <span class="input-group-addon">
						<input type="checkbox" name="checkbox_rules" required="required">
					  </span>
					  <h3>Saya sudah menyetujui syarat dan ketentuan yang berlaku.*</h3>
					</div>
					<div class="input-group">
					  <span class="input-group-addon">
						<input type="checkbox" name="checkbox_data" required="required">
					  </span>
					  <h3>Data yang saya masukkan adalah benar.*</h3>
					</div>         
				  </div>
				</div>        
			</div>
		</div>
	</div>
	<div class="error-form" style="width:50%; margin:0 auto">
		<?php echo validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
	</div>
	<div class="atas posit2 text-center"><button type="submit" class="btn btn-primary btn-lg" role="button">DAFTAR</button></div>
	<?=form_close();?>
</section>