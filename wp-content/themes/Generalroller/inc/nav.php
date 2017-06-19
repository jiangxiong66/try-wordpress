<div id="header_pic_nav"class="hide_icon">
               

            
              
              
                <?php  
				 $detect = new Mobile_Detect();
				 if($detect->isMobile()){ get_template_part( 'inc/meta' );}
				 $mytheme_detects_nav=get_option('mytheme_detects_nav');
				 $header_menu='header-menu';
				  if( $detect->isMobile()){$divdrog='<div class="header_nav_drog_in">';$divdrogd='</div>';if($mytheme_detects_nav=='yes'){$header_menu='move-menu';}}else{$header_menu='header-menu';}
				  echo $divdrog;
			if(is_page()){
				$id =get_the_ID();
				$page_nav=get_post_meta($id,"page_nav", true);
       if($page_nav){
				 ob_start(); wp_nav_menu(array( 'walker' => new header_menu(),'container' => false,'menu' => $page_nav ,'items_wrap' => '<div id="header_pic_menu" class="header_menu_ul ">%3$s</div>' ) );
	   }else{ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'theme_location' => $header_menu,'items_wrap' => '<div id="header_pic_menu" class="header_menu_ul ">%3$s</div>' ) ); }
				}else{
				ob_start(); wp_nav_menu(array('walker' => new header_menu(), 'container' => false,'theme_location' => $header_menu,'items_wrap' => '<div id="header_pic_menu" class="header_menu_ul ">%3$s</div>' ) ); }echo $divdrogd;?>
               
               
               

               

           
          </div>
          
          
       