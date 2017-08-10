<aside class="sidebar">

<?php if( is_singular('actor') ): ?>
	<?php
	global $post;
	$actor = \MGTC\Service\Actores::getInstance()->get_by_id( $post->ID );

	// RENDER THE SOCIAL NETWORKS
	$actor->the_rrss();

	// RENDER THE OBRAS WHERE HE/SHE PLAYS
	$actor->the_obras();

	// RENDER THE TIMELINE
	$actor->the_twitter_timeline();
	?>

<?php endif; ?>

</aside>
