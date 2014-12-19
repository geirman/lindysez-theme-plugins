<?php get_header(); ?>
						<!-- CG: search.php -->	
						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
                        		<h1><?php _e('Search Results For', 'FoodRecipe'); ?> <span><?php the_search_query(); ?></span></h1>
                                <span class="w-pet-border"></span><br />
                        		<?php
                        			get_template_part( 'inc/google_search_results');
                        		?> 								
						</div><!-- end of left-area -->
				        	<!-- LEFT AREA ENDS HERE -->
	
					<?php get_sidebar(); ?>
			</div>
		</div>	       
	</div>	           
</div>

<?php get_footer(); ?>