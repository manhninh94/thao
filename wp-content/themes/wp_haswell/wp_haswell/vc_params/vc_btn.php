<?php
vc_add_param("vc_btn", array(
	'type' => 'checkbox',
	'heading' => __( 'Add icon?', 'js_composer' ),
	'param_name' => 'add_icon',
	'dependency' => array(
		'element' => 'style',
		'value' => array('cms-has-icon', 'cms-animatin'),
	),
));

vc_add_param("vc_btn", array(
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Default Button', 'js_composer' ) => 'cms-default',
		__( 'Border Button', 'js_composer' ) => 'cms-border',
		__( 'Button with border hover', 'js_composer' ) => 'cms-border-hover',
		__( 'Button with icon', 'js_composer' ) => 'cms-has-icon',
		__( 'Button with animatin', 'js_composer' ) => 'cms-animatin',
		__( 'Button view all', 'js_composer' ) => 'cms-viewall',
		/*__( 'Custom', 'js_composer' ) => 'custom',*/
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
));

vc_add_param("vc_btn", array(
	'type' => 'dropdown',
	'heading' => __( 'Color', 'js_composer' ),
	'param_name' => 'color',
	'description' => __( 'Select button color.', 'js_composer' ),
	// compatible with btn2, need to be converted from btn1
	'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
	'value' => array(
           // Btn1 Colors
           __( 'Yellow', 'js_composer' ) => 'default',
           __( 'White', 'js_composer' ) => 'white',
           __( 'Gray', 'js_composer' ) => 'gray',
           __( 'Gray Light', 'js_composer' ) => 'gray-light',
           __( 'Cyan', 'js_composer' ) => 'cyan',
           __( 'Blue', 'js_composer' ) => 'blue',
           __( 'Teal', 'js_composer' ) => 'teal',
           __( 'Green', 'js_composer' ) => 'green',
           __( 'Lime', 'js_composer' ) => 'lime',
           __( 'Deeporange', 'js_composer' ) => 'deeporange',
           //__( 'Custom', 'js_composer' ) => 'custom',
       ),
	'std' => '',
	'dependency' => array(
		'element' => 'style',
		'value' => array(
			'cms-default',
			'cms-border',
			'cms-border-hover',
			'cms-has-icon',
			'cms-animatin',
		),
	),
));

vc_add_param("vc_btn", array(
	'type' => 'dropdown',
	'heading' => __( 'Color', 'js_composer' ),
	'param_name' => 'color_viewall',
	'description' => __( 'Select button color.', 'js_composer' ),
	'value' => array(
           __( 'Gray', 'js_composer' ) => 'gray',
           __( 'Dark', 'js_composer' ) => 'dark'
       ),
	'std' => '',
	'dependency' => array(
		'element' => 'style',
		'value' => 'cms-viewall',
	),
));

vc_add_param("vc_btn", array(
	'type' => 'dropdown',
	'heading' => __( 'Animate for icon', 'js_composer' ),
	'param_name' => 'css_animation',
	'description' => __( 'Select button color.', 'js_composer' ),
	'value' => array(
           // Btn1 Colors
           __( 'No', 'js_composer' ) => '',
           __( 'From Top', 'js_composer' ) => 'from-top',
           __( 'From Left', 'js_composer' ) => 'from-left',
           __( 'Right Our', 'js_composer' ) => 'right-out',
           __( 'Right In', 'js_composer' ) => 'right-in',
           __( 'Fade in', 'js_composer' ) => 'fade-in',
           __( 'Fade out', 'js_composer' ) => 'fade-out',
       ),
	'std' => '',
	'dependency' => array(
		'element' => 'style',
		'value' => array('cms-animatin'),
	),
));


vc_add_param("vc_btn", array(
	'type' => 'checkbox',
	'heading' => __( 'With dark background hover', 'js_composer' ),
	'param_name' => 'set_dark_bg_hover',
	'dependency' => array(
		'element' => 'style',
		'value' => 'cms-border',
	),
));
vc_remove_param( "vc_btn", "shape" );