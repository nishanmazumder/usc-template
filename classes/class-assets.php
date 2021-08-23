<?php

/**
 * Theme Enqueue
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes;

use NM_THEME\Traits\Singleton;

class Assets
{

    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        /***
        * Actions
        ***/
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
    }

    public function register_styles()
    {
        wp_enqueue_style('bootstrap-css', NM_DIR_URI . '/assets/css/bootstrap.min.css');
        
        wp_enqueue_style('owl-carousel', NM_DIR_URI . '/assets/css/owl.carousel.min.css');
        wp_enqueue_style('fontawesome', NM_DIR_URI . '/assets/css/fontawesome-all.css');
        wp_enqueue_style('main-css', NM_DIR_URI . '/assets/css/style.css', [], filemtime(NM_DIR_PATH. '/assets/css/style.css'), 'all');
        wp_enqueue_style('stylesheet', NM_STYLE_URI, [], filemtime(NM_DIR_PATH . '/style.css'), 'all');

        // wp_register_style('is_archive', get_template_directory_uri() . '/archive.css', [], filemtime(get_template_directory('/archive.css')), 'all');

        // if (is_archive()) {
        //     wp_enqueue_style('is_archive');
        // }
    }

    public function register_scripts()
    {
        wp_enqueue_script('bootstrap-js', NM_DIR_URI . '/assets/js/bootstrap.min.js', array('jquery'), 'v5.0.1', true); //footer
        wp_enqueue_script('owl-js', NM_DIR_URI . '/assets/js/owl.carousel.min.js', array('jquery'), 'v5.0.1', true); //footer
        wp_enqueue_script('main-js', NM_DIR_URI . '/assets/js/main.js', array('jquery'), filemtime(NM_DIR_PATH . '/assets/js/main.js'), true); //footer
    }
}
