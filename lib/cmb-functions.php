<?php

/**
 * Register repeatable group field for vertical slides
 */
function ir_register_repeatable_group_field_metabox() {
	$prefix = 'ir_horizontal_';

	/**
	 * Repeatable Field Groups
	 */
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => esc_html__( 'Vertical slides', 'cmb2' ),
		'object_types' => array( 'ir_horizontal_slide', ),
	) );

	// Add group-field to cmb2_box
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix . 'slides',
		'type'        => 'group',
		'description' => esc_html__( 'Create vertical slides', 'cmb2' ),
		'options'     => array(
			'group_title'   => esc_html__( 'Slide {#}', 'cmb2' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add Another Slide', 'cmb2' ),
			'remove_button' => esc_html__( 'Remove Slide', 'cmb2' ),
			'sortable'      => true, // beta,
		),
	) );

	// Add wysiwyg-field
	$cmb_group->add_group_field( $group_field_id, array(
		'name' => esc_html__( 'Slide content', 'cmb2' ),
		'id'   => 'slide_content',
		'type' => 'wysiwyg',
	) );

	// Add text color -field
	$cmb_group->add_group_field( $group_field_id, array(
		'name'             => esc_html__( 'Color of text', 'cmb2' ),
		'id'               => 'text_color',
		'type'             => 'radio',
		'options'          => array(
			'black' => __( 'Black', 'cmb2' ),
			'white'   => __( 'White', 'cmb2' ),
		),
	) );

	// Add background image -field
	$cmb_group->add_group_field( $group_field_id, array(
		'name'    => esc_html__( 'Background image', 'cmb2' ),
		'id'      => 'bg_image',
		'type'    => 'file',
		// Optional:
		'options' => array(
			'url' => false, // Hide the text input for the url
		),
		'text'    => array(
			'add_upload_file_text' => esc_html__( 'Add image', 'cmb2' ), // Change upload button text. Default: "Add or Upload File"
		),
	));
}
add_action( 'cmb2_admin_init', __NAMESPACE__ . '\\ir_register_repeatable_group_field_metabox' );




/**
 * Register On Air -metabox
 */
function ir_register_on_air_metabox() {
	$prefix = 'ir_';
	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_on_air = new_cmb2_box( array(
		'id'            => $prefix . 'on_air',
		'title'         => esc_html__( 'On Air', 'cmb2' ),
		'object_types'  => array( 'post', ), // Post type
	) );

	$cmb_on_air->add_field( array(
		'name' => esc_html__( 'On Air?', 'cmb2' ),
		'desc' => esc_html__( 'Set slides of this post for slideshow', 'cmb2' ),
		'id'   => $prefix . 'is_on_air',
		'type' => 'checkbox',
	) );
}
add_action( 'cmb2_admin_init', __NAMESPACE__.'\\ir_register_on_air_metabox' );


/**
 * Register custom_attached_posts -metabox for selecting horizontal slides
 * to current post
 *
 * @param  array $meta_boxes
 * @return array
 */
function ir_cmb2_attached_posts_field_metaboxes() {
	$example_meta = new_cmb2_box( array(
		'id'           => 'cmb2_attached_posts_field',
		'title'        => __( 'Attached slides', 'cmb2' ),
		'object_types' => array( 'post' ), // Post type
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => false, // Show field names on the left
	) );
	$example_meta->add_field( array(
		'name'    => __( 'Attached slides', 'cmb2' ),
		'desc'    => __( 'Drag slides from the left column to the right column to attach them to this post.<br />You may rearrange the order of the slides in the right column by dragging and dropping.', 'cmb2' ),
		'id'      => 'attached_cmb2_attached_posts',
		'type'    => 'custom_attached_posts',
		'options' => array(
			'show_thumbnails' => true, // Show thumbnails on the left
			'filter_boxes'    => true, // Show a text box for filtering the results
			'query_args'      => array( 'post_type' => 'ir_horizontal_slide' ), // override the get_posts args
		),
	) );
}
add_action( 'cmb2_init', __NAMESPACE__.'\\ir_cmb2_attached_posts_field_metaboxes' );
