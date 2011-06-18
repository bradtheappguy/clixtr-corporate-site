<?php

function wordtwit_md5_to_binary( $s ) {
	$r = '                ';
	for ($i = 0; $i < 16; $i++) {
	        $portion = substr( $s, $i*2, 2 );
	        $d = sscanf( $portion, "%x" );
	        $r[$i] = chr($d[0]);
	}
	return $r;
}


function wordtwit_short_home( $domain = '') {
	$settings = get_option( 'wordtwit_settings' );
	
	if ( $domain ) {
		$str = $domain;
	} else {
		$str = get_bloginfo( 'home' );
		if ( $settings['alternate_domain'] ) {
			$str = $settings['alternate_domain'];	
		}
	}
	
	$home = str_replace( 'www.', '', $str );
	$home = rtrim( $home, '/' );
	return $home . '/';
}

function wordtwit_tinyurl( $url, $update_post_id = true ) {
	global $wpdb;
	global $table_prefix;
	
	$sql = "select * from " . $table_prefix . "tweet_urls where original = '" . $url . "'";
	$result = $wpdb->get_row( $sql );
	if ( $result ) {
		return wordtwit_short_home() . $result->url;
	}

	$valid_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789ab";
	
	if ( floatval(phpversion() ) >= 5.0 ) {	
		$m = md5( $url . 'wordtwit', true );
	} else {
		// php 4
		$m = wordtwit_md5_to_binary( md5( $url ) );
	}
	
	$x1 = ((ord($m[0]) & 0xfc) >> 2);
	$x2 = ((ord($m[0]) & 0x03) + ((ord($m[1]) & 0xf0) >> 2));
	$x3 = ((ord($m[1]) & 0x0f) + (ord($m[2]) & 0xc0 >> 2));
	$x4 = (ord($m[2]) & 0x3f);
	$x5 = ((ord($m[3]) & 0xfc) >> 2);
	$x6 = ((ord($m[3]) & 0x03) + ((ord($m[4]) & 0xf0) >> 2));
	$x7 = ((ord($m[4]) & 0x0f) + (ord($m[5]) & 0xc0 >> 2));
	$x8 = (ord($m[5]) & 0x3f);
	
	$litlurl = array();
	
	$litlurl[0] = $valid_chars[$x1] . $valid_chars[$x2];	
	$litlurl[1] = $litlurl[0] . $valid_chars[$x3];
	$litlurl[2] = $litlurl[1] . $valid_chars[$x4];
	$litlurl[3] = $litlurl[2] . $valid_chars[$x5];
	$litlurl[4] = $litlurl[3] . $valid_chars[$x6];	
	$litlurl[5] = $litlurl[4] . $valid_chars[$x7];
	$litlurl[6] = $litlurl[5] . $valid_chars[$x8];
	
	$url_num = 0;
	while (true) {
		$sql = "SELECT count(*) as c from " . $table_prefix . "tweet_urls WHERE url = '" . $litlurl[ $url_num ] . "'";
		$result = $wpdb->get_row( $sql );
		
		if ( $result ) {
			if ( $result->c == 0 ) {
			        break;
			}
		}
		
		$url_num++;
		
		// should hopefully never happen
		if ( $url_num > 5) return;
	}
	
	$litlurl = $litlurl[ $url_num ];
	
	$id = 0;
	global $post;
	if ( $post->ID && $update_post_id ) {
		$id = $post->ID;	
	}
	
	$sql = $wpdb->prepare( "INSERT INTO " . $table_prefix . "tweet_urls ( original, url, post_id ) values ( %s, %s, %d )",  $url, $litlurl, $id );
	$wpdb->query( $sql );
	
	return wordtwit_short_home() . $litlurl;
}	

?>