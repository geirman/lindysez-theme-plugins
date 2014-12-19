    <div class="row">
      <div class=" col-xs-3  col-sm-2 col-md-3 logo">
		<?php if(function_exists('ot_get_option')):
					$logo = ot_get_option('header_logo_image');
					if(!empty($logo)):?>
						<a id='home_link' title='<?php bloginfo('name'); ?>' href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo $logo; ?>" class="img-responsive" width="194" height="198" alt="" />
						</a>					
					<? elseif (get_header_image()):?>
						<a id='home_link' title='<?php bloginfo('name'); ?>' href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php header_image(); ?>" class="img-responsive" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
						</a>
					<?php endif; ?>			
		<?php elseif (get_header_image() ) : ?>
			<a id='home_link' title='<?php bloginfo('name'); ?>' href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img src="<?php header_image(); ?>" class="img-responsive" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
			</a>
		<?php endif; ?>		  
	  </div>
      
	  <div class="col-sm-6 col-md-8 utensil"> <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/Lindysez-Banner.jpg" alt="utensil"> </div>

    </div>