(function($) {

	// Initialize Isotope
	var $grid = $('.posts-list').isotope({
	  // options
	  itemSelector: '.post-card',
	  percentPosition: true,
	    masonry: {
	      // use outer width of grid-sizer for columnWidth
	      columnWidth: '.post-card',
	      gutter: 24
	    }
	});

	// filter items on button click
	$('.posts-filter').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});

	// Allow linking directly to a filtered result
	function getHashFilter() {
	  var matches = location.hash.match( /filter=([^&]+)/i );
	  var hashFilter = matches && matches[1];
	  return hashFilter && decodeURIComponent( hashFilter );
	}

	// bind filter button click
	var $filters = $('.posts-filter').on( 'click', 'button', function() {
		var filterAttr = $( this ).attr('data-filter');
		// set filter in hash
		location.hash = 'filter=' + encodeURIComponent( filterAttr );
	});

	var isIsotopeInit = false;

	function onHashchange() {
		var hashFilter = getHashFilter();
		if ( !hashFilter && isIsotopeInit ) {
			return;
	}
	isIsotopeInit = true;

	// filter isotope
	$grid.isotope({
		itemSelector: '.post-card',
		filter: hashFilter
	});
	// set selected class on button
	if ( hashFilter ) {
		$filters.find('.selected').removeClass('selected');
		$filters.find('[data-filter="' + hashFilter + '"]').addClass('selected');

		$filters.find('aria-checked').removeAttribute('aria-checked');
		$filters.find('[data-filter="' + hashFilter + '"]').setAttribute('aria-checked', 'true');
	}
	}

	$(window).on( 'hashchange', onHashchange );
	// trigger event handler to init Isotope
	onHashchange();

})(jQuery);