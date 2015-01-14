<?php
/* 
* Template Name: Home Page (What's Hot)
*/ 
get_header(); 						

						if ( function_exists( 'ot_get_option' ) ) {
							$slider_type = ot_get_option( 'slider_type');
						}
						
						if($slider_type == "Thumbnail Slider")
						{
								get_template_part( 'sliders/thumb-slider' );
						}
						elseif($slider_type == "Nivo Slider")
						{
								get_template_part( 'sliders/nivo-slider' );
						}
						elseif($slider_type == "Basic Slider")
						{
								get_template_part( 'sliders/basic-slider' );
						}
						elseif($slider_type == "Accordion Slider")
						{
								get_template_part( 'sliders/accordion-slider' );
						}						
						else
						{
								get_template_part( 'sliders/right-info-slider' );
						}
                   
                        ?>
    
	<div class="wrapper">	
		  <div class="container-fluid reciepe_type">
			<div class="row">			
				
			<? 	# Recipe types List 
				if($device=='phone'): 
					get_template_part( 'custom_tmp/phone/recp_list');
				elseif($device=='tablet'): 
					get_template_part( 'custom_tmp/tablet/recp_list');
				endif; ?>						
			</div>
		</div>		
			<div class="container-fluid hot_spicy">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 whats_hot">
			            		<h2><?php _e("What's", 'FoodRecipe'); ?> <span><?php _e('Hot', 'FoodRecipe'); ?></span></h2>
			                    
                                		<?php
                                        	
											$whats_hot = array();

											if ( function_exists( 'ot_get_option' ) )
											{
												$whats_hot[] = intval(ot_get_option( 'whats_hot1' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot2' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot3' ));
												$whats_hot[] = intval(ot_get_option( 'whats_hot4' ));
											}

											$whats_hot_args = array( 'post_type' => 'recipe', 'posts_per_page' => 4, 'post__in' => $whats_hot );
											
											$whats_hot_query = new WP_Query( $whats_hot_args );
											$custom_order=array();
											foreach($whats_hot as $kk=>$vv):
												foreach($whats_hot_query->posts as $k=>$v):
														if($vv==$v->ID):
															$custom_order[]=$v;
														endif;
												endforeach;
											endforeach;
											
											#now again pass the custom array
											unset($whats_hot_query->posts);
											$whats_hot_query->posts=$custom_order;
											
											if ($whats_hot_query->have_posts()): $srr='0';
												while ($whats_hot_query->have_posts()) : 
													$whats_hot_query->the_post(); ?>
										                	<div class="hottest <?=($srr=='0')?'':'hottest_dish';?> <?=($srr>'2')?'hottest_tablet':'';?>">
																	
																	<?php
																	$terms = get_the_terms( $post->ID, 'recipe_type' );														
																	if ( $terms && !is_wp_error( $terms ) ) : 
																	
																			$first_term;												
																			foreach($terms as $term)
																			{
																					$first_term = $term;
																					break;
																			}
																			?>
																			<h3><a title="<?php echo $first_term->name; ?>" href="<?php echo get_term_link($first_term->slug, 'recipe_type' ); ?>"><?php echo $first_term->name; ?></a></h3>
																			<div class="hottest_image">
																			<?php
																	else:
																			?>
																			<h3><a href="#">&nbsp;</a></h3>
																			<div class="hottest_image">
																			<?php
																	endif;
																		$img_id=get_post_thumbnail_id($POST->ID);
																		if(!empty($img_id)):?>
																		<a title="<?php echo $first_term->name; ?>" href="<?php the_permalink(); ?>">
																			<? //echo do_shortcode('[responsive imageid="'.get_post_thumbnail_id($POST->ID).'" abc="custom"]'); ?>
																			<?php //the_post_thumbnail(array('222','160')); ?>
																			<? echo do_shortcode('[responsive_shortcode imageid="'.get_post_thumbnail_id($POST->ID).'" img_size="900=>222&144--780=>122&132--300=>300&197"]'); ?>
																		</a>
																		<? endif;?>
																		<div style='clear:both;'></div>
																	</div>
																	<div class="hottest_text">
											                        <h4>
																		<a href="<?php the_permalink(); ?>">
																			<?php echo word_trim(get_the_title(), 4, '...'); ?>
																		</a>
																		<div style='clear:both;'></div>
																	</h4>
																	
																<? 	# View More button
																	if($device=='phone'): 
																		get_template_part( 'custom_tmp/phone/hot_more');
																	elseif($device=='tablet'): 
																		get_template_part( 'custom_tmp/tablet/hot_more');												
																	elseif($device=='computer'): 
																		get_template_part( 'custom_tmp/computer/hot_more');
																	endif; ?>																	
																	 																	
																	
																	</div>	
										                    </div>
					                                         <?php															 												 													
												$srr++;
												endwhile;
											endif;
									?>
									<div class='more_recipe'>
										<a id='load_more_rec_mb' class="readmore">Read More</a>
									</div>
							</div> 
			            </div>
					</div>					
				<!-- end of whats-hot div -->
				
				<div class="container-fluid reciepe_main_section">
					<? 	# News tips etc					
					if($device=='computer'): 
						get_template_part( 'custom_tmp/computer/news_tips');
					elseif($device=='tablet'): 
						get_template_part( 'custom_tmp/tablet/news_tips');
					endif; ?>					
				</div>
				<!-- end of home-infos div -->
			</div>
		</div>
		
		<!-- Only For Mobile -->
		<div class="container-fluid">
		  <div class="row">
			<? 	# View More button
				if($device=='phone'): 
					get_template_part( 'custom_tmp/phone/mobile_bottom_bar');
				endif; ?>	
		  </div>
		</div>	
		
<?php get_footer(); ?>