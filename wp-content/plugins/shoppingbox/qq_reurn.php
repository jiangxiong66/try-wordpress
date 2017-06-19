<?php 
require_once("alipay_config.php");
  $qq_app_id = get_option('qq_app_id');
	$qq_app_secret = get_option('qq_app_secret');
	$my_url = WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/qq_reurn.php?callback=qq_login';
	$app_id = $qq_app_id ;

  $app_secret =$qq_app_secret;
	 $code = $_REQUEST["code"];
  if(isset($_GET['callback']) && $_GET['callback']=='qq_login'){
  if($_GET['state'] == $_SESSION['state']) 
  {
     //拼接URL   
     $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&". "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url). "&client_secret=" . $app_secret . "&code=" . $code;

     $response = file_get_contents($token_url);
     if (strpos($response, "callback") !== false)
     {
        $lpos = strpos($response, "(");
        $rpos = strrpos($response, ")");
        $response  = substr($response, $lpos + 1, $rpos - $lpos -1);
        $msg = json_decode($response);
        if (isset($msg->error))
        {
           echo "<h3>error:</h3>" . $msg->error;
           echo "<h3>msg  :</h3>" . $msg->error_description;
           exit;
        }
     }


     $params = array();
     parse_str($response, $params);

     $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=".$params['access_token'];

     $str  = file_get_contents($graph_url);
     if (strpos($str, "callback") !== false)
     {
        $lpos = strpos($str, "(");
        $rpos = strrpos($str, ")");
        $str  = substr($str, $lpos + 1, $rpos - $lpos -1);
     }
     $user = json_decode($str);
     if (isset($user->error))
     {
        echo "<h3>error:</h3>" . $user->error;
        echo "<h3>msg  :</h3>" . $user->error_description;
        exit;
     }

   
   
   
$catch_url = "https://graph.qq.com/user/get_info?access_token=".$params['access_token']."&oauth_consumer_key=".$app_id ."&openid=".$user->openid."&format=json";
$catch_url2 = "https://graph.qq.com/user/get_user_info?access_token=".$params['access_token']."&oauth_consumer_key=".$app_id ."&openid=".$user->openid."&format=json";

$user_data = file_get_contents($catch_url);
$user_data = json_decode($user_data,true);

$user_data2 = file_get_contents($catch_url2);
$user_data2 = json_decode($user_data2,true);

$user_qq_ids = $user_data['data']['openid'];


if($user_data2['figureurl_qq_2']){
	 $user_qq_head = $user_data2['figureurl_qq_2'];
	}
elseif($user_data['data']['head']){$user_qq_head = $user_data['data']['head'].'/100';}	
elseif($user_data2['figureurl_qq_1']){
		    $user_qq_head = $user_data2['figureurl_qq_1'];
		   }

else { $user_qq_head = $user_data2['figureurl_2'];
			   }
			  if($user_data2['nickname']) {
				  $user_qq_nick = $user_data2['nickname']; 
				  $user_qq_name = $user_data2['nickname']; 
				  }else{
$user_qq_nick = $user_data['data']['nick']; 
$user_qq_name = $user_data['data']['name']; 
}


global $wpdb;
$is_user_exists = $wpdb->get_var("SELECT ID FROM $wpdb->users WHERE user_login='".$user_qq_name."'");
if(!$is_user_exists){
	$is_user_exists = $wpdb->get_var("SELECT user_id FROM $wpdb->usermeta WHERE meta_key='qq_user_id' AND meta_value='".$user->openid."'");
}
if(!$is_user_exists){
	$user_meta = array(
		'user_login' => $user_qq_name,
		'user_pass' => wp_generate_password(),
		'display_name' => $user_qq_nick,
		'user_nicename' => $user_qq_nick,
		'nickname' => $user_qq_nick,
		'user_email' => $user->openid.'@connect.qq.com'
	);
	$user_id = wp_insert_user($user_meta);
	update_user_meta($user_id,'qq_user_id',$user->openid );
	update_user_meta($user_id,'qq_user_avatar',$user_qq_head);		
}else{
	$user_id = $is_user_exists;	
	update_user_meta($user_id,'qq_user_avatar',$user_qq_head);
	update_user_meta($user_id,'display_name',$user_qq_nick);
	update_user_meta($user_id,'nickname',$user_qq_nick);
	
}
 $shop_profile = get_option('shop_profile');
wp_set_auth_cookie($user_id,true,false);
wp_set_current_user($user_id);
$redirect_to = get_page_link( $shop_profile );
wp_safe_redirect($redirect_to);
} 
} 
 ?>
