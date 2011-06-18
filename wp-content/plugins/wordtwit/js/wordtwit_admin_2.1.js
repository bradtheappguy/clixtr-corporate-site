/*
 * WordTwit -The WordTwit Admin Javascript File
 * This file holds all the default JS functions for the plugin
 * Copyright (c) 2008-2011 Duane Storey & Dale Mugford (BraveNewCode Inc.)
 * Licensed under GPL.
 *
 */
$j = jQuery.noConflict();
	$j(document).ready(function(){
		$j("a.wordtwit-fancy").fancybox({
		'padding':						6,
		'imageScale':					true,
		'zoomSpeedIn':				300, 
		'zoomSpeedOut':			300,
		'zoomOpacity':				true, 
		'overlayShow':				false,
		'hideOnContentClick': 	false
	});
		$j("a.wordtwit-ajax").fancybox({
		'padding':						6,
		'zoomSpeedIn':				200, 
		'zoomSpeedOut':			200,
		'zoomOpacity':				true, 
		'overlayShow':				false,
		'frameWidth':				700,
		'frameHeight':				575,
		'hideOnContentClick': 	false
	});		
	$j( function(){
		var box=$j( "span.wt-preview" ).text();
		var main = box.length *100;
		var value= (main / 140);
		var charCount= 140 - box.length;
		if ( box.length <= 140 ) {
			$j( '#number' ).html( charCount ).addClass( "length-ok" );
		} else if ( box.length > 140 ) {
			$j( '#number' ).html( charCount ).addClass( "too-long" );
		}
		return false;
	});
	
	jQuery( '#estimate-oauth-offset' ).bind( 'click', function() {
		var data = {
			action: 'oauth_estimate'	
		};
		
		jQuery( '#oauth_time_offset' ).css( 'opacity', 0.5 );
		jQuery.post( ajaxurl, data, function(response) {
			jQuery( '#oauth_time_offset' ).val( response );
			jQuery( '#oauth_time_offset' ).css( 'opacity', 1.0 );
		});		
		
		return false;
	});

}); //end WordTwit
