<?php
/*
Plugin Name: BG Movie Email Rating
Plugin URI:  https://bgwebagency.com
Description: This plugin extends the BG Movies and adds email rating functionality to it.
Version:     20160911
Author:      Kiran Dash
Author URI:  https://bgwebagency.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: tlg-recipe
Domain Path: /languages
*/
// Setup
if( !function_exists( 'add_action' ) ) {
	echo 'Not allowed';
	exit();	
}
add_action( 'movie_rating', function($arr){
	$post			= get_post( $arr['id'] );
	$author_email 	= get_the_author_meta( 'user_email', $post->post_author );
	$subject		= 'Your movie has recieved a new rating!';
	$message		= 'Your movie ' . $post->post_title . ' has received a new rating of ' . $arr['rating'];
	wp_mail( $author_email, $subject, $message ); // better than phps mail fn since this is pluggable
}); // Note that anonymous functions are allowed only for PHP>5.3 so do not use them in production code
?>