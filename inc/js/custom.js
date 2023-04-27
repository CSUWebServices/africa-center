(function($) {
	var screenSM = 801;

	//********** Mobile navigation **********
	// $(document).ready(function() {

	// 	// Convert <a href="#"> tags to <span> tags for better mmenu functionality
	// 	$('#mobile-navigation a[href="#"]').each(function() {
	// 		$(this).replaceWith(function() {
	// 		  return $('<span>' + $(this).html() + '</span>');
	// 		});
	// 	});

	//     new Mmenu( '#mobile-navigation', {

	//     	extensions: [
	// 	      "position-right", 
	// 	      "pagedim-black",
	// 	      "fx-menu-slide",
	//           "fx-panels-slide-100",
	//           "shadow-page",
	//           "shadow-panels"
	//         ],
	//         "iconPanels": true
	//     });

	// 	var API = $("#mobile-navigation").data( "mmenu" );

	// 	$("#close").click(function() {
	// 		API.close();
	// 	});
	// });

	//********** Offcanvas navigation **********
	// Open and close global nav
	var openNav = $('#offcanvas-nav-button');
	var closeNav = $('#close-global-nav');

	openNav.click( function() {
	  	$('body').addClass('global-nav-open');
	  	$('#open-global-nav').attr('aria-expanded', true);

	  	// Add focus to the close nav button when the menu opens
	  	$('#close-global-nav').focus();
	});

	closeNav.click( function() {
		$('body').removeClass('global-nav-open');
		$('#open-global-nav').attr('aria-expanded', false);

		// Add focus to nav button after the menu closes
		$('#open-global-nav').focus();
	});

	$('.site-content').click( function() {
		$('body').removeClass('global-nav-open');
		$('#open-global-nav').attr('aria-expanded', false);
	});


	// Change 'Menu' to 'Close' if the mobile menu is open
	if( $('body').hasClass('mm-wrapper_opened') ) {
		console.log('Menu is open');
	} else {
		console.log('Menu is closed');
	}


	//========== Trap focus in open modal ==========
	// ref: https://hiddedevries.nl/en/blog/2017-01-29-using-javascript-to-trap-focus-in-an-element

	// Define the focus wrapper var
	var focusWrapper = $('#global-nav');

	// Find all focusable elements within wrapper element
	var focusableEls = focusWrapper.find('a, object, :input, iframe, [tabindex]');

	// Save the first and last focusable elements
	var firstFocusableEl = focusableEls.first();
	var lastFocusableEl = focusableEls.last();
	KEYCODE_TAB = 9;

	// On tab of the last element, set focus to the first element
	// On shift+tab of the last element, set focus to the previous focused element (default behavior)
	lastFocusableEl.on('keydown', function(e) {
		if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
	        if ( e.shiftKey ) /* shift + tab */ {
	        	// Set the focus to the previous focused element
	        	console.log('Shift + Tab off last element');
	        } else /* tab */ {
	        	// Set the focus to the first focusable element
	        	console.log('Tab off last element');
	            firstFocusableEl.focus();
	            e.preventDefault();
	        }
	    }
	});

	// On tab of the first element, set focus to the next element (default behavior)
	// On shift+tab of the first element, set focus to the last focusable element
	firstFocusableEl.on('keydown', function(e) {
		if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
	        if ( e.shiftKey ) /* shift + tab */ {
	        	// Set the focus to the last focusable element
	        	console.log('Shift + Tab off first element');
	            lastFocusableEl.focus();
	            e.preventDefault();
	        } else /* tab */ {
	        	// Set the focus to the next element
	        	console.log('Tab off first element');
	        }
	    }
	});



	// Mobile navigation for subsites
	$(document).ready(function() {
		// Convert <a href="#"> tags to <span> tags for better mmenu functionality
		$('.mobile-nav a[href="#"]').each(function() {
		  $(this).replaceWith(function() {
		    return $('<span>' + $(this).html() + '</span>');
		  });
		});

		// Mmenu
		$(".mobile-nav").mmenu({
		   // options

		    // Enable drag to close (hammer.js must be active)
		    dragClose: {
		       close: true
		    },

		    // Menu effects
		    extensions: ["effect-menu-slide", "effect-panels-slide-100", "effect-listitems-slide", "pageshadow"],

		    // Fixed footer
		    "navbars": [
		          true,
		          {
		             "position": "bottom",
		             "content": [
		                "<p class='swipe'>&laquo; Swipe to Close</p>"
		             ]
		          }
		       ]
		});

		var API = $(".mobile-nav").data( "mmenu" );

		$("#open-secondary-nav").click(function() {
		   API.open();
		});
	});




	// Set SVG role to "presentation" for decorative icons
	$(window).load(function() {
		$('.global-contact svg').attr('role', 'presentation');
		$('.slick-slider svg').attr('role', 'presentation');
	});



	// Accordions for global nav menus on mobile
	function globalNavAccordions() {
		if (window.matchMedia("(min-width: "+ screenSM +"px)").matches) {
			// The viewport is at least 800 pixels wide
			if( $('.menu-wrapper').hasClass('ui-accordion') ) {
				$('.menu-wrapper').accordion('destroy');
			}
		} else {
			// The viewport is less than 800 pixels wide
			$('.menu-wrapper').accordion({
				active: false,
		  		collapsible: true,
		  		animate: 200
			});
		}


	}
	var widthSmCheck = window.matchMedia("(min-width: " + screenSM + "px)");
	widthSmCheck.addListener(globalNavAccordions);
	window.addEventListener("DOMContentLoaded", globalNavAccordions, false);


	//********** Main navigation **********
	// Sub nav visible when tabbing through navigation
	$('.sub-menu li a').on('focus', function() {
		$(this).parents('ul').addClass('visible');
	});
	$('.sub-menu li a').on('focusout', function() {
		$(this).parents('ul').removeClass('visible');
	});


	//********** AOS - Animate on Scroll **********
	$(window).load(function() {
		AOS.init({
			duration: 800
		});
	});


	//********** Page sizes **********
	// Set min height of site content to be the height of the browser window minus the header and footer
	var headerHeight, footerHeight, contentHeight, windowHeight, desiredHeight;
	function setHeights() {
		headerHeight = $('.site-header').outerHeight(true);
		footerHeight = $('.site-footer').outerHeight(true);
		contentHeight = $('.site-content').outerHeight(true);
		windowHeight = $(window).innerHeight();
		desiredHeight = (windowHeight - headerHeight - footerHeight);
	}
	$(document).ready(setHeights);
	$(window).resize(setHeights);

	// function contentHeight() {
	// 	// console.log(windowHeight);
	// 	if( contentHeight < desiredHeight ) {
	// 		$('.site-content').css('min-height', desiredHeight);
	// 	} else {
	// 		$('.site-content').removeAttr('style');
	// 	}
	// }
	// $(document).ready(contentHeight);
	// $(window).resize(contentHeight);

})(jQuery);
