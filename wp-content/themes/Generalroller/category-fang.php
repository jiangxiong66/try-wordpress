<?php 
/**
  Category Template:正方形图片列表（一栏）
 **/
get_header();
$detect = new Mobile_Detect();
get_template_part( 'page_single/top' ); 
?>	

<div id="content"> <?php get_template_part( 'product_nav' );  ?>
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


  <div class="caseshow">
         <ul class="slides">
         
         
        <?php 
		 $word_t51=get_option('mytheme_word_t51'); 	
		  $word_t55=get_option('mytheme_word_t55'); 
		  $word_t15=get_option('mytheme_word_t15');	
		 ?>   
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
             <?php  
					 $tit= get_the_title();
		             $id =get_the_ID(); 
	                 $content= get_the_content();
					 $linkss=get_post_meta($id,"hoturl", true); 
		             if($linkss !=""){ $links1=  $linkss;}else{$links1=  get_permalink();}; 
					  $price = get_post_meta($id, 'shop_price', true);
          	        $original_price=get_post_meta($id,"original_price", true);
						
					if(get_post_meta($id ,"links_p", true)){ $contact_btn_url=get_post_meta($id ,"links_p", true);}else{$contact_btn_url=get_option('mytheme_btn_url');}
					
					  ?>     
                     
                            
                              <li>
                    <a href="<?php echo $links1 ; ?>" target="_blank"  class="case_pic">   <?php  if( is_sticky()&&!$stickys){echo '<div id="tuijian_loop" class="tuijian_loop"></div>';} ?>
							   <?php  themepark_thumbnails('fang');?>
							
							 
                            </a>
                     <div>
                     <h2  class="posts_title">
                        <a href="<?php echo $links1 ; ?>"target="_blank"><?php  echo mb_strimwidth(strip_tags(apply_filters('the_title', $tit)),  0,50,"...",'utf-8'); ?></a>
                        </h2>
                     
                     <?php if($price){ ?>
                      <div class="black_price_out">
                       <b class="black_price">￥<?php echo $price  ?></b>
                       <?php if($original_price){ ?><span class="black_price_yj">￥<?php echo $original_price  ?></span><?php } ?>
                     
                    
                     </div>
                     
                     <?php } ?> <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_excerp',get_the_excerpt($id))),0,120,"...",'utf-8'); ?></p>
					 
                     <a id="casebtn" target="_blank" href="<?php echo $links1 ; ?>"><?php if($word_t55!=""){echo $word_t55;}else{echo '查看详细说明';}  ?></a>
					<?php if( $contact_btn_url){ ?> <a class="contact_btn"  target="_blank"  href="<?php echo $contact_btn_url; ?>"><?php if($word_t15!=""){echo $word_t15;}else{echo '联系咨询';}  ?></a><?php } ?>
                     
                     
                     
                     </div>
                </li>
                            
                            
                            
                      <?php endwhile;wp_reset_query() ;?> 
                       <?php else : ?>
                         <?php  endif; ?>     
         
</ul>
           <div class="pager">   <?php par_pagenavi(6); ?>  </div>  

</div>
</div>  
    
<?php get_footer(); ?>
