  	<?php global $device; ?>	
	
		<!-- SLIDER STARTS HERE -->
			<div class=" col-xs-12 col-sm-12 col-md-12 slider_featured">
				<div class="slider_title">
				<img src="<?php echo get_template_directory_uri(); ?>/images/slider-heading.png" alt="Hand Picked Recipes" />
				<p>
						<?php 
						if ( function_exists( 'ot_get_option' ) )
						{
							$slider_statement = ot_get_option('l_slider_statement');
							if(!empty($slider_statement))
							{
								echo $slider_statement;
							}
							else
							{
								echo "&nbsp;";
							}
						}										
						?>
				</p>
				</div>						 
				<div class="most-rated">
						<div class="item2">
								<?php
									$most_rated_args = array(
												'post_type' => 'recipe',
												'posts_per_page' => 1,
												'orderby' => 'meta_value_num',
												'meta_key' => 'rating_array',
												'meta_value' => 'a:1:{i:0;i:5;}',
												'order' => 'DESC',
												'orderby' => 'rand'	
												);
									$most_rated_query = new WP_Query($most_rated_args);
									if ( $most_rated_query->have_posts() ) 
									while ( $most_rated_query->have_posts() ) : 
									$most_rated_query->the_post();
								?>
								<a href="<?php the_permalink(); ?>" class="img-box">
									
									<?php the_post_thumbnail('most-rated-thumb'); ?>
								</a>
								<div class="item_text">
									<h5><a href="<?php the_permalink(); ?>"><?php echo word_trim(get_the_title(),5,'...'); ?></a></h5>
									<p><?php echo word_trim(get_the_excerpt(),5,'...'); ?></p>
									<p class="rate">
											<?php the_recipe_rating($post->ID); ?>
									</p>
								</div>
								<?php
									endwhile;
								?>
						</div>
				</div>
			</div>
			
			<? 	#Tab Heading			
				if($device=='tablet'): 
					get_template_part( 'custom_tmp/tablet/tab_head');
				endif;
				
			?>	
		
		</div>
	</div>
					
			<? 	#Tab Slider			
				if($device=='computer'): 
					get_template_part( 'custom_tmp/computer/carousel_slider');
				elseif($device=='tablet'): 
					get_template_part( 'custom_tmp/tablet/swipe_slider');
				elseif($device=='phone'): 
					get_template_part( 'custom_tmp/phone/swipe_slider');					
				endif;				
			?>							
		</div>
	</div>
		
					