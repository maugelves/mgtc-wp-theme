<?php

/*
 * Enqueue the stylesheets
 */
function site_styles() {

	// Register the styles
	wp_register_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,600', array(),false);
	wp_register_style('style', get_bloginfo('template_url') . '/style.css', array('googlefont'),false);


	// Enqueue the styles
	wp_enqueue_style('style');
}
add_action( 'wp_enqueue_scripts', 'site_styles' );

?>