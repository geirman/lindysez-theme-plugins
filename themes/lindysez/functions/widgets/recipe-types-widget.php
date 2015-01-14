<?php

/********* Starting Recipe Types Widget for Sidebar *********/

class Recipe_Types_Widget extends WP_Widget {
	
	function Recipe_Types_Widget(){
	  		$widget_ops = array( 'classname' => 'Recipe_Types_Widget', 'description' => __('Show List of Recipe Types.', 'FoodRecipe'));
			$this->WP_Widget( 'recipe_types', __('Food Recipe: Recipe Types', 'FoodRecipe'), $widget_ops );
	}

/********* Starting Recipe Types Widget Function *********/
	
	function widget($args,  $instance) 
	{
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		
		$args = array(
			  'taxonomy'     => 'recipe_type',
			  'title_li'     => ''
			);

		if($title):
			
			$temp_title = explode(' ',$title);
			$first_letter = $temp_title[0];
					unset($temp_title[0]);
			$title_new = implode(' ', $temp_title);
			$title = $first_letter.' <span>'.$title_new.'</span>';
			
			echo '<h2 class="w-bot-border bmarginless">';
					echo $title;
			echo '</h2>';	
		
		endif;
		
		echo   '<div class="widget archives clearfix nostylewt">
					<ul>';
							wp_list_categories( $args );
		echo		'</ul>
				</div><!-- end of fav-recipes widget -->';
	
	}
	

/********* Starting Recipe Types Widget Admin Form *********/

	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Recipe Types' ) );
	
        $title= esc_attr($instance['title']);

		?>
			<p>
	            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	        </p>
		<?php
	}
	
/********* Starting Recipe Types Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
        $instance=$old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		
        return $instance;

    }
	
}