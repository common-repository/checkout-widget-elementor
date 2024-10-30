<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


get_header();
/**
 * Before Elemnetor Checkout page template content.
 *
 * Fires before the content of Elementor Checkout page template.
 *
 * @since 1.0.0
 */
		
        global $wp;
		
		if ( !empty( $wp->query_vars['order-pay'] ) || isset( $wp->query_vars['order-received'] )) {
      	 echo do_shortcode('[woocommerce_checkout]');
		} 
		else {
		  include_once dirname(__FILE__).'/elementer-checkout-form.php';
		} 


/**
 * AfterElemnetor Checkout page template content.
 *
 * Fires after the content of Elementor Elementor Checkout page template.
 *
 * @since 1.0.0
 */


get_footer();