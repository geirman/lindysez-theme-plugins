<?php 
	global $post;
	global $wp_embed;

	$vid_url = get_post_meta($post->ID, 'RECIPE_META_video_url', true);	

	// write the video embed into the side column only if the vid_url exists and the [video] shotrcode 
	// doesn't already exist in the post
	if(!empty($vid_url) && !has_code('video')){
		$embed_code = wp_oembed_get($vid_url, array('width'=>232)); 
		$video_embed ='
			<div class="vid-box geirman">
			<span class="embed-youtube" style="text-align:center; display: block;">
			<div class="fluid-width-video-wrapper">
    			'.$embed_code.'
    		</div>
			</span>
			</div>'
		;
		echo $video_embed;
	}

	// check the current post for the existence of a short code
	// source: http://wp.tutsplus.com/articles/quick-tip-improving-shortcodes-with-the-has_shortcode-function/
	// renamed from has_shortcode() to avoid conflict with /wp-includes/shortcodes.php function by the same name introduced in v3.6 
	function has_code($shortcode = '') {
		
		$post_to_check = get_post(get_the_ID());
		
		// false because we have to search through the post content first
		$found = false;
		
		// if no short code was provided, return false
		if (!$shortcode) {
			return $found;
		}
		// check the post content for the short code
		if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {
			// we have found the short code
			$found = true;
		}
		
		// return our final results
		return $found;
	}

?>
