<?php get_header(); ?>


	<section class="sgheader">

		<img class="sgheader__fi" src="<?php bloginfo('template_url'); ?>/img/eduardo-velasco-archive.jpg">
		<div class="sgheader__meta">
			<h1 class="sgheader__h">Obras</h1>
			<p class="sgheader__sh">Archivo de obras de Avanti Teatro</p>
		</div>

	</section>


	<section class="sgcta">

		<div class="wrapper">

			<h2 class="sgcta__h">Obras de <span>Teatro Avanti</span></h2>
			<p class="sgcta__b">Creemos en un teatro sin artificio donde la palabra y la interpretación propongan una serie de interrogantes que inviten al espectador a la reflexión.</p>

		</div>

	</section>

	<?php
	// Get the Obras Activas
	$obrason = \MGTC\Service\Obras::getInstance()->get_active_obras(-1);
	?>
	<section class="bblock hpobras">

		<div class="wrapper">

			<h2 class="bblock__h">Espectáculos <span>en gira</span></h2>

			<ul class="hpobras__items owl-carousel">
				<?php foreach( $obrason as $obra ):
					/** @var $obra \MGTC\Models\Obra */
					?>
					<li class="hpobras__item">
						<?php echo get_the_post_thumbnail( $obra->getId(), 'post-thumbnail', ['class' => 'hpobras__item__fi', 'onclick' => 'location.href="'. get_the_permalink() . '"'] ); ?>
						<h2 class="hpobras__item__h"><?php echo $obra->getTitle(); ?></h2>
						<p class="hpobras__item__b"><?php echo $obra->getShortDescription(); ?></p>
						<a class="hpobras__item__l" href="<?php the_permalink( $obra->getID() ); ?>" class="btn--secondary">+ Info</a>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>

	</section><!-- END .hpobras -->



	<?php
	$obrasoff = \MGTC\Service\Obras::getInstance()->get_unactive_obras(-1);
	if( !empty( $obrasoff ) ): ?>
	<section class="bblock hpobras hpobras--archived">

		<div class="wrapper">

			<h2 class="bblock__h">Espectáculos <span>archivados</span></h2>

			<ul class="hpobras__items owl-carousel">
				<?php foreach( $obrasoff as $obra ):
					/** @var $obra \MGTC\Models\Obra */
					?>
					<li class="hpobras__item">
						<?php echo get_the_post_thumbnail( $obra->getId(), 'post-thumbnail', ['class' => 'hpobras__item__fi'] ); ?>
						<h2 class="hpobras__item__h"><?php echo $obra->getTitle(); ?></h2>
						<p class="hpobras__item__b"><?php echo $obra->getShortDescription(); ?></p>
						<a class="hpobras__item__l" href="<?php the_permalink( $obra->getID() ); ?>" class="btn--secondary">+ Info</a>
					</li>
				<?php endforeach; ?>
			</ul>

		</div>

	</section><!-- END .hpobras -->
	<?php endif; ?>

<?php get_footer(); ?>