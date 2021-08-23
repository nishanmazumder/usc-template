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
        //USC Video section
        $this->start_controls_section(
            'usc_info_section',
            [
                'label' => __('USC Video', 'nm_theme'),
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

<!--Second section start-->
<section class="section_second">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="nm_app_info">
                    <h2 class="nm_font_mont">Application Information</h2>
                    <p class="nm_font_mont">We highly recommend that you only submit one application to the degree
                        of most interest to you. We would be happy to consider you for one of our other degrees.
                        <br /><br />

                        Once you have submitted your application to your first-choice program, please email
                        gipadmissions@law.usc.edu.
                    </p>
                </div>

                <div class="nm_app_des">
                    <h4 class="nm_font_mont">Among the required information & documents you will submit are:</h4>

                    <table class="nm_font_mont">
                        <tr>
                            <td><img src="<?php echo NM_DIR_URI ?>/assets/img/list_star.png" alt="List Style" /></td>
                            <td>Bachelor’s degree transcripts and degree verification</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo NM_DIR_URI ?>/assets/img/list_star.png" alt="List Style" /></td>
                            <td>Personal statement — two to three pages that describe your personal, academic and
                                professional background and your reasons for interest</td>
                        </tr>
                        <tr>
                            <td><img src="<?php echo NM_DIR_URI ?>/assets/img/list_star.png" alt="List Style" /></td>
                            <td>Résumé or curriculum vitae</td>
                        </tr>
                    </table>

                </div>

            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="nm_dead_des">
                    <h4 class="nm_font_mont">DEADLINES</h4>
                    <p class="nm_font_mont">
                        Admission decisions are normally released within two to four weeks of application
                        submission. Admission decisions are sent by email. No admission decisions will be released
                        by phone.
                    </p>
                </div>

                <div class="nm_dead_data">
                    <table class="nm_font_mont">
                        <tr>
                            <td class="font_color_red">Priority</td>
                            <td>Summer 2018</td>
                            <td>Fall 2018</td>
                        </tr>
                        <tr>
                            <td class="font_color_red">Application Deadline</td>
                            <td>March 14, 2018</td>
                            <td>July 11, 2018</td>
                        </tr>
                        <tr>
                            <td class="font_color_red">Courses Start</td>
                            <td>May 9, 2018</td>
                            <td>September 5 2018</td>
                        </tr>
                        <tr>
                            <td class="font_color_red">Courses End</td>
                            <td>August 21, 2018</td>
                            <td>December 18, 2018</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Second section end-->

<?php


    }
} //Class
