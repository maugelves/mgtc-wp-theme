<?php

/**
 * @param $query
 */
function mgtc_cancel_archive_queries( $query ) {

	if ( $query->is_main_query() && !is_admin()) {

		// maybe check for specific page here
		if ( is_post_type_archive('obra')  ) :
			$query = false;
			remove_all_actions ( '__after_loop');
		endif;

	}
}
add_action( 'pre_get_posts', 'mgtc_cancel_archive_queries' );