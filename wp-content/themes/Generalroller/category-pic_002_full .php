<?php 
/**

 **/
get_header();
$detect = new Mobile_Detect();
get_template_part( 'page_single/top' ); 
?>	

<div id="content"> 
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
<?php get_template_part( 'product_nav' );  ?>

  <div class="case_in">
         <ul class="slides">
         
         
        <?php  
		
		?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php 
		   $id=get_the_ID(); 
  $tit= get_the_title($id);
  $linkss=get_post_meta($id,"hoturl", true); 
    $price = get_post_meta($id, 'shop_price', true);
    $original_price=get_post_meta($id,"original_price", true);
	$stickys= get_option('mytheme_stickys');
if(get_post_meta($post->ID,"hots_tlye", true)){$tagerts=get_post_meta($post->ID,"hots_tlye", true);}else{$tagerts ='target="_blank"';}
	

		 ?>
          
    <li class="slider">
             <a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" class="case_pic">
              <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
           <?php  themepark_thumbnails('case');?>
          
          </a>
             <h2><a  <?php echo $tagerts ?> title="<?php the_title(); ?>" href="<?php if($linkss !=""){echo $linkss;}else{echo get_permalink();}; ?>" ><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,30,"...",'utf8'); ?></a></h2>
            
            <?php if($price!=""){?>
             <em class="price">售价：￥<?php echo $price; ?></em>
              <?php  if (function_exists( 'shop_comment_number' )|| function_exists( 'shop_comment_stars' ) ) {?>
               <div class="pj_case"> 
              <?php if(shop_comment_stars() =='0'){echo '<a>暂无评分</a>';}else{?>
               <div class="star" id="stars_<?php echo shop_comment_stars()?>"> </div> 
               <?php } ?>
               
               <a><?php echo shop_comment_number();?>评价</a></div>
               
            <?php } }else{?>
             <p> <?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,80,"...",'utf-8'); ?></p>
            <?php } ?>
            
             </li>

  
  
       
      <?php  endwhile; ?>     
                        <?php else : ?>
                         <?php  endif; ?>     
         
</ul>
           <div class="pager">   <?php par_pagenavi(6); ?>  </div>  

</div>
</div>  
    
<?php get_footer(); ?>
