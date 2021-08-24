<?php

/**
 * Elementor Widget - Course Video
 * 
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base as Widget_Base;

class NM_USC_INFO extends Widget_Base
{
    /**
     *  Widget name
     */
    public function get_name()
    {
        return "usc_course_info";
    }

    /**
     * Widget title
     */
    public function get_title()
    {
        return "USC Information";
    }

    /**
     * Widget Icon
     */
    public function get_icon()
    {
        return "eicon-table-of-contents";
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
            'usc_info_section',
            [
                'label' => __('Application Information', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_info_title', [
            'label' => __('Application Information', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Application Information', 'nm_theme'),
        ]);

        $this->add_control('usc_info_des', [
            'label' => __('Description', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('We highly recommend that you only submit one application to the degree of most interest to you.', 'nm_theme'),
        ]);

        $this->end_controls_section();

        //Application Information List
        $this->start_controls_section(
            'usc_info_list_section',
            [
                'label' => __('Application Information List', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_info_list_title', [
            'label' => __('Information Title', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Among the required information & documents you will submit are:', 'nm_theme'),
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'usc_info_list_content',
            [
                'label' => __('Info List', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('100 percent online — convenient', 'nm_theme'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'usc_info_list',
            [
                'label' => __('Info List', 'nm_theme'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'usc_info_list_content' => __('Bachelor’s degree transcripts and degree verification.', 'nm_theme'),
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        //Application Notice
        $this->start_controls_section(
            'usc_deadline',
            [
                'label' => __('Deadlines Notice', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_dead_title', [
            'label' => __('Application Information', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Deadlines title', 'nm_theme'),
        ]);

        $this->add_control('usc_dead_des', [
            'label' => __('Deadlines Description', 'nm_theme'),
            'label_block' => true,
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('Admission decisions are normally released within two to four weeks of application submission.', 'nm_theme'),
        ]);

        $this->end_controls_section();


        $this->start_controls_section(
            'usc_apply_timeline',
            [
                'label' => __('Time Line', 'nm_theme'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('usc_timeline', [
            'label' => __('Timeline', 'nm_theme'),
            'type' => \Elementor\Controls_Manager::WYSIWYG,
            'default' => __('Admission decisions are normally released ', 'nm_theme'),
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

        <!--Second section start-->
        <section class="section_second">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="nm_app_info">
                            <h2 class="nm_font_mont"><?php echo $settings['usc_info_title']; ?></h2>
                            <p class="nm_font_mont"><?php echo $settings['usc_info_des']; ?></p>
                        </div>

                        <div class="nm_app_des">
                            <h4 class="nm_font_mont"><?php echo $settings['usc_info_list_title']; ?></h4>

                            <table class="nm_font_mont">
                                <?php if ($settings['usc_info_list']) :
                                    foreach ($settings['usc_info_list'] as $item) : ?>
                                        <tr>
                                            <td><img src="<?php echo NM_DIR_URI ?>/assets/img/list_star.png" alt="List Style" /></td>
                                            <td><?php echo $item['usc_info_list_content']; ?></td>
                                        </tr>

                                    <?php

                                    endforeach;
                                else :
                                    ?>
                                    <tr>
                                        <td><img src="<?php echo NM_DIR_URI ?>/assets/img/list_star.png" alt="List Style" /></td>
                                        <td>
                                            <p>No List item available.</p>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>

                        </div>

                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="nm_dead_des">
                            <h4 class="nm_font_mont"><?php echo $settings['usc_dead_title']; ?></h4>
                            <p class="nm_font_mont"><?php echo $settings['usc_dead_des']; ?></p>
                        </div>
                        <div class="nm_dead_data">
                            <?php echo $settings['usc_timeline']; ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Second section end-->

<?php


    }
} //Class
