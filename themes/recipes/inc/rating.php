<div class="average_rating">
		<h3><?php _e('Average Member Rating', 'FoodRecipe'); ?>:</h3>
	<div class="internal_data_rating">	
		<h6><?php _e('Average Member Rating', 'FoodRecipe'); ?></h6>
		
		<p class="ex-rates average_rating_five" itemprop="reviews" itemscope itemtype="http://schema.org/AggregateRating">
			<?php the_recipe_rating($post->ID); ?>
			&nbsp;&nbsp;(<?php echo get_avg_rating($post->ID); ?> / 5)		
			<meta itemprop="ratingValue" content="<?php echo get_avg_rating($post->ID); ?>" />
    		<meta itemprop="bestRating" content="5" />
			<meta itemprop="ratingCount" content="<?php echo get_vote_count($post->ID); ?>" /> 						                                                        
		</p>
		
		<div class="hreview-aggregate">
			<span class="rating">
				<span class="average"><?php echo get_avg_rating($post->ID); ?></span>
				<span class="best">5</span>
				<span class="count"><?php echo get_vote_count($post->ID); ?></span>
			</span>
		</div>
		
		<?php
			if(!already_voted($post->ID))
			{
				?>
				<form action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" method="post" id="rate-product">
					<h6><?php _e('Rate this recipe', 'FoodRecipe'); ?></h6>
					<p class="rates">
							<span class="off"></span>
							<span class="off"></span>
							<span class="off"></span>
							<span class="off"></span>
							<span class="off"></span>
							<input type="hidden" name="selected_rating" id="selected_rating" value="" />
							<input type="hidden" name="post_id" value="<?php echo $post->ID ?>" />
							<input type="hidden" name="action" value="rate_this" />
					</p>
				</form>
				<?php
			} 
			else 
			{
				echo '<br /><p>'. __("You have already Rated.", "FoodRecipe") .'</p>';
			}
		?>
		<p id="output"></p>
		<p class="status"><span><?php echo get_vote_count($post->ID); ?> <?php _e('people', 'FoodRecipe'); ?></span> <?php _e('rated this recipe', 'FoodRecipe'); ?></p>
	</div>
</div><!-- end of rate-box div -->