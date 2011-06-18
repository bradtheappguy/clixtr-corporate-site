<?php global $post; ?>
<?php $settings = wordtwit_get_settings(); ?>

<div id="wordtwit-post-widget">

	<div class="misc-pub-section wt-status-bar">
		<table>
			<tr>
				<td class="left-td"><?php _e( 'Chars Left:', "wordtwit" ); ?></td>
				<td id="number">&nbsp;</td>
			</tr>
			<tr>
				<td class="left-td"><?php _e( 'Status:', "wordtwit" ); ?> </td>
				<td>
					<?php 
						$has_been_twittered = false;
						$was_tweeted = get_post_meta( $post->ID, 'has_been_twittered', true );
						switch ( $was_tweeted ) { 
							case 'yes':
								echo "<strong class='tweeted'>" . __( "Tweeted", "wordtwit" ) . "</strong>"; 
								$has_been_twittered = true;
								break;
							case 'pending':
								echo "<strong class='pending'>" . __( "Pending", "wordtwit" ) . "</strong>";
								break;
							case 'previously':
								echo "<strong class='tweeted'>" . __( "Tweeted Previously", "wordtwit" ) . "</strong>";
								break;
							case 'failed':
								echo "<strong class='failed'>";
								echo __( "Tweet Failed", "wordtwit" );
								$failure_code = get_post_meta( $post->ID, 'twitter_failure_code', true );
								if ( $failure_code ) {
									if ( $failure_code >= 400 ) {
										$msg = get_post_meta( $post->ID, "twitter_failure_reason", true );
										if ( $msg ) {
											echo ":<br />" . $msg;
										}	
									}
		
								}
								echo "</strong>";
								break;
							default:
								echo "<strong class='not-tweeted'>" . __( "Not Tweeted", "wordtwit" ) . "</strong>";
								break;
						} 
						
						?>				
				</td>
			</tr>
		</table>
		<div class="retweet-clear"></div>
	</div>
	<input type="hidden" name="wordtwit_nonce" id="wordtwit_nonce" value="<?php echo wp_create_nonce( 'WordTwit' ); ?>" />		
	<?php if ( get_the_title() ) { ?>
		<div class="misc-pub-section" class="wordtwit-preview">
			<?php __( 'Preview:', 'wordtwit' ); ?> <span class="wt-preview"><?php $msg = wordtwit_get_message( $_GET['post'] ); echo $msg; ?></span>
			<div class="retweet-clear"></div>
		</div>
	
		<?php if ( wordtwit_is_bitly() ) { ?>
		<div class="misc-pub-section">
			<?php echo sprintf( __( 'Views: %s', 'wordtwit' ), '<span class="wt-preview">' .  twit_get_bitly_views( $msg ) . '</span>' ); ?>
		</div>
		<?php } ?>

		<?php if ( !$has_been_twittered ) { ?>
			<div id="retweet-button">
			<a class="button" href="<?php wordtwit_retweet_link(); ?>"><?php _e( "Retry Tweet", "wordtwit" ); ?></a>
			</div>	
		<?php } else { ?>
			
		<?php } ?>
	<?php } ?>
	<div class="retweet-clear"></div>

</div>
