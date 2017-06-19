<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
 $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	  if( $mytheme_detects=='value2'){
	$debug='<link id="debug" media="all" type="text/css" href="'.get_bloginfo('template_url').'/css/Debugging.css" rel="stylesheet">';
	}
	if ($detect->isMobile()&&is_home()){
	$body_over='style="overflow:hidden; height:100%"';} 
	
	if( !is_home())	{
	 $id =get_the_ID();
	 if(get_post_meta($id, "customize",true)=='modle1'){$body_over='style="overflow:hidden; height:100%"';}else{$body_over='';}}else{$body_over='style="overflow:hidden; height:100%"';}
	?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();  echo  $body_over;?> >
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1" />	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (get_option('mytheme_eso_jr') == ""){ ?>

<?php if( $detect->isMobile()){ ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">
<meta name="screen-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-orientation" content="portrait">
<meta name="x5-fullscreen" content="true">
<?php } ?>
<meta name="description" content="<?php  ob_start();theme_description(); ?>" />
<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /> <?php } ;?>
<title><?php if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		     if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
			 $singletitle_p =get_post_meta($post->ID, "title_p",true);
			 $singletitle =get_post_meta($post->ID, "title",true);
			 global $wp_query;
	         $detect = new Mobile_Detect();
             $term_id = get_query_var('cat');
             $cat_title=get_option('cat_title_'.$term_id);
             $cat_title_p=get_option('cat_title_p_'.$term_id);
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title($word_t12."&quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
				 if ($detect->isMobile()||$detect->isTablet()){
					 if($cat_title_p){echo $cat_title_p;}elseif( $cat_title){echo  $cat_title;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }else{	 
		        if( $cat_title){echo  $cat_title;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }
				 }
		      elseif (is_search()) {
		         echo $word_t9.' &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		        if ($detect->isMobile()||$detect->isTablet()){
					 if($singletitle_p){echo $singletitle_p;}elseif( $singletitle){echo  $singletitle;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }else{	 
		        if( $singletitle){echo  $singletitle;}else{ wp_title(''); echo ' - '.get_bloginfo('name');; }
					 }
			    }
		      elseif (is_404()) {
		         echo $word_t10.'- '; }
		      if (is_home()) {
				  
				   if ($detect->isMobile()||$detect->isTablet()){
					 if(get_option('mytheme_title_p')){echo get_option('mytheme_title_p');}elseif(get_option('mytheme_title')){echo get_option('mytheme_title');}else{  bloginfo('name'); echo ' - '; bloginfo('description');  }
					 }else{
						 
		        if(get_option('mytheme_title')){echo get_option('mytheme_title');}else{  bloginfo('name'); echo ' - '; bloginfo('description'); }
					 }
		        }
		      if ($paged>1) {
		         echo ' - page '. $paged;echo ' - '; bloginfo('description'); }
		   ?></title>


<?php } $logo= get_option('mytheme_logo') ; $ico= get_option('mytheme_ico');?>
<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head();echo $debug; ?>
<?php echo stripslashes(get_option('mytheme_analytics2')); ?>
 

</head>

<?php
  if (!is_user_logged_in()) {
	   global $current_user;    get_currentuserinfo();
			  $user_ID = $current_user->id ;
	      if( !current_user_can( 'manage_options' ) ) {

      $header_over='style="top:0;"';

    }
	  }
$word_t50=get_option('mytheme_word_t50');

 ?>

<body <?php body_class(); echo $body_over;?> >
    <div class="header" <?php echo $header_over; ?> >
    
    
        <div class="header_in" >
            <h1><a class="logo" href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>"> <img src="<?php  if(get_option('mytheme_logo')){echo get_option('mytheme_logo');}else{echo get_bloginfo('template_url').'/images/logo.png';}; ?>" alt="<?php echo  bloginfo('name'); ?>" /><?php echo  bloginfo('name'); ?></a></h1>
        
              <div class="header_btn_s">
                  
                <?php if(get_option('mytheme_product_name')!='1'){ ?>  <a class="light_b product_b"><?php if(get_option('mytheme_product_name')){ echo get_option('mytheme_product_name'); }else{echo '产品目录';}?></a><?php } 
					$theme_shop_open = get_option('mytheme_theme_shop_open'); 
		 	$shop_login = get_option('shop_login');
		    $shop_register = get_option('shop_register');
	      	$shop_profile = get_option('shop_profile');
			
			if( !is_home())	{
	 $id =get_the_ID();
	 if(get_post_meta($id, "customize",true)!='modle1'){$show_nav='nev_nei';}
	
	}?>
	
	
	
	<?php
				if($theme_shop_open){
					 if (is_user_logged_in()) {
				?>
                 <a href="<?php echo get_page_link($shop_profile); ?>" class="light_b log_b">我的个人中心</a>
               <em> <?php wp_loginout(get_bloginfo('url'));?></em>
                  <?php }else{ ?> 
                  <a href="<?php echo get_page_link($shop_register); ?>" class="light_b reg_b">注册</a>
                  <a href="<?php echo get_page_link($shop_login); ?>" class="light_b log_b">登录</a>
                 <?php } }?> 
                
                  <span id="nav_b" class="light_span <?php echo $show_nav; ?>"><?php if($word_t50!=""){echo $word_t50;}else{echo '导航菜单';} ?></span>
                  
                  
                  
              </div>
        
        
        </div>
    
     
       <div class="header_background"></div>
           <?php get_template_part( 'inc/nav' );  ?>
           <?php get_template_part( 'inc/product_nav' );  ?>
           
           
           
           
       </div>