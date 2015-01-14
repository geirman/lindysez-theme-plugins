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

<!-- Mobile Detect Class -->		
<? require_once(get_template_directory().'/functions/class/Mobile_Detect.php');
global $device;

$deviceObj = new Mobile_Detect();
$device= ($deviceObj->isMobile() ? ($deviceObj->isTablet() ? 'tablet' : 'phone') : 'computer');

//$device='computer';
//$device='tablet';
//$device='phone';

?>
		
		

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
	
	<!-- Include Template By Device Type for top header -->		
	<? 
	if($device=='phone'):
		get_template_part( 'custom_tmp/phone/top_header');
	elseif($device=='tablet'):
		get_template_part( 'custom_tmp/tablet/top_header');
	else:
		get_template_part( 'custom_tmp/computer/top_header');
	endif;
	?>	
	

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
<? 
if($device=='computer'):
	get_template_part( 'custom_tmp/computer/navigation');
elseif($device=='tablet'):
	get_template_part( 'custom_tmp/tablet/navigation');
endif;
?>


<!-- ============= HEADER ENDS HERE ============== -->


<!-- ============= CONTAINER STARTS HERE ============== -->
	
<div class="internal_slider">
			<div class="wrapper">
		        <!-- WEBSITE SEARCH STARTS HERE -->    	
				<div class="container-fluid slider_inner">
					<div class="row">
					<? 	# Search Div Buttons & Text
						if($device=='computer'):
							get_template_part( 'custom_tmp/computer/search');
						endif; 
						
					?>	
