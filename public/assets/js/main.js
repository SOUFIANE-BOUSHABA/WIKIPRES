/*  ---------------------------------------------------
    Template Name: Manup
    Description: Manup Event HTML Template
    Author: Colorlib
    Author URI: http://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------------
		Partner Slider
    ----------------------- */
    $(".partner-logo").owlCarousel({
        items: 6,
        dots: false,
        autoplay: true,
        loop: true,
        smartSpeed: 1200,
        margin: 116,
        responsive: {
            320: {
                items: 2,
            },
            480: {
                items: 3,
            },
            768: {
                items: 4,
            },
            992: {
                items: 5,
            },
            1200: {
                items: 6
            }
        }
    });

    /*------------------------
		Testimonial Slider
    ----------------------- */
    $(".testimonial-slider").owlCarousel({
        items: 2,
        dots: false,
        autoplay: false,
        loop: true,
        smartSpeed: 1200,
        nav: true,
        navText: ["<span class='fa fa-angle-left'></span>", "<span class='fa fa-angle-right'></span>"],
        responsive: {
            320: {
                items: 1,
            },
            768: {
                items: 2
            }
        }
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

})(jQuery);