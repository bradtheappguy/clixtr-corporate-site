<?php
	require_once( dirname(__FILE__) . '/../tinyurl.php' );
	
	function is_valid_url($url) {
		return preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url);;
	}

	$url = $_GET['url'];
	if ( is_valid_url( $url ) ) {
		echo wordtwit_tinyurl( $url );
	} else {
		echo __( "Invalid URL.", "wordtwit" );	
	}
?>