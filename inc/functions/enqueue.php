<?php
/**
 * Enqueue scripts and styles.
 */
function csu_scripts() {
	/**
	* CSS
	*/

	// mmenu (mobile navigation)
	wp_enqueue_style( 'mmenu', get_template_directory_uri() . '/inc/plugins/mmenu/mmenu.css', array(), null, 'all' );
	// wp_enqueue_style( 'mburger', get_template_directory_uri() . '/inc/plugins/mmenu/mburger/mburger.css', array(), null, 'all' );

	// Animate on Scroll
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/inc/plugins/aos/aos.css', array(), null, 'all' );

	// Main stylesheet
	wp_enqueue_style( 'csu-style', get_stylesheet_uri() );

	// Remodal
	// wp_enqueue_style( 'remodal', get_template_directory_uri() . '/inc/plugins/remodal/remodal.css', array(), null, 'all' );
	// Remodal default theme
	// wp_enqueue_style( 'remodal', get_template_directory_uri() . '/assets/plugins/remodal/remodal-default-theme.css', array(), null, 'all' );

	// Magnific Popup Lightbox
	// wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/inc/plugins/magnific-popup.css', array(), null, 'all' );

	// Flickity
	// wp_enqueue_style( 'flickity', get_template_directory_uri() . '/inc/plugins/flickity/flickity.css', array(), null, 'all' );

	// Slick
	// wp_enqueue_style( 'flickity', get_template_directory_uri() . '/inc/plugins/slick/slick.css', array(), null, 'all' );

	// Google Icons
	wp_enqueue_style( 'google-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons+Outlined', array(), null, 'all' );


	/**
	* JS
	*/

	// jQuery
	wp_enqueue_script( 'jquery' );

	// jQuery UI
	wp_enqueue_script( 'jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js', array( 'jquery' ), null, true );

	// mmenu (mobile navigation)
	wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/inc/plugins/mmenu/mmenu.js', array(), null, true );
	wp_enqueue_script( 'mburger', get_template_directory_uri() . '/inc/plugins/mmenu/mburger/index.js', array(), null, true );
	// wp_enqueue_script( 'mburger', get_template_directory_uri() . '/inc/plugins/mmenu/mburger/mburger.js', array(), null, true );
	// wp_enqueue_script( 'hammer', get_template_directory_uri() . '/inc/plugins/mmenu/hammer.min.js', array(), null, true );
	// wp_enqueue_script( 'dragclose', get_template_directory_uri() . '/inc/plugins/mmenu/jquery.mmenu.dragclose.min.js', array('jquery'), null, true );

	// Animate on Scroll
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/inc/plugins/aos/aos.js', array(), null, true );

	// Isotope
	// if( is_archive() ) {
	// 	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/inc/plugins/isotope/isotope.min.js', array(), null, true );
	// }

	// Custom JS
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/inc/js/min/custom-min.js', array(), null, true );

	// if( is_home() ) {
	// 	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/inc/plugins/isotope.min.js', array(), null, true );

	// 	wp_enqueue_script( 'archive-js', get_template_directory_uri() . '/inc/js/min/archive-min.js', array(), null, true );
	// }

	// Remodal
	// wp_enqueue_script( 'remodal', get_template_directory_uri() . '/inc/plugins/remodal/sticky-kit.min.js', array(), null, true );

	// Sticky Kit
	// wp_enqueue_script( 'stickykit', get_template_directory_uri() . '/inc/plugins/sticky-kit.min.js', array(), null, true );

	// Flickity
	// wp_enqueue_script( 'flickity', get_template_directory_uri() . '/inc/plugins/flickity/flickity.pkgd.min.js', array( 'jquery' ), null, true );

	// Slick
	// wp_enqueue_script( 'slick', get_template_directory_uri() . '/inc/plugins/slick/slick.min.js', array( 'jquery' ), null, true );

	// Masonry
	// wp_enqueue_script( 'masonry' );

	// Headroom (if option is selected) 
	if ( get_field('header_style', 'option') == 'scroll' ) {
		wp_enqueue_script( 'headroom', get_template_directory_uri() . '/inc/plugins/headroom.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'jquery-headroom', get_template_directory_uri() . '/inc/plugins/jQuery.headroom.js', array( 'jquery' ), null, true );
	}

	// DEFAULT Navigation
	wp_enqueue_script( 'csu-navigation', get_template_directory_uri() . '/inc/js/navigation.js', array(), '20151215', true );

	// DEFAULT Skip link focus fix
	wp_enqueue_script( 'csu-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20151215', true );

	// DEFAULT Comment reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'csu_scripts' );