<?php
vc_remove_param('cms_carousel', 'l_icon_type');
vc_remove_param('cms_carousel', 'l_icon_fontawesome');
vc_remove_param('cms_carousel', 'l_icon_openiconic');
vc_remove_param('cms_carousel', 'l_icon_typicons');
vc_remove_param('cms_carousel', 'l_icon_entypo');
vc_remove_param('cms_carousel', 'l_icon_linecons');
vc_remove_param('cms_carousel', 'l_icon_pixelicons');
vc_remove_param('cms_carousel', 'l_icon_pe7stroke');
vc_remove_param('cms_carousel', 'l_icon_rticon');
vc_remove_param('cms_carousel', 'l_icon_glyphicons');
vc_remove_param('cms_carousel', 'r_icon_type');
vc_remove_param('cms_carousel', 'r_icon_fontawesome');
vc_remove_param('cms_carousel', 'r_icon_openiconic');
vc_remove_param('cms_carousel', 'r_icon_typicons');
vc_remove_param('cms_carousel', 'r_icon_entypo');
vc_remove_param('cms_carousel', 'r_icon_linecons');
vc_remove_param('cms_carousel', 'r_icon_pixelicons');
vc_remove_param('cms_carousel', 'r_icon_pe7stroke');
vc_remove_param('cms_carousel', 'r_icon_rticon');
vc_remove_param('cms_carousel', 'r_icon_glyphicons');

vc_add_param("cms_carousel", array(
	'type' => 'iconpicker',
	'heading' => __( 'Left Arrow', 'wp_haswell' ),
	'param_name' => 'left_arrow',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'lineaicon',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Carousel Settings", 'wp_haswell'),
	'sdt' => 'icon icon-arrows-right'
));

vc_add_param("cms_carousel", array(
	'type' => 'iconpicker',
	'heading' => __( 'Right Arrow', 'wp_haswell' ),
	'param_name' => 'right_arrow',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'lineaicon',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Carousel Settings", 'wp_haswell'),
	'sdt' => 'icon icon-arrows-left'
));

$params = array(
    array(
		"type" => "dropdown",
        "class" => "",
        "heading" => __('Display Avatar', 'wp_haswell'),
        "admin_label" => true,
        "param_name" => "cms_testimonial_show_avatar",
        "value" => array(
        	"None" => "",
            "Yes" => "y",
        ),
        'dependency' => array(
			'element' => 'cms_template',
			'value' => 'cms_carousel--layout-testimonial-1.php',
		),
        "template" => array("cms_carousel--layout-testimonial-1.php"),
        "description" => __('Show or Hidden avatar', 'wp_haswell'),
        "group" => __("Template", 'wp_haswell')
	),

	array(
		"type" => "checkbox",
        "class" => "",
        "heading" => __("Follow container width", 'wp_haswell'),
        "param_name" => "cms_testimonial_container",
        'dependency' => array(
			'element' => 'cms_template',
			'value' => 'cms_carousel--layout-testimonial-1.php',
		),
        "template" => array("cms_carousel--layout-testimonial-1.php"),
        "description" => __('Suitable for Row container set is full width', 'wp_haswell'),
        "group" => __("Template", 'wp_haswell')
	),
);