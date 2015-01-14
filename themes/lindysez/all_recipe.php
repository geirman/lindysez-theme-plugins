<?php 
/* 
* Template Name: All Recipe Types
*/ 
get_header(); 
?>

						<!-- CG: all_recipe.php Tab View -->	
                        <div class=" visible-sm col-sm-12 reciepe_type_main">
                        		<?php if (have_posts()) : 
									while (have_posts()) : the_post(); ?>
											<?php 
											$title = $post->post_title;
											if($title):
												$temp_title = explode(' ',$title);
												$first_letter = $temp_title[0];
														unset($temp_title[0]);
												$title_new = implode(' ', $temp_title);
												$title = $first_letter.' <span>'.$title_new.'</span>';	
												echo "<h1>".$title."<h1>";	
											endif;
											?>								
								<?php endwhile; ?>
                        		
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
										echo '<ul class="tab_ul">';	
										$the_limit='0';	
											foreach ( $terms as $term ) {
												?>
												<li class="<?=($the_limit%3=='0')?'':'reciepe_list';?>"><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
												<?php
												$the_limit++;
											}
										echo '</ul>';	
									}
								endif; ?>						
                        </div>
				       
 
						<!-- CG: all_recipe.php Mobile View -->	
                        <div class="visible-xs col-xs-12 reciepe_type_main">
                        		<?php if (have_posts()) : 
									while (have_posts()) : the_post(); ?>
											<?php 
											$title = $post->post_title;
											if($title):
												$temp_title = explode(' ',$title);
												$first_letter = $temp_title[0];
														unset($temp_title[0]);
												$title_new = implode(' ', $temp_title);
												$title = $first_letter.' <span>'.$title_new.'</span>';	
												echo "<h3>".$title."<h3>";	
											endif;
											?>								
								<?php endwhile; ?>
                        		
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
										echo '<ul class="mobile_ul">';	
										$the_limit='1';	
											foreach ( $terms as $term ) {
												?>
												<li><a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a></li>
												<?php
											}
										echo '</ul>';	
									}
								endif; ?>						
                        </div>
			</div>
		</div>			
				       
	</div>				
 </div>						
						
<?php get_footer(); ?>
