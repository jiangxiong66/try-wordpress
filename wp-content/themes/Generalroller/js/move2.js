$(document).ready(function() {

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

