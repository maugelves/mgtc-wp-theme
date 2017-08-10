<?php

/**
 * Cancel default Query for Single templates
 *
 * @param $query
 */
function mgtc_cancel_main_queries( $query ) {

	if ( $query->is_main_query() && !is_admin()) {

		// maybe check for specific page here
		if (
			$query->get('post_type') === 'obra'
			|| $query->get('post_type') === 'actor'
		) {
			$query = false;
			remove_all_actions ( '__after_loop');
		}

	}
}
add_action( 'pre_get_posts', 'mgtc_cancel_main_queries' );