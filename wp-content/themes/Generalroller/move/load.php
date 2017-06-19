<?php
// 加载主题的各种外置文件 css  js
function themepark_init_css() {
	 $id =get_the_ID();
$mytheme_detects=get_option('mytheme_detects');
if ( !is_admin()) {

	   wp_deregister_script('jquery');
	   wp_register_script( 'jquery', get_template_directory_uri() ."/js/jquery-2.1.1.min.js");
	   wp_enqueue_script('jquery');
	   
	    wp_deregister_script('easing');
	   wp_register_script( 'easing',get_template_directory_uri() ."/js/jquery.easing.1.3.js");
	   wp_enqueue_script('easing');
	   
	 
       wp_deregister_script('swiper3');
	   wp_register_script( 'swiper3',get_template_directory_uri() ."/js/swiper3.min.js");
	   wp_enqueue_script('swiper3');
	  
	   if(!is_home()){
	 if(get_post_meta($id, "customize",true)==''){
       wp_deregister_script('lightbox');
	   wp_register_script( 'lightbox',get_template_directory_uri() ."/js/lightbox.js");
	   wp_enqueue_script('lightbox');
	   
	 
	 }
	   }
	   wp_deregister_script('scrtpr');
	   wp_register_script( 'scrtpr', get_template_directory_uri() ."/js/move.js",false, '', true );
	   wp_enqueue_script('scrtpr');

  

	    wp_deregister_style('stylesheet');
	   wp_register_style( 'stylesheet', get_template_directory_uri() .'/css/move.css');
	   wp_enqueue_style('stylesheet');
	   
	     wp_deregister_style('swiper3_css');
	   wp_register_style( 'swiper3_css', get_template_directory_uri() .'/css/swiper.min.css');
	   wp_enqueue_style('swiper3_css');
	   
	   

	}}

add_action('wp_print_styles', 'themepark_init_css');


	?>