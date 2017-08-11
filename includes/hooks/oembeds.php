<?php

function my_embed_oembed_html($html, $url, $attr, $post_id) {

	// Variables
	$output = $html;

	// if YouTube oEmbed
	if( preg_match("~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=|youtu[.]be/)([^&]{11})~x", $url, $matches ) ){

		$output = '<div class="video-container">' . $html . '</div>';

	}
	return $output;

}
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
