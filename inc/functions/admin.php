<?php
// Custom Backend Footer
function custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="http://web.colostate.edu" target="_blank">CSU Web Communications</a></span>.', 'jointswp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'custom_admin_footer');