<?php 
/*
* Template Name: Contact Us 
*/ 
get_header(); 
?>
						<div class="col-xs-12 col-sm-12 col-md-8 all_reciepe">	
						
								<h1 class="title"><?php wp_title(''); ?></h1>
						        <?php 
										
										if ( have_posts() ) while ( have_posts() ) : the_post(); 
										
											the_content();
										
										endwhile;
								
								?>
                             <div class="reciepe_main_internal normal_post">	
								<!--
								<div class="single-img-box">
                                        <div id="map_canvas">
								        		
								        </div>
										<br/><br/>
                                </div>
								-->
								
								<?php if ( function_exists( 'ot_get_option' ) ) { ?>
						        	<h3><?php echo ot_get_option( 'contact_form_heading' ); ?></h3>
								<?php } ?>
								
						        
						        <form id="contact-form" action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" method="post" >
								        <div class='contact_field'>
										<p><input type="text" name="name" class="required" id="cname" value="<?php _e('Your Name', 'FoodRecipe');?>" /></p>
								        <p><input type="text" name="cemail" class="email required" id="cemail" value="<?php _e('Email here', 'FoodRecipe');?>" /></p>
								        </div>
										
										<textarea name="message" id="cmessage" class="required contact_field_description" rows="5" ><?php _e('Message', 'FoodRecipe');?></textarea>
								        <p>
                                        		<input type="hidden" name="action" value="send_message" />
												<input type="hidden" name="target" value="<?php if ( function_exists( 'ot_get_option' ) ) { echo ot_get_option('contact_email_address' ); } ?>" />
										        <input type="submit" name="contact-submit" id="contact-submit" value="<?php _e('Send Now', 'FoodRecipe');?>" class="readmore"   />
										        <img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" id="contact-loader" alt="Loader" />
								        </p>
										
								        <p id="message-sent"></p>
								        <p>
								        		<span class="w-pet-border"></span>
								        </p>
						        </form>
								  <div style='clear:both;'></div>
						      </div>  
							
						</div><!-- end of left-area -->

                       <div class="widget hidden-xs hidden-sm col-md-4 recent_lindy_reciepe contact_page_side">
                                <?php if ( ! dynamic_sidebar( 'Contact Sidebar' )) : ?>                                        
                                <?php endif; ?>
                        </div><!-- end of sidebar -->
				</div>
						
				</div>
			</div>	       
		</div>             
	</div>

<?php get_footer(); ?>