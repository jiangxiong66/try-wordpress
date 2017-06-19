<?php
require_once("alipay_config.php");
if (is_user_logged_in()) {
	 $shop_profile = get_option('shop_profile'); 
 if($_GET['alipay_stars']!=""&&$_GET['expressid']){
		  
		   $expressid =$_GET['expressid'];
		    $alipay_stars=$_GET['alipay_stars'];
			$alipay_comment=$_GET['alipay_comment'];
			   $wpdb->query("update $wpdb->alipay set alipay_stars='".$alipay_stars."'  where alipay_num=".$expressid."");
			   $wpdb->query("update $wpdb->alipay set alipay_comment='".$alipay_comment."' where alipay_num=".$expressid."");
			
			
		  
		   echo "<script language='javascript' type='text/javascript'>window.location.href='".get_permalink($shop_profile)."' </script>'";  
		   }  else{ wp_die('订单号错误！');}
		    } else{ wp_die('请登录');}

?>