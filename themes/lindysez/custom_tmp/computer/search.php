						<div class="col-md-12 desk_search">					
						<h3 class="head-pet"><?php _e('Site <span>Search</span>', 'FoodRecipe');?></h3>
						<div class="search_form">
							<form action="<?php echo home_url(); ?>" id="searchform">
									<p>
											<input type="text" name="s" id="s" class="field" placeholder="<?php _e('Search for', 'FoodRecipe');?>" />
											<input type="submit" name="s_submit" id="s-submit" value="" />
									</p>
							</form>
						</div>
						<p class="statement"><span class="fireRed"><?php _e('Browse by Category', 'FoodRecipe');?>:</span>
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
											/*if($count > 5)
												$the_limit = 5;
											else*/
											$the_limit = $count;
											foreach ( $terms as $term ) {
												?>
													<a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a>
												<?php
												$the_limit--;
												if($the_limit < 1) { break; } else { echo '| '; }
											}
									}
								?>
                        </p>
						</div>	