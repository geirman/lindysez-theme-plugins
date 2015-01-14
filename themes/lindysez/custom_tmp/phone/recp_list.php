		<!-- Only For Mobile -->
		<div class="col-xs-12 reciepe_type_main">
		<h3>Recipe <span>Types</span></h3>
						<?php
							$terms = get_terms("recipe_type");
							$count = count($terms);
							if ( $count > 0 ){
								echo '<ul>';	
								$the_limit='1';	
									foreach ( $terms as $term ) {
									
										if($the_limit=='5') { 
											echo '<li class="reciepe_list_more more_recipe_li" ><a class="more load_more_recipe">More</a></li>';
										 }
										 if($the_limit>4): ?>
											<li class='hide_currently' ><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
										<?
										else: ?>
											<li><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
										<?
										endif;
										
										$the_limit++; 
									}
								echo '</ul>';	
							}
						?>	
				
		</div>