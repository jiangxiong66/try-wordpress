<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?> >
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1" />	
<?php
 $detect = new Mobile_Detect();
 if( $detect->isMobile()){ ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no,minimal-ui">
<meta name="screen-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-orientation" content="portrait">
<meta name="x5-fullscreen" content="true">
<?php }
if(is_single()){
$id=get_the_ID(); 
$description=get_post_meta($id, "描述",true);
$keyworeds=get_post_meta($id, "关键字",true);
$posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { $tagess.=$tag->name.',';}}
}
 ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php if (get_option('mytheme_eso_jr') == ""){ ?>
<meta name="keywords" content="<?php  ob_start();if(is_single()&&!$keyworeds){echo $tagess;}else{theme_keyworeds();} ?>" />
<meta name="description" content="<?php  theme_description(); ?>" />
<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /> <?php } ;?>
<title><?php if(get_option('mytheme_word_t12')==""){$word_t12='找到标签';}else{ $word_t12=get_option('mytheme_word_t12');};
		     if(get_option('mytheme_word_t9')!=""){$word_t9=get_option('mytheme_word_t9');}else{$word_t9='搜索结果：';}  
		     if(get_option('mytheme_word_t10')!=""){$word_t10=get_option('mytheme_word_t10');}else{$word_t9='很遗憾，没有找到你要的信息：';}  
			 $singletitle_p =get_post_meta($post->ID, "title_p",true);
			 $singletitle =get_post_meta($post->ID, "title",true);
			 global $wp_query;
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


<?php } $logo= get_option('mytheme_logo') ; $ico= get_option('mytheme_ico');
$detect = new Mobile_Detect();
$mytheme_detects=get_option('mytheme_detects');
if( !$detect->isMobile()&&$mytheme_detects=='value2'){
	$debug='<link id="debug" media="all" type="text/css" href="'.get_bloginfo('template_url').'/css/Debugging.css" rel="stylesheet">';
	}

?>
<link rel="shortcut icon" href="<?php echo $ico; ?>" type="image/x-icon" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head();echo $debug; ?>

 <?php echo stripslashes(get_option('mytheme_analytics3')); ?>

</head>

<?php
   if (!is_user_logged_in()) {
	   global $current_user;    get_currentuserinfo();
			  $user_ID = $current_user->id ;
	      if( !current_user_can( 'manage_options' ) ) {

      $header_over='style="top:0;"';

    }
	  }

 ?>

<body <?php body_class();?> >
    <div class="header">
    <?php
	$logo_m=get_option('mytheme_logo');
	$move_logo_m=get_option('mytheme_move_logo');
	if($detect->isMobile()&&$move_logo_m){$logo_s=$move_logo_m;}else{$logo_s=$logo_m;}
	if(!$logo_s){$logo_s=get_bloginfo('template_url').'/images/logo.png';}
	
	 if(!$detect->isMobile()){
		if($mytheme_detects=='value1'){ 
		
		
		?>
       
         <?php }} ?>
         <div class="header_in">
               <div class="header_center">
                <?php if(is_home()){ ?>  <h1 class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>"> <img src="<?php  echo $logo_s ?>" alt="<?php echo  bloginfo('name'); ?>"/></a></h1><?php }else{ ?>
                 <div class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php echo  bloginfo('name'); ?>"> <img src="<?php  echo $logo_s ?>" alt="<?php echo  bloginfo('name'); ?>"/></a></div>
                 <?php } ?>
                 
                 <?php if($detect->isMobile()||$mytheme_detects=='value2'){ ?> 
                 <span id="nav_b" class="light_span <?php echo $show_nav; ?>"><?php if($word_t50!=""){echo $word_t50;}else{echo '导航菜单';} ?></span>
                 <?php } ?>
                 
                   <?php get_template_part( 'inc/nav' ); ?>
               
               
               
              
           
               </div> 
                 <?php if(!$detect->isMobile()){ get_template_part( 'inc/meta' );} ?>
               
       
         </div>
     
    
       </div>