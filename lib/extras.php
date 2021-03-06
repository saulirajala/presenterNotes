<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	// Add class if sidebar is active
	if ( Config\display_sidebar() ) {
		$classes[] = 'sidebar-primary';
	}

	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );


function sage_wrap_base_cpts($templates) {
	$cpt = get_post_type(); // Get the current post type
	if ($cpt) {
		array_unshift($templates, 'base-' . $cpt . '.php'); // Shift the template to the front of the array
	}
	return $templates; // Return our modified array with base-$cpt.php at the front of the queue
}
add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_base_cpts', 9999, 1); // Add our function to the sage/wrap_base filter

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );


$otsikot = array();
/*
 * Shortcode that adds span-element that wraps the content and creates $otsikot global array, 
 * where the title and subtitles are stored
 * [section title="1" subtitle="1"]My Section Title[/section]
 * 
 */

function irajala_section_shortcode( $atts, $title = null ) {

	global $otsikot;
	$atts = shortcode_atts(
		array(
			'title'    => null,
			'subtitle' => null,
		), $atts, 'irajala_section_shortcode' );
	if ( ! empty( $atts['title'] ) && ! empty( $atts['subtitle'] ) ) {
		$id        = "title" . $atts['title'] . "-" . $atts['subtitle'];
		$otsikot[] = array( $id, $title, true );
	} elseif ( ! empty( $atts['title'] ) ) {
		$id        = "title" . $atts['title'];
		$otsikot[] = array( $id, $title );
	}

	return '<span id="' . esc_attr( $id ) . '">' . esc_html( $title ) . '</span>';
}

add_shortcode( 'section', __NAMESPACE__ . '\\irajala_section_shortcode' );

/*
 * Shortcode that displays posts nagivation menu
 * [section_navigation] //tulostaa navigaation
 * 
 */
function irajala_section_navigation_shortcode( $atts, $title = null ) {

	global $otsikot;
	$return_val = '<ul class="nav nav-pills nav-stacked">'; //lisätään listan aloitus

	for ( $i = 0; $i < count( $otsikot ); $i ++ ) {
		if ( ! isset( $otsikot[ $i ][2] ) ) { //jos ei ole alaotsikko
			//tulostetaan </li> jos eka
			$return_val .= '</li>';

			//tulostetaan h1-taso
			$return_val .= '<li><a href="#' . esc_attr( $otsikot[ $i ][0] ) . '">' . esc_html( $otsikot[ $i ][1] ) . '</a>'; //lisätään listan itemin aloitus ja linkki
		} else { //jos on alaotsikko
			$return_val .= '<li class="submenu"><a href="#' . esc_attr( $otsikot[ $i ][0] ) . '">' . esc_html( $otsikot[ $i ][1] ) . '</a>'; //lisätään listan itemin aloitus ja linkki
		}
	}
	$return_val .= '</ul>'; //lisätään listan lopetus
	return $return_val;
}

add_shortcode( 'section_navigation', __NAMESPACE__ . '\\irajala_section_navigation_shortcode' );

/*
 * Adds shortcode button to TinyMCE-editor
 */
function add_button() {
	//jos ollaan visuaalisessa editorissa
	if ( get_user_option( 'rich_editing' ) ) {
		if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
			add_filter( 'mce_external_plugins', __NAMESPACE__ . '\\add_plugin' );
			add_filter( 'mce_buttons', __NAMESPACE__ . '\\register_button' );
		}
	}
}

add_action( 'init', __NAMESPACE__ . '\\add_button' );

/**
 * Registers new buttons to tinyMCE toolbar
 *
 * @param type $buttons
 *
 * @return type
 */
function register_button( $buttons ) {
	array_push( $buttons, "irajala_section_shortcode_title1" );
	array_push( $buttons, "irajala_section_shortcode_title2" );

	return $buttons;
}

/**
 * Adds javascript to button
 *
 * @param array $plugin_array
 *
 * @return string
 */
function add_plugin( $plugin_array ) {
	$plugin_array['irajala_section_shortcode'] = get_template_directory_uri() . '/dist/scripts/main.js';

	return $plugin_array;
}


/** Add custom styles to admin
 * https://css-tricks.com/snippets/wordpress/apply-custom-css-to-admin-area/
 */
function irajala_custom_styles() {
	echo '<style>
    i.mce-i-icon-h1:before{content:"[section]";}
    i.mce-i-icon-h1{width:60px!important;}
  </style>';
}

add_action( 'admin_head', __NAMESPACE__ . '\\irajala_custom_styles' );

/*
 * Shortcode that displays posts nagivation menu
 * [section_navigation] //tulostaa navigaation
 *
 */
function irajala_change_shortcode( $atts ) {
	$atts = shortcode_atts(
		array(
			'direction' => 'left',
		), $atts, 'irajala_section_shortcode' );


	return '<span class="changeSlide" data-direction="' . $atts['direction'] . '">Vaihdetaan dia  ' . __( $atts['direction'], 'sage' ) . '</span>';

}

add_shortcode( 'change', __NAMESPACE__ . '\\irajala_change_shortcode' );



function get_current_on_air_notes() {


// args
	$args = array(
		'numberposts' => 1,
		'post_type'   => 'post',
		'meta_key'    => 'ir_is_on_air',
		'meta_value'  => 'on',
		'orderby'     => 'date',
	);

	$on_air_id = 0;
	// query
	$the_query = new \WP_Query( $args );

	if ( $the_query->have_posts() ):

		while ( $the_query->have_posts() ) : $the_query->the_post();
			$on_air_id = get_the_ID();
		endwhile;

	endif;

	wp_reset_query();     // Restore global post data stomped by the_post().

	return $on_air_id;
}

