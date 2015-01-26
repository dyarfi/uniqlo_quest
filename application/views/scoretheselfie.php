<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script type="text/javascript">
      window.onload = function() {
        FB.Canvas.setSize({ width: 810, height: 1100 });
    }
</script>
	<section id="content" class="galeri">
    <div class="cover">
    <div class="head_tit galeri"></div>
    <div class="listcen">
    	<div class="cont">         
        <div class="row clearfix">
          <div class="navigasi">
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
          foreach ($tweets as $val) { ?>
    			<div class="col-xs-4 col-md-4">                  
    				<div class="thumbnail">					
    					<?php
    						$pathinfo	= pathinfo($val->file_name);
    						$thumb		= $pathinfo['filename'].'_thumb.'.$pathinfo['extension'];
    					?>
    					<a href="<?=base_url();?>uploads/gallery/<?=$val->file_name?>" class="fancybox" title="<?//=$val->name;?>" rel="gallery">
    						<img src="<?=base_url();?>uploads/gallery/<?=$thumb?>" alt="<?//=$val->name;?>" />
    					</a>
    				</div>
    				<div class="bottomleft"><?=$this->user_model->get_user($val->part_id)->name;?>
              <?php if ($user_id == $val->part_id) { ?>
              <i class="glyphicon glyphicon-heart pull-right">
                <span class="hit"><?=$this->gallery_model->check_score($val->part_id, $val->id);?></span>
              </i>              
    				  <?php } else { ?>
              <a href="javascript:;" class="btn-hit" data-toggle="tooltip" data-placement="bottom">
                <i class="glyphicon glyphicon-heart pull-right">
                  <span class="hit"><?=$this->gallery_model->check_score($val->part_id, $val->id);?></span>
                </i>
              </a>
              <?php } ?>
    				</div>
    			</div>
    			<?php } ?>					  				
        </div>


        <div class="posit2">
            <?php echo $links; ?> 
            <!--ul class="pagination">
              <li><a href="#"><i class="glyphicon glyphicon-chevron-left"></i> Sebelumnya</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">Selanjutnya <i class="glyphicon glyphicon-chevron-right"></i></a></li>
            </ul-->
        </div>


        </div>
    </div>
    </div>
    <div class="atas posit2 text-center">
			<a class="btn btn-primary btn-lg" role="button" href="<?=base_url('upload?data='.$this->input->get('data'));?>">IKUTAN SEKARANG</a>
	</div>
	</section>