<?php
global $smof_data;
/**
 * social share list
 */
function cms_woo_share() {
        $likes = get_post_meta(get_the_ID() , '_cms_post_likes', true);
        if(!$likes) $likes = 0;
        $icon = 'icon_heart_alt';
        if(isset($_COOKIE['cms_post_like_'. get_the_ID()])){
            $icon = 'fa fa-heart';
        }
    ?>
    <ul class="pull-right">
        <li class="entry-like" data-id="<?php the_ID(); ?>">
            <a href="#"><i class="<?php echo esc_attr($icon); ?>"></i></a>
        </li>
        <li class="entry-share">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                <i aria-hidden="true" class="social_share"></i>
            </a>
            <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
                <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i aria-hidden="true" class="social_facebook"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/home?status=<?php echo esc_url('Check out this article', 'wp_haswell');?>:%20<?php echo esc_url(get_the_title());?>%20-%20<?php the_permalink();?>"><i aria-hidden="true" class="social_twitter"></i></a></li>
                <li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i aria-hidden="true" class="social_googleplus"></i></a></li>
            </ul>
        </li>
    </ul>
    <?php
}
add_action('cms_product_social', 'cms_woo_share');

/**
 * For product Tab
 */
add_filter( 'woocommerce_product_tabs', 'cms_woo_rename_tabs', 98 );
function cms_woo_rename_tabs( $tabs ) {
    $tabs['reviews']['title'] = __( 'Ratings', 'wp_haswell' );
    if (!empty($tabs['additional_information'] )) {
        $tabs['additional_information']['title'] = __( 'Parameters', 'wp_haswell' );
    }

    return $tabs;
}

/**
 * Action show Shop info in single product
 */
add_action('cms_woo_show_shop_info', 'cms_woo_show_shop_info');
function cms_woo_show_shop_info() {
    ?>  
        <div class="cms-shop-support-info grey-dark-bg font-white pt-110-b-80-cont">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 text-center"><span class="icon icon-basic-globe"></span><h6 class="white-text "><?php _e('Free Shipping', 'woocommerce') ?></h6></div>
                    <div class="col-md-3 col-sm-6 text-center"><span class="icon icon-basic-life-buoy"></span><h6 class="white-text "><?php _e('24/7 Customer Service', 'woocommerce') ?></h6></div>
                    <div class="col-md-3 col-sm-6 text-center"><span class="icon icon-ecommerce-creditcard"></span><h6 class="white-text "><?php _e('Payment Options', 'woocommerce') ?></h6></div>
                    <div class="col-md-3 col-sm-6 text-center"><span class="icon icon-basic-clockwise"></span><h6 class="white-text "><?php _e('30 Days Returns', 'woocommerce') ?></h6></div>
                </div>
            </div>
        </div>
    <?php
}

/**
 * Action show clients on single product
 */
add_action('cms_woo_show_clients', 'cms_woo_show_clients');
function cms_woo_show_clients() {
    ?>
    <div class="cms-show-clients-info p-110-cont">
        <div class="container">
            
            <?php echo apply_filters('the_content', '[cms_grid col_xs="1" col_sm="2" col_md="6" col_lg="6" source="size:12|order_by:date|post_type:client" cms_template="cms_grid--clients.php"]'); ?>
            
        </div>
    </div>
    <?php
}

/**
 * Custom Product Filter Price - Default Widget
 */
add_action( 'widgets_init', 'override_woocommerce_widgets', 15 );
function override_woocommerce_widgets() { 
    if ( class_exists( 'WC_Widget_Price_Filter' ) ) {
        unregister_widget( 'WC_Widget_Price_Filter' );
        include_once( 'widgets/cms-price-filter.php' );
        register_widget( 'Custom_WC_Widget_Price_Filter' );
    } 
}

/**
 * for custom widget ul class
 */
//add_filter( 'woocommerce_before_widget_product_list', function() {return '<ul class="cms-product-list-widget">';} );


/**
 * Change number product to show
 */
$number_product = ( !empty($smof_data['woo_number_page']) ) ? $smof_data['woo_number_page'] : 9;
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$number_product.';' ), 20 );
