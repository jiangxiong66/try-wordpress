<?php
/* *
 * 功能：货到付款功能。
 */
require_once("alipay_config.php"); 
 if (!is_user_logged_in()&&isset($_POST['notlogin'])) { 
 
  $error = '';
  $sanitized_user_login = sanitize_user( $_POST['email'] );
  $user_email =   apply_filters( 'user_registration_email', $_POST['email'] );
   $last_name_p = isset( $_POST['last_name'] ) ? $_POST['last_name'] : '';
	  $Address_p = isset( $_POST['Address'] ) ? $_POST['Address'] : '';
	  $Phone_p = isset( $_POST['tell'] ) ? $_POST['tell'] : '';

 if(empty($_POST['captcha_code']) || empty($_SESSION['secretword']) || (trim(strtolower($_POST['captcha_code'])) != $_SESSION['secretword'])) {
   $error .=('<strong>错误</strong>：验证码不正确<br />');
  };
   if ( $user_email == '' ) {
    $error .= '<strong>错误</strong>：请填写电子邮件地址。<br />';
  } elseif ( ! is_email( $user_email ) ) {
    $error .= '<strong>错误</strong>：电子邮件地址不正确。！<br />';
    $user_email = '';
  } elseif ( email_exists( $user_email ) ) {
    $error .= '<strong>错误</strong>：该电子邮件地址已经被注册，请换一个。<br />';
  }
  
  if(strlen($_POST['user_pwd1']) < 6)
    $error .= '<strong>错误</strong>：密码长度至少6位!<br />';
  elseif($_POST['user_pwd1'] != $_POST['user_pwd2'])
    $error .= '<strong>错误</strong>：两次输入的密码必须一致!<br />';
     
    if($error == '') {
    $user_id = wp_create_user( $sanitized_user_login, $_POST['user_pwd1'], $user_email );
   
    if ( ! $user_id ) {
      $error .= sprintf( '<strong>错误</strong>：无法完成您的注册请求... 请联系<a href=\"mailto:%s\">管理员</a>！<br />', get_option( 'admin_email' ) );
    }
 
   else if (!is_user_logged_in()) {
      $user = get_userdatabylogin($sanitized_user_login);
      $user_id = $user->ID;
      $redirect_to = get_page_link( $shop_profile );
       update_usermeta($user_id,'last_name', $last_name_p);
	   update_usermeta($user_id,'Address',  $Address_p );
       update_usermeta($user_id,'Phone',  $Phone_p );

      wp_set_current_user($user_id, $user_login);
      wp_set_auth_cookie($user_id);
      do_action('wp_login', $user_login);
	
    } }
	

	$to_buyer = $_POST['email'];
	$subject_buyer = '您在['.get_option("blogname").']提交了订单，并注册了一个账户';
	$message_buyer ='
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
      <p >您好!</p>
	  <p>感谢您在[<a href="'.get_option("siteurl").'">'.get_option("blogname").'</a>]提交了订单，系统为您自动生成了一个账户方便您可以查询您的货物物流详情。</p>
	  <p>您的用户名是您的邮箱账户：'.$_POST['email'].',密码由您自己设置，您可以登陆以查询您的货物状态。</p>
	  <p>订单详情：</p>
	  <p>您此次支付的订单货物是：'. get_post($_POST['id'])->post_title.'</p>
	  <p>支付方式:货到付款</p>
	  <p>收货人：'.$last_name_p.'</p>
	  <p>联系电话：'.$Phone_p.'</p>
	  <p>收货人地址：'.$Address_p.'</p>
	  <p>以上信息若查实有误，请尽快与我们联系！</p>
      <p>(此邮件由系统自动发出，请勿回复.)</p>
    </div>';
    $headers = "Content-Type: text/html; charset=" . get_option('blog_charset');
    wp_mail( $to_buyer, $subject_buyer, $message_buyer, $headers );

	
 }
 if($error){wp_die($error);}

if(!isset($_POST['time'])||!preg_match("/^\d{14}$/",$_POST['time'])){
 wp_die("订单号错误，请联系站长或尝试刷新并重新提交！");
}
if(!isset($_POST['nmbers'])){
	wp_die("请填写数量！");
	
	}

global $wpdb;
$list = $wpdb->get_results("SELECT * FROM $wpdb->alipay");
foreach($list as $value)
			{ 
			
			if($value->alipay_num==$_POST['time']){
				 wp_die("订单号错误，请联系站长或尝试刷新并重新提交！");
				}
			}
$shop_profile = get_option('shop_profile');	

if(isset($_POST['time'])){
$postid   = $_POST['id'];
$tell     = $_POST['tell'];
$alipay   = $_POST['email'];
$nmbers   = $_POST['nmbers'];
if(isset($_POST['notlogin'])){$user = $user_id;}else{$user = $_POST['user'];}
$Postage   = $_POST['postage'];
$cart   = $_POST['cart'];
$time_piker_1_ni=$_POST['time_piker_1'];
$time_piker_2_ni=$_POST['time_piker_2'];
$unitprice=(get_post_meta($postid, 'shop_price', true) *$nmbers)+$Postage ;
$time_piker_1=get_post_meta($postid ,"time_piker_1", true);
$time_piker_2=get_post_meta($postid ,"time_piker_2", true);
$shop_info_price=get_post_meta($postid,"shop_info_price", true);
if($time_piker_1_ni||$time_piker_2_ni){$time_piker_all='<strong>'.$time_piker_1.'</strong>：'.$time_piker_1_ni.'<br /><strong>'.$time_piker_2.'</strong>：'.$time_piker_2_ni.'<br />';}
$shopinfo=get_post_meta($postid ,"shop_info", true);
$shop_infos= split("\n",$shopinfo); 
$shop_info_prices= split(",",$shop_info_price);
 $name=0;
			 foreach ($shop_infos as $a){	
				$shop_infoss= split(",",$a); 
				$name++;	
				if($_POST['shop_info'.$name]){
			    $shop_infoc.='<strong>'.$shop_infoss[0].'：</strong>'.$_POST['shop_info'.$name].'；  ';
          
				 
				   
          
				  foreach ($shop_info_prices as $b){	
				  $shop_info_pricess= split(":",$b);
				
	
				  if( trim ($shop_info_pricess[0])===trim($_POST['shop_info'.$name])){
					  $unitprice=($shop_info_pricess[1] *$nmbers)+$Postage ;
					
					  };
				  
				   }	
				  }
				 
				 
				 } 

$total_fee = $unitprice; 
if(empty($total_fee)){
	
	wp_die ('价格获取错误，请联系站长或尝试刷新并重新提交！');
		
}
$price     = $unitprice; 
$subject   = get_post($postid)->post_title;  
$out_trade_no = $_POST['time'];		
$body         = $time_piker_all.$shop_infoc.$_POST['description'];;
$time         = date('Y-m-d H:i:s');
$description =$shop_infoc.$_POST['description'];
if($cart){$alipay_statuss='购物车';}else{$alipay_statuss='货到付款';}
// 将传入的数据写入数据库
	if(get_post_meta($postid, 'shop_price', true)){
		$wpdb->update( $wpdb->alipay, array( 'alipay_post' => $postid, 'alipay_price' => $total_fee , 'alipay_tell' =>$tell, 'alipay_email' =>$alipay, 'alipay_nmbers' =>$nmbers, 'alipay_time' => $time,'alipay_user'=>$user,'alipay_body'=>$body ), array( 'alipay_num' => $out_trade_no ) , array( '%s', '%s', '%s', '%s', '%s','%s','%s'  ), array( '%s' )) ;
		$affected = mysql_affected_rows();
			if($affected == 0)
				{
					 $wpdb->insert( $wpdb->alipay, array( 'alipay_num' => $out_trade_no, 'alipay_post' => $postid , 'alipay_price' => $total_fee ,'alipay_tell' => $tell, 'alipay_email' => $alipay ,'alipay_nmbers' => $nmbers, 'alipay_time' => $time , 'alipay_status' => $alipay_statuss ,'alipay_dl' => '','alipay_user'=>$user,'alipay_body'=>$body,'alipay_orderstatus'=>'','alipay_express'=>'','alipay_stars'=>'','alipay_comment'=>''), array( '%s', '%s', '%s', '%f', '%s', '%s', '%s','%s', '%s','%s',  '%s',  '%s',  '%s',  '%s' ,  '%s',  '%s') );
				}
		}

global $current_user;    
get_currentuserinfo();
					 $user_ID = $current_user->id ;
					 $user_email =$current_user->user_email;
					 $last_name =$current_user->last_name;
	                 $Address = $current_user->Address ;
	                 $Phone = $current_user->Phone;
	                 $QQ = $current_user->QQ;	
	$to_buyer = $user_email;
	$subject_buyer = '您在['.get_option("blogname").']提交了订单';
	$message_buyer ='
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
      <p >您好!</p>
	  <p>感谢您在[<a href="'.get_option("siteurl").'">'.get_option("blogname").'</a>]提交了订单，您可以登陆以查询您的货物物流详情。</p>
	  <p>订单详情：</p>
	  <p>您此次支付的订单货物是：'. get_post($postid)->post_title.'</p>
	  <p>支付方式:货到付款</p>
	  <p>收货人：'.$last_name.'</p>
	  <p>联系电话：'.$Phone.'</p>
	  <p>收货人地址：'.$Address.'</p>
	  <p>以上信息若查实有误，请尽快与我们联系！</p>
      <p>(此邮件由系统自动发出，请勿回复.)</p>
    </div>';
    $headers = "Content-Type: text/html; charset=" . get_option('blog_charset');
   if(!$cart){ wp_mail( $to_buyer, $subject_buyer, $message_buyer, $headers );	}	
		

$url=get_page_link( $shop_profile );
 header("Location: $url");
}


?>
  