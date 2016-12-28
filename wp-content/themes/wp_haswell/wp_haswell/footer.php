<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
global $smof_data, $haswell_meta;
$portfolio_meta = haswell_post_meta_data();
$portfolio_single_layout = !empty($portfolio_meta->_cms_single_portfolio_style) ? $portfolio_meta->_cms_single_portfolio_style : 'style1';

$dis_bottom = '';
$dis_bottom = ( isset($haswell_meta->_cms_disable_bottom) && !empty($haswell_meta->_cms_disable_bottom)) ? $haswell_meta->_cms_disable_bottom : '';
?>
        </div><!-- #main -->
            <?php if ($portfolio_single_layout == 'style3') : ?>
                <hr class="mt-0 mb-0">
                <div class="work-navigation plr-10 clearfix">
                    <?php haswell_portfolio_nav(); ?>    
                </div>
            <?php endif; ?>

            <?php if (class_exists('Woocommerce') && is_shop() ) : ?>
                <?php
                    if ( !empty($smof_data['woo_show_shop_info']) ) {
                        do_action('cms_woo_show_shop_info'); 
                    }
                    
                    if ( !empty($smof_data['woo_show_clients_info']) ) {
                        do_action('cms_woo_show_clients');
                    }
                    do_action( 'woocommerce_after_single_product' );
                ?>
            <?php endif; ?>
            
            <?php if ( $smof_data['enable_bottom_area'] =='1' && is_active_sidebar('bottom-area') ): ?>
                <div class="cms-bottom-wrapper <?php echo esc_attr($dis_bottom); ?>">
                    <div class="container">
                        <?php dynamic_sidebar('bottom-area'); ?>
                    </div>
                </div>
            <?php endif; ?>
            
            <?php haswell_footer(); ?>
        <div id="back_to_top" class="back_to_top"></div>
        <?php do_action('haswell_after_show_menu'); ?>
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>