<?php include("include/header.php"); ?>	
<script type="text/javascript">
      window.onload = function() {
        FB.Canvas.setSize({ width: 810, height: 752 });
    }
</script>
<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

	<section id="content" class="thanks">
    <div class="cover">
    <div class="head_tit regist"></div>
    <div class="listcen">
    	<div class="cont">
         	<h3 class="text-center">Masukkan data diri untuk mulai bermain.<br /><br />
			<img src="assets/img/regist.png" alt="" />
        <div class="form_G">
            <div class="input-group input-group-lg  pull-right">
                <input type="text" class="form-control" placeholder="Nama" value="" required>
            </div>
            <div class="input-group input-group-lg  pull-right">
                <input type="text" class="form-control" placeholder="Alamat" value="" required>
            </div>
            <div class="input-group input-group-lg  pull-right">
                <input type="text" class="form-control" placeholder="E-mail" value="" required>
            </div>
            <div class="input-group input-group-lg  pull-right">
                <input type="text" class="form-control" placeholder="No. Telp" value="" required>
            </div>   
            <div class="input-group input-group-lg  pull-right">
                <input type="text" class="form-control" placeholder="Twitter" value="" required>
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
    <div class="atas posit2 text-center">
			<a class="btn btn-primary btn-lg" role="button" href="#">DAFTAR</a>
	</div>
	</section>
<?php include("include/footer.php"); ?>