	<p class=''>
	<?php echo word_trim(get_the_excerpt(), 18, ''); ?>
		<a href="<?php the_permalink(); ?>"><?php _e('...more', 'FoodRecipe'); ?>
		</a>
	</p>