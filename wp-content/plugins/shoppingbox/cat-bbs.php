<?php
function cat_bbs(){
	$pagebbssd=get_the_ID();
	$content=get_post_meta($pagebbssd,"bbs_cat_pages", true);
	if($content){
			$cat_bbs_id=$content;
		    $bbs_cat_page=get_the_ID();
		}else{
	$cat_bbs_id=get_option('cat_bbs_id');
	$bbs_cat_page=get_option('bbs_cat_page');
			}
$bbs_cat_page_url=get_page_link($bbs_cat_page);
 $post_url_true=strstr($bbs_cat_page_url,'?');
  if($post_url_true){$cart_url='&';}else{$cart_url='?';}
	$bbs_post_page=get_option('bbs_post_page');
	$bbs_post_zd_n =get_option('bbs_post_zd_n');
	$bbs_post_nzd_n =get_option('bbs_post_nzd_n');
	$cat_bbs_list .='<div id="cat_bbs_list">
	
	                 <div id="cat_bbs_list_title"><span><h1>'.get_page( $bbs_cat_page )->post_title.'</h1><b>帖子：'.get_bbs_postcount($cat_bbs_id).'</b><b>精华帖：'.get_bbs_jiajing($cat_bbs_id).'</b><b>已回复：'.get_bbs_huifu($cat_bbs_id).'</b></span><a class="post_btn"href="'. get_page_link($bbs_post_page).'"target="_blank" >点击发帖</a>
					
					 </div>
					  <div class="btn_loop"> <a id="all" href="'. get_page_link($bbs_cat_page).'">全部帖子</a>
					  <a id="jinghua" href="'. get_page_link($bbs_cat_page).$cart_url.'bbs_pos=jinghua">精华帖</a>
					  <a id="huitie" href="'. get_page_link($bbs_cat_page).$cart_url.'bbs_pos=huitie">已回复</a></div>
	                 <ul>' ;
					
					$cat_bbs_listjh.= '<div id="cat_bbs_list">
	
	                 <div id="cat_bbs_list_title"><span><h1>'.get_page( $bbs_cat_page )->post_title.'</h1><b>帖子：'.get_bbs_postcount($cat_bbs_id).'</b><b>精华帖：'.get_bbs_jiajing($cat_bbs_id).'</b><b>已回复：'.get_bbs_huifu($cat_bbs_id).'</b></span><a class="post_btn"href="'. get_page_link($bbs_post_page).'"target="_blank">点击发帖</a>
					
					 </div>
					  <div class="btn_loop"> <a id="all" href="'. get_page_link($bbs_cat_page).'">全部帖子</a>
					  <a id="jinghua" href="'. get_page_link($bbs_cat_page).$cart_url.'bbs_pos=jinghua">精华帖</a>
					  <a id="huitie" href="'. get_page_link($bbs_cat_page).$cart_url.'bbs_pos=huitie">已回复</a></div>
	                 <ul>' ;
					
 $sticky = get_option( 'sticky_posts' );
$limit = 15;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
'posts_per_page' => $bbs_post_zd_n,
'paged' => $paged,
'post_status' => 'publish',
'cat' => $cat_bbs_id,
'post__in' => $sticky,
'caller_get_posts' => 1
);
query_posts($args);
if (have_posts()){
	 while (have_posts()) : the_post();
	$id =get_the_ID(); 
	$author_id=get_the_author_meta( 'ID' );
	if(get_post_meta($id,"huitie", true)){$huitie = '<b class="bbs_over">已经回答</b> ';};
	   if(get_post_meta($id,"jinghua", true)=="ok"){$jinghua ='<b class="jinghua">精华</b>';}
	   
	$bbs_post_avatar=get_option('bbs_post_avatar');
	
	 $author_name =get_usermeta($author_id,'nickname');
	 if( get_usermeta($author_id,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. get_usermeta($author_id,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
	if(is_sticky()){$cat_bbs_list .=' <li>
	 <div id="author_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$avatar_bbs_avatar .'</a>
	 <b>'.$author_name.'</b>
	 </div>
	<span class="left_bbs_single">
	   <a  class="bbs_a_title"  id="zd_shop_bbs" target="_blank" href="'. get_the_permalink().'">'.get_the_title().'</a>
	   <div><b class="zhiding">置顶</b>'.$jinghua.$huitie.'   <b>已有 '.get_comments_number('0', '1', '% ' ).' 回帖</b> </div>
	   <p>'.  mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_content($id))),0,300,"...").'</p>
	</span>
	</li>';}

	 endwhile;
}

	wp_reset_query();
$args = array(
'posts_per_page' =>$bbs_post_nzd_n,
'paged' => $paged,
'post_status' => 'publish',
'cat' => $cat_bbs_id,

'post__not_in' => $sticky,
);
query_posts($args);
if (have_posts()) {while (have_posts()) : the_post();	 
	 
	 
	  
	 
	 $id =get_the_ID(); 
	  if(get_post_meta($id,"huitie", true)){$huitie = '<b class="bbs_over">已经回答</b> ';};
	   if(get_post_meta($id,"jinghua", true)){$jinghuasss ='<b class="jinghua">精华</b>';}
	$author_id=get_the_author_meta( 'ID' );
	
	$bbs_post_avatar=get_option('bbs_post_avatar');
	
	 $author_name =get_usermeta($author_id,'nickname');
	 if( get_usermeta($author_id,'qq_user_avatar')){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'.get_usermeta($author_id,'qq_user_avatar').'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
	if(!is_sticky()){$cat_bbs_list .=' <li>
	 <div id="author_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$avatar_bbs_avatar .'</a>
	 <b>'.$author_name.'</b>
	 </div>
	<span class="left_bbs_single">
	   <a class="bbs_a_title" target="_blank" href="'. get_the_permalink().'">'.get_the_title().'</a>
	   <div> '.$jinghuasss.$huitie.'   <b>已有 '.get_comments_number('0', '1', '% ' ).' 回帖</b>  </div>
	   <p>'.  mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_content($id))),0,300,"...").'</p>
	</span>
	</li>';}
	 
	 
	 
	
  endwhile;
}else {$cat_bbs_list.= '<li>	<span class="no_bbs_yet"><b>还没有任何帖子</b><p><a href="'. get_page_link($bbs_post_page).'"target="_blank" >点击发布第一篇帖子吧！</a></p></span></li>';};

	if(function_exists('par_pagenavi')){ ob_start();  par_pagenavi(9);$par_pagenavi = ob_get_contents(); ob_end_clean();  ;};
	$cat_bbs_list .='</ul><div class="nav_bbs">'.$par_pagenavi.'</div></div>';
	wp_reset_query();
	
	
$bbs_post=$_GET['bbs_pos'];	

	if($bbs_post=="huitie"){
	$argssb = array(
'meta_key'=>'huitie',
'posts_per_page' =>$bbs_post_nzd_n,
'paged' => $paged,
'post_status' => 'publish',
'cat' => $cat_bbs_id,
'post__not_in' => $sticky,

);}elseif($bbs_post=="jinghua"){
	$argssb = array(
'meta_key'=>'jinghua',
'posts_per_page' =>$bbs_post_nzd_n,
'paged' => $paged,
'post_status' => 'publish',
'cat' => $cat_bbs_id,
'post__not_in' => $sticky,

);
	}
	
	
query_posts($argssb);
if (have_posts()) { while (have_posts()) : the_post();	 
	  $ids =get_the_ID(); 
	if(get_post_meta($ids,"huitie", true)){$huities = '<b class="bbs_over">已经回答</b> ';}else{$huities="";}
	if(get_post_meta($ids,"jinghua", true)=="ok"){$jinghuas ='<b class="jinghua">精华</b>';}else{$jinghuas="";}
	
	$author_id=get_the_author_meta( 'ID' );
	
	$bbs_post_avatar=get_option('bbs_post_avatar');
	 $author_bbs_avatar = get_usermeta($author_id,'qq_user_avatar');
	 $author_name =get_usermeta($author_id,'nickname');
	 if( $author_bbs_avatar){ $avatar_bbs_avatar ='<img width="50"  height="50"src="'. $author_bbs_avatar.'" alt="'.$author_name.'"/>';}else{$avatar_bbs_avatar ='<img width="50"  height="50" src="'.$bbs_post_avatar.'" alt="'.$author_name.'"/>';}
	$cat_bbs_listjh .=' <li>
	 <div id="author_bbs_avatar"><a target="_blank" href="'. get_the_permalink().'">'.$avatar_bbs_avatar .'</a>
	 <b>'.$author_name.get_post_meta($ids,"jinghua", true).'</b>
	 </div>
	<span class="left_bbs_single">
	   <a class="bbs_a_title" target="_blank" href="'. get_the_permalink().'">'.get_the_title().'</a>
	   <div> '.$jinghuas.$huities.'   <b>已有 '.get_comments_number('0', '1', '% ' ).' 回帖</b>  </div>
	   <p>'.  mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_content($id))),0,300,"...").'</p>
	</span>
	</li>';
	

	 
	 
	 
	
  endwhile;
}else {$cat_bbs_listjh.= '<li>	<span class="no_bbs_yet"><b>没有找到任何帖子</b></span></li>';};
	
	if(function_exists('par_pagenavi')){ ob_start();  par_pagenavi(9);$par_pagenavi = ob_get_contents(); ob_end_clean();  ;};
	$cat_bbs_listjh .='</ul><div class="nav_bbs">'.$par_pagenavi.'</div></div>';
	$cat_bbs_listht.='</ul><div class="nav_bbs">'.$par_pagenavi.'</div></div>';
	wp_reset_query();
	$bbs_post=$_GET['bbs_pos'];
	if($bbs_post){
if($bbs_post="huitie"){return $cat_bbs_listjh;}else if($bbs_post="jiajing"){return $cat_bbs_listjh;}}else{
	
	return $cat_bbs_list;}
}


function cat_bbs_nav(){
	$bbs_my_nav  = get_option('bbs_my_nav');
	ob_start(); 
	wp_nav_menu(array( 'walker' => new bbs_menu(),'container' => false,'menu' =>$bbs_my_nav ,'items_wrap' => '%3$s' ) );
	$nav_bbs_c=ob_get_contents();
	ob_end_clean();
	
	return '<div class="cat_bbs_nav">'.$nav_bbs_c.'</div>';
	}

add_shortcode('bbs_list_short', 'cat_bbs');
add_shortcode('cat_bbs_nav_short', 'cat_bbs_nav');
?>
