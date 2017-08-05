<?php
// Get footerbackgound color from the Customizer
$footer_bck_color = get_theme_mod('mgtc_footer_bckg_color_sett' );
if ( !empty($header_bck_color) ) $header_bck_color = 'background-color:' . $header_bck_color . ';';

// Get footer text color from the Customizer
$header_text_color = get_theme_mod('mgtc_footer_text_color_sett' );

// Get footer text hover color from the Customizer
$header_text_hover_color = get_theme_mod('mgtc_footer_text_hover_color_sett' ); ?>

	<footer class="mastfooter" style="background-color: <?php echo $footer_bck_color; ?>;">


		<div class="wrapper">

			<div class="mastfooter__cols">

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

			<div class="copyright">
				<p>Copyright ©<?php echo date('Y'); ?> Avanti Teatro. Todos los derechos reservados. </p>
				<?php echo sprintf( __('Sitio web desarrollado por %s', 'mgtc'), '<a class="copyright__a" href="https://maugelves.com">Mauricio Gelves</a>' );  ?>
			</div>

		</div>


	</footer>
<?php wp_footer(); ?>