<?php
/**
 * Initialize the options before anything else. 
 */
add_action( 'admin_init', '_custom_theme_options', 1 );


function _custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );

  /**
   * Create a custom settings array that we pass to 
   * the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
	      'content'       => array( 
	        array(
	          'id'        => 'general_help',
	          'title'     => 'General',
	          'content'   => '<p>Help content goes here!</p>'
	        )
	      ),
	      'sidebar'       => '<p>Sidebar content goes here!</p>'
    ),
    'sections'        => array(
	      array(
	        'title'       => 'Home Page',
	        'id'          => 'general_default'
	      ),
	      array(
	        'title'       => 'Left Image Slider ',
	        'id'          => 'left_image_slider'
	      ),		/*
	      array(
	        'title'       => 'Basic Slider ',
	        'id'          => 'basic_slider'
	      ),
	      array(
	        'title'       => 'Nivo Slider ',
	        'id'          => 'nivo_slider'
	      ),
	      array(
	        'title'       => 'Thumbnail Slider ',
	        'id'          => 'thumbnail_slider'
	      ),
	      array(
	        'title'       => 'Accordion Slider ',
	        'id'          => 'accordion_slider'
	      ),		*/
	      array(
	        'title'       => 'Footer',
	        'id'          => 'footer'
	      ),
	      array(
	        'title'       => 'Other Options',
	        'id'          => 'other_options'
	      ),
	      array(
	        'title'       => 'Contact Options',
	        'id'          => 'contact_options'
	      )
    ),
    'settings'        => array(
		  array(
			'label'       => 'Header Logo',
			'id'          => 'header_logo_image',
			'type'        => 'upload',
			'desc'        => 'Logo of your site.',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'section'     => 'general_default'
		  ),
		  array(
			'label'       => 'Favicon',
			'id'          => 'favicon',
			'type'        => 'upload',
			'desc'        => 'Upload your favicon in PNG format.',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'section'     => 'general_default'
		  ),
		  array(
	        'label'       => 'Select Home Page Slider',
	        'id'          => 'slider_type',
	        'type'        => 'select',
	        'desc'        => 'Select the Slider Type from given list.',
	        'choices'     => array(
	          array(
	            'label'       => 'Left Image Slider',
	            'value'       => 'Left Image Slider'
	          )			/*
	          array(
	            'label'       => 'Basic Slider',
	            'value'       => 'Basic Slider'
	          ),
	          array(
	            'label'       => 'Nivo Slider',
	            'value'       => 'Nivo Slider'
	          ),
	          array(
	            'label'       => 'Thumbnail Slider',
	            'value'       => 'Thumbnail Slider'
	          ),
	          array(
	            'label'       => 'Accordion Slider',
	            'value'       => 'Accordion Slider'
	          )			 */ 
	        ),
	        'std'         => 'Left Image Slider',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'general_default'
	      ),
		  array(
		  'label'=> 'Select Home Page Slider Timing',
		  'id'=> 'slider_type_timing',
		  'type'=> 'text',
		  'desc'=> 'Enter the slider Timing.',
		  'section'=> 'general_default'
		  ),	
		  array(
		  'label'=> 'Select IPad And Phone Slider Timing',
		  'id'=> 'slider_ipad_timing',
		  'type'=> 'text',
		  'desc'=> 'Enter the slider Timing.',
		  'section'=> 'general_default'
		  ),		  
		  array(
	        'label'       => 'First Whats Hot Recipe',
	        'id'          => 'whats_hot1',
	        'type'        => 'custom-post-type-select',
	        'desc'        => 'Select first item for whats hot area',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => 'recipe',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'general_default'
	      ),
		 array(
	        'label'       => 'Second Whats Hot Recipe',
	        'id'          => 'whats_hot2',
	        'type'        => 'custom-post-type-select',
	        'desc'        => 'Select second item for whats hot area',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => 'recipe',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'general_default'
	      ),
		  array(
	        'label'       => 'Third Whats Hot Recipe',
	        'id'          => 'whats_hot3',
	        'type'        => 'custom-post-type-select',
	        'desc'        => 'Select third item for whats hot area',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => 'recipe',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'general_default'
	      ),
		  array(
	        'label'       => 'Fourth Whats Hot Recipe',
	        'id'          => 'whats_hot4',
	        'type'        => 'custom-post-type-select',
	        'desc'        => 'Select fourth item for whats hot area',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => 'recipe',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'general_default'
	      ),
		  array(
            'label'       => 'Slider Statement',
            'id'          => 'l_slider_statement',
            'type'        => 'text',
            'desc'        => 'Enter statement for slider.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'left_image_slider'
          ),
		  array(
	        'label'       => 'Right Info Slider',
	        'id'          => 'right_info_slider',
	        'type'        => 'list-item',
	        'desc'        => 'Give your required recipe post IDs for each slide.',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'left_image_slider'
	      ),
		  array(
            'label'       => 'Slider Statement',
            'id'          => 'b_slider_statement',
            'type'        => 'text',
            'desc'        => 'Enter Slider Heading Statement',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'basic_slider'
          ),
		  array(
	        'label'       => 'Basic Slider',
	        'id'          => 'basic_image_slider',
	        'type'        => 'list-item',
	        'desc'        => 'Select Images and recipe post IDs to show in Basic Slider. Required dimension is: width 905px and height 386px',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'basic_slider'
	      ),
		  array(
	        'label'       => 'Nivo Image Slider',
	        'id'          => 'nivo_image_slider',
	        'type'        => 'list-item',
	        'desc'        => 'Select Images for Nivo Slider and give Recipe Post IDs. Required dimension is: width 905px and height 370px',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'nivo_slider'
	      ),
		  array(
	        'label'       => 'Thumbnail Slider Images',
	        'id'          => 'thumb_slider_images',
	        'type'        => 'list-item',
	        'desc'        => 'Add images for thumbnail slider. Required dimension is: width 905px and height 370px',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'thumbnail_slider'
	      ),
		  array(
	        'label'       => 'Accordion Slider Images',
	        'id'          => 'accor_slider_images',
	        'type'        => 'list-item',
	        'desc'        => 'Add images for thumbnail slider. Required dimension is: width 740px and height 425px',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'accordion_slider'
	      ),
		  array(
			'label'       => 'Select Footer Logo Image',
			'id'          => 'footer_logo_image',
			'type'        => 'upload',
			'desc'        => 'Select an image for your footer logo. Should not be wider than 157px.',
			'std'         => '',
			'rows'        => '',
			'post_type'   => '',
			'taxonomy'    => '',
			'class'       => '',
			'section'     => 'footer'
		  ),
		  array(
            'label'       => 'Footer About Us Information',
            'id'          => 'footer_about_us',
            'type'        => 'text',
            'desc'        => 'Enter about us information for footer about us portion.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'footer'
          ),
		  array(
            'label'       => 'Footer Readmore Link',
            'id'          => 'footer_readmore_link',
            'type'        => 'text',
            'desc'        => 'Enter URL for readmore button in footer about us portion.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'footer'
          ),
		  array(
            'label'       => 'Copyright Statement',
            'id'          => 'copyright_statement',
            'type'        => 'text',
            'desc'        => 'Enter copyright statement for footer',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'footer'
          ),
		  array(
            'label'       => 'Designer and Developer Statement',
            'id'          => 'footer_dev_statement',
            'type'        => 'text',
            'desc'        => 'Enter Designer and Developter Statement',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'footer'
          ),
		  array(
	        'label'       => 'Weekly Special Recipe',
	        'id'          => 'weekly_special_recipe',
	        'type'        => 'custom-post-type-select',
	        'desc'        => 'Select Weekly Special Recipe for Weekly Special Widget',
	        'std'         => '',
	        'rows'        => '',
	        'post_type'   => 'recipe',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'other_options'
	      ),
		  array(
	        'label'       => 'Select Single Recipe Template Type',
	        'id'          => 'recipe_template_type',
	        'type'        => 'select',
	        'desc'        => 'Select from the options how you want to show your single recipe page.',
	        'choices'     => array(
		          array(
		            'label'       => 'Recipe Template with Sidebar',
		            'value'       => 'Recipe Template with Sidebar'
		          ),
		          array(
		            'label'       => 'Recipe Template Full Width',
		            'value'       => 'Recipe Template Full Width'
		          ),
		          array(
		          	'label'		  => 'Full Width with Larger Image',
		          	'value'		  => 'Full Width with Larger Image'
		          )	         
	        ),
	        'std'         => 'Recipe Template with Sidebar',
	        'rows'        => '',
	        'post_type'   => '',
	        'taxonomy'    => '',
	        'class'       => '',
	        'section'     => 'other_options'
	      ),
		  array(
            'label'       => 'Map Latitude',
            'id'          => 'map_latitude',
            'type'        => 'text',
            'desc'        => 'Enter Google Map Latitude for your place. You can get Latitude Value From	http://itouchmap.com/latlong.html',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'contact_options'
          ),
		  array(
            'label'       => 'Map Longitude',
            'id'          => 'map_longitude',
            'type'        => 'text',
            'desc'        => 'Enter Google Map Longitude for your place. You can get Longitude Value From	http://itouchmap.com/latlong.html',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'contact_options'
          ),
		  array(
            'label'       => 'Map Zoom Level',
            'id'          => 'map_zoom_level',
            'type'        => 'text',
            'desc'        => 'Enter Google Map Zoom Level',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'contact_options'
          ),
		  array(
            'label'       => 'Contact Form Heading',
            'id'          => 'contact_form_heading',
            'type'        => 'text',
            'desc'        => 'Give a heading to your contact form.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'contact_options'
          ),
		  array(
            'label'       => 'Contact Email Address',
            'id'          => 'contact_email_address',
            'type'        => 'text',
            'desc'        => 'Enter an email address that will recieve contact form messages.',
            'std'         => '',
            'rows'        => '',
            'post_type'   => '',
            'taxonomy'    => '',
            'class'       => '',
			'section'     => 'contact_options'
          )
    )
  );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}