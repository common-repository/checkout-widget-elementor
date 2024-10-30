<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


 do_action( 'woocommerce_before_checkout_form_cart_notices' );

		// Check cart has contents.
		if ( WC()->cart->is_empty() && ! is_customize_preview() && apply_filters( 'woocommerce_checkout_redirect_empty_cart', true ) ) {
			return;
		}

		// Check cart contents for errors.
		do_action( 'woocommerce_check_cart_items' );

		// Calc totals.
		WC()->cart->calculate_totals();

		// Get checkout object.
		$checkout = WC()->checkout();

		if ( empty( $_POST ) && wc_notice_count( 'error' ) > 0 ) { // WPCS: input var ok, CSRF ok.

			wc_get_template( 'checkout/cart-errors.php', array( 'checkout' => $checkout ) );
			wc_clear_notices();

		} else {
			?>
			<div class="woocommerce">
			<?php

			$non_js_checkout = ! empty( $_POST['woocommerce_checkout_update_totals'] ); // WPCS: input var ok, CSRF ok.

			if ( wc_notice_count( 'error' ) === 0 && $non_js_checkout ) {
				wc_add_notice( __( 'The order totals have been updated. Please confirm your order by pressing the "Place order" button at the bottom of the page.', 'ecw-checkout-widget' ) );
			}

			do_action( 'woocommerce_before_checkout_form', $checkout );

			// If checkout registration is disabled and not logged in, the user cannot checkout.
			if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
				echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'ecw-checkout-widget' ) ) );
				return;
			}

			?>

			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
			
			<?php the_content(); ?>

			</form>

			<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
			</div>
			<?php

		}
		