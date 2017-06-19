<?php 
if(!isset($_SESSION)){
  session_start(); }
function register_forms(){
   $shop_login = get_option('shop_login');
 $shop_profile = get_option('shop_profile');	
if (is_user_logged_in()) { 
 				 $url=get_page_link( $shop_profile );
					
					 header("Location: $url");
				 };	

 if( !empty($_POST['register']) ) {
  $error = '';
  $sanitized_user_login = sanitize_user( $_POST['user_login'] );
  $user_email = apply_filters( 'user_registration_email', $_POST['user_email'] );

   if(empty($_POST['captcha_code']) || empty($_SESSION['secretword']) || (trim(strtolower($_POST['captcha_code'])) != $_SESSION['secretword'])) {
   $error .=('<strong>错误</strong>：验证码不正确<br />');
  };
  if ( $sanitized_user_login == '' ) {
    $error .= '<strong>错误</strong>：请输入用户名。<br />';
  } elseif ( ! validate_username( $sanitized_user_login ) ) {
    $error .= '<strong>错误</strong>：此用户名包含无效字符，请输入有效的用户名<br />。';
    $sanitized_user_login = '';
  } elseif ( username_exists( $sanitized_user_login ) ) {
    $error .= '<strong>错误</strong>：该用户名已被注册，请再选择一个。<br />';
  }

  // Check the e-mail address
  if ( $user_email == '' ) {
    $error .= '<strong>错误</strong>：请填写电子邮件地址。<br />';
  } elseif ( ! is_email( $user_email ) ) {
    $error .= '<strong>错误</strong>：电子邮件地址不正确。！<br />';
    $user_email = '';
  } elseif ( email_exists( $user_email ) ) {
    $error .= '<strong>错误</strong>：该电子邮件地址已经被注册，请换一个。<br />';
  }
   
  // Check the password
  if(strlen($_POST['user_pass']) < 6)
    $error .= '<strong>错误</strong>：密码长度至少6位!<br />';
  elseif($_POST['user_pass'] != $_POST['user_pass2'])
    $error .= '<strong>错误</strong>：两次输入的密码必须一致!<br />';
     
    if($error == '') {
    $user_id = wp_create_user( $sanitized_user_login, $_POST['user_pass'], $user_email );
   
    if ( ! $user_id ) {
      $error .= sprintf( '<strong>错误</strong>：无法完成您的注册请求... 请联系<a href=\"mailto:%s\">管理员</a>！<br />', get_option( 'admin_email' ) );
    }
    else if (!is_user_logged_in()) {
      $user = get_userdatabylogin($sanitized_user_login);
      $user_id = $user->ID;
      $redirect_to = get_page_link( $shop_profile );
      // 自动登录
      wp_set_current_user($user_id, $user_login);
      wp_set_auth_cookie($user_id);
      do_action('wp_login', $user_login);
	  wp_safe_redirect($redirect_to);
    }
  }
}

?>

<?php if(!empty($error)) {
 echo '<span class="information">'.$error.'</span>';
}
if (!is_user_logged_in()) { ?>
<div class="shop_form">
<form name="registerform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="register_form">
    <div>
      <label for="user_login">用 户 名：</label>
        <input type="text" name="user_login" tabindex="1" id="user_login" class="input" value="<?php if(!empty($sanitized_user_login)) echo $sanitized_user_login; ?>" />
    
    </div>

    <div>
      <label for="user_email">电子邮件：</label>
        <input type="text" name="user_email" tabindex="2" id="user_email" class="input" value="<?php if(!empty($user_email)) echo $user_email; ?>" size="25" />
      
    </div>
   
    <div>
      <label for="user_pwd1">密   码：</label>
        <input id="user_pwd1" class="input" tabindex="3" type="password" tabindex="21" size="25" value="" name="user_pass" /><em>(至少6位)</em>
      
    </div>
   
    <div>
      <label for="user_pwd2">重复密码：</label>
        <input id="user_pwd2" class="input" tabindex="4" type="password" tabindex="21" size="25" value="" name="user_pass2" />
      
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
      <input type="hidden" name="register" value="ok" />
      <button class="wp-submit" type="submit">注册</button>
    </div>
         <?php if(get_option('shop_qqlogin_open')) {qq_login_btn();} ?>
    <div><a href="<?php  echo  get_page_link($shop_login); ?>">已有账号？ 登录</a></div>
</form>

</div>
<?php } else {
 echo '<p class="register_error">您已注册成功，并已登录！</p>';
} ?>

<?php

 }
function register_shortcode() {
    ob_start();
    register_forms();
      return ob_get_clean();
}
add_shortcode('register_short', 'register_shortcode')
 ?>