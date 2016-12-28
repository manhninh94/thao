<?php
vc_map(array(
    "name" => 'CMS Dropcaps',
    "base" => "cms_dropcaps",
    "icon" => "cs_icon_for_vc",
    "category" => __('CmsSuperheroes Shortcodes', 'wp_haswell'),
    "description" => __('Dropcap', 'wp_haswell'),
    "params" => array(
        array(
                "type" => "textarea",
                "heading" => __ ( 'Content', 'wp_haswell' ),
                "param_name" => "dropcap_content",
                "value" => ''
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Dropcap Box",'wp_haswell'),
            "param_name" => "dropcap_box",
            "value" => array(
                "No" => "",
                "Yes" => "yes"
            )
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Dropcap Type",'wp_haswell'),
            "param_name" => "dropcap_type",
            "value" => array(
                "Square" => "square",
                "Circle" => "circle"
            ),
            'dependency' => array(
                'element' => 'dropcap_box',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Dropcap Box Color",'wp_haswell'),
            "param_name" => "dropcap_box_color",
            "value" => "",
        ),
        array(
            "type" => "colorpicker",
            "heading" => __("Dropcap Box Background",'wp_haswell'),
            "param_name" => "dropcap_box_bg",
            "value" => "",
            'dependency' => array(
                'element' => 'dropcap_box',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
        )
    )
));
class WPBakeryShortCode_cms_dropcaps extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>