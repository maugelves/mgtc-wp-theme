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

        </div>
        <?php endif; ?>

    <?php endforeach; ?>

</section><!-- END .hlobras -->
    <?php endif; ?>

<?php get_footer(); ?>