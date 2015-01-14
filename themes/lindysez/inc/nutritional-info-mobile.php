<?php 
global $post;
$nut_names = get_post_meta($post->ID, 'RECIPE_META_nut_name');	

$nut_number = 0;

if(is_array($nut_names))
{									
	$nut_number = count($nut_names[0]);
}

if( $nut_number >= 1 && (!empty($nut_names[0][0])) )
{
	$nut_vals = get_post_meta($post->ID, 'RECIPE_META_nut_mass');
	$i = 0;
	?>
	<div class="nutrition_info1">
			<h4><?php _e('Nutritional Info', 'FoodRecipe'); ?></h4>
			<h6><?php _e('This information is per serving.', 'FoodRecipe'); ?></h6>
			<ul class='nutrition_list'>
			<?php
				while($i < $nut_number)
				{
					?>
						<li class="nutrition">
								<div class="type"><?php echo $nut_names[0][$i] ?></div>
								<div class="value"><?php echo $nut_vals[0][$i] ?></div>
								<div style='clear:both;'></div>
						</li>
					<?php
					$i++;
				}
			?>
			</ul>
	</div>
	<div style='clear:both;'></div>
	<?php
}
?>