<?php
vc_map(
	array(
		"name" => __("CMS Contact info", 'wp_haswell'),
	    "base" => "cms_contact_info",
	    "class" => "vc-cms-contact-info",
	    "category" => __("CmsSuperheroes Shortcodes", 'wp_haswell'),
	    "params" => array(
	    	array(
	            "type" => "textfield",
	            "heading" => __("Title",'wp_haswell'),
	            "param_name" => "title",
	            "value" => "",
	            "description" => __("Title Of Contact info",'wp_haswell'),
	            "group" => __("General Settings", 'wp_haswell')
	        ),
	        array(
	            'type' => 'textarea_html',
				'holder' => 'div',
	            "heading" => __("Description",'wp_haswell'),
	            "param_name" => "content",
	            "value" => "",
	            "description" => __("Description Contact info",'wp_haswell'),
	            "admin_label" => false,
	            "group" => __("General Settings", 'wp_haswell')
	        ),
	        array(
	            "type" => "dropdown",
	            "heading" => __("Content Align",'wp_haswell'),
	            "param_name" => "content_align",
	            "value" => array(
	            	"Default" => "default",
	            	"Left" => "left",
	            	"Right" => "right",
	            	"Center" => "center"
	            	),
	            "group" => __("General Settings", 'wp_haswell')
	        ),
	        /* Start Items */
	        /* Start Icon */
	        array(
				'type' => 'dropdown',
		        'heading' => __( 'Icon library', 'wp_haswell' ),
		        'value' => array(
		            __( 'Font Awesome', 'wp_haswell' ) => 'fontawesome',
		            __( 'Linea Icons', 'wp_haswell' ) => 'lineaicon',
		            __( 'Glyphicons', 'wp_haswell' ) => 'glyphicon',
		            __( 'Elegant Icon', 'wp_haswell' ) => 'elegant',
		        ),
		        'param_name' => 'icon_type',
		        'description' => __( 'Select icon library.', 'js_composer' ),
		        "group" => __("General Settings", 'wp_haswell')
			),
			array(
				'type' => 'iconpicker',
		        'heading' => __( 'Icon', 'wp_haswell' ),
		        'param_name' => 'icon_fontawesome',
		        'value' => '',
		        'settings' => array(
		            'emptyIcon' => true, // default true, display an "EMPTY" icon?
		            'type' => 'fontawesome',
		            'iconsPerPage' => 200, // default 100, how many icons per/page to display
		        ),
		        'dependency' => array(
		            'element' => 'icon_type',
		            'value' => 'fontawesome',
		        ),
		        'description' => __( 'Select icon from library.', 'wp_haswell' ),
		        "group" => __("General Settings", 'wp_haswell')
			),
	        array(
				'type' => 'iconpicker',
		        'heading' => __( 'Icon', 'wp_haswell' ),
		        'param_name' => 'icon_lineaicon',
		        'value' => '',
		        'settings' => array(
		            'emptyIcon' => true, // default true, display an "EMPTY" icon?
		            'type' => 'lineaicon',
		            'iconsPerPage' => 200, // default 100, how many icons per/page to display
		        ),
		        'dependency' => array(
		            'element' => 'icon_type',
		            'value' => 'lineaicon',
		        ),
		        'description' => __( 'Select icon from library.', 'wp_haswell' ),
				"group" => __("General Settings", 'wp_haswell')
			),
			array(
				'type' => 'iconpicker',
		        'heading' => __( 'Icon', 'wp_haswell' ),
		        'param_name' => 'icon_glyphicon',
		        'value' => '',
		        'settings' => array(
		            'emptyIcon' => true, // default true, display an "EMPTY" icon?
		            'type' => 'glyphicon',
		            'iconsPerPage' => 200, // default 100, how many icons per/page to display
		        ),
		        'dependency' => array(
		            'element' => 'icon_type',
		            'value' => 'glyphicon',
		        ),
		        'description' => __( 'Select icon from library.', 'wp_haswell' ),
				"group" => __("General Settings", 'wp_haswell')
			),
			array(
				'type' => 'iconpicker',
		        'heading' => __( 'Icon', 'wp_haswell' ),
		        'param_name' => 'icon_elegant',
		        'value' => '',
		        'settings' => array(
		            'emptyIcon' => true, // default true, display an "EMPTY" icon?
		            'type' => 'elegant',
		            'iconsPerPage' => 200, // default 100, how many icons per/page to display
		        ),
		        'dependency' => array(
		            'element' => 'icon_type',
		            'value' => 'elegant',
		        ),
		        'description' => __( 'Select icon from library.', 'wp_haswell' ),
				"group" => __("General Settings", 'wp_haswell')
			),
			array(
		        'type' => 'dropdown',
		        'heading' => __( 'CSS Animation', 'js_composer' ),
		        'param_name' => 'css_animation',
		        'value' => haswell_animate_lib(),
		        'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
		        "group" => __("General Settings", 'wp_haswell')
		    ),
			array(
		        "type" => "dropdown",
		        "class" => "",
		        "heading" => __("Animation Delay Time", 'wp_haswell'),
		        "param_name" => "css_animation_delay",
		        "value" => array(
		            'None' => '0ms',
		            '200ms' => '200ms',
		            '400ms' => '400ms',
		            '600ms' => '600ms',
		            '800ms' => '800ms',
		            '1000ms' => '1000ms',
		        ),
		        "description" => __('Animation Delay Time', 'wp_haswell'),
		        "group" => __("General Settings", 'wp_haswell')
		    ),
	        array(
	            "type" => "textfield",
	            "heading" => __("Extra Class",'wp_haswell'),
	            "param_name" => "class",
	            "value" => "",
	            "description" => __("",'wp_haswell'),
	            "group" => __("Template", 'wp_haswell')
	        ),
	    	array(
	            "type" => "cms_template",
	            "param_name" => "cms_template",
	            "admin_label" => true,
	            "heading" => __("Shortcode Template",'wp_haswell'),
	            "shortcode" => "cms_contact_info",
	            "group" => __("Template", 'wp_haswell'),
	        )
		)
	)
);
class WPBakeryShortCode_cms_contact_info extends CmsShortCode{
	protected function content($atts, $content = null){
		$atts_extra = shortcode_atts(array(
			'title' => '',
			'content_align' => 'default',
			'icon_type' => 'fontawesome',
			'icon_fontawesome' => '',
			'icon_openiconic' => '',
			'icon_typicons' => '',
			'icon_entypoicons' => '',
			'icon_linecons' => '',
			'icon_entypo' => '',
			'icon_pe7stroke' => '',
			'cms_template' => 'cms_contact_info.php',
			'class' => '',
			    ), $atts);
		$atts = array_merge($atts_extra,$atts);
		$atts['icon_type'] = isset($atts['icon_type'])?$atts['icon_type']:'fontawesome';
		$atts['description'] = isset($atts['description'])?$atts['description']:'';
		$atts['title'] = isset($atts['title'])?$atts['title']:'';
		switch ($atts['icon_type']) {
			case 'pe7stroke':
				wp_enqueue_style('cms-icon-pe7stroke', CMS_CSS. 'Pe-icon-7-stroke.css');
				break;
			case 'rticon':
				wp_enqueue_style('cms-icon-rticon', CMS_CSS. 'rticon.css');
				break;
			default:
				vc_icon_element_fonts_enqueue( $atts['icon_type'] );
				break;
		}
        $html_id = cmsHtmlID('cms-contact-info');
        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']). ' content-align-' . $atts['content_align'] . ' '. $atts['class'];
        $atts['html_id'] = $html_id;
		return parent::content($atts, $content);
	}
}

?>