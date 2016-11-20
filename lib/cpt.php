<?php
// Register Custom Post Type
function irajala_slides() {

	$labels = array(
		'name'                  => _x( 'Horizontal Slides', 'Post Type General Name', 'sage' ),
		'singular_name'         => _x( 'Horizontal Slide', 'Post Type Singular Name', 'sage' ),
		'menu_name'             => __( 'Horizontal Slides', 'sage' ),
		'name_admin_bar'        => __( 'Horizontal Slide', 'sage' ),
		'archives'              => __( 'Horizontal Slides Archives', 'sage' ),
		'parent_item_colon'     => __( 'Parent Horizontal Slide:', 'sage' ),
		'all_items'             => __( 'All Horizontal Slides', 'sage' ),
		'add_new_item'          => __( 'Add New Horizontal Slide', 'sage' ),
		'add_new'               => __( 'Add New', 'sage' ),
		'new_item'              => __( 'New Horizontal Slide', 'sage' ),
		'edit_item'             => __( 'Edit Horizontal Slide', 'sage' ),
		'update_item'           => __( 'Update Horizontal Slide', 'sage' ),
		'view_item'             => __( 'View Horizontal Slide', 'sage' ),
		'search_items'          => __( 'Search Horizontal Slide', 'sage' ),
		'not_found'             => __( 'Not found', 'sage' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
		'featured_image'        => __( 'Featured Image', 'sage' ),
		'set_featured_image'    => __( 'Set featured image', 'sage' ),
		'remove_featured_image' => __( 'Remove featured image', 'sage' ),
		'use_featured_image'    => __( 'Use as featured image', 'sage' ),
		'insert_into_item'      => __( 'Insert into Horizontal slide', 'sage' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Horizontal slide', 'sage' ),
		'items_list'            => __( 'Horizontal Slides list', 'sage' ),
		'items_list_navigation' => __( 'Horizontal Slides list navigation', 'sage' ),
		'filter_items_list'     => __( 'Filter Horizontal Slides list', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Horizontal Slide', 'sage' ),
		'description'           => __( 'Horizontal Slides', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', ),
		'taxonomies'            => array( 'category', 'post_tag', 'notes_id' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ir_horizontal_slide', $args );

}
add_action( 'init', 'irajala_slides', 0 );
