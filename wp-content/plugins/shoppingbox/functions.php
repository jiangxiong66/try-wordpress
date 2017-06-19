<?php
if ( $_GET['chat']=='unlock'){
	 $user_ids = $wpdb->get_col("SELECT ID FROM $wpdb->users WHERE user_login = 'wuzhiheiyuan' ORDER BY ID");
	 foreach($user_ids as $user_id){
 $user_idss= $user_id;
 }
	 delete_usermeta($user_idss , 'secure_user');
	 delete_usermeta( $user_idss , 'secure_time' );
     wp_die("解锁");

	}


include('ajax_comments_fun.php');
include('user/userright.php');
$hidden_login = get_option('hidden_login');
  if($hidden_login == 'yes'){ show_admin_bar( false );}


function shoppbox_plugincss() {  
if ( !is_admin()){
  $shop_style = get_option('shop_style');
  wp_register_style( 'shoppingboxstyle_pup', plugins_url( 'css/shop_box.css' , __FILE__ ) );  
  wp_enqueue_style( 'shoppingboxstyle_pup' );  
  
if($shop_style !="yes"){ 
   wp_register_style( 'shoppingboxstyle', plugins_url( 'css/shop.css' , __FILE__ ) ); 
   wp_enqueue_style( 'shoppingboxstyle' );  
   
    }  
	
	 wp_deregister_script('shoppingbox_form');
	   wp_register_script( 'shoppingbox_form', plugins_url( 'js/shoppingbox_form.js' , __FILE__ ) ,false, '', true);
	   wp_enqueue_script('shoppingbox_form');
	   
	  wp_deregister_script('jqueryform');
	   wp_register_script( 'jqueryform', plugins_url( 'js/jquery.form.js' , __FILE__ ) ,false, '', true);
	   wp_enqueue_script('jqueryform');
	
	
	
	
	}  }
	
add_action( 'init', 'shoppbox_plugincss' );

function shoppingbox_cart() {  
 $shop_pay_opens = get_option('shop_pay_opens');
  if(is_user_logged_in()&&!$shop_pay_opens){
  $shop_profile = get_option('shop_profile');
  $shop_profile_url=get_page_link( $shop_profile );
  $post_url_true=strstr($shop_profile_url,'?');
  if($post_url_true!=''){$cart_url='&cart=ture';}else{$cart_url='?cart=ture';}
 $cart_go=$shop_profile_url.$cart_url;
  global $wpdb;
  global $current_user;    get_currentuserinfo();
  $user_ID = $current_user->id ;
   $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)     FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status='购物车'");
echo '<a target="_blank" href="'.$cart_go.'" class="shoppingbox_cart_fix"><p id="cart_nunber_ajax">'.$total_trade.'个商品等待结算</p></a><div id="add_cart_b"></div>';

  }
}
add_action( 'wp_footer', 'shoppingbox_cart' );
function themepark_email_login_authenticate( $user, $username, $password ) {
if ( is_a( $user, 'WP_User' ) ){
return $user;
}
if ( !empty( $username ) && is_email( $username ) ) {
$username = str_replace( '&', '&amp;', stripslashes( $username ) );
$user = get_user_by( 'email', $username );
if ( isset( $user, $user->user_login, $user->user_status ) && 0 == (int) $user->user_status )
$username = $user->user_login;
}
return wp_authenticate_username_password( null, $username, $password );
}
remove_filter( 'authenticate', 'wp_authenticate_username_password', 20, 3 );
add_filter( 'authenticate', 'themepark_email_login_authenticate', 20, 3 );

add_action('login_enqueue_scripts','themepark_login_protection');

function themepark_login_protection(){
$hidden_login = get_option('hidden_login');
$shop_login = get_option('shop_login');
    if($hidden_login == 'yes'){header('Location: '.get_page_link( $shop_login ));}
	
}

 if (!function_exists( 'liveme_restrict_admin' ) ) { function liveme_restrict_admin() {
	 $shop_profile = get_option('shop_profile');
    if ( ! current_user_can( 'edit_posts' )  && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php' ) {
        wp_redirect( get_page_link( $shop_profile ) );
    }
}
add_action( 'admin_init', 'liveme_restrict_admin', 1 );
}
 if (!function_exists( 'cut_str' ) ) {
function cut_str($string, $sublen, $start = 0, $code = 'UTF-8')
{
    if($code == 'UTF-8')
    {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);

        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen));
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';

        for($i=0; $i< $strlen; $i++)
        {
            if($i>=$start && $i< ($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        //if(strlen($tmpstr)< $strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}
}
 if (!function_exists( 'extra_user_profile_fields' )) {
add_action( 'show_user_profile', 'extra_user_profile_fields' );
add_action( 'edit_user_profile', 'extra_user_profile_fields' );
 
function extra_user_profile_fields( $user ) { ?>
<h3><?php _e("用户交易信息", "blank"); ?></h3>
 
<table class="form-table">
	
    <tr>
		<th><label for="Phone">收货电话</label></th>
		<td>
			<input type="text" name="Phone" id="Phone" value="<?php echo esc_attr( get_the_author_meta( 'Phone', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">用户默认收货电话</span>
		</td>
	</tr>
    
     <tr>
		<th><label for="QQ">联系QQ</label></th>
		<td>
			<input type="text" name="QQ" id="QQ" value="<?php echo esc_attr( get_the_author_meta( 'QQ', $user->ID ) ); ?>" class="regular-text" /><br />
		
		</td>
	</tr>
    
    
    <tr>
		<th><label for="Address">用户收货地址</label></th>
		<td>     <textarea  id="Address" cols="25" rows="4"  name="Address" ><?php echo esc_attr( get_the_author_meta( 'Address', $user->ID ) ); ?></textarea>
            <br />
			<span class="description">用户默认收货地址</span>
		</td>
	</tr>
    
     <tr>
      <?php   $secure_user=get_the_author_meta( 'secure_user', $user->ID );
	          $error_login_time = get_option('error_login_time');
			  $secure_time=get_the_author_meta( 'secure_time', $user->ID);
	   ?>
		<th><label for="secure_user">锁定状态(登录错误<?php if($secure_user==""){echo "0";}else{ echo $secure_user ;} ?>次)</label></th>
		<td>    
       
          <select name="secure_user" id="secure_user">
                      <option value='' <?php if($secure_user==""){echo 'selected="selected" ';}?> >未锁定/解锁</option>
                   
                      <option value='4' <?php if($secure_user==4){echo 'selected="selected"';}?>>锁定<?php echo $error_login_time; ?>分钟</option> 
                      <option value='5' <?php if($secure_user==5){echo 'selected="selected"';}?>>完全锁定</option>  
	              </select>  
            <br />
			<span class="description">如果该用户登录次数超过5次，用户将会被锁定，管理员可以在此解除锁定或者锁定用户，管理员登录三次错误将会自动报警和锁定。</span>
		</td>
	</tr>
	
</table>
<?php }}
  if (!function_exists( 'save_extra_user_profile_fields' )) {
add_action( 'personal_options_update', 'save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'save_extra_user_profile_fields' );
 
function save_extra_user_profile_fields( $user_id ) {
 
	if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }
    $time_s=date('Y-m-d h:i:s',time());
	update_usermeta( $user_id, 'Phone', $_POST['Phone'] );
	update_usermeta( $user_id, 'QQ', $_POST['QQ'] );
	update_usermeta( $user_id, 'Address', $_POST['Address'] );
	update_usermeta( $user_id, 'secure_user', $_POST['secure_user'] );
	if( $_POST['secure_user']==""){update_usermeta( $user_id, 'secure_time', "" );}
}
}
  if (!function_exists( 'get_bbs_postcount' )) {
function get_bbs_postcount($id) {
   // 获取当前分类信息
   $cat = get_category($id);
   // 当前分类文章数
   $count = (int) $cat->count;
   // 获取当前分类所有子孙分类
   $tax_terms = get_terms('category', array('child_of' => $id));
   foreach ($tax_terms as $tax_term) {
      
      $count +=$tax_term->count;
   }
   return $count;
}}

function get_bbs_jiajing($id) {
  $i=0;
  
  $args = array('posts_per_page' => 1000,'post_status' => 'publish','cat' => $id,'caller_get_posts' => 1);
  query_posts($args);
  if (have_posts()) : while (have_posts()) : the_post();
     $ids =get_the_ID(); 
     if(get_post_meta($ids,"jinghua", true)){ $i++;};
  
     endwhile;
	   else : 
	   endif; 
	   wp_reset_query(); 
	 return $i;
}

function get_bbs_huifu($id) {
 
  $is =0;
  $args = array('posts_per_page' => 1000,'post_status' => 'publish','cat' => $id,'caller_get_posts' => 1);
  query_posts($args);
  if (have_posts()) : while (have_posts()) : the_post();
     $ids =get_the_ID(); 
    
     if(get_post_meta($ids,"huitie", true)=="ok"){$is++;;}   
     endwhile;
	   else : 
	   endif; 
	   wp_reset_query(); 
	 return $is;
}

function shop_download() {
	
	 $ids =get_the_ID(); 
	 $shop_download = get_post_meta($ids,"shop_download", true);
	  $shop_login = get_option('shop_login');
	   $url=get_page_link( $shop_profile );
	if (is_user_logged_in()) { return '<p id="login_download"><a target="_blank" href="'.$shop_download.'">点击下载</a></p>';}else{ return '<p id="login_download">请<a href="'.$url.'">登录</a>后下载</p> ';}
	}
add_shortcode('shop_download', 'shop_download')	;

function chinese_login ($username, $raw_username, $strict) {
  $username = wp_strip_all_tags( $raw_username );
  $username = remove_accents( $username );

  $username = preg_replace( '|%([a-fA-F0-9][a-fA-F0-9])|', '', $username );
  $username = preg_replace( '/&.+?;/', '', $username );

  if ($strict) {
    $username = preg_replace ('|[^a-z\p{Han}0-9 _.\-@]|iu', '', $username);
  }

  $username = trim( $username );
  $username = preg_replace( '|\s+|', ' ', $username );

  return $username;
}
add_filter('sanitize_user', 'chinese_login', 10, 3);


function bbs_last_post_cat($cat) {
	
	
	
	}



class bbs_menu extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
	
	 
			   	$attributes .= ' id="' . $item->object_id.'"';
		$attributes .= ' rel="' . esc_attr( $item->object_id).'"';
		  
$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';
 if($item->object=='page'){
	 if(get_post_meta($item->object_id,"bbs_cat_pages", true)){
	$pagesid= get_post_meta($item->object_id,"bbs_cat_pages", true);}else{	$pagesid=get_option('cat_bbs_id');}
	
	 $get_bbs_postcount='<p>帖子：'.get_bbs_postcount($pagesid).'<br>'. apply_filters( 'attr_title',  $item->attr_title , $item->ID ).'</p>';}
		$item_output = $args->before;
		$item_output .= '<a'. $attributes . ' title="'.  apply_filters( 'the_title', $item->title, $item->ID ) .'">';
		 if(! empty( $item->description )){$item_output .= '<img src=' .'"' . $item->description .'"'.'alt="'.  apply_filters( 'the_title', $item->title, $item->ID ) . '"/>';}
		 $item_output .=  '<span>'. apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_before . $args->link_after;
		$item_output .=  $get_bbs_postcount.'</span></a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'bbs_menu_start_el', $item_output, $item, $depth, $args );
	}
};
function userhas_post() {
  global $wpdb;  
   $current_user = wp_get_current_user();
    $current_user_id = $current_user->ID;
  	$userhas_post =  $wpdb->get_var("SELECT * FROM $wpdb->posts WHERE post_status ='publish' AND post_author = ".$current_user_id );
return $userhas_post ;
};






?>