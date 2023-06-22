<?php

// Design Settings page
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Design Settings',
		'menu_title'	=> 'Design Settings',
		'menu_slug' 	=> 'design-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

// Add defer tag to JS scripts
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array( 'jquery-ui', 'custom-js', 'archive-js', 'font-awesome', 'mmenu', 'mburger', 'aos', 'slick' );
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);


// Add async tag to JS scripts
function add_async_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_async = array( 'csu-navigation', 'csu-skip-link-focus-fix', 'wp-embed' );
   
   foreach($scripts_to_async as $async_script) {
      if ($async_script === $handle) {
         return str_replace(' src', ' async src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);


// Add module type to mburger
function add_type_attribute($tag, $handle, $src) {
   // if not your script, do nothing and return original $tag
   if ( 'mburger' !== $handle ) {
       return $tag;
   }
   // change the script tag by adding type="module" and return it.
   $tag = '<script type="module" defer src="' . esc_url( $src ) . '"></script>';
   return $tag;
}
add_filter('script_loader_tag', 'add_type_attribute' , 10, 3);


// Load custom admin stylesheet
function load_custom_wp_admin_style() {
    wp_register_style( 'custom-admin', get_template_directory_uri() . '/inc/admin/custom-admin.css', false, null );
    wp_enqueue_style( 'custom-admin' );
    // Google icons
    wp_enqueue_style( 'google-icons', 'https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined', array(), null, 'all' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Add category taxonomy to pages
function add_category_to_pages() {
	register_taxonomy_for_object_type('category', 'page'); 
}
add_action( 'init', 'add_category_to_pages' );

// Shorten the excerpt length
add_filter( 'excerpt_length', function($length) {
    return 30;
} );


/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
 *
*/
add_action( 'acf/input/admin_footer', 'wd_acf_color_palette' );
function wd_acf_color_palette() { ?>
<script type="text/javascript">
(function($) {
     acf.add_filter('color_picker_args', function( args, $field ){
          // add the hexadecimal codes here for the colors you want to appear as swatches
          args.palettes = ['#1E4D2B', '#163b22', '#C8C372', '#FFFFFF', '#D9782D', '#59595B', '#105456', '#C9D845', '#CC5430', '#12A4B6', '#ECC530', '#000000']
          // return colors
          return args;
     });
})(jQuery);
</script>
<?php }


// Allow SVG uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Custom capability for adding iFrames and Script tags to the editor
function csu_add_unfiltered_html_capability_to_editors( $caps, $cap, $user_id ) {

  if ( 'unfiltered_html' === $cap && user_can( $user_id, 'supereditor' ) ) {

    $caps = array( 'unfiltered_html' );

  }

  return $caps;
}
add_filter( 'map_meta_cap', 'csu_add_unfiltered_html_capability_to_editors', 1, 3 );


// Change archive titles
add_filter( 'get_the_archive_title', function( $title ) {
   if ( is_home() ) {
      // Rename the blog homepage
       $title = 'News';
   } elseif ( is_category() ) {
      // Remove 'Category:' from archives
      $title = single_cat_title( '', false );
   }
   return $title;
}, 50 );
