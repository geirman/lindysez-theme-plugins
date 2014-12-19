<script type="text/javascript">
    jQuery(document).ready(function() {
        var hash = window.location.hash.substring(1);
		if(hash!=''){
			var search_string = hash.indexOf("comment");
			if(search_string!=''){
				jQuery('.for_comment').removeClass('active');
				jQuery('.comment_tabs').removeClass('active');
				jQuery('.current_comment').addClass('active');
				jQuery('#comment_email').focus();				
			}
			var search_string = hash.indexOf("respond");
			if(search_string!=''){
				jQuery('.for_comment').removeClass('active');
				jQuery('.comment_tabs').removeClass('active');
				jQuery('.current_comment').addClass('active');
				jQuery('#comment_email').focus();
			}
		}
    });
</script>
<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
			die (__('Please do not load this page directly. Thanks!', 'FoodRecipe'));

	if ( post_password_required() ) { ?>
			<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'FoodRecipe'); ?></p>
	<?php
			return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
		<h3 class="blue no-print">
				<?php _e('Recipe Comments ', 'FoodRecipe'); ?>
		</h3>
		<ol class="comment-list">
			<?php wp_list_comments('type=comment&callback=recipe_comment'); ?>
		
		</ol>

<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : ?>
			<!-- If comments are open, but there are no comments. -->
	
		 <?php else : // comments are closed ?>
			<!-- If comments are closed. -->
				<p class="nocomments"><?php _e('Comments are closed.', 'FoodRecipe'); ?></p>
	
		<?php endif; ?>
<?php endif; ?>

<?php /* BEGIN TRACKBACK/PINGBACK CODE */ ?>
<?php global $trackbacks; ?>
<?php if ($trackbacks) : ?>
		
		<?php $comments = $trackbacks; ?>
		
        <div id="pingback-trackback">
				<h3 id="trackbacks"><?php echo sizeof($trackbacks); _e('Trackbacks/Pingbacks', 'FoodRecipe'); ?></h3>
				
                <ol class="pings">
		 
				<?php foreach ($comments as $comment) : ?>
			<!-- Start Your trackback Code -->
					<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
						<cite><?php comment_author_link() ?></cite>
						<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Your comment is awaiting moderation.', 'FoodRecipe'); ?></em>
						<?php endif; ?> 
						
			 		</li>
			<!-- End Your trackback Code -->
				<?php
					/* Changes every other comment to a different class */
					$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
				?>
			 
				<?php endforeach; /* end for each comment */ ?>
			 
				</ol>
		</div>
        
<?php endif; ?>
<?php /* END TRACKBACK/PINGBACK CODE */ ?>


<?php if ( comments_open() ) : ?>
		<div style='clear:both;'></div>	
		<div id="respond">
		
		<h3><?php _e('Post A', 'FoodRecipe'); ?> <span><?php _e('Comment', 'FoodRecipe'); ?></span></h3>
		
		<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
		</div>
		
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p><?php _e('You must be', 'FoodRecipe'); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e('logged in', 'FoodRecipe'); ?></a> <?php _e('to post a comment.', 'FoodRecipe'); ?></p>
		<?php else : ?>
		<div style='clear:both;'></div>	
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="contact_id"  >
		
				<?php if ( is_user_logged_in() ) : ?>
				
						<p><?php _e('Logged in as', 'FoodRecipe'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account', 'FoodRecipe'); ?>"><?php _e('Log out', 'FoodRecipe'); ?> &raquo;</a></p>
		
				<?php else : ?>
		        <p>
		                <label for="author" class="author-label"><?php _e('Your Name', 'FoodRecipe'); ?> <span>*</span></label>
		                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>"  class="field" />
		        </p>
		        <p>
		                <label for="email"><?php _e('Your Email', 'FoodRecipe'); ?> <span>*</span></label>
		                <input type="email" name="email" id="comment_email" value='<?php echo esc_attr($comment_author_email); ?>'  class="field comment_email"  required  />
		        </p>
		        <p>
		                <label for="url" class="url-label"><?php _e('Your Website', 'FoodRecipe'); ?></label>
		                <input type="url" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" class="field"/>
		        </p>
        
		<?php endif; ?>

		<p>
		
		    	<textarea name="comment" id="comment" class='comment_box' cols="54" rows="6"></textarea>
		</p>

		<p><input id="submit" class='submit_comment readmore' type="submit" name="submit" value="<?php _e('Submit Now', 'FoodRecipe'); ?>" class="submit" />
				<?php comment_id_fields(); ?>
		<br/>
		</p>
		
		<?php //do_action('comment_form', $post->ID); ?>
		
		</form>

<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; // if you delete this the sky will fall on your head ?>
