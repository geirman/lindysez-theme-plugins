						<!-- CG: /inc/recipe-single-col3.php -->	
						<div id="left-area" class="clearfix hrecipe" itemscope itemtype="http://schema.org/Recipe">
                        		
                                <!-- Starting Default Loop (Sidebar Template) -->                        		
								<?php if (have_posts()) while (have_posts()) : the_post(); ?>
								
	                            		<h1 class="title fn" itemprop="name" ><?php the_title(); ?></h1>
										<!-- for Schema.org microdata -->
										<meta itemprop="datePublished" content="<?php the_time('Y-m-d'); ?>" />
										<span class="published"><?php the_time('Y-m-d'); ?></span>
										<meta itemprop="image" content="<?php 
																		$image_id = get_post_thumbnail_id();
																		$image_url = wp_get_attachment_image_src($image_id,'recipe-listing', true);
																		echo $image_url[0];
																		?>" /> 										
										
										<!-- Recipe Categorization Information -->
										<ul class="recipe-cat-info clearfix">
											<li>
												<?php echo get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <br />', 'FoodRecipe'), ', ', ''); ?>
											</li>
											<li>
												<?php echo get_the_term_list( $post->ID, 'course', __(' Course: <br />', 'FoodRecipe'), ', ', ''); ?>
											</li>
											<li>
												<?php echo get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <br />', 'FoodRecipe'), ', ', ''); ?>
											</li>
											<li>
												<?php echo get_the_term_list ( $post->ID, 'cooking_method', __('Cook Method: <br />', 'FoodRecipe'), '', '', ''); ?>
											</li>
										</ul>
										
										
										<!-- Recipe Single Image -->
										<?php 												
																				
										$recipe_images = get_post_meta($post->ID, 'RECIPE_META_more_images_recipe');
										$images_count = count($recipe_images);
										if($images_count > 0) 
										{
										
										?>	
		  								<div class="single-img-box">
		  										<div class="single-slider" >
                                                		<?php
																foreach($recipe_images as $image)
																{
																	echo wp_get_attachment_image($image, 'thumbnail-blog', false, array( 'class' => 'photo' ));
																}

														?>
		  										</div>
		  										<div class="img-nav"></div>
		  								</div>										
										<?php
										}
										?>			
													
										<!-- Recipe Information -->
										<ul class="recipe-info clearfix">
											  <?php
									
												$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
												$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
												
												$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
												$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
												$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));												
												
												if(!empty($yield))
												{
														?>
														<li class="yield">
															<strong class="name"><?php _e('Yield :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $yield; ?></span>
														</li>
														<?php
												}
												
												if(!empty($servings))
												{
														?>
														<li class="servings">
															<strong class="name"><?php _e('Servings :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $servings; ?></span>
														</li>
														<?php
												}
												
												if(!empty($prep_time) )
												{
														?>
														<li class="prep-time">
															<strong class="name"><?php _e('Prep Time :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $prep_time; ?></span>
														</li>
														<?php
												}
												
												if(!empty($cook_time))
												{
														?>
														<li class="cook-time">
															<strong class="name"><?php _e('Cook Time :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $cook_time; ?></span>
														</li>
														<?php
												}
												
												if(!empty($ready_in))
												{
														?>
														<li class="ready-in">
															<strong class="name"><?php _e('Ready In :','FoodRecipe'); ?></strong>
															<span class="value"><?php echo $ready_in; ?></span>
														</li>
														<?php
												}
												
												?>
										</ul>
										
										<span class="w-pet-border"></span>
										                                      
		  								<div class="info-left instructions" itemprop="about">												  												  
												<!-- Share Icons -->
												<?php get_template_part('inc/share'); ?>												  
                                                
                                                <?php the_content(); ?>
												  
												  <div class="recipe-tags clearfix">
														<span class="type"><?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: ', 'FoodRecipe'), ', ', ''); ?></span>
														<span class="tags"><?php the_tags(__('Tags: ', 'FoodRecipe'),', ',''); ?> </span>
														<span class="ingredient"><?php echo get_the_term_list( $post->ID, 'ingredient', __(' Ingredients: ', 'FoodRecipe'), ', ', ''); ?></span>

												  </div>
												  
		  								</div><!-- end of info-left div -->
		  								
		  								<div class="info-right">
		  										
												<!-- Cook Info -->
												<?php get_template_part('inc/cook-info'); ?>																								
														
												<!-- Rating Icons -->
												<?php get_template_part('inc/rating'); ?>

												<!-- YouTube Video -->
												<?php get_template_part('inc/video'); ?>												
                                                
                                                 <!-- Including Nutritional Info part -->
												<?php get_template_part('inc/nutritional-info'); ?>

		  								
		  								</div><!-- end of info-right div -->
										
		  								<span class="w-pet-border"></span>
                                        
		  								<?php endwhile; ?>

                                        
		  						<h3 class="blue"><?php _e('Recipe Comments ', 'FoodRecipe');?></h3>
		  						<span class="w-pet-border"></span>
		  						
                                <!-- Default Comments -->	
                                <div class="comments">
                                		<?php comments_template('',true); ?>
                                </div><!-- end of comments div -->
                                
						</div><!-- end of left-area (Recipe Template with Sidebar) -->
	
                        <div id="sidebar">
								<?php if ( ! dynamic_sidebar( 'Recipe Sidebar' )) : ?>
			                            
						        <?php endif; ?>
                        </div>