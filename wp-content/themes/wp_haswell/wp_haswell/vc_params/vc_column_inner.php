<?php
vc_add_param('vc_column_inner', array(
    'type' => 'checkbox',
    'heading' => __("Set Column Max Width ?", 'wp_haswell'),
    'param_name' => 'column_max_width',
    'value' => array(
        'Yes' => true
    ),
    'description' => __("Yes = Max with is 500px, default content full width.", 'wp_haswell')
));
vc_add_param("vc_column_inner", array(
	'type' => 'checkbox',
	'heading' => __( 'Equal Height', 'js_composer' ),
	'param_name' => 'equal_height',
	'value' => array(
        'Yes' => true
    ),
	'description' => __( 'Set same height with next column - Not recommend', 'js_composer' ),
));
vc_add_param("vc_column_inner", array(
	'type' => 'checkbox',
	'heading' => __( 'Text Middle', 'js_composer' ),
	'param_name' => 'text_middle',
	'value' => array(
        'Yes' => true
    ),
	'description' => __( 'Set text is middle - Not recommend', 'js_composer' ),
));