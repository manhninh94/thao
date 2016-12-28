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
    $enable_topbar = '';
    if (!empty($smof_data['topbar_header']) && $smof_data['topbar_header'] == 1) {
        $enable_topbar = 'block';
    }
    if (isset($haswell_meta->_cms_header_topbar) && $haswell_meta->_cms_header_topbar == 'show' ) {
        $enable_topbar = 'block';
    }
    if ((isset($haswell_meta->_cms_header_topbar) && $haswell_meta->_cms_header_topbar == 'inherit') && $smof_data['topbar_header'] == 1) {
        $enable_topbar = 'block';
    }
    if ((isset($haswell_meta->_cms_header_topbar) && $haswell_meta->_cms_header_topbar == 'inherit') && $smof_data['topbar_header'] != 1) {
        $enable_topbar = 'none';
    }
    if (isset($haswell_meta->_cms_header_topbar) && $haswell_meta->_cms_header_topbar == 'hide' ) {
        $enable_topbar = 'none';
    }
?>
<header id="masthead" class="site-header" >
    <div id="cshero-header" 
        class="cshero-main-header 
            <?php echo (!empty($smof_data['menu_sticky_tablets'])) ? 'sticky-tablets': ''; ?> 
            <?php echo (!empty($smof_data['menu_sticky_mobile'])) ? 'sticky-mobile': ''; ?> 
            <?php if ($header_fixed != '' && $header_fixed == true) {echo 'header-fixed-page';} ?>
            <?php if ($smof_data['menu_sticky'] && $smof_data['sticky_border_bottom']) {echo 'sticky-border';} ?>
        ">
        <?php if ((is_active_sidebar( 'topbar-left-sidebar' ) || is_active_sidebar( 'topbar-right-sidebar' )) && $enable_topbar == 'block') : ?>
            <div class="topbar-wrap clearfix" >
                <?php if (is_active_sidebar( 'topbar-left-sidebar' )) : ?>
                    <div class="topbar topbar-left text-left pull-left">
                        <?php dynamic_sidebar( 'topbar-left-sidebar' ); ?>  
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar( 'topbar-right-sidebar' )) : ?>
                    <div class="topbar topbar-right text-right pull-right">
                        <?php dynamic_sidebar( 'topbar-right-sidebar' ); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
            
        <div class="container-m-30">
            <div class="row">
                <div id="cshero-header-logo" class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                    <?php
                        $logo_url = $logo_fixed = '';
                        if ( isset($haswell_meta->_cms_page_logo_custom) && $haswell_meta->_cms_page_logo_custom) {
                            $logo_url = wp_get_attachment_url($haswell_meta->_cms_page_logo_custom);
                        } else {
                            $logo_url = $smof_data['main_logo']['url'];
                        }
                        $logo_fixed = $smof_data['main_logo']['url'];
                    ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img class="logo-follow-option" alt="" src="<?php echo esc_url($logo_url); ?>" <?php echo (isset($haswell_meta->_cms_page_logo_custom_height) && $haswell_meta->_cms_page_logo_custom_height) ? 'style="height: '. $haswell_meta->_cms_page_logo_custom_height.'"' : '' ?>>
                        <img class="logo-fixed hidden" alt="" src="<?php echo esc_url($logo_fixed); ?>" <?php echo (isset($haswell_meta->_cms_page_logo_custom_height) && $haswell_meta->_cms_page_logo_custom_height) ? 'style="height: '. $haswell_meta->_cms_page_logo_custom_height.'"' : '' ?>>
                    </a>
                </div>
                <button id="cshero-menu-mobile" data-target="#site-navigation" data-toggle="collapse" class="navbar-toggle btn-navbar collapsed" type="button">
                    <span class="icon_menu hamb-mob-icon" aria-hidden="true"></span>
                </button>

                <div class="cshero-header-cart-search cms-in-phone">
                    <?php dynamic_sidebar('cart-search-top'); ?>
                </div>
                <div id="cshero-header-navigation" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 has-search-cart">
                    <div class="cshero-header-cart-search cms-in-desktop">
                        <?php dynamic_sidebar('cart-search-top'); ?>
                    </div>
                    <nav id="site-navigation" class="main-navigation collapse">
                        <?php
                        
                        $attr = array(
                            'menu' =>haswell_menu_location(),
                            'menu_class' => $menu_custom_class,
                            'menu_id' => 'menu-main-menu'
                        );
                        
                        $menu_locations = get_nav_menu_locations();
                        
                        if(!empty($menu_locations['primary'])){
                            $attr['theme_location'] = 'primary';
                        }
                        
                        /* enable mega menu. */
                        if(class_exists('HeroMenuWalker')){ $attr['walker'] = new HeroMenuWalker(); }
                        
                        /* main nav. */
                        wp_nav_menu( $attr ); ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- #site-navigation -->