<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes;
/**
 * Elementor Order Table Widget.
 *
 * Elementor widget that inserts Order table into checkout table
 *
 * @since 1.0.0
 */
class Elementor_Checkout_Order_Table_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Order Table widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'checkout_ordertable';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Order Table widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Order Table', 'ecw-checkout-widget' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Order Table widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-table';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Order Table widget belongs to.
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
	 * Register Order Table widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_table_header',
			[
				'label' => __( 'Table Header', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'table_header_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} table th'
			]
		);
		$this->add_control(
			'table_header_text_color',
			[
				'label' => __( 'Text Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} table th' => 'fill: {{VALUE}}; color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'table_header_background_color',
			[
				'label' => __( 'Background Color', 'ecw-checkout-widget' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} table th' => 'background-color: {{VALUE}};',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'table_header_border',
				'label' => __( 'Border', 'ecw-checkout-widget' ),
				'selector' => '{{WRAPPER}} table th',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_p_tag',
			[
				'label' => __( 'P', 'ecw-checkout-widget' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'					=> 'p_tag_typography',
				'label'					=> __( 'Typography', 'ecw-checkout-widget' ),
				'selector'				=> '{{WRAPPER}} p, {{WRAPPER}} table td'
			]
		);

		$this->end_controls_section();
		
		
		
	}
	/**
	 * Render Order Table widget output on the frontend.
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
		<div class="ecw_order_table">
		
		          <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
					
					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<div id="order_review" class="woocommerce-checkout-review-order">
					    <?php remove_action( 'woocommerce_checkout_order_review','woocommerce_checkout_payment',20 ); ?>	
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>

			<?php do_action( 'woocommerce_checkout_after_order_review' );  ?>
	   </div>	
       <?php	
        } /*ends session condition*/	   
	

	}
	public function render_plain_content() {
		$this->render_content();
	}

}