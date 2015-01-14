	
	<!-- Only For Tablet -->
	<div class="visible-sm col-sm-12">
		<div class="reciepe_main_internal">
			
			<?php 
				if(has_post_thumbnail()) 
				{
					$image_id = get_post_thumbnail_id();
						if($image_id)
						{				
						?>
							<div class="all_rec">
							<a class="fancybox post_image" rel="gallery" title="<?php the_title(); ?>" href="<?php 
													$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
													echo $image_url[0];												
										?>">
												<?php //the_post_thumbnail('thumbnail-blog'); ?>
												<? echo do_shortcode('[responsive_shortcode imageid="'.$image_id.'" img_size="900=>250&212--780=>300&207--300=>300&197"]'); ?>
							 </a>	
							</div>	
					<?php
						}
				}
			?>
			<div class="<? if(has_post_thumbnail($post->ID)): echo "reciepe_internal_text"; endif; ?>">
				<p class="meta"><?php _e('By: ', 'FoodRecipe'); the_author_posts_link(); ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> <?php _e('On: ', 'FoodRecipe'); the_time('F j, Y'); ?> <span>|</span> <?php _e('Category', 'FoodRecipe'); ?> : <span class="cats"><?php the_category(', '); ?></span></p>
				<h3 class='post_heading'><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'FoodRecipe'), get_the_title()); ?>"><?php the_title(); ?></a></h3>
				<p>
				<?php
					echo word_trim(get_the_excerpt(), 50, '...');
				?>
				</p>
				<a href="<?php the_permalink(); ?>" class="readmore rightbtn"><?php _e('Read more', 'FoodRecipe'); ?></a>
			</div>
		</div>
	</div>
	
	
	<!-- Only For Mobile -->
	<div class="visible-xs col-xs-12  reciepe_type_main">
		<div class="reciepe_main_internal">
			<?php 
				if(has_post_thumbnail()) 
				{
					$image_id = get_post_thumbnail_id();
						if($image_id)
						{				
						?>
							<div class="all_rec">
							<a class="fancybox post_image" rel="gallery" title="<?php the_title(); ?>" href="<?php 
												$image_id = get_post_thumbnail_id();
												if($image_id)
												{
													$image_url = wp_get_attachment_image_src($image_id,'full-size', true);
													echo $image_url[0];
												}
										?>">
												<?php //the_post_thumbnail('thumbnail-blog'); ?>
												<? echo do_shortcode('[responsive_shortcode imageid="'.$image_id.'" img_size="900=>250&212--780=>300&207--300=>300&197"]'); ?>
							 </a>						
							</div>
								<?php
						}
				}	
			?>
			<div class="reciepe_internal_text">
				<h3 class='post_heading'><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'FoodRecipe'), get_the_title()); ?>"><?php the_title(); ?></a></h3>
				<p>
				<?php
					echo word_trim(get_the_excerpt(), 15, '...');
				?>
				</p>
				<div class='center_link'>
					<a href="<?php the_permalink(); ?>" class="readmore rightbtn"><?php _e('Read more', 'FoodRecipe'); ?></a>
				</div>
			</div>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	<!-- Only For Desktop -->	
	<div class="reciepe_main_internal normal_post blog_list">
	
			<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'FoodRecipe'), get_the_title()); ?>"><?php the_title(); ?></a></h3>
			<p class="meta"><?php _e('By: ', 'FoodRecipe'); the_author_posts_link(); ?> <span>|</span> <span class="comments"><?php comments_popup_link(__('0 Comments', 'FoodRecipe'), __('1 Comment', 'FoodRecipe'), __('% Comments', 'FoodRecipe')); ?></span> <span>|</span> <?php _e('On: ', 'FoodRecipe'); the_time('F j, Y'); ?> <span>|</span> <?php _e('Category', 'FoodRecipe'); ?> : <span class="cats"><?php the_category(', '); ?></span></p>
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
			?>
			<p>
			<?php
				echo word_trim(get_the_excerpt(), 50, '...');
			?>
			</p>
			<a href="<?php the_permalink(); ?>" class="readmore rightbtn"><?php _e('Read more', 'FoodRecipe'); ?></a>
	</div><!-- end of post div -->
	
