


<ul class="single_social">
	<li><a class="share-pop" title="Tweet It!" href="http://twitter.com/home?status=<?php echo urlencode(get_the_title());?>%20-%20<?php the_permalink(); ?>" onclick="window.open(this.href,'twitter','width=600,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" target="LindySez"><img src="<?php echo get_template_directory_uri(); ?>/images/twiiter_single.gif" alt="twitter"></a></li>
	<li><a class="facebook share-pop" title="Facebook It!" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href,'facebook','width=600,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" target="LindySez"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook_single.gif" alt="facebook"></a></li>
	<li><a class="google share-pop" title="Google+ It!" href="https://m.google.com/app/plus/x/?v=compose&amp;content=<?php echo urlencode(get_the_title());?>%20-%20<?php the_permalink(); ?>" onclick="window.open(this.href,'gplusshare','width=600,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" target="LindySez"><img src="<?php echo get_template_directory_uri(); ?>/images/google_single.gif" alt="google"></a></li>
	<?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
	<li><a class="pinterest share-pop" title="Pin It!" href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" onclick="window.open(this.href,'pinterest','width=600,height=300,left='+(screen.availWidth/2-375)+',top='+(screen.availHeight/2-150)+'');return false;" count-layout="none"  target="LindySez"><img src="<?php echo get_template_directory_uri(); ?>/images/pinterest_single.gif" alt="pinterest"></a></li>
	<li><a class="print" href="javascript:window.print()" title="Print It!"><img src="<?php echo get_template_directory_uri(); ?>/images/print2_sinle.gif" alt="print"></a></li>
</ul>
<div style='clear:both'></div>