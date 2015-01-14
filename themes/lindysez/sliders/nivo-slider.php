						<!-- SLIDER STARTS HERE -->
                        <div id="slider" class="nivo-container">
								<div class="nivo-slider">
										<?php

											$nivo_recipe_ids = array();
											$nivo_recipe_image = array();
											
											if ( function_exists( 'ot_get_option' ) )
											{
											 
												 $slides = ot_get_option( 'nivo_image_slider', array() );
												 
												 if ( ! empty( $slides ) ) 
												 {
													 
													 	  $caption = 1;
														  foreach( $slides as $slide ) 
														  {	
																$nivo_recipe_image[] = $slide['nivo_image'];																																
																$nivo_slider_args = array( 'post_type'=> array('post','recipe') , 'posts_per_page' => 1, 'post__in' => array($slide['id']) );
																$nivo_slider_query = new WP_Query( $nivo_slider_args );
																if ( $nivo_slider_query->have_posts() ) 
																while ( $nivo_slider_query->have_posts() ):
																		$nivo_slider_query->the_post();
																		?>																	
																		<div id="caption_<?php echo $caption; ?>" class="nivo-html-caption">
																				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
																				<p><?php echo word_trim(get_the_excerpt(),40,'...'); ?></p>
																		</div>
																		<?php
																		$caption++;
																endwhile;															
														  }
														  
														  ?>
														  <div class="nivo-slides">
														  <?php
														  $caption = 1;
														  foreach( $slides as $slide ) 
														  {	
																$nivo_slider_args = array( 'post_type'=> array('post','recipe') , 'posts_per_page' => 1, 'post__in' => array($slide['id']) );
																$nivo_slider_query = new WP_Query( $nivo_slider_args );
																if ( $nivo_slider_query->have_posts() ) 
																while ( $nivo_slider_query->have_posts() ) : 
																			$nivo_slider_query->the_post();
																			?>
																			<a href="<?php the_permalink(); ?>"><img src="<?php echo $slide['nivo_image']; ?>" title="#caption_<?php echo $caption; ?>" alt="<?php the_title(); ?>" /></a>
																			<?php
																			$caption++;
																endwhile;
														  }
														  ?>
														  </div>
														  <?php
												  }
											  
											}
											?>										
								</div>
						</div><!-- end of Slider div -->
            			<!-- SLIDER AREA ENDS HERE -->