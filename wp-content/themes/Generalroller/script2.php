<?php $detect = new Mobile_Detect();
$heng_gun= get_option('mytheme_heng_gun'); 
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
     paginationClickable: true,
	 speed:800,
	 loop:true,

      onInit: function(swiper){
       $.news_open();
	   
    },
 onSlideChangeStart: function(swiper){
$.news_open();
	}
	

	
  

   }) });
   
   
  
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
  $("div.index_content").css('margin-top', window.innerHeight)
});
  var index_swipers = new Swiper('.index_swipers',{
     pagination: '.index_p',
     paginationClickable: true,
	 <?php  if($heng_gun){echo 'autoplay :'.$heng_gun.'000,';} ?>
     speed:10000,
	 loop:true,
onSlideChangeStart: function(swiper){
$.news_open();
	},	
	onFirstInit: function(swiper){$.news_open()}	 
  });
 $('.index_prve').on('click', function(e){
    e.preventDefault()
    index_swipers.swipePrev()
  })
  $('.index_next').on('click', function(e){
    e.preventDefault()
    index_swipers.swipeNext()
  }) 
 
  
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
	 <?php  if($heng_gun){echo 'autoplay :'.$heng_gun.'000,';} ?>
	 speed:1000,
	 loop:true,
onSlideChangeStart: function(swiper){
$.news_open();
	},	
	onFirstInit: function(swiper){$.news_open()}	 
  });
  
 $('.index_prve').on('click', function(e){
    e.preventDefault()
    index_swipers.swipePrev()
  })
  $('.index_next').on('click', function(e){
    e.preventDefault()
    index_swipers.swipeNext()
  })
  
 });
  </script> <!--<![endif]-->
  <?php }; ?>