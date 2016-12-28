<?php

/**
 * Auto create css from Meta Options.
 * 
 * @author Fox
 * @version 1.0.0
 */
class CMSSuperHeroes_DynamicCss
{

    function __construct()
    {
        add_action('wp_head', array($this, 'generate_css'));
    }

    /**
     * generate css inline.
     *
     * @since 1.0.0
     */
    public function generate_css()
    {
        global $smof_data, $haswell_base;
        $css = $this->css_render();
        if (! $smof_data['dev_mode']) {
            $css = $haswell_base->compressCss($css);
        }
        echo '<style type="text/css" data-type="cms_shortcodes-custom-css">'.$css.'</style>';
    }

    /**
     * header css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $haswell_meta;
        ob_start();
        /* Menu color from page option */
        if (!empty($haswell_meta->_cms_custom_page_header_bg_color)) {
            echo '.site-header #cshero-header { background-color: '.$haswell_meta->_cms_custom_page_header_bg_color.'}';
        }
        if (!empty($haswell_meta->_cms_custom_page_header_menu_color)) {
            echo '.site-header .main-navigation .menu-main-menu > li > a {color: '. $haswell_meta->_cms_custom_page_header_menu_color .'}';
        }

        if (!empty($haswell_meta->_cms_custom_page_header_menu_color_hover)) {
            echo '.site-header .main-navigation .menu-main-menu > li:hover > a,  
                    .site-header .main-navigation .menu-main-menu > li.current-menu-item > a,
                    .site-header .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                    .site-header .main-navigation .menu-main-menu > li > a.onepage.current,
                    .site-header .cshero-header-cart-search .icon_cart_wrap, #cshero-menu-mobile .hamb-mob-icon
                     {color: '. $haswell_meta->_cms_custom_page_header_menu_color_hover .'}';
            echo '.site-header .menu-main-menu > li.current-menu-item > a span::before, 
                    .site-header .menu-main-menu > li.current-menu-ancestor > a span::before,
                    .site-header .cd-search-trigger::before {border-color: '.$haswell_meta->_cms_custom_page_header_menu_color_hover.'}';
            echo '.site-header .cd-search-trigger::after {background-color: '.$haswell_meta->_cms_custom_page_header_menu_color_hover.'}';            
        }
        /* sticky inherit */
        if (empty($haswell_meta->_cms_page_header_sticky_bg_color) && !empty($haswell_meta->_cms_custom_page_header_bg_color)) {
            echo '.site-header #cshero-header.header-fixed { background-color: '.$haswell_meta->_cms_custom_page_header_bg_color.'}';
        }
        if (empty($haswell_meta->_cms_page_header_sticky_menu_color) && !empty($haswell_meta->_cms_custom_page_header_menu_color)) {
            echo '.site-header .header-fixed .main-navigation .menu-main-menu > li > a {color: '. $haswell_meta->_cms_custom_page_header_menu_color .'}';
        }
        if (empty($haswell_meta->_cms_page_header_sticky_color_hover) && !empty($haswell_meta->_cms_custom_page_header_menu_color_hover)) {
            echo '.site-header .header-fixed .main-navigation .menu-main-menu > li:hover > a,  
                    .site-header .header-fixed .main-navigation .menu-main-menu > li.current-menu-item > a {color: '. $haswell_meta->_cms_custom_page_header_menu_color_hover .'}';
        }

        if (isset($haswell_meta->_cms_enable_header_fixed) && $haswell_meta->_cms_enable_header_fixed) {
            if ( $haswell_meta->_cms_page_header_bg_color) {
                echo 'body #cshero-header {background-color: '. $haswell_meta->_cms_page_header_bg_color .'}';
            }
            if (!empty($haswell_meta->_cms_page_header_menu_color)) {
                echo 'body .main-navigation .menu-main-menu > li > a {color: '. $haswell_meta->_cms_page_header_menu_color .'}';
            }
            if (!empty($haswell_meta->_cms_page_header_menu_color_hover)) {
                echo 'body .main-navigation .menu-main-menu > li:hover > a,  
                        body .main-navigation .menu-main-menu > li.current-menu-item > a,
                        body .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                        body .main-navigation .menu-main-menu li > a.onepage.current,
                        body .cshero-header-cart-search .icon_cart_wrap, #cshero-menu-mobile .hamb-mob-icon
                         {color: '. $haswell_meta->_cms_page_header_menu_color_hover .'}';
                echo 'body .menu-main-menu > li.current-menu-item > a span::before, 
                        body .menu-main-menu > li.current-menu-ancestor > a span::before,
                        body .cd-search-trigger::before {border-color: '.$haswell_meta->_cms_page_header_menu_color_hover.'}';
                echo 'body .cd-search-trigger::after {background-color: '.$haswell_meta->_cms_page_header_menu_color_hover.'}';            
            }
            /* sticky*/
            if ( !empty($haswell_meta->_cms_page_header_sticky_bg_color)) {
                echo 'body #cshero-header.header-fixed {background-color: '. $haswell_meta->_cms_page_header_sticky_bg_color .'}';
            }
            if (!empty($haswell_meta->_cms_page_header_sticky_menu_color)) {
                echo 'body .header-fixed .main-navigation .menu-main-menu > li > a {color: '. $haswell_meta->_cms_page_header_sticky_menu_color .'}';
            }
            if (!empty($haswell_meta->_cms_page_header_sticky_color_hover)) {
                echo 'body .header-fixed .main-navigation .menu-main-menu > li:hover > a,
                        body .header-fixed .main-navigation .menu-main-menu > li a.onepage.current,
                        body .header-fixed .main-navigation .menu-main-menu > li.current-menu-item > a {color: '. $haswell_meta->_cms_page_header_sticky_color_hover .'}';
            }
        }

        /* Topbar */
        if (isset($haswell_meta->_csm_header_topbar)) {
            
        }

        if (!empty($haswell_meta->_cms_enable_menu_border_first)) {
            if (($haswell_meta->_cms_confirm_menu_border_first == 'inherit' && $smof_data['sticky_border_bottom'] == 1) || $haswell_meta->_cms_confirm_menu_border_first == 'show') {
                echo 'body .menu-main-menu > li.current-menu-item > a span::before, body .menu-main-menu > li.current-menu-ancestor > a span::before {display: block}';
            }
            if (!empty($haswell_meta->_cms_page_menu_border_color)) {
                echo 'body .menu-main-menu > li.current-menu-item > a span::before, 
                        body .menu-main-menu > li.current-menu-ancestor > a span::before,
                        body .header-fixed .menu-main-menu > li.current-menu-item > a span::before,
                        body .header-fixed .menu-main-menu > li.current-menu-ancestor > a span::before,
                        body .menu-main-menu > li > a.onepage:hover span:before,
                        body .menu-main-menu > li > a.onepage.current span:before, 
                        body .header-fixed .menu-main-menu > li > a.onepage:hover span:before,
                        body .header-fixed .menu-main-menu > li > a.onepage.current span:before {border-color: '.$haswell_meta->_cms_page_menu_border_color.'}';
            }
            if ($haswell_meta->_cms_confirm_menu_border_first == 'hide') {
                echo 'body .menu-main-menu > li.current-menu-item > a span:before, 
                        body .menu-main-menu > li.current-menu-ancestor > a span:before {display: none}';
            } elseif ($haswell_meta->_cms_confirm_menu_border_first == 'hide_only_sticky') {
                echo 'body .header-fixed .menu-main-menu > li.current-menu-item > a span:before, body .header-fixed .menu-main-menu > li.current-menu-ancestor > a span:before {display: none !important;}';
            }
        }

        /* On mobile */
        if ((empty($smof_data['menu_sticky_tablets']) || empty($smof_data['menu_sticky_mobile'])) && (!empty($haswell_meta->_cms_header)) ) {
            echo '@media only screen and (max-width : 1024px) {';
            echo 'body .site-header #cshero-header {background-color: #fff}
                body .site-header .main-navigation .menu-main-menu > li > a {color: #4b4e53;}
                body .site-header .main-navigation .menu-main-menu > li:hover > a,  
                body .site-header .main-navigation .menu-main-menu > li.current-menu-item > a,
                body .site-header .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
                body .site-header .cshero-header-cart-search .icon_cart_wrap, #cshero-menu-mobile .hamb-mob-icon {color: #4b4e53;}
                body .site-header .menu-main-menu > li.current-menu-item > a span::before, 
                body .site-header .menu-main-menu > li.current-menu-ancestor > a span::before,
                body .site-header .cd-search-trigger::before {border-color: #4b4e53;}
                body .site-header .cd-search-trigger::after {background: #4b4e53;}
            ';
            echo '#cshero-header-logo a img.logo-follow-option {display: none}';
            echo '#cshero-header-logo a img.logo-fixed {display: inline-block !important }';
            echo '}';
        }
        

        /* Page title color */
        $cms_get_page_meta = '';
        if ( class_exists('Woocommerce') && is_shop() ) {
            $page_id = woocommerce_get_page_id('shop');
            $cms_get_page_meta = haswell_post_meta_data($page_id);
        } else {
            $cms_get_page_meta = $haswell_meta;
        }
        

        if (isset($cms_get_page_meta->_cms_page_title) && $cms_get_page_meta->_cms_page_title == 1) {
            if (isset($cms_get_page_meta->_cms_page_title_stye) && $cms_get_page_meta->_cms_page_title_stye == 'none') {
                echo 'body #page-title {display: none}';
            }
            if (!empty($cms_get_page_meta->_cms_page_title_color) || !empty($cms_get_page_meta->_cms_page_sub_title_color) || !empty($cms_get_page_meta->_cms_page_title_color_hover)) {
                add_filter('custom_pagetitle_color', function() {return 'page-title-custom-color';});
            }

            if (!empty($cms_get_page_meta->_cms_page_title_color)) {
                echo 'body #page-title.page-title-custom-color #page-title-text h1 {color: '. $cms_get_page_meta->_cms_page_title_color .'}';
            }
            if ( !empty($cms_get_page_meta->_cms_page_sub_title_color) ) {
                echo 'body #page-title.has-subtitle.page-title-custom-color .page-sub-title, body #page-title.page-title-custom-color #breadcrumb-text li a {color: '. $cms_get_page_meta->_cms_page_sub_title_color .'}';
            }
            if ( !empty($cms_get_page_meta->_cms_page_title_color_hover) ) {
                echo 'body #page-title.page-title-custom-color #breadcrumb-text li a:hover, body #page-title.page-title-custom-color #breadcrumb-text li {color: '. $cms_get_page_meta->_cms_page_title_color_hover .'}';
            }
            if (isset($cms_get_page_meta->_cms_dis_pagetitle_border) && $cms_get_page_meta->_cms_dis_pagetitle_border) {
                echo 'body #page-title.has-border, body #page-title.page-title-large {border: none}';
            }
            if (isset($cms_get_page_meta->_cms_page_title_padding_top) && $cms_get_page_meta->_cms_page_title_padding_top) {
                echo 'body #page-title.page-title-large {padding-top: '. $cms_get_page_meta->_cms_page_title_padding_top .';}';
            }
        }

        /* custom css. */
        if (!empty($smof_data['custom_css'])) {
            echo $smof_data['custom_css'];
        }
        
        return ob_get_clean();
    }
}

new CMSSuperHeroes_DynamicCss();