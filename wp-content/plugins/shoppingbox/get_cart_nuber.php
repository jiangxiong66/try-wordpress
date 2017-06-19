<?php
require_once("alipay_config.php");
  if($_GET['cart_chect']){
  global $wpdb;
  global $current_user;  
  $user_ID = $current_user->id ;
   $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status='购物车'");
     $list=array("id"=>$total_trade); 
   echo json_encode($list); 
  }
?>