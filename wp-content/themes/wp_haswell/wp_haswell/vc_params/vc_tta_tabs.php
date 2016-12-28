<?php
vc_add_param("vc_tta_tabs", array(
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Border Bold', 'js_composer' ) => 'border-bold',
		__( 'Border Normal ', 'js_composer' ) => 'border-normal',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
));

vc_remove_param( "vc_tta_tabs", "color" );
vc_remove_param( "vc_tta_tabs", "shape" );