=== Plugin Name ===
Contributors: BraveNewCode
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=paypal%40bravenewcode%2ecom&item_name=WordTwit%20Beer%20Fund&no_shipping=1&tax=0&currency_code=CAD&lc=CA&bn=PP%2dDonationsBF&charset=UTF%2d8
Tags: wordtwit, twitter, posts, social media, social networking, automattic, bravenewcode, wptouch, tinyurl, owl.ly, bit.ly
Requires at least: 2.8
Tested up to: 3.1
Stable tag: 2.6.1

WordTwit is a plugin that uses the Twitter API to automatically push a published post to your Twitter account as a tweet.

== Description ==

WordTwit keeps track of when you publish new posts, and automatically informs
all followers by pushing out a Twitter tweet.  All links are
automatically converted to tiny URLs to save space.  Most users see a
substantial increase in blog traffic after tweeting their posts on a frequent
basis. 

Please visit http://www.bravenewcode.com/wordtwit-pro/ for information about
the upcoming WordTwit Pro plugin!

== Changelog ==

= Version 2.6.1 =

* Fixed: Broken 'Allow Tweeting of Old Posts' setting
* Fixed: Removed extra definition for tweet cache time
* Fixed: Broken Sign-in To Twitter image (Twitter removed it from their servers)
* Changed: Unobfuscated WordTwit OAuth keys

= Version 2.6 =

* Added: Simple character count to post WordTwit status box
* Added: Tweet error messages
* Added: Ability to automatically adjust OAuth time offset
* Added: Ability to utilize a custom Twitter application for Tweets
* Fixed: Bug with apostrophes in category name
* Changed: Stopped a CSS file from loading which isn't used anymore
* Changed: Logic regarding old Tweet times
* Updated: Language .pot file.  Please submit translations to translation (at) bravenewcode.com.

= Version 2.5.1 =

* Added: Debugging code
* Added: Server time offset to adjust the time for OAuth
* Fixed: Issue where CURL wouldn't always work

= Version 2.4.7 =

* Fixed: Issue with case-insensitive local URLs
* Fixed: Issue with Disable CURL support checkbox

= Version 2.4.6 =

* Added: Code to break caching of CSS files

= Version 2.4.5 =

* Fixed: bug where curl-based installations would fail to post Tweets
* Fixed: issue with local URL generation and non-root WordPress installations
* Changed: stylesheet output to be compatible with SSL setups
* Updated: Transalation file, lang/wordtwit.pot - please send translations to translation@bravenewcode.com

= Version 2.4.4 = 

* Added: Compatibility of new API with WPtouch 1.9.13

= Version 2.4.2 =

* Added: Option to enable experimental Tweet queue (disable this if you're having pending tweet problems)
* Added: hmac-sha1 routine for PHP4, should hopefully allow PHP4 users to use WordTwit again
* Changed: Default behaviour is to disable the Tweet queue.  
* Changed: Routines that show Tweets
* Removed: Old code that's not used anymore

= Version 2.4.1 =

* Added: check for error when contacting Twitter
* Added: removal of Tweets from the queue when Twitter fails due to a duplicate Tweet 
* Added: indication of outstanding Tweets in administration panel

= Version 2.4  =

* Changed Tweet mechanism to be asynchronous.  
* Now queues failed Tweets for future attempts.  
* Better checking for failed Tiny URL conversions.  Should queue failures to try again later
* Updated authorization mechanism to OAuth - will require reauthorizing your user account (requires PHP5)

= Version 2.3.5 =

Fixed bug with missing parameter

= Version 2.3.4 =

Updated HootSuite code to fix bug in administration edit/post pages

= Version 2.3.3 =

* Removed snoopy and added a timeout on requests for get_recent_tweets
* Changed time handling for WPtouch integration -- requires WPtouch 1.9.9.2

= Version 2.3.2 =

* Fixed bug having to do with garbled Tweet display in WPtouch on Twitter accounts with only one tweet

= Version 2.3.1 =

* Added support for is.gd
* Added the ability to view the number of clicks on bit.ly links


= Version 2.3.0 =

* Added documentation for WordPress MU
* Added ability to re-tweet old pages, or to force a tweet after an unsuccessful Twitter attempt

= Version 2.2.6 = 

* Added styling for when no Tweets exist
* Minor administration improvements
* Added WP 2.9 compatibility & tweaks
* Suppressed warning message 
* Added fixes as suggested by majilab for tweets & languages
* Fixed bug with Twitter display times in WPtouch
* Added ability for WPtouch to display recent tweets in header
* Added a widget to show recent tweets
* Updated minimum WordPress version requirement to 2.7
* Fixed a CSS bug on avatars
* Admin js and css files now only load on WordTwit Options page
* Validated the admin XHTML with W3C standards

= Version 2.1.6.1 =

* Updated Fancybox admin script, css + images to 2.1.5
* Removed css references to images which don't exist
* Updated admin styling for BNC Global plugin appearance
* Changed URL generation to work with recent changes to the ow.ly service
* Added settings link for plugin when activated
* Updated ReadMe with correct WP compatible version number (2.8.4)
* Removed OAuth code for Twitter as it depends on PHP5.  Will replace it at some point.
* Fixed a bug where bitly URLs would not end up in the user's history
* Linked support forum link directly to WordTwit forum
* Added BNC newsletter to the admin panel
* Removed utf8_encode function as it was causing problems for non-english users
* Increased size of URL database field for local URL generation to 512 characters
* Revised admin appearance & layout (congruent with WPtouch 1.9 admin)
* Fixed a bug with garbage encoded characters being inserted into the Twitter update message
* Added support for the ow.ly URL shortener.  
* Added code such that when a URL shortening service is down, then original permalink is used instead

= Version 2.0.x =

* Removed link details hyperlinks when local URL is not selected
* Added support for bit.ly URL shortener.  Requires a valid username and API key from their site.
* Fixed error message warning when tags or categories are not set on a post
* Updated TinyURL generation with PHP4 routines
* Updated compatibility file to not conflict with WPtouch
* Added compatibility file -- should hopefully fix problems with non standard WordPress installations
* Fixed bug where short URLs couldn't be created in the administration panel
* Fixed MySQL query
* Added POT file, please email translations to inquiry@bravenewcode.com
* Fixed typos
* Added ability to generate custom tiny urls
* Added ability to add an alternate (i.e. smaller) domain for tiny url generation
* Added integrated ability to track tiny url clicks
* Added ability to include/exclude posts to WordTwit based on tags/categories
* Added ability to convert all content links into custom URLs with link tracking
* Major clean-up and re-styling of the administration panel
* Fixed bug where WordTwit admin panel was shown to all users (whoops)


= Version 1.3.x =
* Now tested up to WordPress 2.7.1
* Old posts no longer get Twittered when modified or republished
* Slight style fixes in the administration panel
* Removed dependency on CURL.  Now uses Snoopy.
* Substantial rewrite of core WordTwit code
* Awesomified the administration panel


== Installation ==

= Pre 2.7 = 
WordTwit 2.2 no longer supports older WordPress installations.

= 2.7+ =
You can now install *WordTwit* directly from the WordPress admin!

Please visit http://www.bravenewcode.com/wordtwit/ for comprehensive
installation instructions.

= WordPress Mu 2.8.5+ =

WordTwit works with newer versions of WordPress MU.  To enable WordTwit on WordPress MU, activate the plugin as a site-wide plugin.  Note that the Twitter API rate restrictions will apply, and that most large WordPress MU sites will require whitelisting on Twitter. 


== Frequently Asked Questions ==

None so far!


== Screenshots ==

1. WordTwit Administration Panel (Top)
2. WordTwit Administration Panel (Bottom)
3. WordTwit Admin: Link Statistics Overlay
