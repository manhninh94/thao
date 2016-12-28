<?php
vc_add_param("vc_separator", array(
	/* Start Icon */
	'type' => 'dropdown',
	'heading' => __( 'Icon library', 'wp_haswell' ),
	'value' => array(
		__( 'Font Awesome', 'wp_haswell' ) => 'fontawesome',
		__( 'Linea Icons', 'wp_haswell' ) => 'lineaicon',
		__( 'Glyphicons', 'wp_haswell' ) => 'glyphicon',
		__( 'Elegant Icon', 'wp_haswell' ) => 'elegant',
	),
	'param_name' => 'icon_type',
	'description' => __( 'Select icon library.', 'js_composer' ),
	"group" => __("Templates", 'wp_haswell')
));

vc_add_param("vc_separator", array(
	'type' => 'iconpicker',
	'heading' => __( 'Icon', 'wp_haswell' ),
	'param_name' => 'icon_fontawesome',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'fontawesome',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'dependency' => array(
		'element' => 'icon_type',
		'value' => 'fontawesome',
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Templates", 'wp_haswell')
	/* End Icon */
));

vc_add_param("vc_separator", array(
	'type' => 'iconpicker',
	'heading' => __( 'Icon', 'wp_haswell' ),
	'param_name' => 'icon_lineaicon',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'lineaicon',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'dependency' => array(
		'element' => 'icon_type',
		'value' => 'lineaicon',
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Templates", 'wp_haswell')
	/* End Icon */
));

vc_add_param("vc_separator", array(
	'type' => 'iconpicker',
	'heading' => __( 'Icon', 'wp_haswell' ),
	'param_name' => 'icon_glyphicon',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'glyphicon',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'dependency' => array(
		'element' => 'icon_type',
		'value' => 'glyphicon',
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Templates", 'wp_haswell')
	/* End Icon */
));

vc_add_param("vc_separator", array(
	'type' => 'iconpicker',
	'heading' => __( 'Icon', 'wp_haswell' ),
	'param_name' => 'icon_elegant',
    'value' => '',
	'settings' => array(
		'emptyIcon' => true, // default true, display an "EMPTY" icon?
		'type' => 'elegant',
		'iconsPerPage' => 200, // default 100, how many icons per/page to display
	),
	'dependency' => array(
		'element' => 'icon_type',
		'value' => 'elegant',
	),
	'description' => __( 'Select icon from library.', 'wp_haswell' ),
	"group" => __("Templates", 'wp_haswell')
	/* End Icon */
));

vc_add_param("vc_separator", array(
	'type' => 'dropdown',
	'heading' => __( 'Divider Type', 'wp_haswell' ),
	'value' => array(
		__( 'Divider', 'wp_haswell' ) => 'divider',
		__( 'Hr', 'wp_haswell' ) => 'hr',
	),
	'param_name' => 'separator_type',
	'description' => '',
	"group" => __("Templates", 'wp_haswell')
));

vc_add_param("vc_separator", array(
	'type' => 'dropdown',
	'heading' => __( 'Hr Type', 'wp_haswell' ),
	'value' => array(
		__( 'Default', 'wp_haswell' ) => '',
		__( 'Hr short', 'wp_haswell' ) => 'short',
		__( 'Hr tall', 'wp_haswell' ) => 'tall',
		__( 'Hr taller', 'wp_haswell' ) => 'taller',
		__( 'Hr invisible', 'wp_haswell' ) => 'invisible',
	),
	'param_name' => 'separator_hr_type',
	'description' => '',
	"group" => __("Templates", 'wp_haswell'),
	'dependency' => array(
		'element' => 'separator_type',
		'value' => 'hr',
	)
));