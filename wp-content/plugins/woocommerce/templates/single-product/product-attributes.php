<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-attributes.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$has_row    = false;
$alt        = 1;
$attributes = $product->get_attributes();

ob_start();

?>
 

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Weight', 'woocommerce' ) ?></th>
				<td class="product_weight"><?php echo $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>

		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) === 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Dimensions', 'woocommerce' ) ?></th>
				<td class="product_dimensions"><?php echo $product->get_dimensions(); ?></td>
			</tr>
		<?php endif; ?>

	<?php endif; ?>
	
	
	
	
	
	
	
	
	<div class="row">
                  <div class="col-sm-6 mb-30">
                    <form method="post" action="#" class="form">
                      <select class="select-md input-border w-100">
                          <option>SIZE</option>
                         
                      </select>
                    </form>
                  </div>
                  
                  <div class="col-sm-6 mb-30">
                    <form method="post" action="#" class="form">
                      <select class="select-md input-border w-100">
                        <option>color</option>
                        <option>Đen</option>
						<option>Vàng</option>
						<option>Trắng kem</option>
                        
                        
                      </select>
                    </form>
                  </div>
                </div>
	
	
	
	
	
	
	
	
	
	<?php foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		?>
		
		<div class="col-sm-6 mb-30">
                    <form method="post" action="#" class="form">
                      <select class="select-md input-border w-100">
                          <option><?=  wc_attribute_label( $attribute['name'] ?></option>
						  <?php  foreach($values as $key=> $value): ?>
							<option > <?=$value?> </option>
						  <?php  endforeach; ?>
                         
                      </select>
                    </form>
                  </div>
				  
	
		</tr>
	<?php endforeach; ?>

 
<?php
if ( $has_row ) {
	echo ob_get_clean();
} else {
	ob_end_clean();
}
