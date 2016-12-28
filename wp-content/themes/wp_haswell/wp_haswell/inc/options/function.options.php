<?php
global $haswell_base;
/* get local fonts. */
/**
 * Home Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Main Options', 'wp_haswell'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        
    )
);
/* Start Dummy Data*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$msg = $disabled = '';
if (!class_exists('WPBakeryVisualComposerAbstract') or !class_exists('CmssuperheroesCore') or !function_exists('cptui_create_custom_post_types')){
    $disabled = ' disabled ';
    $msg='You should be install visual composer, Cmssuperheroes and Custom Post Type UI plugins to import data.';
}
$this->sections[] = array(
    'icon' => 'el-icon-briefcase',
    'title' => __('Demo Content', 'wp_haswell'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => '<input type=\'button\' name=\'sample\' id=\'dummy-data\' '.$disabled.' value=\'Import Now\' /><div class=\'cms-dummy-process\'><div  class=\'cms-dummy-process-bar\'></div></div><div id=\'cms-msg\'><span class="cms-status"></span>'.$msg.'</div>',
            'id' => 'theme',
            'icon' => true,
            'default' => 'haswell',
            'options' => array(
                'haswell' => get_template_directory_uri().'/assets/images/dummy/haswell.png',
                'haswell-travel' => get_template_directory_uri().'/assets/images/dummy/travel.jpg'
            ),
            'type' => 'image_select',
            'title' => 'Select Theme'
        )
    )
);
/* End Dummy Data*/

/**
 * Favicon
 */
$this->sections[] = array(
    'title' => __('Favicon Icon', 'wp_haswell'),
    'icon' => 'el-icon-star',
    'fields' => array(
        array(
            'title' => __('Icon', 'cms-theme-framework'),
            'subtitle' => __('Select a favicon icon (.png, .jpg).', 'wp_haswell'),
            'id' => 'favicon_icon',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/favicon.png'
            )
        ),
    )
);

/**
 * Header Options
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Header', 'wp_haswell'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'topbar_header',
            'type' => 'switch',
            'title' => __('Enable Topbar Area', 'wp_haswell'),
            'default' => false,
            'description' => __('enable topbar area (contain Left and Right widget area). Only apear for Default Menu', 'wp_haswell'),
        ),

        array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'wp_haswell'),
            'subtitle' => __('select a layout for header', 'wp_haswell'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
                'side' => get_template_directory_uri().'/inc/options/images/header/side-menu.jpg',
                'fullscreen' => get_template_directory_uri().'/inc/options/images/header/fullscreen-menu.jpg',
                'leftmenu' => get_template_directory_uri().'/inc/options/images/header/left-menu.jpg',
            )
        ),
        /*array(
            'id'       => 'header_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'wp_haswell' ),
            'subtitle' => __( 'header background with image, color, etc.', 'wp_haswell' ),
            'output'   => array('#cshero-header'),
            'default'   => array(
                'background-color'=>'',
                'background-image'=> '',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            )
        ),*/
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'header_height',
            'type' => 'dimensions',
            'width' => false,
            'units' => array( 'px' ), 
            'title' => 'Header Height',
            'default' => array(
                'height' => '93',
            )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'header_margin',
            'output' => array('body #cshero-header'),
            'type' => 'spacing',
            'mode' => 'margin',
            'title' => 'Margin',
            'units' => array('px'),
            'default' => '',
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'header_padding',
            'title' => 'Padding',
            'output' => array('body #cshero-header'),
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'default' => '',
        ),
        array(
            'subtitle' => __('enable sticky mode for menu.', 'wp_haswell'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'wp_haswell'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Sticky shadow bottom', 'wp_haswell'),
            'id' => 'sticky_border_bottom',
            'type' => 'switch',
            'title' => __('Sticky shadow bottom', 'wp_haswell'),
            'default' => true,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'menu_sticky_height',
            'type' => 'dimensions',
            'title' => 'Sticky Header Height',
            'width' => false,
            'units' => array('px'),
            'default' => array(
                'height' => '80',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'wp_haswell'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'wp_haswell'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'wp_haswell'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'wp_haswell'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )


    )
);

/* Logo */
$this->sections[] = array(
    'title' => __('Logo', 'wp_haswell'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => __('Select Logo', 'wp_haswell'),
            'subtitle' => __('Select an image file for your logo.', 'wp_haswell'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            )
        ),
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'main_logo_height',
            'title' => 'Logo Height',
            'type' => 'dimensions',
            'units' => array( 'px' ), 
            'width' => false,
            'output' => array('#cshero-header-logo a img'),
            'default' => array(
                'height' => '42',
            )
        ),
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'sticky_logo_height',
            'title' => 'Sticky Logo Height',
            'type' => 'dimensions',
            'units' => array('px'),
            'output' => array('#cshero-header.header-fixed #cshero-header-logo a img'),
            'width' => false,
            'default' => array(
                'height' => '30'
            )
        )
    )
);

/* Menu */
$this->sections[] = array(
    'title' => __('Menu', 'wp_haswell'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'menu_padding_first_level',
            'title' => 'Menu Padding - First Level',
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'output' => array('#cshero-header-navigation .main-navigation .menu-main-menu > li > a,
                          #cshero-header-navigation .main-navigation .menu-main-menu > ul > li > a,
                          .cshero-header-cart-search .header a'),
            'default' => array(
                'padding-top' => '0px', 
                'padding-right' => '15px', 
                'padding-bottom' => '0px', 
                'padding-left' => '15px'
            ),
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => 'Menu Margin - First Level',
            'output' => array('#cshero-header-navigation .main-navigation .menu-main-menu > li > a,
                          #cshero-header-navigation .main-navigation .menu-main-menu > ul > li > a,
                          .cshero-header-cart-search .header a'),
            'type' => 'spacing',
            'mode' => 'margin',
            'units' => array('px'),
        ),
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'menu_fontsize_first_level',
            'type' => 'typography',
            'title' => 'Menu Font Size - First Level',
            'units' => 'px',
            'output' => '#cshero-header-navigation .main-navigation .menu-main-menu > li > a,
                          #cshero-header-navigation .main-navigation .menu-main-menu > ul > li > a,
                          .cshero-header-cart-search .header a',
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'subsets' => false,
            'line-height' => false,
            'text-align' => false,
            'color' => false,
            'default' => array('font-size' => '12px')
        ),
        array(
            'subtitle' => __('in pixels.', 'wp_haswell'),
            'id' => 'menu_fontsize_sub_level',
            'title' => 'Menu Font Size - Sub Level',
            'type' => 'typography',
            'output' => '#cshero-header-navigation .main-navigation .menu-main-menu > li ul a,
                      #cshero-header-navigation .main-navigation .menu-main-menu > ul > li ul a',
            'units' => 'px',
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'subsets' => false,
            'line-height' => false,
            'text-align' => false,
            'color' => false,
            'default' => array('font-size' => '12px')
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'wp_haswell'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'wp_haswell'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Enable menu first level uppercase.', 'wp_haswell'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => __('Menu First Level Uppercase', 'wp_haswell'),
            'default' => true,
        ),
        array(
            'id' => 'menu_bg',
            'type' => 'color_rgba',
            'title' => __('Menu Background Color', 'wp_haswell'),
            'default' => array(
                'color'     => '#fff',
                'alpha'     => 1
            ),
            'output' => array( 'background-color' => '.cshero-main-header'),
        ),
        array(
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Menu color - first level', 'wp_haswell'),
            'default' => '#4b4e53'
        ),
        array(
            'id' => 'menu_color_first_level_hover',
            'type' => 'color',
            'title' => __('Menu color hover - first level', 'wp_haswell'),
            'default' => '#111'
        ),
        array(
            'id' => 'sticky_menu_bg',
            'type' => 'color_rgba',
            'title' => __('Sticky Menu Background Color', 'wp_haswell'),
            'output' => array( 'background-color' => '#cshero-header.header-fixed'),
            'default' => array(
                'color'     => '#fff',
                'alpha'     => 1
            ),
        ),
        array(
            'id' => 'sticky_menu_color_first_level',
            'type' => 'color',
            'title' => __('Sticky Menu color - first level', 'wp_haswell'),
            'default' => '#4b4e53'
        ),
        array(
            'id' => 'sticky_menu_color_first_level_hover',
            'type' => 'color',
            'title' => __('Sticky Menu color hover - first level', 'wp_haswell'),
            'default' => '#111'
        ),
        array(
            'id' => 'border_sticky_menu_color',
            'type' => 'color_rgba',
            'title' => __('Border sticky menu color- first level', 'wp_haswell'),
            'default' => array(
                'color'     => '#4b4e53',
                'alpha'     => 0.5
            ),
            'output' => array( 'border-color' => '.header-fixed .menu-main-menu > li > a.onepage.current span:before, .header-fixed .menu-main-menu > li > a.onepage:hover span:before, .header-fixed .menu-main-menu > li.current-menu-item > a span:before, .header-fixed .menu-main-menu > li.current-menu-ancestor >a span:before'),
        ),
    )
);

/**
 * Page Title
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'wp_haswell'),
    'icon' => 'el el-credit-card',
    'fields' => array(
        
        array(
            'id' => 'page_title_layout',
            'type' => 'image_select',
            'title' => __('Layouts', 'wp_haswell'),
            'subtitle' => __('select a layout for page title', 'wp_haswell'),
            'default' => '3',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
                /*'1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',*/
                '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
                /*'4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',*/
                /*'5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
                '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',*/
            )
        ),

        array(
            'id' => 'page_title_style',
            'title' => __('Style', 'wp_haswell'),
            'subtitle' => __('select a style for page title', 'wp_haswell'),
            'default' => 'default',
            'type' => 'image_select',
            'options' => array(
                'default' => get_template_directory_uri().'/inc/options/images/pagetitle/small-grey.png',
                'big_grey' => get_template_directory_uri().'/inc/options/images/pagetitle/big-grey.png',
                'small_white' => get_template_directory_uri().'/inc/options/images/pagetitle/small-white.png',
                'big_white' => get_template_directory_uri().'/inc/options/images/pagetitle/big-white.png',
                'small_dark' => get_template_directory_uri().'/inc/options/images/pagetitle/small-dark.png',
                'big_dark' => get_template_directory_uri().'/inc/options/images/pagetitle/big-dark.png',
                'big_image' => get_template_directory_uri().'/inc/options/images/pagetitle/big-image.png',
                'large_image' => get_template_directory_uri().'/inc/options/images/pagetitle/large-image.png',
            ),
            'required' => array( 
                array('page_title_layout','greater_equal','1')
            )
        ),

        array(
            'title' => __('Select Background Image', 'wp_haswell'),
            'subtitle' => __('Select an image file for your page title background, suitable for Big Image, Large Image style.', 'wp_haswell'),
            'id' => 'page_title_background',
            'type' => 'media',
            'url' => true,
            'default' => '',
            'required' => array( 
                array('page_title_layout','greater_equal','1')
            )
        ),
        array(
            'id' => 'page_title_border',
            'type' => 'border',
            'title' => __('Border', 'wp_haswell'),
            'output' => '',
            'all' => false,
            'top' => true,
            'bottom' => true,
            'left' => false,
            'right' => false,
            'default'  => array(
                'border-color'  => '',
                'border-style'  => 'none',
                'border-top'    => '0',
                'border-bottom' => '0',
            ),
            'output' => array('.page-title'),
            'required' => array( 
                array('page_title_layout','greater_equal','1')
            )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'page_title_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'units' => array('px'),
            'output' => array('.page-title'),
            'default' => array(
                'margin-top' => '0px', 
                'margin-right' => '0px', 
                'margin-bottom' => '0px', 
                'margin-left' => '0px',
                'units' => 'px'
            ),
            'required' => array( 
                array('page_title_layout','greater_equal','1')
            )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'page_title_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'output' => array('.page-title'),
            'default' => array(
                'padding-top' => '68px', 
                'padding-right' => '0px', 
                'padding-bottom' => '66px', 
                'padding-left' => '0px',
                'units' => 'px'
            ),
            'required' => array( 
                array('page_title_layout','greater_equal','1')
            )
        )
    )
);

/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => __('Page Title', 'wp_haswell'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => __('Typography', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'wp_haswell'),
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '25px',
                'text-align' => 'left'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => __('Breadcrumb', 'wp_haswell'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('The text before the breadcrumb home.', 'wp_haswell'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'wp_haswell'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#breadcrumb-text','#breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'wp_haswell'),
            'default' => array(
                'color' => '#7e8082',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '11px',
                'line-height' => '24px',
                'text-align' => 'right'
            )
        ),
    )
);

/**
 * Body
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Body', 'wp_haswell'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => __('Set layout boxed default(Wide).', 'wp_haswell'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => __('Boxed Layout', 'wp_haswell'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'wp_haswell' ),
            'subtitle' => __( 'body background with image, color, etc.', 'wp_haswell' ),
            'output'   => array('body'),
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'body_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'units' => array('px'),
            'output' => array('body #page'),
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'body_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'output' => array('body #page'),
        )
    )
);

/**
 * Content
 * 
 * Archive, Pages, Single, 404, Search, Category, Tags .... 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Content', 'wp_haswell'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'wp_haswell' ),
            'subtitle' => __( 'Container background with image, color, etc.', 'wp_haswell' ),
            'output'   => array('#main'),
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'container_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'units' => array('px'),
            'output' => array('body #main'),

        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'container_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'output' => array('body #main'),
        )
    )
);

/**
 * Blog
 * 
 * Archive, Pages, Single, 404, Search, Category, Tags .... 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Blog', 'wp_haswell'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => 'Select main content and sidebar alignment.',
            'id' => 'blog_layout',
            'type' => 'image_select',
            'options' => array(
                'full-width' => get_template_directory_uri().'/assets/images/1col.png',
                'right-sidebar' => get_template_directory_uri().'/assets/images/2cr.png',
                'left-sidebar' => get_template_directory_uri().'/assets/images/2cl.png'
            ),
            'title' => 'Blog Layout',
            'default' => 'right-sidebar'
        ),
        array(
            'id' => 'comments_post_type',
            'type' => 'select',
            'title' => 'Comments Type',
            'options' => array(
                'default' => __('Default Comments', 'wp_haswell'),
                'facebook' => __('Facebook Comments', 'wp_haswell'),
                'disqus' => __('Disqus Comments', 'wp_haswell'),
            ),
            'default' => 'default',
        ),

        array(
            'id'       => 'fb_app_id',
            'type'     => 'text',
            'title'    => __('Facebook App Id', 'wp_haswell'),
            'subtitle' => __('Facebook App Id, default is my app id: 1621007798158687', 'wp_haswell'),
            'default'  => '',
            'required' => array( 
                array('comments_post_type','equals','facebook')
            )
        ),

    )
);

$this->sections[] = array(
    'title' => __('Timeline Blog', 'wp_haswell'),
    'icon' => 'el-icon-livejournal',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'timeline_intro_start',
            'type'     => 'text',
            'title'    => __('Timeline intro start', 'wp_haswell'),
            'description' => __('Timeline intro start - Default is "Start Company" ', 'wp_haswell'),
            'default'  => __('START COMPANY', 'wp_haswell'),
        ),
        array(
            'id'          => 'timeline_intro_start_date',
            'type'        => 'date',
            'title'       => __('Timeline intro date start', 'wp_haswell'),
            'placeholder' => 'Click to enter a date'
        ),
        array(
            'id'       => 'timeline_intro_start_end',
            'type'     => 'text',
            'title'    => __('Timeline intro end', 'wp_haswell'),
            'description' => __('Timeline intro end - Default is "Recent day" ', 'wp_haswell'),
            'default'  => __('RECENT DAY', 'wp_haswell'),
        ),
    )
);

$this->sections[] = array(
    'title' => __('Single Blog', 'wp_haswell'),
    'icon' => 'el-icon-livejournal',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Select main content and sidebar alignment.',
            'id' => 'single_layout',
            'type' => 'image_select',
            'options' => array(
                'full-width' => get_template_directory_uri().'/assets/images/1col.png',
                'right-sidebar' => get_template_directory_uri().'/assets/images/2cr.png',
                'left-sidebar' => get_template_directory_uri().'/assets/images/2cl.png'
            ),
            'title' => 'Post Layout',
            'default' => 'right-sidebar'
        ),
        array(
            'subtitle' => 'Show Post Title',
            'id' => 'show_single_title',
            'type' => 'switch',
            'title' => 'Show Post Title',
            'default' => true
        ),
        array(
            'subtitle' => 'Show Tags Post',
            'id' => 'show_tags_post',
            'type' => 'switch',
            'title' => 'Show Tags',
            'default' => false
        ),
        array(
            'subtitle' => 'Show Socials Icon at bottom of single post',
            'id' => 'show_social_post',
            'type' => 'switch',
            'title' => 'Show Socials Icon',
            'default' => false
        ),
        array(
            'subtitle' => 'Previous/Next Pagination',
            'id' => 'show_navigation_post',
            'type' => 'switch',
            'title' => 'Previous/Next Pagination',
            'default' => false
        ),
        array(
            'title' => 'Show Image Featured',
            'subtitle' => 'Display featured images on archive port.',
            'id' => 'single_featured_images',
            'type' => 'switch',
            'default' => true
        ),
        
    )
);



/**
 * Bottom
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Bottom', 'wp_haswell'),
    'icon' => 'el-icon-fork',
    'fields' => array(
        array(
            'subtitle' => __('Enable Bottom Area.', 'wp_haswell'),
            'id' => 'enable_bottom_area',
            'type' => 'switch',
            'title' => __('Enable Bottom', 'wp_haswell'),
            'default' => true,
        ),
        array(
            'id'       => 'bottom_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'wp_haswell' ),
            'subtitle' => __( 'bottom background with image, color, etc.', 'wp_haswell' ),
            'output'   => array('footer .cms-bottom-wrap'),
            'default'   => array(
                'background-color'=>'#eee',
                'background-image'=> '',
                'background-repeat'=>'',
                'background-size'=>'',
                'background-attachment'=>'',
                'background-position'=>''
            ),
            'required' => array( 0 => 'enable_bottom_area', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'bottom_margin',
            'title' => 'Margin',
            'type' => 'spacing',
            'mode' => 'margin',
            'units' => array('px'),
            'output' => array('footer .cms-bottom-wrap'),
            'required' => array( 0 => 'enable_bottom_area', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('in pixels, top right bottom left, ex: 10px 10px 10px 10px', 'wp_haswell'),
            'id' => 'bottom_padding',
            'title' => 'Padding',
            'type' => 'spacing',
            'mode' => 'padding',
            'units' => array('px'),
            'output' => array('footer .cms-bottom-wrap'),
            'default' => array(
                'padding-top' => '80px',
                'padding-right' => '0px',
                'padding-bottom' => '45px',
                'padding-left' => '0px',
                'units' => 'px'
            ),
            'required' => array( 0 => 'enable_bottom_area', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Footer
 *
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Footer', 'wp_haswell'),
    'icon' => 'el-icon-credit-card',
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Layout', 'wp_haswell'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Select footer layout.',
            'id' => 'footer_layout',
            'type' => 'image_select',
            'options' => array(
                '1' => get_template_directory_uri().'/inc/options/images/footer/footer1.png',
                '2' => get_template_directory_uri().'/inc/options/images/footer/footer2.png',
                '3' => get_template_directory_uri().'/inc/options/images/footer/footer3.png',
                '4' => get_template_directory_uri().'/inc/options/images/footer/footer4.png',
            ),
            'title' => 'Footer Layout',
            'default' => '2'
        ),
        array(
            'subtitle' => __('enable button back to top.', 'wp_haswell'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'wp_haswell'),
            'default' => true,
        )
    )
);

/**
 * Page Loadding
 * 
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Page Loadding', 'wp_haswell'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable page loadding.', 'wp_haswell'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', 'wp_haswell'),
            'default' => false,
        ),
        /*array(
            'subtitle' => 'Select Style Page Loadding.',
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => 'Page Loadding Style',
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        ) */    
    )
);

/**
 * Styling
 * 
 * css color.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Styling', 'wp_haswell'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => __('set color main color.', 'wp_haswell'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'wp_haswell'),
            'default' => '#ffea00'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'wp_haswell'),
            'id' => 'link_color',
            'type' => 'color',
            'title' => __('Link Color', 'wp_haswell'),
            'output'  => array('a'),
            'default' => '#4b4e53'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'wp_haswell'),
            'id' => 'link_color_hover',
            'type' => 'color',
            'title' => __('Link Color Hover', 'wp_haswell'),
            'output'  => array('a:hover'),
            'default' => '#97999c'
        )
    )
);

/**
 * Woocommerces
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Woocommerces', 'wp_haswell'),
    'icon' => 'el el-shopping-cart',
);

/* General */
$this->sections[] = array(
    'title' => __('General', 'wp_haswell'),
    'icon' => 'el el-info-circle',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Choose number of columns in product list.',
            'id' => 'woo_columns_layout',
            'options' => array(
                2 => '2 Columns',
                3 => '3 Columns',
                4 => '4 Columns',
            ),
            'type' => 'select',
            'title' => 'Product List Columns',
            'default' => '3',
        ),
        array(
            'subtitle' => 'The number product to show on each page. Max is 30',
            'id' => 'woo_number_page',
            'options' => array(
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9,
                10 => 10,
                11 => 11,
                12 => 12,
                13 => 13,
                14 => 14,
                15 => 15,
                16 => 16,
                17 => 17,
                18 => 18,
                19 => 19,
                20 => 20,
                21 => 21,
                22 => 22,
                23 => 23,
                24 => 24,
                25 => 25,
                26 => 26,
                27 => 27,
                28 => 28,
                29 => 29,
                30 => 30,
            ),
            'type' => 'select',
            'title' => 'Number Product Per Page',
            'default' => '12',
        ),
        array(
            'subtitle' => __('enable shop info', 'wp_haswell'),
            'id' => 'woo_show_shop_info',
            'type' => 'switch',
            'title' => __('Enable Shop Info', 'wp_haswell'),
            'default' => false,
        ),
        array(
            'subtitle' => __('enable clients info', 'wp_haswell'),
            'id' => 'woo_show_clients_info',
            'type' => 'switch',
            'title' => __('Enable Clients Info', 'wp_haswell'),
            'default' => false,
        ),
    )
);

/**
 * Typography
 * 
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Typography', 'wp_haswell'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'subtitle' => __('Typography option with each property can be called individually.', 'wp_haswell'),
            'default' => array(
                'color' => '#7e8082',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open sans',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '25px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '32px',
                'line-height' => '45px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '28px',
                'line-height' => '32px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '33px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '25px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '25px',
                'text-align' => ''
            ),
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'wp_haswell'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#4b4e53',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Lato',
                'google' => true,
                'font-size' => '12px',
                'line-height' => '18px',
                'text-align' => ''
            ),
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'wp_haswell'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'wp_haswell'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Lato'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'wp_haswell'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'wp_haswell'),
            'validate' => 'no_html',
            'default' => '.author-testimonial, .testimonial-2 p',
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'wp_haswell'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Open Sans'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'wp_haswell'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'wp_haswell'),
            'validate' => 'no_html',
            'default' => '.cms-grid-testimonials-layout2,.cms-small-author-container, .author-testimonial,.countdown-period',
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => __('Font 3', 'wp_haswell'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '300',
                'font-family' => 'Lato'
            )
        ),
        array(
            'id' => 'google-font-selector-3',
            'type' => 'textarea',
            'title' => __('Selector 3', 'wp_haswell'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'wp_haswell'),
            'validate' => 'no_html',
            'default' => '.countdown-amount',
        ),
    )
);

/**
 * Custom CSS
 * 
 * extra css for customer.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'wp_haswell'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'wp_haswell'),
            'subtitle' => __('create your css code here.', 'wp_haswell'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Animations', 'wp_haswell'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation mouse scroll...', 'wp_haswell'),
            'id' => 'smoothscroll',
            'type' => 'switch',
            'title' => __('Smooth Scroll', 'wp_haswell'),
            'default' => false
        ),
        array(
            'subtitle' => __('Enable animation parallax for images...', 'wp_haswell'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'wp_haswell'),
            'default' => true
        ),
    )
);
/**
 * Optimal Core
 * 
 * Optimal options for theme. optimal speed
 * @author Fox
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'wp_haswell'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'wp_haswell'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'wp_haswell'),
            'default' => false
        )
    )
);