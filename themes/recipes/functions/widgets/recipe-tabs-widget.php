<?php

/********* Starting Recipe Sidebar Tabs Widget For Sidebar and Homepage Bottom Area *********/

class Recipe_Sidebar_Tabed_Widget extends WP_Widget {
	
	function Recipe_Sidebar_Tabed_Widget(){
			$widget_ops = array( 'classname' => 'Recipe_Sidebar_Tabed_Widget', 'description' => __('Show Recent or Popular or Random Recipes in Tabs with thumbnail.', 'FoodRecipe'));
			$this->WP_Widget('recipe_sidebar_widget', __('Food Recipe: Tabs for Recipes', 'FoodRecipe'), $widget_ops );
	}


/********* Starting Recipe Sidebar Tabs Widget Function *********/
	
	function widget($args,  $instance) {
			extract($args);
			
			$title = apply_filters('widget_title', $instance['title']);		
			if ( empty($title) ) 
					$title = false;
			
			$tab_title_one =  $instance['tab_title_one'];
			$tab_title_two =  $instance['tab_title_two'];
			$tab_title_three =  $instance['tab_title_three'];		
			
			$recipe_tab_one = $instance['recipe_tab_one'];
			$recipe_tab_two = $instance['recipe_tab_two'];
			$recipe_tab_three = $instance['recipe_tab_three'];
			
	
			if($title):
					$temp_title = explode(' ',$title);
					$first_letter = $temp_title[0];
							unset($temp_title[0]);
					$title_new = implode(' ', $temp_title);
					$title = $first_letter.' <span>'.$title_new.'</span>';		
			endif;
			
	#for Home Page								
	if(is_page('home')): 
			echo '<div class="widget hidden-xs col-sm-4 col-md-4 lindy_Recipes">';
			echo '<h3 class="w-bot-border">';
				echo $title;
			echo '</h3>';

			echo 					'</h3>
											<div class="nav_lindy_reciepe">
													<ul class="nav nav-tabs">';
															if($tab_title_one) echo '<li class="active"><a data-toggle="tab" href="#home">'. $tab_title_one .'</a></li>';
															if($tab_title_two) echo '<li><a data-toggle="tab" href="#profile">'. $tab_title_two .'</a></li>';
															if($tab_title_three) echo '<li><a data-toggle="tab" href="#messages">'. $tab_title_three .'</a></li>';
			echo									'</ul>
													<div class="tab-content">
															<div id="home" class="tab-pane active">';
																	$this->recipe_loop($recipe_tab_one);
			echo									'		</div><!-- end of block div -->';
	
			if($tab_title_two) {			echo	'<div id="profile" class="tab-pane">';																	
																	$this->recipe_loop($recipe_tab_two);
											echo	'</div><!-- end of block div -->';
			}
													 
			if($tab_title_three) {			echo	'<div id="messages" class="tab-pane">';
																	$this->recipe_loop($recipe_tab_three);
			echo									'</div>
													</div> 
													 <!-- end of block div -->';
			}
										echo	'<div class="bot-border"></div>
											</div><!-- end of tabed div -->
									</div><!-- end of fav-recipes widget -->';
	
	else:
	#Now for other pages like sidbar
			echo '<div class="widget hidden-xs hidden-sm col-md-4 recent_lindy_reciepe">';
			echo '<h2>';
				echo $title;
			echo '</h2>';

			echo 					'</h3>
											<div class="nav_lindy_reciepe">
													<ul class="nav nav-tabs">';
															if($tab_title_one) echo '<li class="active"><a data-toggle="tab" href="#home">'. $tab_title_one .'</a></li>';
															if($tab_title_two) echo '<li><a data-toggle="tab" href="#profile">'. $tab_title_two .'</a></li>';
															if($tab_title_three) echo '<li><a data-toggle="tab" href="#messages">'. $tab_title_three .'</a></li>';
			echo									'</ul>
													<div class="tab-content">
															<div id="home" class="tab-pane active">';
																	$this->recipe_loop($recipe_tab_one);
			echo									'		</div><!-- end of block div -->';
	
			if($tab_title_two) {			echo	'<div id="profile" class="tab-pane">';
																	$this->recipe_loop($recipe_tab_two);
											echo	'</div><!-- end of block div -->';
			}
													 
			if($tab_title_three) {			echo	'<div id="messages" class="tab-pane">';
																	$this->recipe_loop($recipe_tab_three);
			echo									'</div>
													</div> 
													 <!-- end of block div -->';
			}
										echo	'<div class="bot-border"></div>
											</div><!-- end of tabed div -->
									<!-- end of fav-recipes widget -->';	
	
	
	endif;
	}
	

/********* Recipe Sidebar Tabs Widget Loop *********/

	function recipe_loop($loop_type = 'popular_posts'){
			
			$args = array('post_type'=>'recipe');
			$args['posts_per_page'] = 3;
			
			if($loop_type == 'popular_posts'){				$args = array(										'post_type' => 'recipe',										'posts_per_page' => 3,										'orderby' => 'meta_value_num',										'meta_key' => 'rating_array',										'meta_value' => 'a:1:{i:0;i:5;}',										'order' => 'DESC',										'orderby' => 'rand'											);					
					//$args['orderby'] = 'comment_count';
			}
			
			if($loop_type == 'random'){
					$args['orderby'] = 'rand';
			}
			
			$get_posts_query = new WP_Query($args);
			
			if($get_posts_query->have_posts()): 
					while($get_posts_query->have_posts()): 
					$get_posts_query->the_post();
					global $post;
						?>
							<div class="spicy">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('sidebar-tabs'); ?></a>
									<div class="spicy_text">
									<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		                            <p class="rate">
											<?php the_recipe_rating($post->ID); ?>
											(<?php echo get_avg_rating($post->ID); ?> / 5)
									</p>
									</div>
							</div>			                         						
						<?php		
					endwhile; 
			endif;
	}
	
	
/********* Starting Recipe Sidebar Tabs Widget Admin Form *********/
		
	function form($instance) 
	{	
		$instance = wp_parse_args( (array) $instance, array('title' => 'MISC Recipes',
															'tab_title_one' => 'Recent',
															'tab_title_two' => 'Popular',
															'tab_title_three' => 'Random', 
															'recipe_tab_one' => 'recent_posts',
															'recipe_tab_two' => 'popular_posts',
															'recipe_tab_three' => 'random' ) );
		
        $title= esc_attr($instance['title']);
		
		$tab_title_one =  esc_attr($instance['tab_title_one']);
		$tab_title_two =  esc_attr($instance['tab_title_two']);
		$tab_title_three =  esc_attr($instance['tab_title_three']);		
		
		$recipe_tab_one = $instance['recipe_tab_one'];
		$recipe_tab_two = $instance['recipe_tab_two'];
		$recipe_tab_three = $instance['recipe_tab_three'];
		
		?>
          	<p>
	            	<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
	                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	        </p>
			<p>
	            	<label for="<?php echo $this->get_field_id('tab_title_one'); ?>"><?php _e('First Tab Title', 'FoodRecipe'); ?></label>
	            	<input class="widefat" id="<?php echo $this->get_field_id('tab_title_one'); ?>" name="<?php echo $this->get_field_name('tab_title_one'); ?>" type="text" value="<?php echo $tab_title_one; ?>" />
	        </p>
            <p>
	            	<label for="<?php echo $this->get_field_id('tab_title_two'); ?>"><?php _e('Second Tab Title', 'FoodRecipe'); ?></label>
	            	<input class="widefat" id="<?php echo $this->get_field_id('tab_title_two'); ?>" name="<?php echo $this->get_field_name('tab_title_two'); ?>" type="text" value="<?php echo $tab_title_two; ?>" />
	        </p>
            <p>
	            	<label for="<?php echo $this->get_field_id('tab_title_three'); ?>"><?php _e('Third Tab Title', 'FoodRecipe'); ?></label>
	            	<input class="widefat" id="<?php echo $this->get_field_id('tab_title_three'); ?>" name="<?php echo $this->get_field_name('tab_title_three'); ?>" type="text" value="<?php echo $tab_title_three; ?>" />
	        </p>
			<p> 
					<label for="<?php echo $this->get_field_id('recipe_tab_one'); ?>"><?php _e('First Tab Posts View', 'FoodRecipe'); ?></label>
	                <select name="<?php echo $this->get_field_name('recipe_tab_one'); ?>" id="<?php echo $this->get_field_id('recipe_tab_one'); ?>">
		                	<option value="recent_posts"<?php selected( $instance['recipe_tab_one'], 'recent_posts' ); ?>><?php _e('Recent Posts', 'FoodRecipe'); ?></option>
		                    <option value="popular_posts"<?php selected( $instance['recipe_tab_one'], 'popular_posts' ); ?>><?php _e('Most Popular Posts', 'FoodRecipe'); ?></option>
		                    <option value="random"<?php selected( $instance['recipe_tab_one'], 'random' ); ?>><?php _e('Random Recipes', 'FoodRecipe'); ?></option>
	                </select>
			</p>
            <p> 
					<label <?php echo $this->get_field_id('recipe_tab_two'); ?>><?php _E('Second Tab Posts View', 'FoodRecipe'); ?></label>
	                <select name="<?php echo $this->get_field_name('recipe_tab_two'); ?>" id="<?php echo $this->get_field_id('recipe_tab_two'); ?>">
		                	<option value="recent_posts" <?php selected( $instance['recipe_tab_two'], 'recent_posts' ); ?>><?php _e('Recent Posts', 'FoodRecipe'); ?></option>
		                    <option value="popular_posts"<?php selected( $instance['recipe_tab_two'], 'popular_posts' ); ?>><?php _e('Most Popular Posts', 'FoodRecipe'); ?></option>
		                    <option value="random"<?php selected( $instance['recipe_tab_two'], 'random' ); ?>><?php _e('Random Recipes', 'FoodRecipe'); ?></option>
	                </select>
			</p>
            <p> 
					<label<?php echo $this->get_field_id('recipe_tab_three'); ?>><?php _e('Third Tab Posts View', 'FoodRecipe'); ?></label>
	                <select name="<?php echo $this->get_field_name('recipe_tab_three'); ?>" id="<?php echo $this->get_field_id('recipe_tab_three'); ?>">
		                	<option value="recent_posts"<?php selected( $instance['recipe_tab_three'], 'recent_posts' ); ?>><?php _e('Recent Recipes', 'FoodRecipe'); ?></option>
		                    <option value="popular_posts"<?php selected( $instance['recipe_tab_three'], 'popular_posts' ); ?>><?php _e('Most Popular Recipes', 'FoodRecipe'); ?></option>
		                    <option value="random"<?php selected( $instance['recipe_tab_three'], 'random' ); ?>><?php _e('Random Recipes', 'FoodRecipe'); ?></option>
	                </select>
			</p>

		<?php
	}
	

/********* Starting Recipe Sidebar Tabs Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['tab_title_one'] = strip_tags($new_instance['tab_title_one']);
			$instance['tab_title_two'] = strip_tags($new_instance['tab_title_two']);
			$instance['tab_title_three'] = strip_tags($new_instance['tab_title_three']);
			$instance['recipe_tab_one']  = $new_instance['recipe_tab_one'];
			$instance['recipe_tab_two']  = $new_instance['recipe_tab_two'];	
			$instance['recipe_tab_three']  = $new_instance['recipe_tab_three'];	
			
	        return $instance;
    }
	
}