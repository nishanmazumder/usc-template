<?php

/**
 * Elementor Widget - Course Video
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;

class NM_USC_COURSE extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "usc_course_details";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "USC Course Reasons";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-post-list";
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
            'usc_video_section',
            [
                'label' => __('USC Video', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_video', [
            'label' => __('Course Video', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'input_type' => 'url',
            'default' => __('https://www.youtube.com/watch?v=eKMp-4Mmqdw', 'nm_theme')
        ]);

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

        $this->add_control('usc_apply_btn_color', [
            'label' => __('Apply Button Color', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => __('#C90D2C', 'nm_theme'),
        ]);



        $this->end_controls_section();



        //USC Course section
        $this->start_controls_section(
            'usc_course_section',
            [
                'label' => __('USC Course', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_title', [
            'label' => __('Reasons Title', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('Reasons to Pursue <br />An MSL From <span class="font_color_red">USC</span> <br />Gould:', 'nm_theme'),
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title',
            [
                'label' => __('Title', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('List Title', 'nm_theme'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'usc_list_content',
            [
                'label' => __('Reasons List', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('100 percent online — convenient', 'nm_theme'),
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'list_color',
            [
                'label' => __('Color', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::COLOR
            ]
        );

        $this->add_control(
            'usc_list',
            [
                'label' => __('Repeater List', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => __('Title #1', 'plugin-domain'),
                        'usc_list_content' => __('100 percent online — convenient', 'nm_theme'),
                    ]
                ]
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Widget Display
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

?>

        <!--First section start-->
        <section class="section_first" style="background: url(<?php echo NM_DIR_URI ?>/assets/img/white_bg.png) no-repeat;">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="nm_usc_youtube">
                            <?php if (!empty($settings['usc_video'])) : ?>
                                <?php echo wp_oembed_get($settings['usc_video']); ?>
                                <!-- <iframe class="nm_usc_course_video" src="" title="Course Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                            <?php else : ?>
                                <img src="<?php echo NM_DIR_URI ?>/assets/img/youtube.png" alt="" />
                            <?php endif ?>
                        </div>

                        <div class="nm_usc_apply">
                            <h3 class="nm_font_mont"><img src="<?php echo NM_DIR_URI ?>/assets/img/phone_icon2.png" alt="" />(213) 821-5916</h3>
                            <a href="<?php echo $settings['usc_apply_btn_url']; ?>" class="btn nm_usc_sbt_btn" style="background: <?php echo $settings['usc_apply_btn_color']; ?>;"><?php echo $settings['usc_apply_btn']; ?></a>
                        </div>


                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="nm_usc_reson">
                            <div class="row">
                                <div class="col-4">
                                    <h1 class="nm_usc_spc_ten nm_font_mont">
                                        <?php echo str_pad(count($settings['usc_list']), 2, '0', STR_PAD_LEFT); ?>
                                    </h1>
                                </div>
                                <div class="col-8">
                                    <div class="nm_usc_reason_area">
                                        <h1 class="nm_font_mont font_color_white"><?php echo $settings['usc_title']; ?></h1>

                                        <table class="nm_font_mont">
                                            <?php if ($settings['usc_list']) :
                                                $i = 01;
                                                foreach ($settings['usc_list'] as $item) : ?>
                                                    <tr>
                                                        <td class="align-top <?php echo "usc-list-" . $item['_id']; ?>"><span class="nm_reson_list_style"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT); ?></span></td>
                                                        <td>
                                                            <p><?php echo $item['usc_list_content']; ?></p>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $i++;
                                                endforeach;
                                            else :
                                                ?>
                                                <tr>
                                                    <td class="align-top"><span class="nm_reson_list_style">01</span></td>
                                                    <td>
                                                        <p>No List item available.</p>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--First section end-->

<?php


    }
} //Class
