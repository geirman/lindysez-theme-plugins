
<!-- CG: taxonomy-tip_type.php -->
<?php get_header(); ?>
						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">					
								<h1>							
								<?php 
									$tips = get_term_by( 'slug', get_query_var('term') ,'tip_type' );								
									echo 'Tip Tag: <span>'.$tips->name.'</span>';
								?>
								</h1>
								
								<?php 								
										if (have_posts()): 
											while (have_posts()) : 
												the_post(); 												
													get_template_part( 'inc/list-tips' );											
																							
											endwhile;  
										else : 
								?>
								
								<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Tips &amp; Tricks Found !', 'FoodRecipe') ?></h2>
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
