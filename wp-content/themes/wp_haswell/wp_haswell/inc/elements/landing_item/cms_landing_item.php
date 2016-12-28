<?php
vc_map(array(
    "name" => 'CMS Landing Item',
    "base" => "cms_landing_item",
    "icon" => "cs_icon_for_vc",
    "category" => __('CmsSuperheroes Shortcodes', 'wp_haswell'),
    "description" => __('Landing Item, suitable for Landing Page', 'wp_haswell'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Title', 'wp_haswell' ),
            "param_name" => "landing_title",
            "value" => '',
            'admin_label' => true,
        ),
        array (
            "type" => "attach_image",
            "heading" => __("Image thumbnail",'js_composer'),
            "param_name" => "image_thumbnail",
            "description" => __("Thumbnail landing item", 'js_composer')
        ),
        array(
            'type' => 'vc_link',
            'heading' => __( 'URL (Link) - link', 'js_composer' ),
            'param_name' => 'link',
            'description' => __( 'Add link to button.', 'js_composer' )
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
        ),
        array(
            'type' => 'dropdown',
            'heading' => __( 'CSS Animation', 'js_composer' ),
            'param_name' => 'css_animation',
            'value' => haswell_animate_lib(),
            'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
        ),
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Animation Delay Time", 'js_composer'),
            "param_name" => "css_animation_delay",
            "value" => array(
                'None' => '0ms',
                '200ms' => '200ms',
                '400ms' => '400ms',
                '600ms' => '600ms',
                '800ms' => '800ms',
                '1000ms' => '1000ms',
            ),
            "description" => __('Animation Delay Time', 'js_composer'),
        ),
    )
));

class WPBakeryShortCode_cms_landing_item extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}