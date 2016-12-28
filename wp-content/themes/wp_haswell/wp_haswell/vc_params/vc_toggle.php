<?php
vc_add_param("vc_toggle", array (
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Border Heading', 'js_composer' ) => 'border-heading',
		__( 'Background Heading', 'js_composer' ) => 'bg-heading',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
));

vc_add_param("vc_toggle", array (
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Border Heading', 'js_composer' ) => 'border-heading',
		__( 'Background Heading', 'js_composer' ) => 'bg-heading',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' )
));

vc_add_param("vc_toggle", array (
	'type' => 'dropdown',
	'param_name' => 'bg_heading_style',
	'value' => array(
		__( 'Style 1', 'js_composer' ) => 'style1',
		__( 'Style 2', 'js_composer' ) => 'style2',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
	'dependency' => array(
		'element' => 'style',
		'value' => 'bg-heading',
	),
));

vc_add_param("vc_toggle", array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'value' => haswell_animate_lib(),
	'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
));
vc_remove_param('vc_toggle', 'color');
vc_remove_param('vc_toggle', 'size');