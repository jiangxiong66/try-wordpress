<?php 
function profile_forms(){
	$shop_login = get_option('shop_login');
 $shop_register = get_option('shop_register');
 $shop_profile = get_option('shop_profile');
   $shop_pay_opens = get_option('shop_pay_opens');
     $shop_bbs_open=get_option('shop_bbs_open');
   $bbs_my_page=get_option('bbs_my_page');
    $shop_edit_profile = get_option('shop_edit_profile'); 
if (!is_user_logged_in()) { 
	
$url=get_page_link( $shop_login );
 header("Location: $url");
}
elseif($shop_pay_opens&&$shop_bbs_open){
	$url=get_page_link( $bbs_my_page);
    header("Location: $url");
	}
	elseif($shop_pay_opens&&!$shop_bbs_open){
		$url=get_page_link($shop_edit_profile );
        header("Location: $url");
		}
else{	 


	 if(isset($_POST['personal'])) {	
		
	 $error = '';
	 
	  $user_email_p = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '';
	  $last_name_p = isset( $_POST['last_name'] ) ? $_POST['last_name'] : '';
	  $Address_p = isset( $_POST['Address'] ) ? $_POST['Address'] : '';
	  $Phone_p = isset( $_POST['Phone'] ) ? $_POST['Phone'] : '';
	  $QQ_p = isset( $_POST['QQ'] ) ? $_POST['QQ'] : '';
	 
	 
	   if (  $Address_p == '' ) {
        $error .= '<strong>错误</strong>：请输入地址。<br />';
      } 
	   if (  $Phone_p == '' ) {
        $error .= '<strong>错误</strong>：请输入联系电话。<br />';
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
	if(!empty($error)) {
 echo '<div class="Success  information">'.$error.'</div>';
}
if(!empty( $Success )) {
  echo '<div class="information ">'. $Success .'</div>';
}

global $current_user;    get_currentuserinfo();
					 $user_ID = $current_user->id ;
					 $user_email =$current_user->user_email;
					 $last_name =$current_user->last_name;
	                 $Address = $current_user->Address ;
	                 $Phone = $current_user->Phone;
	                 $QQ = $current_user->QQ;	
					 $shop_edit_profile = get_option('shop_edit_profile'); 
   $shop_edit_url =get_page_link($shop_edit_profile);
    $bbs_post_avatar=get_option('bbs_post_avatar');
	
	if( get_usermeta($user_ID ,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_ID ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
?>


<h3 class="per">
<?php echo $avatar_bbs_avatar; ?>

<b>欢迎！<?php echo $current_user->nickname; ?> </b> <?php wp_loginout(get_bloginfo('url')); ?><a  href="<?php echo $shop_edit_url ; ?>" class="right_btn">[修改账户资料]</a></h3>

<?php if(empty($Phone)||empty($Address)){   ?>
<div class="shop_form">
<span class="information">请注意：请您完善您的个人收货地址和联系电话，这些资料我们会严格保密，不会被泄露，只会在发送货物时使用它们。</span>

<form name="registerform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" class="personal">

 <div>
      <label for="last_name">收货姓名:</label>
        <input id="last_name" class="input" tabindex="21" size="25" value="<?php echo  $last_name; ?>" name="last_name" /><em>*</em>
    </div>

 <div>
      <label for="Phone">联系电话:</label>
        <input id="Phone" class="input" tabindex="21" size="25" value="<?php echo  $Phone; ?>" name="Phone" /><em>*</em>
    </div>
    
    <div>
      <label for="user_email">联系邮件:</label>
        <input id="user_email" class="input" tabindex="21" size="25" value="<?php echo  $user_email; ?>" name="user_email" /><em>*（订单变化通知时，发送邮件）</em>
    </div>
    <div>
      <label for="QQ">联系QQ：</label><input id="QQ" class="input" tabindex="21" size="25" value="<?php echo  $QQ; ?>" name="QQ" /><em>(选填)</em>
    </div>
    
     <div>
      <label for="Address">收货地址*:</label>
      <textarea  id="Address" cols="25" rows="4"  name="Address" ></textarea>
        
    </div>
  <div class="submit">
      <input type="hidden" name="personal" value="ok" />
      <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="提交" />
    </div>
</form>

</div>
<?php } ?>

<?php
 if($_GET['cart']) {	order_list_cart();}else{
 order_list();
}
 }}
function profile_shortcode() {
   
  
    profile_forms();
  
}
add_shortcode('profile_short', 'profile_shortcode') ?>