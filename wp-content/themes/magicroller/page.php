<?php get_header();
 $id =get_the_ID();
 $detect = new Mobile_Detect();
 $move_yes= get_option('mytheme_move_yes');

 if(get_post_meta($id, "customize",true)==='modle1'){
	 ?>
     
     
     
     <div class="full">
    <div class="index_swipers swiper-container">
         <div class="swiper-wrapper">
	<?php 	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()|| $mytheme_detects=='value3'){  
              
			  if( $mytheme_detects=='value2'){

				   dynamic_sidebar('customize70_'.$id);
				  }else{
			 dynamic_sidebar('customize_'.$id); } }else{   dynamic_sidebar('customize70_'.$id);}?>	

         </div>
          <div class="pagination index_p"></div>
    </div>
    
</div>
<?php $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	if ($detect->isMobile()||$mytheme_detects=='value2'){  
 ?>
 <script>
 $(document).ready(function() {
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 direction : 'vertical',
<?php if( get_option('mytheme_3d_open')=='value2'){ ?>effect : 'coverflow',<?php }; ?>
	 speed:800,
      onImagesReady: function(swiper){
       $.news_open();
    },
 onSlideChangeStart: function(swiper){
$.news_open();$.fadeuot_now();
	}

	
  

   }) });
 </script>
 
 
 
 <?php }else{?>
  <!--[if lt IE 10]> 
  <script>
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 mousewheelControl : true,
	 mode: 'vertical',
	 visibilityFullFit : true,
     simulateTouch : false,
	 speed:15000,
     onSlideChangeStart: function(swiper){
$.news_open();$.fadeuot_now();
	}	,
  
    onFirstInit: function(swiper){$.news_open()}	
     	
  })
  </script>
  <![endif]-->
    <!--[if !IE]><!-->  
	<script>
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 mousewheelControl : true,
	 mode: 'vertical',
	 visibilityFullFit : true,
simulateTouch : false,
	 speed:1500,
onSlideChangeStart: function(swiper){
$.news_open();$.fadeuot_now();
	},
	
	onFirstInit: function(swiper){$.news_open()}	 
  });
  </script> <!--<![endif]-->

     
     
     
   
	 <?php
	 }}else{
 $sidepark=get_post_meta($id, "cebian",true);
	   get_template_part( 'page_single/top' );
?>

   <?php $left_right =get_option('mytheme_left_right'); 
   if(get_post_meta($id, 'views', true) ){$getPostViews=get_post_meta($id, 'views', true); }else{$getPostViews='0';}
   ?>
<div id="content" class="singlep">
<?php if(!$detect->isMobile()){  ?><div class="left_mian" id="per27" <?php if($left_right){echo 'style="float: right;"';} ?> >

<?php
if(!$sidepark){ dynamic_sidebar('sidebar-widgets4');}
  elseif($sidepark==='modle1'){   
   dynamic_sidebar('cebian_'.$id);
  }else{
	   dynamic_sidebar($sidepark);
	  }
 ?>


</div><?php } ?>
<div class="right_mian"<?php if($left_right){echo 'style="float: left;"';} if($detect->isMobile()){echo 'id="move_full"';} ?>>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  




  <div class="enter half_5"> <?php the_content(); ?>
  
   <?php if(get_post_meta($post->ID, "cont_read",true)!==""){ 
            $logmeta = wpautop(trim(get_post_meta($post->ID, "cont_read",true)));
			echo $logmeta;};?> 
  <?php wp_link_pages('before=<div class="pager">&after=</div>'); ?>
  
  <div class="bqc">
 <?php  $fenxiang=get_option('mytheme_fenxiang2');if( $fenxiang ==""){ ?>
  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
 <?php }else{echo stripslashes(get_option('mytheme_fenxiang2')); }echo wpautop(stripslashes(get_option('mytheme_fenxiang'))); ?>
  <?php  	$word_t42=get_option('mytheme_word_t42');
			$word_t43=get_option('mytheme_word_t43');
			 ?>
	
	 <div class="next_post"><p><?php if (get_next_post()) { next_post_link($word_t42.': %link','%title',true);} ?></p> 
<p><?php if (get_previous_post()) { previous_post_link($word_t43.': %link','%title',true);}?> </p>  </div>
  
  
  </div>
  
  </div>
 <?php endwhile; endif;
 

 ?>





<div id="respond">
 <?php if ( comments_open() ){ comments_template();} ?>
</div>
</div>
</div>
<?php } get_footer();?>