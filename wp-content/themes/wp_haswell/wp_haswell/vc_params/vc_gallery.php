<?php
vc_add_param("vc_gallery", array (
	'type' => 'dropdown',
	'heading' => __( 'Gallery type', 'js_composer' ),
	'param_name' => 'type',
	'value' => array(
		__( 'Flex slider fade', 'js_composer' ) => 'flexslider_fade',
		__( 'Flex slider slide', 'js_composer' ) => 'flexslider_slide',
		__( 'Nivo slider', 'js_composer' ) => 'nivo',
		__( 'Image grid', 'js_composer' ) => 'image_grid',
		__( 'Cms special', 'js_composer' ) => 'cms_special',
	),
	'description' => __( 'Select gallery type.', 'js_composer' )
));