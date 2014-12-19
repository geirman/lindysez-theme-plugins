
	<div class="col-sm-12 tab_heading">
		<?php
		if ( function_exists( 'ot_get_option' ) )
				{
					$slider_statement = ot_get_option('l_slider_statement');
					if(!empty($slider_statement))
					{
						echo $slider_statement;
					}
					else
					{
						echo "&nbsp;";
					}
				}	

		?>			
	</div>