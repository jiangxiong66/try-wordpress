<?php
function my_bbs(){
	 $shop_edit_profile = get_option('shop_edit_profile'); 
  $shop_edit_url =get_page_link($shop_edit_profile);
  $shop_bbs_open=get_option('shop_bbs_open');
  $shop_profile = get_option('shop_profile');
	$bbs_my_page=get_option('bbs_my_page');
	   $shop_pay_opens = get_option('shop_pay_opens');
	 global $wpdb;
	global $current_user;    get_currentuserinfo();
					 $user_ID = $current_user->id ;
					   $total_trade   = $wpdb->get_var("SELECT COUNT(alipay_id)  FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status !='购物车'"); 
			  $total_trade_cart   = $wpdb->get_var("SELECT COUNT(alipay_id)  FROM $wpdb->alipay WHERE  alipay_user='".$user_ID."' and alipay_status ='购物车'"); 
					   $shop_edit_url =get_page_link($shop_edit_profile);
    $bbs_post_avatar=get_option('bbs_post_avatar');
	
	if( get_usermeta($user_ID ,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($user_ID ,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}	
		if(!$shop_pay_opens){$shop_btn_bb='<a href="'.get_page_link( $shop_profile ).'">进行中的订单（'.$total_trade.'）</a><a href="'.get_page_link( $shop_profile ).$cart_url.'">购物车（'. $total_trade_cart.'）</a>';}
		$cat_bbs_list .='
		
		<h3 class="per">
'. $avatar_bbs_avatar.'

<b>欢迎！'. $current_user->display_name .' </b><a  href="'. $shop_edit_url .'" class="right_btn">[修改账户资料]</a></h3>
		
		 <h3 class="per_title">'.$shop_btn_bb.'<a  class="info"  href="'.get_page_link( $bbs_my_page ).'">我的帖子</a></h3>
		
		<div id="cat_bbs_list" class="mybbs"> <ul>';
	global $current_user;    get_currentuserinfo();
		   $user_ID = $current_user->id ;
$cat_bbs_id=get_option('cat_bbs_id');
	$bbs_cat_page=get_option('bbs_cat_page');
	$bbs_post_page=get_option('bbs_post_page');
	$bbs_post_zd_n =get_option('bbs_post_zd_n');
	$bbs_post_nzd_n =get_option('bbs_post_nzd_n');
	$args = array(
'posts_per_page' =>10,
'paged' => $paged,
'post_status' => 'publish',
'cat' => $cat_bbs_id,
'author' =>  $current_user->id  ,
);
query_posts($args);
if (have_posts()) : while (have_posts()) : the_post();	 
	 
	  if(get_post_meta($id,"huitie", true)){$huitie = '<b class="bbs_over">已经回答</b> ';};
	   if(get_post_meta($id,"jinghua", true)=="ok"){$jinghua ='<b class="jinghua">精华</b>';}
	  
	 
	 $id =get_the_ID(); 
	$author_id=get_the_author_meta( 'ID' );
	
	$bbs_post_avatar=get_option('bbs_post_avatar');
	 $author_bbs_avatar = get_usermeta($author_id,'qq_user_avatar');
	 $author_name =get_usermeta($author_id,'nickname');
	 if( $author_bbs_avatar){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. $author_bbs_avatar.'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
	$cat_bbs_list .=' <li>
	 <div id="author_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$avatar_bbs_avatar .'</a>
	 <b>'.$author_name.'</b>
	 </div>
	<span class="left_bbs_single">
	   <a class="bbs_a_title" target="_blank" href="'. get_the_permalink().'">'.get_the_title().'</a>
	   <div> '.$jinghua.$huitie.'   <b>已有 '.get_comments_number('0', '1', '% ' ).' 回帖</b>  </div>
	   <p>'.  mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_content($id))),0,300,"...").'</p>
	</span>
	</li>';
	 
	 
	 
	
  endwhile;
 else : 
	endif; 
	if(function_exists('par_pagenavi')){ ob_start();  par_pagenavi(9);$par_pagenavi = ob_get_contents(); ob_end_clean();  ;};
	$cat_bbs_list .='</ul><div class="nav_bbs">'.$par_pagenavi.'</div></div>';
	wp_reset_query();
return $cat_bbs_list;
}

add_shortcode('my_bbs_short', 'my_bbs') ?>
