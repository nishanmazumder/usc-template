<?php

/**
 * Footer widgets
 * @package NM_USC
 */

?>

<?php

$widget = \NM_THEME\Inc\Classes\Sidebar::get_instance();


?>

<div class="row nm_widget">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <?php
        //$widget->test_widget_init('test-me');

        register_sidebar(
            array(
                'id'            => 'test-side',
                'name'          => __( 'Test Sidebar', 'nm_theme'),
                'description'   => __( 'Widgets for page sidebar', 'nm_theme'),
                'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 col-xs-12 %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="nm_font_mont">',
                'after_title'   => '</h4>',
            )
        );
        ?>
        <!-- <h4 class="nm_font_mont">ENGINEERING</h4>
        <ul>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
        </ul> -->
    </div>
</div>
</div>

<!-- <div class="row nm_widget">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <h4 class="nm_font_mont">ENGINEERING</h4>
        <ul>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <h4 class="nm_font_mont">ENGINEERING</h4>
        <ul>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <h4 class="nm_font_mont">ENGINEERING</h4>
        <ul>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
            <li><a href="#">Important Link</a></li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <h4 class="nm_font_mont">ENGINEERING</h4>
        <ul>
            <li>Email</li>
            <li>Email</li>
            <li>Email</li>
            <li>Email</li>
            <li>Email</li>
        </ul>
    </div>
</div>
</div> -->