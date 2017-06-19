<?php $detect = new Mobile_Detect();
      $mytheme_detects=get_option('mytheme_detects');
	   if(is_front_page() || is_home()){$pic_hieght_s2=get_option('mytheme_pic_hieght_s2');}else if(is_page()){
		  $page_id =get_the_ID();
$pic_hieght_s2 = get_post_meta($id,"page_pic_hieght2", true);   

		   
		   }
	  
	if ($detect->isMobile()||$mytheme_detects=='value2'){  
 ?>
 <script>
 $(document).ready(function() {
	  $("div.full,.index_swipers").css('height', window.innerHeight-59+'px')

$(window).resize(function() { $("div.full,.index_swipers").css('height', window.innerHeight-59+'px')});

	 
	 
	 var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
	 direction : 'vertical',
     paginationClickable: true,
	 speed:800,

      onInit: function(swiper){
       $.news_open();
	   
    },
 onSlideChangeStart: function(swiper){
$.news_open();
	},
	onReachEnd: function(swiper){
		$('.lastslide').addClass('lastslides');
		},
	onTouchEnd: function(swiper){
	if($('.lastslide').hasClass('lastslides')){	
		$(".full").slideUp(1000);
		$(".full").addClass("yincang");
		$(".index_content").children("div:first-child").addClass("move_d");
          }}
		

	
  

   }) });
   
   
   $(window).scroll(function() { 

  if($(window).scrollTop()==0&&$(".full").hasClass("yincang")){
	
	 $('.lastslide').removeClass('lastslides');
	$(".full").slideDown(1000);
		$(".full").removeClass("yincang");
	 
	  }
});
 </script>
 
 
 
 <?php }else{?>
  <!--[if lt IE 10]> 
<script>
 $(document).ready(function() {
	  $("div.full,.index_swipers").css('height', window.innerHeight+'px')
  $("div.index_content").css('margin-top', window.innerHeight)
$(window).resize(function() { $("div.full,.index_swipers").css('height', window.innerHeight+'px');
$(".index_swipers").css('width', window.innerWidth+'px');
$(".index_swipers .swiper-slide").css('width', window.innerWidth+'px');
});
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 mode : 'vertical',
	 speed:5000,
	 cssWidthAndHeight : 'width',
   
mousewheelControl : true,
onSlideChangeStart: function(swiper){
$.news_open();
	},
	onSlideChangeEnd: function(swiper){
if($('.swiper-slide-active').hasClass('lastslide')){
	 index_swipers.disableMousewheelControl();
	
	  }
	},
		
	onFirstInit: function(swiper){$.news_open()}	 
  });
  
  $(window).scroll(function() {  
  if($(window).scrollTop()==0){
	
	 index_swipers.enableMousewheelControl();
	  
	  }
});
  
  
 });
  </script>
  <![endif]-->
    <!--[if !IE]><!-->  
	<script>
	 $(document).ready(function() {
	  $("div.full,.index_swipers").css('height', window.innerHeight+'px')
  $("div.index_content").css('margin-top', window.innerHeight)
  
$(window).resize(function() { $("div.full,.index_swipers").css('height', window.innerHeight+'px');
$(".index_swipers").css('width', window.innerWidth+'px');
$(".index_swipers .swiper-slide").css('width', window.innerWidth+'px');
  $("div.index_content").css('margin-top', window.innerHeight)
});
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 mode : 'vertical',
	 speed:1000,
	 cssWidthAndHeight : 'width',
   
mousewheelControl : true,
onSlideChangeStart: function(swiper){
$.news_open();
	},
	onSlideChangeEnd: function(swiper){
if($('.swiper-slide-active').hasClass('lastslide')){
	 index_swipers.disableMousewheelControl();
	
	  }
	},
		
	onFirstInit: function(swiper){$.news_open()}	 
  });
  
  $(window).scroll(function() {  
  if($(window).scrollTop()==0){
	
	 index_swipers.enableMousewheelControl();
	  
	  }
});
  
 });
  </script> <!--<![endif]-->
  <?php }; ?>