  						
						<!-- SLIDER STARTS HERE -->
							<div class=" col-xs-12 col-sm-12 col-md-12 slider_featured">
								<div class="slider_title">
									<img src="<?php echo get_template_directory_uri(); ?>/images/slider-heading.png" alt="Hand Picked Recipes" />
									
								<p class="slogan">
									<?php 
									if ( function_exists( 'ot_get_option' ) )
									{
										echo ot_get_option( 'b_slider_statement' );
									}
									?>
								</p>
								</div>									
							<div style='clear:both;'></div>
							<div class=" visible-sm col-sm-12 tab_heading">
								"Baby, it's coul outside! Let's make something warm and delicious."		
							</div>		
					
							<!-- SLIDER STARTS HERE -->
							<div id="slider" class='basic_slider'>
									
									<div class="slides basic">
											<ul>
													<?php	
														if ( function_exists( 'ot_get_option' ) )
														{
															$slides = ot_get_option( 'basic_image_slider', array() );
															  
															if ( ! empty( $slides ) ) 
															{		 
																foreach( $slides as $slide ) 
																{	
																		$bs_slider_args = array( 'post_type'=> array('post','recipe') , 'posts_per_page' => 1, 'post__in' => array($slide['id']) );
																		
																		$bs_slider_query = new WP_Query( $bs_slider_args );
																		if ( $bs_slider_query->have_posts() ) 
																		while ( $bs_slider_query->have_posts() ) : 
																			$bs_slider_query->the_post();
																				?>
																				<li>
																						<img src="<?php echo $slide['image']; ?>" alt="<?php the_title(); ?>" />
																						<div class="about">
																								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
																								<p><?php echo word_trim(get_the_excerpt(),28,'...'); ?></p>
																								<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
																						</div>
																				</li>
																				<?php
																		endwhile;  
																}
															}
														}																										
												?>
											
											</ul>
											<p class="sliderNav"><span></span></p>
									</div><!-- end of slides -->
							</div><!-- end of Slider div -->
							<!-- SLIDER AREA ENDS HERE -->
					</div>
					</div>
				</div>
		
											
						
						
