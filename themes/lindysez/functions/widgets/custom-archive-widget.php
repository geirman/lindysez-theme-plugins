<?php

/********* Starting Recipe Archives Widget for Sidebar *********/

class Recipe_Archive_Widget extends WP_Widget {
	
	function Recipe_Archive_Widget(){
	  		$widget_ops = array( 'classname' => 'Recipe_Archive_Widget', 'description' => __('Show Archives from Recipes or from Blog.', 'FoodRecipe'));
			$this->WP_Widget( 'recipe_archives', __('Food Recipe: Custom Archive', 'FoodRecipe'), $widget_ops );
	}

/********* Starting Recipe Archives Widget Function *********/
	
	function widget($args,  $instance) 
	{
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		$archive_type =  $instance['archive_type'];
		
		$args = array(
				      'type'            => $archive_type,
				      'format'          => 'html', 
				      'echo'            => 1
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
							wp_get_archives( $args );
		echo		'</ul>
				</div><!-- end of fav-recipes widget -->';
	
	}
	

/********* Starting Recipe Archives Widget Admin Form *********/

	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Archives', 'archive_type' => 'monthly' ) );
	
        $title= esc_attr($instance['title']);
		$archive_type= esc_attr($instance['archive_type']);

		?>
			<p>
	            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
	            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	        </p>
            <p> 
				<label for="<?php echo $this->get_field_id('archive_type'); ?>"><?php _e('Archives Type', 'FoodRecipe'); ?></label>
                <select name="<?php echo $this->get_field_name('archive_type'); ?>" id="<?php echo $this->get_field_id('archive_type'); ?>">
	                	<option value="yearly"<?php selected( $instance['archive_type'], 'yearly' ); ?>><?php _e('Yearly Archives', 'FoodRecipe'); ?></option>
	                    <option value="monthly"<?php selected( $instance['archive_type'], 'monthly' ); ?>><?php _e('Monthly Archives', 'FoodRecipe'); ?></option>
	                    <option value="weekly"<?php selected( $instance['archive_type'], 'weekly' ); ?>><?php _e('Weekly Archives', 'FoodRecipe'); ?></option>
	                    <option value="daily"<?php selected( $instance['archive_type'], 'daily' ); ?>><?php _e('Daily Archives', 'FoodRecipe'); ?></option>
                </select>
			</p>
		<?php
	}
	
/********* Starting Recipe Archives Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
        $instance=$old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['archive_type'] = strip_tags($new_instance['archive_type']);
		
        return $instance;

    }
	
}