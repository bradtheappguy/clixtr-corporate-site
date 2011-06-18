<?php $settings = wordtwit_get_settings(); ?>

<div id="bnc-global">
<div class="metabox-holder" id="wordtwit-head">
	<div class="postbox">
		<div id="wordtwit-head-colour">
			<div id="wordtwit-head-title">
				<?php _e( "WordTwit", "wordtwit" ); ?> <?php wordtwit_version(); ?>
				<img class="ajax-load" src="<?php echo compat_get_plugin_url('wordtwit'); ?>/images/admin-ajax-loader.gif" style="display:none" alt="ajax"/>
			</div>
				<div id="wordtwit-head-links">
					<ul>
						<li><?php echo sprintf(__( "%sWordTwit Pro - Coming Soon!%s", "wordtwit" ), '<a href="http://www.bravenewcode.com/wordtwit-pro" target="_blank">','</a>'); ?> | </li>								
						<li><?php echo sprintf(__( "%sBNC on Twitter%s", "wordtwit" ), '<a href="http://www.twitter.com/bravenewcode" target="_blank">','</a>'); ?> | </li>
						<li><?php echo sprintf(__( "%sGet WPtouch Pro%s", "wordtwit" ), '<a href="http://www.bravenewcode.com/products/wptouch-pro/?utm_source=wordtwit&utm_campaign=wordtwit_' . WORDTWIT_VERSION . '&utm_medium=web" target="_blank">','</a>'); ?></li>									
					</ul>
				</div>
	<div class="bnc-clearer"></div>
			</div>	
	
		<div id="wordtwit-news-beta">
			<div id="wordtwit-news-wrap">
			<h3><span class="rss-feed">&nbsp;</span> <?php _e( "WordTwit Wire", "wordtwit" ); ?></h3>
				<div id="wordtwit-news-content" style="display:none"></div>
			</div>
			<div id="wordtwit-tweet-wrap">		
				<h3>&nbsp;</h3>
				<a href="http://www.bravenewcode.com/products/wptouch-pro/?utm_campaign=wordtwit_<?php echo WORDTWIT_VERSION; ?>&utm_source=wordtwit&utm_medium=web"></a>
			</div>
			<script type="text/javascript">
		    	jQuery.ajax({
		    		url: "<?php bloginfo('wpurl'); ?>/?wordtwit=news",
		    		success: function(data) {
		    			jQuery("#wordtwit-news-content").html(data).fadeIn();
		    		}});   		
		    </script>   
		</div><!-- wordtwit-news-beta -->

	<div class="bnc-clearer"></div>
	</div><!-- postbox -->
</div><!-- wordtwit-head -->

<?php if ( $settings['oauth_token'] ) { ?>
	<div class="metabox-holder">
		<div class="postbox">
	            <h3><span class="profile-settings">&nbsp;</span> <?php _e( "Twitter Profile", "wordtwit" ); ?></h3>
	
				<div class="wordtwit-left-content">
						<p><?php _e( "Your WordTwit configuration is associated with the Twitter account shown here.", "wordtwit" ); ?></p>
				</div><!-- left content -->
	
				<div class="wordtwit-right-content">
	            <?php $ok = twit_has_tokens();  ?>
	            <?php if ( $ok ) { ?>
	               <div class="avatar">
	                  <img src="<?php echo $result['user']['profile_image_url']; ?>" alt="Profile Image" />
	               </div>
	               
	               <div class="info">
	                  <h4><?php echo $result['user']['name']; ?>, <?php echo $result['user']['followers_count'] . ' ' . __('followers'); ?></h4>
	                  <p><?php if ( is_array( $result['user']['description'] ) ) _e('No Description On Account'); else echo $result['user']['description']; ?></p>
	               </div>
	            <?php } else { ?>
	               <div class="sorry">
	                  <?php _e('Sorry, the credentials you entered were rejected by Twitter.<br />Please try again.'); ?>
	               </div>
	            <?php } ?> 
	
				</div><!-- right content -->
			<div class="bnc-clearer"></div>
		</div><!-- postbox -->
	</div><!-- metabox -->
<?php } ?>

<!-- Rock n' Roll -->
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
	<div class="metabox-holder">
		<div class="postbox">
      		<h3><span class="url-settings">&nbsp;</span> <?php _e( "URL Shortening", "wordtwit" ); ?></h3>
	
				<div class="wordtwit-left-content">
						<p><?php echo sprintf( __( "As of WordTwit 2.0, you can create custom unique short URLs for links.  These links will be prefixed with: <strong>%s</strong>", "wordtwit" ), wordtwit_short_home() ); ?></p>
						<p><?php _e( "To enable this behavior, select <strong><em>Local</em></strong> as your URL shortening method, save the setting, and new options will appear.", "wordtwit" ); ?></p>
					
					<?php if ( $settings['url_type'] == 'local' ) { ?>
      				<h4><?php _e( "Link Statistics", "wordtwit" ); ?></h4>
     				<p><a href="<?php echo compat_get_plugin_url( 'wordtwit' ); ?>/ajax/urls.php?type=1" class="wordtwit-ajax"><?php _e( "Most Popular Links", "wordtwit" ); ?></a> |
     				<a href="<?php echo compat_get_plugin_url( 'wordtwit' ); ?>/ajax/urls.php?type=2" class="wordtwit-ajax"><?php _e( "Newest Links", "wordtwit" ); ?></a></p> 
     			<?php } ?>
				
				</div><!-- left content -->
	
				<div class="wordtwit-right-content">		
     					<ul class="wordtwit-make-li-italic">
							<li>
			     				<select name="wordtwit-url-type" class="long select">
			     					<option value="tinyurl"<?php if ( $settings['url_type'] == 'tinyurl' ) echo " selected"; ?>>Tinyurl - (http://tinyurl.com)</option>
			     					<option value="bitly"<?php if ( $settings['url_type'] == 'bitly' ) echo " selected"; ?>>Bit.ly - (http://bit.ly)</option>
			     					<option value="isgd"<?php if ( $settings['url_type'] == 'isgd' ) echo " selected"; ?>>Is.gd - (http://is.gd)</option>
     								<option value="owly"<?php if ( $settings['url_type'] == 'owly' ) echo " selected"; ?>>Ow.ly - (http://ow.ly)</option>
			     					
			     					<option value="post_id"<?php if ( $settings['url_type'] == 'post_id' ) echo " selected"; ?>><?php _e( "Post ID", "wordtwit" ); ?> - (<?php echo wordtwit_post_id_url_base() . '100'; ?>)</option>

			     					<option value="local"<?php if ( $settings['url_type'] == 'local' ) echo " selected"; ?>><?php _e( "Local", "wordtwit" ); ?> - (<?php echo wordtwit_short_home(); ?>)</option>
			     				</select>
			    				<label for="wordtwit-url-type"><?php _e( "Shortening Method", "wordtwit" ); ?></label>
     						</li>
     					</ul>
     				<?php if ( $settings['url_type'] == 'local' ) { ?>
     				<ul class="wordtwit-make-li-italic">     			    				

						<li>
		     				<input type="text" name="wordtwit-url" id="wordtwit-url" class="long" value="http://" /> 
		     				<a href="#" id="create-url" onclick="var x = jQuery('#wordtwit-url').val(); jQuery.get('<?php echo get_bloginfo( 'wpurl' ) . '/?wordtwit=create&amp;url='; ?>' + x,  function( d ) {  jQuery('#url-holder').show(); jQuery('#url-result').hide().html( '<a href=' + d + ' target=_blank>' + d + '</a>' ).fadeIn();  } ); return false;"><?php _e( 'create', 'wordtwit' ); ?></a>
		     				<label for="wordtwit-url"><?php _e( "Create a New URL", "wordtwit" ); ?></label>
		     				<div id="url-holder" style="display:none;">
		     					<span id="url-result">&nbsp;</span>
		     				</div>
	     				</li>
	     				<li>
		     				<input type="text" name="alternate-domain" class="long" value="<?php echo $settings['alternate_domain']; ?>" />
		     				<label for="alternate-domain"><?php _e( "Use Alternate Domain", "wordtwit" ); ?></label>
	     				</li>
	     				<li>
		     				<input class="check" type="checkbox" name="enable_banner"<?php if ( $settings['enable_banner'] ) echo (" checked" ); ?> />
		     				<label for="enable_banner"><?php _e( "Enable banner on external sites", "wordtwit" ); ?></label>
	     				</li>	     				
	     				<li>
		     				<input class="check" type="checkbox" name="enable_content_conversion"<?php if ( $settings['enable_content_conversion'] ) echo (" checked" ); ?> />
		     				<label for="enable_content_conversion"><?php _e( "Dynamically convert all local content links into short URLs", "wordtwit" ); ?></label>
	     				</li> 				
	     				
	     				<?php } else if ( $settings['url_type'] == 'bitly' ) { ?>
	     				<li>
		     				<input type="text" name="bitly-user-name" id="bitly-user-name" value="<?php if ( isset( $settings['bitly-user-name'] ) ) echo $settings['bitly-user-name']; ?>" /	
		     				<label for="bitly-user-name"><?php _e( "Bit.ly User Name", "wordtwit" ); ?></label>
	     				</li>
	     				<li>
		     				<input type="text" name="bitly-api-key" id="bitly-api-key" value="<?php if ( isset( $settings['bitly-api-key'] ) ) echo $settings['bitly-api-key']; ?>" />     
		     				<label for="bitly-api-key"><?php _e( "Bit.ly API key", "wordtwit" ); ?></label>
	     				</li>
	     				<?php } else if ( $settings['url_type'] == 'post_id' ) { ?>
	     				<li>
	     					<input type="checkbox" class="check" id="remove-www" name="remove-www"<?php if ( $settings['remove-www'] ) echo ' checked'; ?> />
							<label for="remove-www"><?php _e( "Remove www from links", "wordtwit" ); ?></label>
						</li>
	     				<?php } ?>   				
					
					</ul>
	
				</div><!-- right content -->
			<div class="bnc-clearer"></div>
		</div><!-- postbox -->
	</div><!-- metabox -->


	<div class="metabox-holder">
		<div class="postbox">
			<h3><span class="account-settings">&nbsp;</span> <?php _e( "Account Login / Tweet Message", "wordtwit" ); ?></h3>       
	
				<div class="wordtwit-left-content">
					<p><?php _e( "WordTwit allows you to publish a tweet whenever a new entry is published. ", "wordtwit" ); ?></p>
					<p><?php _e( "You can also customize the message WordTwit posts to your account by using the \"message\" field below.  You can use [title] to represent the title of your entry, and [link] to represent the URL.", "wordtwit" ); ?></p><br /><br />
					<p><?php echo sprintf( __( "You can also define a %scustom application%s via Twitter and have WordTwit Tweet on your application's behalf.  Clear both of these fields to use the default OAuth configuration.", "wordtwit" ), '<a href="http://dev.twitter.com/apps" target="_blank">', '</a>' ); ?></p>
				</div><!-- left content -->
	
				<div class="wordtwit-right-content">
					<div id="profile-box">
					<?php if ( !$settings['oauth_access_token'] ) { ?>
						<?php $auth_url = wordtwit_get_auth_url(); ?>
						<?php if ( $auth_url ) { ?>
							<a class="sign-in" href="<?php echo $auth_url; ?>"><?php _e( 'Sign-in Using Twitter', 'wordtwit' ); ?></a>						
						<?php } else { ?>
							<div class="auth-error">
								<?php _e( 'Unable to obtain authorization URL from Twitter. ', 'wordtwit' ); ?><br />
								<?php echo sprintf( __( 'Please make sure your server time is accurate or adjust the OAuth Time Offset below.  <br />If problem persists, visit the %ssupport forums%s and report your problem', 'wordtwit' ), '<a href="http://bravenewcode.com/support/forum/wordtwit/">', '</a>' ); ?>
							</div>
							
						<?php } ?>
					<?php } else { ?>						
							<img class="avatar" src="<?php echo $settings['profile_image_url']; ?>" alt="" />
							<h4><?php echo $settings['screen_name']; ?></h4>
							<?php if ( $settings['location'] ) { ?>
							<h5><?php echo $settings['location']; ?></h5>
							<?php } ?>
							<p>
							<?php _e( 'Your account has  been authorized.', 'wordtwit' ); ?> <a href="<?php echo $_SERVER['REQUEST_URI']; ?>&wordtwit=deauthorize" onclick="return confirm( '<?php _e( 'Are you sure you want to deauthorize your Twitter account?', 'wordtwit' ); ?>');"><?php _e( 'Click to deauthorize', 'wordtwit' ); ?></a>.<br />
								<?php if ( count( $settings['tweet_queue'] ) ) { ?>
									<?php echo sprintf( __( "%d pending tweet(s)", "wordtwit" ), count( $settings['tweet_queue'] ) ); ?>	
								<?php } ?>
							</p>
							
							<div class="retweet-clear"></div>	
					<?php } ?>
						<ul class="wordtwit-make-li-italic">
							<li>	
								<input type="text" name="message" value="<?php echo( htmlentities( $settings['message'], ENT_COMPAT, "UTF-8" ) ); ?>" class="long" />
								<label for="message"><?php _e( "Message", "wordtwit" ); ?></label>
							</li>	
						</ul>	
					</div>
 					
					<ul class="wordtwit-make-li-italic">
						<li id="oauth_consumer_key">
							<input type="text" name="oauth_consumer_key" value="<?php echo( htmlentities( $settings['oauth_consumer_key'], ENT_COMPAT, "UTF-8" ) ); ?>" class="long" />
							<label for="oauth_consumer_key"><?php _e( "OAuth Consumer Key", "wordtwit" ); ?></label>	
						</li>
						<li>
							<input type="text" name="oauth_consumer_secret" value="<?php echo( htmlentities( $settings['oauth_consumer_secret'], ENT_COMPAT, "UTF-8" ) ); ?>" class="long" />
							<label for="oauth_consumer_secret"><?php _e( "OAuth Consumer Secret", "wordtwit" ); ?></label>							
						</li>
					</ul>
				
	

					
				</div><!-- right content -->
			<div class="bnc-clearer"></div>
		</div><!-- postbox -->
	</div><!-- metabox -->


	<div class="metabox-holder">
		<div class="postbox">
			<h3><span class="tag-settings">&nbsp;</span> <?php _e( "Tag/Category Options", "wordtwit" ); ?></h3>
	
				<div class="wordtwit-left-content">
						<p><?php _e( "The default behaviour of WordTwit is to publish all new posts as Tweets to your Twitter stream.", "wordtwit" ); ?></p>
						<p><?php _e( "WordTwit can also be configured to include/exclude entries that have a specific tag or category. ", "wordtwit" ); ?></p>
				</div><!-- left content -->
	
				<div class="wordtwit-right-content">
 					<ul class="wordtwit-make-li-italic">
						<li>
							<input type="text" id="wordtwit-tags" name="wordtwit-tags" value="<?php echo implode( $settings['tags'], ', '); ?>" />
							<label for="wordtwit-tags"><?php echo sprintf( __( "Associated Tags/Categories <small>(comma separated)</small>", "wordtwit" ) ); ?></label>
						</li>
						<li>
						<input type="checkbox" class="check" id="wordtwit-reverse" name="wordtwit-reverse"<?php if ( $settings['reverse'] ) echo ' checked'; ?> />
						<label for="wordtwit-reverse"><?php _e( "Reverse behaviour <small>(exclude tags/categories listed above)</small>", "wordtwit" ); ?></label>
						</li>
					</ul>
				</div><!-- right content -->
			<div class="bnc-clearer"></div>
		</div><!-- postbox -->
	</div><!-- metabox -->
	
	<div class="metabox-holder">
		<div class="postbox">
			<h3><span class="advanced-settings">&nbsp;</span> <?php _e( "Advanced Options", "wordtwit" ); ?></h3>
			<div class="wordtwit-left-content">
					<p><?php _e( "You can configure advanced WordTwit settings in this area.", "wordtwit" ); ?></p>
					<p><?php _e( "When UTM tags are enabled, utm_source will be set to wordtwit, and utm_medium will be set to social.", "wordtwit" ); ?></p>
			</div><!-- left content -->
			<div class="wordtwit-right-content">
				<ul class="wordtwit-make-li-italic">
					<li>
						<input type="checkbox" class="check" id="enable-utm" name="enable-utm"<?php if ( $settings['enable-utm'] ) echo ' checked'; ?> />
						<label for="enable-utm"><?php _e( "Enable Urchin Tracking Module (UTM) Tags <small>(for statistics tracking)</small>", "wordtwit" ); ?></label>
					</li>
					<li>
						<input type="checkbox" class="check" id="enable-tweet-queue" name="enable-tweet-queue"<?php if ( $settings['enable-tweet-queue'] ) echo ' checked'; ?> />
						<label for="enable-tweet-queue"><?php _e( "Enable Tweet Queue - Experimental <small>(for failed Tweets)</small>", "wordtwit" ); ?></label>
					</li>	
					<li>
						<input type="checkbox" class="check" id="tweet_old_posts" name="tweet_old_posts"<?php if ( $settings['tweet_old_posts'] ) echo ' checked'; ?> />
						<label for="tweet_old_posts"><?php _e( "Allow Tweeting of Old Posts", "wordtwit" ); ?></label>
					</li>					
					<?php if ( function_exists( 'curl_init' ) ) { ?>				
					<li>
						<input type="checkbox" class="check" id="disable-curl" name="disable-curl"<?php if ( $settings['disable_curl'] ) echo ' checked'; ?> />
						<label for="disable-curl"><?php _e( "Disable CURL support", "wordtwit" ); ?></label>					
					</li>
					<?php } ?>
					<li>
						<input type="checkbox" class="check" id="enable_debug_log" name="enable_debug_log"<?php if ( $settings['enable_debug_log'] ) echo ' checked'; ?> />
						<label for="enable_debug_log"><?php _e( "Enable Debug Log", "wordtwit" ); ?></label>
					</li>
					
					<li>
						<input type="text" id="oauth_time_offset" name="oauth_time_offset" value="<?php echo $settings['oauth_time_offset']; ?>" />
						<label for="oauth_time_offset"><?php echo sprintf( __( "OAuth Time Offset (in seconds). %sEstimate offset%s.", "wordtwit" ), '<a href="#" id="estimate-oauth-offset">', '</a>' ); ?></label>
					</li>
				</ul>
			</div><!-- right content -->
			<div class="bnc-clearer"></div>	
		</div>		
	</div>	

	<input type="submit" id="bnc-button" name="wordtwit_update_settings" value="Update Options" class="button-primary" />
</form>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input type="submit" onclick="return confirm('<?php _e('Restore default WordTwit settings?', 'wordtwit' ); ?>');" name="reset" value="<?php _e('Restore Defaults', 'wordtwit' ); ?>" id="bnc-button-reset" class="button-highlighted" />
	</form>
		
</div><!-- #wordtwit-plugin -->
