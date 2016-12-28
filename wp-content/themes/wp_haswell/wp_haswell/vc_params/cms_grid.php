<?php
vc_add_param("cms_grid", array(
	"type" => "dropdown",
    "class" => "",
    "heading" => __("Pricing Table Layout", 'wp_haswell'),
    "param_name" => "cms_pricing_layout",
    "value" => array(
    	"Pricing Layout 1" => "pr-default",
        "Pricing Layout 2" => "pr-layout-2",
        "Pricing Layout 2 & Animate" => "pr-layout-2 pr-pricing-animate",
    ),
    'dependency' => array(
		'element' => 'cms_template',
		'value' => 'cms_grid--pricing-layout-1.php',
	),
    "template" => array("cms_grid--pricing-layout-1.php"),
    "description" => __('Select Pricing Table Layout', 'wp_haswell'),
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_grid", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Gutter", 'wp_haswell'),
    "param_name" => "cms_portfolio_gutter",
    "value" => "",
    'dependency' => array(
        'element' => 'cms_template',
        'value' => array(
                'cms_grid--portfolio.php',
                'cms_grid--portfolio-boxed.php', 
                'cms_grid--portfolio-wide.php',
                'cms_grid--shop-wide.php',
                'cms_grid--travel.php',
            ),
    ),
    "description" => __('Select guiter for masonry layout in pixel, default is 0px', 'wp_haswell'),
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_grid", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Thumbnail Image Size", 'wp_haswell'),
    "param_name" => "cms_portfolio_thumb",
    'value' => array(
        __( 'Wide', 'js_composer' ) => 'wide',
        __( 'Square', 'js_composer' ) => 'square',
        __( 'Fixed Width', 'js_composer' ) => 'fixed_w',
    ),
    'dependency' => array(
        'element' => 'cms_template',
        'value' => array(
            'cms_grid--portfolio-boxed.php', 
            'cms_grid--portfolio-wide.php',
            'cms_grid--shop-wide.php',
            'cms_grid--travel.php',
        ),
    ),
    "template" => array(
        'cms_grid--portfolio.php',
        'cms_grid--portfolio-boxed.php', 
        'cms_grid--portfolio-wide.php',
        'cms_grid--shop-wide.php',
        'cms_grid--travel.php',
    ),
    "description" => __('Select thumbnail image size', 'wp_haswell'),
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_grid", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Thumbnail Image Size", 'wp_haswell'),
    "param_name" => "cms_team_thumb",
    'value' => array(
        __( 'Default', 'js_composer' ) => 'default',
        __( 'Square', 'js_composer' ) => 'square',
    ),
    'dependency' => array(
        'element' => 'cms_template',
        'value' => array(
                'cms_grid--team.php'
            ),
    ),
    "template" => array(
        'cms_grid--team.php',
    ),
    "description" => __('Select thumbnail image size', 'wp_haswell'),
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_grid", array(
    'type' => 'checkbox',
    'heading' => __( 'Show Pagination', 'js_composer' ),
    'param_name' => 'cms_port_navigation',
    'std' => false,
    'description' => __( 'Show portfolio navigation', 'js_composer' ),
    'dependency' => array(
        'element' => 'cms_template',
        'value' => array(
            'cms_grid--portfolio-boxed.php', 
            'cms_grid--portfolio-wide.php',
            'cms_grid--shop-wide.php',
        ),
    ),
    "group" => __("Template", 'wp_haswell')
));

$params = array(
    array(
        'type' => 'checkbox',
        'heading' => __( 'Use view all link ?', 'js_composer' ),
        'param_name' => 'cms_viewall',
        'std' => false,
        'description' => __( 'Use view all link', 'js_composer' ),
        "template" => array(
            'cms_grid--portfolio-boxed.php', 
            'cms_grid--portfolio-wide.php',
            'cms_grid--team.php',
        )
    ),
    array(
        'type' => 'textfield',
        'heading' => __( 'View all text', 'js_composer' ),
        'param_name' => 'cms_viewall_text',
        'description' => __( 'View all text', 'js_composer' ),
        'dependency' => array(
            'element' => 'cms_viewall',
            'value' => 'true',
        ),
        "group" => __("Template", 'wp_haswell')
    ),
    array(
        'type' => 'textfield',
        'heading' => __( 'View all link', 'js_composer' ),
        'param_name' => 'cms_viewall_link',
        'description' => __( 'View all link', 'js_composer' ),
        'dependency' => array(
            'element' => 'cms_viewall',
            'value' => 'true',
        ),
        "group" => __("Template", 'wp_haswell')
    ),
    array(
        'type' => 'dropdown',
        'heading' => __( 'View all button style', 'js_composer' ),
        'param_name' => 'cms_viewall_style',
        'description' => __( 'View all button layout: gray, dark', 'js_composer' ),
        'dependency' => array(
            'element' => 'cms_viewall',
            'value' => 'true',
        ),
        'value' => array(
            __( 'Grey Style', 'js_composer' ) => 'viewall-grey',
            __( 'Dark Style', 'js_composer' ) => 'viewall-dark',
        ),
        "template" => array(
            'cms_grid--portfolio-boxed.php', 
            'cms_grid--portfolio-wide.php',
            'cms_grid--team.php',
        ),
        "group" => __("Template", 'wp_haswell')
    ),
    array(
        'type' => 'textfield',
        'heading' => __( 'Custom title', 'js_composer' ),
        'param_name' => 'cms_portfolio_custom_title',
        'description' => __( 'Custom title', 'js_composer' ),
        "template" => array(
            'cms_grid--portfolio-shuffle.php',
        ),
        "group" => __("Template", 'wp_haswell')
    ),
);