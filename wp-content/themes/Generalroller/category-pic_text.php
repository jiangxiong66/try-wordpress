<?php 
/**
  Category Template:大图文列表
 **/
get_header();

 get_template_part( 'page_single/top' ); 
   $word_t51=get_option('mytheme_word_t51');$word_t52=get_option('mytheme_word_t52');
?>	
   <?php $left_right =get_option('mytheme_left_right'); ?>
<div id="content">
<?php get_template_part( 'product_nav' );  ?>


<?php if(!$detect->isMobile()){  ?><div class="left_mian" id="per27" <?php if($left_right){echo 'style="float: right;"';} ?>><?php get_template_part( 'sidebar2' ); ?></div><?php }?>

<div class="right_mian"  <?php if($left_right){echo 'style="float: left;"';} if($detect->isMobile()){echo 'id="move_full"';}else{echo 'id="per70"';} ?>>
 <?php global $wp_query;$term_id = get_query_var('cat');  
  
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
 <ul  id="pic_text_list">
 <?php 
	

	      
	
?>    
               <?php
		
			    if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php  $linkss=get_post_meta($post->ID,"hoturl", true); 
			        
					if(get_post_meta($post->ID,"hots_tlye", true)){$target =get_post_meta($post->ID,"hots_tlye", true);}else{$target ='target="_blank"';}
					   $id=get_the_ID(); 
 $shop_open = get_post_meta($id, 'shop_open', true);
 $stickys= get_option('mytheme_stickys');
		 ?>
              <li>
             <a <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="news_001_pic">
              <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
            <?php 
			$tit= get_the_title();
	
			 themepark_thumbnails('case');?>
                   
             </a>
              <span>
             <h2><a   <?php echo $target;?>  href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>"><?php the_title(); ?></a></h2>
            <?php  if($shop_open == 'yes')    {
				  $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
			if($original_price){$original=  '<em class="original_price" id="black">'.'原价：￥'.get_post_meta($id,"original_price", true).'</em>';}
				  echo '<p class="ppre"><a id="price">现价：￥'.$price.'</a>'.$original.'</p>'; ?>
            
             <div class="starsss"><?php if(shop_comment_number()){?><a>综合评分(<?php  echo shop_comment_number(); ?>人评分)</a>  <div class="srar" id="stars__<?php echo shop_comment_stars()?>"></div><?php }else{?><a>暂无评分</a><div class="srar" id="stars_0"></div><?php }?></div>
            <div class="tag_pro"><?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a target="_blank" href="'.get_bloginfo('url').'/?tag='.$tag->slug.'">' .$tag->name .'</a>';}}?></div>
              <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,250,"...",'utf-8'); ?></p>
          <?php }else{ ?>
          
           <a class="time"><?php if($word_t51!=""){echo $word_t51;}else{echo '发布时间';}  ?>:<?php the_time('Y-m-d') ?></a>
              <div class="tag_pro"><?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a target="_blank" href="'.get_bloginfo('url').'/?tag='.$tag->slug.'">' .$tag->name .'</a>';}}?></div>
          <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($post->ID))),0,350,"...",'utf-8'); ?></p>
          
          <?php } ?>
           
             </span>
           </li>
          <?php  endwhile; ?>     
                        <?php else : ?> <p><?php $word_t10=get_option('mytheme_word_t10'); if($word_t10!=""){echo $word_t10;}else{echo '很遗憾，没有找到你要的信息';}  ?><br /></p>
                         <?php  endif; ?>        
           

           </ul>          
            <div class="pager">   <?php par_pagenavi(6); ?>  </div>  

</div>
</div>  
    
<?php get_footer(); ?>
