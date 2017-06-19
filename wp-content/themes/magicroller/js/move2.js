$(document).ready(function() {

var gallery_xz = new Swiper('.gallery_xz',{
visibilityFullFit : true,
 pagination: '.galic_na',
 paginationClickable: true,
speed:1000
  });

	 
	 
	var qiehuan = new Swiper('.half_5 .qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".half_5 .gallery_qiehuan_x .swiper-wrapper a").removeClass('active')
      $(".half_5 .gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuan.activeIndex).addClass('active')  
    }
  });

 $(".half_5 .gallery_qiehuan_x .swiper-wrapper a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $(".half_5 .gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active');
    $(this).addClass('active');
    qiehuan.slideTo($(this).index() ,1000, false );
   });
 $(".half_5 .gallery_qiehuan_x .swiper-wrapper a").click(function(e){
    e.preventDefault()
  });



var gallery_qiehuan_x1 = new Swiper('.half_5 .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 5,
speed:500
  });
 qiehuan.params.control = gallery_qiehuan_x1;
 gallery_qiehuan_x1.params.control = qiehuan;
	 

var qiehuan1 = new Swiper('.left_p  .qiehuan',{
visibilityFullFit : true,
calculateHeight : true,
simulateTouch : false,
speed:1000,
onSlideChangeStart: function(){
      $(".left_p  .gallery_qiehuan_x .swiper-wrapper a").removeClass('active')
      $(".left_p  .gallery_qiehuan_x  .swiper-wrapper a").eq(qiehuan1.activeIndex).addClass('active')  
    }
  });

 $(".left_p  .gallery_qiehuan_x .swiper-wrapper a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $(".left_p  .gallery_qiehuan_x  .swiper-wrapper .active").removeClass('active');
    $(this).addClass('active');
    qiehuan1.slideTo($(this).index() ,1000, false );
   });
 $(".left_p  .gallery_qiehuan_x .swiper-wrapper a").click(function(e){
    e.preventDefault()
  });
var gallery_qiehuan_x = new Swiper('.left_p .gallery_qiehuan_x',{
visibilityFullFit : true,
cssWidthAndHeight: 'width',
slidesPerView: 4,
speed:500
  });


	 qiehuan1.params.control = gallery_qiehuan_x;
    gallery_qiehuan_x.params.control = qiehuan1;
				   
$(window).stop().scroll(function(){
 var scrollTop = $(document).scrollTop();
 if(scrollTop >100){
$("#header_pic_nav").slideUp(500);$('#nav_b').addClass("navb_open");
 } else if(scrollTop < 100) {
 $("#header_pic_nav").slideDown(500);
 $('#nav_b').removeClass("navb_open");
 }

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

