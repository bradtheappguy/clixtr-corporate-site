<?php
	require_once( dirname( __FILE__ ) . '/../../../../wp-config.php' );
	require_once( dirname( __FILE__ ) . '/../tinyurl.php' );
	
	global $table_prefix;
	global $wpdb;
	
	if ( $_GET['type'] == 1 ) {
		$sql = "select * from " . $table_prefix . "tweet_urls order by views desc";
	} else if ( $_GET['type'] == 2 ) {
		$sql = "select * from " . $table_prefix . "tweet_urls order by id desc";		
	}

	$result = $wpdb->get_results( $sql );
	
	if ( $result ) {
		global $tweet_urls;
		$tweet_urls = $result;
		include( 'table.php' );	
	}
?>