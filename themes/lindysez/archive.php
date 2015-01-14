<?php 
get_header(); ?>

		<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
							<!-- CG: Archive.php -->				
							 	  	<?php 
									//$post = $posts[0]; // Hack. Set $post so that the_date() and the_time() works.
																		
																	
									if (is_category()) 
									{ 
										?>
										<h1><?php _e('All posts in ', 'FoodRecipe'); echo  '<span>'.single_cat_title('',false).'</span>'; ?></h1>
							 	  		<?php 
									} 
									elseif( is_tag() ) 
									{ 
										?>
										<h1><?php _e('All Recipes and Posts Tagged ', 'FoodRecipe'); echo '<span>'.single_tag_title('',false).'</span>'; ?></h1>
							 	  		<?php 
										// to add recipe post type in default query and update posts_per_page accordingly to avoid 404 error 
										global $wp_query;										
										$old_max_num_page = intval($wp_query->max_num_pages);										
										$args = array_merge( $wp_query->query, array( 'post_type' => array( 'post', 'recipe') ) );										
										query_posts( $args );	
																				
										$new_found_posts = intval($wp_query->found_posts);	
										if($old_max_num_page > 0)
										{									
											$posts_per_page  = intval(ceil($new_found_posts / $old_max_num_page));	
										}
										else
										{
											$posts_per_page  = $new_found_posts ;	
										}
										$args = array_merge( $wp_query->query, array( 'posts_per_page' => 6 ) );										
										query_posts( $args );
									} 
									elseif (is_day()) 
									{ 
										?>
										<h2><?php _e('Archive for', 'FoodRecipe') ?> <span><?php printf( __( '%s', 'FoodRecipe' ), get_the_date() ); ?></span></h2>
							 	 	 	<?php 
									} 
									elseif (is_month()) 
									{ 
										?>
												<h2><?php _e('Archive for', 'FoodRecipe') ?> <span><?php printf( __( '%s', 'FoodRecipe' ), get_the_date('F Y') );  ?></span></h2>
							 			<?php
									} 
									elseif (is_year()) 
									{ 
										?>
												<h2><?php _e('Archive for', 'FoodRecipe') ?> <span><?php printf( __( '%s', 'FoodRecipe' ), get_the_date('Y') ); ?></span></h2>
								  		<?php 
									} 
									elseif (is_author()) 
									{
										if(get_query_var('author_name')) :
												$curauth = get_userdatabylogin(get_query_var('author_name'));
										else :
												$curauth = get_userdata(get_query_var('author'));
										endif;
										?>
											<h2><?php _e('All Recipes and Posts by', 'FoodRecipe') ?> <span><?php echo $curauth->display_name; ?></span></h2>
							 	  		<?php
										// to add recipe post type in default query and update posts_per_page accordingly to avoid 404 error 
										global $wp_query;										
										$old_max_num_page = intval($wp_query->max_num_pages);										
										$args = array_merge( $wp_query->query, array( 'post_type' => array( 'post', 'recipe') ) );										
										query_posts( $args );											
										$new_found_posts = intval($wp_query->found_posts);										
										if($old_max_num_page > 0)
										{									
											$posts_per_page  = intval(ceil($new_found_posts / $old_max_num_page));	
										}
										else
										{
											$posts_per_page  = $new_found_posts ;	
										}									
										$args = array_merge( $wp_query->query, array( 'posts_per_page' => $posts_per_page ) );										
										query_posts( $args );										
																									
									} 
									elseif (isset($_GET['paged']) && !empty($_GET['paged'])) 
									{ 
										?>
											<h2><?php _e('Blog Archives', 'FoodRecipe') ?></h2>
							 	  		<?php
									} 
									?>
								
                        		
								<?php 								
									if (have_posts()): 
										while (have_posts()) : 
											the_post(); 
										
											$post_type = get_post_type( $post->ID );
											if($post_type == 'recipe')
											{
												get_template_part( 'inc/recipe-post' );											
											}
											else
											{
												get_template_part( 'inc/standard-post' );
											}
										
										endwhile;  
									else : 
								?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Recipe or Post Data Found', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
								<div style='clear:both;'></div>	
								<?php 
									// Pagination
									theme_pagination( $wp_query->max_num_pages); 					
								?>            
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
	
					<?php get_sidebar(); ?>
				</div>
			</div>	       
		</div>             
	</div>	

<?php get_footer(); ?>
