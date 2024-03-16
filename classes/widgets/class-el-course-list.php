<?php

/**
 * Elementor Widget - Course Video
 *
 * @package NM_THEME
 */

namespace NM_THEME\Classes\Widget;

use Elementor\Widget_Base;
use WP_Query;

class NM_USC_COURSE_LIST extends Widget_Base {
	/**
	 *  Widget name
	 */
	public function get_name() {
		return 'usc_course_list';
	}

	/**
	 * Widget title
	 */
	public function get_title() {
		return 'USC All Course';
	}

	/**
	 * Widget Icon
	 */
	public function get_icon() {
		return 'eicon-slider-push';
	}

	/**
	 * Widget Categories
	 */
	public function get_categories() {
		return array( 'theme-elements' );
	}

	/**
	 * Widget Controls
	 */
	protected function _register_controls() {
		// USC Video section
		$this->start_controls_section(
			'usc_all_course',
			array(
				'label' => __( 'All Course', 'nm_theme' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'usc_post_type',
			array(
				'label'   => esc_html__( 'Post type', 'nm_theme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => array(
					''          => esc_html__( 'Default', 'nm_theme' ),
					'post '     => esc_html__( 'Posts', 'nm_theme' ),
					'lp_course' => esc_html__( 'Course', 'nm_theme' ),
				),
			)
		);

		$this->add_control(
			'post_count',
			array(
				'label'   => esc_html__( 'Show Posts', 'nm_theme' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 5,
				'max'     => 100,
				'step'    => 1,
				'default' => 10,
			)
		);

		$this->add_control(
			'usc_post_orderby',
			array(
				'label'   => esc_html__( 'Post Orderby', 'nm_theme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => array(
					'title'      => esc_html__( 'Title', 'nm_theme' ),
					'date '      => esc_html__( 'Date', 'nm_theme' ),
					'menu_order' => esc_html__( 'Menu Order', 'nm_theme' ),
				),
			)
		);

		$this->add_control(
			'usc_post_order',
			array(
				'label'   => esc_html__( 'Order', 'nm_theme' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'asc',
				'options' => array(
					'asc'   => esc_html__( 'ASC', 'nm_theme' ),
					'desc ' => esc_html__( 'DESC', 'nm_theme' ),
				),
			)
		);

		$this->add_control(
			'usc_course_page',
			array(
				'label'      => __( 'Course Page Link', 'nm_theme' ),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'default'    => '#',
			)
		);

		$this->end_controls_section();
	}

	/**
	 * Widget Display
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>

		<!-- Course Section -->
		<section class="nm_course">
			<div class="container-fluid">
				<div class="row">
					<div class="owl-carousel owl-theme">

						<?php

						$args = array(
							'post_type'      => $settings['usc_post_type'],
							'post_status'    => 'publish',
							'posts_per_page' => $settings['post_count'],
							'orderby'        => $settings['usc_post_orderby'],
							'sort_order'     => $settings['usc_post_order'],
						);

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) :
								$query->the_post();
								?>

								
								<div class="item">
									<a href="<?php esc_url( the_permalink() ?? '' ); ?>">
										<div class="nm_course_area" style="background-image: url('<?php esc_url( the_post_thumbnail_url() ?? '' ); ?>')">
											<span class="nm_course_date"><?php echo get_the_date( 'M' ); ?></span>
											<div class="nm_course_data">
												<h3><?php esc_html_e( nm_post_title_limit( 4 ) ); ?></h3>
												<span class="nm_course_readmore"><?php esc_html_e( 'View Details', 'nm_theme' ); ?> <i class="fas fa-arrow-circle-down"></i></span>
											</div>
											<div class="nm_course_data_overlay">
												<h3><?php esc_html( the_title() ); ?></h3>
												<span>Price : <i class="fas fa-dollar-sign"></i> <?php echo get_post_meta( get_the_ID(), '_lp_price', true ); ?> / <?php echo get_post_meta( get_the_ID(), '_lp_duration', true ); ?></span>
												<p><?php nm_post_excerpt_limit( 100 ); ?></p>
												<span href="<?php esc_url( the_permalink() ); ?>" class="nm_course_readmore"><?php esc_html_e( 'Read More', 'nm_theme' ); ?></span>
											</div>
										</div>
									</a>
								</div>

								<?php
								endwhile;
								else :
									echo 'No data found';
								endif;

								wp_reset_postdata();

								?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-right nm_course_view_sec">
						<a href="<?php echo esc_url( $settings['usc_course_page'] ); ?>" class="nm_course_view"><?php esc_html_e( 'View More Course', 'nm_theme' ); ?><i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</section>

		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$('.nm_course .owl-carousel').owlCarousel({
					autoplay: true,
					autoplayHoverPause: true,
					autoplayTimeout: 4000,
					loop: true,
					margin: 10,
					nav: false,
					dots: true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 3
						},
						1000: {
							items: 5
						}
					}
				})
			});
		</script>
		<!-- Course Section -->

		<?php
	}
} //Class
