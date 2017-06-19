$.fn.left_opacitys=function () {$(this).animate({"opacity":"1","right":"0"},800,'easeOutSine');}
$.fn.left_opacitys_no=function () {$(this).animate({"opacity":"0","right":"-100px"},500,'easeOutSine');}
$.fn.up_opacitys=function () {$(this).animate({"opacity":"1","top":"0"},800,'easeOutSine');}
$.fn.up_opacitys_no=function () {$(this).animate({"opacity":"0","top":"-100px"},500,'easeOutSine');}


$.extend({fadeuot_now:function(){   $("#product_nav").slideUp(500) ;$("#header_pic_nav").slideUp(500);}});


$.extend({news_open:function(){
	
	$('.swiper-slide.swiper-slide-active').children(".bag_animate").addClass("bag_animates");
	$('.swiper-slide').not(".swiper-slide-active").children(".bag_animate").removeClass("bag_animates");
	

	$('.news_tuoch.swiper-slide-active').children(".swiper-slide_in").children('.left_news').delay(500).animate({"opacity":"1","margin-left":"0"},800,'easeOutSine');
	$('.news_tuoch.swiper-slide-active').children(".swiper-slide_in").children('.right_news').delay(500).animate({"opacity":"1","margin-right":"0"},800,'easeOutSine');
	$('.news_tuoch').not('.swiper-slide-active').children(".swiper-slide_in").children('.left_news').animate({"opacity":"0","margin-left":"-100px"},800,'easeOutSine');
	$('.news_tuoch').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_news').animate({"opacity":"0","margin-right":"-100px"},800,'easeOutSine');
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.left_pic').children("img").delay(500).animate({"opacity":"1","left":"0"},800,'easeOutSine');
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children(".title_lr_mod").delay(500).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("h3").delay(700).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("p").delay(900).left_opacitys();
	$('.left_right.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children(".btn").delay(1000).left_opacitys();
	

	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.left_pic').children("img").animate({"opacity":"0","left":"-100px"},800,'easeOutSine');
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children(".title_lr_mod").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("h3").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children('#alpha').children("p").left_opacitys_no();
	$('.left_right').not('.swiper-slide-active').children(".swiper-slide_in").children('.right_text').children("a").left_opacitys_no();
	
	
	
	
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.down_pic').children("img").delay(500).animate({"opacity":"1","top":"0"},1500,'easeOutCubic');
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("h3").delay(1500).up_opacitys();
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("p").delay(1500).up_opacitys();
	$('.up_down.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children(".btn").delay(1500).up_opacitys();
		$('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.down_pic').children("img").animate({"opacity":"0","top":"800px"},800,'easeOutSine');
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("h3").up_opacitys_no();
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children('#alpha').children("p").up_opacitys_no();
	    $('.up_down').not('.swiper-slide-active').children(".swiper-slide_in").children('.up_text').children(".btn").up_opacitys_no();
			
	$('.case_index_mod.swiper-slide-active').children(".swiper-slide_in").children('.case_up').delay(500).animate({"opacity":"1"},800,'easeOutSine');
	$('.case_index_mod.swiper-slide-active').children(".swiper-slide_in").children('.case_index').delay(1000).animate({"opacity":"1"},800,'easeOutSine');
	
  $('.case_index_mod').not('.swiper-slide-active').children(".swiper-slide_in").children('.case_up').animate({"opacity":"0"},800,'easeOutSine');
  $('.case_index_mod').not('.swiper-slide-active').children(".swiper-slide_in").children('.case_index').animate({"opacity":"0"},800,'easeOutSine');
	
}});
	
	
	
	$(document).ready(function() {
  
var bodyheight = document.body.clientHeight;
if(bodyheight<669){caseheight='69px'}else{caseheight='150px'}
 $(".case_up ").css({"margin-top": caseheight});
$(window).resize(function() {  
var bodyheight = document.body.clientHeight;
if(bodyheight<669){caseheight='69px'}else{caseheight='150px'}
 $(".case_up ").css({"margin-top": caseheight});

}); 

$('#onlie_weixin').click(function() {  $('.erweima_weixin').fadeIn(); $('.erweima_weixin').animate({"bottom":"70px"},800,'easeOutBack');   }); 
 
$('.weixn_closed').click(function() { $(this).parent('.erweima_weixin').animate({"bottom":"-200px"},800,'easeInBack'); $('.erweima_weixin').fadeOut();   }); 
 $(".pic_l_in ul li").mouseenter(function() { $(this).children(".vedio_over_li").animate({ "bottom": 0},500);});
$(".pic_l_in ul li").mouseleave(function() { $(this).children(".vedio_over_li").animate({ "bottom": "-100%"}, 500);});
$(".ouf_1").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_1").fadeIn(0);
	 $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });  
	 
$(".ouf_2").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_2").fadeIn(0);
	  $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });	 
 $(".ouf_3").click(function() {
	if($(this).hasClass("cues")){}else{
	 $(this).parent(".fourq_title").nextAll("ul").fadeOut(0);
	 $(this).parent(".fourq_title").nextAll(".ulf_3").fadeIn(0);
	  $(this).parent(".fourq_title").children("a").removeClass("cues")
	 $(this).addClass("cues")
	}
	 });

 $("#header_pic_menu").not(".no_donghuadd").children("li").stop().mouseenter(function() {
	  $(this).children("a").children("img").stop().animate({"top":"23px"},300);
	  $(this).children("a").children("b").stop().animate({"top":"-42px"},300);
	 });
 
  $("#header_pic_menu").not(".no_donghuadd").children("li").stop().mouseleave(function() {
      $(this).children("a").children("img").stop().animate({"top":"0"},300);
	  $(this).children("a").children("b").stop().animate({"top":"0"},300);
	 });
 
   $("#nav_b").click(function() {
      $("#header_pic_nav").slideToggle("800");

	  $("#product_nav").fadeOut(100)
	
	 }); 
  
   
   $(".show_top_icon").stop().mouseenter(function() { 
   $(this).stop().animate({"height":"96px"},300);
   if($(this).hasClass('show_iocn_ok')){}else{

   $(".show_top_icon").addClass('show_iocn_ok')
   }
   });
   
     $(".show_top_icon").stop().mouseleave(function() { 
   $(this).stop().animate({"height":"55px"},300);
   if($(this).hasClass('show_iocn_ok')){
	   
	    $(".show_top_icon").remove('show_iocn_ok')
	   }
   });
   
   
   $(".product_b").click(function() {
      $("#product_nav").slideToggle("800")
	 
	 var nav_pic_swiper = new Swiper('.nav_pic_swiper',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000
  });
$('#nav_pic_swiper_prve').click(function(){nav_pic_swiper.swipePrev(); });
$('#nav_pic_swiper_next').click(function(){nav_pic_swiper.swipeNext(); });
 $("#header_pic_nav").fadeOut(100)
	 }); 
	 
	 
var gallery_xz = new Swiper('.gallery_xz',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
 pagination: '.galic_na',
 paginationClickable: true,
speed:1000
  });
$('.gallery_xz .galic_prve').click(function(){gallery_xz.swipePrev(); });
$('.gallery_xz .galic_next').click(function(){gallery_xz.swipeNext(); }); 
	 
	 
	var qiehuan = new Swiper('.qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active')
      $(".gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuan.activeIndex).addClass('active')  
    }
  });

 $(".gallery_qiehuan_x  .swiper-wrapper a").on('click',function(e){
    e.preventDefault()
    $(".gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active')
    $(this).addClass('active');
	
     qiehuan.swipeTo( $(this).index() ,1000, false );
  });
  $(".gallery_qiehuan_x  .swiper-wrapper a").click(function(e){
    e.preventDefault()
  });




var gallery_qiehuan_x1 = new Swiper('.half_5 .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 9,
speed:500
  });

var gallery_qiehuan_x = new Swiper('.left_p .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });
$(".gallery_qiehuan_x").children(".swiper-wrapper").css("width", 80 * $(".gallery_qiehuan_x").children(".swiper-wrapper").children("a").length + "px");
$('.half_5 .gallery_qiehuan_x .galic_prve').click(function(){gallery_qiehuan_x1.swipePrev(); });
$('.half_5 .gallery_qiehuan_x .galic_next').click(function(){gallery_qiehuan_x1.swipeNext();});

$('.left_p .gallery_qiehuan_x .galic_prve').click(function(){ gallery_qiehuan_x.swipePrev(); });
$('.left_p .gallery_qiehuan_x .galic_next').click(function(){ gallery_qiehuan_x.swipeNext();});


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


var initTop = 0;
$(window).scroll(function(){
 var scrollTop = $(document).scrollTop();
 if(scrollTop >150){
$("#header_pic_nav").slideUp(500);
 } else if(scrollTop < 150) {
 $("#header_pic_nav").slideDown(500);
 }

});


  
 });

