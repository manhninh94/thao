<?php
if(class_exists('CmsShortCode')){
	vc_map(
		array(
			"name" => __("CMS Countdown", 'wp_haswell'),
		    "base" => "cms_countdown",
		    "class" => "vc-cms-countdown",
		    "category" => __("CmsSuperheroes Shortcodes", 'wp_haswell'),
		    "params" => array(
		        array(
	            "type" => "textfield",
	            "heading" => __("Date count down",'wp_haswell'),
	            "param_name" => "date_count_down",
	            "value" => "",
	            "description" => __("Set date count down (default:2020/10/10)",'wp_haswell'),
	            "group" => __("General Settings", 'wp_haswell')
		        ),
		    	array(
		            "type" => "cms_template",
		            "param_name" => "cms_template",
		            "admin_label" => true,
		            "heading" => __("Shortcode Template",'wp_haswell'),
		            "shortcode" => "cms_countdown",
		            "group" => __("Template", 'wp_haswell'),
		        )
		    )
		)
	);
	class WPBakeryShortCode_cms_countdown extends CmsShortCode{
		protected function content($atts, $content = null){
			/* require js */
			wp_enqueue_script('cms_countdown', get_template_directory_uri() . '/inc/elements/countdown/js/jquery.countdown.js', array( 'jquery' ), '2.0.5', true);
			wp_enqueue_script('cms_countdown_config', get_template_directory_uri() . '/inc/elements/countdown/js/countdown.config.js', array( 'jquery' ), '1.0.0', true);
			//default value
			$atts_extra = shortcode_atts(array(
				'title' => '',	
				    ), $atts);
			$atts = array_merge($atts_extra,$atts);
	        $html_id = cmsHtmlID('cms-countdown');
	        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
	        $atts['html_id'] = $html_id;
			return parent::content($atts, $content);
		}
	}
}
?>