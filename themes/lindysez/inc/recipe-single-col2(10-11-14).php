
<?php		
		$current_recipe=$post->ID;
		$all_recipe=array();
		//WordPress loop for custom post type with taxonomy
		$my_query = new WP_Query('post_type=recipe&post_status=publish&posts_per_page=-1');
		while ($my_query->have_posts()) : $my_query->the_post(); 
			$all_recipe[]=$post->ID;       
		endwhile;  
		
		wp_reset_query(); 
		
		$key = array_search($current_recipe, $all_recipe); 
		if(array_key_exists($key+1,$all_recipe)):
			$ids[]=$all_recipe[$key+1];
			$ids[]=$all_recipe[$key+2];
			$ids[]=$all_recipe[$key+3];
			$ids[]=$all_recipe[$key+4];
		else:
			$ids[]=$all_recipe[$key-1];
			$ids[]=$all_recipe[$key-2];
			$ids[]=$all_recipe[$key-3];
			$ids[]=$all_recipe[$key-4];		
		endif;
?>		
					
					<!-- CG: /inc/recipe-single-col2.php -->
		<? ## Top Portion ?>			
					<!-- For Desktop -->	
					<div class="hidden-xs hidden-sm col-md-12 slider_multiple_image">
                                 <!-- Starting Default Loop (Full Width Template) -->
								<?php if (have_posts()) while (have_posts()) : the_post(); ?>                       		
                                        <h1 class="title fn" itemprop="name" ><?php the_title(); ?></h1>	

										<!-- Recipe Categorization Information -->
										
											<h5>
												<?php echo get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', ''); ?></span>
											</h5>
											<h5>
												<?php echo get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', ''); ?></span>
											</h5>
											<h5>
												<?php echo get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', ''); ?></span>
											</h5>
											
									<div id="main">
										<?php 												
																				
										$recipe_images = get_post_meta($post->ID, 'RECIPE_META_more_images_recipe');
										
										$images_count = count($recipe_images);
										if($images_count > 0) 
										{
											?>			                                        
												<div class="panel">
													<ul id="images">
																	<?php																		
																	foreach($recipe_images as $image)
																	{
																			?>
																			<li>
																				<a href="<?php $image_attributes = wp_get_attachment_image_src( $image, 'thumbnail-blog'); echo $image_attributes[0]; ?>">
																					<?php echo wp_get_attachment_image($image, 'single-carousel-thumb'); ?>
																				</a>
																			</li>
																			<?php
																	}																						
																	?>                   
													</ul>
													
													<div id="controls"><div class="clear"></div></div>
													<div class="clear"></div>
												</div>
											<div id="exposure"></div>
											<?php 
										} 
										elseif(has_post_thumbnail()) 
										{
												?>
												<div class="single-imgs">
													<div class="single-img-box">
															<a  rel="prettyPhoto" title="<?php the_title(); ?>" 
																href="<?php 
																		$image_id = get_post_thumbnail_id();
																		$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																		echo $image_url[0];
																		?>">					                                                	
																<?php the_post_thumbnail('thumbnail-blog', array( 'class'	=> 'photo' )); ?>
															</a>
													</div>
													<div id="horiz_container_outer" class="small-img-cont">
															<p class="info-msg msg-error"><span><?php _e('No more images found for this recipe!', 'FoodRecipe'); ?></span></p>
													</div>
												</div>
												<?php
										}
										 																		
										?>
									</div>											
										
											
											
					<!-- Recipe Information -->
					<h4>
						  <?php
				
							$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
							$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
							
							$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
							$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
							$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));	
							
							if(!empty($yield))
							{?>
								<?php _e('Yield :','FoodRecipe'); ?>
									<span class="value"><?php echo $yield; ?></span>									
									<?php
							}
							
							if(!empty($servings))
							{
									?>
									
										<?php _e('Servings :','FoodRecipe'); ?>
										<span class="value"><?php echo $servings; ?></span>
									
									<?php
							}
							
							if(!empty($prep_time))
							{
									?>
										<?php _e('Prep Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $prep_time; ?></span>														
									<?php
							}
							
							if(!empty($cook_time))
							{
									?>
										<?php _e('Cook Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $cook_time; ?></span>														
									<?php
							}
							
							if(!empty($ready_in))
							{
									?>
										<?php _e('Ready In :','FoodRecipe'); ?>
										<span class="value"><?php echo $ready_in; ?></span>														
									<?php
							}							
							?>
					</h4>											
											
					</div>					
											
					<!-- For Tablet -->						
					<div class="col-xs-12 col-sm-12 col-md-12 inside_reciepe_next ">	
							<div class="col-xs-12 col-sm-4 index pull-right">
							  <div class="button_index">
							  <ul>
							  <li class='pre' >
							  <?php if(array_key_exists($key-1,$all_recipe)):?>
									<a href="<?php echo get_permalink($all_recipe[$key-1]); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left_dark.png" alt="next"></a>
							  <?php else:?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/arrow_left.png" alt="next">
							  <? endif;?>							  
							  <li class='center_li'><a href='<?php echo get_permalink('9'); ?>'>Recipes </a></li>
							  <li class='nxt'>
							  <?php if(array_key_exists($key+1,$all_recipe)):?>
									<a href="<?php echo get_permalink($all_recipe[$key+1]); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right_red.png" alt="next"></a>
							  <?php else:?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/arrow_right_light.png" alt="next">
							  <? endif;?>
							  </li>
							  </ul>
							  </div>
							</div>
							
							<div class="col-xs-12 col-sm-8 recipe_list pull-left">
								<h2><?php the_title(); ?></h2>
								<div class="receiepe_menu_detail">
		
								<div class="rate_mobile">
								<h3>Average Member Rating :</h3>
									<p>
									<?php the_recipe_rating($post->ID); ?>
									</p>
								</div>
								</div>							
							</div>
						<?	$recipe_images = get_post_meta($post->ID, 'RECIPE_META_more_images_recipe');
							$images_count = count($recipe_images);
							?>
							<div class="col-xs-12 col-sm-8 inside_receiepe_large_image ">
										<?php 												
												if($images_count > 0) 
												{
													$srr='1';
													foreach($recipe_images as $image)
													{ 
														?>
														<div class="show_<?=$srr?> detail_images <?=($srr=='1')?'detail_current_image':'';?>">
														<?	
															echo do_shortcode('[responsive_shortcode imageid="'.$image.'" img_size="900=>575&262--710=>515&262--768=>575&262--300=>300&197"]');
														echo '</div>';
													$srr++;
													}
												}?>								
							</div>
							<div class="col-xs-12 col-sm-4 index1 <?=($images_count=='1')?'single_mobile_image':''?>" >


						<?php
							
							if($images_count > 0) 
							{
							echo "<ul>";
								$srr='1';	
								foreach($recipe_images as $image)
								{ 
										?>
										<li img_show='show_<?=$srr?>' class='show_image_rel'>
											<?php echo do_shortcode('[responsive_shortcode imageid="'.$image.'" img_size="900=>150&150--710=>150&300--780=>150&150--300=>150&150"]'); ?>
										</li>
										<?php
								$srr++;		
								}					
							echo "</ul>";
							/*
							$args = array( 
								'post__in' => $ids,
								'post_type' => 'recipe',
								'post_status' => 'publish',
								'posts_per_page' => '4',
								'post__not_in' =>array($current_recipe)			
							);


							// The Query
							$the_query = new WP_Query( $args );

							// The Loop
							if ($the_query->have_posts() ) {
									echo '<ul>';
								while ( $the_query->have_posts() ) {
									$the_query->the_post();
									echo '<li>';?>
										<a href="<?php the_permalink(); ?>">
											<?php //the_post_thumbnail(array(146,146));?>
											<?php echo do_shortcode('[responsive_shortcode imageid="'.get_post_thumbnail_id($POST->ID).'" img_size="900=>150&150--780=>150&150--300=>150&150"]'); ?>
										</a>
										</li>
								<?php
								}
									echo '</ul>';
							} else {
								
							}
							*/
							}
							/* Restore original Post Data */
							wp_reset_postdata();		
								?>				 
												 
							</div>
					</div>						
					
				

					<? ## For Tablet Tabs Portion ?>
					<div id="block_tav_reciepe" class="col-xs-12 col-sm-8 hidden-xs hidden-md block_paragraph">						
							
							<ul class="nav nav-tabs">
							  <li class="active for_comment recipe_tabs"><a href="#home" data-toggle="tab">Intro</a></li>
								<?php
									#for video
									$vid_url = get_post_meta($post->ID, 'RECIPE_META_video_url', true);	

									
									# For Ingredients
									$Ingredients=do_shortcode('[ingredients]');
									
									if(!empty($method) || !empty($Ingredients) ){
										echo "<li class='for_comment recipe_tabs'><a href='#Ingredients' data-toggle='tab'>Recipe</a></li>";
									}
									
									# For method
									$method=do_shortcode('[method]');
									
									if(!empty($vid_url)){
										echo "<li class='for_comment'><a href='#video' data-toggle='tab'>Video</a></li>";
									}									
							  ?>
							 
							  <li class='for_comment current_comment recipe_tabs'><a href="#comment" data-toggle="tab"> Comments</a></li>
							  
							  
							</ul>

							<!-- Tab panes -->
							<div class="tab-content" >
								<div class="tab-pane active comment_tabs" id="home">
								  <div class="internal">
								  <?php if(get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', '')){ echo "<h4>".get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', '')."</h4>"; } ?>
								  <?php if(get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', '')){ echo '<h4 class="internal_image">'.get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', '')."</h4>"; } ?>
								  <?php if(get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', '')){ echo '<h4 class="internal_image" >'.get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', '');} ?></h4>
								  
								  </div>
						<!-- Recipe Information -->
						<div class="internal internal_another_links">
						  <?php
				           
							$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
							$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
							
							$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
							$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
							$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));	
							
							if(!empty($yield))
							{
									?>
									<h4>
										<?php _e('Yield :','FoodRecipe'); ?>
										<span class="value"><?php echo $yield; ?></span></h4>
									
									<?php
							}
							
							if(!empty($servings))
							{
									?>
									<h4>
										<?php _e('Servings :','FoodRecipe'); ?>
										<span class="value"><?php echo $servings; ?></span></h4>
									
									<?php
							}
							
							if(!empty($prep_time))
							{
									?>
										<h4>
										<?php _e('Prep Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $prep_time; ?></span></h4>														
									<?php
							}
							
							if(!empty($cook_time))
							{
									?>	<h4>
										<?php _e('Cook Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $cook_time; ?></span></h4>														
									<?php
							}
							
							if(!empty($ready_in))
							{
									?>	<h4>
										<?php _e('Ready In :','FoodRecipe'); ?>
										<span class="value"><?php echo $ready_in; ?></span>	</h4>													
									<?php
							}
							?>
						</div>							
									<?php the_content(); ?>	
									<!-- Share Icons -->
									<Br/><Br/>
									<?php //get_template_part('inc/share'); ?>
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
								</div>


								<div class="tab-pane comment_tabs current_comment" id="comment">									
									<div class="comments no-print">
											<?php comments_template('',true); ?>
											<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
											<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
									</div><!-- end of comments div -->  
								</div>
							  
								<div class="tab-pane comment_tabs" id="video">	
								<!-- For Tablet -->
								<? if(!empty($vid_url)): 
									$youtube_id= get_youtube_id($vid_url);?>
									<div class="visible-sm hidden-xm col-sm-12">								
										<?php echo show_youtube_video($youtube_id,'330','460'); ?>
									</div>	
									<div class="visible-xm hidden-sm col-sm-12">								
										<?php echo show_youtube_video($youtube_id,'300','300'); ?>
									</div>										
									<div style='clear:both;'></div>
								<? endif;?>	
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>								
								</div>		
								
								<div class="tab-pane comment_tabs" id="Ingredients">			
									<?php 
									if(!empty($Ingredients)):
										echo $Ingredients; 
									endif;	?>
									<div style='clear:both;'></div>
									
									<?php 
									if(!empty($method)):
										echo $method; 
									endif;	?>
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>									
								</div>	
							</div>										
                    </div>      



					<? ## For Mobile Tabs Portion ?>
					<div id="block_tav_reciepe" class="col-xs-12 col-sm-8 hidden-sm block_paragraph mobile_recipe_tabs">						
							<ul class="nav nav-tabs">
							  <li class="active for_comment recipe_tabs"><a href="#home1" data-toggle="tab">Intro</a></li>
								<?php
									#for video
									$vid_url = get_post_meta($post->ID, 'RECIPE_META_video_url', true);	

									#for Nute
									$nut_vals = get_post_meta($post->ID, 'RECIPE_META_nut_mass');
									
									$ttl_nt=array();
									if(!empty($nut_vals['0'])):
										foreach($nut_vals['0'] as $kkey=>$vval):
											if(!empty($vval)):
												$ttl_nt[]=$vval;
											endif;
										endforeach;
									endif;
									
									 
									# For Ingredients
									$Ingredients=do_shortcode('[ingredients]');
																		
									if(!empty($method) || !empty($Ingredients) ){
										echo "<li class='for_comment recipe_tabs'><a href='#Ingredients1' data-toggle='tab'>Recipe</a></li>";
									}
									
									if(count($ttl_nt)>0){
										echo "<li class='for_comment recipe_tabs'><a href='#Nutrition' data-toggle='tab'>Nutrition</a></li>";
									}									
									
									# For method
									$method=do_shortcode('[method]');																	
							  ?>							 
							  <li class='for_comment current_comment recipe_tabs'><a href="#comment1" data-toggle="tab"> Comments</a></li>
							  
							</ul>

							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active comment_tabs" id="home1">
								  <div class="internal">
								  <?php if(get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', '')){ echo "<h4>".get_the_term_list( $post->ID, 'cuisine', __('Cuisine: <span>', 'FoodRecipe'), ', ', '')."</h4>"; } ?>
								  <?php if(get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', '')){ echo '<h4 class="internal_image">'.get_the_term_list( $post->ID, 'course', __(' Course: <span>', 'FoodRecipe'), ', ', '')."</h4>"; } ?>
								  <?php if(get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', '')){ echo '<h4 class="internal_image" >'.get_the_term_list( $post->ID, 'skill_level', __('Skill Level: <span>', 'FoodRecipe'), ', ', '');} ?></h4>
								  
								  </div>
						<!-- Recipe Information -->
						<div class="internal internal_another_links">
						  <?php
				           
							$yield = get_post_meta($post->ID, 'RECIPE_META_yield', true); 	
							$servings = get_post_meta($post->ID, 'RECIPE_META_servings', true);									
							
							$prep_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_prep_time', true)); 
							$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
							$ready_in = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_ready_in', true));	
							
							if(!empty($yield))
							{
									?>
									<h4>
										<?php _e('Yield :','FoodRecipe'); ?>
										<span class="value"><?php echo $yield; ?></span></h4>
									
									<?php
							}
							
							if(!empty($servings))
							{
									?>
									<h4>
										<?php _e('Servings :','FoodRecipe'); ?>
										<span class="value"><?php echo $servings; ?></span></h4>
									
									<?php
							}
							
							if(!empty($prep_time))
							{
									?>
										<h4>
										<?php _e('Prep Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $prep_time; ?></span></h4>														
									<?php
							}
							
							if(!empty($cook_time))
							{
									?>	<h4>
										<?php _e('Cook Time :','FoodRecipe'); ?>
										<span class="value"><?php echo $cook_time; ?></span></h4>														
									<?php
							}
							
							if(!empty($ready_in))
							{
									?>	<h4>
										<?php _e('Ready In :','FoodRecipe'); ?>
										<span class="value"><?php echo $ready_in; ?></span>	</h4>													
									<?php
							}
							?>
						</div>	

								<!-- For Tablet -->
								<? if(!empty($vid_url)): ?>
									<div class="visible-xm hidden-sm col-sm-12">	
										<?
											$youtube_id= get_youtube_id($vid_url);
											echo show_youtube_video($youtube_id,'290','290'); ?>
									</div>										
									<div style='clear:both;'></div>
								<? endif;?>	
						
									<?php the_content(); ?>	
									<!-- Share Icons -->
<Br/>
									<?php //get_template_part('inc/share'); ?>
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
									
								</div>


								<div class="tab-pane comment_tabs current_comment" id="comment1">									
									<div class="comments no-print">
											<?php comments_template('',true); ?>
<Br/>
											<?php //get_template_part('inc/share'); ?>
											<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
											<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
											
									</div><!-- end of comments div -->  
								</div>
							  
								
								<div class="tab-pane comment_tabs" id="Ingredients1">			
									<?php 
									if(!empty($Ingredients)):
										echo $Ingredients; 
									endif;	?>
									<div style='clear:both;'></div>
									
									<?php 
									if(!empty($method)):
										echo $method; 
									endif;	?>
									<!-- end of Video Ingredients div -->  
<Br/>
									<?php //get_template_part('inc/share'); ?>
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
								</div>	
								
								<div class="tab-pane comment_tabs" id="Nutrition">									
									<?php get_template_part('inc/nutritional-info-mobile'); ?>
<Br/><Br/>
									<?php //get_template_part('inc/share'); ?>
									<?php echo do_shortcode ('[shareaholic app="share_buttons" id="1a5927c9f980b5a5514754b771437626"]'); ?><br/>
									<?php if (function_exists('nrelate_related')) nrelate_related(); ?>
								</div>
								<div style='clear:both;'></div>
							</div>										
                    </div>					

				
					
					
										
					<div class="hidden-xs hidden-sm col-md-8 reciepe_paragraph custom_left">
																			
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
					
					<div class="xs-col-12 col-sm-4 col-md-4 reciepe_video_detail">

							<!-- Cook Info -->
							<?php get_template_part('inc/cook-info'); ?>																								
							
							<!-- Rating Icons -->
							<?php get_template_part('inc/rating'); ?>	

							<!-- YouTube Video -->
							<?php get_template_part('inc/video'); ?>
							
							 <!-- Including Nutritional Info part -->
							<?php get_template_part('inc/nutritional-info'); ?>

						<div style='clear:both;'></div>											
					</div><!-- end of info-right div -->										                                       
                                        
										<span class="w-pet-border"></span>
								<div style='clear:both;'></div>				
								<?php endwhile; ?>
						</div><!-- end of left-area (Recipe Template Full Width) -->
				
