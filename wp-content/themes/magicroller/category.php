<?php get_header();
$detect = new Mobile_Detect();
get_template_part( 'page_single/top' ); 
 global $wp_query;$term_id = get_query_var('cat');
    $word_t51=get_option('mytheme_word_t51');$word_t52=get_option('mytheme_word_t52');
?>	

<div id="content">
<?php get_template_part( 'product_nav' );  ?>
   <?php $left_right =get_option('mytheme_left_right'); ?>
<?php if(!$detect->isMobile()){  ?><div class="left_mian" id="per27" <?php if($left_right){echo 'style="float: right;"';} ?>><?php get_template_part( 'sidebar2' ); ?></div><?php }?>
<div class="right_mian" <?php if($left_right){echo 'style="float: left;"';} if($detect->isMobile()){echo 'id="move_full"';} ?>>
  <div class="news_1" id="category">
  <?php 
  
  $images_cat=get_option('images_'.$term_id);$images_cat_url=get_option('images_url_'.$term_id);
  if($images_cat){
  $move_index_id = get_attachment_id_from_src(  $images_cat );
if ($detect->isMobile() ){
 $images_cat_b= wp_get_attachment_image( $move_index_id, 'movead',array('alt'	=>$term_id->name, 'title'=>$term_id->name ));
}else{
	 $images_cat_b= wp_get_attachment_image( $move_index_id, 'full',array('alt'	=>$term_id->name, 'title'=>$term_id->name ));
	}
  if($images_cat_url){$images_url_c='href="'.$images_cat_url.'"';}
   if($images_cat_b){echo '<a '.$images_url_c.'  class="ad_img">'.$images_cat_b.'</a>';} } ?>
  
  
 <ul class="default">
 
   <?php if(get_option('mytheme_list_nmber2')==""){$nmnber =12;}else{ $nmnber =get_option('mytheme_list_nmber2');}
$posts = query_posts($query_string . '&showposts='.$nmnber); ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        $target =get_post_meta($post->ID,"hots_tlye", true);
			 ?>
        <?php 
		   $tit= get_the_title();
		    $id =get_the_ID();
			
			if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
		   $linkss=get_post_meta($id,"hoturl", true); 
		    if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();};
		    $target =get_post_meta($id,"hots_tlye", true);
			
		 ?>
               <li>
                  <a <?php echo $tagerts ; ?> href="<?php echo $links1 ?>" class="picdsa"> <?php  themepark_thumbnails('twox' );?></a>
                  <span>
                    <h2>  <a class="titels" <?php echo $tagerts .$per_colorc2; ?> href="<?php echo $links1 ?>"><?php the_title(); ?></a></h2>
                      <p class="infot"><em><?php if($word_t51!=""){echo $word_t51;}else{echo '发布时间';}  ?>：<?php echo get_the_time('Y/m/d') ; ?></em><em><?php $posttags = get_the_tags(); if ($posttags) {echo '标签：'; foreach($posttags as $tag) { echo '<a target="_blank" id="tagss" href="'.get_bloginfo('url').'/tag/'.$tag->slug.'">' .$tag->name .'</a>';}}?></em><em><?php if($word_t52!=""){echo $word_t52;}else{echo '浏览次数';}  ?>：<?php echo $getPostViews; ?>  </em> </p>
                      <p <?php echo $per_colorc3; ?>> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,200,"..."); ?></p>
                  </span>
               </li>
             <?php endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>      

           </ul> 
           
             <div class="pager">   <?php par_pagenavi(6); ?>  </div>  
</div>
</div>
</div>  
    
<?php get_footer(); ?>
