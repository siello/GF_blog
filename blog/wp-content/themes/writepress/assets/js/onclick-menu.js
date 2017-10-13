( function( $ ) {
	"use strict";	
    $('.mobile-nav ul.menu > li:has(ul)').add('.mobile-nav .mobile-menu-header').append('<span class="mobile-collapse-toggle"><i class="genericon genericon-expand"></i></span>');
    $('.mobile-nav .menu-item:not(.mobile-menu-header) .mobile-collapse-toggle').click(function() {
        var $icon = $(this).find('i');
        $icon.toggleClass('genericon-collapse genericon-expand');

        if ($icon.hasClass('genericon-expand')) {
            $(this).parent('li').find('ul').slideUp();
        } else {
            $(this).parent('li').find('ul').slideDown();
        }

    });

    $('.mobile-nav .mobile-menu-header .mobile-collapse-toggle').click(function() {
        var $icon = $(this).find('i');
        $icon.toggleClass('genericon-collapse genericon-expand');
        var $menu = $(this).parents('.menu');
        var $arrows = $menu.find('.menu-item:not(.mobile-menu-header) .mobile-collapse-toggle i');


        if ($icon.hasClass('genericon-expand')) {
            $arrows.removeClass('genericon-collapse').addClass('genericon-expand');
            $menu.find('ul').slideUp();
        } else {
            $arrows.removeClass('genericon-expand').addClass('genericon-collapse');
            $menu.find('ul').slideDown();
        }

    });
	
    $('.mobile-nav ul.menu > li > ul').hide();
    $('.mobile-nav ul.menu > li.current-menu-item > ul, .mobile-nav ul.menu > li.current-menu-parent > ul, .mobile-nav ul.menu > li.current-menu-ancestor > ul')
    .show()
    .parent('li').find('i').removeClass('genericon-expand').addClass('genericon-collapse');
	
})( jQuery );