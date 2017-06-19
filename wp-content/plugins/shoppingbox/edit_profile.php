<?php 
function edit_profile_forms(){
  $shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');
 $shop_profile = get_option('shop_profile');
  $shop_pay_opens = get_option('shop_pay_opens');	
if (!is_user_logged_in()) { 
 				 $url=get_page_link( $shop_login );
				 header("Location: $url");
				 };	 
	 if(isset($_POST['personal'])) {	
		
	 $error = '';
	 
	 $user_email_p = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '';
	  $last_name_p = isset( $_POST['last_name'] ) ? $_POST['last_name'] : '';
	  $Address_p = isset( $_POST['Address'] ) ? $_POST['Address'] : '';
	  $Phone_p = isset( $_POST['Phone'] ) ? $_POST['Phone'] : '';
	  $QQ_p = isset( $_POST['QQ'] ) ? $_POST['QQ'] : '';
	   if ( $user_email_p == '' ) {
        $error .= '<strong>错误</strong>：请填写电子邮件地址。<br />';
      }
	 
	 
	   if (  $Phone_p == '' ) {
        $error .= '<strong>错误</strong>：请输入联系电话。<br />';
      } 
	  if (   $QQ_p  == '' ) {
        $error .= '<strong>错误</strong>：请输入联系QQ。<br />';
      } 
	  
	   // Check the password
	    if(strlen($_POST['user_pass'])!=""){
      if(strlen($_POST['user_pass']) < 6)
        $error .= '<strong>错误</strong>：密码长度至少6位!<br />';
      elseif($_POST['user_pass'] != $_POST['user_pass2'])
        $error .= '<strong>错误</strong>：两次输入的密码必须一致!<br />';
		}
	  if($error == '') {
		   global $current_user;    get_currentuserinfo();
				  $user_id = $current_user->ID;
		  wp_update_user( array ( 'ID' => $user_id, 'user_email' =>  $user_email_p,   ) ) ;
		  update_usermeta($user_id,'last_name', $last_name_p);
	   	  update_usermeta($user_id,'Address',  $Address_p );
		  update_usermeta($user_id,'Address',  $Address_p );
		  update_usermeta($user_id,'Phone',  $Phone_p );
		  update_usermeta($user_id,'QQ',  $QQ_p );
           $Success ='修改成功';
		  
		  }
		
		}			 


global $current_user;    get_currentuserinfo();
					 $user_ID = $current_user->id ;
					 $user_email =$current_user->user_email;
					 $last_name =$current_user->last_name;
	                 $Address = $current_user->Address ;
	                 $Phone = $current_user->Phone;
	                 $QQ = $current_user->QQ;	
					
                    $shop_profile = get_option('shop_profile');
                    $shop_profile_url=get_page_link($shop_profile);
	                $bbs_post_avatar=get_option('bbs_post_avatar');
	if( get_usermeta($user_ID ,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_ID ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
 ?>
 
 <div class="shop_form">
 <?php 	if(!empty($error)) {echo '<span class="information">'.$error.'</span>';}
        if(!empty($Success)) {echo '<span class="success information">'.$Success.'</span>';}
 
 ?>
<h3 class="per">
<?php echo $avatar_bbs_avatar; ?>

<b>欢迎！<?php echo $current_user->nickname; ?> </b> <?php wp_loginout(get_bloginfo('url')); ?><a  href="<?php echo $shop_profile_url; ?>" class="right_btn">[返回个人中心]</a></h3>

  <br />



<form name="registerform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="personal">

<div>
      <label for="last_name">用户名:</label>
      <em><?php echo $current_user->display_name;?></em>
    </div>

 <div>
      <label for="last_name"><?php if(!$shop_pay_opens) {echo'收货姓名:';}else{ echo '姓名';}?></label>
        <input id="last_name" class="input" tabindex="21" size="25" value="<?php echo  $last_name; ?>" name="last_name" />
    </div>

 <div>
      <label for="Phone">联系电话:</label>
        <input id="Phone" class="input" tabindex="21" size="25" value="<?php echo  $Phone; ?>" name="Phone" />
    </div>
    
    <div>
      <label for="user_email">联系邮件:</label>
        <input id="user_email" class="input" tabindex="21" size="25" value="<?php echo  $user_email; ?>" name="user_email" /><em><?php if(!$shop_pay_opens) {echo'*（邮箱可以作为用户名登陆，并通知您货物发送状态）';}else{ echo '请填写联系邮件，邮箱可以作为用户名登陆';} ?></em>
    </div>
    <div>
      <label for="QQ">联系QQ：</label><input id="QQ" class="input" tabindex="21" size="25" value="<?php echo  $QQ; ?>" name="QQ" /><em>(选填)</em>
    </div>
    
    <div>
      <label for="user_pwd1">密码(至少6位)</label>
        <input id="user_pwd1" class="input" type="password" tabindex="21" size="25" value="" name="user_pass" />
      
    </div>
   
    <div>
      <label for="user_pwd2">重复密码</label>
        <input id="user_pwd2" class="input" type="password" tabindex="21" size="25" value="" name="user_pass2" />
    </div>
    <?php if( !$shop_pay_opens) { ?>
     <div>
      <label for="Address">收货地址</label>
      <textarea  id="Address" cols="25" rows="4"  name="Address" ><?php echo $Address ; ?></textarea>
        
    </div>
    <?php } ?>
  <div class="submit">
      <input type="hidden" name="personal" value="ok" />
      <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="提交" />
    </div>
</form>

</div>

 
 <?php  }
 
 function edit_profile_shortcode() {
   
    edit_profile_forms();
    
}
add_shortcode('edit_profile', 'edit_profile_shortcode')
 
 ?>