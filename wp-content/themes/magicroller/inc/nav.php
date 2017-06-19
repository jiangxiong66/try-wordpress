<?php  
$detect = new Mobile_Detect();
$mytheme_detects=get_option('mytheme_detects');
 	
	if (!$detect->isMobile()){  
     if($mytheme_detects=='value2'){$show_nav='hide_icon';}else {if(get_option('mytheme_nav_updown')=='value2'){$show_nav='show_top_icon';}else if(get_option('mytheme_nav_updown')=='value3'){$show_nav='hide_icon';} }
	}elseif($detect->isMobile()){$show_nav='hide_icon';}
if( !is_home())	{
	 $id =get_the_ID();
	 if(get_post_meta($id, "customize",true)!='modle1'){$show_nav='';}
	
	}
	if(get_option('mytheme_nav_updown')=='value4'){$no_donghuadd='no_donghuadd';}
?>
<div class="heaer_nav_drog  <?php  echo $show_nav; ?>" id="header_pic_nav">
               
               <div class="header_nav_drog_in headers_kk" >
               
              
              
                <?php  ob_start();
				
	
				  	 $mytheme_detects_nav=get_option('mytheme_detects_nav');
					   if( $detect->isMobile()){if($mytheme_detects_nav=='yes'){ $menus_move='move-menu';}else{ $menus_move='header-menu';}}else{ $menus_move='header-menu';}
					 
				
				 wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'theme_location' =>  $menus_move,'items_wrap' => '<div id="header_pic_menu" class="header_menu_ul swiper-wrapper  '.$no_donghuadd.'">%3$s</div>' ) ); ?>
               
               
               
               </div>
               

             <div class="header_background"></div>
          </div>
          
          
          
       