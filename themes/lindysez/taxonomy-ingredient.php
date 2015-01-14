<?php get_header(); ?>
					<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">				

								<h1><?php 
									$current_term = get_term_by( 'slug', get_query_var('term') ,'ingredient' );								
									echo __('Recipes With Ingredient:','FoodRecipe').' <span>'.$current_term->name.'</span>'
								?></span></h1>
                                
								<span class="w-pet-border"></span>
								<?php 								
									if (have_posts()): 
										while (have_posts()) : 
											the_post();											
												get_template_part( 'inc/recipe-post' );	
										endwhile;  
									else : 
								?>
								
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Recipe Found !', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
								
								<?php endif; ?>
								<div style='clear:both;'></div>
								<?php 
									// Pagination
									theme_pagination( $wp_query->max_num_pages); 					
								?> 
					</div>
						<!-- LEFT AREA ENDS HERE -->
	
					<?php get_sidebar(); ?>
			</div>
		</div>	       
	</div>	           
</div>

<?php get_footer(); ?>
