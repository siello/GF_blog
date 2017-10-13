var j$ = jQuery;
j$.noConflict();
"use strict";

j$(document).ready(function() {		
	zt_elements_animation();
	zt_vc_column_equal_heights();
	zt_progress_bar();
	
}); 

j$(window).load(function() {
	zt_owlcarousel();
	zt_blogpostslider1();
	zt_blogpostslider2();
	zt_blogpostslider3();
	zt_blogpostslider4();
	zt_blogpostslider5();
	
}); 
// Blog Modern Slider Start
function zt_owlcarousel(){
	
	j$('.zolo_blog_modern_slider').owlCarousel({
		loop: true,
		autoplay: true,
		nav: true,
		margin: 0,
		responsiveClass: true,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 1,
				nav: true
			},
			1000: {
				items: 1,
				nav: true,
				loop: true
			}
		}
	
		});
	
	};

// Blog Post Slider Start
function zt_blogpostslider1(){
		j$(".postsliderstyle1").owlCarousel({
		loop:true,
		autoplay:true,
		autoHeight: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		smartSpeed:500,
		margin:0,
		items:1,
		responsiveClass:true,
		navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
		responsive:{
		0:{
			items:1,
			nav:true
		},
		500:{
			items:1,
			nav:true
		},
		800:{
			items:1,
			nav:true
		},
		1050:{
			items:1,
			nav:true,
			loop:true
		}
		}
		});
}

function zt_blogpostslider2(){
		j$(".postsliderstyle2").owlCarousel({
		loop:true,
		autoplay:true,
		autoHeight: false,
		margin:4,
		responsiveClass:true,
		navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
		responsive:{
		0:{
			items:1,
			nav:true
		},
		500:{
			items:1,
			nav:true
		},
		800:{
			items:1,
			nav:true
		},
		1050:{
			items:2,
			nav:true,
			loop:true
		}
		}
		});
}
function zt_blogpostslider3(){
		j$(".postsliderstyle3").owlCarousel({
		stagePadding:200,
		autoplay:true,
		items:1,
		loop:true,
		margin:8,
		nav:true,
		navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
		responsive:{
		0:{
			items:1,
			stagePadding:0,
		},
		500:{
			items:1,
			stagePadding:0,
		},
		800:{
			items:1,
			stagePadding:0,
		},
		1300:{
			items:1,
			stagePadding:300,
		}
		}	
			
		});
	};
function zt_blogpostslider4(){
		j$(".postsliderstyle4").owlCarousel({
		loop:true,
		autoplay:true,
		autoHeight: false,
		margin:4,
		responsiveClass:true,
		navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
		responsive:{
		0:{
			items:1,
			nav:true
		},
		500:{
			items:1,
			nav:true
		},
		800:{
			items:1,
			nav:true
		},
		1050:{
			items:3,
			nav:true,
			loop:true
		}
		}
		});
	};
function zt_blogpostslider5(){
	
		j$(".postsliderstyle5,postsliderstyle1").owlCarousel({
		loop:true,
		autoplay:true,
		autoHeight: false,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		smartSpeed:500,
		margin:0,
		items:1,
		responsiveClass:true,
		navText:["<i class=\"fa fa-angle-left\"></i>","<i class=\"fa fa-angle-right\"></i>"],
		responsive:{
		0:{
			items:1,
			nav:true
		},
		500:{
			items:1,
			nav:true
		},
		800:{
			items:1,
			nav:true
		},
		1050:{
			items:1,
			nav:true,
			loop:true
		}
		}
		});
}
		
// Elements animation
function zt_elements_animation(){		
	j$('.animated').appear(function() {
	var element = j$(this);
	var animation = element.data('animation');
	var animationDelay = element.data('delay');
	if (animationDelay) {
		setTimeout(function() {
			element.addClass(animation + " visible");
			element.removeClass('hiding');
			if (element.hasClass('counter')) {
				element.children('.value').countTo();
			}
		}, animationDelay);
	} else {
		element.addClass(animation + " visible");
		element.removeClass('hiding');
		if (element.hasClass('counter')) {
			element.children('.value').countTo();
		}
	}
	}, {
	accY: -150
	});
	
	}  

/* column Height */
function zt_vc_column_equal_heights(){
	
	j$('.vc_row-fluid').each(function() {
		
		var highestBox = 0;
		j$('.equal_height', this).each(function() {
		
		if (j$(this).height() > highestBox)
		highestBox = j$(this).height();
		});
		
		j$('.equal_height', this).height(highestBox);
	});
}

/* progress bar */
function zt_progress_bar(){
		
	j$(".z_pb_holder").appear(function(){
		//alert("hello");
		j$(this).find(".progress_bar_sc").each(function (index) {
			var j$this = j$(this),
				bar = j$this.find(".pb_bg"),
				bar_stripe = j$this.find(".pb_stripe"),
				val = bar.data("percentage-value");

			setTimeout(function () {
				bar.css({"width": val + "%"});
				bar_stripe.css({"width": val + "%"});
			}, index * 200);
		});

	});
}
