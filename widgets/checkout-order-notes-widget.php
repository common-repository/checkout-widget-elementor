<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;
/**
 * Elementor Order Notes Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Checkout_Order_Notes_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Order Notes widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'checkout_order_notes';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Order Notes widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Order Notes', 'ecw-checkout-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Order Notes widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-pencil-square-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Order Notes widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'woocommerce-checkout' ];
	}

	/**
	 * Register Order Notes widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_order_notes_content',
			[
				'label' => __( 'Order Notes', 'ecw-checkout-widget' ),
			]
		);

		$this->add_control(
			'order_notes_title',
			[
				'label' => __( 'Title', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Enter title for notes section here ... ', 'ecw-checkout-widget' ),
				'default' => __( 'Additional(Order) Notes', 'ecw-checkout-widget' ),
			]
		);
		
		$this->add_control(
			'order_notes_placeholder',
			[
				'label' => __( 'Placeholder Message', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => __( 'Notes about your order, e.g. special notes for delivery.... ', 'ecw-checkout-widget' ),
				'default' => __( 'Notes about your order, e.g. special notes for delivery....', 'ecw-checkout-widget' ),
				
			]
		);
		
		
		
		$this->end_controls_section();
		
		/*Style sections*/
		
		$this->start_controls_section(
			'section_order_notes_style',
			[
				'label' => __( 'Title', 'ecw-checkout-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'background_color',
			[
				'label' => __( 'Background Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'selector' => '{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3',
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
				
		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left'    => [
						'title' => __( 'Left', 'ecw-checkout-widget' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'ecw-checkout-widget' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'ecw-checkout-widget' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'ecw-checkout-widget' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'default' => '',
				'separator' => 'before',
			]
		);
		
		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_ordernotes_message',
			[
				'label' => __( 'Message', 'ecw-checkout-widget' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'	=> 'order_message_typography',
				'selector' => '{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields #order_comments',
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'order_message_border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields #order_comments',
			]
		);
		$this->add_control(
			'order_message_height',
			[
				'label' => __( 'Height(px)', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::NUMBER,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .ecw_order_notes .woocommerce-additional-fields #order_comments' => 'height: {{VALUE}}px;min-height: auto',
				],
			]
		);
		
		$this->end_controls_section();
		
		
		
	}
	/**
	 * Render Order Notes widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
			
		if ( WC()->session ) { 
		$checkout = WC()->checkout();
		?>
		<div class="ecw_order_notes">
			<div class="woocommerce-additional-fields">
				<?php do_action( 'woocommerce_before_order_notes', $checkout ); ?>

				<?php if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

					<h3><?php esc_html_e( $settings['order_notes_title'], 'ecw-checkout-widget' ); ?></h3>

					<div class="woocommerce-additional-fields__field-wrapper">
						<?php foreach ( $checkout->get_checkout_fields( 'order' ) as $key => $field ) : ?>
						<?php $field['placeholder'] = $settings['order_notes_placeholder'];?>
							<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
						<?php endforeach; ?>
					</div>

				<?php endif; ?>

				<?php do_action( 'woocommerce_after_order_notes', $checkout ); ?>
			</div>	
       </div>
	   <?php	
        } /*ends session condition*/	   
	

	}
	public function render_plain_content() {
		$this->render_content();
	}

}