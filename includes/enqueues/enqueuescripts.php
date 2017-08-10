<?php
/*
 * Register the JS scripts
 */
function site_scripts() {

	wp_register_script('general', get_bloginfo( 'template_url' ) . "/js/general.js", array('jquery'), false, true);
	wp_register_script('owl', get_bloginfo('template_url') . '/js/lib/owl.carousel.min.js', array('jquery'), false, true );
	wp_register_script('frontpage', get_bloginfo('template_url') . '/js/frontpage.js', array('jquery', 'owl'), false, true);
	wp_register_script('singular', get_bloginfo('template_url') . '/js/singular.js', array('jquery', 'owl'), false, true);
	wp_register_script('archive', get_bloginfo('template_url') . '/js/archive.js', array('jquery', 'owl'), false, true);


	// ENQUEUE
	wp_enqueue_script('general' );

	if( is_front_page() ):
		wp_enqueue_script('frontpage');
	endif;

	if( is_singular() && !is_front_page() ):
		wp_enqueue_script('singular');
	endif;



	if( is_post_type_archive('obra') ):
		wp_enqueue_script('archive');
	endif;

}
add_action( 'wp_enqueue_scripts', 'site_scripts' );
?>