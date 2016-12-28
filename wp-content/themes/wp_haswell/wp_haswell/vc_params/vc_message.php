<?php
vc_add_param("vc_message", array (
	'type' => 'checkbox',
	'heading' => __( 'Hide icon ?', 'js_composer' ),
	'param_name' => 'message_hide_icon',
	'description' => __( 'Hide icon', 'js_composer' ),
	'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
));
vc_add_param("vc_message", array (
	'type' => 'checkbox',
	'heading' => __( 'Alerts closable ?', 'js_composer' ),
	'param_name' => 'message_closeable',
	'description' => __( 'Alerts closable', 'js_composer' ),
	'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
));