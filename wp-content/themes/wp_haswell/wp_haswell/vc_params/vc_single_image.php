<?php
vc_add_param("vc_single_image", array(
	'type' => 'dropdown',
	'heading' => __( 'CSS Animation', 'js_composer' ),
	'param_name' => 'css_animation',
	'value' => haswell_animate_lib(),
	'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
));
vc_add_param("vc_single_image", array(
	'type' => 'checkbox',
	'heading' => __( 'None hover effect when image hover', 'js_composer' ),
	'param_name' => 'vc_none_hover_effect',
	'description' => __( '', 'js_composer' ),
	'std' => false,
));
vc_add_param("vc_single_image", array(
	'type' => 'checkbox',
	'heading' => __( 'Equal Height', 'js_composer' ),
	'param_name' => 'equal_height',
	'value' => array(
        'Yes' => true
    ),
	'description' => __( 'Set same height with next column - Not recommend', 'js_composer' ),
));
vc_add_param("vc_single_image", array(
	'type' => 'checkbox',
	'heading' => __( 'Set is background image ?', 'js_composer' ),
	'param_name' => 'vc_set_img_bg',
	'description' => __( 'For option, need set column position is absolute by add custom class: "cms-abs-992" to column wrapper', 'js_composer' ),
));