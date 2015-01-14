	<!-- Slider For Desktop -->
	<div id="myCarousel" class="carousel slide">
			<?php
				$li_recipe_ids = array();
				
				if (function_exists('ot_get_option') )
				{
					  $slides = ot_get_option('right_info_slider', array() );					
					  $sr='0';
					  if ( ! empty( $slides ) ) {
							echo "<ol class='carousel-indicators'>";
							  foreach( $slides as $slide ) 
								{	
									$li_recipe_ids[] = $slide['id'];
									echo "<li data-target='#myCarousel' data-slide-to='".$sr."' "; if($sr=='0'){ echo "class='active'"; } echo "></li>";
									$sr++;	
								}
							echo "</ol>";
						echo "<div class='carousel-inner'>"	;	
								$li_slider_args = array( 'post_type'=> array('recipe') , 'posts_per_page' => -1, 'post__in' => $li_recipe_ids );
								$li_slider_query = new WP_Query( $li_slider_args );
								
								$custom_li_order=array();
								foreach($li_recipe_ids as $kk=>$vv):
									foreach($li_slider_query->posts as $k=>$v):
											if($vv==$v->ID):
												$custom_li_order[]=$v;
											endif;
									endforeach;
								endforeach;	
								
								#now again pass the custom array
								unset($li_slider_query->posts);
								$li_slider_query->posts=$custom_li_order;														
								
								$srr='0';
								if ($li_slider_query->have_posts()) 
								while ($li_slider_query->have_posts()) : 
									$li_slider_query->the_post();
									?>
										<div class="item <?php if($srr=='0'){ echo "active"; } ?>">
											<div class='carousel_slider_img'>
											<?php //the_post_thumbnail('li-slider-thumb'); ?>
											<? echo do_shortcode('[responsive_shortcode imageid="'.get_post_thumbnail_id($post->ID).'" img_size="900=>515&262--780=>515&262--300=>300&192"]'); ?>
											 </div>
											 <div class="carousel-caption">
													<h2><a href="<?php the_permalink(); ?>" class='slider_heading'><?php the_title(); ?></a></h2>
													
													<div class="rating">
															<?php the_recipe_rating($post->ID); ?>
															<span><?php _e('Average Rating:', 'FoodRecipe'); ?> <span>(<?php echo get_avg_rating($post->ID); ?> / 5)</span></span>
													</div>
													
													<p><?php echo word_trim(get_the_excerpt(),28,' ...'); ?></p>
													
													<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('Read more', 'FoodRecipe'); ?></a>
											</div>
										</div>	
										
									<?php
									$srr++;
									endwhile;
							echo "</div>";		
					  }
				}					
				?>	
					  <!-- Carousel nav -->
					  <a class="carousel-control left" href="#myCarousel" 
					  data-slide="prev"></a> <a class="carousel-control right" href="#myCarousel" 
					  data-slide="next"></a> 
	</div>
	<!-- SLIDER AREA ENDS HERE -->