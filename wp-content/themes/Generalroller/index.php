<?php get_header();
 $detect = new Mobile_Detect();
 $mytheme_detects=get_option('mytheme_detects');
 $pic_hieght_s=get_option('mytheme_pic_hieght_s');
 $pic_hieght_s2=get_option('mytheme_pic_hieght_s2');
 if(!$detect->isMobile()){  if($pic_hieght_s){$pic_hieght_ss='style="height:'.$pic_hieght_s.'px;"';}}else{
	 if($pic_hieght_s2){$pic_hieght_ss='style="height:'.$pic_hieght_s2.'px;"';}
	 }
?>
<div class="full"<?php if(is_front_page() || is_home()){ echo $pic_hieght_ss;} if(get_option("mytheme_pic_modle")){ echo 'id="hangxianggundongs"';}?>>

    <div class="index_swipers swiper-container"<?php echo $pic_hieght_ss; ?>>
         <div class="swiper-wrapper">
	<?php 	
	
	
	
	if ($detect->isMobile()&&!$detect->isTablet()){ 
	
			   if (dynamic_sidebar('sidebar-widgets2')): else: dynamic_sidebar('sidebar-widgets');endif;
			
			     }else{   if( $mytheme_detects&&$mytheme_detects=='value2'){

				 if (dynamic_sidebar('sidebar-widgets2')): else: dynamic_sidebar('sidebar-widgets');endif;
				  }else{   dynamic_sidebar('sidebar-widgets');}}
	
	
	
?>

         </div>
          <div class="pagination index_p "<?php if(get_option("mytheme_pic_modle")){ echo 'id="hangxianggundong"';}?>></div>
         
         <?php if(get_option("mytheme_pic_modle")){echo '<a class="index_next"></a><a class="index_prve"></a>';} ?>
        
    </div>
    

</div>
    <?php if(get_option("mytheme_pic_modle")==""){get_template_part( 'script' );}else{ get_template_part( 'script2' );} ?>
	
	<div class="index_content <?php if(!get_option("mytheme_donghuaopen")){echo 'donghuaopen'; }?>">
<?php	
			if ($detect->isMobile()&&!$detect->isTablet()){
	
			   if (dynamic_sidebar('index_content_move')): else: dynamic_sidebar('index_content');endif;
			
			     }else{   if( $mytheme_detects&&$mytheme_detects=='value2'){

				 if (dynamic_sidebar('index_content_move')): else: dynamic_sidebar('index_content');endif;
				  }else{   dynamic_sidebar('index_content');}}
	

	 ?>
    
  </div>
    



<?php 


 get_footer(); ?>
