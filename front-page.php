<?php get_header(); ?>

<?php
    $obras = \MGTC\Service\Obras::getInstance()->get_active_obras();
    if( !empty($obras) ): ?>
<section class="hlobras owl-carousel">

    <?php foreach( $obras as $obra ): /** @var $obra \MGTC\Models\Obra */?>

        <?php if( $obra->getMainPicture()  ): ?>
        <div class="hlobras__item" >

            <img class="hlobras__item__fi" src="<?php echo $obra->getMainPicture()['sizes']['medium_large']; ?>" srcset="<?php echo wp_get_attachment_image_srcset($obra->getMainPicture()['id']); ?>">

            <div class="hlobras__meta wrapper">

                <h2 class="hlobras__h"><?php echo $obra->getTitle(); ?></h2>

	            <?php if( !empty( $obra->getSubtitle() ) ): ?>
                    <p class="hlobras__sh"><?php echo $obra->getSubtitle(); ?></p>
	            <?php endif; ?>

                <a class="btn--primary" href="<?php echo get_permalink( $obra->getID() ); ?>" type="button">Ir a la obra</a>

            </div>



        </div>
        <?php endif; ?>

    <?php endforeach; ?>

</section><!-- END .hlobras -->
    <?php endif; ?>





<section class="bblock wrapper">

    <h3 class="bblock__h">Somos <span>Avanti Teatro</span></h3>
    <p class="bblock__b">Creemos en un teatro sin artificio donde la palabra y la interpretación propongan una serie de interrogantes que inviten al espectador a la reflexión.</p>

    <div class="linkcontainer">
        <a class="link-right" href="<?php bloginfo('url'); ?>/quienes-somos/">Conócenos más a fondo <span class="icon-tc-link"></span></a>
    </div>


</section><!-- END .bblock -->




<?php $obras = \MGTC\Service\Obras::getInstance()->get_active_obras(3); ?>
<section class="bblock hpobras">

    <div class="wrapper">

        <h2 class="bblock__h">Espectáculos <span>en gira</span></h2>
        <p class="bblock__b">Sigue de cerca los espectáculos actualmente en cartel de Avanti Teatro.</p>


        <ul class="hpobras__items">
        <?php foreach( $obras as $obra ):
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

        <a class="btn--secondary hpgiras__l" href="<?php echo get_post_type_archive_link('obra') ?>">Ver espectáculos en gira</a>

    </div>

</section><!-- END .hpobras -->




<?php
    $giras = \MGTC\Service\Giras::getInstance()->get_next_giras(6);
    if ( !empty( $giras ) ):
        // Render the Next Giras
        render_next_giras( $giras );
    endif;
?>





<section class="bblock hpactores">

    <div class="wrapper">

        <h2 class="bblock__h">Quién es <span>Avanti Teatro</span></h2>

        <?php
            $actores = \MGTC\Service\Actores::getInstance()->get_actors_for_homepage();
            if( !empty( $actores ) ): ?>
                <ul class="hpactores__list">
                    <?php
                    foreach( $actores as $actor ): /* @var $actor \MGTC\Models\Actor */ ?>
                        <li class="hpactores__item">
                            <?php
                            $permalink_actor =  get_permalink( $actor->getID() );
                            $attr = array(
                                    'class' => 'hpactores__item__fi',
                                    'onclick'   => 'location.href = "' . $permalink_actor . '"'
                                    );
                            echo get_the_post_thumbnail( $actor->getID(), 'post-thumbnail', $attr );
                            ?>
                            <a href="<?php echo $permalink_actor ?>" class="hpactores__item__h"><?php echo $actor->getNombre(); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

    </div>

</section><!-- END .hpactores -->


<?php get_footer(); ?>