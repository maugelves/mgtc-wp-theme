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





<?php
$images = get_field('mgtc_imagenes_obra', $obra->getID() );
if( $images ):
?>
<section class="sggallery">

    <div class="wrapper sgcontent__wrapper">

        <h2 class="sggallery__h">Galería de fotos</h2>

        <div class="sggallery__wrapper owl-carousel">

            <?php foreach( $images as $image ): ?>
                <img class="sgallery__item" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" srcset="<?php echo wp_get_attachment_image_srcset( $image['ID'] ); ?>">
            <?php endforeach; ?>

        </div>

    </div>

</section>
<?php endif; ?>




<section class="sgembeds">

    <div class="wrapper sgcontent__wrapper">

        <h2 class="sggallery__h">Galería de Videos</h2>

        <?php if ( have_rows('mgtc_videos_obra', $obra->getID() ) ): ?>

            <?php while( have_rows( 'mgtc_videos_obra', $obra->getID() ) ): the_row(); ?>
                <div class="video-container">
                    <?php the_sub_field('mgtc_video_obra'); ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</section>





<section class="sgtechd">

    <div class="sgcontent__wrapper sgtechd__wrappper wrapper">

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
                    <ul class="sgtechd__persons">
				        <?php
				        // RENDER THE DISTRIBUTORS
				        foreach( $obra->getDistributors() as $prensa ): /** @var $prensa \MGTC\Models\Equipo */ ?>

                            <li class="sgtechd__item__b sgtechd__person">

                                <span class="sgtechd__person__name"><?php echo $prensa->getNombre(); ?></span>

	                            <?php if( !empty ( $prensa->getEmail() ) ): ?>
                                    <p><span class="icon-envelope"></span> <a target="_blank" href="mailto:<?php echo $prensa->getEmail(); ?>"><?php echo $prensa->getEmail(); ?></a></p>
	                            <?php endif; ?>

	                            <?php
                                if( !empty ( $prensa->getTelefonos() ) ):
                                   foreach ( $prensa->getTelefonos() as $telefono ): ?>
                                    <p><span class="icon-mobile"></span> <a target="_blank" href="tel: <?php echo $telefono; ?>"><?php echo $telefono; ?></a></p>
                                   <?php endforeach; ?>
	                            <?php endif; ?>

	                            <?php if( !empty ( $prensa->getFacebook() ) ): ?>
                                    <p><span class="icon-facebook"></span> <a target="_blank" href="<?php echo $prensa->getFacebook(); ?>"><?php echo $prensa->getFacebook(); ?></a></p>
	                            <?php endif; ?>

	                            <?php if( !empty ( $prensa->getInstagram() ) ): ?>
                                    <p><span class="icon-instagram"></span> <a target="_blank" href="https://instagram.com/<?php echo $prensa->getInstagram(); ?>">@<?php echo $prensa->getInstagram(); ?></a></p>
	                            <?php endif; ?>

	                            <?php if( !empty ( $prensa->getTwitter() ) ): ?>
                                    <p><span class="icon-twitter"></span> <a target="_blank" href="https://twitter.com/<?php echo $prensa->getTwitter(); ?>">@<?php echo $prensa->getTwitter(); ?></a></p>
	                            <?php endif; ?>

                            </li>

				        <?php endforeach; ?>
                    </ul>
                </li>
	        <?php endif; ?>






	        <?php // PRESS ?>
	        <?php if( !empty( $obra->getPressers() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Prensa:</h3>

                    <ul class="sgtechd__persons">
			        <?php
			        // RENDER THE PRESSERS
			        foreach( $obra->getPressers() as $prensa ): /** @var $prensa \MGTC\Models\Equipo */ ?>

                        <li class="sgtechd__item__b sgtechd__person">
                            <span class="sgtechd__person__name"><?php echo $prensa->getNombre(); ?></span>

					        <?php if( !empty ( $prensa->getEmail() ) ): ?>
                                <p><span class="icon-envelope"></span> <a target="_blank" href="mailto:<?php echo $prensa->getEmail(); ?>"><?php echo $prensa->getEmail(); ?></a></p>
					        <?php endif; ?>


					        <?php
					        if( !empty ( $prensa->getTelefonos() ) ):
						        foreach ( $prensa->getTelefonos() as $telefono ): ?>
                                    <p><span class="icon-mobile"></span> <a target="_blank" href="tel: <?php echo $telefono; ?>"><?php echo $telefono; ?></a></p>
						        <?php endforeach; ?>
					        <?php endif; ?>


					        <?php if( !empty ( $prensa->getFacebook() ) ): ?>
                                <p><span class="icon-facebook"></span> <a target="_blank" href="<?php echo $prensa->getFacebook(); ?>"><?php echo $prensa->getFacebook(); ?></a></p>
					        <?php endif; ?>

					        <?php if( !empty ( $prensa->getInstagram() ) ): ?>
                                <p><span class="icon-instagram"></span> <a target="_blank" href="https://instagram.com/<?php echo $prensa->getInstagram(); ?>">@<?php echo $prensa->getInstagram(); ?></a></p>
					        <?php endif; ?>

					        <?php if( !empty ( $prensa->getTwitter() ) ): ?>
                                <p><span class="icon-twitter"></span> <a target="_blank" href="https://twitter.com/<?php echo $prensa->getTwitter(); ?>">@<?php echo $prensa->getTwitter(); ?></a></p>
					        <?php endif; ?>

                        </li>

			        <?php endforeach; ?>
                    </ul>
                </li>
	        <?php endif; ?>






	        <?php // PRESS ARTICLES ?>
	        <?php if(
	                !empty( $obra->getPressLinks() )
                    ||
	                !empty( $obra->getPressFiles() )
                    ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Enlaces de prensa:</h3>
                    <ul class="sgtechd__item__b">

				        <?php
				        // RENDER THE PRESS LINKS
				        foreach( $obra->getPressLinks() as $presslink ): ?>
                            <li><span class="icon-globe"></span> <a href="<?php echo $presslink['link']; ?>"> <?php echo $presslink['name']; ?></a></li>
				        <?php endforeach; ?>

	                    <?php
	                    // RENDER THE PRESS FILES
	                    foreach( $obra->getPressFiles() as $presslink ): ?>
                            <li><span class="icon-file-zip-o"></span> <a href="<?php echo $presslink['link']; ?>"> <?php echo $presslink['name']; ?></a></li>
	                    <?php endforeach; ?>

                    </ul>
                </li>
	        <?php endif; ?>





	        <?php // DOWNLOAD ?>
	        <?php if( !empty( $obra->getDownloads() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Descargas:</h3>
                    <ul class="sgtechd__item__b">

				        <?php
				        // RENDER THE PRESS LINKS
				        foreach( $obra->getDownloads() as $download ): ?>
                            <li><span class="icon-file-zip-o"></span> <a href="<?php echo $download['link']; ?>"> <?php echo $download['name']; ?></a></li>
				        <?php endforeach; ?>

                    </ul>
                </li>
	        <?php endif; ?>




	        <?php // PATROCINIOS ?>
	        <?php if( !empty( $obra->getSponsors() ) ): ?>
                <li class="sgtechd__item">
                    <h3 class="sgtechd__item__h">Co-Productores:</h3>
                    <ul class="sgtechd__item__b sgtechd__sponsors">

				        <?php
				        // RENDER THE PRESS LINKS
				        foreach( $obra->getSponsors() as $sponsor ): /** @var $sponsor \MGTC\Models\Sponsor */ ?>
                            <li class="sgtechd__sponsors__item"><a href="<?php echo $sponsor->get_link(); ?>" target="_blank" title="<?php echo $sponsor->get_name() ?>"><?php echo get_the_post_thumbnail( $sponsor->get_ID() ); ?></a></li>
				        <?php endforeach; ?>

                    </ul>
                </li>
	        <?php endif; ?>

        </ul>
    </div>

</section>




<?php
$giras = \MGTC\Service\Giras::getInstance()->get_next_giras(6, $obra->getID() );
if ( !empty( $giras ) ):
	// Render the Next Giras
	render_next_giras( $giras );
endif;
?>




<?php get_footer(); ?>