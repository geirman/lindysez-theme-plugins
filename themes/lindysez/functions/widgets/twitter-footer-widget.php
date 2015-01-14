<?php

/********* Starting Twitter Widget for Footer *********/

class Twitter_Footer_Widget extends WP_Widget {
	
	function Twitter_Footer_Widget(){
	  		$widget_ops = array( 'classname' => 'Twitter_Footer_Widget', 'description' => __('This widget shoes latest tweets from given Twitter ID', 'FoodRecipe'));
			$this->WP_Widget( 'twitter_footer_widget', __('Food Recipe: Twitter Widget', 'FoodRecipe'), $widget_ops );
	}
	
/********* Starting Twitter Widget Function *********/

	function widget($args,  $instance) {
			extract($args);
			
			$title = apply_filters('widget_title', $instance['title']);		
			if ( empty($title) ) 
					$title = false;
			
			$twitter_id =  $instance['twitter_id'];
			$tweets_count =  $instance['tweets_count'];
	
			if($title):
				
					$temp_title = explode(' ',$title);
					$first_letter = $temp_title[0];
							unset($temp_title[0]);
					$title_new = implode(' ', $temp_title);
					$title = $first_letter.' <span>'.$title_new.'</span>';
				
			endif;
			
			echo '<h2 class="w-bot-border">'.$title.'</h2>';

        /* Twitter API Version 1.1 Based Code */
        $transName = 'theme_tweets';
        $cacheTime = 10;

        if(false === ($twitterData = get_transient($transName) ) ){
            require_once 'twitteroauth/twitteroauth.php';

            $twitterConnection = new TwitterOAuth(
                'ZsPBd3KaeAZ6U1ZUYFq0jA',	                            // Consumer Key
                '7wdHC1StOtYIeYQlAs4jCK2fOE9lSnmihuwLKshKg',   	        // Consumer secret
                '110366502-oz7lvWizMOCg2qgM0l5AKZqvQ9ZoaUXXeJZ6oNFw',   // Access token
                'ePsvEVJ9ye3W0vc6PqeI31niQ6fK1ilF66nkUV4bHE'    	        // Access token secret
            );

            $twitterData = $twitterConnection->get(
                'statuses/user_timeline',
                array(
                    'screen_name'     => $twitter_id,
                    'count'           => $tweets_count,
                    'exclude_replies' => true
                )
            );

            if($twitterConnection->http_code != 200)
            {
                $twitterData = get_transient($transName);
            }
            // Save our new transient.
            set_transient($transName, $twitterData, 60 * $cacheTime);
        }

        if(!empty($twitterData) || !isset($twitterData['error'])){

            $i=0;
            $hyperlinks = true;
            $encode_utf8 = true;
            $twitter_users = true;
            $update = true;

            echo '<div id="twitter_update_list" class="widget nostylewt"><ul>';
            foreach($twitterData as $item){
                $msg = $item->text;

                if($encode_utf8) $msg = utf8_encode($msg);

                $msg = $this->encode_tweet($msg);

                echo '<li class="twitter-item">';
                if ($hyperlinks) {    $msg = $this->hyperlinks($msg); }
                if ($twitter_users)  { $msg = $this->twitter_users($msg); }
                echo $msg . '<br>';
                if($update) {
                    $time = strtotime($item->created_at);

                    if ( ( abs( time() - $time) ) < 86400 )
                        $h_time = sprintf( __('%s ago','FoodRecipe'), human_time_diff( $time ) );
                    else
                        $h_time = date(__('jS M Y','FoodRecipe'), $time);

                    echo sprintf( __('%s', 'FoodRecipe'),'<span class="twitter-timestamp">' . $h_time . '</span>' );
                }
                echo '</li>';
                $i++;
                if ( $i >= $tweets_count ) break;
            }
            echo '</ul></div>';
        }

	}
	

/********* Starting Twitter Widget Admin Form *********/

	function form($instance) 
	{			
		$instance = wp_parse_args( (array) $instance, array( 'title' => __('Twitter Feed', 'FoodRecipe'), 'twitter_id' => 'envato', 'tweets_count' => 2 ) );
		
        $title= esc_attr($instance['title']);
		
		$twitter_id =  $instance['twitter_id'];
		$tweets_count =  $instance['tweets_count'];
		
		?>
				<p>
			            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('twitter_id'); ?>"><?php _e('Twitter ID', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('twitter_id'); ?>" name="<?php echo $this->get_field_name('twitter_id'); ?>" type="text" value="<?php echo $twitter_id; ?>" />
		        </p>
	            <p>
			            <label for="<?php echo $this->get_field_id('tweets_count'); ?>"><?php _e('Number of Tweets', 'FoodRecipe'); ?></label>
			            <input class="widefat" id="<?php echo $this->get_field_id('tweets_count'); ?>" name="<?php echo $this->get_field_name('tweets_count'); ?>" type="text" value="<?php echo $tweets_count; ?>" />
		        </p>
		<?php
	}
	

/********* Starting Twitter Widget Update Function *********/

	function update($new_instance, $old_instance) 
	{
	        $instance=$old_instance;		
			$instance['title'] = strip_tags($new_instance['title']);
	        $instance['twitter_id'] = strip_tags($new_instance['twitter_id']);
			$instance['tweets_count'] = intval($new_instance['tweets_count']);
			
	        return $instance;
    }


    /**
     * Find links and create the hyperlinks
     */
    private function hyperlinks($text) {
        $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
        $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
        // match name@address
        $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
        //mach #trendingtopics. Props to Michael Voigt
        $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
        return $text;
    }

    /**
     * Find twitter usernames and link to them
     */
    private function twitter_users($text) {
        $text = preg_replace('/([\.|\,|\:|\¡|\¿|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
        return $text;
    }

    /**
     * Encode single quotes in your tweets
     */
    private function encode_tweet($text) {
        $text = mb_convert_encoding( $text, "HTML-ENTITIES", "UTF-8");
        return $text;
    }

	
}

?>