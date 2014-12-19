<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<!-- Our Own CSS Start Here -->	
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/css/demo1.css" rel="stylesheet">


<!-- For Swipe Slider -->	
<link href="<?php echo get_template_directory_uri(); ?>/css/swipe/idangerous.swiper.css" rel="stylesheet">

<!-- For Search -->	
<link href="<?php echo get_template_directory_uri(); ?>/css/search/component.css" rel="stylesheet">


<link href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" />

<link rel='stylesheet' id='prettyPhoto-css'  href='<?php echo get_template_directory_uri(); ?>/js/prettyPhoto/css/prettyPhoto.css?ver=3.8.2' type='text/css' media='all' />

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/prettyPhoto/js/jquery.prettyPhoto.js?ver=3.1.3'></script>

<link href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/picturefill.js?ver=3.8.3"></script>


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mobile_menu.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mobile_menu2.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/custom_validation.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/galleriffic-2.css" type="text/css" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.exposure.js?v=1.0.1"></script>
		


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<? $slider_timing = ot_get_option( 'slider_type_timing');
 if(empty($slider_timing)):
	$slider_timing='7000';
 endif;
?> 
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/customJs.js"></script>
<script>
	jQuery(document).ready(function () {
		jQuery('.carousel').carousel({
			interval: <?=$slider_timing?>
		});
		jQuery('.carousel').carousel('cycle');
	});
	</script>
		
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />				
		
		<?php if ( function_exists( 'ot_get_option' ) ) { ?>
		<!-- FAVICON -->
		<link rel="shortcut icon" href="<?php echo ot_get_option( 'favicon' ); ?>" />

		<?php } ?>
		
		<?php 
			wp_head(); 
		?>			
</head>


<!--[if lt IE 7 ]> <body <?php body_class( 'ie6' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class( 'ie7' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class( 'ie8' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class( 'ie9' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class(); ?>> <!--<![endif]-->

<!-- ============= HEADER STARTS HERE ============== -->


<div class="mm-page">
<div class="wrapper">
						<?php
						// this code is to check required plugin installation and show notice to user for installing those plugins.
						// So, no need to provide localization support here
						if( !function_exists( 'ot_get_option' ))
						{
							?>
							<div class="plugin-notice">
								<p class="plugin-alert"><strong>Important:</strong> You need to install <a href="http://wordpress.org/extend/plugins/option-tree/">Option Tree</a> plugin for this theme. Please read documentation for more help.</p>
							</div>                       	
							<?php
						}
						?>
	<div class="container-fluid header">
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
      
	  <div class="hidden-xs col-sm-6 col-md-8 utensil"> <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/Lindysez-Banner.jpg" alt="utensil"> </div>
      <div class="visible-xs col-xs-8 mobile_search">
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
  </div>
</div>
<div class="border_top"></div>
<!-- end of header div -->
	<?php
	// this code is to check required plugin installation and show notice to user for installing those plugins.
	// So, no need to provide localization support here
	if( !function_exists( 'ot_get_option' ))
	{
		?>
		<div class="plugin-notice">
			<p class="plugin-alert"><strong>Important:</strong> You need to install <a href="http://wordpress.org/extend/plugins/option-tree/">Option Tree</a> plugin for this theme. Please read documentation for more help.</p>
		</div>                       	
		<?php
	}
	?>
<!-- ============= HEADER ENDS HERE ============== -->



<!-- ============= CONTAINER STARTS HERE ============== -->
<!-- Navigation -->
<div class="navigation1">
  <div class="wrapper">
    <div class="container-fluid navigation_inner">
      <div class="row">
        <div class="hidden-xs col-sm-8 col-md-7 menu">
				<!-- MAIN NAVIGATION STARTS HERE -->
					<?php wp_nav_menu( array('menu' => 'Main', 'container' => '', 'items_wrap' => '<ul class="nav">%3$s</ul>','menu_class' => 'nav-collapse collapse', )); ?>				
				<!-- MAIN NAVIGATION ENDS HERE -->	
        </div>
        <div class="hidden-xs col-sm-4 col-md-5 search">
					<div id="sb-search" class="sb-search">
						<form action="<?php echo home_url(); ?>">
							<input name="s" class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
							<input name='s_submit' class="sb-search-submit" type="submit" value="">
							<span class="sb-icon-search"></span>
						</form>
					</div>	  
          <h4><?php echo date('F d, Y');?></h4>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ============= HEADER ENDS HERE ============== -->


<!-- ============= CONTAINER STARTS HERE ============== -->
		
<div class="internal_slider">
			<div class="wrapper">
		        <!-- WEBSITE SEARCH STARTS HERE -->    	
				<div class="container-fluid slider_inner">
					<div class="row">
						<div class=" hidden-xs hidden-sm col-md-12 desk_search">					
						<h3 class="head-pet"><?php _e('Site <span>Search</span>', 'FoodRecipe');?></h3>
						<div class="search_form">
							<form action="<?php echo home_url(); ?>" id="searchform">
									<p>
											<input type="text" name="s" id="s" class="field" placeholder="<?php _e('Search for', 'FoodRecipe');?>" />
											<input type="submit" name="s_submit" id="s-submit" value="" />
									</p>
							</form>
						</div>
						<p class="statement"><span class="fireRed"><?php _e('Browse by Category', 'FoodRecipe');?>:</span>
                        		<?php
									$terms = get_terms("recipe_type");
									$count = count($terms);
									if ( $count > 0 ){
											/*if($count > 5)
												$the_limit = 5;
											else*/
											$the_limit = $count;
											foreach ( $terms as $term ) {
												?>
													<a href="<?php echo get_term_link($term->slug, 'recipe_type'); ?>"><?php echo trim($term->name); ?></a>
												<?php
												$the_limit--;
												if($the_limit < 1) { break; } else { echo '| '; }
											}
									}
								?>
                        </p>
						</div>	
					
				<!-- end of top-search div-->
