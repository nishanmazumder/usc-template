<?php

/**
 * Functions
 * @package NM_THEME
 */

/**
 * Theme URL
 */
if (!defined('NM_DIR_PATH')) {
   define('NM_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('NM_DIR_URI')) {
   define('NM_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('NM_STYLE_URI')) {
   define('NM_STYLE_URI', untrailingslashit(get_stylesheet_uri()));
}

/**
 * Autoload
 */
require_once NM_DIR_PATH . '/vendor/autoload.php';


/**
 * Theme Bootstrap
 */
nm_theme_get_instance();
function nm_theme_get_instance()
{
   \NM_THEME\Inc\Classes\NM_THEME::get_instance();
}

/**
 * Template Functions
 */
require_once NM_DIR_PATH . '/inc/template-functions.php';

/**
 * Template Tags
 */
require_once NM_DIR_PATH . '/inc/template-tags.php';

/**
 * Tester
 */
require_once NM_DIR_PATH . '/inc/helpers/info&tester.php';

/**
 * Load Require plugin by TGM
 */
require_once NM_DIR_PATH . '/lib/tgm/class-tgm-plugin-activation.php';
require_once NM_DIR_PATH . '/lib/tgm/config.php';
