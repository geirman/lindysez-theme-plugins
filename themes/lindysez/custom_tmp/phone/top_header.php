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
      
	  <div class="col-xs-8 mobile_search">
				<div class="mobile_search_inner">

				<form action="<?php echo home_url(); ?>" id="searchform">
				<input name="s" type="text" name='search' placeholder="<?php _e('Search for', 'FoodRecipe');?>"/>
				<button name="s_submit" id='mobile_search'><img src="<?php echo get_template_directory_uri(); ?>/images/mobile_icon_search.png"></button>
				</form>							

				</div>


				<?php //wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav">%3$s</ul>','menu_class' => 'nav-collapse collapse', )); ?>
				<nav class="navbar navbar-default" role="navigation">
				<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Menu</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul id="mobile_nav" class="nav navbar-nav navbar-right">%3$s</ul>','menu_class' => 'nav-collapse collapse', )); ?>
				</div>
				</div>
				</nav>	<div style='clear:both;'></div>	
      </div>
    </div>