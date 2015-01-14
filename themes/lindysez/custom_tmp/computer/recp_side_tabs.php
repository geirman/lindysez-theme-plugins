<?php

		#Now for other pages like sidbar
			echo '<div class="widget col-md-4 recent_lindy_reciepe">';
			echo '<h2>';
				echo $title;
			echo '</h2>';

			echo 					'</h3>
											<div class="nav_lindy_reciepe">
													<ul class="nav nav-tabs">';
															if($tab_title_one) echo '<li class="active"><a data-toggle="tab" href="#home">'. $tab_title_one .'</a></li>';
															if($tab_title_two) echo '<li><a data-toggle="tab" href="#profile">'. $tab_title_two .'</a></li>';
															if($tab_title_three) echo '<li><a data-toggle="tab" href="#messages">'. $tab_title_three .'</a></li>';
			echo									'</ul>
													<div class="tab-content">
															<div id="home" class="tab-pane active">';
																	$this->recipe_loop($recipe_tab_one);
			echo									'		</div><!-- end of block div -->';
	
			if($tab_title_two) {			echo	'<div id="profile" class="tab-pane">';
																	$this->recipe_loop($recipe_tab_two);
											echo	'</div><!-- end of block div -->';
			}
													 
			if($tab_title_three) {			echo	'<div id="messages" class="tab-pane">';
																	$this->recipe_loop($recipe_tab_three);
			echo									'</div>
													</div> 
													 <!-- end of block div -->';
			}
										echo	'<div class="bot-border"></div>
											</div><!-- end of tabed div -->
									<!-- end of fav-recipes widget -->';	

?>