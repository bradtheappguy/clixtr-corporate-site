<?php global $tweet_urls; ?>

<div id="link-area"><h4>Link Statistics</h4><span id="link-all"><a href="#" onclick="jQuery('tr.ext').show(); jQuery('tr.int').show(); return false;">Show all</a></span><span id="link-int"> | <a href="#" onclick="jQuery('tr.ext').hide(); jQuery('tr.int').show(); return false;">Internal links</a></span>
<span id="link-ext"> | <a href="#" onclick="jQuery('tr.int').hide(); jQuery('tr.ext').show(); return false;">External links</a></span>
</div>

<table id="url-table">
		<tr>
			<th class="first"><?php _e( "Original URL", "wordtwit" ); ?></th>
			<th><?php _e( "Short URL", "wordtwit"); ?></th>
			<th><?php _e( "Views", "wordtwit" ); ?></th>
		</tr>
	<?php $count = 0; $num_int = 0; $num_ext = 0; ?>
	<?php foreach ( $tweet_urls as $url ) { ?>
		<?php $add_class = 'items '; ?>
		<?php if ( $count %2 == 1 ) $add_class = $add_class . "alt "; ?>
		<?php if ( $url->post_id ) { $add_class = $add_class . "int"; $num_int++; } else { $add_class = $add_class . "ext"; $num_ext++; } ?>
		<tr<?php echo ' class="' . $add_class . '"'; ?>>
			<?php if ( $url->post_id ) { ?>
				<?php $query = new WP_Query('p=' . $url->post_id); ?>
				<?php if ( $query ) { ?>
					<?php $query->the_post(); ?>
					<td class="first internal"><a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a></td>
				<?php } ?>
			<?php } else { ?>
				<td class="first external"><a href="<?php echo $url->original; ?>" target="_blank"><?php echo $url->original; ?></a></td>			
			<?php } ?>
			<td><a href="<?php echo wordtwit_short_home() . $url->url; ?>" target="_blank"><?php echo wordtwit_short_home() . $url->url; ?></a></td>
			<td><?php echo $url->views; ?></td>
		</tr>
		<?php $count = $count + 1; ?>
	<?php } ?>
</table>

<script type="text/javascript">
	<?php if ( $num_int == 0 || $num_ext == 0 ) { ?>
			jQuery('#link-area').hide();
	<?php } else { ?>
		<?php if ( $num_int == 0 ) { ?>
			jQuery('#link-int').hide();
		<?php } ?>
		<?php if ( $num_ext == 0 ) { ?>
			jQuery('#link-ext').hide();
		<?php } ?>	
	<?php } ?>
</script>