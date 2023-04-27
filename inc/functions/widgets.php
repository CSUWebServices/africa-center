<?php 
/**
 * Add a top footer widget area
 */
// Register Sidebars
function custom_footer() {

	$args = array(
		'id'            => 'top_footer',
		'class'         => 'top-footer',
		'name'          => 'Top Footer',
		'before_widget' => '<div>',
		'after_widget'  => '</div>'
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_footer' );