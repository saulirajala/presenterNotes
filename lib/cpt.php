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

	$labels = array(
		'name'                  => _x( 'Vertical Slides', 'Post Type General Name', 'sage' ),
		'singular_name'         => _x( 'Vertical Slide', 'Post Type Singular Name', 'sage' ),
		'menu_name'             => __( 'Vertical Slides', 'sage' ),
		'name_admin_bar'        => __( 'Vertical Slide', 'sage' ),
		'archives'              => __( 'Vertical Slides Archives', 'sage' ),
		'parent_item_colon'     => __( 'Parent Vertical Slide:', 'sage' ),
		'all_items'             => __( 'All Vertical Slides', 'sage' ),
		'add_new_item'          => __( 'Add New Vertical Slide', 'sage' ),
		'add_new'               => __( 'Add New', 'sage' ),
		'new_item'              => __( 'New Vertical Slide', 'sage' ),
		'edit_item'             => __( 'Edit Vertical Slide', 'sage' ),
		'update_item'           => __( 'Update Vertical Slide', 'sage' ),
		'view_item'             => __( 'View Vertical Slide', 'sage' ),
		'search_items'          => __( 'Search Vertical Slide', 'sage' ),
		'not_found'             => __( 'Not found', 'sage' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
		'featured_image'        => __( 'Featured Image', 'sage' ),
		'set_featured_image'    => __( 'Set featured image', 'sage' ),
		'remove_featured_image' => __( 'Remove featured image', 'sage' ),
		'use_featured_image'    => __( 'Use as featured image', 'sage' ),
		'insert_into_item'      => __( 'Insert into Vertical slide', 'sage' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Vertical slide', 'sage' ),
		'items_list'            => __( 'Vertical Slides list', 'sage' ),
		'items_list_navigation' => __( 'Vertical Slides list navigation', 'sage' ),
		'filter_items_list'     => __( 'Filter Vertical Slides list', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Vertical Slide', 'sage' ),
		'description'           => __( 'Vertical Slides', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'revisions', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag', 'notes_id' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'ir_vertical_slide', $args );

}
add_action( 'init', 'irajala_slides', 0 );

// Register Custom Taxonomy
function irajala_notes_id_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Notes ids', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Notes id', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Notes id', 'sage' ),
		'all_items'                  => __( 'All Notes ids', 'sage' ),
		'parent_item'                => __( 'Parent Notes id', 'sage' ),
		'parent_item_colon'          => __( 'Parent Notes id:', 'sage' ),
		'new_item_name'              => __( 'New Notes id Name', 'sage' ),
		'add_new_item'               => __( 'Add New Notes id', 'sage' ),
		'edit_item'                  => __( 'Edit Notes id', 'sage' ),
		'update_item'                => __( 'Update Notes id', 'sage' ),
		'view_item'                  => __( 'View Notes id', 'sage' ),
		'separate_items_with_commas' => __( 'Separate Notes ids with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove Notes ids', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Notes ids', 'sage' ),
		'search_items'               => __( 'Search Notes ids', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No notes ids', 'sage' ),
		'items_list'                 => __( 'Notes ids list', 'sage' ),
		'items_list_navigation'      => __( 'Notes ids list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'notes_id', array( 'ir_slide' ), $args );

}
add_action( 'init', 'irajala_notes_id_taxonomy', 0 );