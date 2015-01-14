<?php

/********* Starting Recipe News and Events Widget for Sidebar or Homepage Bottom Area *********/

class Recipe_News_And_Events_Mobile_Widget extends WP_Widget {
	
	function Recipe_News_And_Events_Mobile_Widget(){
	  		$widget_ops = array( 'classname' => 'Recipe_News_And_Events_Mobile_Widget', 'description' => __('Show Latest News and Events from Blog.', 'FoodRecipe'));
			$this->WP_Widget( 'recipe_news_and_events_mobile_widget', __('Food Recipe: News And Events For Mobile', 'FoodRecipe'), $widget_ops );
	}

	
/********* Starting Recipe News and Events Widget Function *********/

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
			$title = $first_letter.' <strong>'.$title_new.'</strong>';
			
		endif;
		
		echo   '<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						<span class="plus custom"></span>
							<h3>';
									echo $title;
				echo 		'</h3>
							</a></div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">';
								$this->news_and_event_loop($post_count, $excerpt_length);
		echo	'			</div>
							<div style="clear:both;"></div>
						</div>
					</div>
				</div><!-- end of fav-recipes widget -->';
	
	}

	
/********* Recipe News and Events Loop *********/

	function news_and_event_loop($post_count = '4', $excerpt_length = 23){
			
		$args = array('post_type'=>'post');
		$args['posts_per_page'] = $post_count;
		
		$get_posts_query = new WP_Query($args);
		
		if($get_posts_query->have_posts()): $sr='1';
			while($get_posts_query->have_posts()): 
			$get_posts_query->the_post();
						if($sr=='5') { 
							echo '<div class="list_more_news_div"><a class="readmore" href="'.get_page_link('14').'">Load More</a></div>';
						}			
				?>
					<div class="homemade <?=($sr>4)?'list_more_news':''?>">
                            <h5><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(),7,'...'); ?></a></h5>
                            <p><?php echo word_trim(get_the_excerpt(), $excerpt_length, ' ...'); ?><a href="<?php the_permalink(); ?>"><?php _e('more', 'FoodRecipe'); ?></a></p>
                    </div>			                         						
				<?php
				$sr++;	
			endwhile; 
		endif;
	}
	
	
/********* Starting Recipe News and Events Widget Admin Form *********/
		
	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'News and Events','post_per_page' => 3,'excerpt_length' => 12 ) );
		
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

	
/********* Starting Recipe News and Events Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
        $instance=$old_instance;		
		
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['post_per_page'] = $new_instance['post_per_page'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		
        return $instance;

    }
	
}