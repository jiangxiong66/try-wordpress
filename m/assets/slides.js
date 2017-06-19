/* 
 * @author : pgradelet
 * @date   : 21 sept. 2012
 */

(function(){

    Slides = function(){
        
        //Vars
        this.step   = 1;
        
        //Elements
        this.slidesContainer = $("#slides_container");
        this.currentSlide    = $("#screen_0");
        this.nextSlide       = $("#screen_"+this.step);
        this.slidesList      = $(".screen",Application.mainContent);
        this.navContainer    = $(".navContainer");
		this.topnav    = $(".topnav");
		
        this.navList         = $(".navContainer .sc_nav");
	    this.topnav         = $(".topnav");
		this.topnavList         = $(".topnav li");
        
        //Colors
//        this.unselectColor   = 
        
        //Anim params
        this.scrolling     = false;
        this.slideEasing   = "easeInOutExpo";
        this.slideDuration = 1000;
    };
    
    
    Slides.prototype = {
        
        init : function(){
            
            if(Application.isMobile.any()){
                this._initTouch();
            }else{
                this._initMouseWheel();
            }
            this._initSlideListeners();
        },
        
        _initMouseWheel : function(){
            var self = this;   
            Application.document.on("mousewheel",$.debounce(250,{at_begin : false},function(event,delta){
                event.preventDefault();
                if(!self.slidesContainer.is(':animated') && !Application.popupOpen){
                    if(delta < 0 && self.step < self.slidesList.length){
                        self.scrollDown();
                    }else if(delta > 0 && self.step > 1){
                        self.scrollUp();
                    }
                }
            }));
        },
        
        _initTouch : function(){
                 
            var self = this;   
            Application.window.on("touchstart",function(event){
                self.pageY  = event.originalEvent.touches[0].pageY;
                self.startY = self.pageY;
            });

            Application.window.on("touchmove",function(event){
                event.preventDefault();
                self.pageY   = event.originalEvent.touches[0].pageY;
                var moveY    = self.startY - self.pageY;
                if(!self.slidesContainer.is(':animated')  && !Application.popupOpen){
                    if(moveY > 0 && self.step < self.slidesList.length){
                        self.scrollDown();
                    }else if(moveY && self.step > 1){
                        self.scrollUp();
                    }
                }
            });  
            
        },




        _initSlideListeners : function(){
            var self = this;
            
            Application.document.on("click",Application.selectors.register,function(event){
                event.preventDefault();
                $(Application.selectors.btn_member).trigger("click");
            });
            
            Application.document.on("click",Application.selectors.nav,function(event){
                event.preventDefault();
                var numSlide = parseInt($(this).find(".num").text(),10);
                self._slideTo(numSlide);
            });
            
            Application.document.on("click",Application.selectors.logo,function(event){
                event.preventDefault();
                self._slideTo(0);
            });
            
            Application.document.on("click",Application.selectors.know_more+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(1);
            });
            
			
		   Application.document.on("click",Application.selectors.nav_about+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(1);
            });
			
			
		 Application.document.on("click",Application.selectors.nav_service+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(2);
            });
			
			
					 Application.document.on("click",Application.selectors.nav_case+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(3);
            });
			
		
							 Application.document.on("click",Application.selectors.nav_partner+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(4);
            });
			
			
	    Application.document.on("click",Application.selectors.nav_contact+", "+Application.selectors.car,function(event){
                event.preventDefault();
                self._slideTo(5);
            });
			
				
			
        },
        
        scrollDown : function(){
            this._slideContainer(1);
        },
        
        scrollUp : function(){
            this._slideContainer(-1);
        },
        
        _slideContainer : function(way){
            var self = this;
            var slideHeight = (way >0) ? this.nextSlide.outerHeight(true) :  this.prevSlide.outerHeight(true) ;
            var top  = (way*(slideHeight));
    
            this.slidesContainer.animate({
               top : "-="+top
            },{duration : this.slideDuration, easing : this.slideEasing, complete : function(){
                self.step     += way;
                self.nextSlide =  self.slidesList.eq(self.step);
                self.prevSlide =  self.slidesList.eq(self.step-1);
                self._updateNav();
				 self._updatetopNav();
            }});
        },
        
        _slideTo : function(numSlide){
            var self = this;
            var height = 0;
            this.slidesList.filter(":lt("+(numSlide)+")").each(function(){
                height += $(this).outerHeight(true);
            });
            if(numSlide < (this.slidesList.length-1) && numSlide > 0){
                height += 350;
            }
            
            if(numSlide == 5){
                $("#screen_5").css({paddingBottom : 0});
                $("#screen_5 .content").css({marginTop : -200});
            }
            
            this.slidesContainer.animate({
               top : -(height) 
            },{duration : this.slideDuration, easing : this.slideEasing, complete : function(){
                self.step      =  numSlide+1;
                self.nextSlide =  self.slidesList.eq(self.step);
                self.prevSlide =  self.slidesList.eq(self.step-1);
                self._updateNav();
				  self._updatetopNav();
            }});
        },
        

        _updateNav : function(){
            var self = this;
            
            if(this.step == 1){
                this.navContainer.animate({right:"-100px"}).fadeOut(600);
            }else if(!this.navContainer.is(":visible") && this.step > 1){
                this.navContainer.fadeIn(600).animate({right:"100px"});
            }
            
            if(this.step > 1){
                var currentNav = ($(".sc_nav.selected").length > 0) ? $(".sc_nav.selected") : false;
                if(currentNav){
                    currentNav.find(".ico").fadeOut("fast",function(){
                        currentNav.removeClass("selected");
                        $(this).fadeIn("fast");
                    });
                }

                this.navList.eq(this.step-2).find(".ico").fadeOut("fast",function(){
                    self.navList.eq(self.step-2).addClass("selected");
                    $(this).fadeIn("fast");
                });
            }
		
        },
		
		
		
		        _updatetopNav : function(){
            var self = this;
            
            
			  if(this.step == 1){ 
			  
		  var topnav = ($(".topnav .selected").length > 0) ? $(".topnav .selected") : false;
                    topnav.find("a").fadeOut("fast",function(){
                        topnav.removeClass("selected");
                        $(this).fadeIn("fast"); 
						      });
                }
					   

			
			
            if(this.step > 1){
                var currentNav = ($(".topnav .selected").length > 0) ? $(".topnav .selected") : false;
                if(currentNav){
                    currentNav.find("a").fadeOut("fast",function(){
                        currentNav.removeClass("selected");
                        $(this).fadeIn("fast");
                    });
                }

                this.topnavList.eq(this.step-2).find("a").fadeIn("fast",function(){
                    self.topnavList.eq(self.step-2).addClass("selected");
                    $(this).fadeIn("fast");
                });
            }
		
        }
		
		
		
		
		
        

    };
    
	
	

})(jQuery);

