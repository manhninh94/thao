<?php
/* Remove param */
vc_remove_param( "cms_fancybox_single", "title" );
vc_remove_param( "cms_fancybox_single", "description" );
vc_remove_param( "cms_fancybox_single", "image" );
vc_remove_param('cms_fancybox_single','cms_template');
vc_remove_param('cms_fancybox_single','button_type');
vc_remove_param('cms_fancybox_single','button_link');
vc_remove_param('cms_fancybox_single','button_text');

vc_add_param("cms_fancybox_single", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __("Sub title", 'wp_haswell'),
    "param_name" => "cms_fancybox_subtitle",
    "value" => "",
    "description" => __('Fancybox sub title', 'wp_haswell'),
    "group" => __("Fancy Icon Settings", 'wp_haswell')
));

vc_add_param("cms_fancybox_single", array(
    /* Start Icon */
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
    "group" => __("Fancy Icon Settings", 'wp_haswell')
));

vc_add_param("cms_fancybox_single", array(
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
    "group" => __("Fancy Icon Settings", 'wp_haswell')
    /* End Icon */
));

vc_add_param("cms_fancybox_single", array(
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
    "group" => __("Fancy Icon Settings", 'wp_haswell')
    /* End Icon */
));

vc_add_param("cms_fancybox_single", array(
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
    "group" => __("Fancy Icon Settings", 'wp_haswell')
    /* End Icon */
));

vc_add_param("cms_fancybox_single", array(
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
    "group" => __("Fancy Icon Settings", 'wp_haswell')
    /* End Icon */
));

vc_add_param("cms_fancybox_single", array(
    "type" => "attach_image",
    "heading" => __("Image Item",'wp_haswell'),
    "param_name" => "image",
    "group" => __("Template", 'wp_haswell'),
    'dependency' => array(
          'element' => 'cms_template',
          'value' => array('cms_fancybox_single--layout8.php'),
      ),
)); 
vc_add_param("cms_fancybox_single", array(
    "type" => "textfield",
    "heading" => __("Link",'wp_haswell'),
    "param_name" => "link",
    "group" => __("Template", 'wp_haswell'),
    'dependency' => array(
          'element' => 'cms_template',
          'value' => array('cms_fancybox_single--layout8.php'),
      ),
));
vc_add_param("cms_fancybox_single", array(
    'type' => 'checkbox',
    'heading' => __( 'Feature ?', 'wp_haswell' ),
    'param_name' => 'custom_title',
    'description' => __( 'Item feature', 'wp_haswell' ),
    "group" => __("Template", 'wp_haswell'),
    'dependency' => array(
          'element' => 'cms_template',
          'value' => array('cms_fancybox_single--layout8.php'),
      ),
)); 
vc_add_param("cms_fancybox_single", array(
    'type' => 'dropdown',
    'heading' => __( 'CSS Animation', 'wp_haswell' ),
    'param_name' => 'css_animation',
    'value' => haswell_animate_lib(),
    'description' => __( 'Select "animation in" for page transition.', 'js_composer' ),
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_fancybox_single", array(
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
    "group" => __("Template", 'wp_haswell')
));

vc_add_param("cms_fancybox_single", array(
    "type" => "dropdown",
    "heading" => __("Content Align",'wp_haswell'),
    "param_name" => "content_align",
    "value" => array(
        "Default" => "default",
        "Left" => "left",
        "Right" => "right",
        "Center" => "center"
        ),
    "group" => __("Template", 'wp_haswell')
));

/*vc_add_param("cms_fancybox_single", array(
    "type" => "textfield",
    "class" => "",
    "heading" => __('Icon Font Size', 'wp_haswell'),
    "param_name" => "fancy_icon_fontsize",
    "value" => "",
    "description" => __('Default is 35px', 'wp_haswell'),
    "group" => __('Fancy Icon Settings', 'wp_haswell')
));*/

$cms_template_attribute = array(
    'type' => 'cms_template_img',
    'param_name' => 'cms_template',
    "shortcode" => "cms_fancybox_single",
    "heading" => __("Shortcode Template",'wp_haswell'),
    "admin_label" => true,
    "description" => __('Choose fancy box layout', 'wp_haswell'),
    "group" => __("Template", 'wp_haswell'),
);
vc_add_param('cms_fancybox_single',$cms_template_attribute);