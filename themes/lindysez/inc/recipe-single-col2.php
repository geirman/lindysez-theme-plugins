
<?php		
		global $device;
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
					<!-- Starting Default Loop (Full Width Template) -->
					<?php if (have_posts()) while (have_posts()) : the_post(); ?>                       		
 					
					<? 	# Recipe List
						if($device=='computer'):
							include(get_template_directory().'/custom_tmp/computer/rec_detail.php');
						elseif($device=='tablet'): 
							include(get_template_directory().'/custom_tmp/tablet/rec_detail.php');					
						endif; 
					?>	                                       
					
					
					<? 	# Recipe Tab 
						if($device=='tablet'): 
							include(get_template_directory().'/custom_tmp/tablet/rec_det_tab.php');					
						elseif($device=='phone'): 
							include(get_template_directory().'/custom_tmp/phone/rec_det_tab.php');					
						endif; 
					?>				

    

					<? 	# Recipe Comment 
						if($device=='computer'): 
							include(get_template_directory().'/custom_tmp/computer/rec_comment.php');					
						endif; 
					?>	

				

				
					
					
										

					
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
				
