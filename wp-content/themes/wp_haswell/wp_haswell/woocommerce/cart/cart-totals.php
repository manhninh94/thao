<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="cart_totals-wrap <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">
	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
			<div class="col-sm-6">
				<div class="cart-totals-shipping">
					<h4 class="blog-page-title mt-40 mb-25"><?php _e( 'CHI PHÍ THANH TOÁN', 'woocommerce' ); ?></h4>
					<?php woocommerce_shipping_calculator(); ?>
				</div>
			</div>
			<div class="col-sm-5 col-md-offset-1">
				<div class="cart-totals-inner">
					<div class="cart-subtotal-wrap">
						<h5 class="mt-60 mb-10">
							<?php _e( 'GIÁ ĐƠN HÀNG: ', 'woocommerce' ); ?>
							<strong><?php wc_cart_totals_subtotal_html(); ?></strong>
						</h5>
					</div>
					<div class="cart-shipping-info">
						<h5 class="mt-10 mb-10">
							<?php
								echo '<span>'. __('VẬN CHUYỂN: ', 'wp_haswell') .'</span>';
								echo '<strong>'. WC()->cart->get_cart_shipping_total() .'</strong>';
							?>
						</h5>
					</div>
					<div class="cart-total-order">
						<h3 class="mt-10 mb-30">
							<span><?php _e( 'TỔNG TIỀN: ', 'woocommerce' ); ?></span>
							<strong><?php wc_cart_totals_order_total_html(); ?></strong>
						</h3>
					</div>
				</div>
				<div class="wc-proceed-to-checkout">
					<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
				</div>
			</div>


			<?php if ( WC()->cart->get_cart_tax() ) : ?>
				<p><small><?php

					$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
						? ' ' . __( ' (taxes estimated for )', 'woocommerce' ) . WC()->countries->estimated_for_prefix() .  WC()->countries->countries[ WC()->countries->get_base_country() ]
						: '';

					printf( __( 'Note: Shipping and taxes are estimated and will be updated during checkout based on your billing and shipping information.', 'woocommerce' ), $estimated_text );

				?></small></p>
			<?php endif; ?>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
</div>
