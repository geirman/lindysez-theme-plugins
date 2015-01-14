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
							
							}
							/* Restore original Post Data */
							wp_reset_postdata();		
								?>				 
												 
							</div>
					</div>