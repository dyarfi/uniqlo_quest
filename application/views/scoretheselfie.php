<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript">
      window.onload = function() {
        FB.Canvas.setSize({ width: 810, height: 974 });
    }
</script>
      <section id="content" class="galeri">
      <img class="img-responsive img-center copy-twitter" src="<?php echo base_url('assets/public/img/galeri-tambahan.jpg');?>" alt="copy twitter"/>
    <div class="cover">
    <div class="head_tit galeri"></div>
    <div class="listcen">
    	<div class="cont">         
        <div class="row clearfix">
          <div class="navigasi hidden">
          <div class="btn-group">
            <div class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
              Sort by <span class="caret"></span>
            </div>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
            </ul>
          </div>
              <div class="btn-group"><input type="text" class="form-control2" placeholder="Participant"></div>          
          </div>

    			<?php 
          if (!empty($tweets)) {
          foreach ($tweets as $val) { ?>
    			<div class="col-xs-4 col-md-4">                  
    				<div class="thumbnail">
              <?php if (!empty($val['tweet_img'])) { ?>
    					<a href="<?php echo 'https://twitter.com/'.$val['tweet_user'].'/status/'.$val['tweet_id'];?>" target="_blank" title="<?=$val['tweet_user'];?>" rel="gallery">
    						<img src="<?php echo $val['tweet_img'];?>" alt="<?=$val['tweet_user'];?>" />
    					</a>
              <?php } else { ?>
              <div class="twitter-head" data-url="<?php echo 'https://twitter.com/'.$val['tweet_user'].'/status/'.$val['tweet_id'];?>">
                <h5 class="twitter-text"><?=$val['tweet_text'];?></h5>
              </div>
              <?php } ?>
    				</div>
    				<div class="bottomleft"><?=$val['tweet_user'];?>
              <i class="glyphicon glyphicon-heart pull-right"></i>              
              <span class="hit"><?=$val['favorite_count'];?></span>
    				</div>
    			</div>
    			<?php } 
          } else {
          ?>			
            <h2>Maaf, belum tersedia</h2>
            <br/><br/><br/><br/><br/><br/><br/><br/>
          <?php } ?>		  				
        </div>


        <div class="posit2">            
            <?php echo $links; ?>           
            <div class="clear"></div>
        </div>


        </div>
    </div>
    </div>
    <!--div class="atas posit2 text-center">
			<a class="btn btn-primary btn-lg" role="button" href="<?=base_url('upload?data='.$this->input->get('data'));?>">IKUTAN SEKARANG</a>
	  </div-->
	</section>