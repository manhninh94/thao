<?php
/**
 * Empty cart page
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="col-md-12">
	<?php wc_print_notices(); ?>
	<p class="cart-empty"><?php _e( 'Giỏ hàng của bạn hiện đang trống.', 'woocommerce' ) ?></p>
	<?php do_action( 'woocommerce_cart_is_empty' ); ?>
	<p class="return-to-shop"><a class="cms-button gray wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php _e( 'Quay lại mua hàng', 'woocommerce' ) ?></a></p>
</div>
