					<div class="col-md-8 reciepe_paragraph custom_left">
																			
							<?php the_content(); ?>	
						<Br/>
							<!-- Share Icons -->
							<?php //get_template_part('inc/share'); ?>
							<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?>	<br/>						
							<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
							<div class="recipe-tags clearfix">
									
									<span class="type"><?php echo get_the_term_list( $post->ID, 'recipe_type', __(' Recipe Type: ', 'FoodRecipe'), ', ', ''); ?></span>
									<span class="tags"><?php the_tags(__('Tags: ', 'FoodRecipe'),', ',''); ?> </span>
									<span class="ingredient"><?php echo get_the_term_list( $post->ID, 'ingredient', __(' Ingredients: ', 'FoodRecipe'), ', ', ''); ?></span>
							</div>
																				

							
							<div class="comments no-print">
									<?php comments_template('',true); ?>
							</div><!-- end of comments div -->
					
					</div><!-- end of info-left div -->