<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product, $woocommerce_loop, $smof_data;
$woo_columns = (isset($_GET['woo-columns'])) ? intval($_GET['woo-columns']) : $smof_data['woo_columns_layout'];
$cms_woo_class = '';

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $woo_columns );
}

switch ($woocommerce_loop['columns']) {
	case 2:
		$cms_woo_class = 'col-md-6 col-lg-6 pb-70 cms-product';
		break;
	case 4:
		$cms_woo_class = 'col-md-3 col-lg-3 pb-80 cms-product';
		break;
	default:
		$cms_woo_class = 'col-md-4 col-lg-4 pb-80 cms-product';
		break;
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
// Increase loop count
$woocommerce_loop['loop']++;
// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>
<div <?php post_class( $cms_woo_class ); ?>>
	<div class="cms-woo-item-wrap">
		<div class="cms-woo-image">
			<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
			<a href="<?php the_permalink(); ?>">
				<?php
					/**
					 * woocommerce_before_shop_loop_item_title hook
					 *
					 * @hooked woocommerce_show_product_loop_sale_flash - 10
					 * @hooked woocommerce_template_loop_product_thumbnail - 10
					 */
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</a>
		</div>
		<div class="cms-product-title">
			<h3 class="mb-5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_rating - 5
			 * @hooked woocommerce_template_loop_price - 10
			 */

			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
		<?php
			/**
			 * woocommerce_after_shop_loop_item hook
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item' ); 
		?>
	</div>
</div>
