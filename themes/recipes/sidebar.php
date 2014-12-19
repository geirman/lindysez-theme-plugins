<!-- ========== START OF SIDEBAR AREA ========== -->
<? global $device; ?>
	
	<? 	# Recipe Comment 
		if($device=='computer'): 
			include(get_template_directory().'/custom_tmp/computer/sidebar_det.php');					
		endif; 	?>
