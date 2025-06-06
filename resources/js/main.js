import $ from 'jquery';
import 'jquery.easing';
import 'owl.carousel';
import WOW from 'wow.js';

window.$ = window.jQuery = $;

$(function () {

    "use strict";

    /** Spinner — изчакваме не DOM ready, а цялата страница */
    $(window).on('load', function () {
        console.log('mainajjaja');
        const $spinner = $('#spinner');
        if ($spinner.length) {
            $spinner.removeClass('show');
        }
    });

    /** WOW init */
    new WOW().init();

    /** Sticky Navbar */
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
        } else {
            $('.sticky-top').css('top', '-100px');
        }
    });

    /** Back to top */
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').on('click', function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });

    /** Header carousel */
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: true,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });

    /** Testimonials carousel */
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav: false,
        responsive: {
            0: { items: 1 },
            768: { items: 2 },
            992: { items: 3 }
        }
    });
});
