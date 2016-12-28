<?php
vc_remove_param('vc_row', 'video_bg');
vc_remove_param('vc_row', 'video_bg_url');
vc_remove_param('vc_row', 'parallax');
vc_remove_param('vc_row', 'parallax_image');
vc_remove_param('vc_row', 'video_bg_parallax');
vc_remove_param('vc_row', 'gap');
vc_remove_param('vc_row_inner', 'gap');
vc_remove_param("vc_row", "el_id");
vc_remove_param("vc_row", "equal_height");
vc_remove_param("vc_row", "content_placement");

vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => __("Content Full Width", 'wp_haswell'),
    'param_name' => 'full_width',
    'value' => array(
        'Yes' => true
    ),
    'description' => __("Yes = full width, default content boxed.", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => __("Css Oveflow Property", 'wp_haswell'),
    'param_name' => 'cms_row_overflow',
    'value' => array(
        'Yes' => true
    ),
    'description' => __("Yes = Set Css Oveflow Property is Hidden.", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => __("Extra id name", 'wp_haswell'),
    "param_name" => "row_id"
));
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => __("Offset", 'wp_haswell'),
    "param_name" => "data_offset",
    "description" => __("Offset for Onepage", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Row color", 'wp_haswell'),
    "param_name" => "row_color",
    "value" => "",
    "description" => __("Select color for row.", 'wp_haswell')
));
vc_add_param("vc_row_inner", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Row color", 'wp_haswell'),
    "param_name" => "row_color",
    "value" => "",
    "description" => __("Select color for row.", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Heading color", 'wp_haswell'),
    "param_name" => "row_head_color",
    "value" => "",
    "description" => __("Select color for head.", 'wp_haswell')
));
vc_add_param("vc_row_inner", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Heading color", 'wp_haswell'),
    "param_name" => "row_head_color",
    "value" => "",
    "description" => __("Select color for head.", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Link color", 'wp_haswell'),
    "param_name" => "row_link_color",
    "value" => "",
    "description" => __("Select color for link.", 'wp_haswell')
));
vc_add_param("vc_row_inner", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Link color", 'wp_haswell'),
    "param_name" => "row_link_color",
    "value" => "",
    "description" => __("Select color for link.", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Link color hover", 'wp_haswell'),
    "param_name" => "row_link_color_hover",
    "value" => "",
    "description" => __("Select color for link hover.", 'wp_haswell')
));
vc_add_param("vc_row_inner", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __("Link color hover", 'wp_haswell'),
    "param_name" => "row_link_color_hover",
    "value" => "",
    "description" => __("Select color for link hover.", 'wp_haswell')
));
vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => __("Animation", 'wp_haswell'),
    "admin_label" => true,
    "param_name" => "animation",
    "value" => array(
        "None" => "",
        "Right To Left" => "right-to-left",
        "Left To Right" => "left-to-right",
        "Bottom To Top" => "bottom-to-top",
        "Top To Bottom" => "top-to-bottom",
        "Scale Up" => "scale-up",
        "Fade In" => "fade-in"
    )
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => __("Background Style", 'wp_haswell'),
    'param_name' => 'bg_style',
    'value' => array(
        'Default' => '',
        'Image / Parallax' => 'img_parallax',
        'Image / Fixed' => 'img_fixed',
        'Hosted Video' => 'hvideo',
        'Background Effect' => 'bg-effect-lg'
    ),
    'group' => 'Design Options',
    'description' => __("Select the kind of background would you like to set for this row.", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'textfield',
    'heading' => __("Parallax Speed", 'wp_haswell'),
    'param_name' => 'bd_p_speed',
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "bg_style",
        "value" => array(
            "img_parallax"
        )
    ),
    'description' => __("Set speed moving for parallax default 0.4 .", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'textfield',
    'heading' => __("MP4 (URL)", 'wp_haswell'),
    'param_name' => 'bg_video_mp4',
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "bg_style",
        "value" => array(
            "hvideo"
        )
    ),
    'description' => __(".mp4 video.", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'textfield',
    'heading' => __("WEBM (URL)", 'wp_haswell'),
    'param_name' => 'bg_video_webm',
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "bg_style",
        "value" => array(
            "hvideo"
        )
    ),
    'description' => __(".webm video.", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'dropdown',
    'heading' => __("Overlay Color", 'wp_haswell'),
    'param_name' => 'overlay_row',
    'value' => array(
        'No' => '',
        'Yes' => 'yes'
    ),
    'group' => 'Design Options'
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __('Color', 'wp_haswell'),
    "param_name" => "overlay_color",
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "overlay_row",
        "value" => array(
            "yes"
        )
    ),
    "description" => ''
));
vc_add_param('vc_row', array(
    'type' => 'textfield',
    'heading' => __("Opacity", 'wp_haswell'),
    'param_name' => 'overlay_opacity',
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "overlay_row",
        "value" => array(
            "yes"
        )
    ),
    'description' => __("Set opacity overlay color - ex: 0.6 .", 'wp_haswell')
));
vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => __("Set background image is mask slider", 'wp_haswell'),
    'param_name' => 'row_mask_bg',
    'std' => false,
    'group' => 'Design Options'
));
vc_add_param('vc_row', array(
    'type' => 'checkbox',
    'heading' => __("Row Arrow", 'wp_haswell'),
    'param_name' => 'row_arrow',
    'std' => false,
    'group' => 'Design Options'
));
vc_add_param('vc_row', array(
    'type' => 'textfield',
    'heading' => __("Target link", 'wp_haswell'),
    'param_name' => 'cms_arrow_target',
    'value' => '',
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "row_arrow",
        'value' => 'true',
    ),
    'description' => 'Target to rowId or url'
));
vc_add_param("vc_row", array(
    "type" => "colorpicker",
    "class" => "",
    "heading" => __('Arrow Color', 'wp_haswell'),
    "param_name" => "cms_arrow_color",
    'group' => 'Design Options',
    "dependency" => array(
        "element" => "row_arrow",
        'value' => 'true',
    ),
    "description" => ''
));