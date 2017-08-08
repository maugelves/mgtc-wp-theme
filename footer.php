<?php
// Get footerbackgound color from the Customizer
$footer_bck_color = get_theme_mod('mgtc_footer_bckg_color_sett' );
if ( !empty($header_bck_color) ) $header_bck_color = 'background-color:' . $header_bck_color . ';';

// Get footer text color from the Customizer
$header_text_color = get_theme_mod('mgtc_footer_text_color_sett' );

// Get footer text hover color from the Customizer
$header_text_hover_color = get_theme_mod('mgtc_footer_text_hover_color_sett' ); ?>

	<footer class="mastfooter" style="background-color: <?php echo $footer_bck_color; ?>;">


            <div class="mfmenu">
			    <?php echo wp_nav_menu( array( 'menu_class' => 'mfmenu__wrapper' ) ); ?>
            </div>

			<div class="mastfooter__cols">

                <div class="wrapper">

                    <ul class="mastfooter__col">
                        <?php dynamic_sidebar('mgtc-footer-column-1'); ?>
                    </ul>

                    <ul class="mastfooter__col">
                        <?php dynamic_sidebar('mgtc-footer-column-2'); ?>
                    </ul>

                    <ul class="mastfooter__col">
                        <?php dynamic_sidebar('mgtc-footer-column-3'); ?>
                    </ul>

                </div>

			</div>

			<div class="copyright">

                <div class="wrapper copyright__wrapper">

                    <div class="createdby">
                        <p>Copyright ©<?php echo date('Y'); ?> Avanti Teatro. Todos los derechos reservados. </p>
                        <p><?php echo sprintf( __('Sitio web desarrollado por %s', 'mgtc'), '<a class="copyright__a" href="https://maugelves.com">maugelves.com</a>' );  ?></p>
                    </div>


                    <?php if( function_exists('mg_social_links') ): ?>
                    <div class="rrss">
                        <?php mg_social_links(); ?>
                    </div>
                    <?php endif; ?>

                </div>

			</div>

	</footer>
<?php wp_footer(); ?>