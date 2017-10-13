(function ($) {
	"use strict";
    
    var mainContent = $(''),
        sidebar = $('.vertical_fix_menu');


    //on window scrolling - fix sidebar nav
    var scrolling = false;
    checkScrollbarPosition();
    $(window).on('scroll', function() {
        if (!scrolling) {
            (!window.requestAnimationFrame) ? setTimeout(checkScrollbarPosition, 300): window.requestAnimationFrame(checkScrollbarPosition);
            scrolling = true;
        }
    });

    function checkMQ() {
        //check if mobile or desktop device
        return window.getComputedStyle(document.querySelector('.zolo_left_vertical_header,.zolo_right_vertical_header'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
    }

    function checkScrollbarPosition() {
        var mq = checkMQ();

        if (mq != 'mobile') {
            var sidebarHeight = sidebar.outerHeight(),
                windowHeight = $(window).height(),
                mainContentHeight = mainContent.outerHeight(),
                scrollTop = $(window).scrollTop();

            ((scrollTop + windowHeight > sidebarHeight) && (mainContentHeight - sidebarHeight != 0)) ? sidebar.addClass('is-fixed').css('bottom', 0): sidebar.removeClass('is-fixed').attr('style', '');
        }
        scrolling = false;
    }
	
})(jQuery);