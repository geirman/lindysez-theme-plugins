<?php get_header(); ?>
<!-- CG: index.php -->
<?php

$page_id=get_queried_object_id(); 
$page_data = get_page($page_id);

?>

						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
							<h1><?php echo $page_data->post_title;?></h1>
							
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
										<h2 class="post-title"><?php _e('No Post Found !', 'FoodRecipe') ?></h2>
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