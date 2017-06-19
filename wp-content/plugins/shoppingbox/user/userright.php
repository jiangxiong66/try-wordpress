<?php
//社区发帖和投稿的用户上传图片权限功能


require (ABSPATH . WPINC . '/pluggable.php');  

 $bbs_user_upload  = get_option('bbs_user_upload');


if( $bbs_user_upload ){add_action('admin_init', 'themepark_upload_user_can');}
function themepark_upload_user_can() {
	global $wp_roles; 
	global $wpdb;
	 $bbs_user_upload = get_option('bbs_user_upload');
	if($bbs_user_upload){
		
	if( $bbs_user_upload=='level_4'){
  $authors = get_role('authors');
  $authors ->add_cap('upload_files');
  
    $contributor = get_role('contributor');
  $contributor ->add_cap('upload_files');
  
   $subscriber = get_role('subscriber');
  $subscriber ->add_cap('upload_files');
  }else if($bbs_user_upload=='level_1'){
	  
	   $contributor = get_role('contributor');
  $contributor ->add_cap('upload_files');
  
   $subscriber = get_role('subscriber');
  $subscriber ->add_cap('upload_files');
	  
	  }elseif($bbs_user_upload=='level_0'){   
	  $subscriber = get_role('subscriber');
      $subscriber ->add_cap('upload_files');}
  }
}

function themepark_user_upload_file ( $existing_mimes=array() ) {
global $wpdb;
$bbs_user_upload  = get_option('bbs_user_upload');
	if( $bbs_user_upload&& current_user_can(  $bbs_user_upload) ) {
           $existing_mimes['jpg|jpeg|gif|png']='image/image';
		   
	}else{
		unset ($existing_mimes);
	}
	return $existing_mimes;

}

function themepark_user_upload_size() {
if( current_user_can( 'publish_posts' ) && !current_user_can( 'publish_pages' ) ) {
return 1024*1024; // 允许作者（Author）上传的尺寸
}elseif( current_user_can( 'edit_posts' ) && !current_user_can( 'publish_posts' ) ) {
return 1024*1024; // 允许投稿者（Contributor）上传的尺寸
}else{
return 500*1024; // 其他用户角色上传 500 kb
	}
}
if( !current_user_can('level_5') ) {
	add_filter('upload_mimes', 'themepark_user_upload_file');
	add_filter('upload_size_limit', 'themepark_user_upload_size');
}

function themepark_upload_media( $wp_query_obj ) {
	global $current_user, $pagenow;
	if( !is_a( $current_user, 'WP_User') )
		return;
	if( 'admin-ajax.php' != $pagenow || $_REQUEST['action'] != 'query-attachments' )
	return;
	if( !current_user_can( 'manage_options' ) && !current_user_can('manage_media_library') )
		$wp_query_obj->set('author', $current_user->ID );
	return;
}
add_action('pre_get_posts','themepark_upload_media');


?>
