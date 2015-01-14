<?php 
/* 
* Template Name: Full Width Page 
*/ 
get_header(); 
?>

						<!-- CG: full-width.php -->	
                        <div id="left-area" class="clearfix full-wide">
                        		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                
								<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">
										<h1 class="post-title w-bot-border"><?php the_title(); ?></h1><br />
										<p class="meta"><span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> <?php _e('Last Update: ', 'FoodRecipe'); ?> <span> <?php the_time('F j, Y'); ?></span></p>
										<?php
												
												if(has_post_thumbnail()) 
												{
													?>
			                                        <div class="post-thumb single-img-box">
															<a rel="prettyPhoto" title="<?php the_title(); ?>" href="<?php $image_id = get_post_thumbnail_id();
																	$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
																	echo $image_url[0];
															?>">
			                                                		<?php the_post_thumbnail('thumbnail-blog'); ?>
			                                                </a>
													</div>
		                                        	<?php
												}
												
												the_content();
										?>
								</div><!-- end of post div -->
								
								<?php endwhile; ?>
                                
								<?php endif; ?>
                                
                                <div class="comments">
                                		<?php comments_template('',true); ?>
                                </div><!-- end of comments div -->             
						
                        </div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
    
<?php get_footer(); ?>
