<?php
/*
*   =================================================================================================
*   INSTALLATION
*   Create in this file all the needed pages, posts for the website
*   =================================================================================================
*/
include __DIR__ . "/includes/installation.php";


/*
*   =================================================================================================
*   BASIC CONFIGURATION
*   Register in this file the needed sidebars, widgets, menus.
*   =================================================================================================
*/
include __DIR__ . "/includes/config.php";



/*
*   =================================================================================================
*   SCRIPTS AND STYLES
*   Register the JS Scripts and CSS Styles in the 'includes/enqueues/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/includes/enqueues/*.php") as $filename)
    include $filename;


/*
*   ================================================================================================= 
*   CUSTOM POST TYPES
*   Include all the Custom Post Types you need in the 'includes/cpts/' folder and they will be loaded
*   automatically.
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/includes/cpts/*.php") as $filename)
    include $filename;




/*
*   =================================================================================================
*   PHP LIBS
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/includes/libs/*.php") as $filename)
	include $filename;





/*
*   =================================================================================================
*   HOOKS
*   =================================================================================================
*/
foreach (glob(__DIR__ . "/includes/hooks/*.php") as $filename)
	include $filename;