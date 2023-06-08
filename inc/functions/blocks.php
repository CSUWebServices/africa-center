<?php 
// Register custom block categories
function ramblocks_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'ramblocks',
                'title' => __( 'RamBlocks', 'ramblocks' ),
                'icon' => 'layout'
            ),
        )
    );
}
add_filter( 'block_categories', 'ramblocks_block_category', 10, 2);


// Register custom blocks
function register_acf_block_types() {
    if( function_exists('acf_register_block_type') ) {

        // posts
        acf_register_block_type(array(
            'name'              => 'posts',
            'title'             => __('Posts'),
            'description'       => __('Select a category of posts to display'),
            'render_template'   => 'template-parts/blocks/posts/posts.php',
            'category'          => 'ramblocks',
            'icon'              => 'admin-page',
            'keywords'          => array( 'post', 'posts', 'blog', 'news', 'stories' ),
        ));

        // staff
        acf_register_block_type(array(
            'name'              => 'staff',
            'title'             => __('Staff'),
            'description'       => __('Select a category of staff to display'),
            'render_template'   => 'template-parts/blocks/staff/staff.php',
            'category'          => 'ramblocks',
            'icon'              => 'groups',
            'keywords'          => array( 'staff', 'employees', 'people' ),
        ));

        // fellowship recipients
        acf_register_block_type(array(
            'name'              => 'fellowship-recipients',
            'title'             => __('Fellowship Recipients'),
            'description'       => __('A list of Fellowship Recipients with links to their pages.'),
            'render_template'   => 'template-parts/blocks/fellowship-recipients/fellowship-recipients.php',
            'category'          => 'ramblocks',
            'icon'              => 'welcome-learn-more',
            'keywords'          => array( 'fellowship', 'recipients', 'graduate students', 'grad students' ),
        ));

        // media cta
        // acf_register_block_type(array(
        //     'name'              => 'media-cta',
        //     'title'             => __('Media Call to Action'),
        //     'description'       => __('A call to action with a video or image background'),
        //     'render_template'   => 'template-parts/blocks/cta/media-cta.php',
        //     'category'          => 'ramblocks',
        //     'icon'              => 'cover-image',
        //     'keywords'          => array( 'video', 'cta', 'call to action', 'cover' ),
        // ));

        // link blocks
        // acf_register_block_type(array(
        //     'name'              => 'link-blocks',
        //     'title'             => __('Link Blocks'),
        //     'description'       => __('A block of images with links'),
        //     'render_template'   => 'template-parts/blocks/link-blocks/link-blocks.php',
        //     'category'          => 'ramblocks',
        //     'icon'              => 'images-alt',
        //     'keywords'          => array( 'links', 'blocks', 'call to action', 'cta' ),
        // ));

        // link grid
        acf_register_block_type(array(
            'name'              => 'link-grid',
            'title'             => __('Link Grid'),
            'description'       => __('A grid of images with links'),
            'render_template'   => 'template-parts/blocks/link-grid/link-grid.php',
            'category'          => 'ramblocks',
            'icon'              => 'schedule',
            'keywords'          => array( 'links', 'grid', 'call to action', 'cta' ),
        ));

        // events
        // acf_register_block_type(array(
        //     'name'              => 'events-block',
        //     'title'             => __('Events'),
        //     'description'       => __('A block to display a category of events'),
        //     'render_template'   => 'template-parts/blocks/events/events.php',
        //     'category'          => 'ramblocks',
        //     'icon'              => 'calendar-alt',
        //     'keywords'          => array( 'event', 'events', 'calendar' ),
        //     'enqueue_assets'    => function(){
        //         wp_enqueue_style( 'slick', get_template_directory_uri() . '/inc/plugins/slick/slick.css', array(), null, 'all' );
        //         wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/inc/plugins/slick/slick-theme.css', array(), null, 'all' );
        //         wp_enqueue_script( 'slick', get_template_directory_uri() . '/inc/plugins/slick/slick.min.js', array( 'jquery' ), null, true );
        //         wp_enqueue_script( 'slick-init', get_template_directory_uri() . '/inc/js/min/slick-init-min.js', array( 'jquery' ), null, true );
        //     },
        // ));

        // accordion
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('Panels that allow toggling of content'),
            'render_template'   => 'template-parts/blocks/accordion/accordion.php',
            'category'          => 'ramblocks',
            'icon'              => 'editor-justify',
            'keywords'          => array( 'accordion', 'toggle' ),
            'enqueue_assets'    => function(){
              wp_enqueue_script( 'accordion-init', get_template_directory_uri() . '/inc/js/min/accordion-init-min.js', array( 'jquery' ), null, true );
            },
        ));

        // expanding panels
        acf_register_block_type(array(
            'name'              => 'expanding-panels',
            'title'             => __('Expanding Panels'),
            'description'       => __('Panels that expand and link to other pages'),
            'render_template'   => 'template-parts/blocks/expanding-panels/expanding-panels.php',
            'category'          => 'ramblocks',
            'icon'              => 'columns',
            'keywords'          => array( 'expanding panels', 'panels', 'toggle' ),
        ));

        // slider
        acf_register_block_type(array(
            'name'              => 'slider',
            'title'             => __('Slider'),
            'description'       => __('A traditional slider with links'),
            'render_template'   => 'template-parts/blocks/slider/slider.php',
            'category'          => 'ramblocks',
            'icon'              => 'slides',
            'keywords'          => array( 'slider', 'images' ),
            'enqueue_assets'    => function(){
              wp_enqueue_style( 'slick', get_template_directory_uri() . '/inc/plugins/slick/slick.css', array(), null, 'all' );
              wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/inc/plugins/slick/slick-theme.css', array(), null, 'all' );
              wp_enqueue_script( 'slick', get_template_directory_uri() . '/inc/plugins/slick/slick.min.js', array( 'jquery' ), null, true );
              wp_enqueue_script( 'slider-init', get_template_directory_uri() . '/inc/js/min/slick-init-min.js', array( 'jquery' ), null, true );
            },
        ));
    }
}

// Check if function exists and hook into setup.
add_action('acf/init', 'register_acf_block_types');


// De-register unnecessary blocks
// add_filter( 'allowed_block_types', 'csu_allowed_block_types' );

 
// function csu_allowed_block_types( $allowed_blocks ) {
 
// 	return array(
//         'acf/posts',
//         'acf/fellowship-recipients',
//         'acf/media-cta',
//         'acf/slider',
//         'acf/link-blocks',
//         'acf/link-grid',
//         'acf/events-block',
//         'acf/staff',
//         'acf/accordion',
//         'acf/expanding-panels',
//         'core/columns',
//         'core/cover',
// 		'core/image',
// 		'core/paragraph',
//         'core/heading',
//         'core/group',
//         'core/list',
//         'core/gallery',
//         'core/quote',
//         'core/file',
//         'core/video',
//         'core/table',
//         'core/code',
//         'core/html',
//         'core/pullquote',
//         'core/buttons',
//         'core/text-columns',
//         'core/media-text',
//         'core/separator',
//         'core/spacer',
//         'core/archives',
//         'core/shortcode',
// 	);
 
// }


// Register custom block pattern categories
function csu_register_block_categories() {
    if ( class_exists( 'WP_Block_Patterns_Registry' ) ) {

        register_block_pattern_category(
            'templates',
            array( 'label' => _x( 'Templates', 'Block pattern category', 'csu' ) )
        );

    }
}
add_action( 'init', 'csu_register_block_categories' );


// De-register default block patterns
function removeCorePatterns() {
    remove_theme_support('core-block-patterns');

    unregister_block_pattern_category('buttons');
    unregister_block_pattern_category('columns');
    unregister_block_pattern_category('gallery');
    unregister_block_pattern_category('header');
    unregister_block_pattern_category('text');
    unregister_block_pattern_category('uncategorized');
}
add_action('init', 'removeCorePatterns');


// Narrow down the stupidly long list of embeds to only useful ones
function csu_deny_list_blocks() {
    wp_enqueue_script(
        'deny-list-blocks',
        get_template_directory_uri() . '/inc/js/min/deny-list-blocks-min.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
    );
}
add_action( 'enqueue_block_editor_assets', 'csu_deny_list_blocks' );


// Adds support for editor color palette.
add_theme_support( 'editor-color-palette', array(
    array(
        'name'  => __( 'CSU Green', 'csu' ),
        'slug'  => 'csu-green',
        'color' => '#1E4D2B',
    ),
    array(
        'name'  => __( 'CSU Green Darker', 'csu' ),
        'slug'  => 'csu-green-darker',
        'color' => '#163b22',
    ),
    array(
        'name'  => __( 'CSU Gold', 'csu' ),
        'slug'  => 'csu-gold',
        'color' => '#C8C372',
    ),
    array(
        'name'  => __( 'White', 'csu' ),
        'slug'  => 'white',
        'color' => '#FFFFFF',
    ),
    array(
        'name'  => __( 'Aggie Orange', 'csu' ),
        'slug'  => 'aggie-orange',
        'color' => '#D9782D',
    ),
    array(
        'name'  => __( 'Dark Gray', 'csu' ),
        'slug'  => 'dark-gray',
        'color' => '#59595B',
    ),
    array(
        'name'  => __( 'Slate', 'csu' ),
        'slug'  => 'slate',
        'color' => '#105456',
    ),
    array(
        'name'  => __( 'Alfalfa', 'csu' ),
        'slug'  => 'alfalfa',
        'color' => '#C9D845',
    ),
    array(
        'name'  => __( 'Canyon', 'csu' ),
        'slug'  => 'canyon',
        'color' => '#CC5430',
    ),
    array(
        'name'  => __( 'Reservoir', 'csu' ),
        'slug'  => 'reservoir',
        'color' => '#12A4B6',
    ),
    array(
        'name'  => __( 'Sunshine', 'csu' ),
        'slug'  => 'sunshine',
        'color' => '#ECC530',
    ),
    array(
        'name'  => __( 'Black', 'csu' ),
        'slug'  => 'black',
        'color' => '#000000',
    ),
) );

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-colors' );

// Add width support
add_theme_support( 'align-wide' );

// Add custom unit support
add_theme_support( 'custom-units', 'rem', 'em', 'px', 'vh', 'vw' );

// Add custom spacing support
add_theme_support('custom-spacing');

// Add theme support for custom embeds
add_theme_support( 'responsive-embeds' );

// Add theme support for editor styles
function editor_setup() {
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles.
    add_editor_style( 'editor.css' );
}
add_action( 'after_setup_theme', 'editor_setup' );