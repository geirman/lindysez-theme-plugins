<div class="reciepe_main_internal tip_list">
	<h4 class="list-title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title() ?>
		</a>
	</h4>
	<div class="list-excerpt">
		<?php echo get_the_term_list( $post->ID, 'tip_type', __('Tip Tags: ', 'FoodRecipe'), ', ', ''); ?>
		<p>	
			<?php echo get_the_excerpt(); ?>
		</p>
	</div>	
</div>	
