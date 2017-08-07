<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    <link href="<?php echo get_template_directory_uri(); ?>/humans.txt" rel="author">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>

	<?php if((defined('WP_DEVELOPMENTMODE') && WP_DEVELOPMENTMODE )): ?>
        <!-- LiveReload -->
        <script src="//localhost:35729/livereload.js"></script>
	<?php endif; ?>


	<?php
	// Get header backgound color from the Customizer
	$header_bck_color = get_theme_mod('mgtc_header_bckg_color_sett' );

	// Get header text color from the Customizer
	$header_text_color = get_theme_mod('mgtc_header_text_color_sett' );

	// Get header text hover color from the Customizer
	$header_text_hover_color = get_theme_mod('mgtc_header_text_hover_color_sett' );

	// Get footer text color from the Customizer
	$footer_text_color = get_theme_mod('mgtc_footer_text_color_sett' );

	// Get footer text hover color from the Customizer
	$footer_text_hover_color = get_theme_mod('mgtc_footer_text_hover_color_sett' ); ?>

    <style>
        .mastheader { background-color: <?php echo $header_bck_color  ?>; }
        .mastheader .menu-item a { color: <?php echo $header_text_color  ?>; }
        .mastheader .menu-item a:hover { color: <?php echo $header_text_hover_color ?>; }
        .mg-social-links [class^="mgsf-icon"] { color: <?php echo $header_text_color  ?>; }

        .mastfooter a,
        .mastfooter p { color: <?php echo $footer_text_color; ?>; }
        .mastfooter a:hover { color: <?php echo $footer_text_hover_color; ?>; }
    </style>
</head>
<body <?php body_class(); ?>>


    <header role="banner" class="mastheader">

        <div class="wrapper mastheader__wrapper">

                <div class="header__logo">
                    <?php
                    if ( function_exists( 'the_custom_logo' ) ) {
                        the_custom_logo();
                    }
                    ?>
                </div>


                <div id="header__hamb">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>


                <nav class="header__nav" role="navigation">

                    <?php
                    $args = array( 'container'     => '' );
                    wp_nav_menu( $args );
                    ?>

                </nav>

        </div>

    </header>

