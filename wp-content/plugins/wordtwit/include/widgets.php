<?php

class wordtwit_twitter_widget extends WP_Widget {
	function wordtwit_twitter_widget() {
		parent::WP_Widget( false, $name = __( 'WordTwit Twitter Feed', 'wordtwit' ), array( 'description' => __( 'Shows a list of recent Tweets.', 'wordtwit' ) ) );	
	}

	function widget( $args, $instance ) {
		extract( $args );
		
		echo $before_widget;
		
		global $tweets;
		$tweets = wordtwit_get_recent_tweets();
		
		include( dirname( __FILE__ ) . '/../html/twitter.php' );
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
	}
}

add_action( 'widgets_init', create_function('', 'return register_widget("wordtwit_twitter_widget");'));

?>