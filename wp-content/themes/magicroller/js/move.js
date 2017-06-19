$.fn.left_opacitys=function () {$(this).animate({"opacity":"1","right":"0"},800,'easeOutSine');}
$.fn.left_opacitys_no=function () {$(this).animate({"opacity":"0","right":"-100px"},500,'easeOutSine');}
$.fn.up_opacitys=function () {$(this).animate({"opacity":"1","top":"0"},800,'easeOutSine');}
$.fn.up_opacitys_no=function () {$(this).animate({"opacity":"0","top":"-100px"},500,'easeOutSine');}


$.extend({fadeuot_now:function(){   $("#product_nav").slideUp(500) ;  $("#header_pic_nav").slideUp(500); $('#nav_b').removeClass("navb_open");; }});


$.extend({news_open:function(){
	$('.swiper-slide.swiper-slide-active').children(".bag_animate").addClass("bag_animates");
	$('.swiper-slide').not(".swiper-slide-active").children(".bag_animate").removeClass("bag_animates");
	$('.swiper-slide.swiper-slide-active').addClass('letsgo');
	$('.swiper-slide').not('.swiper-slide-active').removeClass('letsgo')
}});

	
	$(document).ready(function() {
  
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
	  $("#product_nav").fadeOut(600);
	   $(this).removeClass("navb_open");
	  }else{
		  
		   $("#product_nav").fadeIn(600);
		   $("#header_pic_nav").fadeOut(600);
	    $(this).addClass("navb_open");
		  }
	
	 }); 
	 
$(".contact_footer_box").click(function() {$(this).next(".contact_footer").animate({"bottom":"0"},300,'easeOutSine');  });
 $(".contact_footer_closed").click(function() {$(this).parents(".contact_footer").animate({"bottom":"-60px"},300,'easeOutSine');  });
   $("#nav_b").click(function() {
	   if($(this).hasClass("navb_open")){
     $("#header_pic_nav").slideUp(500);
	    $(this).removeClass("navb_open");
	  }
	
	  else{

		 ;  $("#header_pic_nav").slideDown(500);
		    $(this).addClass("navb_open");
		  }
	  
	  $("#product_nav").fadeOut(100);
	     
					 var header_pic_nav = new Swiper('.headers_kk ',{
                     slideClass : 'menu-item',
                     slidesPerView: 'auto',
					 speed:800,
                    freeMode: true
					   }) ;
	 }); 
  

   
   
$(".contact_footer_caidan").click(function() {
 var nav_pic_swiper = new Swiper('.nav_pic_swiper',{
visibilityFullFit : true,
speed:1000
  });
  
var prodnav_wrapper = new Swiper('.prodnav-wrapper ',{
                     slidesPerView: 'auto',
					  direction : 'vertical',
					  speed:800,
                      freeMode: true
					   }) ;

  

	 }); 

    $("#header_pic_menu").css("width", 100 * $("#header_pic_menu").children("li").length + "px");
    $("#header_menu").css("height", 260 * $("#header_menu").children("li").length + "px");
var header_pic_nav = new Swiper('.header_nav_drog_in ',{
                     slideClass : 'menu-item',
                     slidesPerView: 'auto',
					 speed:800,
                    freeMode: true
					   }) ;
					   
					 var header_pic_nav = new Swiper('.headers_kk ',{
                     slideClass : 'menu-item',
                     slidesPerView: 'auto',
					 speed:800,
                    freeMode: true
					   }) ;
  


 });

