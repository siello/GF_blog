(function($) {
    "use strict";
    //Preloader
    jQuery(window).load(function() {
        jQuery("#loader").fadeOut();
        jQuery("#mask").delay(1000).fadeOut("slow");
    });

    // YouTube video
    $(window).bind('resize', function() {
        var $player = $('.player');
        var $iframe = $player.find('iframe');
        var width = $player.width();
        var height = $player.height();
        var tarWid = width;
        var tarHei = Math.round(tarWid * 9 / 16);
        if (tarHei < height) {
            tarHei = height;
            tarWid = Math.round(tarHei * 16 / 9);
        }
        var marTop = Math.round((height - tarHei) / 2);
        var marLeft = Math.round((width - tarWid) / 2);
        $iframe.css({
            width: tarWid,
            height: tarHei,
            marginTop: marTop,
            marginLeft: marLeft
        });
    }).triggerHandler('resize');

    //back to top
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });	
    $('.back-to-top,.default_back-to-top').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });    
	
    // Full Screen Menu
    $(".fullscreen_menu_open_button").click(function(e) {
        $(".full_screen_menu_area").addClass("open");
    });
    $(".fullscreen_menu_close_button").click(function(e) {
        $(".full_screen_menu_area").removeClass("open");
    });
	
	
	// Full Screen Menu for Mobile
	$(".full_screen_menu_open_responsive").click(function(e) {
        $(".full_screen_menu_area_responsive").addClass("open");
    });
    $("#full_screen_menu_close_responsive").click(function(e) {
		$("#nav_toggle").removeClass('active');
        $(".full_screen_menu_area_responsive").removeClass("open");
    });


    // Extended Sidebar
    var removeClass = true;
    $(".extended_sidebar_button").click(function() {
        $(".extended_sidebar_area").toggleClass('sidemenu_open');
        $(".extended_sidebar_box").toggleClass('extended_sidebar_mask_open');
        removeClass = false;
    });

    $(".extended_sidebar_area").click(function() {
        removeClass = false;
    });

    $("html").click(function() {
        if (removeClass) {
            $(".extended_sidebar_area").removeClass('sidemenu_open');
            $(".extended_sidebar_box").removeClass('extended_sidebar_mask_open');
        }
        removeClass = true;
    });


    // Horizontal Menu & Vertical Menu
    $(".horizontal_menu").click(function() {
        $(".zolo-small-menu").toggleClass('horizontal_menu_open');
        //$(".nav_button_toggle").siblings().removeClass('nav_button_toggle_active');
        //$(".nav_button_toggle").toggleClass('nav_button_toggle_active');
    });
   
       $(".vertical_menu").click(function() {
        $(".zolo-small-menu").toggleClass('vertical_menu_open');
        //$(".vertical_menu").siblings().removeClass('nav_button_toggle_active');
        //$(".vertical_menu").toggleClass('nav_button_toggle_active');
    });


	// Vertical menu icon fixed
    $('.site_layout').imagesLoaded(function() {
        var header4headercontentheight = $('.zolo_header4 .headercontent_box').height();
        $('.zolo_header4 .headercontent_box .zolo-navigation').height(header4headercontentheight);
    });

    // Top And Nav Full Screen Search 
    $(".full_screen_search_but,#mob_full_screen_search_but").click(function() {
        //$(".search_overlay").addClass("open");
		$(".search_overlay").addClass("open").find('.search-field').focus();
    });
    $(".search_close_but,#mob_search_close_but").click(function() {
        $(".search_overlay").removeClass("open");
    });

	$('.zolo-header-area').on('click', '.nav_search-icon', function(e) {
	  var selector = $('.nav_search_form_area');
	  $(selector).toggleClass('search_area_open').find('.search-field').focus();
	  $('.expanded_search_but .nav_search-icon, .default_search_but .nav_search-icon').toggleClass('search_close_icon');
	  e.preventDefault();
	});
		
	// Header Section One(Top Bar) Expanded search height
	var expanded_searchbox_height = $('.zolo-topbar').height();
	$('.zolo-topbar .zolo_navbar_search.expanded_search_but .nav_search_form_area').height(expanded_searchbox_height);
				
	// Header Section two(Header) Expanded search height
	var expanded_searchbox_height = $('.headercontent_box').height();
	$('.headercontent_box .zolo_navbar_search.expanded_search_but .nav_search_form_area').height(expanded_searchbox_height);
	
	// Header Section two(Header) Expanded search height
	var expanded_searchbox_height = $('.navigation-area').height();
	$('.navigation-area .zolo_navbar_search.expanded_search_but .nav_search_form_area').height(expanded_searchbox_height);

	// select Box Design 
    $(document).ready(function() {
        $(".select-category").each(function() {
            $(this).wrap("<span class='header_category_search_wrapper'></span>");
            $(this).after("<span class='holder'></span>");
        });
        $(".select-category").change(function() {
            var selectedOption = $(this).find(":selected").text();
            $(this).next(".holder").text(selectedOption);
        }).trigger('change');
    })


    // Footer Fixed(Covers Content)
    $(document).ready(function() {
        var footerheight = $('#footer_fixed').outerHeight();
        //alert(footerheight); 
        $('.zolo_footer_fixed_content_mar').css('marginTop', footerheight - 1);
    });

    //Vertical Header Full Screen Slider opacity
    $(window).scroll(function() {
        $("body.ver_full_screen_slider .banner").css("opacity", 1 - $(window).scrollTop() / 1200);
        $("body.ver_full_screen_slider .headerbackground").css("opacity", 0 + $(window).scrollTop() / 200);
    });
   
   
   
	
   

    $(window).load(function() {
		
		// Flexslider
        var $slider_container = $('.post_flexslider');
        $slider_container.imagesLoaded(function() {

            // init Isotope
            $slider_container.flexslider({
                slideshow: true,
                controlNav: false,
                prevText: "",
                nextText: "",
                smoothHeight: true,
            })
        });
		
    });
	
	
	/////////////////////
	///// Isotope //////
	/////////////////////
	
    // Packery
	var $container = $('.site-content.blog_layout_masonry');
    $container.imagesLoaded(function() {
        // init Isotope
        $container.isotope({
            // options
            layoutMode: 'masonry',
            itemSelector: '.masonry-item',
        })
    });

	// Grid 
    var $grid = $('.related_post_list');
    $grid.imagesLoaded(function() {
        // init Isotope
        $grid.isotope({
            // options
            itemSelector: '.fitrow_col',
            layoutMode: 'fitRows',
        })
    });
	// fitRows 
    var $grid2 = $('.fitrow_row');
    $grid2.imagesLoaded(function() {
        // init Isotope
        $grid2.isotope({
            // options
            itemSelector: '.fitrow_columns',
            layoutMode: 'fitRows',
        })
    });

	// Sticky Header Start 
	var headerpositionval = js_local_vars.headerpositionval;
	if (headerpositionval == 'Top') {
			
		var header_sticky_opt = js_local_vars.header_sticky_opt;
		if (header_sticky_opt == 'on') {
			var zolo_topbar_height = Math.abs($(".zolo-topbar").height());
			var zolo_header_height = $(".zolo_header").height();
			var sticky_header_display = js_local_vars.header_sticky_display;
			var header_sticky_effect = js_local_vars.header_sticky_effect;
			if (sticky_header_display == 'section2') {
				var sticky_section = 'sticky_header';
				$('.sticky_header_wrapper').css({
					height: $(".sticky_header_wrapper").height()
				});
			} else if (sticky_header_display == 'section3') {
				var sticky_section = 'sticky_header';
				$('.sticky_header_wrapper').css({
					height: $(".sticky_header_wrapper").height()
				});
			} else {
				var sticky_section = 'sticky_header';
				$('.sticky_header_wrapper').css({
					height: $(".sticky_header_wrapper").height()
				});
			}
			var zolo_header_sticky_position = $('.' + sticky_section).offset();
	
			$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				
				var sticky_position = zolo_header_sticky_position.top;
				
				sticky_position = (sticky_position > 0) ? sticky_position : sticky_position + 1 ;
				if (header_sticky_effect == 'slide_down') {
					if (scroll >= sticky_position + zolo_header_height) {
						$('.' + sticky_section).addClass("sticky_slide_down sticky_header_area");
					} else {
						$('.' + sticky_section).removeClass("sticky_slide_down sticky_header_area");
					}
				} else {
					if (scroll >= sticky_position) {
						$('.' + sticky_section).addClass("sticky_header_fixed sticky_header_area");
					} else {
						$('.' + sticky_section).removeClass("sticky_header_fixed sticky_header_area");
					}
				}
				if (header_sticky_effect == 'shrink') {
					if (scroll >= sticky_position + zolo_header_height) {
						$('.' + sticky_section).addClass("sticky-header-shrunk");
					} else {
						$('.' + sticky_section).removeClass("sticky-header-shrunk");
					}
				}
			});
		}
	}
	// Sticky Header End
	
	$(document).ready(function(){
		
		// start Form Top Slider Title Bar Top Padding
		var sticky_header_wrapper_height1 = $(".titlebar_position_from_top .zolo-header-area").height();
		$('.pagetitle_parallax').css({
			paddingTop: sticky_header_wrapper_height1
		});
		$('.titlebar_position_from_top .post_layout_style4.title_position_middle .post_title_caption').css({
			paddingTop: sticky_header_wrapper_height1
		});
		
		// Mobile Menu Toggle Start
		$("#nav_toggle").click(function() {
			$(".zolo-mobile-navigation").slideToggle();
	
			$(this).siblings().removeClass('active');
			$(this).toggleClass('active');
	
		});
		// Mobile Menu Toggle End
		
		// Contact form 7 start
		$(".wpcf7-form select").wrap("<div class='zt_field'></div>");
        $("<span class='zolo-shortcodes-arrow'></span>").insertAfter(".wpcf7-form select");
        $('.wpcf7-form select[multiple="multiple"]').next(".zolo-shortcodes-arrow").remove();
		// Contact form 7 end
		
		// Blog Style 10 start
		$('.zolo_blog_style10 .zolo_row').each(function(){  
            var highestBox2 = 0;
            $('.zolo_blogcontent', this).each(function(){
                if($(this).height() > highestBox2) 
                   highestBox2 = $(this).height(); 
            });       
            $('.zolo_blogcontent',this).height(highestBox2);
		});
		// Blog Style 10 end
		
		// zilla Likes start
		$('.zilla-likes').live('click',
			function() {
				var link = $(this);
				if(link.hasClass('active')) return false;
			
				var id = $(this).attr('id'),
					postfix = link.find('.zilla-likes-postfix').text();
				
				$.post(zolo_zilla_likes.ajaxurl, { action:'zilla-likes', likes_id:id, postfix:postfix }, function(data){
					link.html(data).addClass('active').attr('title','You already like this');
				});
			
				return false;
		});
		
		if( $('body.ajax-zilla-likes').length ) {
			$('.zilla-likes').each(function(){
				var id = $(this).attr('id');
				$(this).load(zolo_zilla_likes.ajaxurl, { action:'zilla-likes', post_id:id });
			});
		}
		// zilla Likes end		
	
		//Theia Sticky Sidebar
		
		if ($("body").hasClass("single-post")) {
			var minWidth = '1200';
		}else{
			var minWidth = '0';
			}
		$('.stickysidebar,.sidebar')
		.theiaStickySidebar({
			additionalMarginTop:100,
			minWidth: minWidth
		});
		
		/* Light Box */
		$(".fancybox").fancybox();
		
	});
	

})(jQuery);