<?php

/********* Starting Sidebar Ad Widget *********/

class Sidebar_Ad_Widget extends WP_Widget {
	
	function Sidebar_Ad_Widget(){
		  	$widget_ops = array( 'classname' => 'Sidebar_Ad_Widget', 'description' => __('This widget is for advertisment on sidebar. Image Propotions: Width: 253px; Height: 209px; ', 'FoodRecipe'));
			$this->WP_Widget( 'sidebar_ad_widget', __('Food Recipe: Sidebar Ad', 'FoodRecipe'), $widget_ops );
	}


/********* Starting Sidebar Ad Widget Function *********/

	function widget($args,  $instance) {
			extract($args);
			
			$sb_ad_link_url =  $instance['ad_link_url'];
			$sb_image_link_url =  $instance['image_link_url'];
			
			echo 	'<span class="w-pet-border"></span><br /><div class="ads-253x209">
							<a href="'. $sb_ad_link_url .'"><img src="'. $sb_image_link_url .'" width="253" height="209" alt="Recipe Ads" /></a>';
			echo	'</div>';	
	}


/********* Starting Sidebar Ad Widget Admin From *********/
		
	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'ad_link_url' => '#','image_link_url' => '#' ) );
		
        $sb_ad_link_url =  $instance['ad_link_url'];
		$sb_image_link_url =  $instance['image_link_url'];
		
		?>
	            <p>
			            <label for="<?php echo $this->get_field_id('ad_link_url'); ?>"><?php _e('Ad Link URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('ad_link_url'); ?>" name="<?php echo $this->get_field_name('ad_link_url'); ?>" type="text" value="<?php echo $sb_ad_link_url; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('image_link_url'); ?>"><?php _e('Ad Image URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('image_link_url'); ?>" name="<?php echo $this->get_field_name('image_link_url'); ?>" type="text" value="<?php echo $sb_image_link_url; ?>" />
		        </p>
		<?php
	}

	
/********* Starting Sidebar Ad Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			
			$instance['ad_link_url'] = strip_tags($new_instance['ad_link_url']);
	        $instance['image_link_url'] = strip_tags($new_instance['image_link_url']);
			
	        return $instance;
    }
	
}