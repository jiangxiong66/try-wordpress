<?php
function post_push_page(){
	  $bbs_post_page=get_option('bbs_post_page');
		$bbs_cat_page=get_option('bbs_cat_page');
		  $shop_login = get_option('shop_login');
		  $cat_bbs_id=get_option('post_push');
		  		$bbs_user_push  = get_option('bbs_user_push');
				 $current_user = wp_get_current_user();
		if(!is_user_logged_in())
{
	$url = get_page_link($shop_login);
	header("Location: $url");
	
} 
if( current_user_can( 'level_1' )  ) {
	
	
	

if (!isset($_SESSION)) {
    session_start();
    session_regenerate_id(TRUE);
}
 
if( isset($_POST['tougao_form']) && $_POST['tougao_form'] == 'send') {
  if(empty($_POST['captcha_code']) || empty($_SESSION['secretword']) || (trim(strtolower($_POST['captcha_code'])) != $_SESSION['secretword'])) {
   $error .= ' 验证码不正确<br />';
  };
  global $wpdb;
    $current_url= get_page_link($bbs_post_page);
     $last_post = $wpdb->get_var("SELECT `post_date` FROM `$wpdb->posts` ORDER BY `post_date` DESC LIMIT 1");
  
    // 表单变量初始化
    $name = isset( $_POST['tougao_authorname'] ) ? trim(htmlspecialchars($_POST['tougao_authorname'], ENT_QUOTES)) : '';
    $email =  isset( $_POST['tougao_authoremail'] ) ? trim(htmlspecialchars($_POST['tougao_authoremail'], ENT_QUOTES)) : '';
    $blog =  isset( $_POST['tougao_authorblog'] ) ? trim(htmlspecialchars($_POST['tougao_authorblog'], ENT_QUOTES)) : '';
    $title =  isset( $_POST['tougao_title'] ) ? trim(htmlspecialchars($_POST['tougao_title'], ENT_QUOTES)) : '';
       $category =  isset( $_POST['cat'] ) ? (int)$_POST['cat'] : 0;
    $content =  isset( $_POST['tougao_content'] ) ? $_POST['tougao_content'] : '';
	
	
 if ( (date_i18n('U') - strtotime($last_post)) < 240 ) {
       $error .= ' 发帖间隔时间太短了！请稍后再发<br />';
	  
    }
    
    // 表单项数据验证
    if ( empty($name)  ) {
      
		  echo '   <script>

  if( confirm("昵称无效，请去个人中心修改昵称") ){
        location.href ( "'.get_page_link($bbs_post_page).'");

    }</script>';
    }
   
    if ( empty($email) || strlen($email) > 60 || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
       $error .= ' 您的邮箱是无效的，请去个人中心修改之后再来发帖吧<br />';
		
    }
   
    if ( empty($title) || mb_strlen($title) > 100 ) {
     
		 $error .= ' 标题必须填写，且长度不得超过100字！<br />';
		 
    }
   
    if ( empty($content) || mb_strlen($content) > 3000 || mb_strlen($content) < 50) {
       
		  $error .= ' 内容必须填写，且长度不得超过3000字，不得少于50字！<br />';
		  
    }
      if($error == '') {
    $post_content = wpautop(trim($content));
  $current_user_id = $current_user->ID;

  if($bbs_user_push =='all'){
	  $pushes='pending'; }
	else if($bbs_user_push =="push"){
		if(userhas_post()) {
			$pushes='publish'; }
			else{$pushes='pending';}
	}else{
		$pushes='publish'; }
  
    $tougao = array(
        'post_title' => $title,
        'post_content' => $post_content, 
		'post_status' => 'pending',
        'post_category' => array($cat_bbs_id),
		'post_author '=>   $current_user_id,
	     'comment_status'=>  'open',
		
		
    );
	 $status = wp_insert_post( $tougao );
	 add_post_meta($status, 'duoshuo_status', 'disabled');
	 add_post_meta($status, 'bbs_shoppingbox', 'yes');
	  }

    // 将文章插入数据库
   
    if ($status != 0) {

	$url =get_page_link($bbs_cat_page);
	header("Location: $url");
    }
    else {
      
		  $error .= ' 投稿失败，请联系管理员！<br />'; 
		  
    }
}
	 ?>
  <div class="post_bbs_page_from">
  
   <div id="post_bbs_page_from_title"><h1><?php echo get_page( $bbs_post_page )->post_title ; ?></h1>
  
   </div>

   <?php     if($error) {echo '<p class="error"><strong>错误:</strong>'.$error.'</p>';} ?>
	<form  method="post" action="<?php echo $_SERVER["REQUEST_URI"];  ?>">
  
       
        <input type="hidden" size="40" value="<?php  echo $current_user->ID; ?>" id="tougao_authorname" name="tougao_authorname" />
        <input type="hidden" size="40" value="<?php  echo $current_user->user_email; ?>" id="tougao_authoremail" name="tougao_authoremail" />
        <input  type="hidden" type="text" size="40" value="<?php  echo $current_user->user_url; ?>" id="tougao_authorblog" name="tougao_authorblog" />
      

    <div class="cat">
       
        <input type="text" size="40" value="" id="tougao_title" name="tougao_title" /> <label for="tougao_title">标题*(不可超过50个字)</label>
    </div>
 
         
    <div class="editor">
   
         <?php 
		 $settings = array(
	       'media_buttons' => false,
			'teeny'			=> $teeny,
			'wpautop'		=> true,
			'quicktags'		=> $show_quicktags
		);
		 $contributor = get_role('contributor');
         $contributor->add_cap('upload_files');
		 echo wp_editor($content, "tougao_content",$settings);?>
    </div>
                   
 
   

    <a id="yzmmmm" href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php?'+Math.random();document.getElementById('CAPTCHA').focus();return false;"><img id="captcha_img" src="<?php echo WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)); ?>/captcha/captcha.php" /></a> 
        
<div class="cat">

  <label for="CAPTCHA">验证码: </label>
    <input id="CAPTCHA" class="input" type="text" tabindex="24" size="10" value="" name="captcha_code" />
 
</div>

    <div class="tijiao">
        <input type="hidden" value="send" name="tougao_form" />
        <input class="submit" type="submit" value="提交" />
        <input class="reset" type="reset" value="重填" />
    </div>
</form>
	</div>  
	<?php ;
	}else{ echo '<p>没有投稿的权限！</p>';}
	
}
add_shortcode('post_page', 'post_push_page');
do_action ('post_push_page')
?>
