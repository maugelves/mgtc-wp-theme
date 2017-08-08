<?php get_header(); ?>


<?php
	global $post;
	$obra = \MGTC\Service\Obras::getInstance()->get_by_id( $post->ID );
?>

<section class="sgheader">

	<img class="sgheader__fi" src="<?php echo $obra->getMainPicture()['sizes']['medium_large']; ?>" srcset="<?php echo wp_get_attachment_image_srcset($obra->getMainPicture()['id']); ?>">
    <div class="sgheader__meta">
        <h1 class="sgheader__h"><?php echo $obra->getTitle(); ?></h1>
        <?php if( !empty( $obra->getSubtitle() ) ): ?>
        <p class="sgheader__sh"><?php echo $obra->getSubtitle(); ?></p>
        <?php endif; ?>
    </div>

</section>



<?php get_footer(); ?>