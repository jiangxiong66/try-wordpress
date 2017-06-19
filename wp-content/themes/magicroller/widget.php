<?php
if (function_exists('register_sidebar')) {
   	register_sidebar(array(
    		'name' => '首页排版（pc和平板电脑）',
    		'id'   => 'sidebar-widgets',
    		'description'   => '默认首页的pc排版，他们会显示在pc电脑端和平板电脑端显示出来',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		register_sidebar(array(
    		'name' => '首页排版(手机版)',
    		'id'   => 'sidebar-widgets2',
    		'description'   => '默认首页的手机端排版，他们会在手机端显示出来，你可以开启手机端选项进行测试。',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    
	
	
	
		register_sidebar(array(
    		'name' => '默认侧边栏',
    		'id'   => 'sidebar-widgets4',
    		'description'   => '默认两栏内页的侧边栏',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		
		$pages = get_pages();
		foreach( $pages AS $page ) { 
		 $page_id=$page->ID;
		  $page_name=$page->post_title;
		   if(get_post_meta($page_id, "customize",true)==='modle1'){
			register_sidebar(array(
    		'name' => $page_name.'-自定义排版（pc）',
    		'id'   => 'customize_'.$page_id,
    		'description'   => '你建立了一个自定义排版页面：'.$page_name.'，他会像首页一样的方式进行排版，这个区域是控制自定义排版的pc电脑和平板电脑的显示。',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		register_sidebar(array(
    		'name' => $page_name.'-自定义排版（移动）',
    		'id'   => 'customize70_'.$page_id,
    		'description'   => '你建立了一个自定义排版页面：'.$page_name.'，他会像首页一样的方式进行排版，这个区域是控制自定义排版页面的手机端显示。',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
		
		}
		
		  if(get_post_meta($page_id, "cebian",true)==='modle1'){
			  
			 register_sidebar(array(
    		'name' => $page_name.'-侧边栏',
    		'id'   => 'cebian_'.$page_id,
    		'description'   => '你创建了一个新的侧边栏，他是以页面：'.$page_name.'创建的',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	)); 
			  
			  
			  }
		
		
		
		}
	$categorys = get_categories(array('hide_empty' => 0));	
	foreach( $categorys AS $category ) { 
		 $category_id= $category->term_id;
		 $category_name=$category->cat_name;
		 $catce=get_option('catce_'.$category_id);
		 if($catce==='modle1'){
			 
			  register_sidebar(array(
    		'name' => $category_name.'-侧边栏',
    		'id'   => 'catce_'.$category_id,
    		'description'   => '你创建了一个新的侧边栏，他是以分类目录：'.$category_name.'的名义创建的',
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	)); 
			 }	 
		
		 }	
		
		
    }
function unregister_default_wp_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Text'); 
	unregister_widget('WP_Nav_Menu_Widget'); 
	
}
include_once("widget/left_right.php"); 
include_once("widget/up_down.php"); 
include_once("widget/case.php");
include_once("widget/news.php");
include_once("widget/html.php");
include_once("widget/pic_l.php");
include_once("widget/fourq.php");
include_once("widget/nav.php");
include_once("widget/nav_menu.php");
register_nav_menus(
array(

'move-menu' => __( '移动版菜单（需要在自定义选择独立定制）' ),
)
);
add_action('widgets_init', 'unregister_default_wp_widgets', 1);

class check_walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	 
	  if($item->object == 'post_tag'){
		  $tags = get_term_by( 'id', $item->object_id, 'post_tag');
		   	$attributes .= ' id="' . $tags->slug.'"';
		 	$attributes .= ' rel="' . $tags->slug.'"';
	 
		  }else{
			   	$attributes .= ' id="' . $item->object_id.'"';
		$attributes .= ' rel="' . esc_attr( $item->object_id).'"';
		  }

		$item_output = $args->before;
		$item_output .= '<a'. $attributes . ' title="'.  apply_filters( 'the_title', $item->title, $item->ID ) .'">';
		 $item_output .=   apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_before . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'check_walker_start_el', $item_output, $item, $depth, $args );
	}
};



class header_menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes.'>';
		$item_output .= $args->link_before . $args->link_after;
		 if(! empty( $item->description )){$item_output .= '<img src=' .'"' . $item->description .'"'.'alt="'.  apply_filters( 'the_title', $item->title, $item->ID ) . '"/>';}
		
		 $item_output .=  '<b>'. apply_filters( 'the_title', $item->title, $item->ID ).'</b>';
		  $item_output .=  '<p>'.  esc_attr( $item->attr_title ).'</p>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}



 function wptuts_add_color_picker( $hook ) {
        if( is_admin() ) { 
            wp_enqueue_style( 'wp-color-picker' ); 
            wp_enqueue_script( 'custom-script-handle', get_template_directory_uri().'/js/custom-script.js', array( 'wp-color-picker' ), false, true ); 
			

        }

    }
add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );
add_action( 'category_edit_form_fields', 'wptuts_add_color_picker' );
add_action('edited_category','wptuts_add_color_picker');  


add_action( 'admin_menu', 'my_plugin_menu' );
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}
function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
add_filter( 'admin_head-nav-menus.php', 'menu_image_edit_nav_menu_walker_filter', 10, 2 );
 function menu_image_edit_nav_menu_walker_filter() {
			wp_enqueue_media();
			wp_enqueue_script( 'menu-image-admin', get_template_directory_uri() ."/js/widget_upload.js" );
	}

add_filter( 'pre_wp_nav_menu', 'wpjam_get_nav_menu_cache', 10, 2 );
function wpjam_get_nav_menu_cache( $nav_menu, $args ) {
    $cache_key      = wpjam_get_nav_menu_cache_key($args);
    $cached_menu    = get_transient( $cache_key );
    if ( ! empty( $cached_menu ) )
        return $cached_menu;

    return $nav_menu;
}

add_filter( 'wp_nav_menu', 'wpjam_set_nav_menu_cache', 10, 2 );
function wpjam_set_nav_menu_cache( $nav_menu, $args ) {
    $cache_key      = wpjam_get_nav_menu_cache_key($args);
    set_transient( $cache_key, $nav_menu, 86400 );
    
    return $nav_menu;
}

function wpjam_get_nav_menu_cache_key($args){
    $timestamp = get_transient('nav-menu-cache-timestamp');
    if($time === false){
        $timestamp = time();
        set_transient( 'nav-menu-cache-timestamp', $time, 86400 );
    }
    return apply_filters( 'nav_menu_cache_key' , 'nav-menu-' . md5( serialize( $args ).serialize(get_queried_object()) ) . $timestamp );
}

add_action( 'wp_update_nav_menu', 'wpjam_delete_nav_menu_cache' );
function wpjam_delete_nav_menu_cache(){
    set_transient( 'nav-menu-cache-timestamp', time(), 86400 );
}

function not_bbs_search( $query) {
	$cat_bbs_id=get_option('cat_bbs_id');
	$cat_bbs_ids='-'.$cat_bbs_id;
	$categories_t = get_categories("echo=0&show_count=1&child_of=".$cat_bbs_id."&title_li=&orderby=count&order=DESC&hide_empty=0&number=14");
foreach($categories_t as $category) {
$category_kid_id.='-'. $category->cat_ID;

                           
}
	
	
	if($cat_bbs_id){
	if ( !$query->is_admin && $query->is_search) {
		
		$query->set('cat',array($cat_bbs_ids,$category_kid_id)); 
	}
	return $query;}
}
add_filter('pre_get_posts','not_bbs_search');
?>
