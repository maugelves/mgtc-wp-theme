<?php

/*
 * Enqueue the stylesheets
 */
function site_styles() {

	// Register the styles
	wp_register_style('style', get_bloginfo('template_url') . '/style.css', array(),false);


	// Enqueue the styles
	wp_enqueue_style('style');
}
add_action( 'wp_enqueue_scripts', 'site_styles' );

?>