<?php
/* 
* Template Name: Home Page (Recent Recipes)
*/ 
get_header(); 
					
						if ( function_exists( 'ot_get_option' ) ) {
							$slider_type = ot_get_option( 'slider_type');
						}
						
						if($slider_type == "Thumbnail Slider")
						{
								get_template_part( 'sliders/thumb-slider' );
						}
						elseif($slider_type == "Nivo Slider")
						{
								get_template_part( 'sliders/nivo-slider' );
						}
						elseif($slider_type == "Basic Slider")
						{
								get_template_part( 'sliders/basic-slider' );
						}
						elseif($slider_type == "Accordion Slider")
						{
								get_template_part( 'sliders/accordion-slider' );
						}						
						else
						{
								get_template_part( 'sliders/right-info-slider' );
						}
                        
                        ?>
                        
                        
                        <div id="left-area" class="clearfix full-wide homepage">
                        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>                                
                                    <div <?php post_class(); ?> id="page-<?php the_ID(); ?>">
                                            <?php												
                                                the_content();
                                            ?>
                                    </div><!-- end of post div -->								
								<?php endwhile; ?>                                
								<?php endif; ?>                                          						
                        </div><!-- end of left-area -->
                        
                        
                        <!-- Home Page Whats Hot Recipe Area -->                        
			            <div id="whats-hot">
			            		<h2 class="w-bot-border"><?php _e("Latest", 'FoodRecipe'); ?> <span><?php _e('Recipes', 'FoodRecipe'); ?></span></h2>
			                
				                <ul class="cat-list clearfix">
                                		<?php                                        												

											$recent_recipes_args = array( 'post_type'=>'recipe', 'posts_per_page' => 4 );
											
											$recent_recipes = new WP_Query( $recent_recipes_args );
											
											if ( $recent_recipes->have_posts() ):
												while ( $recent_recipes->have_posts() ) : 
													$recent_recipes->the_post(); 	
																																																								
															?>
										                	<li>
																	<?php
																	$terms = get_the_terms( $post->ID, 'recipe_type' );														
																	if ( $terms && !is_wp_error( $terms ) ) : 
																	
																			$first_term;												
																			foreach($terms as $term)
																			{
																					$first_term = $term;
																					break;
																			}
																			?>
																			<h3><a href="<?php echo get_term_link($first_term->slug, 'recipe_type' ); ?>"><?php echo $first_term->name; ?></a></h3>
																			<?php
																	else:
																			?>
																			<h3><a href="#">&nbsp;</a></h3>
																			<?php
																	endif;
																	?>											                    	
											                        <a href="<?php the_permalink(); ?>" class="img-box">
																		<?php the_post_thumbnail('recipe-4column-thumb'); ?>
																	</a>
											                        <h4>
																		<a href="<?php the_permalink(); ?>">
																			<?php echo word_trim(get_the_title(), 4, '...'); ?>
																		</a>
																	</h4>
											                        <p>
																		<?php echo word_trim(get_the_excerpt(), 24, ''); ?>
																			<a href="<?php the_permalink(); ?>"><?php _e('...more', 'FoodRecipe'); ?>
																		</a>
																	</p>					                                               
										                    </li>
					                                         <?php															 												 													
												endwhile;
											endif;
									?>
				                </ul>
			                
			            </div><!-- end of whats-hot div -->
            
            			<span class="w-pet-border"></span>
            
			            <div id="home-infos" class="clearfix">
				            	<?php if ( ! dynamic_sidebar( 'Homepage Bottom Bar' )) : ?>	                          
				                <?php endif; ?>
			            </div><!-- end of home-infos div -->
            

<?php get_footer(); ?>