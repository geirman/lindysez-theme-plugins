	<!-- Only for tablate view -->
	<p class="">
		<?php echo word_trim(get_the_excerpt(), 10, ''); ?>
			<a href="<?php the_permalink(); ?>"><?php _e('...more', 'FoodRecipe'); ?>
			</a>
	</p>