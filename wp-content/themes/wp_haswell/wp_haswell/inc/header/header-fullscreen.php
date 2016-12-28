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
<header id="masthead" class="site-header" >
    <div id="cshero-header" 
        class="header-fullscreen-menu-wrap cshero-main-header 
            <?php echo (!empty($smof_data['menu_sticky_tablets'])) ? 'sticky-tablets': ''; ?> 
            <?php echo (!empty($smof_data['menu_sticky_mobile'])) ? 'sticky-mobile': ''; ?> 
            <?php if ($header_fixed != '' && $header_fixed == true) {echo 'header-fixed-page';} ?>
            <?php if ($smof_data['menu_sticky'] && $smof_data['sticky_border_bottom']) {echo 'sticky-border';} ?>
        ">
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
                <a href="#" id="haswell-fullscreen-trigger" class=""><span class="haswell-menu-icon"></span></a>
            </div>
        </div>
    </div>
</header>
<!-- #site-navigation -->