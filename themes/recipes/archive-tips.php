<?php 
get_header(); ?>
<!-- 
    CG: archive-tips 
-->
						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
							<h1>Tips <span>&amp; Reviews</span></h1>
							<div id='all_tips'>
	
							<?php
								$args = array(
									'post_type' => 'tips',

								);
								$tips = new WP_Query( $args );
								if( $tips->have_posts() ) {
									while( $tips->have_posts() ) {
										$tips->the_post();
										get_template_part('inc/list-tips');
									}
								}
								else {
									echo 'Sorry, no Tips &amp; Tricks here!';
								}								
							?>	
							</div>

                                
							<?php 
								// Pagination
								theme_pagination( $wp_query->max_num_pages); 					
							?>    							        
						</div><!-- end of left-area -->
				        <!-- LEFT AREA ENDS HERE -->
						<div class="widget hidden-xs hidden-sm col-md-4 recent_lindy_reciepe side_tip_cloud">
							<h3></h3><h3></h3>
							<?php if (!dynamic_sidebar('Tips Sidebar' )): ?>
									
							<?php endif; ?>
						</div>
				</div>
			</div>	       
		</div>             
	</div>

<?php get_footer(); ?>
