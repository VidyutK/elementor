<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_testimonial extends Widget_Base {
	private $_carusel_options = [];

	public function get_id() {
		return 'testimonial';
	}

	public function get_title() {
		return __( 'Testimonial', 'elementor' );
	}

	public function get_icon() {
		return 'blockquote';
	}

	protected function _register_controls() {
		$this->add_control(
			'section_testimonial',
			[
				'label' => __( 'Testimonial', 'elementor' ),
				'type' => Controls_Manager::SECTION,
			]
		);

		$this->add_control(
			'testimonial_text',
			[
				'label' => __( 'Testimonial Text', 'elementor' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => 'Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo..',
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_full_name',
			[
				'label' => __( 'Full Name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'John Doe',
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_job_title',
			[
				'label' => __( 'Job Title', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Elementor Lover',
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_company',
			[
				'label' => __( 'Job Company', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Elementor',
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_company_url',
			[
				'label' => __( 'Job Company URL', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'http://your-link.com',
				'default' => [
					'url' => '#',
				],
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_image',
			[
				'label' => __( 'Add Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'section' => 'section_testimonial',
			]
		);

		$this->add_control(
			'testimonial_image_position',
			[
				'label' => __( 'Image Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'Elementor',
				'section' => 'section_testimonial',
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'align-right',
					],
				],
			]
		);

		$this->add_control(
			'testimonial_text_position',
			[
				'label' => __( 'Details Position', 'elementor' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'Elementor',
				'section' => 'section_testimonial',
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'align-justify',
					],
				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
				'section' => 'section_image_carousel',
			]
		);

		// Image
		$this->add_control(
			'section_style_testimonial_image',
			[
				'label' => __( 'Image', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_image',
				'selector' => '{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img',
			]
		);

		$this->add_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_image',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-wrapper .elementor-testimonial-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Name
		$this->add_control(
			'section_style_testimonial_name',
			[
				'label' => __( 'Name', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'name_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_name',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'label' => __( 'Typography', 'elementor' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_name',
				'selector' => '{{WRAPPER}} .elementor-testimonial-name',
			]
		);

		// Detailes
		$this->add_control(
			'section_style_testimonial_job',
			[
				'label' => __( 'Job & Company', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'job_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_job',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-job-title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elementor-testimonial-company a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_typography',
				'label' => __( 'Typography', 'elementor' ),
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_job',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-job-title',
					'{{WRAPPER}} .elementor-testimonial-company a',
				],
			]
		);

		$this->add_control(
			'section_style_testimonial_text',
			[
				'label' => __( 'Content', 'elementor' ),
				'type' => Controls_Manager::SECTION,
				'tab' => self::TAB_STYLE,
			]
		);

		$this->add_control(
			'content_text_color',
			[
				'label' => __( 'Text Color', 'elementor' ),
				'type' => Controls_Manager::COLOR,
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_text',
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Typography', 'elementor' ),
				'tab' => self::TAB_STYLE,
				'section' => 'section_style_testimonial_text',
				'selector' => '{{WRAPPER}} .elementor-testimonial-text',
			]
		);
	}

	protected function render( $instance = [] ) {
		if ( empty( $instance['testimonial_full_name'] ) || empty( $instance['testimonial_text'] ) )
			return;

		$has_image = false;
		if ( '' !== $instance['testimonial_image']['url'] ) {
			$image_url = $instance['testimonial_image']['url'];
			$has_image = ' elementor-has-image';
		}

		$testimonial_image_position = $instance['testimonial_image_position'] ? ' elementor-testimonial-image-align-' . $instance['testimonial_image_position'] : '';
		$testimonial_text_position = $instance['testimonial_text_position'] ? ' elementor-testimonial-text-align-' . $instance['testimonial_text_position'] : '';
		?>
		<div class="elementor-testimonial-wrapper<?php echo $testimonial_text_position; ?><?php echo $testimonial_image_position; ?>">

			<?php if ( ! empty( $instance['testimonial_text'] ) ) : ?>
				<div class="elementor-testimonial-text">
						<?php echo $instance['testimonial_text']; ?>
				</div>
			<?php endif; ?>

			<div class="testimonial_description">

				<?php if ( isset( $image_url ) ) : ?>
					<div class="elementor-testimonial-image<?php echo $testimonial_image_position; ?>">
						<figure>
							<img src="<?php echo esc_attr( $image_url ); ?>" alt="testimonial" />
						</figure>
					</div>
				<?php endif; ?>

				<div class="testimonial-detailes<?php if ( $has_image ) echo $has_image; ?>">
					<?php if ( ! empty( $instance['testimonial_full_name'] ) ) : ?>
						<div class="elementor-testimonial-name">
							<?php echo $instance['testimonial_full_name']; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $instance['testimonial_job_title'] ) ) : ?>
						<span class="elementor-testimonial-job-title">
							<?php echo $instance['testimonial_job_title']; ?>
						</span>
					<?php endif; ?>

					<?php if ( ! empty( $instance['testimonial_company'] ) ) : ?>
						<span class="elementor-testimonial-company">
							-
							<?php if ( ! empty( $instance['testimonial_company_url']['url'] ) ) : ?>
								<a href="<?php echo esc_url( $instance['testimonial_company_url']['url'] ); ?>" class="elementor-testimonial-company-url">
							<?php endif; ?>
								<?php echo $instance['testimonial_company']; ?>
							<?php if ( ! empty( $instance['testimonial_company_url'] ) ) : ?>
								</a>
							<?php endif; ?>
						</span>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php
	}

	protected function content_template() {
		?>
		<%
		var hasImage = '';
		if ( '' !== settings.testimonial_image.url ) {
			imageUrl = settings.testimonial_image.url;
			hasImage = ' elementor-has-image';
		}

		var testimonial_text_position = settings.testimonial_text_position ? ' elementor-testimonial-text-align-' + settings.testimonial_text_position : '';
		var testimonial_image_position = settings.testimonial_image_position ? ' elementor-testimonial-image-align-' + settings.testimonial_image_position : '';
		%>
		<div class="elementor-testimonial-wrapper<%- testimonial_text_position %>">

			<% if ( '' !== settings.testimonial_text ) { %>
				<div class="elementor-testimonial-text">
					<%= settings.testimonial_text %>
				</div>
		    <% } %>

			<div class="testimonial_description<%- testimonial_text_position %>">

				<% if ( imageUrl ) { %>
					<div class="elementor-testimonial-image<%- testimonial_image_position %>">
						<figure>
							<img src="<%- imageUrl %>" alt="testimonial" />
						</figure>
					</div>
				<% } %>

				<div class="testimonial-detailes<%- hasImage %>">

					<% if ( '' !== settings.testimonial_full_name ) { %>
						<div class="elementor-testimonial-name">
							<%= settings.testimonial_full_name %>
						</div>
					<% } %>

					<% if ( '' !== settings.testimonial_job_title ) { %>
						<span class="elementor-testimonial-job-title">
							<%= settings.testimonial_job_title %>
						</span>
					<% } %>

					<% if ( '' !== settings.testimonial_company ) { %>
						<span class="elementor-testimonial-company">

							<% if ( '' !== settings.testimonial_company_url.url ) { %>
								<a href="<%- settings.testimonial_company_url.url %>" class="elementor-testimonial-company-url">
							<% } %>

								<%= settings.testimonial_company %>

							<% if ( '' !== settings.testimonial_company_url.url ) { %>
								</a>
							<% } %>

						</span>
					<% } %>

				</div>
			</div>
		</div>
	<?php
	}
}
