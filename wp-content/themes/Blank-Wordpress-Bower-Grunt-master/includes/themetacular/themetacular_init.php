<?php 
/**
 * Require all of the files that the themetacular framework needs
 * 
 * @package awesome
 */

/************************************************************
*  Tags that make current wp functions easier/better
************************************************************/
include(get_template_directory() .'/includes/themetacular/template_tags.php');

/************************************************************
*  Themetacular shortcodes
************************************************************/
include(get_template_directory() .'/includes/themetacular/shortcodes.php');


/************************************************************
*   Include all of the custom functionality
************************************************************/
include(get_template_directory() .'/includes/themetacular/themetacular_customizer.php');


