<?php 
function login_forms(){
if(!isset($_SESSION)){
  session_start(); 
  }
 $shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');
 $shop_profile = get_option('shop_profile');
  $shop_fogotpassword = get_option('shop_fogotpassword');
 $error_login_time = get_option('error_login_time');	
if (is_user_logged_in()) { 
 				 $url=get_page_link( $shop_profile );
					
					 header("Location: $url");
				 };	

 if( !empty( $_POST['log'])&& !empty( $_POST['pwd'])) {

  $error = '';
  $secure_cookie = false;
  $user_name = sanitize_user( $_POST['log'] );
  $user_password = $_POST['pwd'];
  $admin = new WP_User( null, $user_name );
  $secure_user= new WP_User( null, $user_name );
  $secure_degree=get_the_author_meta( 'secure_user', $secure_user->ID );
  $secure_time =get_the_author_meta( 'secure_time', $secure_user->ID );
  $time_s=date('Y-m-d h:i:s',time());
  if($secure_time !=""){$minute=floor((strtotime($time_s)-strtotime($secure_time))%86400/60);}else{$minute='0';};
      if($secure_degree=="5"){$error ="用户已经锁定，请联系管理员";}
 
	 if($minute < $error_login_time&&$secure_time!=''){
		 if($secure_degree==4){$error =('<strong>错误!请再次输入。</strong>');}else{
      $error =('<strong>错误!密码连续输入错误5次，请'.( $error_login_time-$minute).'分钟之后再次登录。</strong>');}
	  delete_usermeta( $secure_user->ID, 'secure_user');  }else{
       if($secure_degree > 2){	   
  if(empty($_POST['captcha_code']) || empty($_SESSION['secretword']) || (trim(strtolower($_POST['captcha_code'])) != $_SESSION['secretword'])) {
   $error .=('<strong>错误</strong>：验证码不正确<br />');
  };
	}
  if ( empty($user_name) || ! validate_username( $user_name ) ) {
    $error .= '<strong>错误</strong>：请输入有效的用户名。<br />';
    $user_name = '';
  }

  if( empty($user_password) ) {
    $error .= '<strong>错误</strong>：请输入密码。<br />';
  }
  
 
			
  if($error == '') {
    // If the user wants ssl but the session is not ssl, force a secure cookie.
    if ( !empty($user_name) && !force_ssl_admin() ) {
      if ( $user = get_user_by('login', $user_name)||$user = get_user_by('email', $user_name) ) {
        if ( get_user_option('use_ssl', $user->ID) ) {
          $secure_cookie = true;
          force_ssl_admin(true);
        }
      }

    }
     
    if ( isset( $_GET['r'] ) ) {
      $redirect_to = $_GET['r'];
      // Redirect to https if user wants ssl
      if ( $secure_cookie && false !== strpos($redirect_to, 'wp-admin') )
        $redirect_to = preg_replace('|^http://|', 'https://', $redirect_to);
		
    }
    else {
      $redirect_to =get_page_link( $shop_profile );
    }
   
    if ( !$secure_cookie && is_ssl() && force_ssl_login() && !force_ssl_admin() && ( 0 !== strpos($redirect_to, 'https') ) && ( 0 === strpos($redirect_to, 'http') ) )
      $secure_cookie = false;
   
    $creds = array();
    $creds['user_login'] = $user_name;
    $creds['user_password'] = $user_password;
    $creds['remember'] = !empty( $_POST['rememberme'] );
    $user = wp_signon( $creds, $secure_cookie );
    if ( is_wp_error($user) ) {
      $error .= $user->get_error_message();
    }
    else {
      update_usermeta( $secure_user->ID, 'secure_user', '' );
      wp_safe_redirect($redirect_to);
    }
  }



if(!empty($error)) {
  if ( $admin->has_cap( "edit_post") ) {
            $admin_email = get_bloginfo ('admin_email');
			
           
	        $subject = '[警告！]有人正在尝试登录您的管理员账户。';
			$message = '安全警告！你的网站(' . get_option("blogname") . ')有编辑权限以上账户尝试登录了三次没有成功，已经被锁定'.$error_login_time.'分钟，如果是您自己登录的，请忽略本次提醒,如果不是您自己登录的，请注意防范您的用户名是否泄漏、或者用户名太简单而被猜测出，,
若是弱安全密码与账户，请尽快更换管理员账号与密码！';
		    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
	        $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
	      if($secure_degree>=2){	$admin_email = get_bloginfo ('admin_email'); 
		   update_usermeta( $secure_user->ID, 'secure_user', '4' );
		   if ( $message && !wp_mail( $admin_email, $subject, $message ) ) {   
           
        
        }};
		  
            }
	  if(empty($secure_degree)){update_usermeta( $secure_user->ID, 'secure_user', '1' );
		  }elseif($secure_degree==1){ update_usermeta( $secure_user->ID, 'secure_user', '2' );}
		  elseif($secure_degree==2){ update_usermeta( $secure_user->ID, 'secure_user', '3' );}
		   elseif($secure_degree==3){ update_usermeta( $secure_user->ID, 'secure_user', '4' );}
		  elseif($secure_degree==4){ update_usermeta( $secure_user->ID, 'secure_user', '4' );
		                             update_usermeta( $secure_user->ID, 'secure_time', $time_s );
		  
		  }
		 
			
			}else if(empty($error)){
				  delete_usermeta( $secure_user->ID, 'secure_user');
		          delete_usermeta( $secure_user->ID, 'secure_time' );
				}
		

}
}
$rememberme = !empty( $_POST['rememberme'] );

if(!empty($error)) {
echo '<span class="information">'.$error.'</span>';
}
if (!is_user_logged_in()) {?>
<div class="shop_form">
<form name="loginform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <div>
      <label for="log">用户名/邮箱：</label><input type="text" name="log" id="log" class="input" size="25" value="<?php if(!empty($user_name)) echo $user_name; ?>" size="20" />
      
    </div>
    <div>
      <label for="pwd">密  码：</label>
        <input id="pwd" class="input" type="password" size="25" value="" name="pwd" /><em>(至少6位) </em>
   
    </div>
   
    <div class="forgetmenot">
     <label for="rememberme"> </label>
        <input name="rememberme" type="checkbox" id="rememberme" value="1" <?php checked( $rememberme ); ?> />
       
      <em> 记住我 </em>
    </div>


 <?php if($secure_degree>2){	    ?>
  <div>
   <label for="CAPTCHA">验 证 码：</label>
    <input id="CAPTCHA" style="width:110px;*float:left;" class="input" type="text" tabindex="24" size="10" value="" name="captcha_code" />
    </div>
       <div class="captcha">
    <a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php?'+Math.random();document.getElementById('CAPTCHA').focus();return false;"><img id="captcha_img" src="<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php" /></a>
  <em>  看不清楚？点击图片换一张</em>
  </div>
 <?php } ?>
    <div class="submit">
      <input type="hidden" name="redirect_to" value="<?php if(isset($_GET['r'])) echo $_GET['r']; ?>" />
      <button name="submit" class="wp-submit"type="submit">登录</button>
    </div>
        <?php if(get_option('shop_qqlogin_open')) {qq_login_btn();} ?>
    <div> <a  href="<?php  echo  get_page_link( $shop_register); ?>">注册一个账号</a> <a href="<?php echo get_page_link( $shop_fogotpassword); ?>">忘记密码？</a></div>

    </div>
</form>

<?php } else {
echo '<p>您已登录！（<a href="'.wp_logout_url().'" title="登出">登出？</a>）</p>';
} 

 }
function login_shortcode() {
   ob_start();
    login_forms();
      return ob_get_clean();
}
add_shortcode('login_short', 'login_shortcode')
 ?>