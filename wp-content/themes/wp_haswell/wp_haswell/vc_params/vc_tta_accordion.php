<?php
vc_add_param("vc_tta_accordion", array(
	'type' => 'dropdown',
	'param_name' => 'style',
	'value' => array(
		__( 'Border Heading', 'js_composer' ) => 'border-heading',
		__( 'Background Heading', 'js_composer' ) => 'bg-heading',
	),
	'heading' => __( 'Style', 'js_composer' ),
	'description' => __( 'Select accordion display style.', 'js_composer' ),
));

vc_remove_param( "vc_tta_accordion", "color" );
vc_remove_param( "vc_tta_accordion", "shape" );
vc_remove_param( "vc_tta_accordion", "no_fill" );