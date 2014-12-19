	<!-- For Desktop -->	
	<div class="col-md-12 slider_multiple_image">
			   <h1 class="title fn" itemprop="name" ><?php the_title(); ?></h1>	

						<!-- Recipe Categorization Information -->
						
							<h5>
								<?php echo get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', ''); ?></span>
							</h5>
							<h5>
								<?php echo get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', ''); ?></span>
							</h5>
							<h5>
								<?php echo get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', ''); ?></span>
							</h5>
							
					<div id="main">
						<?php 												
																
						$recipe_images = get_post_meta($post->ID, 'RECIPE_META_more_images_recipe');
						
						$images_count = count($recipe_images);
						if($images_count > 0) 
						{
							?>			                                        
								<div class="panel">
									<ul id="images">
													<?php																		
													foreach($recipe_images as $image)
													{
															?>
															<li>
																<a href="<?php $image_attributes = wp_get_attachment_image_src( $image, 'thumbnail-blog'); echo $image_attributes[0]; ?>">
																	<?php echo wp_get_attachment_image($image, 'single-carousel-thumb'); ?>
																</a>
															</li>
															<?php
													}																						
													?>                   
									</ul>
									
									<div id="controls"><div class="clear"></div></div>
									<div class="clear"></div>
								</div>
							<div id="exposure"></div>
							<?php 
						} 
						elseif(has_post_thumbnail()) 
						{
								?>
								<div class="single-imgs">
									<div class="single-img-box">
											<a  rel="prettyPhoto" title="<?php the_title(); ?>" 
												href="<?php 
														$image_id = get_post_thumbnail_id();
														$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
														echo $image_url[0];
														?>">					                                                	
												<?php the_post_thumbnail('thumbnail-blog', array( 'class'	=> 'photo' )); ?>
											</a>
									</div>
									<div id="horiz_container_outer" class="small-img-cont">
											<p class="info-msg msg-error"><span><?php _e('No more images found for this recipe!', 'FoodRecipe'); ?></span></p>
									</div>
								</div>
								<?php
						}
																								
						?>
					</div>											
						
							
							
	<!-- Recipe Information -->
	<h4>
		  <?php

			$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
			$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
			
			$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
			$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
			$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));	
			
			if(!empty($yield))
			{?>
				<?php _e('Yield :','FoodRecipe'); ?>
					<span class="value"><?php echo $yield; ?></span>									
					<?php
			}
			
			if(!empty($servings))
			{
					?>
					
						<?php _e('Servings :','FoodRecipe'); ?>
						<span class="value"><?php echo $servings; ?></span>
					
					<?php
			}
			
			if(!empty($prep_time))
			{
					?>
						<?php _e('Prep Time :','FoodRecipe'); ?>
						<span class="value"><?php echo $prep_time; ?></span>														
					<?php
			}
			
			if(!empty($cook_time))
			{
					?>
						<?php _e('Cook Time :','FoodRecipe'); ?>
						<span class="value"><?php echo $cook_time; ?></span>														
					<?php
			}
			
			if(!empty($ready_in))
			{
					?>
						<?php _e('Ready In :','FoodRecipe'); ?>
						<span class="value"><?php echo $ready_in; ?></span>														
					<?php
			}							
			?>
	</h4>											
							
	</div>

	