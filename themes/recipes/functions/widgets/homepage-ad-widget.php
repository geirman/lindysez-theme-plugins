<?php


/********* Starting Home Page Bottom Area Ad Widget for ad sized 642px by 79px *********/

class Homepage_Ad_Widget extends WP_Widget {
	
	function Homepage_Ad_Widget(){
	  		$widget_ops = array( 'classname' => 'Homepage_Ad_Widget', 'description' => __('This widget is for advertisment on homepage. Image Propotions: Width: 642px; Height: 79px;', 'FoodRecipe'));
			$this->WP_Widget( 'homepage_ad_widget', __('Food Recipe: Homepage Advertisement', 'FoodRecipe'), $widget_ops );
	}
	
	
/********* Starting Home Page Bottom Area Ad Widget Function *********/

	function widget($args,  $instance) {
		extract($args);
		
		$ad_link_url =  $instance['ad_link_url'];
		$image_link_url =  $instance['image_link_url'];
		
		echo 	'<div class="ads-642x79">
					<a href="'. $ad_link_url .'"><img src="'. $image_link_url .'" width="642" height="79" alt="Recipe Ads" /></a>';
		echo	'</div>';
	
	}

		
/********* Starting Home Page Bottom Area Ad Widget Admin Form *********/

	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'ad_link_url' => '#','image_link_url' => '#' ) );
		
        $ad_link_url =  $instance['ad_link_url'];
		$image_link_url =  $instance['image_link_url'];
		
		?>
            <p>
	            	<label for="<?php echo $this->get_field_id('ad_link_url'); ?>"><?php _e('Advertisement Target URL', 'FoodRecipe'); ?></label>
	            	<input class="widefat" id="<?php echo $this->get_field_id('ad_link_url'); ?>" name="<?php echo $this->get_field_name('ad_link_url'); ?>" type="text" value="<?php echo $ad_link_url; ?>" />
	        </p>
            <p>
	            	<label for="<?php echo $this->get_field_id('image_link_url'); ?>"><?php _e('Advertisement Image URL', 'FoodRecipe'); ?></label>
	            	<input class="widefat" id="<?php echo $this->get_field_id('image_link_url'); ?>" name="<?php echo $this->get_field_name('image_link_url'); ?>" type="text" value="<?php echo $image_link_url; ?>" />
	        </p>

		<?php
	}
	

/********* Starting Home Page Bottom Area Ad Widget Update Function *********/
	
	function update($new_instance, $old_instance) 
	{
        $instance=$old_instance;		
		
		$instance['ad_link_url'] = strip_tags($new_instance['ad_link_url']);
        $instance['image_link_url'] = strip_tags($new_instance['image_link_url']);
		
        return $instance;

    }
	
}