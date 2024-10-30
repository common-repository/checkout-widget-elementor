<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;
/**
 * Elementor Review & Pay Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Checkout_Payment_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Review & Pay widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'checkout_order_payment';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Review & Pay widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Review & Pay', 'ecw-checkout-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Review & Pay widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-credit-card';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Review & Pay widget belongs to.
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
	 * Register Review & Pay widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		
		/*Payment Method Name start*/
		$this->start_controls_section(
			'paysection_label_tag',
			[
				'label' => __( 'Payment Method Name', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'pay_label_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_payment_details li.wc_payment_method label'
			]
		);
		
		
		$this->end_controls_section();
		/*Payment Method Name end*/
		
		
		/*Payment Info Box start*/
		$this->start_controls_section(
			'paysection_info_box',
			[
				'label' => __( 'Payment Info Box', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'pay_infobox_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_payment_details #payment div.payment_box'
			]
		);
		
		$this->add_control(
			'pay_infobox_text_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_payment_details #payment div.payment_box' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'pay_infobox_background_color',
			[
				'label' => __( 'Background Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ecw_payment_details #payment div.payment_box' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .ecw_payment_details #payment div.payment_box::before' => 'border: 1em solid {{VALUE}};border-right-color: transparent;border-left-color: transparent;border-top-color: transparent;',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pay_infobox_border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} .ecw_payment_details #payment div.payment_box',
			]
		);

		$this->add_control(
			'pay_infobox_border_radius',
			[
				'label' => __( 'Border Radius', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .ecw_payment_details #payment div.payment_box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		/*Payment Info Box ends*/
		
		/*Payment section P tag starts*/
		$this->start_controls_section(
			'paysection_p_tag',
			[
				'label' => __( 'P', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'pay_p_tag_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} .ecw_payment_details .woocommerce-terms-and-conditions-wrapper'
			]
		);
		
	    $this->end_controls_section();
		/*Payment section P tag ends*/
		
		/*Payment button start*/	
		$this->start_controls_section(
			'paysection_button',
			[
				'label' => __( 'Button', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'paybutton_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} #payment .place-order .button'
			]
		);
		
		$this->add_control(
			'paybutton_text_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'paybutton_background_color',
			[
				'label' => __( 'Background Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} #payment .place-order .button',
			]
		);
		$this->add_control(
			'payborder_radius',
			[
				'label' => __( 'Border Radius', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_control(
			'payhover_options',
			[
				'label' => __( 'Button Hover Options', 'ecw-checkout-widget' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		
		$this->add_control(
			'payhover_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button:hover, {{WRAPPER}} #payment .place-order .button:focus' => 'color: {{VALUE}};',
					'{{WRAPPER}} #payment .place-order .buttonn:hover svg, {{WRAPPER}} #payment .place-order .button:focus svg' => 'fill: {{VALUE}};',
				],
		
			]
		);
		
		$this->add_control(
			'pay_background_hover_color',
			[
				'label' => __( 'Background Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button:hover, {{WRAPPER}} #payment .place-order .button:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'paybutton_padding',
			[
				'label' => __( 'Padding', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} #payment .place-order .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		
		
		

		$this->end_controls_section();
		/*Payment button ends*/	
		
	}
	/**
	 * Render Review & Pay widget output on the frontend.
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
		<div class="ecw_payment_details">
		 <?php  woocommerce_checkout_payment(); ?>
		</div>	
     

	   <?php	
        } /*ends session condition*/	   
	

	}
	public function render_plain_content() {
		$this->render_content();
	}

}