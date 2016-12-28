<?php
/**
 * Product attributes
 *
 * Used by list_attributes() in the products class
 *
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
 <div class="row">
                   
                     
                   
               

	<?php if ( $product->enable_dimensions_display() ) : ?>

		<?php if ( $product->has_weight() ) : $has_row = true; ?>
			
			<tr>
				<th><?php _e( 'Weight', 'woocommerce' ) ?></th>
				<td class="product_weight"><?php echo $product->get_weight() . ' ' . esc_attr( get_option( 'woocommerce_weight_unit' ) ); ?></td>
			</tr>
		<?php endif; ?>
			
			
		<?php if ( $product->has_dimensions() ) : $has_row = true; ?>
			<tr class="<?php if ( ( $alt = $alt * -1 ) == 1 ) echo 'alt'; ?>">
				<th><?php _e( 'Dimensions', 'woocommerce' ) ?></th>
				<td class="product_dimensions"><?php echo $product->get_dimensions(); ?></td>
			</tr>
		<?php endif; ?>

	<?php endif; ?>
 
	<?php 
	 
	foreach ( $attributes as $attribute ) :
		if ( empty( $attribute['is_visible'] ) || ( $attribute['is_taxonomy'] && ! taxonomy_exists( $attribute['name'] ) ) ) {
			continue;
		} else {
			$has_row = true;
		}
		$data_xx = explode("|",$attribute['value']);
		 
	 
		
				echo '<div class="col-sm-6 mb-30">';
                     
                     echo ' <select class="select-md input-border w-100">';
                        echo '  <option> ' . $attribute['name']  .'</option>';
						  
							foreach( $data_xx as $key=> $value):
							echo '<option value="'.$value.'"> '.$value.' </option>';
							endforeach;
						   
                    echo '</select>  </div>';
			  endforeach; ?>

 
 </div>
 
 
<?php
if ( $has_row ) {
	echo ob_get_clean();
} else {
	ob_end_clean();
}
