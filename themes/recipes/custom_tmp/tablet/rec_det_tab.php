					<? ## For Tablet Tabs Portion ?>
					<div id="block_tav_reciepe" class="col-xs-12 col-sm-8 block_paragraph">						
							
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