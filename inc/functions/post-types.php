<?php
// Staff Post Type
function staff_post_type() {

	$labels = array(
		'name'                  => 'Staff',
		'singular_name'         => 'Staff Member',
		'menu_name'             => 'Staff',
		'name_admin_bar'        => 'Staff',
		'archives'              => 'Staff Archives',
		'attributes'            => 'Staff Attributes',
		'parent_item_colon'     => 'Parent Staff:',
		'all_items'             => 'All Staff',
		'add_new_item'          => 'Add New Staff Member',
		'add_new'               => 'Add New',
		'new_item'              => 'New Staff Member',
		'edit_item'             => 'Edit Staff Member',
		'update_item'           => 'Update Staff Member',
		'view_item'             => 'View Staff Member',
		'view_items'            => 'View Staff',
		'search_items'          => 'Search Staff Member',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into item',
		'uploaded_to_this_item' => 'Uploaded to this item',
		'items_list'            => 'Staff Members list',
		'items_list_navigation' => 'Staff Members list navigation',
		'filter_items_list'     => 'Filter Staff Members list',
	);
	$args = array(
		'label'                 => 'Staff Member',
		'description'           => 'Post Type Description',
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'staff-category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'staff', $args );

}
add_action( 'init', 'staff_post_type', 0 );