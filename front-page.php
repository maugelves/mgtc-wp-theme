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
                    <a href="<?php the_permalink( $obra->getID() ); ?>" class="btn--secondary">Más información</a>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>

    </div>

</section><!-- END .hpgiras -->



<?php get_footer(); ?>