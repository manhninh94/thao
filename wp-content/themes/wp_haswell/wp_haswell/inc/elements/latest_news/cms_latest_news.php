<?php
if(class_exists('CmsShortCode')){
	vc_map(
		array(
			"name" => __("CMS Latest News", 'wp_haswell'),
		    "base" => "cms_latest_news",
		    "class" => "vc-cms-latest-new",
		    "category" => __("CmsSuperheroes Shortcodes", 'wp_haswell'),
		    "params" => array(
		    	array(
		            "type" => "textfield",
		            "heading" => __("Title",'wp_haswell'),
		            "param_name" => "latest_title",
		            "value" => "",
		            "description" => __("Title latest news",'wp_haswell'),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            "type" => "dropdown",
		            "heading" => __("Categories post name",'wp_haswell'),
		            "param_name" => "categories_name",
		            "value" => haswell_get_category(),
		            "description" => __("Enter categories post name (ex: Design)",'wp_haswell'),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            "type" => "cms_template",
		            "param_name" => "cms_template",
		            "admin_label" => true,
		            "heading" => __('Shortcode Template','wp_haswell'),
		            "shortcode" => "cms_latest_news",
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            'type' => 'textfield',
		            'heading' => __( 'Number post to show', 'js_composer' ),
		            'param_name' => 'cms_number_post_to_show',
		            'description' => __( 'Default is 6', 'js_composer' ),
		            'dependency' => array(
		                'element' => 'cms_template',
		                'value' => array('cms_latest_news--layout-magazine.php'),
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            'type' => 'textfield',
		            'heading' => __( 'Exclude post', 'js_composer' ),
		            'param_name' => 'cms_exclude_post',
		            'description' => __( 'Exclude post: (Enter post IDs, separated by commas)', 'js_composer' ),
		            'dependency' => array(
		                'element' => 'cms_template',
		                'value' => array('cms_latest_news--layout-magazine.php'),
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            'type' => 'dropdown',
		            'heading' => __( 'Magazine lists style', 'js_composer' ),
		            'param_name' => 'magazine_style',
		            'description' => __( '', 'js_composer' ),
		            "value" => array(
		            	__('Special Grid Style', 'js_composer') => 'grid',
		            	__('Slider Style', 'js_composer') => 'slider',
		            	__('Grid Style', 'js_composer') => 'grid-wide-thumb',
		            ),
		            'dependency' => array(
		                'element' => 'cms_template',
		                'value' => array('cms_latest_news--layout-magazine.php'),
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            "type" => "dropdown",
		            "heading" => __("Post in page",'wp_haswell'),
		            "param_name" => "post_in_page",
		            "value" => array(
		            	3 => __('3 columns', 'js_composer'),
		            	4 => __('4 columns', 'js_composer'),
		            	6 => __('6 columns', 'js_composer'),
		            ),
		            "description" => __("Show post number in page",'wp_haswell'),
		            "group" => __("General Settings", 'wp_haswell'),
		            'dependency' => array(
		                'element' => 'cms_template',
		                'value' => array('cms_latest_news--layout-fullwidth.php',
		                	'cms_latest_news--layout-cars.php',
		                	'cms_latest_news--layout2.php',
		                	'cms_latest_news--layout-columns.php'),
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            'type' => 'checkbox',
		            'heading' => __( 'Use view all link ?', 'js_composer' ),
		            'param_name' => 'cms_viewall',
		            'description' => __( 'Use view all link', 'js_composer' ),
		            "group" => __("General Settings", 'wp_haswell'),
		            'dependency' => array(
		                'element' => 'cms_template',
		                'value' => array('cms_latest_news--layout-fullwidth.php',
		                	'cms_latest_news--layout-cars.php',
		                	'cms_latest_news--layout2.php',
		                	'cms_latest_news--layout-columns.php'),
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		        array(
		            'type' => 'textfield',
		            'heading' => __( 'View all text', 'js_composer' ),
		            'param_name' => 'cms_viewall_text',
		            'description' => __( 'View all text, default is "Our blog"', 'js_composer' ),
		            'dependency' => array(
		                'element' => 'cms_viewall',
		                'value' => 'true',
		            ),
		            "group" => __("General Settings", 'wp_haswell')
		        ),
		    	
		    )
		)
	);
	class WPBakeryShortCode_cms_latest_news extends CmsShortCode {
		protected function content($atts, $content = null) {
			//default value
			$atts_extra = shortcode_atts(array(
				'post_in_page' => '3',	
				    ), $atts);
			$atts = array_merge($atts_extra,$atts);
	        $html_id = cmsHtmlID('cms-latest-news');
	        $atts['template'] = 'template-'.str_replace('.php','',$atts['cms_template']);
	        $atts['html_id'] = $html_id;
			return parent::content($atts, $content);
		}
	}
}
?>