(function(){
  
    Application = function(){
        var self = this;
        
        //App var
        this.debug = true;
        
        //Main
        this.document    = $(document);
        this.window      = $(window);
        this.body        = $("body");
        this.mainContent = $("#main");
        this.popupOpen   = false;
        
        //Selectors
        this.selectors    = {
            btn_member : "#btn_become_member",
            register   : ".register",
            nav        : ".navContainer .sc_nav",
			 topnav        : ".topnav li",
            logo       : "#logo",
            know_more  : "#btn_know_more",
			
			 nav_about  : "#nav_about",
			 
			  nav_service  : "#nav_service",
			  
			  
			   nav_case  : "#nav_case",
			   
			   
			    nav_partner  : "#nav_partner",
				
				
				 nav_contact  : "#nav_contact",
				 
				 
				 
            car        : "#voiture",
            btn_contact  : "#btn_contact",
            cgv        : ".cgv"
        }
        
        //Block Keyboard keys
        this.keysBlocked    = [38,40,37,39,32];

        //Mobile
        this.isMobile = {
            Android: function() {
                return navigator.userAgent.match(/Android/i) ? true : false;
            },
            BlackBerry: function() {
                return navigator.userAgent.match(/BlackBerry/i) ? true : false;
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
            },
            Windows: function() {
                return navigator.userAgent.match(/IEMobile/i) ? true : false;
            },
            any: function() {
                return (self.isMobile.Android() || self.isMobile.BlackBerry() || self.isMobile.iOS() || self.isMobile.Windows());
            }
        };
        

    };
  
    Application.prototype = {
      
        main : function(){
            Application.ROOT_URL  = ROOT_URL;
            Application.FORM_PRO  = FORM_PRO;
            Application.FORM_PART = FORM_PART;
            
            if(this.isMobile.any()){
                this.hideAddressBar();
            }
            //Init Slides
            this._initHeaderLinks();
            this._initSlides();
            this._blockKeyboard();
            this._initResize();
            
            /* if(this.isMobile.any()) {
              window.location = ROOT_URL + "mobile/"; 
            } */
            
        // toute la partie lié au booking, gmap, etc..
        //          this.initBooking();
        },
        
        _blockKeyboard : function(){
            var self   = this;
            Application.document.on("keydown",function(event){
                var el  = $(document.activeElement);
                var key = (event.keyCode == 0) ? event.which : event.keyCode;
                if($.inArray(key, self.keysBlocked) != -1 && (!el.is("textarea") && !el.is("input"))){
                    event.preventDefault();
                }
            });
        },
        
        _initHeaderLinks : function(){
            var self = this;
            Application.document.on("click","nav a:not(.outlink)",function(event){
                event.preventDefault();
                self.popup = new Popup($(this).attr('href'));
            });
            
            //Over
            Application.document.on("mouseover",this.selectors.btn_member,function(){
                $(this).animate({color : "#FFFFFF"},{duration : 250});
            });
            
            Application.document.on("mouseleave",this.selectors.btn_member,function(){
                $(this).animate({color : "#242424"},{duration : 250});
            });
            
            //Over
            var timer;
            Application.document.on("mouseover",Application.selectors.know_more+", "+Application.selectors.car,function(){
                clearTimeout(timer)
                timer = setTimeout(function(){
                    var $know_more = $(Application.selectors.know_more);
                    $know_more.animate({color : "#FCCB35"},{duration : 250});
                    $know_more.find("img").animate({top : 50},{duration : 150,complete: function(){
                        $(this).attr('src','/themes/default/images/en-avant-arrow_hover.png').css({top : -50}).animate({
                            top : 0
                        },{duration : 150});
                    }});
                },100);
            });
            
            Application.document.on("mouseleave",Application.selectors.know_more+", "+Application.selectors.car,function(){
                clearTimeout(timer)
                timer = setTimeout(function(){
                    var $know_more = $(Application.selectors.know_more);
                    $know_more.animate({color : "#FFFFFF"},{duration : 300});
                    $know_more.find("img").animate({top : 50},{duration : 150,complete: function(){
                        $(this).attr('src','/themes/default/images/en-avant-arrow.png').css({top : -50}).animate({
                            top : 0
                        },{duration : 150});
                    }});
                },100);
            });
            
            //Over
            Application.document.on("mouseover",this.selectors.btn_contact,function(){
                $(this).animate({color : "#FCCB35"},{duration : 250});
            });
            
            Application.document.on("mouseleave",this.selectors.btn_contact,function(){
                $(this).animate({color : "#FFFFFF"},{duration : 250});
            });
            
            //Over
            Application.document.on("mouseover",this.selectors.cgv,function(){
                $(this).animate({color : "#FFFFFF"},{duration : 250});
            });
            
            Application.document.on("mouseleave",this.selectors.cgv,function(){
                $(this).animate({color : "##757372"},{duration : 250});
            });
            
            
            //Over
            Application.document.on("mouseover",this.selectors.register,function(){
                if($(this).hasClass("bgdark")){
                    $(this).animate({color : "#FCCB35"},{duration : 250});
                }else if($(this).hasClass("nobg_light")){
                    $(this).animate({color : "#242424"},{duration : 250});
                }else{
                    $(this).animate({color : "#FFFFFF"},{duration : 250});
                }
            });
            
            Application.document.on("mouseleave",this.selectors.register,function(){
                if($(this).hasClass("bgdark")){
                    $(this).animate({color : "#FFFFFF"},{duration : 250});
                }else if($(this).hasClass("nobg_light")){
                    $(this).animate({color : "#FFFFFF"},{duration : 250});
                }else{
                    $(this).animate({color : "#242424"},{duration : 250});
                }
            });
            
        },
        
        
        _initSlides : function(){
            this.slides = new Slides();
            this.slides.init();
        },
        
        
		
		  
        _initResize : function(){
            var self = this
            this.window.on("resize",function(){
				 
               var top = 0;
			  
               self.slides.slidesList.filter(":lt("+(self.slides.step-1)+")").each(function(){
                   top += $(this).outerHeight(true);
               });
               if(self.slides.step > 1){
                   top += 350;
               }
               self.slides.slidesContainer.css({top : -(top)});
               if(self.slides.step == 6){
                    $("#screen_5").css({paddingBottom : 375});
                    $("#screen_5 .content").css({marginTop : (-self.window.height()/10)+30});
                   $("#screen_5 .leftcontent").css({marginTop : (-self.window.height()/10)+30});
                }
            });
        },
        
        hideAddressBar : function(){
            var self = this;
            var win  = window;
            var doc  = win.document;

            if(win.addEventListener){
                //scroll to 1
                win.scrollTo( 0, 1 );
                var scrollTop = 1,
                getScrollTop = function(){
                    return win.pageYOffset || doc.compatMode === "CSS1Compat" && doc.documentElement.scrollTop || doc.body.scrollTop || 0;
                },
                //reset to 0 on bodyready, if needed
                bodycheck = setInterval(function(){
                    if( doc.body ){
                        clearInterval( bodycheck );
                        scrollTop = getScrollTop();
                        win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
                    }	
                }, 15 );
                win.addEventListener( "load", function(){
                    setTimeout(function(){
                        //reset to hide addr bar at onload
                        win.scrollTo( 0, scrollTop === 1 ? 0 : 1 );
                    }, 0);
                });
                self.addressBarHidden = true;
            }
        },
        
        initAntiSpam : function(){
            $('.email').each(function(){
                var mail = $(this).text();
                mail = mail.replace('[at]','@');
                $(this).html("<a href='mailto:" + mail + "'>" + mail + "</a>");
            });
        }

    //      initBooking: function(){
    //         this.booking = new Booking();
    //      }
        
  
    }
  
})();
// end init Application


$(document).ready(function(){
    Application = new Application();    
    Application.main();
});


// permet d'afficher du debugage dans la console
fb = function(message) {
  
    if(window.console){
        console.log(message);
    }
}



	

$(function(){
$(".case_modlist li a").hover(function(){
$(this).find("div").stop().animate({top:"101px"},200)
},function(){
$(this).find("div").animate({top:"295px"},300)
});

}
)






jQuery(document).ready(function(){

    jQuery(".contacts").click(function(){
        jQuery(".depth2").slideDown(200);
    });


    jQuery(".depth2").mouseleave(function(){
        jQuery(".depth2").slideUp(400);
    });


    jQuery(".cardAttention").mouseenter(function(){
        jQuery(".f-attention").slideDown(200);
		$(".footerAttention").addClass("cur");
    });


    jQuery(".footerAttention").mouseleave(function(){
        jQuery(".f-attention").slideUp(200);
		$(".footerAttention").removeClass("cur");
    });
	
	

});



 //  联系我们 地点和联系方式进行切换 jquery

$slideshow = {
    context: false,
    tabs: false,
    timeout:5000,      // time before next slide appears (in ms)
    slideSpeed: 1000,   // time it takes to slide in each slide (in ms)
    tabSpeed: 300,      // time it takes to slide in each slide (in ms) when clicking through tabs
    fx: 'scrollLeft',   // the slide effect to use

    init: function() {
        // set the context to help speed up selectors/improve performance
        this.context = $('#slideshow');

        // set tabs to current hard coded navigation items
        this.tabs = $('ul.slides-nav li', this.context);

        // remove hard coded navigation items from DOM
        // because they aren't hooked up to jQuery cycle
        this.tabs.remove();

        // prepare slideshow and jQuery cycle tabs
        this.prepareSlideshow();
    },

    prepareSlideshow: function() {
        // initialise the jquery cycle plugin -
        // for information on the options set below go to:
        // http://malsup.com/jquery/cycle/options.html
        $('div.tab_conatct > ul', $slideshow.context).cycle({
            fx: $slideshow.fx,
            timeout: $slideshow.timeout,
            speed: $slideshow.slideSpeed,
            fastOnEvent: $slideshow.tabSpeed,
            pager: $('ul.slides-nav', $slideshow.context),
            pagerAnchorBuilder: $slideshow.prepareTabs,
            before: $slideshow.activateTab,
            pauseOnPagerHover: true,
            pause: true
        });
    },

    prepareTabs: function(i, slide) {
        // return markup from hardcoded tabs for use as jQuery cycle tabs
        // (attaches necessary jQuery cycle events to tabs)
        return $slideshow.tabs.eq(i);
    },

    activateTab: function(currentSlide, nextSlide) {
        // get the active tab
        var activeTab = $('a[href="#' + nextSlide.id + '"]', $slideshow.context);

        // if there is an active tab
        if(activeTab.length) {
            // remove active styling from all other tabs
            $slideshow.tabs.removeClass('on');

            // add active styling to active button
            activeTab.parent().addClass('on');
        }
    }
};


$(function() {
    // add a 'js' class to the body
    $('body').addClass('js');

    // initialise the slideshow when the DOM is ready
    $slideshow.init();
});



/*========================================================*/
/* HOME
/*========================================================*/
$(document).ready(function(){
	$('#index_logo').plaxify({"xRange":30,"yRange":30})
	$('#index_tit').plaxify({"xRange":20,"yRange":70})

	$('#index_partl').plaxify({"xRange":25,"yRange":20,"invert":true})
	$('#index_partr').plaxify({"xRange":30,"yRange":60})

	$.plax.enable();
});


$(function() {
	$('.item_detail .pages span.prev').hover(
		function() {
			$(this).css({'backgroundPosition':'0px 0px'});
		},
		function() {
			$(this).css({'backgroundPosition':'-102px 0px'});
		}
	);
	
	$('.item_detail .pages span.return_list').hover(
		function() {
			$(this).css({'backgroundPosition':'-643px -246px'});
		},
		function() {
			$(this).css({'backgroundPosition':'-153px 0px'});
		}
	);
	
	$('.item_detail .pages span.next').hover(
		function() {
			$(this).css({'backgroundPosition':'-51px -0px'});
		},
		function() {
			$(this).css({'backgroundPosition':'-153px 0px'});
		}
	);
});



	

$(document).ready(function(){
	slide("#sliderNav", 5, 0, 220, .8);
});

function slide(navigation_id, pad_out, pad_in, time, multiplier){

	// 创建目标路径
	var list_elements = navigation_id + " li.sliderTag";
	var link_elements = list_elements + " a";

	// 启动定时器用于滑动动画
	var timer = 0;

	// 创建幻灯片动画的所有列表元素
	$(list_elements).each(function(i){
		$(this).css("margin-left","60px");
		// 更新计时器
		timer = (timer*multiplier + time);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
		$(this).animate({ marginLeft: "0" }, timer);
	});

	// 创建的所有链接元素的悬停滑动效果	
	$(link_elements).each(function(i){
		$(this).hover(function(){
			$(this).animate({ paddingLeft: pad_out }, 220);
		},function(){
			$(this).animate({ paddingLeft: pad_in }, 220);
		});
	});

}



$(document).ready(function(){
    $("#case-content ul li:eq(2)").addClass("last");
});
	
	
var vitesse_volet = 1800

var volet_1 = false;
var volet_2 = false;
var volet_3 = false;
var volet_4 = false;
var volet_5 = false;


	
$('html').on('click', '#panel_arrow, .plus_1', function(){
	if (volet_1 == true){
		$(this).animate({opacity : '0'});
		$('#event_panel').animate({marginLeft : '100%'}, {duration: vitesse_volet, easing: 'easeOutBounce'});
		$('#type_1, .plus_1, .down_12').delay(700, "myQueue").queue("myQueue", function(){ 
			$(this).show("slide"); 
		}).dequeue("myQueue");
		volet_1 = false;
	}
	else{
		if ($(this).attr('id') != "plus_1")
			$(this).animate({opacity : '1'});
		$('#type_1, .plus_1, .down_12').hide("slide");
		$('#event_panel').animate({marginLeft : '50%'}, {duration: vitesse_volet, easing: 'easeOutBounce', queue : false});
		volet_1 = true;
	}
});

$('html').on('mouseenter', '.panel_arrow', function(){
	$(this).stop(true,true);
	$(this).animate({opacity : '1'});
});

$('html').on('mouseleave', '.panel_arrow', function(){
	$(this).animate({opacity : '0'});
});

if($(document).width() > 481){
	$(window).on('scroll', function(){
		if (volet_1 == true){
			$('#panel_arrow').trigger('click');
		}
		if (volet_2 == true){
			$('#hidden_arrow_2').trigger('click');
		}
		if (volet_3 == true){
			$('#hidden_arrow_3').trigger('click');
		}
		if (volet_4 == true){
			$('#hidden_arrow_4').trigger('click');
		}
		if (volet_5 == true){
			$('#hidden_arrow_5').trigger('click');
		}
	});
}