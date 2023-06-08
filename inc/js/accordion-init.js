(function($) {
	$(document).ready(function() {
		// Classic
		$( ".accordion-classic" ).accordion({
			collapsible: true,
			heightStyle: "content"
		});

		// Toggle
		$( ".accordion-toggle > div" ).accordion({
			collapsible: true,
			active: false,
			heightStyle: "content"
		});
	});
})(jQuery);