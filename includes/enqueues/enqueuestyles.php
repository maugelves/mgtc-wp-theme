<?php

/*
 * Enqueue the stylesheets
 */
function site_styles() {

	// Register the styles
	wp_register_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400,600', array(),false);
	wp_register_style('style', get_bloginfo('template_url') . '/style.css', array('googlefont'),false);
	wp_register_style('owl', get_bloginfo('template_url') . '/js/lib/owl.carousel.min.css', array(),false);


	// Enqueue the styles
	wp_enqueue_style('style');

	// Owl Carousel
	if( is_front_page() ):
		wp_enqueue_style('owl' );
	endif;
}
add_action( 'wp_enqueue_scripts', 'site_styles' );

?>