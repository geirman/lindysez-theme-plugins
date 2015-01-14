<?php

if ( function_exists( 'ot_get_option' ) )
{
	$map_lati = ot_get_option( 'map_latitude' );
	$map_longi = ot_get_option( 'map_longitude' );
	$map_zoom = ot_get_option( 'map_zoom_level' );
		
	?>        	
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		// Google Map
		 function initialize() {
			var myOptions = {
			  center: new google.maps.LatLng(<?php echo $map_lati; ?>, <?php echo $map_longi; ?>),
			  zoom: <?php echo $map_zoom; ?>,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var map = new google.maps.Map(document.getElementById("map_canvas"),
				myOptions);
		  }
		  
		  initialize();
	</script>
	<?php

}
?>