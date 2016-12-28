<?php
/**
 * Page title template
 * @since 1.0.0
 * @author Fox
 */
function haswell_page_title(){
    global $smof_data, $haswell_meta, $haswell_base;

    $cms_get_post_meta = '';

    if ( class_exists('Woocommerce') && is_shop() ) {
        $page_id = woocommerce_get_page_id('shop');
        $cms_get_post_meta = haswell_post_meta_data($page_id);
    } else {
        $cms_get_post_meta = $haswell_meta;
    }
    
    /* page options */
    if(isset($cms_get_post_meta->_cms_page_title) && $cms_get_post_meta->_cms_page_title){
        if(isset($cms_get_post_meta->_cms_page_title_type)){
            $smof_data['page_title_layout'] = $cms_get_post_meta->_cms_page_title_type;
        }
    }
    
    if($smof_data['page_title_layout']) {
        ?>
        <div id="page-title" class="page-title <?php haswell_custom_pagetitle_color(); ?> <?php haswell_custom_pagetitle_layout(); ?> <?php echo (!empty($cms_get_post_meta->_cms_page_title_sub_text)) ? 'has-subtitle' : ''; ?>" <?php haswell_custom_pagetitle_bg(); ?>>
            <div class="container">
            <div class="row">
                <?php switch ($smof_data['page_title_layout']){
                    case '1':
                        ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $haswell_base->getPageTitle(); ?></h1><?php haswell_page_sub_title(); ?></div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $haswell_base->getBreadCrumb(); ?></div>
                        <?php
                        break;
                    case '2':
                        ?>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $haswell_base->getBreadCrumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $haswell_base->getPageTitle(); ?></h1><?php haswell_page_sub_title(); ?></div>
                        <?php          
                        break;
                    case '3':
                        ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $haswell_base->getPageTitle(); ?></h1><?php haswell_page_sub_title(); ?></div>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $haswell_base->getBreadCrumb(); ?></div>
                        <?php
                        break;
                    case '4':
                        ?>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $haswell_base->getBreadCrumb(); ?></div>
                        <div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $haswell_base->getPageTitle(); ?></h1><?php haswell_page_sub_title(); ?></div>
                        <?php
                        break;
                    case '5':
                        ?>
                        <div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $haswell_base->getPageTitle(); ?></h1><?php haswell_page_sub_title(); ?></div>
                        <?php
                        break;
                    case '6':
                        ?>
                        <div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $haswell_base->getBreadCrumb(); ?></div>
                        <?php
                        break;
                }?>
                </div>
            </div>
        </div><!-- #page-title -->
        <?php
    }
}

/**
 * Get sub page title.
 *
 * @author Fox
 */
function haswell_page_sub_title(){
    global $haswell_meta, $post;
    $cms_get_post_meta = '';

    if ( class_exists('Woocommerce') && is_shop() ) {
        $page_id = woocommerce_get_page_id('shop');
        $cms_get_post_meta = haswell_post_meta_data($page_id);
    } else {
        $cms_get_post_meta = $haswell_meta;
    }

    if(!empty($cms_get_post_meta->_cms_page_title_sub_text)){
        echo '<div class="page-sub-title">'.$cms_get_post_meta->_cms_page_title_sub_text.'</div>';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo '<div class="page-sub-title">'.(get_post_meta($post->ID, 'post_subtitle', true)).'</div>';
    }
}

/**
 * Add filter for page title color
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
function haswell_custom_pagetitle_color() {
    echo apply_filters('custom_pagetitle_color', '');
}

/**
 * Custom Page Title Background Image
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
function haswell_custom_pagetitle_bg() {
    global $smof_data, $haswell_meta;
    $image_url = '';

    if ( class_exists('Woocommerce') && is_shop() ) {
        $page_id = woocommerce_get_page_id('shop');
        $page_shop_meta = haswell_post_meta_data($page_id);

        if (!empty($page_shop_meta->_cms_page_title)) {
            if ( ($page_shop_meta->_cms_page_title_stye == 'big_image' || $page_shop_meta->_cms_page_title_stye == 'large_image') && $page_shop_meta->_cms_page_title_image) {
                $image_url = 'style="background-image: url('.wp_get_attachment_url($page_shop_meta->_cms_page_title_image).');" ';
            }
        }
    } else if (!empty($haswell_meta->_cms_page_title)) {
        if ( ($haswell_meta->_cms_page_title_stye == 'big_image' || $haswell_meta->_cms_page_title_stye == 'large_image') && $haswell_meta->_cms_page_title_image) {
            $image_url = 'style="background-image: url('.wp_get_attachment_url($haswell_meta->_cms_page_title_image).');" ';
        }
    } else {
        if ( ($smof_data['page_title_style'] == 'big_image' || $smof_data['page_title_style'] == 'large_image') && !empty($smof_data['page_title_background']['url'])) {
            $image_url = 'style="background-image: url('.$smof_data['page_title_background']['url'].');" ';
        }
    }
 
    echo apply_filters('custom_pagetitle_bg', $image_url);
}

/**
 * Custom Page title layout
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
function haswell_custom_pagetitle_layout() {
    global $haswell_meta,$smof_data;
    $cms_get_page_title = $page_title_class = ''; //default

    if ( class_exists('Woocommerce') && is_shop() ) {
        $page_id = woocommerce_get_page_id('shop');
        $page_shop_meta = haswell_post_meta_data($page_id);

        $cms_get_page_title = $page_shop_meta->_cms_page_title_stye;
    } elseif (isset($haswell_meta->_cms_page_title) && !empty($haswell_meta->_cms_page_title)) {
        $cms_get_page_title = $haswell_meta->_cms_page_title_stye;
    } elseif(!empty( $smof_data['page_title_style'])) {
        $cms_get_page_title =  $smof_data['page_title_style'];
    }else{
        $cms_get_page_title ='default';
    }
    switch ( $cms_get_page_title ) {
        case 'default':
            $page_title_class = 'page-title-small grey-light-bg';
            break; 
        case 'small_white':
            $page_title_class = 'page-title-small white has-border';
            break; 
        case 'small_dark':
            $page_title_class = 'page-title-small grey-dark-bg';
            break; 
        case 'big_grey':
            $page_title_class = 'page-title-big grey-light-bg';
            break; 
        case 'big_white':
            $page_title_class = 'page-title-big white has-border';
            break;
        case 'big_dark':
            $page_title_class = 'page-title-big grey-dark-bg';
            break;
        case 'big_image':
            $page_title_class = 'page-title-big page-title-img grey-dark-bg';
            break;
        case 'large_image':
            $page_title_class = 'page-title-large page-title-img';
            break;
        case 'none':
            $page_title_class = 'page-title-hidden hidden';
            break;
        default:
            $page_title_class = '';
            break;
    }
    
    echo apply_filters('custom_pagetitle_layout', $page_title_class);
}


/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function haswell_header() {
    global $smof_data, $haswell_meta;
    /* header for page */
    if(isset($haswell_meta->_cms_header) && $haswell_meta->_cms_header){
        if(!empty($haswell_meta->_cms_header_layout)) {
            $smof_data['header_layout'] = $haswell_meta->_cms_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

/**
 * Action Before Show Menu
 * 
 * @author Duong Tung
 */
function haswell_before_show_menu() {
    global $smof_data, $haswell_meta;
    /* header for page */
    if(isset($haswell_meta->_cms_header) && $haswell_meta->_cms_header){
        if(!empty($haswell_meta->_cms_header_layout)) {
            $smof_data['header_layout'] = $haswell_meta->_cms_header_layout;
        }
        else {
            $smof_data['header_layout'] = '';
        }
    }

    if ($smof_data['header_layout'] == 'side' || $smof_data['header_layout'] == 'leftmenu' ) {
        echo '<div class="haswell-content-side-wrap">';
    }
}
add_action('haswell_before_show_menu', 'haswell_before_show_menu');

/**
 * Action After Show Menu
 * 
 * @author Duong Tung
 */
function haswell_after_show_menu() {
    global $smof_data, $haswell_meta;
    /* header for page */
    if(isset($haswell_meta->_cms_header) && $haswell_meta->_cms_header){
        if(!empty($haswell_meta->_cms_header_layout)) {
            $smof_data['header_layout'] = $haswell_meta->_cms_header_layout;
        }
        else {
            $smof_data['header_layout'] = '';
        }
    }

    if ($smof_data['header_layout'] == 'side') {
        echo '</div>';

        if (is_active_sidebar('sidemenu-area')) {
            echo '<nav class="sidemenu-wrap">';
            dynamic_sidebar('sidemenu-area');
            echo '</nav>';
        }
    }

    if ($smof_data['header_layout'] == 'fullscreen') {
        if (is_active_sidebar('fullscreen-menu-area')) {
            echo '<nav class="fullscreen-menu-wrap"><div class="fullscreen-menu-inner">';
            dynamic_sidebar('fullscreen-menu-area');
            echo '</div></nav>';
        }
    }

    if ($smof_data['header_layout'] == 'leftmenu') {
        echo '</div>';
    }
}
add_action('haswell_after_show_menu', 'haswell_after_show_menu');

/**
 * Get Header Layout.
 * 
 * @author Fox
 */
function haswell_footer(){
    global $smof_data, $haswell_meta;
    /* header for page */
    if(isset($haswell_meta->_cms_footer) && $haswell_meta->_cms_footer) {
        if(isset($haswell_meta->_cms_footer_layout)) {
            $smof_data['footer_layout'] = $haswell_meta->_cms_footer_layout;
        }
    }
    
    /* load template. */
    get_template_part('inc/footer/footer', $smof_data['footer_layout']);
}

/**
 * Get menu location ID.
 * 
 * @param string $option
 * @return NULL
 */
function haswell_menu_location($option = '_cms_primary'){
    global $haswell_meta;
    /* get menu id from page setting */
    return (isset($haswell_meta->$option) && $haswell_meta->$option) ? $haswell_meta->$option : null ;
}

function haswell_get_page_loading() {
    global $smof_data;
    
    if($smof_data['enable_page_loadding']){
        echo '<div id="cms-loadding"><div class="ball"></div>';
        /*switch ($smof_data['page_loadding_style']){
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }*/
        echo '</div>';
    }
}

/**
 * Add page class
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_page_class(){
    global $smof_data;
    
    $page_class = '';
    /* check boxed layout */
    if($smof_data['body_layout']){
        $page_class = 'cs-boxed';
    } else {
        $page_class = 'cs-wide';
    }
    
    echo apply_filters('haswell_page_class', $page_class);
}

/**
 * Add main class
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_main_class(){
    global $haswell_meta;
    
    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($haswell_meta->_cms_full_width) && $haswell_meta->_cms_full_width){
        /* full width */
        $main_class = "no-container";
    } else {
        //boxed
        $main_class = "container";
    }
    
    echo apply_filters('haswell_main_class', $main_class);
}

/**
 * Archive detail
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_archive_detail(){
    ?>
    <div class="post-info">
        <ul>
            <li class="entry-date">
                <span><?php echo get_the_date('F d') ?></span>
            </li>
            <li class="entry-author">
                <?php the_author_posts_link(); ?>
            </li>
            <?php if (has_category()) : ?>
                <li class="entry-terms">
                    <?php the_terms( get_the_ID(), 'category', '', ', ' ); ?>
                </li>
            <?php endif; ?>
            <?php //if(has_tag()): ?>
                <!--li class="entry-tags"><?php the_tags('', ', ' ); ?></li-->
            <?php //endif; ?>
        </ul>
    </div>
    <?php
}
/* Archive detail v2 */
function haswell_archive_detail_v2(){
    ?>
    <div class="post-info">
        <ul>
            <li class="entry-author">
                <?php the_author_posts_link(); ?>
            </li>
        </ul>
    </div>
    <?php
}
/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_archive_readmore(){
    $likes = get_post_meta(get_the_ID() , '_cms_post_likes', true);
    if(!$likes) $likes = 0;
    $icon = 'icon_heart_alt';
    if(isset($_COOKIE['cms_post_like_'. get_the_ID()])) {
        $icon = 'fa fa-heart';
    }
    ?>
    <div class="post-meta">
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>" class="blog-more pull-left"><?php _e('Read More', 'wp_haswell') ?></a>
        <ul class="footer-meta-wrap pull-right">
            <li class="entry-comment">
                <i class="icon_comment_alt"></i>
                <a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a>
            </li>
            <li class="entry-like" data-id="<?php the_ID(); ?>">
                <a href="#"><i class="<?php echo esc_attr($icon); ?>"></i></a>
                <span class="count-like"><?php echo esc_attr($likes); ?></span>
            </li>
            <li class="entry-share">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                    <i aria-hidden="true" class="social_share"></i>
                </a>
                <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i aria-hidden="true" class="social_facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/home?status=<?php echo esc_url('Check out this article', 'wp_haswell');?>:%20<?php echo esc_url(get_the_title()); ?>%20-%20<?php the_permalink();?>"><i aria-hidden="true" class="social_twitter"></i></a></li>
                    <li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i aria-hidden="true" class="social_googleplus"></i></a></li>
                </ul>
            </li>
        </ul>
    </div>
    <?php
}

/**
 * Archive readmore
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_single_footer() {
    $likes = get_post_meta(get_the_ID() , '_cms_post_likes', true);
    if(!$likes) $likes = 0;
    $icon = 'icon_heart_alt';
    if(isset($_COOKIE['cms_post_like_'. get_the_ID()])) {
        $icon = 'fa fa-heart';
    }
    ?>
        <?php if(has_tag()): ?>
            <div class="entry-tags pull-left"><?php the_tags('', '' ); ?></div>
        <?php endif; ?>
        <ul class="footer-meta-wrap pull-right">
            <li class="entry-comment">
                <i class="icon_comment_alt"></i>
                <a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a>
            </li>
            <li class="entry-like" data-id="<?php the_ID(); ?>">
                <a href="#"><i class="<?php echo esc_attr($icon); ?>"></i></a>
                <span class="count-like"><?php echo esc_attr($likes); ?></span>
            </li>
            <li class="entry-share">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
                    <i aria-hidden="true" class="social_share"></i>
                </a>
                <ul class="social-menu dropdown-menu dropdown-menu-right" role="menu">
                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i aria-hidden="true" class="social_facebook"></i></a></li>
                    <li><a target="_blank" href="https://twitter.com/home?status=<?php _e('Check out this article', 'wp_haswell');?>:%20<?php echo esc_url(get_the_title()) ;?>%20-%20<?php the_permalink();?>"><i aria-hidden="true" class="social_twitter"></i></a></li>
                    <li><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i aria-hidden="true" class="social_googleplus"></i></a></li>
                </ul>
            </li>
        </ul>
    <?php
}

/**
 * Html 5 Audio
 * 
 * @param string $before
 * @param string $after
 */
function haswell_audio_html5() {
    global $haswell_base;
    /* get shortcode audio. */
    preg_match('/\[audio src="(.*)?"\]/', get_the_content() , $matches);
    $html5 = '';

    if ( !empty($matches[1]) ) {
        $html5 = '[audio src="'.esc_url($matches[1]).'"][/audio]';
        echo apply_filters('the_content', '<div class="entry-feature entry-feature-media mb-20">'.$html5.'</div>');
    } elseif (has_post_thumbnail())  {
        echo '<div class="entry-feature entry-feature-image mb-20">'.get_the_post_thumbnail('full').'</div>';
    }
}

/**
 * Media Audio.
 * 
 * @param string $before
 * @param string $after
 */
function haswell_archive_audio($tag = '') {
	global $haswell_base;
    /* get shortcode audio. */
    $shortcode = $haswell_base->getShortcodeFromContent($tag, get_the_content());
    
    if($shortcode != '') {
        echo '<div class="entry-feature entry-feature-media mb-20">'.do_shortcode($shortcode).'</div>';
        return true;
    } else {
        if(has_post_thumbnail()){
            echo '<div class="entry-feature entry-feature-image mb-30">'.get_the_post_thumbnail('full').'</div>';
        }
        
        return false;
    }
}

/**
 * Media Video.
 *
 * @param string $before
 * @param string $after
 */
function haswell_archive_video() {
    
    global $wp_embed, $haswell_base;
    /* Get Local Video */
    $local_video_url = $remote_video_url = '';
    $local_video = $haswell_base->getShortcodeFromContent('video', get_the_content());
    preg_match("/\"(.*)\"/", $local_video , $matches);
    if (!empty($matches[1])) $local_video_url = $matches[1];

    $iframe_video = $haswell_base->getShortcodeFromContent('iframe', get_the_content());
    preg_match("/\"(.*)\"/", $iframe_video , $matches);
    if (!empty($matches[1])) $remote_video_url = $matches[1];
    if($local_video_url){
        echo '<div class="entry-feature entry-feature-media mb-30">'.$wp_embed->run_shortcode( '[embed width="100%" height="100%"]' . $local_video_url. '[/embed]' ).'</div>';
        return true;
        
    } elseif ($remote_video_url) {
        echo '<div class="entry-feature entry-feature-media mb-30">'.$wp_embed->run_shortcode( '[embed width="100%" height="100%"]' . $remote_video_url. '[/embed]' ).'</div>';
        return true;
    } elseif (has_post_thumbnail()) {
        echo '<div class="entry-feature entry-feature-image mb-30">'.get_the_post_thumbnail('full').'</div>';
    } else {
        return false;
    }
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_archive_gallery() {
	global $haswell_base;
    /* get shortcode gallery. */
    $shortcode = $haswell_base->getShortcodeFromContent('gallery', get_the_content());
    
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);
        
        if(!empty($ids)){
        
            $array_id = explode(",", $ids[1]);
            ?>
            <div id="entry-gallery-<?php echo uniqid(); ?>" class="cms-carousel-wrapper owl-images-wrap paging_inside mb-30">
                <div class="cms-owl-carousel owl-carousel owl-theme owl-loaded owl-drag" data-loop="false" data-nav="true" data-pagination="true" data-per-view="1">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                        if($attachment_image[0] != ''):?>
                            <div class="item">
                                <img src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
            return true;
        } else {
            return false;
        }
    } else {
        if(has_post_thumbnail()){
            echo '<div class="entry-feature entry-feature-image mb-30">'.get_the_post_thumbnail('full').'</div>';
        }
    }
}

/**
 * Gallerry Images
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_get_portfolio_gallery($layout = '') {
    global $haswell_base, $haswell_meta, $post;

    $port_media = isset($haswell_meta->_cms_single_portf_media) ? $haswell_meta->_cms_single_portf_media : '';
    $gallery = $haswell_base->getShortcodeFromContent('gallery', $port_media);
    if ($gallery) {
        preg_match('/\[gallery.*ids=.(.*).\]/', $gallery, $ids);
        if(!empty($ids)) {
            $array_id = explode(",", $ids[1]);
            switch ( $layout ) {
                case 'style1': /* Owl Carousel */
                    ?>
                        <div id="portfolio-<?php echo uniqid(); ?>" class="fullwidth-slider cms-carousel-wrapper owl-images-wrap paging_inside">
                            <div class="cms-owl-carousel owl-carousel owl-theme owl-loaded owl-drag" data-loop="false" data-nav="true" data-pagination="true" data-per-view="1">
                                <?php foreach ($array_id as $image_id): ?>
                                    <?php
                                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                                    if($attachment_image[0] != ''):?>
                                        <div class="item">
                                            <img src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php
                    break;

                case 'style3': ?>
                        <div class="cms-popup-gallery wpb_single_image">
                            <?php foreach ($array_id as $image_id): $attachment_image = wp_get_attachment_image_src($image_id, 'full', false); ?>
                                <?php if($attachment_image[0] != ''):?>
                                    <div class="col-sm-3 col-xs-6 mb-20">
                                        <a href="<?php echo esc_url($attachment_image[0]);?>" class="lightbox">
                                            <div class="vc_single_image-wrapper vc_box_border_grey"><img src="<?php echo esc_url($attachment_image[0]);?>" alt="" /></div>
                                        </a>    
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php
                    break;
                default:
                    ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                        if($attachment_image[0] != ''):?>
                            <div class="mb-30 wpb_single_image">
                                <a href="<?php echo esc_url($attachment_image[0]);?>" class="cms-lightbox lightbox">
                                    <div class="vc_single_image-wrapper vc_box_border_grey"><img src="<?php echo esc_url($attachment_image[0]);?>" alt="" /></div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php
                    break;
            }
        }
    } elseif( has_post_thumbnail() ) {
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        ?>
            <div class="mb-30 wpb_single_image">
                <a href="<?php echo esc_url($image[0]);?>" class="cms-lightbox lightbox">
                    <div class="vc_single_image-wrapper vc_box_border_grey"><img src="<?php echo esc_url($image[0]);?>" alt="" /></div>
                </a>
            </div>
        <?php
    }

}

/**
 * Quote Text.
 * 
 * @author Fox
 * @since 1.0.0
 */
function haswell_archive_quote() {
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);
    
    if(!empty($blockquote[0])){
        echo ''.$blockquote[0].'';
        return true;
    } else {
        if(has_post_thumbnail()){
            the_post_thumbnail();
        }
        return false;
    }
}

/**
 * Build style
 * @author Fox
 * @since 1.0.0
 */

if(!function_exists('haswell_build_style')){
    function haswell_build_style($arr = array()) {
        $return = '';
        if(count($arr) > 0){
            $return = 'style="';
            $return .= implode(' ', $arr);
            $return .= '"';
        }
        return $return;
    }
}

/**
 * Max Charlength
 *
 * @author Fox
 * @since 1.0.0
 */
if (!function_exists('haswell_content_max_charlength')) {
    function haswell_content_max_charlength($excerpt, $charlength) {
        $charlength++;
        if (mb_strlen($excerpt) > $charlength) {
            $subex = mb_substr($excerpt, 0, $charlength - 5);
            $exwords = explode(' ', $subex);
            $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
            if ($excut < 0) {
                echo mb_substr($subex, 0, $excut);
            } else {
                echo $subex;
            }
            echo '';
        } else {
            echo $excerpt;
        }
    }
}

/**
 * Add custom class to body
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
add_filter( 'body_class', 'haswell_class_names' );
function haswell_class_names( $classes ) {
    global $smof_data, $haswell_meta;  
    // add 'class-name' to the $classes array
    if ($smof_data['menu_sticky']) {
        $classes[] = 'cms-header-sticky';    
    }
    if (!empty($haswell_meta->_cms_enable_header_fixed)) {
        $classes[] = 'sticky-from-page';
    }
    if (!empty($haswell_meta->_cms_page_title_padding_top)) {
        $classes[] = 'custom-padding-top';
    }
    if (empty($smof_data['menu_sticky_tablets'])) {
        $classes[] = 'un-sticky-tablets';
    }
    if (empty($smof_data['menu_sticky_mobile'])) {
        $classes[] = 'un-sticky-mobile';
    }
    if (!empty($haswell_meta->_cms_page_general_custom_class)) {
        $classes[] = $haswell_meta->_cms_page_general_custom_class;
    }

    if ( !empty($haswell_meta->_cms_one_page) ) {
        $classes[] = 'page-has-onepage';
    }

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

    if ($enable_topbar == 'block') {
        $classes[] = 'open-topbar';
    }

    if(isset($haswell_meta->_cms_header) && $haswell_meta->_cms_header){
        if(!empty($haswell_meta->_cms_header_layout)) {
            $smof_data['header_layout'] = $haswell_meta->_cms_header_layout;
        }
        else {
            $smof_data['header_layout'] = '';
        }
    }
    if ($smof_data['header_layout'] == 'side') {
        $classes[] = 'page-has-sidemenu';
    }
    if ($smof_data['header_layout'] == 'fullscreen') {
        $classes[] = 'page-has-fullscreenmenu';
    }
    if ($smof_data['header_layout'] == 'leftmenu') {
        $classes[] = 'page-has-leftmenu';
    }

    // return the $classes array
    return $classes;
}

/**
 * Get url form category Id
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
function haswell_get_category_url( $post_type ) {
    $link = '';
    $link = get_post_type_archive_link( $post_type);

    echo (!empty($link)) ? $link : '#';
}

/**
 * Appear faceboook app id for fb comments
 */
function haswell_appear_app_id() {
    global $smof_data;
    $app_id = '';
    $app_id = (!empty($smof_data['fb_app_id'])) ? intval($smof_data['fb_app_id']) : '1621007798158687';

    echo '<meta property="fb:app_id" content="'.$app_id.'" />';
}
add_action('wp_head', 'haswell_appear_app_id', 5);

/**
 * New excerpt length
 */
function haswell_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'haswell_custom_excerpt_length', 999 );

/**
 * Display Disqus comment for demo
 * 
 * @author Duong Tung
 * @since 1.0.0
 */
function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}