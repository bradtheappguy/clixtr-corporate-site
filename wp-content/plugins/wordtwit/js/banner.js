// The Banner JS
var wordtwitcounter = 1;

function wordTwitReady() {
	jQuery("ul li.banner-posts").hide();
	jQuery("#banner-post-" + wordtwitcounter).fadeIn( 750 );
	
	wordtwitcounter = wordtwitcounter + 1;
	
	if ( wordtwitcounter > 3 ) {
		wordtwitcounter = 1;
	}
	
	setTimeout( wordTwitReady, 10000 );
}

jQuery(document).ready( function() { wordTwitReady(); } );