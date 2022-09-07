// NAVIGATION CALLBACK
jQuery(function($){
 	"use strict";
   	jQuery('.main-menu-navigation > ul').superfish({
		delay:     500,
		animation: {opacity:'show',height:'show'},  
		speed:     'fast'
   	});
});

jQuery(function($){
	$( '.toggle-menu button' ).click( function(e){
        $( 'body' ).toggleClass( 'show-main-menu' );
        var element = $( '.side-nav' );
        grocery_ecommerce_trapFocus( element );
    });

    $( '.closebtn' ).click( function(e){
        $( '.toggle-menu button' ).click();
        $( '.toggle-menu button' ).focus();
    });
    $( document ).on( 'keyup',function(evt) {
        if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
            $( '.toggle-menu button' ).click();
            $( '.toggle-menu button' ).focus();
        }
    });
    
	$(window).scroll(function(){
	    if ($(window).scrollTop() >= 100) {
	        $('.toggle-menu').addClass('sticky');
	    }
	    else {
	        $('.toggle-menu').removeClass('sticky');
	    }
	});

	$(window).scroll(function(){
		var sticky = $('.sticky-header'),
		scroll = $(window).scrollTop();

		if (scroll >= 100) sticky.addClass('fixed-header');
		else sticky.removeClass('fixed-header');
	});

	setTimeout(function(){
		$(".tg-loader").delay(2000).fadeOut("slow");
	    $("#overlayer").delay(2000).fadeOut("slow");
	});

	setTimeout(function(){
		$(".preloader").delay(2000).fadeOut("slow");
	    $(".preloader .preloader-container").delay(2000).fadeOut("slow");
	});

	// back to top.
	$( window ).scroll( function() {
		if ( $( this ).scrollTop() > 200 ) {
			$( '.back-to-top' ).addClass( 'show-back-to-top' );
		} else {
			$( '.back-to-top' ).removeClass( 'show-back-to-top' );
		}
	});

	$( '.back-to-top' ).click( function() {
		$( 'html, body' ).animate( { scrollTop : 0 }, 200 );
		return false;
	});
});

function grocery_ecommerce_trapFocus( element, namespace ) {
    var grocery_ecommerce_focusableEls = element.find( 'a, button' );
    var grocery_ecommerce_firstFocusableEl = grocery_ecommerce_focusableEls[0];
    var grocery_ecommerce_lastFocusableEl = grocery_ecommerce_focusableEls[grocery_ecommerce_focusableEls.length - 1];
    var KEYCODE_TAB = 9;

    grocery_ecommerce_firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === grocery_ecommerce_firstFocusableEl ) {
                grocery_ecommerce_lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === grocery_ecommerce_lastFocusableEl ) {
                grocery_ecommerce_firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}

jQuery(document).ready(function(){
	jQuery(".product-cat").hide();
    jQuery("button.product-btn").click(function(){
        jQuery(".product-cat").toggle();
    });

    var grocery_ecommerce_mydate =jQuery('.date').val();
  	jQuery(".countdown").each(function(){
      	grocery_ecommerce_countdown(jQuery(this),grocery_ecommerce_mydate);
  	});
});

function grocery_ecommerce_countdown($timer,grocery_ecommerce_mydate){
    // Set the date we're counting down to
    var grocery_ecommerce_countDownDate = new Date(grocery_ecommerce_mydate).getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get todays date and time
        var now = new Date().getTime();
        // Find the distance between now an the count down date
        var distance = grocery_ecommerce_countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="timer"
        $timer.html( "<div class='numbers'><span class='count'>" + days + "</span><br><span class='text'>Days</span>" + "</div>" + "   " +"<div class='numbers'><span class='count'>" + hours + "</span><br><span class='text'>Hrs</span>" + "</div>" + "   " + "<div class='numbers'><span class='count'>" + minutes + "</span><br><span class='text'>Mins</span>" + "</div>" + "   " + "<div class='numbers'><span class='count'>" + seconds + "</span><br><span class='text'>Sec</spn" + "</div>");
        
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            $timer.html("SALE EXPIRED");
        }
    }, 1000);
}