<?php get_header();
 $id =get_the_ID();
  $page_id =get_the_ID();
 $detect = new Mobile_Detect();
 $move_yes= get_option('mytheme_move_yes');
$meta_box_value6 = get_post_meta($id,"page_pic_hieght", true);
$meta_box_value7 = get_post_meta($id,"page_pic_hieght2", true);
$page_pic_heng = get_post_meta($post->ID,"page_pic_heng", true);
 if(!$detect->isMobile()){   if($meta_box_value6){$pic_hieght_ss='style="height:'.$meta_box_value6.'px;"';}}else{
	 if($meta_box_value7){$pic_hieght_ss='style="height:'.$meta_box_value7.'px;"';}
	 
	 }

 if(get_post_meta($id, "customize",true)==='modle1'){
	 ?>
     
     
     
  <div class="full" <?php echo $pic_hieght_ss; ?>>

    <div <?php if(!get_post_meta($id, "script_on",true)){ ?>class="index_swipers swiper-container" <?php } echo $pic_hieght_ss; ?>>
         <div <?php if(!get_post_meta($id, "script_on",true)){ ?>class="swiper-wrapper" <?php } ?>>
	<?php 	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){  
              
			   if( $mytheme_detects=='value2'){

				
				   dynamic_sidebar('customize_move'.$page_id);
				  }else{
			dynamic_sidebar('customize_'.$page_id);} }else{   dynamic_sidebar('customize_move'.$page_id);}?>

          </div>
          <div class="pagination index_p"<?php if($page_pic_heng){ echo 'id="hangxianggundong"';}?>></div>
        <?php if($page_pic_heng){echo '<a class="index_next"></a><a class="index_prve"></a>';} ?>
    </div>
    
  <?php if($detect->isMobile()){ ?>  <div class="tishihuadong"></div><?php } get_template_part( 'post_from' ); ?>
</div>
 

<?php  
	if(!get_post_meta($id, "script_on",true)){	
	
	if($page_pic_heng==""){get_template_part( 'script' );}else{ get_template_part( 'script2' );}

	
	
	
	 }else{
		echo"
			<script>
	 $(document).ready(function() {
	
  $('div.index_content').css('margin-top', $('div.full').height())
		});	</script>
		";
		
		}
	?>
<div class="index_content <?php if(!get_option("mytheme_donghuaopen")){echo 'donghuaopen'; }?>">
<?php
	
	
		if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()){ 
	 if( $mytheme_detects=='value2'){

				     dynamic_sidebar('customize_content_move'.$page_id);
				  }else{
			    dynamic_sidebar('customize_content_'.$page_id); } }else{     dynamic_sidebar('customize_content_move'.$page_id);}
?>
</div>
<?php 
	
$fenxiangcode=get_post_meta($page_id ,"fenxiangcode", true);
if($fenxiangcode ){
	 ?>
<div class="cunst_modle" style="margin-top:20px;">
<div class="cunst_modle_in">
<?php if($fenxiangcode==1){ ?>
<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div> 

<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
</script> 
<?php }else{echo stripslashes($fenxiangcode);} ?>
</div>
</div>
   
	 <?php
	} }else{
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
  




  <div class="enter"> <?php the_content(); ?>
  
   <?php if(get_post_meta($post->ID, "cont_read",true)!==""){ 
            $logmeta = wpautop(trim(get_post_meta($post->ID, "cont_read",true)));
			echo $logmeta;};?> 
  <?php wp_link_pages('before=<div class="pager">&after=</div>'); ?>
  
  <div class="bqc">
  
 
  
 <?php  $fenxiang=get_option('mytheme_fenxiang2');if( $fenxiang ==""){ ?>
  <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
 <?php }else{echo stripslashes(get_option('mytheme_fenxiang2')); }if(!get_option('mytheme_show_page')){echo wpautop(trim(stripslashes(get_option('mytheme_fenxiang'))));} ?>
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