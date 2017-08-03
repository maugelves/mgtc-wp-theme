<?php
/*
 * Register the JS scripts
 */
function site_scripts() {

	wp_register_script('general', get_bloginfo( 'template_url' ) . "/js/general.js", array('jquery'), false, true);


	// ENQUEUE
	wp_enqueue_script('general' );

}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
?>