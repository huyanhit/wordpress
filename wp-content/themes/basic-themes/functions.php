<?php
/**
 * Template Main Functions
 * 
 * @package basic-themes
 */
define("THEME_DIR", get_template_directory());
define("THEME_URL", get_template_directory_uri());
define("THEME_URL_ASSETS", get_template_directory_uri().'/assets');

/* auto install plugin after active themes */
require  THEME_DIR. '/core/class-tgm-plugin-activation.php';

/* Add SCSS */
require( THEME_DIR. '/core/scssphp/scss.inc.php' );
require( THEME_DIR. '/core/scssphp/css-js-minifier.php' );
require( THEME_DIR. '/core/scssphp/static.css.php' );

/** Template functions */
require THEME_DIR. '/core/template-functions.php';
require THEME_DIR. '/core/filter-functions.php';
require THEME_DIR. '/core/action-functions.php';
require THEME_DIR. '/core/template-shortcode.php';







