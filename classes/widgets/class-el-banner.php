<?php

/**
 * Elementor Widget - Course Video
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;

class NM_USC_BANNER extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "usc_course_banner";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "USC Banner";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-image-rollover";
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
        //Application Information
        $this->start_controls_section(
            'usc_banner',
            [
                'label' => __('Usc Banner', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_banner_title', [
            'label' => __('Banner Title', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('MASTER OF STUDIES IN LAW AT USC GOULD', 'nm_theme'),
        ]);

        $this->add_control('usc_banner_subtitle', [
            'label' => __('Banner Subtitle', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Earn your degree at a fully accredited,', 'nm_theme'),
        ]);

        $this->add_control('usc_banner_subtitle_2', [
            'label' => __('Banner Second Subtitle', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('TOP-RANKED LAW SCHOOL.', 'nm_theme'),
        ]);

        $this->add_control('usc_banner_des', [
            'label' => __('Banner Content', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('The online Master of Studies in Law (MSL) degree offers experienced', 'nm_theme'),
        ]);

        $this->add_control(
            'banner_icon_image',
            [
                'label' => __('Icon Image', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ]
            ]
        );

        $this->end_controls_section();

        // Apply Online
        $this->start_controls_section(
            'usc_apply_form',
            [
                'label' => __('Application Form', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_apply_form_title', [
            'label' => __('Form Title', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('THE FUTURE STARTS TODAY', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_form_phone', [
            'label' => __('Phone Number', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('(213) 821-5916', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_form_button', [
            'label' => __('Form Button', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('REQUEST INFORMATION', 'nm_theme'),
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

        <!-- Banner -->
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="nm_usc_headline">
                        <h1 class="nm_header_h1 font_color_white"><?php echo $settings['usc_banner_title']; ?></h1>
                        <h2 class="nm_header_h1_2 font_color_white"><?php echo $settings['usc_banner_subtitle']; ?> <br />
                            <span class="nm_letter_spacing"><?php echo $settings['usc_banner_subtitle_2']; ?></span>
                        </h2>
                        <div class="nm_seperator"></div>
                        <p class="nm_paragraph font_color_white"><?php echo $settings['usc_banner_des']; ?></p>
                        <img src="<?php echo $settings['banner_icon_image']['url']; ?>" alt="" />
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <div class="nm_usc_form_sec">
                        <div class="nm_usc_form_area">
                            <h3 class="font_color_white text-center"><?php echo $settings['usc_apply_form_title']; ?></h3>
                            <form method="POST" id="nmApplyForm" class="nm_usc_form" action="">
                                <?php wp_nonce_field('usc_nonce_action', 'usc_nonce_field'); ?>
                                <h3 class="font_color_red text-center "><strong><?php echo $settings['usc_apply_form_phone']; ?></strong></h3>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="usc_name" id="usc_name" aria-describedby="nameHelp" placeholder="NAME">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="usc_phone" id="usc_phone" aria-describedby="phoneHelp" placeholder="PHONE">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="usc_email" id="usc_email" aria-describedby="emailHelp" placeholder="EMAIL">
                                </div>
                                <div class="row no-gutters">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="usc_country" id="usc_country" aria-describedby="phoneHelp" placeholder="COUNTRY">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group usc_zip">
                                            <input type="text" class="form-control" name="usc_zip" id="usc_zip" aria-describedby="phoneHelp" placeholder="ZIP CODE">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="usc_country" id="usc_country" aria-describedby="phoneHelp" placeholder="COUNTRY">
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" name="usc_subscription" type="checkbox" value="" id="">
                                    <label class="form-check-label nm_font_mont" for="exampleCheck1">Would you like to receive updates about your application? </label>
                                </div>
                                

                                <button name="nm_usc_submit" type="submit" class="btn nm_usc_sbt_btn nm_usc_main_form_btn"><?php echo $settings['usc_apply_form_button']; ?></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!--Header section end-->

<?php


    }
} //Class
