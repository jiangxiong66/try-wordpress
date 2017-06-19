<?php 

/*
Template Name Posts:产品展示模板(一栏模式)
*/
get_header();
$id =get_the_ID(); 
$detect = new Mobile_Detect();
get_template_part( 'page_single/top' );
	$word_t14=get_option('mytheme_word_t14');
			$word_t15=get_option('mytheme_word_t15');
			$word_t16=get_option('mytheme_word_t16');$word_t51=get_option('mytheme_word_t51');$word_t52=get_option('mytheme_word_t52');
?>

   <?php $left_right =get_option('mytheme_left_right'); 
   if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
   ?>
<div id="content" class="singlep">




<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div id="product">
  <div class="left_p" id="full_p">
   <?php 
  	$gallery_tlye=get_post_meta($id,"gallery_tlye", true);
   
	   if(has_shortcode( $post->post_content, 'gallery' )==true){
	    $post_content = $post->post_content;
                             preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
                             $array_id = $ids;
                             foreach($array_id  as $array_id ){
                             }
                             echo do_shortcode("[gallery ids=". $array_id ."]");
	   }else{
								 ?>
                                   <a class="product_pic" href="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($id), "full" , false, '' ); echo $src[0];?>"data-lightbox="gallery" class="case_list_ligtbox">
 <?php the_post_thumbnail('full' ,array('alt'	=>$tit, 'title'=> get_the_title() ));  ?></a> <?php }?>
  </div>
  
  
 <div class="right_p">
 <div class="title_page"><h1><?php the_title();?></h1></div><div class="des_page">


         <?php
		 $id =get_the_ID(); 
		  if(!get_post_meta($id,"bbs_shoppingbox", true)){?>
            <p class="infot"><em><?php if($word_t51!=""){echo $word_t51;}else{echo '发布时间';}  ?>：<?php echo get_the_time('Y/m/d') ; ?></em>
            <em> <?php   foreach((get_the_category()) as $category) { echo '<a href="'. get_category_link($category->cat_ID).'">' .$category->cat_name .'</a> ';} }?></em>
            <em><?php if($word_t52!=""){echo $word_t52;}else{echo '浏览次数';}  ?>：<?php echo $getPostViews; ?>  </em> </p>
 
</div>
<?php $shop_open = get_post_meta($id, 'shop_open', true); if($shop_open ){  ?>
    <div class="shop_p">
     <?php   
	        $price = get_post_meta($id, 'shop_price', true);
          	$original_price=get_post_meta($id,"original_price", true);
	       if($original_price){$original=  '<em class="original_price">原价：￥'.get_post_meta($id,"original_price", true).'</em>';}
	     if($shop_open == 'yes')    {  
		 echo '<p>'.$original.'<b class="price">现价：￥'.$price.'</b></p>';};

		?>
       <?php if(function_exists('shop_comment_number')){ ?>
        <div class="starsss"><?php if(shop_comment_number()){?><a>综合评分(<?php  echo shop_comment_number(); ?>人评分)</a>  <div class="srar" id="stars__<?php echo shop_comment_stars()?>"></div><?php }else{?><a>暂无评分</a><div class="srar" id="stars_0"></div><?php }}?></div>
    </div>
<?php }?>
  <div class="tag_pro"><?php $posttags = get_the_tags(); if ($posttags) { foreach($posttags as $tag) { echo '<a target="_blank" href="'.get_bloginfo('url').'/?tag='.$tag->slug.'">' .$tag->name .'</a>';}}?></div>
    <div class="canshu">
   <?php if(get_post_meta($post->ID, "cont_read",true)!==""){  $logmeta = wpautop(trim(get_post_meta($post->ID, "cont_read",true)));echo $logmeta;};?> 
     </div>
         
     <?php  
	            $product_go=get_option('mytheme_btn_url');
			 if($shop_open == 'yes')    { $link=""; }else{
			
			if(!get_post_meta($post->ID,"links_p", true)&&!$product_go){ $link='href="#respond"';}elseif(get_post_meta($post->ID,"links_p", true)){$link='href="'.get_post_meta($post->ID,"links_p", true).'"rel="nofollow"target="_blank"';}elseif(  $product_go){$link='href="'.$product_go.'"rel="nofollow"target="_blank"';}
			}
	   
	   ?>  
      <div class="buy_btn"> <a class="btn"   <?php echo  $link;?>><?php if($word_t15!=""){echo $word_t15;}else{echo '联系咨询';}  ?></a>    </div>
         
            
</div>
 <?php if(function_exists('shop_form')){echo shop_form();} ?>

 
  
   <div class="enter" id="nogallery_enter">
  
  <?php   if($shop_open == 'yes'&&function_exists('shop_comment_number'))    { ?><span class="enter_cs"><a id="content_shop_btn" class="cutyes"><?php if($word_t16!=""){echo $word_t16;}else{echo '详细参数';}  ?></a> 
                                                                <a id="comment_shop_btn">用户评分(<?php echo shop_comment_number() ?>)</a></span> <?php }else{?>
  <span class="enter_cs"><a><?php if($word_t16!=""){echo $word_t16;}else{echo '详细参数';}  ?></a></span>
   <?php }?>
    <div id="content_shop" <?php echo 'class="'.get_option('mytheme_enter_p').'"';  ?>> <?php the_content(); ?></div>
   <?php   if($shop_open == 'yes')    { ?> <div id="comment_shop" style="display:none;">  <?php if(function_exists('shop_comment')){echo shop_comment();} ?></div><?php }?>

  
  <?php wp_link_pages('before=<div class="pager">&after=</div>'); ?>
  
  <div class="bqc">
 <?php  $fenxiang=get_option('mytheme_fenxiang2');if( $fenxiang ==""){ ?>
  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
 <?php }else{echo stripslashes(get_option('mytheme_fenxiang2')); }echo wpautop(trim(stripslashes(get_option('mytheme_fenxiang')))); ?>
  <?php  	$word_t42=get_option('mytheme_word_t42');
			$word_t43=get_option('mytheme_word_t43');
			 ?>
	
	 <div class="next_post"><p><?php if (get_next_post()) { next_post_link($word_t42.': %link','%title',true);} ?></p> 
<p><?php if (get_previous_post()) { previous_post_link($word_t43.': %link','%title',true);}?> </p>  </div>
  
  
  </div>
  
  </div>
 <?php endwhile; endif;
 
  get_template_part( 'page_single/relevant_full_01' );
 ?>





<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
</div>
</div>

<?php get_footer();?>