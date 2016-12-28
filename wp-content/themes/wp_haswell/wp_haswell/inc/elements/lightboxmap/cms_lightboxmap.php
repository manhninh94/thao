<?php
vc_map(array(
    "name" => 'CMS Lightbox Map',
    "base" => "cms_lightboxmap",
    "icon" => "cs_icon_for_vc",
    "category" => __('CmsSuperheroes Shortcodes', 'wp_haswell'),
    "description" => __('Lightbox Map', 'wp_haswell'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __ ( 'Map Link', 'wp_haswell' ),
            "param_name" => "map_link",
            "value" => ''
        ),
        array (
            "type" => "attach_image",
            "heading" => __("Image thumbnail",'js_composer'),
            "param_name" => "image_thumbnail",
            "description" => __("Thumbnail for video", 'js_composer')
        ),
        array(
            "type" => "textfield",
            "heading" => __ ( "Extra class name", "js_composer" ),
            "param_name" => "el_class",
            "description" => __ ( "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer" )
        )
    )
));
class WPBakeryShortCode_cms_lightboxmap extends CmsShortCode
{
    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}
?>