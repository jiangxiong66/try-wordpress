<?php 
/*找回密码*/
if(!isset($_SESSION)){
  session_start(); 
 
  }
function fogotpassword(){
   $shop_login = get_option('shop_login');
 $shop_profile = get_option('shop_profile');	

				 
	global $wpdb, $user_ID;   
    function tg_validate_url() {   
        global $post;   
        $page_url = esc_url(get_page_link( $post->ID )); //获取本页面的链接地址   
        $urlget = strpos($page_url, "?");   
        if ($urlget === false) {   
            $concate = "?";   
        } else {   
            $concate = "&";   
        }   
        return $page_url.$concate; //返回一个类似example.com/?     example.com/?p=123&   这样的url
    }  



    if($_POST['action'] == "tg_pwd_reset"){ //判断是否为请求重置密码  
	  $error = ''; 
	   $success ='';
	    if(empty($_POST['captcha_code']) || empty($_SESSION['secretword']) || (trim(strtolower($_POST['captcha_code'])) != $_SESSION['secretword'])) {
   $error .=('<strong>错误</strong>：验证码不正确<br />');
  };
        if ( !wp_verify_nonce( $_POST['tg_pwd_nonce'], "tg_pwd_nonce")) { //检查随机数   
           $error .="请别开玩笑";   
        }   
        if(empty($_POST['user_input'])) {   
           $error .="请输入用户名或E-mail地址";   
          
        }   
           
        //过滤提交的数据   
        $user_input = $wpdb->escape(trim($_POST['user_input']));   
           
        if ( strpos($user_input, '@') ) { //判断用户提交的是邮件还是用户名   
            $user_data = get_user_by_email($user_input); //通过Email获取用户数据   
            if(empty($user_data) || $user_data->caps[administrator] == 1) { //排除管理员   
                 $error .="无效的E-mail地址!";   
               
            }   
        } else {   
            $user_data = get_userdatabylogin($user_input); //通过用户名获取用户数据   
            if(empty($user_data) || $user_data->caps[administrator] == 1) { //排除管理员   
                 $error .="无效的用户名!";   
            }   
        }   
        if($error == '') {   
        $user_login = $user_data->user_login;   
        $user_email = $user_data->user_email;   
           
        $key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login)); //从数据库中获取密匙   
        if(empty($key)) { //如果为空   
            //generate reset keys生成 keys   
            $key = wp_generate_password(20, false); //生成一个20位随机密码用做密匙   
            $wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login)); //更新到数据库   
        }   
           
        //邮件内容key=vW1girlklqE26OKGcgVh&login=jack
		$keys_message = tg_validate_url() . "action=reset_pwd"."&"."key=".$key."&login=" . rawurlencode($user_login); 
	
        $message = __('有人提交了重置下面账户密码的请求:') . "\r\n\r\n";   
        $message .= get_option('siteurl') . "\r\n\r\n";   
        $message .= sprintf(__('用户名: %s'), $user_login) . "\r\n\r\n";   
        $message .= __('如果不是您本人操作，请忽略这个邮件即可.') . "\r\n\r\n";   
        $message .= __('如果需要重置密码，请访问下面的链接:') . "\r\n\r\n";   
        $message .=  $keys_message. "\r\n"; //注意tg_validate_url()，注意密码重置的链接地址，需要action\key\login三个参数   
           
        if ( $message && !wp_mail($user_email, '密码重置请求', $message) ) {   
            $error .= "邮件发送失败-请联系客服。";   
           
        } else {   
           
            echo '<p class="success information">邮件已经发送到您的邮箱，请按照邮件提示进行重置密码。</p>';
        }   
    } else {   
           
        //输出表单--第四步中的代码应该包涵在这个对大括号内   
  
    }  
}


    if($_GET['key']!="" && $_GET['action'] == "reset_pwd"&&isset($_GET['login'])) {    
        $reset_key = $_GET['key']; //获取密匙   
        $user_login = $_GET['login']; //获取用户名   
        $user_data = $wpdb->get_row($wpdb->prepare("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = %s", $reset_key));   
        //通过key和用户名验证数据   
          $user_login = $user_data->user_login;
	   $user_email = $user_data->user_email;  
        if(!empty($user_data)&&!empty($reset_key) &&$error == ''){
      
         $new_password = wp_generate_password(7, false); //生成7位随机密码   
        //echo $new_password; exit();   
        wp_set_password( $new_password, $user_data->ID ); //重置密码   
        //通过邮件将密码发送给用户   
        $message = __('账户的新密码为:') . "\r\n\r\n";   
        $message .= get_option('siteurl') . "\r\n\r\n";   
        $message .= sprintf(__('用户名: %s'), $user_login) . "\r\n\r\n";   
        $message .= sprintf(__('密码: %s'), $new_password) . "\r\n\r\n";   
        $message .= __('你可以使用你的新密码通过下面的链接登录: ') .get_page_link( $shop_login ) . "\r\n\r\n";   
        if ( $message && !wp_mail($user_email, '密码重置请求', $message) ) {   
            $error .= "邮件发送失败-请联系客服";   
        
        } else {   
				 
			 $goto=get_page_link( $shop_login );
             
			   echo '<p class="success information">新的密码已经发送到您的邮箱，请查收，<a href="'.$goto.'">点击这里登录</a></p>';
			   
			   
          }  
                   
        } else{   
            echo '<p class="information">无效的key链接</p>';  
        }    
      } 


   	 

?>
<div class="shop_form">
<?php if($error !=''){echo '<p class="information">'.$error.'';}else if($success !=""){ echo '<p class="success information">'.$success.'';}else{ ?>
<p class="information">请输入你的注册用户名或者电子邮箱地址，系统会自动发送一封重置密码的邮件给您，按照邮件提示更新您的密码，如果无效请联系客服。</p>
<?php } if(!is_user_logged_in()){?>

  <form class="fogotpassword" id="wp_pass_reset" action="" method="post">   
        <div>  
        <label>用户名/邮箱：</label>
        <input type="text" class="text" name="user_input" value="" />  
        <input type="hidden" name="action" value="tg_pwd_reset" /> 
        <input type="hidden" name="tg_pwd_nonce" value="<?php echo wp_create_nonce("tg_pwd_nonce"); ?>" />    
        </div>
         <div>
     <label for="CAPTCHA">验 证 码：</label>
    <input id="CAPTCHA" style="width:110px;*float:left;" class="input" type="text" tabindex="24" size="10" value="" name="captcha_code" />
    </div>
     <div class="captcha">
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php?'+Math.random();document.getElementById('CAPTCHA').focus();return false;"><img id="captcha_img" src="<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php" /></a>
  <em>  看不清楚？点击图片换一张</em>
  </div>
        <div class="submit">
        
        <input type="submit" class="wp-submit" name="submit" value="找回密码" />   
        </div>
        </form>   
<div><a href="<?php  echo  get_page_link($shop_login); ?>">已有账号？ 登录</a> <a href="<?php  echo  get_page_link( $shop_register); ?>">注册一个账号</a></div>
</div>
 
<?php
 }else{echo "<p>您已经登录</p></div>";}}
function fogotpassword_shortcode() {
   
   fogotpassword();
    
}
add_shortcode('fogotpassword', 'fogotpassword_shortcode')
 ?>