								
								<div class="reciepe_main_internal">	
																		
			<?php 
				if(has_post_thumbnail()) 
				{
					$image_id = get_post_thumbnail_id();
						if($image_id)
						{				
						?>
							<div class="all_rec">
							<a class="fancybox post_image" rel="gallery" title="<?php the_title(); ?>" href="<?php 
												$image_id = get_post_thumbnail_id();
												if($image_id)
												{
													$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
													echo $image_url[0];
												}
										?>">
												<?php //the_post_thumbnail('thumbnail-blog'); ?>
												<? echo do_shortcode('[responsive_shortcode imageid="'.$image_id.'" img_size="900=>250&212--780=>300&207--300=>300&197"]'); ?>
							 </a>						
							</div>
								<?php
						}
				}	
			?>
										<div class="reciepe_internal_text">
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												
												<h5>
													<?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: <span>', 'FoodRecipe'), ', ', ''); ?></span>
													<?php the_tags(__('Tags: <span>', 'FoodRecipe'),', ',''); ?>
												</h5>
												
												<div class="rating">
														<?php the_recipe_rating($post->ID); ?>
														<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
												</div>
												
												<p><?php echo word_trim(get_the_excerpt(),20,' ...'); ?></p>
												
												<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
										</div>
								</div><!-- end of post div -->