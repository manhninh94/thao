<?php
vc_add_param("vc_video", array (
	'type' => 'checkbox',
	'heading' => __( 'Use Video Popup ?', 'js_composer' ),
	'param_name' => 'use_popup',
	'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
	'description' => __( 'Default is video embed', 'js_composer' ),
));

vc_add_param("vc_video", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Icon", 'wp_haswell'),
    "param_name" => "video_icon",
    "value" => "",
    "description" => __('Icon show when mouse hover on video - default is "fa-play" icon ', 'wp_haswell'),
));

vc_add_param("vc_video", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Icon Font Size", 'wp_haswell'),
    "param_name" => "cms_video_icon_font_size",
    "value" => "",
    "description" => __('Default is 26px', 'wp_haswell'),
));

vc_add_param("vc_video", array (
	"type" => "attach_image",
    "heading" => __("Image thumbnail",'js_composer'),
    "param_name" => "image_thumbnail",
    'dependency' => array(
        "element" => "use_popup",
        "value" => 'yes'
    ),
    "description" => __("Thumbnail for video", 'js_composer')
));	