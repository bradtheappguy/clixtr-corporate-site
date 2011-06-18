<?php global $tweets; ?>
<h2><?php _e( "Recent Tweets", "wordtwit" ); ?></h2>
<ul class="wordtwit-recent-tweets">
	<?php foreach( $tweets as $tweet ) { ?>
		<li><?php echo str_replace( "href=", "target='_blank' rel='nofollow' href=", $tweet['content'] ); ?> [<a target="_blank" rel="nofollow" href="<?php echo $tweet['link']['0_attr']['href']; ?>">#</a>]</li>
	<?php } ?>
</ul>