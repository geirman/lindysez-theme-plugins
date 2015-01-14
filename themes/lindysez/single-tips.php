<?php get_header(); ?>
<!-- CG: single-tips.php -->

						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
                        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                
								
										<h1><?php the_title();?></h1>
										<div class="reciepe_main_internal normal_post">	
										<p class="meta"><?php _e('By', 'FoodRecipe'); ?> : <?php the_author_posts_link() ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> On : <?php the_time('F j, Y'); ?> <span></p>
										<?php 
											if(has_post_thumbnail()) 
											{
												?>
												<div class="blogimg">
													<a class="fancybox" title="<?php the_title(); ?>" href="<?php $image_id = get_post_thumbnail_id();
																$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																echo $image_url[0];
														?>">
		                                                		<?php the_post_thumbnail('thumbnail-blog'); ?>
		                                                </a>
												</div>
		                                        <?php
											}
											echo '<div class="content_data">';	
												the_content();
											echo '</div>';	
										
										echo get_the_term_list( $post->ID, 'tip_type', __('<p>Tip Tags: ', 'FoodRecipe'), ', ', '</p>'); 
	
										?>
										<!-- Share Icons -->
										<?php get_template_part('inc/share'); ?>
								<!-- end of post div -->
										</div>
								<?php endwhile; ?>
										
                            	<?php else : ?>
								
                                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
										<h2 class="post-title"><?php _e('No Post Found', 'FoodRecipe') ?></h2>
								</div><!-- end of post div -->
                                
								<?php endif; ?>
                                
                                <div class="hidden-xs hidden-sm  col-md-9 comment_box ">
                                		<?php comments_template('',true); ?>
                                </div><!-- end of comments div -->
                                
                                
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
						<div class="widget hidden-xs hidden-sm col-md-4 recent_lindy_reciepe side_tip_cloud">
							<h3></h3><h3></h3>	
                       
								<?php if ( ! dynamic_sidebar( 'Tips Sidebar' )) : ?>
			                            
						        <?php endif; ?>
 				</div>
			</div>	       
		</div>             
	</div>	

<?php get_footer(); ?>