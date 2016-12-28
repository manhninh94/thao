<?php
/**
 * @name : Default
 * @package : CMSSuperHeroes
 * @author : Fox
 */
?>
<?php global $smof_data, $haswell_meta;
    $menu_custom_class = 'nav-menu menu-main-menu';
    $header_fixed = (is_page() && !empty($haswell_meta->_cms_enable_header_fixed)) ? $haswell_meta->_cms_enable_header_fixed : $smof_data['menu_sticky'];
?>
<div class="haswell-menu-left">
    <header id="masthead" class="site-header" >
        <div id="cshero-header-left">
            <div id="cshero-header-logo">
                <?php
                    $logo_url = $logo_fixed = '';
                    if ( isset($haswell_meta->_cms_page_logo_custom) && $haswell_meta->_cms_page_logo_custom) {
                        $logo_url = wp_get_attachment_url($haswell_meta->_cms_page_logo_custom);
                    } else {
                        $logo_url = $smof_data['main_logo']['url'];
                    }
                    $logo_fixed = $smof_data['main_logo']['url'];
                ?>
                <div class="header-logo-inner">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="logo-fixed" alt="" src="<?php echo esc_url($logo_fixed); ?>" <?php echo (isset($haswell_meta->_cms_page_logo_custom_height) && $haswell_meta->_cms_page_logo_custom_height) ? 'style="height: '. $haswell_meta->_cms_page_logo_custom_height.'"' : '' ?>>
                    </a>
                </div>
            </div>
            <div class="left-nav-wrap">
                <button id="cshero-menu-mobile" data-target="#site-navigation" data-toggle="collapse" class="navbar-toggle btn-navbar collapsed" type="button">
                    <span class="icon_menu hamb-mob-icon" aria-hidden="true"></span>
                </button>
                <div class="cshero-header-cart-search cms-in-phone">
                    <?php dynamic_sidebar('cart-search-top'); ?>
                </div>
            </div>
            
            <div id="site-navigation" class="main-menu-container collapse">
                <?php
                    if (is_active_sidebar('left-menu-area')) {
                        dynamic_sidebar('left-menu-area');
                    }
                ?>
            </div>

        </div>
    </header>
</div>
<!-- #site-navigation -->