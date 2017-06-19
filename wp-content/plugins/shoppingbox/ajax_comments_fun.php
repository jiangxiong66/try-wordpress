<?php 



function shoppingbox_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	  extract($args, EXTR_SKIP);
	  $postid=$comment->post_id;
	  $authorid=$comment->user_id;
	 $thempark_commont= get_comment_meta( $comment->comment_ID, 'thempark_commont', true );
	$id = get_the_ID();
      $themepark_comment_box_show =get_post_meta($id, 'themepark_comment_box_show', true);
	  $bbs_admin=get_option('bbs_admin');
	  $bbs_post_avatar=get_option('bbs_post_avatar');
	  if( get_option('bbs_admin_avatar')){ $bbs_admin_avatar ='<img width="50"  height="50"src="'. get_option('bbs_admin_avatar').'" alt="'.$bbs_admin.'"/>';}else{$bbs_admin_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$bbs_admin_avatar.'"/>';} 
	  
	   $author_name =get_comment_author();
	 if(get_usermeta($authorid,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($authorid,'qq_user_avatar').'" alt="'.$author_name.'"/>';}
	       else{
		 
		 $avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}  

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
      <div class="tutle_li">
          <a class="avatar_comment_li"><?php if(is_admin_comment($comment->comment_ID)){echo $bbs_admin_avatar; } else{ echo $avatar_bbs_avatar;} ?></a>
      </div>
      <div id="ajax_commont_tex_li">
             <span class="top_ajax_span"><?php if(is_admin_comment($comment->comment_ID)){echo '<b class="admin_red">'.$bbs_admin; }else{ echo  '<b>'.$author_name;} ?></b> 
             <?php if ( $comment->comment_approved == '0' ) {echo '<a class="admin_red">[评论审核中]</a>';}else{ ?>
             <?php if(!$thempark_commont){ ?><a class="hfpl" rel="<?php comment_ID() ?>">回复</a> <?php } ?>
		      <?php } edit_comment_link('编辑',''); ?>
           </span>
            <?php comment_text()  ;
			if($themepark_comment_box_show=='showall'&&$thempark_commont){
			 echo '<div class="comment_meta">'.get_comment_meta( $comment->comment_ID, 'thempark_commont', true ).'</div>'; };?>
           
             <br />
           <em><?php comment_date('Y年m月d日') ?><?php comment_time() ?></em> 

     </div>
    
</li>
<?php
}
