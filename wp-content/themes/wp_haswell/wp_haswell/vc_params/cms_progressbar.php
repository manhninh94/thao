<?php
vc_add_param("cms_progressbar", array(
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Static Layout', 'js_composer' ) => 'style1',
		__( 'Animation Layout', 'js_composer' ) => 'style2',
		__( 'Bootstrap Basic Layout', 'js_composer' ) => 'style3',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
	'group' => __( 'Progress Bar Settings', 'js_composer' ),
));

vc_add_param("cms_progressbar", array(
	'type' => 'dropdown',
	'param_name' => 'bootstrap_type',
	'value' => array(
		__( 'Default', 'js_composer' ) => '',
		__( 'Success', 'js_composer' ) => 'progress-bar-success',
		__( 'Info', 'js_composer' ) => 'progress-bar-info',
		__( 'Warning', 'js_composer' ) => 'progress-bar-warning',
		__( 'Active', 'js_composer' ) => 'active',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'dependency' => array(
		'element' => 'style',
		'value' => 'style3',
	),
	'std' => 'progress-bar-success',
	'description' => __( 'Select accordion display style.', 'js_composer' ),
	'group' => __( 'Progress Bar Settings', 'js_composer' ),
));