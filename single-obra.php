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




<section class="sgcta">

    <div class="wrapper">

        <h2 class="sgcta__h">Sobre "<?php echo $obra->getTitle(); ?>"</h2>
        <p class="sgcta__b"><?php echo $obra->getShortDescription(); ?></p>

        <div class="linkcontainer">
            <a href="#" class="link-right">Consultar la gira <span class="icon-tc-link"></span></a>
        </div>

    </div>

</section>





<section class="sgcontent">

    <div class="sgcontent__wrapper wrapper">

        <h2 class="sgcontent__h">Descripción</h2>
        <?php echo $obra->getDescription(); ?>

    </div>

</section>



<section class="sgtechd">

    <div class="sgcontent__wrapper wrapper">

        <h2 class="sgtechd__h">Ficha Técnica</h2>

        <ul class="sgtechd__items">


            <?php // DATE RELEASE ?>
            <?php if( !empty( $obra->getDateRelease() ) ): ?>
            <li class="sgtechd__item">
                <h3 class="sgtechd__item__h">Fecha de estreno:</h3>
                <p class="sgtechd__item__b"><?php echo $obra->getDateRelease(); ?></p>
            </li>
            <?php endif; ?>



	        <?php // MAIN AND SECONDARY ACTORS ?>
	        <?php
                if(
                        !empty( $obra->getMainActors() )
                        || !empty( $obra->getSecondaryActors() )
                ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Elenco:</h3>
                    <p class="sgtechd__item__b">
                        <?php

                        // Variables
                        $countMainActors        = count( $obra->getMainActors() );
                        $countSecondaryActors   = count( $obra->getSecondaryActors() );
                        $i = 1;

                        // RENDER THE MAIN ACTORS
                        foreach( $obra->getMainActors() as $actor ): /** @var $actor \MGTC\Models\Actor */ ?>

	                        <?php
                            // Print the comma in the link?
                            if (    $countMainActors != $i
                                    || $countSecondaryActors > 0
                                ):
	                            $nombre = $actor->getNombre() . ", ";
                            else:
                                $nombre = $actor->getNombre();
                            endif;
                            ?>
                            <a href="<?php echo get_permalink( $actor->getID() ); ?>"><?php echo $nombre; ?></a>
                            <?php $i++; ?>

                        <?php endforeach; ?>


	                    <?php
	                    // RENDER THE SECONDARY ACTORS
	                    $i = 1;
	                    foreach( $obra->getSecondaryActors() as $actor ): /** @var $actor \MGTC\Models\Actor */ ?>

		                    <?php
		                    // Print the comma in the link?
                            $nombre = ( $countSecondaryActors != $i ) ? $actor->getNombre() . ", " : $actor->getNombre(); ?>
                            <?php echo $nombre; ?>
		                    <?php $i++; ?>

	                    <?php endforeach; ?>

                    </p>
                </li>
	        <?php endif; ?>




	        <?php // DIRECTORS ?>
	        <?php if( !empty( $obra->getDirectors() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Director(es):</h3>
                    <p class="sgtechd__item__b">
	                    <?php
	                    // RENDER THE DIRECTORS
	                    $countDirectors = count( $obra->getDirectors() );
	                    $i = 1;
	                    foreach( $obra->getDirectors() as $director ): /** @var $director \MGTC\Models\Equipo */ ?>

		                    <?php
		                    // Print the comma in the link?
		                    $nombre = ( $countDirectors != $i ) ? $director->getNombre() . ", " : $director->getNombre(); ?>
		                    <?php echo $nombre; ?>
		                    <?php $i++; ?>

	                    <?php endforeach; ?>
                    </p>
                </li>
	        <?php endif; ?>





	        <?php // TECHNICAL AND ARTISTIC TEAM ?>
	        <?php if( !empty( $obra->getTeam() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Equipo artístico, técnico, y productivo:</h3>
                    <div class="sgtechd__item__b"><?php echo $obra->getTeam(); ?></div>
                </li>
	        <?php endif; ?>






	        <?php // DISTRIBUTION ?>
	        <?php if( !empty( $obra->getDistributors() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Distribuidor(es):</h3>

				        <?php
				        // RENDER THE DISTRIBUTORS
				        foreach( $obra->getDistributors() as $distributor ): /** @var $distributor \MGTC\Models\Equipo */ ?>

                            <p class="sgtechd__item__b sgtechd__person">

                                <span class="sgtechd__person__name"><?php echo $distributor->getNombre(); ?></span>

	                            <?php if( !empty ( $distributor->getEmail() ) ): ?>
                                    <a target="_blank" href="mailto:<?php echo $distributor->getEmail(); ?>"><span class="icon-envelope"></span> <?php echo $distributor->getEmail(); ?></a>
	                            <?php endif; ?>

	                            <?php
                                if( !empty ( $distributor->getTelefonos() ) ):
                                   foreach ( $distributor->getTelefonos() as $telefono ): ?>
                                    <a target="_blank" href="tel: <?php echo $telefono; ?>"><span class="icon-mobile"></span> <?php echo $telefono; ?></a>
                                   <?php endforeach; ?>
	                            <?php endif; ?>

	                            <?php if( !empty ( $distributor->getFacebook() ) ): ?>
                                    <a target="_blank" href="<?php echo $distributor->getFacebook(); ?>"><span class="icon-facebook"></span> <?php echo $distributor->getFacebook(); ?></a>
	                            <?php endif; ?>

	                            <?php if( !empty ( $distributor->getInstagram() ) ): ?>
                                    <a target="_blank" href="https://instagram.com/<?php echo $distributor->getInstagram(); ?>"><span class="icon-instagram"></span> @<?php echo $distributor->getInstagram(); ?></a>
	                            <?php endif; ?>

	                            <?php if( !empty ( $distributor->getTwitter() ) ): ?>
                                    <a target="_blank" href="https://twitter.com/<?php echo $distributor->getTwitter(); ?>"><span class="icon-twitter"></span> @<?php echo $distributor->getTwitter(); ?></a>
	                            <?php endif; ?>

                            </p>

				        <?php endforeach; ?>

                </li>
	        <?php endif; ?>


        </ul>
    </div>

</section>





<?php get_footer(); ?>