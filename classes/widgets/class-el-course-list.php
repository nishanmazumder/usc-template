<?php

/**
 * Elementor Widget - Course Video
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;
use WP_Query;

class NM_USC_COURSE_LIST extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "usc_course_list";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "USC All Course";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-slider-push";
    }

    /**
     * Widget Categories
     */
    public function get_categories()
    {
        return ['theme-elements'];
    }

    /**
     * Widget Controls
     */
    protected function _register_controls()
    {
        //USC Video section
        $this->start_controls_section(
            'usc_all_course',
            [
                'label' => __('All Course', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_course_page', [
            'label' => __('Course Page', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'input_type' => 'url',
            'default' => '#'
        ]);

        $this->end_controls_section();
    }

    /**
     * Widget Display
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>


        <!-- Course Section -->
        <section class="nm_course">
            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme">

                        <?php

                        $args = [
                            'post_type' => 'lp_course',
                            'post_status' => 'publish',
                            'posts_per_page' => -1
                        ];

                        $query = new WP_Query($args);
                        
                        // echo '<pre>'; 
                        // print_r($query);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>

                                <!-- Course Item -->
                                <div class="item">
                                    <a href="<?php esc_url(the_permalink()); ?>">
                                        <div class="nm_course_area" style="background-image: url('<?php esc_url(the_post_thumbnail_url()); ?>')">
                                            <span class="nm_course_date"><?php echo get_the_date('M'); ?></span>
                                            <div class="nm_course_data">
                                                <h3><?php esc_html_e(nm_post_title_limit(4)); ?></h3>
                                                <span class="nm_course_readmore"><?php esc_html_e('View Details', 'nm_theme'); ?> <i class="fas fa-arrow-circle-down"></i></span>
                                            </div>
                                            <div class="nm_course_data_overlay">
                                                <h3><?php esc_html(the_title()); ?></h3>
                                                <span>Price : <i class="fas fa-dollar-sign"></i> <?php echo get_post_meta(get_the_ID(),'_lp_price', true); ?> / <?php echo get_post_meta(get_the_ID(),'_lp_duration', true); ?></span>
                                                <p><?php nm_post_excerpt_limit(100); ?></p>
                                                <span href="<?php esc_url(the_permalink()); ?>" class="nm_course_readmore"><?php esc_html_e('Read More', 'nm_theme'); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                        <?php
                            endwhile;
                        else : echo "No data found";
                        endif;

                        wp_reset_postdata();

                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right nm_course_view_sec">
                        <a href="<?php echo esc_url($settings['usc_course_page']); ?>" class="nm_course_view"><?php esc_html_e('View More Course', 'nm_theme'); ?><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Course Section -->

<?php
    }
} //Class
