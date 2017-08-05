<?php get_header(); ?>

<?php
    $obras = \MGTC\Service\Obras::getInstance()->get_active_obras();
    if( !empty($obras) ): ?>
<section class="hlobras">

    <?php foreach( $obras as $obra ): ?>

        <?php if( $obra->getMainPicture()  ): ?>
        <div class="hlobras__item" style="background-image: url(<?php echo $obra->getMainPicture()['sizes']['medium_large']; ?>); background-position: center center;">

            <h2 class="hlobras__h"><?php echo $obra->getTitle(); ?></h2>

            <?php if( !empty( $obra->getSubtitle() ) ): ?>
                <p class="hlobras__sh"><?php echo $obra->getSubtitle(); ?></p>
            <?php endif; ?>

            <a class="btn--primary" href="#" type="button">Ir a la obra</a>

        </div>
        <?php endif; ?>

    <?php endforeach; ?>

</section><!-- END .hlobras -->
    <?php endif; ?>





<section class="bblock wrapper">

    <h3 class="bblock__h">Somos la Compañía de <span>Teatro Avanti</span></h3>
    <p class="bblock__b">Creemos en un teatro sin artificio donde la palabra y la interpretación propongan una serie de interrogantes que inviten al espectador a la reflexión.</p>
    <a class="bblock__l" href="#">Conócenos más a fondo <span class="icon-tc-link"></span></a>

</section><!-- END .bblock -->





<section class="bblock hpgiras">

    <div class="wrapper">

        <h2 class="bblock__h">Espectáculos <span>en gira</span></h2>
        <p class="bblock__b">Sigue de cerca los espectáculos actualmente en cartel de Avanti Teatro.</p>


        <ul>
        <?php foreach( $obras as $obra ): ?>
            <li class="hpgiras__item">
	            <?php echo get_the_post_thumbnail( $obra->getId(), 'post-thumbnail', ['class' => 'hpgiras__item__fi'] ); ?>
                <div class="wrapper">
                    <h2 class="hpgiras__item__h"><?php echo $obra->getTitle(); ?></h2>
                    <p class="hpgiras__item__b"><?php echo $obra->getShortDescription(); ?></p>
                    <a class="hpgiras__item__ticket" href="<?php the_permalink( $obra->getID() ); ?>" class="btn--secondary">Más información</a>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>

    </div>

</section><!-- END .hpgiras -->




<?php
    $giras = \MGTC\Service\Giras::getInstance()->get_next_giras(6);
    if ( !empty( $giras ) ):
?>
<section class="bblock hpevents wrapper">

    <h2 class="bblock__h">Próximas Funciones</h2>
    <p class="bblock__b">Conoce las próximas funciones y compra la entrada.</p>


    <ul class="hpevents__items">
        <?php foreach($giras as $gira): ?>
        <li class="hpevents__item">
	        <?php echo get_the_post_thumbnail( $gira->getObraId(), 'post-thumbnail', ['class' => 'hpevents__item__fi'] ); ?>

            <div class="hpevents__item__meta">

                <h3 class="hpevents__item__h"><?php echo $gira->getObra()->getTitle(); ?></h3>
                <p>
                    <?php
                    $fecha = date_create_from_format( "d/m/Y H:i a", $gira->getDate() );
                    ?>

		            Próximo <b><?php echo $fecha->format('d/m/Y'); ?></b><br>
                    <b>a las <?php echo $fecha->format('H:i'); ?></b><br>
		            <?php echo $gira->getTheatre()->getName(); ?><br>
		            <b><?php echo $gira->getTheatre()->getCity(); ?></b>
                </p>

            </div>

            <?php if( !empty( $gira->getTicketsLink() ) ): ?>
                <a class="hpevents__item__ticket" href="<?php echo $gira->getTicketsLink() ?>">Comprar entradas</a>
            <?php endif; ?>

        </li>
        <?php endforeach; ?>
    </ul>

    <a href="#" class="btn--secondary hpevents__btn">Ver todas las obras</a>

</section><!-- END .hpevents -->
<?php endif; ?>



<?php get_footer(); ?>