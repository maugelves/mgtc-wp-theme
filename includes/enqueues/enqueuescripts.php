<?php
/*
 * Register the JS scripts
 */
function site_scripts() {

	wp_register_script('general', get_bloginfo( 'template_url' ) . "/js/general.js", array('jquery'), false, true);
	wp_register_script('siema', get_bloginfo('template_url') . '/js/lib/siema.min.js', array(), false, true );
	wp_register_script('frontpage', get_bloginfo('template_url') . '/js/frontpage.js', array('jquery', 'siema'), false, true);


	// ENQUEUE
	wp_enqueue_script('general' );

	if( is_front_page() ):
		wp_enqueue_script('frontpage');
	endif;

}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
?>