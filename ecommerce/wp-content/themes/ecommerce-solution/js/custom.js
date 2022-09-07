jQuery(function($){
	"use strict";
	jQuery('.main-menu-navigation > ul').superfish({
		delay:       500,                            
		animation:   {opacity:'show',height:'show'},  
		speed:       'fast'                        
	});

});

function ecommerce_solution_menu_open() {
	jQuery(".menu-brand.primary-nav").addClass('show');
}
function ecommerce_solution_menu_close() {
	jQuery(".menu-brand.primary-nav").removeClass('show');
}

function ecommerce_solution_responsive_menu_open() {
	jQuery(".menu-brand.resp-menu").addClass('show');
}
function ecommerce_solution_responsive_menu_close() {
	jQuery(".menu-brand.resp-menu").removeClass('show');
}

var ecommerce_solution_Keyboard_loop = function (elem) {

    var ecommerce_solution_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

    var ecommerce_solution_firstTabbable = ecommerce_solution_tabbable.first();
    var ecommerce_solution_lastTabbable = ecommerce_solution_tabbable.last();
    /*set focus on first input*/
    ecommerce_solution_firstTabbable.focus();

    /*redirect last tab to first input*/
    ecommerce_solution_lastTabbable.on('keydown', function (e) {
        if ((e.which === 9 && !e.shiftKey)) {
            e.preventDefault();
            ecommerce_solution_firstTabbable.focus();
        }
    });

    /*redirect first shift+tab to last input*/
    ecommerce_solution_firstTabbable.on('keydown', function (e) {
        if ((e.which === 9 && e.shiftKey)) {
            e.preventDefault();
            ecommerce_solution_lastTabbable.focus();
        }
    });

    /* allow escape key to close insiders div */
    elem.on('keyup', function (e) {
        if (e.keyCode === 27) {
            elem.hide();
        }
        ;
    });
};

(function( $ ) {
	$(document).ready(function(){
	    $(".border-cat button.product-btn").click(function(){
	        $(".product-cat").toggle();
	    });
	});
})( jQuery );

// scroll
jQuery(document).ready(function () {
	jQuery(window).scroll(function () {
	    if (jQuery(this).scrollTop() > 0) {
	        jQuery('#scrollbutton').fadeIn();
	    } else {
	        jQuery('#scrollbutton').fadeOut();
	    }
	});
	jQuery(window).on("scroll", function () {
	   document.getElementById("scrollbutton").style.display = "block";
	});
	jQuery('#scrollbutton').click(function () {
	    jQuery("html, body").animate({
	        scrollTop: 0
	    }, 600);
	    return false;
	});
});

jQuery(function($){

	$('.mobiletoggle').click(function () {
        ecommerce_solution_Keyboard_loop($('.menu-brand.primary-nav'));
    });

    $('.mobile-toggle').click(function () {
        ecommerce_solution_Keyboard_loop($('.menu-brand.resp-menu'));
    });
});

// preloader
jQuery(function($){
    setTimeout(function(){
        $(".frame").delay(1000).fadeOut("slow");
    });
});

(function( $ ) {

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

})( jQuery );
