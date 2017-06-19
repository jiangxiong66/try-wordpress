<?php

   function is_admin_comment( $comment_ID = 0 ) {
    $comment = get_comment( $comment_ID );
    $admin_comment = false; //设置一个布尔类型的变量用于判断该留言的ID是否为管理员的留言
    if($comment->user_id == 1){
    $admin_comment = true;
    }
    return$admin_comment;
    }
	
	 function is_author_comment( $comment_ID = 0 ) {
    $comment = get_comment( $comment_ID );
	$authorid=get_the_author_meta( "id");
    $admin_comment = false; //设置一个布尔类型的变量用于判断该留言的ID是否为管理员的留言
    if($comment->user_id == $authorid){
    $author_comment = true;
    }
    return$author_comment;
    }
	

   //if (is_admin_comment($comment->comment_ID))


function  shopingboxs_comment_b($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
	   $comorder =  get_option('comment_order');
	 
		 /* 论计数器   倒序*/
		 global $commentcount,$wpdb, $post;
		 if(!$commentcount) { //初始化楼层计数器
			  $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type = '' AND comment_approved = '1'");  //所有评论
			  $cnt = count($comments);//获取评论总数量
			  $page = get_query_var('cpage');//获取当前评论列表页码
			  $cpp=get_option('comments_per_page');//获取每页评论显示数
			  $commentcount = $cpp * $page;
			
		 }
		 $postid=$comment->post_id;
	  $authorid=$comment->user_id;
	  $bbs_admin=get_option('bbs_admin');
	  $bbs_post_avatar=get_option('bbs_post_avatar');
		 if( get_option('bbs_admin_avatar')){ $bbs_admin_avatar ='<img width="50"  height="50"src="'. get_option('bbs_admin_avatar').'" alt="'.$bbs_admin.'"/>';}else{$bbs_admin_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$bbs_admin_avatar.'"/>';}  
		 
	 
	 $author_name =get_usermeta($authorid,'nickname');
	 if(get_usermeta($authorid,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($authorid,'qq_user_avatar').'" alt="'.$author_name.'"/>';}
	       else{
		 
		 $avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}  
		 
	  if(get_post_meta($postid,"jinghua", true)=="ok"){$jinghua ='<b class="jinghua">精华贴</b>';}
	   ?>





<li id="single_bbs_li">
	 <div id="author_bbs_avatar" class="single_bbs_avatar">
     <a><?php if(is_admin_comment($comment->comment_ID)){echo $bbs_admin_avatar; } else{ echo $avatar_bbs_avatar;} 
	
	 ?>
     
      <?php if (is_author_comment($comment->comment_ID)) {?><div id="louzhu"></div><?php }elseif(is_admin_comment($comment->comment_ID)){echo '<div id="huifu"></div>'; } ?>
     
     </a>
	 <b><?php if(is_admin_comment($comment->comment_ID)){echo $bbs_admin; }else{ echo  $author_name;} ?></b>
	 <div><b><?php printf('%1$s', ++$commentcount);?>楼</b>
</div> 
	 </div>
	<span class="left_bbs_single" id="left_bbs_single" <?php if(is_admin_comment($comment->comment_ID)){echo 'style="background:#F8FEE0"'; } ?>>
	 
	  	  <div id="bbs_enter">
	   	<?php comment_text() ?>  </div>
          <div class="datetime"><p><?php comment_date('Y年m月d日') ?><?php comment_time() ?><a href="#respond">回帖</a></p></div>
	</span>
  
	</li>




<?php
}

function robin_end_comment() {
	
}


add_filter( 'the_content',  'bbs_single' );  
 
function bbs_single( $content ) {  
   if((is_single())){
	   $id =get_the_ID(); 
	   if(get_post_meta($id,"bbs_shoppingbox", true)){
		   $author_id=get_the_author_meta( 'ID' );
		   $huifu=get_post_meta($id,"huitie", true);
	if( $huifu){$huitie = '<b class="bbs_over">已经回答</b> ';};
	   if(get_post_meta($id,"jinghua", true)=="ok"){$jinghua ='<b class="jinghua">精华贴</b>';}
	    
			 $bbs_answer = wpautop(trim($huifu));
			
	  
		$bbs_admin=get_option('bbs_admin');
		 if( get_option('bbs_admin_avatar')){ $bbs_admin_avatar ='<img width="50"  height="50"src="'. get_option('bbs_admin_avatar').'" alt="'.$bbs_admin.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$bbs_admin_avatar.'"/>';}  
	   
	$bbs_post_avatar=get_option('bbs_post_avatar');
	
	 $author_name =get_usermeta($author_id,'nickname');
	 if( get_usermeta($author_id,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'.get_usermeta($author_id,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}  
	 
	
		   
	 
		   $befor_bbs_single='<div id="cat_bbs_list"> <ul>';
		   $after_bbs_single='</ul></div>';
		   $content_bbs_single ='<li id="single_bbs_li">
	 <div id="author_bbs_avatar" class="single_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$avatar_bbs_avatar .'<div id="louzhu"></div></a>
	 <b>'.$author_name.'</b>
	  <div> <b>已有 '.get_comments_number('0', '1', '% ' ).' 回帖</b>'.$huitie.$jinghua.' </div>
	 </div>
	<span class="left_bbs_single" id="left_bbs_single">
	 
	  <div id="bbs_enter">
	  '.$content.'
	  </div>
	   
	</span>
	</li>';
		   
		    if($bbs_answer){   $content_bbs_answer='<li id="single_bbs_li">
	 <div id="author_bbs_avatar" class="single_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$bbs_admin_avatar .'<div id="huifu"></div></a>
	 <b>'.$bbs_admin.'</b>
	 <div> <b class="admin_answer">官方回复</b> </div> 
	 </div>
	<span class="left_bbs_single" id="left_bbs_single" style="background:#F8FEE0">
	 
	  	  <div id="bbs_enter">
	  '.$bbs_answer.'  </div>
	      <div class="datetime"><p>'. get_the_modified_time('Y年n月j日ag:h') .'<a href="#respond">回贴</a></p></div>
	</span>
	</li>';   }
	
	
	$comments = get_comments(array(
			'post_id' =>$id ,
			'status' => 'approve' //Change this to the type of comments to be displayed
		));

		//Display the list of comments
	$comments_list =	wp_list_comments(array(
			'per_page' => 30, //Allow comment pagination
			'reverse_top_level' =>true, //Show the latest comments at the top of the list
			'callback'=> "shopingboxs_comment_b",
			'echo'              => false,
			
		), $comments);
		
  
		   
        $content =   $befor_bbs_single. $content_bbs_single. $content_bbs_answer.$comments_list.$after_bbs_single ;
   }}
    return $content;  
}  


add_filter('comments_template', 'pinglun_modules');
function pinglun_modules($file) {
	 $ajax_comment_open = get_option('ajax_comment_open');
	 if((is_single())){
		  $id =get_the_ID(); 
	   if(get_post_meta($id,"bbs_shoppingbox", true)){
	global $post;
	$comment_status = get_option('pinglun_status');
	if ($comment_status && is_array($comment_status)) {
		$postid = $post->ID;
		if ($postid && in_array($postid, $comment_status)) {
			return $file;
		}
	}
	
	return dirname(__FILE__) . '/comments.php'; }
	
	
	elseif($ajax_comment_open){
		return dirname(__FILE__) . '/ajax_comments.php';
		
		}
		
		}else if(is_page()&& $ajax_comment_open){return dirname(__FILE__) . '/ajax_comments.php';}
} 


if (!function_exists( 'init_gitsmilie' ) ) {
function init_gitsmilie() {
    global $wpsmiliestrans;
  
    $wpsmiliestrans = array(
        ':mrgreen:' => 'icon_mrgreen.gif',
        ':neutral:' => 'icon_neutral.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':arrow:' => 'icon_arrow.gif',
        ':shock:' => 'icon_eek.gif',
        ':smile:' => 'icon_smile.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':evil:' => 'icon_evil.gif',
        ':grin:' => 'icon_biggrin.gif',
        ':idea:' => 'icon_idea.gif',
        ':oops:' => 'icon_redface.gif',
        ':razz:' => 'icon_razz.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':wink:' => 'icon_wink.gif',
        ':cry:' => 'icon_cry.gif',
        ':eek:' => 'icon_surprised.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':sad:' => 'icon_sad.gif',
        '8-)' => 'icon_cool.gif',
        '8-O' => 'icon_eek.gif',
        ':-(' => 'icon_sad.gif',
        ':-)' => 'icon_smile.gif',
        ':-?' => 'icon_confused.gif',
        ':-D' => 'icon_biggrin.gif',
        ':-P' => 'icon_razz.gif',
        ':-o' => 'icon_surprised.gif',
        ':-x' => 'icon_mad.gif',
        ':-|' => 'icon_neutral.gif',
        ';-)' => 'icon_wink.gif',
        '8O' => 'icon_eek.gif',
        ':(' => 'icon_sad.gif',
        ':)' => 'icon_smile.gif',
        ':?' => 'icon_confused.gif',
        ':D' => 'icon_biggrin.gif',
        ':P' => 'icon_razz.gif',
        ':o' => 'icon_surprised.gif',
        ':x' => 'icon_mad.gif',
        ':|' => 'icon_neutral.gif',
        ';)' => 'icon_wink.gif',
        ':!:' => 'icon_exclaim.gif',
        ':?:' => 'icon_question.gif',
    );

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

}}
add_action('init', 'init_gitsmilie', 5); 
 

 if (!function_exists( 'disable_emojis_tinymce' ) ) {function disable_emojis_tinymce( $plugins ) {
return array_diff( $plugins, array( 'wpemoji' ) );
}
add_filter('smilies_src','custom_smilies_src',1,10);
 if (!function_exists( 'custom_smilies_src' ) ) {
function custom_smilies_src ($img_src, $img, $siteurl){
return WP_PLUGIN_URL."/".dirname(plugin_basename(__FILE__)).'/smilies/'.$img;
}}}
?>
