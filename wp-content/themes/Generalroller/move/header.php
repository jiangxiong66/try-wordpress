<script type="text/javascript">
$('.swipebox' ).swipebox();

</script>
<body <?php body_class(); ?>>
	<?php $logo= get_option('mytheme_logo') ;?>
	<div id="page-wrap">

		<div id="header">

            <div class="header_in">
          <?php if(is_home()){ ?>
    <h1>  <a href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>" class="logo"><?php echo  bloginfo('name'); ?>
         <img src="<?php  if(get_option('mytheme_logo')){echo get_option('mytheme_logo');}else{echo get_bloginfo('template_url').'/images/logo.jpg';}; ?>" alt="<?php echo  bloginfo('name'); ?>" />
         </a></h1>
    <?php }else{ ?>
    <div>  <a href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>" class="logo"><?php echo  bloginfo('name'); ?>
         <img src="<?php  if(get_option('mytheme_logo')){echo get_option('mytheme_logo');}else{echo get_bloginfo('template_url').'/images/logo.jpg';}; ?>" alt="<?php echo  bloginfo('name'); ?>" />
         </a></div>
    <?php } ?>
            
            <div id="nav_btn">
             <a></a>
            </div>
            	</div>   </div>
           <div class="menu_nav">
            <?php   
			$language1=get_option('mytheme_language1');
			$language2=get_option('mytheme_language2');
			$language_link1=get_option('mytheme_language_link1');
			$language_link2=get_option('mytheme_language_link2');
			 $language3=get_option('mytheme_language3');
			$language4=get_option('mytheme_language4');
			$language_link3=get_option('mytheme_language_link3');
			$language_link4=get_option('mytheme_language_link4');	
			   $shop_login = get_option('shop_login');
		      $shop_register = get_option('shop_register');
	      	$shop_profile = get_option('shop_profile');
			 global $current_user;    get_currentuserinfo();
			 $user_ID = $current_user->id ;
			  if( get_usermeta($user_ID ,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_ID ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
			?> 
		  <div class="yuyan">
            <?php if(get_option('mytheme_theme_shop_open')=="shop_ok"){?>
                     <?php
					
					  if (is_user_logged_in()) {  ?>
                      <a class="pers"> <?php echo $avatar_bbs_avatar; ?></a>
                      <a  href="<?php echo get_page_link( $shop_profile );?>">欢迎！<?php echo $current_user->display_name; ?></a>
                       
                      <a class="btn_login" href="<?php echo get_page_link( $shop_profile );?>">我的个人中心</a>
                       <?php wp_loginout(get_bloginfo('url')); ?>
                     <?php }else{?>
                      <a class="btn_login" href="<?php echo get_page_link( $shop_login  );?>">登录</a>
                      <a class="btn_login" href="<?php echo get_page_link( $shop_register );?>">注册</a>  
            <?php } }else{?>

              <?php if($language_link1){ ?>
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
			<?php  
			 }}
		 ?>
            </div>
		   <?php  ob_start();  wp_nav_menu(array( 'theme_location' => 'header-menu','menu_class'=> 'menu','menu_id'=>'headerm','container' => false ) ); ?></div>
         
	

