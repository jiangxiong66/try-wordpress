$.extend({fadeuot_now:function(){     $("#header_pic_nav").slideUp(500); $('#nav_b').removeClass("navb_open");; }});
$.extend({news_open:function(){
	$('.swiper-slide.swiper-slide-active').children(".bag_animate").addClass("bag_animates");
	$('.swiper-slide').not(".swiper-slide-active").children(".bag_animate").removeClass("bag_animates");
	$('.swiper-slide.swiper-slide-active').addClass('letsgo');
	$('.swiper-slide').not('.swiper-slide-active').removeClass('letsgo')
}});


$.fn.about=function () { 
	if( $(window).scrollTop() >= $(this).offset().top-450 ){
  $(this).addClass("move_d");
	};};

$.fn.severs=function () { 
	if( $(window).scrollTop() >= $(this).offset().top-450 ){
  $(this).addClass("move_d");
	};};
	
	

$.fn.news=function () { 
	if( $(window).scrollTop() >= $(this).offset().top-450 ){
     $(this).addClass("move_d");
	};};
	
	
$.fn.cunst=function () {	if( $(window).scrollTop() >= $(this).offset().top-450 ){
     $(this).addClass("move_d");
	};};
	
$.fn.caseshow=function () { 
	if( $(window).scrollTop() >= $(this).offset().top-450 ){
     $(this).addClass("move_d");
	};};




$(document).ready(function() { 

$(window).scroll(function () {
 if( $(window).scrollTop() >=  $(".footer").offset().top-450|| $(document).scrollTop() + $(window).height() >= $(document).height()){
  
 $(".footer").addClass("move_d");
  
  
	};
	});

$(".cunst_code").click(function() { $(this).children('.cunst_vedio').fadeIn(500)});
  $("#header_pic_nav  li.menu-item-has-children").append('<div class="drop_ioc"><div class="drop_ioc_in"> </div></div>')
    $(".header_nav_drog_in").append('<div class="header_hieght"></div>')
  $("#header_pic_nav  li.menu-item-has-children .drop_ioc").click(function(e){
	  if($(this).children('.drop_ioc_in').hasClass('closed_drop')){
		  
		   $(this).prev('.sub-menu').fadeOut(300);
		  $(this).children('.drop_ioc_in').removeClass('closed_drop');
		  }else{
	    $(this).children('.drop_ioc_in').addClass('closed_drop');
        $(this).prev('.sub-menu').fadeIn(600);}
	
  });
  
    $("#nav_b").click(function(e){
	  if($(this).hasClass('closed_nav_b')){
		   $('#header_pic_nav').fadeOut(300);
		  $(this).removeClass('closed_nav_b');
		    $('.header').removeClass('header_fixed');
		  }else{
	      $(this).addClass('closed_nav_b');
		   $('.header').addClass('header_fixed');
          $('#header_pic_nav').fadeIn(600);}

  });
  
  

  
  
  
  $(".header_nav_drog_in").css('max-height', window.innerHeight-60+'px');
 

$('.contact_footer_weixin').click(function() { 
 $('.erweima_weixin').fadeIn(); $('.erweima_weixin').animate({"bottom":"70px"},800,'easeOutBack');   }); 
$('.contact_footer_languges').click(function() { 
 if($(this).hasClass("navb_open")){
 $('#languge_footer').fadeOut(600);
   $(this).removeClass("navb_open");
 }else{
	  $('#languge_footer').fadeIn(600);
   $(this).addClass("navb_open");
	 }
 
 
  }); 
  
  $('.weixn_closed').click(function() { $(this).parent('.erweima_weixin').animate({"bottom":"-200px"},800,'easeInBack'); $('.erweima_weixin').fadeOut();   }); 
$(".contact_footer_caidan").click(function() {
	 if($(this).hasClass("navb_open")){
	  $("#header_pic_nav").fadeOut(600);
	   $(this).removeClass("navb_open");
	      $('.header').removeClass('header_fixed');
	  }else{
		  
		   $("#header_pic_nav").fadeIn(600);
		    $('#nav_b').addClass('closed_nav_b');
		    $('.header').addClass('header_fixed');
	    $(this).addClass("navb_open");
		  }
	
	 }); 
	 
$(".contact_footer_box").click(function() {$(this).next(".contact_footer").animate({"bottom":"0"},300,'easeOutSine');  });
 $(".contact_footer_closed").click(function() {$(this).parents(".contact_footer").animate({"bottom":"-60px"},300,'easeOutSine');  });
 
 

var gallery_xz = new Swiper('.gallery_xz',{
visibilityFullFit : true,
 pagination: '.galic_na',
 paginationClickable: true,
speed:1000
  });

	 
	 
var qiehuan = new Swiper('.left_p #gallery_lightbox  .qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".left_p #gallery_lightbox .gallery_qiehuan_x .swiper-wrapper .swiper-slide").removeClass('active');
      $(".left_p #gallery_lightbox .gallery_qiehuan_x  .swiper-wrapper .swiper-slide").eq(qiehuan.activeIndex).addClass('active')  ;
    }
  });

 $(".left_p #gallery_lightbox .gallery_qiehuan_x .swiper-wrapper .swiper-slide").on('touchstart mousedown',function(e){
    e.preventDefault();
    $(".left_p #gallery_lightbox .gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active');
    $(this).addClass('active');
    qiehuan.slideTo($(this).index() ,1000, false );
   });
 $(".left_p #gallery_lightbox .gallery_qiehuan_x .swiper-wrapper .swiper-slide").click(function(e){
    e.preventDefault();
  });


var gallery_qiehuan_x = new Swiper('.left_p #gallery_lightbox .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });

$(".close_order").click(function() {
    $(".shop_form").fadeOut(500);
});

$(".buy_btn .btn").click(function() {
    $(".shop_form").fadeIn(500);
    var a = $(".shop_form").offset().top - 300;
    $("html,body").animate({
        scrollTop: a
    }, 1e3);
});

$("#content_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#comment_shop_btn").removeClass("cutyes");
    $("#comment_shop").fadeOut(300);
    $("#content_shop").fadeIn(300);
});

$("#comment_shop_btn").click(function() {
    $(this).addClass("cutyes");
    $("#content_shop_btn").removeClass("cutyes");
    $("#content_shop").fadeOut(300);
    $("#comment_shop").fadeIn(300);
});


 });