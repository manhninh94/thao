<?php
if(class_exists('CmsShortCode') and class_exists('WooCommerce')){
    //get product categories
    $product_categories = get_categories( array(
        'hide_empty'   => 0,
        'hierarchical' => 1,
        'taxonomy'     => 'product_cat'
    ));
    $categories['- Select -'] = "";
    foreach ($product_categories as $cat) {
        $categories[$cat->cat_name] = (string)$cat->cat_ID;
    }
    vc_map(
        array(
            "name" => __("CMS Woo Category", 'wp_haswell'),
            "base" => "wc_category",
            "class" => "vc-cms-woo-category",
            "category" => __("CmsSuperheroes Shortcodes", 'wp_haswell'),
            "params" => array(
                array(
                    "type" => "dropdown",
                    "heading" => __("Category",'wp_haswell'),
                    "param_name" => "category",
                    "value" => $categories,
                    "description" => __("Select Category",'wp_haswell'),
                    "group" => __("General Settings", 'wp_haswell')
                ),
                array(
                    "type" => "cms_template",
                    "param_name" => "cms_template",
                    "admin_label" => true,
                    "heading" => __("Shortcode Template",'wp_haswell'),
                    "shortcode" => "wc_category",
                    "group" => __("General Settings", 'wp_haswell')
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => __( 'Custom Category Info ?', 'js_composer' ),
                    'param_name' => 'wc_custom',
                    'description' => __( 'Custom Category Info', 'js_composer' ),
                    "group" => __("General Settings", 'wp_haswell')
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Custom Text', 'js_composer' ),
                    'param_name' => 'wc_custom_text',
                    'description' => __( 'Custom Text', 'js_composer' ),
                    'dependency' => array(
                        'element' => 'wc_custom',
                        'value' => 'true',
                    ),
                    "group" => __("General Settings", 'wp_haswell')
                ),
            )
        )
    );
    class WPBakeryShortCode_wc_category extends CmsShortCode {
        protected function content($atts, $content = null) {
            //default value
            $atts_extra = shortcode_atts(array(
                'category' => '',
                'cms_template' => 'wc_category.php',
            ), $atts);
            $atts = array_merge($atts_extra,$atts);
            $html_id = cmsHtmlID('cms-wc-category');
            $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
            $atts['html_id'] = $html_id;
            return parent::content($atts, $content);
        }
    }
}
?>