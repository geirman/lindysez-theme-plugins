<?php
	global $post;
		
	$skipper = $post->ID;
	
	$recipe_type_slugs = array();	
	$recipe_type_terms = get_the_terms( $post->ID, 'recipe_type' );		
	if( $recipe_type_terms && !is_wp_error( $recipe_type_terms ))
	{												
		foreach($recipe_type_terms as $term)
		{
			$recipe_type_slugs[] = $term->slug;
		}
	}
	
	$cuisine_slugs = array();	
	$cuisine_terms = get_the_terms( $post->ID, 'cuisine' );		
	if( $cuisine_terms && !is_wp_error( $cuisine_terms ))
	{												
		foreach($cuisine_terms as $term)
		{
			$cuisine_slugs[] = $term->slug;
		}
	}
	
	$more_recipe_args = array(
							'post_type' => 'recipe',
							'posts_per_page' => 5,
							'post__not_in' => array($skipper),
							'tax_query' => array(
												'relation' => 'OR',
												array(
													'taxonomy' => 'recipe_type',
													'field' => 'slug',
													'terms' => $recipe_type_slugs
												),
												array(
													'taxonomy' => 'cuisine',
													'field' => 'slug',
													'terms' => $cuisine_slugs
												)
											),
							'meta_query' => array(
													array(
													 'key' => '_thumbnail_id',
													 'value' => '0',
													 'compare' => '>',
													 'type' => 'NUMERIC'
													)
											)
							);
							
	$more_recipe_query = new WP_Query($more_recipe_args);
	
	if($more_recipe_query->post_count > 0 )
	{
		?>
	    <div class="more-recipe">
	            <h5><?php _e('Related Recipes:', 'FoodRecipe');?></h5>
	            <div class="recipe-imgs">
	                    <div class="more-recipes">
								<ul>
								<?php 											
								if ( $more_recipe_query->have_posts() ) 
									while ( $more_recipe_query->have_posts() ) : 
										$more_recipe_query->the_post();										
										?>	                                    
										<li>
												<a href="<?php the_permalink(); ?>">
													<?php the_post_thumbnail('recipe-4column-thumb'); ?>
												</a>
												<p class="info-box"><?php the_title() ?></p>
										</li>
										<?php 
									endwhile; 																			
								?>
								</ul>
			            </div>
	                    <span class="prev"></span>
	                    <span class="next"></span>
	            </div><!-- end of recipe-imgs div -->
	    </div><!-- end of more-recipe div -->
	    <?php
	}
	wp_reset_postdata();
?>