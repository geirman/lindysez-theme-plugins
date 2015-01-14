<?php

/********* Starting Recipe Tips & Techniques Widget for Sidebar or Homepage Bottom Area *********/

class Recipe_Tips_And_Techniques_Widget extends WP_Widget {
	
	function Recipe_Tips_And_Techniques_Widget(){
	  		$widget_ops = array( 'classname' => 'Recipe_Tips_And_Techniques_Widget', 'description' => __('Shows Latest Tips & Techniques.', 'FoodRecipe'));
			$this->WP_Widget( 'recipe_tips_and_techniques_widget', __('CG: Tips & Techniques', 'FoodRecipe'), $widget_ops );
	}

	
/********* Starting Recipe Tips & Techniques Widget Function *********/

	function widget($args,  $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);		
		if ( empty($title) ) 
				$title = false;
		
		$post_count =  $instance['post_per_page'];
		$excerpt_length =  $instance['excerpt_length'];
		
		if($title):
			$temp_title = explode(' ',$title);
			$first_letter = $temp_title[0];
				unset($temp_title[0]);
			$title_new = implode(' ', $temp_title);
			$title = $first_letter.' <span>'.$title_new.'</span>';
			
		endif;
		
		echo   '<div class="widget col-sm-4 col-md-4 recent_tips ">
					<h3 class="w-bot-border">';
							echo $title;
		echo 		'</h3>';
							$this->tips_and_teqniques_loop($post_count, $excerpt_length);
		echo		'
				</div><!-- end of fav-recipes widget -->';
	
	}

	
/********* Recipe Tips & Techniques Loop *********/

	function tips_and_teqniques_loop($post_count = '2', $excerpt_length = 23){
			
		$args = array('post_type'=>'tips');
		$args['posts_per_page'] = $post_count;
		
		$get_posts_query = new WP_Query($args);
		
		if($get_posts_query->have_posts()): 
			while($get_posts_query->have_posts()): 
			$get_posts_query->the_post();
				?>
					<div class="homemade">
                            <h5><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(),20,'...'); ?></a></h5>
                            <p><?php echo word_trim(get_the_excerpt(), $excerpt_length, '...'); ?><a href="<?php the_permalink(); ?>"><?php _e('more', 'FoodRecipe'); ?></a></p>
                    </div>			                         						
				<?php		
			endwhile; 
		endif;
	}
	
	
/********* Starting Recipe Tips & Techniques Widget Admin Form *********/
		
	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Tips & Techniques','post_per_page' => 3,'excerpt_length' => 12 ) );
		
        $title= esc_attr($instance['title']);		
		$post_count =  $instance['post_per_page'];
		$excerpt_length =  $instance['excerpt_length'];
		
		?>
			<p>
		            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
		            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	        </p>
            <p>
		            <label for="<?php echo $this->get_field_id('post_per_page'); ?>"><?php _e('Number of Posts', 'FoodRecipe'); ?></label>
		            <input class="widefat" id="<?php echo $this->get_field_id('post_per_page'); ?>" name="<?php echo $this->get_field_name('post_per_page'); ?>" type="text" value="<?php echo $post_count; ?>" />
	        </p>
            <p>
		            <label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Number of Words', 'FoodRecipe'); ?></label>
		            <input class="widefat" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" type="text" value="<?php echo $excerpt_length; ?>" />
	        </p>

		<?php
	}

	
/********* Starting Recipe Tips & Techniques Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
        $instance=$old_instance;		
		
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['post_per_page'] = $new_instance['post_per_page'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		
        return $instance;

    }
	
}