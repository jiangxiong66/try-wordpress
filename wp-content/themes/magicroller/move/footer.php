<?php
if(get_option('mytheme_move_tel_name')){$mytheme_move_tel_name=get_option('mytheme_move_tel_name');}else {$mytheme_move_tel_name='电话';}
if(get_option('mytheme_move_mail_name')){$mytheme_move_mail_name=get_option('mytheme_move_mail_name');}else{$mytheme_move_mail_name='邮箱';}
if(get_option('mytheme_move_qq_name')){$mytheme_move_qq_name=get_option('mytheme_move_qq_name');}else{$mytheme_move_qq_name='客服';}
if(get_option('mytheme_move_wixin_name')){$mytheme_move_wixin_name=get_option('mytheme_move_wixin_name');}else{$mytheme_move_wixin_name='微信';}
if(get_option('mytheme_move_nav_name')){$mytheme_move_nav_name=get_option('mytheme_move_nav_name');}else{$mytheme_move_nav_name='菜单';}
if(get_option('mytheme_move_my_name')){$mytheme_move_my_name=get_option('mytheme_move_my_name');}else{$mytheme_move_my_name='我的';}
if(get_option('mytheme_move_close_name')){$mytheme_move_close_name=get_option('mytheme_move_close_name');}else{$mytheme_move_close_name='关闭';}
 	$shop_profile = get_option('shop_profile');
	$theme_shop_open = get_option('mytheme_theme_shop_open'); 
	
	
	    $language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');	
			 $language3=get_option('mytheme_language3');
			$language4=get_option('mytheme_language4');
			$language_link3=get_option('mytheme_language_link3');
			$language_link4=get_option('mytheme_language_link4');		$language_title=get_option('mytheme_move_my_lague');	
 ?>
 <div class="footer">
 <div class="contact_footer_box "></div>
      <div class="contact_footer <?php if(get_option('mytheme_footer_open')=='value2'){echo 'display_none';} ?>">
           <div>
           <?php  if(get_option('mytheme_tell')){?><a class="contact_footer_tell" href="tel:<?php echo get_option('mytheme_tell'); ?>"><?php echo $mytheme_move_tel_name; ?></a><?php } ?>
            <?php  if(get_option('mytheme_mail')){?> <a class="contact_footer_email" href="mailto:<?php echo get_option('mytheme_mail'); ?>"><?php echo $mytheme_move_mail_name; ?></a><?php } ?>
           <?php  if(get_option('mytheme_QQ')){?>   <a class="contact_footer_qq" target="_blank" href="<?php echo get_option('mytheme_QQ'); ?>"><?php echo $mytheme_move_qq_name; ?></a><?php } ?>
            <?php if(get_option('mytheme_footer_box3_pic')){ ?> <a class="contact_footer_weixin"><?php echo $mytheme_move_wixin_name; ?></a> <?php } ?>
            <a class="contact_footer_caidan"><?php echo $mytheme_move_nav_name; ?></a>
            <?php if($theme_shop_open){ ?>
            <a href="<?php echo get_page_link( $shop_profile); ?>" class="contact_footer_login"><?php echo $mytheme_move_my_name; ?>
			<?php if(shoppingbox_theme_cart()) { shoppingbox_theme_cart();}?></a>
			<?php } ?>
              <?php if($language_link1){ ?> <a class="contact_footer_languges"><?php if( $language_title){echo  $language_title;}else{echo '语言';} ?></a><?php } ?>
             <a class="contact_footer_closed"><?php echo $mytheme_move_close_name; ?></a>
           </div>
      
    
    
	  <?php if($language_link1){ ?>
             <span  id="languge_footer">
           
             <a class="language" target="_blank" href="<?php echo $language_link1 ;?>">
             <img src="<?php if($language1){ echo $language1;}else{echo get_bloginfo('template_url').'/images/china.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link2){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link2 ;?>">
             <img src="<?php if($language2){ echo $language2;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
              <?php  }  if($language_link3){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link3 ;?>">
             <img src="<?php if($language3){ echo $language3;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
             <?php  }  if($language_link4){ ?>
              <a  class="language" target="_blank" href="<?php echo $language_link4 ;?>">
             <img src="<?php if($language4){ echo $language4;}else{echo get_bloginfo('template_url').'/images/usa.gif';}  ?>" alt="language" />
             </a>
    
              </span>
              	<?php  
			 }
		 ?>  
         
         </div>  </div>