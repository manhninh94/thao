<?php
vc_map(array(
    "name" => 'CMS Google Map',
    "base" => "cms_googlemap",
    "icon" => "cs_icon_for_vc",
    "category" => __('CmsSuperheroes Shortcodes', 'wp_haswell'),
    "description" => __('', 'wp_haswell'),
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __('API Key', 'wp_haswell'),
            "param_name" => "api",
            "value" => '',
            "description" => __('Enter you api key of map, get key from (https://console.developers.google.com)', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Address', 'wp_haswell'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => __('Enter address of Map', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Coordinate', 'wp_haswell'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => __('Enter coordinate of Map, format input (latitude, longitude)', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Click Show Info window', 'wp_haswell'),
            "param_name" => "infoclick",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Click a marker and show info window (Default Show).', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Coordinate', 'wp_haswell'),
            "param_name" => "markercoordinate",
            "value" => '',
            "description" => __('Enter marker coordinate of Map, format input (latitude, longitude)', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Marker Title', 'wp_haswell'),
            "param_name" => "markertitle",
            "value" => '',
            "description" => __('Enter Title Info windows for marker', 'wp_haswell')
        ),
        array(
            "type" => "textarea",
            "heading" => __('Marker Description', 'wp_haswell'),
            "param_name" => "markerdesc",
            "value" => '',
            "description" => __('Enter Description Info windows for marker', 'wp_haswell')
        ),
        array(
            "type" => "attach_image",
            "heading" => __('Marker Icon', 'wp_haswell'),
            "param_name" => "markericon",
            "value" => '',
            "description" => __('Select image icon for marker', 'wp_haswell')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Marker List', 'wp_haswell'),
            "param_name" => "markerlist",
            "value" => '',
            "description" => __('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Info Window Max Width', 'wp_haswell'),
            "param_name" => "infowidth",
            "value" => '200',
            "description" => __('Set max width for info window', 'wp_haswell')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Map Type", 'wp_haswell'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => __('Select the map type.', 'wp_haswell')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Style Template", 'wp_haswell'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Custom" => "custom",
                "Light Monochrome" => "light-monochrome",
                "Blue water" => "blue-water",
                "Midnight Commander" => "midnight-commander",
                "Paper" => "paper",
                "Red Hues" => "red-hues",
                "Hot Pink" => "hot-pink"
            ),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => __('Custom Template', 'wp_haswell'),
            "param_name" => "content",
            "value" => '',
            "description" => __('Get template from http://snazzymaps.com', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Zoom', 'wp_haswell'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => __('zoom level of map, default is 13', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Width', 'wp_haswell'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => __('Width of map without pixel, default is auto', 'wp_haswell')
        ),
        array(
            "type" => "textfield",
            "heading" => __('Height', 'wp_haswell'),
            "param_name" => "height",
            "value" => '350px',
            "description" => __('Height of map without pixel, default is 350px', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scroll Wheel', 'wp_haswell'),
            "param_name" => "scrollwheel",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Pan Control', 'wp_haswell'),
            "param_name" => "pancontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Pan control.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Zoom Control', 'wp_haswell'),
            "param_name" => "zoomcontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Zoom Control.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Scale Control', 'wp_haswell'),
            "param_name" => "scalecontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Scale Control.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Map Type Control', 'wp_haswell'),
            "param_name" => "maptypecontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Map Type Control.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Street View Control', 'wp_haswell'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Street View Control.', 'wp_haswell')
        ),
        array(
            "type" => "checkbox",
            "heading" => __('Over View Map Control', 'wp_haswell'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                __("Yes, please", 'wp_haswell') => true
            ),
            "description" => __('Show or hide Over View Map Control.', 'wp_haswell')
        )
    )
));

class WPBakeryShortCode_cms_googlemap extends CmsShortCode
{

    protected function content($atts, $content = null)
    {
        return parent::content($atts, $content);
    }
}

?>