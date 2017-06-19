<?php 
require_once("alipay_config.php");
if(is_user_logged_in())
{
	$id=$_GET['id'];
	$postid =$_GET['postid'];
	$alipay_status =$_GET['alipay_status'];
	 $user_info=wp_get_current_user();
	 
	 if($_GET['alipay_status']){
		 if($id ==$user_info->ID){
			 
			if( $alipay_status =="交易成功"||$alipay_status =='等待卖家发货'||$alipay_status=='等待买家确认'||$alipay_status=='货到付款'){
				
				$url= get_post_meta( $postid, 'shop_download_pay', true);
				
				$home= get_option('home');
				 wp_safe_redirect($home.$url);
				 echo "ok";
				}
			 
			 
			 }
		 
		 
		 }else{echo "2";}
	
	
	}else{ wp_die('请登录');}

?>