<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $smof_data;
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class('cms-single-product-wrap p-140-cont'); ?>>

    <div class="container">
   		<div class="row">
			<div class="col-md-4 col-sm-12 mb-50">
				<?php
					/**
					 * woocommerce_before_single_product_summary hook
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			<div class="col-md-7 col-sm-12 col-md-offset-1 mb-50">
				<div class="entry-summary">
					<?php
						/**
						 * woocommerce_single_product_summary hook
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 */
						do_action( 'woocommerce_single_product_summary' );
					?>
				</div><!-- .summary -->
		    </div>
		</div>   
		<meta itemprop="url" content="<?php the_permalink(); ?>" />
	</div>

	<div class="container mb-100">
		<?php
	    /**
	     * woocommerce_after_single_product_summary hook
	     *
	     * @hooked woocommerce_output_product_data_tabs - 10
	     * @hooked woocommerce_upsell_display - 15
	     * @hooked woocommerce_output_related_products - 20
	     */
	    do_action( 'woocommerce_after_single_product_summary' );
    ?>
	</div>
	<hr class="mt-0 mb-80">
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
            	<h4 class="blog-page-title mt-0 mb-40"><?php _e('SẢN PHẨM TƯƠNG TỰ', 'wp_haswell') ?></h4>
          	</div>
          	<?php do_action('cms_single_product_related'); ?>
		</div>
	</div>
</div><!-- #product-<?php the_ID(); ?> -->
<?php
	if ( !empty($smof_data['woo_show_shop_info']) ) {
		do_action('cms_woo_show_shop_info'); 
	}
	
	if ( !empty($smof_data['woo_show_clients_info']) ) {
		do_action('cms_woo_show_clients');
	}
	do_action( 'woocommerce_after_single_product' );
?>
