	<div class="col-md-4 about ">
				<?php if ( function_exists( 'ot_get_option' ) ) { ?>
					<a href="<?php echo home_url(); ?>"><img src="<?php echo ot_get_option( 'footer_logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo" /></a>											
					<p><?php echo ot_get_option( 'footer_about_us'); ?>...</p>
					<a href="<?php echo get_permalink('16'); ?>" class="readmore"><?php _e('Contact Us!', 'FoodRecipe'); ?></a>
				<?php } ?>
	</div>
	
	<div class="col-md-4 twitter ">
			<?php if ( ! dynamic_sidebar( 'Footer Column 2' )) : ?>
			<?php endif; ?>
	</div>