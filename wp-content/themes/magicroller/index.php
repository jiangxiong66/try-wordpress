<?php get_header();
$detect = new Mobile_Detect();
 if($detect->isMobile()){$url="http://m.mingyiyinyue.com"; header("Location: $url");}
 ;
?>
<div class="full">
    <div class="index_swipers swiper-container">
         <div class="swiper-wrapper">
	<?php 	if ($detect->isMobile()&&$detect->isTablet()||!$detect->isMobile()|| $mytheme_detects=='value3'){  
              
			  if( $mytheme_detects=='value2'){

				   dynamic_sidebar('sidebar-widgets2');
				  }else{
			 dynamic_sidebar('sidebar-widgets');} }else{   dynamic_sidebar('sidebar-widgets2');}?>	

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
<?php if(get_option('mytheme_3d_open')=='value2'){ ?>effect : 'coverflow',<?php }; ?>
	 speed:800,
      onImagesReady: function(swiper){
       $.news_open();
    },
onTransitionStart: function(swiper){
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
  
  

<?php }; get_footer(); ?>
