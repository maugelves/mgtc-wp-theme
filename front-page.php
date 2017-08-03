<?php get_header(); ?>

<?php
    $obras = \MGTC\Service\Obras::getInstance()->get_active_obras();
    if( !empty($obras) ): ?>
<section class="hlobras">

    <?php foreach( $obras as $obra ): ?>

        <?php
        if( $obra->getMainPicture()  ): ?>
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
    <p>Creemos en un teatro sin artificio donde la palabra y la interpretación propongan una serie de interrogantes que inviten al espectador a la reflexión.</p>
    <a href="#">Conócenos más a fondo <span class="icon-tc-link"></span></a>

</section><!-- END .bblock -->



<?php get_footer(); ?>