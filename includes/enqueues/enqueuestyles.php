<?php

/*
 * Enqueue the stylesheets
 */
function site_styles() {

	// Register the styles
	wp_register_style('googlefont', 'https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:300,400,600', array(),false);
	wp_register_style('style', get_bloginfo('template_url') . '/style.css', array('googlefont'),false);
	wp_register_style('owl', get_bloginfo('template_url') . '/js/lib/owl.carousel.min.css', array(),false);


	// Enqueue the styles
	wp_enqueue_style('style');

	// Owl Carousel
	if(
		is_singular()
		|| is_post_type_archive('obra')
		):
		wp_enqueue_style('owl' );
	endif;

}
add_action( 'wp_enqueue_scripts', 'site_styles' );

?>