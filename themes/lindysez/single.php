<?php get_header(); ?>

<!-- CG: single.php -->
		<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); 
				
						$term_list = wp_get_post_terms($post->ID, 'review_type');
						$taxonomy_array=array();
						
						if(!empty($term_list)):	
							foreach($term_list as $key=>$term):
							$taxonomy_array[]='<a href="'.get_term_link($term->slug, 'review_type').'">'.$term->name.'</a>';
							endforeach;
						endif;
				?>
				<h1><?php the_title();?></h1>
					<div class="reciepe_main_internal normal_post">		
						<p class="meta"><?php _e('By', 'FoodRecipe'); ?> : <?php the_author_posts_link() ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> On : <?php the_time('F j, Y'); ?> <span>|</span> 
							<?php if(!empty($taxonomy_array)):?>
								<?php _e('Category', 'review_type'); ?> : <span class="cats"><?php echo implode(', ',$taxonomy_array); ?></a></span>
							<?php else:?>
								<?php _e('Category', 'FoodRecipe'); ?> : <span class="cats"><?php the_category(', '); ?></span>
							<?php endif;?>
						</p>
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
	
	<?php get_sidebar(); ?>
				</div>
						
				</div>
			</div>	       
		</div>             
	</div>

<?php get_footer(); ?>