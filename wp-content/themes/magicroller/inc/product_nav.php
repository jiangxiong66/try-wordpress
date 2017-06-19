  <?php
                    $picss=get_option('mytheme_picss'); 
				   
				     $pic1=get_option('mytheme_pic1'); 
					 $pic_content1=get_option('mytheme_pic_content1'); 
					 $pic_link1=get_option('mytheme_pic_link1'); 
					 
					 $pic_move1=get_option('mytheme_pic_move1');  
					 
					  $pic2=get_option('mytheme_pic2'); 
					 $pic_content2=get_option('mytheme_pic_content2'); 
					 $pic_link2=get_option('mytheme_pic_link2'); 
					
					  $pic_move2=get_option('mytheme_pic_move2');
					 
					  $pic3=get_option('mytheme_pic3'); 
					 $pic_content3=get_option('mytheme_pic_content3'); 
					 $pic_link3=get_option('mytheme_pic_link3'); 
					
					  $pic_move3=get_option('mytheme_pic_move3');
					  
					  $pic4=get_option('mytheme_pic4'); 
					 $pic_content4=get_option('mytheme_pic_content4'); 
					 $pic_link4=get_option('mytheme_pic_link4'); 
					
					  $pic_move4=get_option('mytheme_pic_move4');
					  
					  $picss=get_option('mytheme_picss'); 
					
					 ?>
<div class="heaer_nav_drog" id="product_nav">
               
               <div class="header_nav_drog_in" >
               
              <div class="nav_pic_swiper" <?php if($picss){echo 'style="max-height:'.$picss.'px;"';} ?> >
                    <div class="swiper-wrapper">
                   <?php if($pic1){ ?>    <div class="swiper-slide"> <a  <?php echo 'href="'.$pic_link1.'" target="_blank"'; ?> href="#"><img alt="<?php echo $pic_content1 ;?>"  src="<?php echo $pic1 ;?>" /> </a></div>  <?php } ?>
                   <?php if($pic2){ ?>    <div class="swiper-slide"> <a  <?php echo 'href="'.$pic_link2.'" target="_blank"'; ?> href="#"><img alt="<?php echo $pic_content2 ;?>"  src="<?php echo $pic2 ;?>" /> </a></div>  <?php } ?>
                   
                   <?php if($pic3){ ?>    <div class="swiper-slide"> <a  <?php echo 'href="'.$pic_link3.'" target="_blank"'; ?> href="#"><img alt="<?php echo $pic_content3 ;?>"  src="<?php echo $pic3 ;?>" /> </a></div>  <?php } ?>
                   
                   <?php if($pic4){ ?>    <div class="swiper-slide"> <a  <?php echo 'href="'.$pic_link4.'" target="_blank"'; ?> href="#"><img alt="<?php echo $pic_content4 ;?>"  src="<?php echo $pic4 ;?>" /> </a></div>  <?php } ?>
                         
                     </div>
                     <a class="next_prve" id="nav_pic_swiper_next"></a>
                     <a class="next_prve" id="nav_pic_swiper_prve"></a>
                     
               </div>
               
                <div class="prodnav-wrapper">
                <div class="swiper-wrapper">
				<?php  ob_start(); wp_nav_menu(array( 'container' => false,'theme_location' => 'drogz-menu','items_wrap' => '<ul id="header_menu" class="header_menu_ul swiper-slide swiper-slide-active">%3$s</ul>' ) ); ?>
               </div>
               </div>
               
               </div>

             <div class="header_background"></div>
          </div>