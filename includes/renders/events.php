<?php

/**
 * Render the HTML with the next giras
 *
 * @param $giras    array   Array of Obra instances
 */
function render_next_giras( $giras ) { ?>

	<section class="bblock hpevents wrapper">

		<h2 class="bblock__h">Próximas Funciones</h2>
		<p class="bblock__b">Conoce las próximas funciones y compra la entrada.</p>


		<ul class="hpevents__items">
			<?php foreach($giras as $gira): ?>
				<li class="hpevents__item">
					<?php echo get_the_post_thumbnail( $gira->getObraId(), 'post-thumbnail', ['class' => 'hpevents__item__fi'] ); ?>

					<div class="hpevents__item__meta">

						<h3 class="hpevents__item__h"><?php echo $gira->getObra()->getTitle(); ?></h3>
						<p class="hpevents__item__b">
							<?php
							$fecha = date_create_from_format( "d/m/Y H:i a", $gira->getDate() );
							?>

							Próximo <b><?php echo $fecha->format('d/m/Y'); ?></b>
							<b>a las <?php echo $fecha->format('H:i'); ?></b><br>
							<?php echo $gira->getTheatre()->getName(); ?><br>
							<b><?php echo $gira->getTheatre()->getCity(); ?></b>
						</p>

					</div>

					<?php if( !empty( $gira->getTicketsLink() ) ): ?>
						<a class="hpevents__item__ticket btn--primary" href="<?php echo $gira->getTicketsLink() ?>">Comprar entradas</a>
					<?php endif; ?>

				</li>
			<?php endforeach; ?>
		</ul>

		<a href="#" class="btn--secondary hpevents__btn">Ver todas las obras</a>

	</section><!-- END .hpevents -->

<?php }