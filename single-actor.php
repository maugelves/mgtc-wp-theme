<?php get_header(); ?>


<?php
global $post;
$actor = \MGTC\Service\Actores::getInstance()->get_by_id( $post->ID );
?>


<section class="sgheader">

	<?php
	the_post_thumbnail('large', array( 'class' => 'sgheader__fi' ) );
	?>

	<div class="sgheader__meta">
		<h1 class="sgheader__h"><?php echo $actor->getNombre(); ?></h1>
	</div>

</section>


<div class="wrapper">

		<div class="content">

			<div class="content-wrapper">

				<section class="sgcontent">

					<h2 class="sgcontent__h">Sobre <?php echo $actor->getNombre(); ?></h2>
					<?php echo $actor->getBiography(); ?>

				</section>



				<?php if( get_field('mgtc_actor_galeria', $actor->getID() ) ): ?>
				<section class="sggallery">



					<h2 class="sggallery__h">Galería de fotos</h2>

					<div class="sggallery__wrapper owl-carousel">

							<?php $images = get_field('mgtc_actor_galeria', $actor->getID() );
							foreach( $images as $image ): ?>
								<img class="sgallery__item" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo wp_get_attachment_image_srcset( $image['ID'] ); ?>">
							<?php endforeach; ?>
						
					</div>

				</section>
				<?php endif; ?>




				<?php if ( have_rows('mgtc_actor_videos', $actor->getID() ) ): ?>
				<section class="sgembeds">

					<h2 class="sggallery__h">Galería de Videos</h2>

					<?php while( have_rows( 'mgtc_actor_videos', $actor->getID() ) ): the_row(); ?>
						<div class="video-container">
							<?php the_sub_field('mgtc_actor_video'); ?>
						</div>
					<?php endwhile; ?>

				</section>
				<?php endif; ?>


			</div>


			<?php get_sidebar(); ?>

		</div>

</div>


<?php get_footer(); ?>