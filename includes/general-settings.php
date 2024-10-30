<?php 
$prefix = 'ecw_';

			$ecw_panel = new_cmb2_box( array(
			'id'            => $prefix . 'ecw_checkout',
			'title'         => __( 'Elementor Checkout', 'ecw-checkout-widget' ),
			'object_types' => array( 'options-page' ),
			'option_key'      => 'ecw_checkout_settings', 
		    'icon_url'        => 'dashicons-layout',
			'position'        => 59,
			
			) );

			/*general setting panel*/		
					
			$ecw_panel->add_field( array(
				'name' => esc_html__( 'Skip Cart page', 'ecw-checkout-widget' ),
				'desc' => esc_html__( 'Select if you want to skip your cart page(Recommended)', 'ecw-checkout-widget' ),
				'id'   => $prefix .'skip_cart',
				'type' => 'checkbox',
	       ) );
		   
		  $installation_steps = '<div class="ecw_extras_wrapper"><div class="ecw_bar">
		      <h3>Installation steps</h3>
			  <p>Donot know how to setup the plugin? Read step by step documentation to kick start the process.</p>
			  <div> <a href="https://blueplugins.com/docs/checkout-widgets-for-elementor-pro/installation/" class="ecw_bar_button button">Read Documentation.</a> </div>
		  
		  </div>
		  <div class="ecw_bar"><h3>Try Basic layouts</h3>
		  <p>Download basic layouts and import into your checkout page.Start changing these designs according to your needs.</p>
		  <div><a href="https://blueplugins.com/download-elementor-checkout-templates" class="ecw_bar_button button">View Layouts</a></div> 
		  
				</div>
				<div class="ecw_bar"> <h3>A video Tour</h3>
				<p>Follow a start up video to follow the settings of the plugin . Watch a quick demo</p>
				<div><a href="https://www.youtube.com/watch?v=KmaV9qHnqLM" class="ecw_bar_button button">Watch Now</a></div>
				</div>';
		   $ecw_panel->add_field( array(
				'name' => '',
				'desc' => $installation_steps,
				'type' => 'title',
				'id'   => $prefix .'title',
			) );
			
			
		
			?>