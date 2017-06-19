<?php 

function qq_login_btns(){
	
	 $qq_app_id = get_option('qq_app_id');
	$qq_app_secret = get_option('qq_app_secret');
	session_start();
	
   $shop_login = get_option('shop_login');
	  //应用的APPID
  $app_id = $qq_app_id ;

  //应用的APPKEY
  $app_secret =$qq_app_secret;

  //成功授权后的回调地址
  $my_url = WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/qq_reurn.php?callback=qq_login';
 

  $code = $_REQUEST["code"];
  	if (is_user_logged_in()){
  $current_user = wp_get_current_user();
   $user_id =$current_user->ID;
   $author_qqlogin=get_usermeta($user_id,'qq_user_id');}
   if($author_qqlogin){$qqbangding='<div class="bangding_ok"></div>'; $qql_cs_t= '已绑定';}else{$qql_cs_t= '使用QQ号码登陆';$qqwb_cs_t= '使用腾讯微博登陆';}
   	
	 
	 
if(!$_SESSION['state']){

  $_SESSION['state'] = md5(uniqid(rand(), TRUE)); 
 
}

  $shop_profile = get_option('shop_profile');
    $shop_qqlogin_open = get_option('shop_qqlogin_open');
  $shop_profile_url=get_page_link( $shop_profile );
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true!=''){$cart_url=get_permalink().'&';}else{$cart_url=get_permalink().'?';}
   $qqlogin=$_GET['qqlogin'];
   $txwb_login=$_GET['txwb_login'];
 if($qqlogin ||  $txwb_login) {
  $qq_login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=".$app_id."&redirect_uri=".urlencode($my_url)."&state=".$_SESSION['state']."&scope=get_user_info,get_info";
   header("Location: $qq_login_url");
  }
 if (is_user_logged_in()){ $bangding='请绑定账号';}else{$bangding='合作网站快捷登录';}
 if($shop_qqlogin_open){
  return '  <span  class="denglu_span_x"><b>'.$bangding.'：</b>
  <a href="'.$cart_url.'qqlogin=yes" title="'.$qql_cs_t.'" class="qq">'.$qqbangding.'</a>
  <a href="'.$cart_url.'txwb_login=yes" title="'.$qql_cs_t.'" class="qqwb">'.$qqbangding.'</a>
  </span>';}
	
	}


function qq_login_btn(){
	 $qq_app_id = get_option('qq_app_id');
	$qq_app_secret = get_option('qq_app_secret');
	session_start();
	
   $shop_login = get_option('shop_login');
	  //应用的APPID
  $app_id = $qq_app_id ;

  //应用的APPKEY
  $app_secret =$qq_app_secret;

  //成功授权后的回调地址
  $my_url = WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/qq_reurn.php?callback=qq_login';
 

  $code = $_REQUEST["code"];
  	if (is_user_logged_in()){
  $current_user = wp_get_current_user();
   $user_id =$current_user->ID;
   $author_qqlogin=get_usermeta($user_id,'qq_user_id');}
   if($author_qqlogin){$qqbangding='<div class="bangding_ok"></div>'; $qql_cs_t= '已绑定';}else{$qql_cs_t= '使用QQ号码登陆';$qqwb_cs_t= '使用腾讯微博登陆';}
   	
	 
	 
if(!$_SESSION['state']){

  $_SESSION['state'] = md5(uniqid(rand(), TRUE)); 
 
}

  $shop_profile = get_option('shop_profile');
    $shop_qqlogin_open = get_option('shop_qqlogin_open');
  $shop_profile_url=get_page_link( $shop_profile );
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true!=''){$cart_url=get_permalink().'&';}else{$cart_url=get_permalink().'?';}
   $qqlogin=$_GET['qqlogin'];
   $txwb_login=$_GET['txwb_login'];
 if($qqlogin ||  $txwb_login) {
  $qq_login_url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=".$app_id."&redirect_uri=".urlencode($my_url)."&state=".$_SESSION['state']."&scope=get_user_info,get_info";
   header("Location: $qq_login_url");
  }
 if (is_user_logged_in()){ $bangding='请绑定账号';}else{$bangding='合作网站快捷登录';}
 if($shop_qqlogin_open){
  echo '  <span  class="denglu_span_x"><b>'.$bangding.'：</b>
  <a href="'.$cart_url.'qqlogin=yes" title="'.$qql_cs_t.'" class="qq">'.$qqbangding.'</a>
  <a href="'.$cart_url.'txwb_login=yes" title="'.$qql_cs_t.'" class="qqwb">'.$qqbangding.'</a>
  </span>';}
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

   
  

	  $catch_url = "https://graph.qq.com/user/get_user_info?access_token=".$params['access_token']."&oauth_consumer_key=".$app_id ."&openid=".$user->openid."&format=json";
	   $user_data = file_get_contents($catch_url);
       $user_data = json_decode($user_data,true);
       $user_qq_ids = $user->openid;
       $user_qq_name = $user_data['nickname']; 
	   if($user_data['figureurl_qq_2']){
		    $user_qq_head = $user_data['figureurl_qq_2'];
		   }else if($user_data['figureurl_qq_1']){
			    $user_qq_head = $user_data['figureurl_qq_1'];
			   }
      
       $user_qq_nick = $user_data['nickname']; ;


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
}
wp_set_auth_cookie($user_id,true,false);
wp_set_current_user($user_id);
$redirect_to = admin_url();
wp_safe_redirect($redirect_to);
} 


 }



}

 ?>