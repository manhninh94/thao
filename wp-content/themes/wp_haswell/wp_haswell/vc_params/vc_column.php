<?php
vc_add_param("vc_column", array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'value' => haswell_animate_lib(),
	'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
));