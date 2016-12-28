<?php
vc_add_param("vc_custom_heading", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Custom Heading Type", 'wp_haswell'),
    "admin_label" => true,
    "param_name" => "cms_custom_headding_type",
    "value" => array(
        "Default" => "",
        "Heading with line" => "heading-line",
        "Heading with underline" => "heading-underline",
        "Heading with underline" => "heading-underline",
        "Heading inline and text bold" => "heading-inline-textbold",
        "Heading text bold and rotator" => "heading-textbold-rotator",
        "Heading inline and text bold and rotator" => "heading-inline-textbold-rotator",
        "Heading with underline and text bold" => "heading-underline-textbold",
        "Heading with borderleft and text bold" => "heading-borderleft-textbold",
        "Heading inline borderleft and text bold" => "heading-inline-borderleft-textbold heading-borderleft-textbold",
        
    ),
    "description" => __('Select custom heading type', 'wp_haswell')
));

vc_add_param("vc_custom_heading", array(
    'type' => 'dropdown',
    'heading' => __( 'CSS Animation', 'js_composer' ),
    'param_name' => 'css_animation',
    'value' => haswell_animate_lib(),
    'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
));

vc_add_param("vc_custom_heading", array(
    'type' => 'checkbox',
    'heading' => __( 'Display Block ?', 'js_composer' ),
    'param_name' => 'cms_heading_block',
    'description' => __( 'Set heading display block, default is inline-block', 'js_composer' ),
));

vc_add_param("vc_custom_heading", array(
    'type' => 'checkbox',
    'heading' => __( 'Set color, border color is #f1f1f1 ?', 'js_composer' ),
    'param_name' => 'cms_heading_specolor',
    'description' => __( 'Special color', 'js_composer' ),
));
vc_add_param("vc_custom_heading", array(
    'type' => 'textfield',
    'heading' => __( 'Letter Spacing', 'js_composer' ),
    'param_name' => 'cms_heading_letter_spacing',
    'description' => __( 'Letter Spacing - in pixel', 'js_composer' ),
));
vc_add_param("vc_custom_heading", array(
    'type' => 'dropdown',
    'heading' => __( 'Rotator Effect', 'js_composer' ),
    'param_name' => 'cms_rotator_effect',
    'description' => __( 'Suitable for rotator type', 'js_composer' ),
    'value' => array(
        'Fade' => 'fade',
        'Zoom Out' => 'zoom_out'
    )
));
vc_add_param("vc_custom_heading", array(
    'type' => 'checkbox',
    'heading' => __( 'Use CMS custom link style', 'js_composer' ),
    'param_name' => 'cms_link_style',
    'description' => __( 'New style for link - Need set link before', 'js_composer' ),
));