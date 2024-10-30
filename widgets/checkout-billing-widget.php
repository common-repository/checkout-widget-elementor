<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;
/**
 * Elementor Billing Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Checkout_Billing_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Billing widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'checkout_billing';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Billing widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Billing Details', 'ecw-checkout-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Billing widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-bars';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Billing widget belongs to.
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
	 * Register Billing widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_form_label',
			[
				'label' => __( 'Form Labels', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

	
		       
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'form_label_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper label,{{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper label'
			]
		);
		
			
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_input',
			[
				'label' => __( 'Field Input ', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'form_input_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper input.input-text, {{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper input.input-text', 
			]
		);
		
		$this->add_control(
			'form_input_text_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper input.input-text, {{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper input.input-text' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper input.input-text,  {{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper input.input-text',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper input.input-text, {{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper input.input-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'text_padding',
			[
				'label' => __( 'Padding', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-billing-fields__field-wrapper input.input-text, {{WRAPPER}} .ecw_billing_details .woocommerce-shipping-fields__field-wrapper input.input-text'=> 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			
			]
		);
				
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_select',
			[
				'label' => __( 'Field Select ', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'form_select_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper select, {{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper .select2-container .select2-selection__rendered',
			]
		);
		
		$this->add_control(
			'form_select_text_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper select, {{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper .select2-container .select2-selection__rendered, {{WRAPPER}} .ecw_billing_details.woocommerce-input-wrapper .select2 .select2-selection .select2-selection__arrow, {{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper .select2-container .select2-selection__rendered .select2-selection__placeholder' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'select_height',
			[
				'label' => __( 'Height(px)', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::NUMBER,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper select, {{WRAPPER}} .woocommerce-input-wrapper .select2 span.select2-selection.select2-selection--single, {{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper .select2-container .select2-selection__rendered, {{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper .select2-container--default .select2-selection--single .select2-selection__arrow' => 'height: {{VALUE}}px;min-height: auto;line-height: {{VALUE}}px',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'select_border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper select, {{WRAPPER}} .woocommerce-input-wrapper .select2 span.select2-selection.select2-selection--single',
			]
		);

		$this->add_control(
			'select_border_radius',
			[
				'label' => __( 'Border Radius', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .woocommerce-input-wrapper select, {{WRAPPER}} .woocommerce-input-wrapper .select2 span.select2-selection.select2-selection--single' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_form_required',
			[
				'label' => __( 'Required Style ', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'required_text_color',
			[
				'label' => __( 'Required * Color', 'ecw-checkout-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_billing_details .required' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'invalid_border',
				'label' => __( 'Required Fields Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_billing_details .woocommerce-invalid input.input-text',
				'separator' => 'before',
			]
		);
		
		$this->end_controls_section();
		
	}
	/**
	 * Render Billing widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
	
		if ( WC()->session ) { 
		?>
		<div class="ecw_billing_details">
		          <?php if ( WC()->checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

					<div id="customer_details">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					</div>

					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

				<?php endif; ?>
		</div>		

	   <?php	
        } /*ends session condition*/	   
	

	}
	public function render_plain_content() {
		$this->render_content();
	}

}