<?php

/**
 * Elementor Widget - Course Video
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;

class NM_USC_FEE extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "usc_app_fee";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "USC Application Fee";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-price-list";
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
        //Application Fee
        $this->start_controls_section(
            'usc_app_fee_section',
            [
                'label' => __('Application Fee', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_app_fee', [
            'label' => __('Application Fee', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Application Fee', 'nm_theme'),
        ]);

        $this->add_control('usc_app_fee_des', [
            'label' => __('Description', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('We highly recommend that you only submit one application to the degree of most interest to you.', 'nm_theme'),
        ]);

        $this->end_controls_section();

        //Application Block
        $this->start_controls_section(
            'usc_apply_block',
            [
                'label' => __('Contact', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_phone', [
            'label' => __('Phone Number', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('(213) 821-5916', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_btn', [
            'label' => __('Apply Button', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('APPLY ONLINE', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_btn_url', [
            'label' => __('Button Link', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'input_type' => 'url',
            'default' => __('#', 'nm_theme'),
        ]);

        $this->end_controls_section();

        //Style
        $this->start_controls_section(
            'usc_apply_fee_style',
            [
                'label' => __('Style', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_apply_block_bg', [
            'label' => __('Apply Block Background', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => __('#131313', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_btn_color', [
            'label' => __('Apply Button Text', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => __('#fff', 'nm_theme'),
        ]);

        $this->add_control('usc_apply_btn_bg', [
            'label' => __('Apply Button Background', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => __('#C90D2C', 'nm_theme'),
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

        <!--Third section start-->
        <section class="section_third">
            <div class="container">
                <div class="row no-gutters">

                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="nm_app_fee">
                            <h2 class="nm_font_mont"><?php echo $settings['usc_app_fee']; ?></h2>
                            <p class="nm_font_mont"><?php echo $settings['usc_app_fee_des']; ?></p>
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="nm_app_contact" style="background: <?php echo $settings['usc_apply_block_bg']; ?>;">
                            <h3 class="nm_font_mont"><img src="<?php echo NM_DIR_URI ?>/assets/img/phone_icon.png" alt="" /><?php echo $settings['usc_phone']; ?></h3>
                            <a href="<?php echo $settings['usc_apply_btn_url']; ?>" class="btn nm_usc_sbt_btn" style="color: <?php echo $settings['usc_apply_btn_color']; ?>; background: <?php echo $settings['usc_apply_btn_bg']; ?>;">
                                <?php echo $settings['usc_apply_btn']; ?>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!--Third section end-->

<?php


    }
} //Class
