<?php

/*
Plugin Name: WP Tevko Responsive Images
Plugin URI: http://timevko.com
Description: Fully responsive image solution using picturefill and the ID of your image.
Version: 1.0.0
Author: Tim Evko
Author URI: http://timevko.com
License: MIT
*/


// First we queue the polyfill
function tevkori_get_picturefill() {
	wp_enqueue_script( 'picturefill', plugins_url( '/js/picturefill.js', __FILE__ ) );
	wp_enqueue_script( 'matchmedia', plugins_url( '/js/matchmedia.js', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'tevkori_get_picturefill' );


// Add support for our desired image sizes - if you add to these, you may have to adjust your shortcode function
// TODO: Add UI for adjusting?
function tevkori_add_image_sizes() {

}
add_action( 'plugins_loaded', 'tevkori_add_image_sizes' );

// alt tags will now be automatically included
function tevkori_get_img_alt( $image ) {
	$img_alt = trim( strip_tags( get_post_meta( $image, '_wp_attachment_image_alt', true ) ) );
	return $img_alt;
}

function tevkori_get_picture_srcs( $image, $mappings ) {
	$arr = array(); 
	
	foreach ( $mappings as $size => $type ) { 
		$image_src = wp_get_attachment_image_src($image, $type );
		$arr[] = '<source srcset="'. $image_src[0] . ' "media="(min-width:'. $size .'px)" />';
	}
	return implode( $arr );
}

function tevkori_responsive_shortcode($atts) {
	extract(shortcode_atts( array(
		'imageid'    => 1,
		// You can add more sizes for your shortcodes here		
		'size2' => 575,	
		'size3' => 515,		
		'size4' => 250,		
		'size5' => 222,
		'size6' => 63,
		'abc'=>'',
	), $atts ));
	

	
	$mappings = array(
		$size5 => 'thumbnail-blog',
		$size4 => 'li-slider-thumb',
		$size3 => 'recipe-listing',
		$size2 => 'recipe-4column-thumb',	
		$size1 => 'sidebar-tabs',
	); 
	
	$main_src = wp_get_attachment_image_src($imageid, 'li-slider-thumb' );
	
   return
		'<picture data-alt="'. tevkori_get_img_alt($imageid ) .'">
			<!--[if IE 9]><video style="display: none;"><![endif]-->'
			. tevkori_get_picture_srcs( $imageid, $mappings ) .
			'<!--[if IE 9]></video><![endif]-->
			<img srcset="'. $main_src[0] . '">			
		</picture>';
}
// TODO: It this the best name? responsive_img? picture?
add_shortcode('responsive', 'tevkori_responsive_shortcode' );

// TODO: Make this know what sizes are chosen, rather than hardcoded
function tevkori_responsive_insert_image( $html, $id, $caption, $title, $align, $url ) {
	return "[responsive imageid='$id' size1='63' size2='222' size3='250' size4='515' size5='575']";
}
add_filter( 'image_send_to_editor', 'tevkori_responsive_insert_image', 10, 9 );



?>
