<?php

/**
 * Theme Sidebar
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Inc\Classes;

use NM_THEME\Inc\Traits\Singleton;

class Sidebar
{

    use Singleton;

    public $nm_widget_id;
    public $nm_widget_name;
    public $nm_widget_before;
    public $nm_widget_after;
    public $nm_widget_before_title;
    public $nm_widget_after_title;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        //Actions
        add_action( 'widgets_init', [$this, 'register_sidbars'] );
        //add_action( 'widgets_init', [$this, 'test_widget_init'] );

        // Register new widget - Name Submission
        add_action( 'widgets_init', [$this, 'nm_name_widget'] );
    }

    public function test_widget($id){
         //Sidebar
         return register_sidebar(
            array(
                'id'            => $id,
                'name'          => __( 'Test Sidebar', 'nm_theme'),
                'description'   => __( 'Widgets for page sidebar', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 col-xs-12 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nm_font_mont">',
                'after_title'   => '</h4>',
            )
        );
    }

    public function test_widget_init($id){
        $this->test_widget($id);

        dynamic_sidebar($id);
    }

    public function register_sidbars(){
        //Post Sidebar
        register_sidebar(
            array(
                'id'            => 'post-sidebar',
                'name'          => __( 'Primary Sidebar', 'nm_theme'),
                'description'   => __( 'Widgets for page sidebar', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        //Services
        register_sidebar(
            array(
                'id'            => 'footer-services',
                'name'          => __( 'Footer Services', 'nm_theme'),
                'description'   => __( 'Widgets for footer services', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );

        //Social
        register_sidebar(
            array(
                'id'            => 'footer-social',
                'name'          => __( 'Footer Social', 'nm_theme'),
                'description'   => __( 'Widgets for footer social', 'nm_theme'),
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '',
                'after_title'   => '',
            )
        );

        //Footer Widgets
        register_sidebar(
            array(
                'id'            => 'footer-sidebar',
                'name'          => __( 'Footer Menu', 'nm_theme'),
                'description'   => __( 'Widgets for footer social', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
    }


    // Custom Widget register
    public function nm_name_widget(){
        register_widget( 'NM_THEME\Inc\Classes\Name_Submission' );
    }

    
}