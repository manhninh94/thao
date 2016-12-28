<?php
vc_remove_param( 'vc_images_carousel', 'mode' );
vc_remove_param( 'vc_images_carousel', 'partial_view' );
vc_remove_param( 'vc_images_carousel', 'speed' );

vc_add_param("vc_images_carousel", array (
	'type' => 'dropdown',
	'heading' => __( 'On click action', 'js_composer' ),
	'param_name' => 'onclick',
	'value' => array(
		__( 'Open Magnific Popup', 'js_composer' ) => 'open_magnific',
		__( 'None', 'js_composer' ) => 'link_no',
		__( 'Open custom links', 'js_composer' ) => 'custom_link',
	),
	'description' => __( 'Select action for click event.', 'js_composer' ),
));

vc_add_param("vc_images_carousel", array (
	'type' => 'dropdown',
	'heading' => __( 'Pagination position', 'js_composer' ),
	'param_name' => 'paging_postition',
	'value' => array(
		__( 'Inside', 'js_composer' ) => 'paging_inside',
		__( 'Outside', 'js_composer' ) => 'paging_outside',
	),
	'description' => __( 'Select pagination position', 'js_composer' ),
));