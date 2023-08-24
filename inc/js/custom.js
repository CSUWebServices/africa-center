(function($) {
	var screenSM = 801;

	//********** Mobile navigation **********
	$(document).ready(function() {

		// Convert <a href="#"> tags to <span> tags for better mmenu functionality
		$('#mobile-navigation a[href="#"]').each(function() {
			$(this).replaceWith(function() {
			  return $('<span>' + $(this).html() + '</span>');
			});
		});
	});



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




	// Set SVG role to "presentation" for decorative icons
	$(window).load(function() {
		$('.global-contact svg').attr('role', 'presentation');
		$('.slick-slider svg').attr('role', 'presentation');
	});


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

	//********** Link accessibility **********
	// Check if link is external
	// If it is, add external link icon and screen reader text
	function link_is_external(link_element) {
		return (link_element.host !== window.location.host);
	}

	$('.page .entry-content a, .menu a').each(function() {
		if (link_is_external(this)) {
			// External
			$(this).addClass('external');
			this.insertAdjacentHTML('beforeend', '<span class="material-symbols-outlined external-icon" aria-hidden="true">open_in_new</span><span class="screen-reader-text">(link is external)</span>');
		}
	});

	// Check if link opens in new tab
	// If it does, add noopener and screen reader text
	function addNoOpener(link) {
		let linkTypes = (link.getAttribute('rel') || '').split(' ');
		if (!linkTypes.includes('noopener')) {
			linkTypes.push('noopener');
		}
		link.setAttribute('rel', linkTypes.join(' ').trim());
	}

	function addNewTabMessage(link) {
		if (!link.querySelector('.screen-reader-text')) {
			link.insertAdjacentHTML('beforeend', '<span class="screen-reader-text">(opens in a new tab)</span>');
		}
	}

	document.querySelectorAll('a[target="_blank"]').forEach(link => {
		addNoOpener(link);
		addNewTabMessage(link);
	});

})(jQuery);

// Mobile navigation

// Fire the plugin
document.addEventListener(
	"DOMContentLoaded", () => {
		new Mmenu( "#mobile-navigation", {
			// options
			slidingSubmenus: false,
			navbar:          false,
			"offCanvas": {
				"position": "bottom"
			 },
		}, {
			// configuration
			classNames: {
				vertical: "sub-menu"
			}
		});
	}
);

// Open the menu
/*
document.addEventListener(
	"DOMContentLoaded", () => {
		const menu = new Mmenu( "#mobile-navigation" );
		const api = menu.API;

		document.querySelector( "#open-button" )
			.addEventListener(
				"click", () => {
					api.open();
				}
			);
	}
);
*/	
	
// Close the menu
/*
document.addEventListener(
	"DOMContentLoaded", () => {
		const menu = new Mmenu( "#mobile-navigation" );
		const api = menu.API;

		document.querySelector( "#close-button" )
			.addEventListener(
				"click", () => {
					api.close();
				}
			);
	}
);
*/