<?php
###########################################
############## CUSTON RESPONSIVE ##########
###########################################

function get_custom_picture_srcs( $image, $mappings ) {
	$arr = array();  
		
	$mappings=explode('--', $mappings['img_size']);
	
	foreach ( $mappings as $key => $val ) { 
		$size=explode('=>', $val);
			$image_src = wp_get_attachment_image_src($image,explode('&',$size[1]));		
			$arr[] = '<source srcset="'. $image_src[0] . ' "media="(min-width:'. $size[0].'px)" />';
	}
	return implode($arr );
}


function responsive_shortcode_function($atts) {
	
	
	$imageid=$atts['imageid'];	
	
	$main_src = wp_get_attachment_image_src($imageid, 'li-slider-thumb' );
	
	$mappings=$atts['img_size'];
   return
		'<picture data-alt="'. tevkori_get_img_alt($imageid ) .'">
			<!--[if IE 9]><video style="display: none;"><![endif]-->'
			. get_custom_picture_srcs( $imageid, $atts ) .
			'<!--[if IE 9]></video><![endif]-->
			<img srcset="'. $main_src[0] . '">			
		</picture>';
}


// TODO: It this the best name? responsive_img? picture?
add_shortcode('responsive_shortcode', 'responsive_shortcode_function' );


?>