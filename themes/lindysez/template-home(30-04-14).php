<?php
/* 
* Template Name: Home Page (What's Hot)
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
    
	<div class="wrapper">	
		  <div class="container-fluid reciepe_type">
			<div class="row">
					
				<!-- Only For Mobile -->
				<div class="visible-xs col-xs-12 reciepe_type_main">
				<h3>Recipe <span>Types</span></h3>
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
										echo '<ul>';	
										$the_limit='1';	
											foreach ( $terms as $term ) {
												?>
												<li><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
												<?php
												$the_limit++;
												if($the_limit>4) { 
												echo '<li  class="reciepe_list_more"><a class="more" href="'.get_permalink('2110').'">More</a></li>';
												break; }
											}
										echo '</ul>';	
									}
								?>	
						
				</div>
				
				<!-- CG: all_recipe.php Tab View -->	
				<div class=" visible-sm col-sm-12 reciepe_type_main">
					<h3>Recipe <span>Types</span></h3>				
						<?php
							$terms = get_terms("recipe_type");
							$count = count($terms);
							if ( $count > 0 ){
								echo '<ul>';	
								$the_limit='0';	
									foreach ( $terms as $term ) {
										?>
										<li class="<?=($the_limit%3=='0')?'':'reciepe_list';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
										<?php
										$the_limit++;
										if($the_limit>7) { 
										echo '<li  class="reciepe_list_more"><a class="more" href="'.get_permalink('2110').'">More</a></li>';
										break; }
									}
								echo '</ul>';	
							}
						?>						
				</div>				
					
			</div>
		</div>		
			<div class="container-fluid hot_spicy">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 whats_hot">
			            		<h2><?php _e("What's", 'FoodRecipe'); ?> <span><?php _e('Hot', 'FoodRecipe'); ?></span></h2>
			               
				                
                                		<?php
                                        	
											$whats_hot = array();

											if ( function_exists( 'ot_get_option' ) )
											{
												$whats_hot[] = intval(ot_get_option( 'whats_hot1' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot2' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot3' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot4' ));
											}

											$whats_hot_args = array( 'post_type' => 'recipe', 'posts_per_page' => 4, 'post__in' => $whats_hot );
											
											$whats_hot_query = new WP_Query( $whats_hot_args );
											
											if ($whats_hot_query->have_posts()): $srr='0';
												while ($whats_hot_query->have_posts()) : 
													$whats_hot_query->the_post(); 	
																																																								
															?>
										                	<div class="hottest <?=($srr=='0')?'':'hottest_dish';?> <?=($srr>'2')?'hottest_tablet':'';?>">
																	<div class="hottest_image">
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
																		<a href="<?php the_permalink(); ?>">
																			<?php the_post_thumbnail('recipe-4column-thumb'); ?>
																		</a>
																		<div style='clear:both;'></div>
																	</div>
																	<div class="hottest_text">
											                        <h4>
																		<a href="<?php the_permalink(); ?>">
																			<?php echo word_trim(get_the_title(), 4, '...'); ?>
																		</a>
																		<div style='clear:both;'></div>
																	</h4>
											                        <p>
																		<?php echo word_trim(get_the_excerpt(), 18, ''); ?>
																			<a href="<?php the_permalink(); ?>"><?php _e('...more', 'FoodRecipe'); ?>
																		</a>
																	</p>
																	</div>	
										                    </div>
					                                         <?php															 												 													
												$srr++;
												endwhile;
											endif;
									?>
									<div class='more_recipe'>
										<a href="<?php echo get_permalink('9'); ?>" class="readmore">Load More</a>
									</div>
							</div> 
			            </div>
					</div>
					
				<!-- end of whats-hot div -->
				<div class="container-fluid reciepe_main_section">
					<div class="row">
						<?php if ( ! dynamic_sidebar('Homepage Bottom Bar' )) : ?>	                        
						<?php endif; ?>
					</div>	
				</div>
				<!-- end of home-infos div -->
			</div>
		</div>
		
		<!-- Only For Mobile -->
		<div class="container-fluid">
		  <div class="row">
					<div class="visible-xs">
						<div class="aktwal_inner">
							<div id="accordion2" class="accordion">
								<?php if ( ! dynamic_sidebar('Homepage Bottom Bar Mobile View' )) : ?>	                        
								<?php endif; ?>
							</div>
						</div>		
					</div>
		  </div>
		</div>	
		
<?php get_footer(); ?>