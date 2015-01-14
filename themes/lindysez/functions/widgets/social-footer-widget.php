<?php

/********* Starting Social Widget for Footer *********/

class Social_Footer_Widget extends WP_Widget {
	
	function Social_Footer_Widget(){
	  		$widget_ops = array( 'classname' => 'Social_Footer_Widget', 'description' => __('This widget provides a mailchimp based subscription form and social buttons', 'FoodRecipe'));
			$this->WP_Widget( 'Social_footer_widget', __('CG: Social Widget for Footer', 'FoodRecipe'), $widget_ops );
	}
	
/********* Starting Social Widget Function *********/

	function widget($args,  $instance) {
			extract($args);
			
			$title = apply_filters('widget_title', $instance['title']);		
			if ( empty($title) ) 
					$title = false;
			
			$mailchimp_url 	=  	$instance['mailchimp_url'];
			$facebook_url 	= 	$instance['facebook_url'];
			$twitter_url	=	$instance['twitter_url'];
			$youtube_url	=	$instance['youtube_url'];
			$pinterest_url	=	$instance['pinterest_url'];
			$rss_url		=	$instance['rss_url'];
			$google_url		=	$instance['google_url'];
	
			if($title):
				
					$temp_title = explode(' ',$title);
					$first_letter = $temp_title[0];
							unset($temp_title[0]);
					$title_new = implode(' ', $temp_title);
					$title = $first_letter.' <span>'.$title_new.'</span>';
				
			endif;
		echo "<div class='stay_connected'>"	;
			echo '<h2>'.$title.'</h2>';
									
			?>
			<!-- Begin MailChimp Signup Form -->
			
			<form action="<?php echo $mailchimp_url ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="ls_social" novalidate>
				<label for="mce-EMAIL">Subscribe by Email:</label>
				<input type="email" value="" name="EMAIL" class="required email " placeholder="your@email.com">
				<input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="subscriber">
			</form>
		</div>
			<!--End mc_embed_signup-->	
			<div id="footer_social_buttons">
				<?php if(!empty($facebook_url)): ?><a href="<?php echo $facebook_url ?>" class="facebook" target="ls_social"></a><?php endif; ?>
				<?php if(!empty($twitter_url)): ?><a href="<?php echo $twitter_url ?>" class="twitter" target="ls_social"></a><?php endif; ?>
				<?php if(!empty($youtube_url)): ?><a href="<?php echo $youtube_url ?>" class="youtube" target="ls_social"></a><?php endif; ?>
				<?php if(!empty($pinterest_url)): ?><a href="<?php echo $pinterest_url ?>" class="pinterest" target="ls_social"></a><?php endif; ?>
				<?php if(!empty($rss_url)): ?><a href="<?php echo $rss_url ?>" class="rss" target="ls_social"></a><?php endif; ?>
				<?php if(!empty($google_url)): ?><a href="<?php echo $google_url ?>" class="google" target="ls_social"></a><?php endif; ?>
			<h6><?php echo ot_get_option( 'copyright_statement' ); ?></h6>
			</div>		
			<?php
	}
	

/********* Starting Social Widget Admin Form *********/

	function form($instance) 
	{			
		$instance = wp_parse_args( (array) $instance, 
			array( 
				'title' => 'Stay Connected', 
				'mailchimp_url' => 'http://lindysez.us6.list-manage.com/subscribe/post?u=918fea2960f19cc09d2734c94&amp;id=d92299b8a6',
				'facebook_url' => '',
				'twitter_url' => '',
				'youtube_url' => '',
				'pinterest_url' => '',
				'rss_url' => '/feed/',
				'google_url' => '' 
			)
		);
		
        	$title= esc_attr($instance['title']);
			$mailchimp_url =  $instance['mailchimp_url'];
			$facebook_url 	= 	$instance['facebook_url'];
			$twitter_url	=	$instance['twitter_url'];
			$youtube_url	=	$instance['youtube_url'];
			$pinterest_url	=	$instance['pinterest_url'];
			$rss_url		=	$instance['rss_url'];
			$google_url		=	$instance['google_url'];
		
		?>
				<p>
			            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('mailchimp_url'); ?>"><?php _e('MailChimp URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('mailchimp_url'); ?>" type="text" value="<?php echo $mailchimp_url; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('facebook_url'); ?>" type="text" value="<?php echo $facebook_url; ?>" />
		        </p>	
	            <p>
			            <label for="<?php echo $this->get_field_id('twitter_url'); ?>"><?php _e('Twitter URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('twitter_url'); ?>" type="text" value="<?php echo $twitter_url; ?>" />
		        </p>	
	            <p>
			            <label for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php _e('YouTube URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('youtube_url'); ?>" type="text" value="<?php echo $youtube_url; ?>" />
		        </p>	
	            <p>
			            <label for="<?php echo $this->get_field_id('pinterest_url'); ?>"><?php _e('Pinterest URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('pinterest_url'); ?>" type="text" value="<?php echo $pinterest_url; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('rss_url'); ?>"><?php _e('RSS URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('rss_url'); ?>" type="text" value="<?php echo $rss_url; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('google_url'); ?>"><?php _e('G+ URL', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('google_url'); ?>" type="text" value="<?php echo $google_url; ?>" />
		        </p>	
								
		<?php
	}
	

/********* Starting Social Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['mailchimp_url'] = strip_tags($new_instance['mailchimp_url']);
	        $instance['facebook_url'] = strip_tags($new_instance['facebook_url']);
	        $instance['twitter_url'] = strip_tags($new_instance['twitter_url']);
	        $instance['youtube_url'] = strip_tags($new_instance['youtube_url']);
	        $instance['pinterest_url'] = strip_tags($new_instance['pinterest_url']);
	        $instance['rss_url'] = strip_tags($new_instance['rss_url']);
	        $instance['google_url']	= strip_tags($new_instance['google_url']);        	        	        	        			
	        return $instance;
    }
	
}