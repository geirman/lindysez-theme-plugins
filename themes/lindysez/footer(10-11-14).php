<? $slider_timing = ot_get_option( 'slider_type_timing');
 do_actions();
 if(empty($slider_timing)):
	$slider_timing='7000';
 endif;
?> 
<!-- ============= BOTTOM AREA STARTS HERE ============== -->
		<div id="bottom-wrap">
			<div class="wrapper">
				<div class="container_fluid">
					<div class="row site_footer">
					
			        	
						<div class=" hidden-xs hidden-sm col-md-4 about ">
									<?php if ( function_exists( 'ot_get_option' ) ) { ?>
										<a href="<?php echo home_url(); ?>"><img src="<?php echo ot_get_option( 'footer_logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>" class="footer-logo" /></a>											
										<p><?php echo ot_get_option( 'footer_about_us'); ?>...</p>
										<a href="<?php echo get_permalink('16'); ?>" class="readmore"><?php _e('Contact Us!', 'FoodRecipe'); ?></a>
									<?php } ?>
						</div>
						
						<div class="hidden-xs hidden-sm col-md-4 twitter ">
                        		<?php if ( ! dynamic_sidebar( 'Footer Column 2' )) : ?>
			            		<?php endif; ?>
                        </div>
                       <div class="col-xs-12 col-sm-12 col-md-4 subscribe ">
                        		<?php if ( ! dynamic_sidebar( 'Footer Column 3' )) : ?>
			            		<?php endif; ?>
                        </div>
						
						
			            
						
					</div>	
				</div>	
			</div>
		</div>
		<!-- end of bottom-wrap div -->
       
        <div class="copy_right">
				<div class="wrapper">       
					<?php if ( function_exists( 'ot_get_option' ) ) { ?>         		
						<p class="copyright"><?php echo ot_get_option( 'copyright_statement' ); ?></p>
						<p class="dnd"><?php echo ot_get_option( 'footer_dev_statement' ); ?></p>   
					<?php } ?>                     
				</div><!-- end of footer div -->
		</div><!-- end of footer-wrapper div -->
    </div> 
</div> 	
</div> 	
<!-- ============= FOOTER STARTS HERE ============== -->
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script> 
  		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.galleriffic.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.opacityrollover.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>
	
<!-- ============= FOR SEARCH ============== -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/search/classie.js"></script>	
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/search/uisearch.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/search/modernizr.custom.js"></script>


<script src="<?php echo get_template_directory_uri(); ?>/js/swipe/idangerous.swiper-2.1.min.js"></script>

  
		<script>
			new UISearch( document.getElementById( 'sb-search' ) );
		</script>	
	<?php
		// for google map 0-0-0-0-0-0
		
		if(is_page_template('template-contact.php')){ 
			get_template_part('inc/gmap');
		}
		//0-0-0-0-0-0-0-0-0-0-0-0-0-0
		
		wp_footer();

		?>
<script src="<?php echo get_template_directory_uri(); ?>/js/cistpJsFooter.js"></script>
	
	<script type="text/javascript">
		$(function(){
			var gallery = $('#images');
			gallery.exposure({controlsTarget : '#controls',
				controls : { prevNext : true, pageNumbers : true, firstLast : false },
			});
		});
	</script>

<script>
    var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        loop:true,
        autoplay: '<?=$slider_timing?>',
        speed:1000,
        autoResize:true,
        paginationClickable: true,
        onTouchStart : function() {
            slideTouched();
        }
    })

    jQuery('.pagination').on('click',function() {
        mySwiper.stopAutoplay();
        mySwiper.params.autoplay = '<?=$slider_timing?>';
        mySwiper.startAutoplay();
    });

    var timer = null;
    function slideTouched(){
        mySwiper.stopAutoplay();
        mySwiper.params.autoplay = '<?=$slider_timing?>'
        mySwiper.startAutoplay();
    }

	
 jQuery(window).resize(function(){
	  //Unset height
	  jQuery('.swiper-container').css({height:''})
	  //Calc Height
	  jQuery('.swiper-container').css({height: $('.swiper-container').find('.swiper-slide').height()})
	  //ReInit Swiper
	  swiper.reInit()
	}) 

	//setInterval(function() {
	//	window.mySwiper.swipeNext();
	//}, 4000);  
	
  jQuery('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  jQuery('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  
  </script>
</body>
</html>