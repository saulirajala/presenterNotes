<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Config;

/**
 * Add <body> classes
 */
function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && !is_front_page() ) {
		if ( !in_array( basename( get_permalink() ), $classes ) ) {
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

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
	return ' &hellip; <a href="' . get_permalink() . '">' . __( 'Continued', 'sage' ) . '</a>';
}

add_filter( 'excerpt_more', __NAMESPACE__ . '\\excerpt_more' );


$otsikot = array();

// [section]My Section Title[/section]                                          
function irajala_section_shortcode( $atts, $title = null ) {
	
	global $otsikot;
	
	if ( isset( $atts[ 0 ] ) && isset( $atts[ 1 ] ) ) {
		$id="title".$atts[ 0 ]."-".$atts[ 1 ];
		$otsikot[] = array( $id, $title, true );
	} elseif (isset( $atts[ 0 ] ) ) {
		$id="title".$atts[ 0 ];
		$otsikot[] = array( $id, $title );
	} 	
	return '<span id="' . $id . '">' . $title . '</span>';
}

add_shortcode( 'section', __NAMESPACE__ . '\\irajala_section_shortcode' );

// [section_navigation] //tulostaa navigaation
function irajala_section_navigation_shortcode( $atts, $title = null ) {

	global $otsikot;
	$return_val = '<ul class="nav nav-pills nav-stacked">'; //lisätään listan aloitus
	
	for ($i=0; $i<count($otsikot); $i++) {
		if ( ! $otsikot[$i][ 2 ]  ) { //jos ei ole alaotsikko
			//tulostetaan </li> jos eka
			$return_val .= '</li>'; 
			
			//tulostetaan h1-taso
			$return_val .= '<li><a href="#' . $otsikot[$i][ 0 ] . '">' . $otsikot[$i][ 1 ] . '</a>'; //lisätään listan itemin aloitus ja linkki
		} else { //jos on alaotsikko
			$return_val .= '<li class="submenu"><a href="#' . $otsikot[$i][ 0 ] . '">' . $otsikot[$i][ 1 ] . '</a>'; //lisätään listan itemin aloitus ja linkki
		}
		
	}
	$return_val .= '</ul>'; //lisätään listan lopetus
	return $return_val;
}

add_shortcode( 'section_navigation', __NAMESPACE__ . '\\irajala_section_navigation_shortcode' );

