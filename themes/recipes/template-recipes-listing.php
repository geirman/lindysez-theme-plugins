<?php 
/*
* Template Name: Recipes Listing Template 
*/ 
	
get_header(); 

?>
				
			<!-- Only For Tablet -->	
			 <div class=" visible-sm col-sm-12  reciepe_type_main">
				<h3>Recipe <span>Types</span></h3>
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
										echo '<ul>';	
										$the_limit='0';	
											foreach ( $terms as $term ) {
												if($the_limit=='8') { 
														echo '<li  class="reciepe_list_more more_recipe_li"><a class="more load_more_recipe">More</a></li>';
												}
												
												if($the_limit>7): ?>
													<li class="hide_currently <?=($the_limit%3=='0')?'':'reciepe_list';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
											<?	else:?>
													<li class="<?=($the_limit%3=='0')?'':'reciepe_list';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
											<?	endif;
												$the_limit++;
											}
										echo '</ul>';	
									}
								?>				
			  </div>	
			  
				
			<!-- Only For Mobile -->	
			 <div class="col-xs-12 col-sm-8 hidden-sm  reciepe_type_main no_padding_bottom">
				<h3 class='mobile_list_recipe'>Recipe <span>Types</span></h3>
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
										echo '<ul>';	
										$the_limit='0';	
											foreach ( $terms as $term ) {
												if($the_limit=='3') { 
														echo '<li  class="reciepe_list_more more_recipe_li"><a class="more load_more_recipe">More</a></li>';
												}
												
												if($the_limit>2): ?>
													<li class="hide_currently <?=($the_limit%3=='0')?'':'';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
											<?	else:?>
													<li class="<?=($the_limit%3=='0')?'':'';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
											<?	endif;
												$the_limit++;
											}
										echo '</ul>';	
									}
								?>				
			  </div>
				
				
				<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">				
						
								<h1><?php the_title(); ?></span></h1>
                                
                        		<?php 
									$recipe_args = array( 'post_type'=>'recipe', 'posts_per_page' => 6, 'paged' => $paged );
									
									$recipe_query = new WP_Query( $recipe_args );
									
									if ( $recipe_query->have_posts() ) :
											while ( $recipe_query->have_posts() ) : 
											$recipe_query->the_post(); 	
								?>
                                
								<div class="reciepe_main_internal">	
										<?php 
												if(has_post_thumbnail($post->ID)) 
												{
													$image_id = get_post_thumbnail_id();
													$vid_url = get_post_meta($post->ID, 'RECIPE_META_video_url', true);
													if($image_id)
													{
													?>
													<div class="all_rec">
														<a class="fancybox" rel="gallery" title="<?php the_title(); ?>" href="<?php 
																		
																		
																			$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																			echo $image_url[0];
																		
																?>">
																		<? echo do_shortcode('[responsive_shortcode imageid="'.get_post_thumbnail_id($POST->ID).'" img_size="900=>250&212--780=>300&207--300=>300&197"]'); ?>
																		<?php //the_post_thumbnail('recipe-listing'); ?>
														</a>
														
													</div>
		                                        	<?php
													}
												}										
										?>
										<div class="reciepe_internal_text">
												<h3>
													<a href="<?php the_permalink(); ?>">
														<?php the_title(); ?>
														<?php
															
															if(!empty($vid_url)){
																echo ' <img src="'. get_stylesheet_directory_uri() .'/images/video.png" width="20" height="14" alt="This recipe has a video too!" title="This recipe has a video too!">';
															}
														?>														
													</a>
												</h3>
												
												<h5>
													<?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: <span>', 'FoodRecipe'), ', ', ''); ?></span>
													<?php echo get_the_term_list( $post->ID, 'cuisine', __(' Cuisine: <span>', 'FoodRecipe'), ', ', ''); ?></span>
												</h5>
												
												<div class="rating">
														<?php the_recipe_rating($post->ID); ?>
														<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
												</div>
												
												<p><?php echo word_trim(get_the_excerpt(),15,' ...'); ?></p>
												
												<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
										</div>
								</div><!-- end of post div -->
								
								<?php endwhile; ?>
							
                            	<?php else : ?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Recipes Found', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
									<div style='clear:both;'></div>
										<?php
											// Pagination
											theme_pagination( $recipe_query->max_num_pages); 					
										?>            
						 <!-- LEFT AREA ENDS HERE -->
					</div>	
						
					<!-- Right AREA Start HERE -->							
					<?php if ( ! dynamic_sidebar( 'Recipe Sidebar' )) : ?>
								
					<?php endif; ?>
						
			</div>
		</div>	       
	</div>	            
</div>

<?php get_footer(); ?>