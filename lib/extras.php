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
function whit_section_shortcode( $atts, $title = null ) {
	// $content is the title you have between your [section] and [/section] 
	//$atts[0] <- otsikko hierarki 1/1.1/1.2/.../3.4/...
	$id = urlencode( strip_tags( $title ) );
	
	$id = str_replace(".","",$id);
	$id = str_replace(",","",$id);
	// strip_tags removes any formatting (like <em> etc) from the title.
	// Then urlencode replaces spaces and so on.
//	echo $atts[0];
	global $otsikot;
	if ( isset( $atts[ 0 ] ) ) {
		$otsikot[] = array( $id, $title, $atts[ 0 ] );
	} else {
		$otsikot[] = array( $id, $title );
	}

//	$whit_sections .= '<li><a href="#' . $id . '">' . $title . '</a></li>';

	return '<span id="' . $id . '">' . $title . '</span>';
}

add_shortcode( 'section', __NAMESPACE__ . '\\whit_section_shortcode' );

// [section_navigation] //tulostaa navigaation
function whit_section_navigation_shortcode( $atts, $title = null ) {

	global $otsikot;
	$return_val = '<ul class="nav nav-pills nav-stacked" id="page-nav">'; //lisätään listan aloitus
	//tässä pitäis tapahtua magic
//	var_dump( $whit_secti	ons );
//	$var = array {
//		[ 0 ] => array {
//			[ 0 ] => string(21) "Historiallinen+tausta" [ 1 ] => string(21) "Historiallinen tausta"
//		} [ 1 ] => array() {
//			[ 0 ] => string "Liittyy+ns.+rakkauden+kaksoisk%C3%A4skyyn" [ 1 ] => string(37) "Liittyy ns. rakkauden kaksoiskäskyyn"
//		} [ 2 ] => array(2) {
//			[ 0 ] => string(36) "Veritie%2C+pappi+ja+leevil%C3%A4inen" [ 1 ] => string(30) "Veritie, pappi ja leeviläinen"
//		} [ 3 ] => array(2) {
//			[ 0 ] => string(29) "Vertauksen+opetus+ja+sovellus" [ 1 ] => string(29) "Vertauksen opetus ja sovellus"
//		}
//	};
	
	for ($i=0; $i<count($otsikot); $i++) {
		if ( !isset( $otsikot[$i][ 2 ] ) ) { //jos ei ole alaotsikko
			//tulostetaan <ul> jos eka
			if ( $i>0 && isset( $otsikot[$i-1][ 2 ] ) ) {//jos edellinen oli alaotsikko => tulostetaan ul-loppu
				$return_val .= '</ul></li>';
			}else { //muuten tulostetaan li-loppu eli edellin oli h1-tason lopputagi
				$return_val .= '</li>'; 
			}
			//tulostetaan h1-taso
			$return_val .= '<li><a href="#' . $otsikot[$i][ 0 ] . '">' . $otsikot[$i][ 1 ] . '</a>'; //lisätään listan itemin aloitus ja linkki
//			$return_val .= '</li>'; //lisätään listan itemin lopetus
		} else { //jos on alaotsikko
			//tulostetaan <ul> jos eka
			if ( ! isset( $otsikot[$i-1][ 2 ] ) ) { //jos edellinen ei ollut alaotsikko
				$return_val .= '<ul class="nav subnav">';
			}
			$return_val .= '<li><a href="#' . $otsikot[$i][ 0 ] . '">' . $otsikot[$i][ 1 ] . '</a>'; //lisätään listan itemin aloitus ja linkki
		}
		
	}
	$return_val .= '</ul>'; //lisätään listan lopetus
	return $return_val;
}

add_shortcode( 'section_navigation', __NAMESPACE__ . '\\whit_section_navigation_shortcode' );

