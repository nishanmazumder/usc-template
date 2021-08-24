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
   \NM_THEME\Classes\NM_THEME::get_instance();
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
 * Load Require plugin by TGM
 */
require_once NM_DIR_PATH . '/inc/tgm-activation.php';
require_once NM_DIR_PATH . '/inc/tgm-config.php';

/**
 * ACF
 */

// if ( is_plugin_active('advanced-custom-fields') ) {
//    // do something
// }

// Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

add_filter('learn-press/override-templates', function () {
   return true;
});

//Hide admin bar for subscriber
add_filter( 'show_admin_bar' , 'usc_hide_adminbar_all');
function usc_hide_adminbar_all($show_admin_bar) {
    return ( current_user_can( 'administrator' ) ) ? $show_admin_bar : false;
}