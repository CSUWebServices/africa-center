(function($) {
	$('.events-wrapper').slick({
		slidesPerRow: 3,
		slidesToShow: 3,
		slidesToScroll: 1,
		arrows: true,
		infinite: false,
		responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
		        infinite: false,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: false,
		      }
		    },
		  ]
	});
})(jQuery);