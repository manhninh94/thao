<?php
/**
 * Wp_Haswell functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

/**
 * Add global values.
 */
global $smof_data, $haswell_meta, $haswell_base;

$theme = wp_get_theme();
/* language. */
load_theme_textdomain('wp_haswell', get_template_directory().'/languages');

/* Dismiss vc update. */
if(function_exists('vc_set_as_theme')) vc_set_as_theme( true );

/* Add base functions */
require( get_template_directory() . '/inc/base.class.php' );

if(class_exists("HaswellBase")){
    $haswell_base = new HaswellBase();
}

/* Remove CMS Fancy box */
if (class_exists('CmssuperheroesCore')) {
	add_action('vc_after_init', 'cms_remove_some_element');
	function cms_remove_some_element(){
	 	vc_remove_element('cms_fancybox');
	}
}

/* Add ReduxFramework. */
if(!class_exists('ReduxFramework')){
    require( get_template_directory() . '/inc/ReduxCore/framework.php' );
}

/* Add theme options. */
require( get_template_directory() . '/inc/options/functions.php' );

/**
 * Add Custom Params
 */
function haswell_after_vc_params() {
	require( get_template_directory() . '/vc_params/vc_rows.php' );
    require( get_template_directory() . '/vc_params/vc_row_inner.php' );
    require( get_template_directory() . '/vc_params/vc_separator.php' );
    require( get_template_directory() . '/vc_params/vc_custom_heading.php' );
    require( get_template_directory() . '/vc_params/vc_tta_accordion.php' );
    require( get_template_directory() . '/vc_params/vc_tta_tabs.php' );
    require( get_template_directory() . '/vc_params/vc_toggle.php' );
    require( get_template_directory() . '/vc_params/vc_btn.php' );
    require( get_template_directory() . '/vc_params/vc_message.php' );
    require( get_template_directory() . '/vc_params/vc_images_carousel.php' );
    require( get_template_directory() . '/vc_params/vc_single_image.php' );
    require( get_template_directory() . '/vc_params/vc_video.php' );
    require( get_template_directory() . '/vc_params/vc_column.php' );
    require( get_template_directory() . '/vc_params/vc_column_inner.php' );
    require( get_template_directory() . '/vc_params/vc_gallery.php' );
    require( get_template_directory() . '/vc_params/cms_progressbar.php' );
    require( get_template_directory() . '/vc_params/cms_fancybox_single.php' );

    /*  Riquire font icon */
	require( get_template_directory() . '/inc/libs/font-icons/lineaicon.php' );
	require( get_template_directory() . '/inc/libs/font-icons/elegant.php' );
	require( get_template_directory() . '/inc/libs/font-icons/glyphicons.php' );
}
add_action('vc_after_init', 'haswell_after_vc_params');

/**
 * Add theme elements
 */
function haswell_vc_elements() {
	if(class_exists('CmsShortCode')){
	    require( get_template_directory(). '/inc/elements/googlemap/cms_googlemap.php' );
	    require( get_template_directory(). '/inc/elements/dropcaps/cms_dropcaps.php' );
	    require( get_template_directory(). '/inc/elements/lightboxmap/cms_lightboxmap.php' );
	    require( get_template_directory(). '/inc/elements/countdown/cms_countdown.php' );
	    require( get_template_directory(). '/inc/elements/latest_news/cms_latest_news.php' );
	    require( get_template_directory(). '/inc/elements/wc_category/wc_category.php' );
	    require( get_template_directory(). '/inc/elements/contact_info/cms_contact_info.php' );
	    require( get_template_directory(). '/inc/elements/landing_item/cms_landing_item.php' );       
    }
}
add_action('vc_before_init', 'haswell_vc_elements');

/* Add Quote Editer */
require( get_template_directory() . '/inc/tinymce/button.php' );

/* Add SCSS */
if(!class_exists('scssc')){
    require( get_template_directory() . '/inc/libs/scss.inc.php' );
}

/* Woo commerce function */
if(class_exists('Woocommerce')){
    require get_template_directory() . '/woocommerce/wc-template-hooks.php';
    require get_template_directory() . '/woocommerce/wc-function-hooks.php';
}

/* Add Meta Core Options */
if(is_admin()){
    
    if(!class_exists('CsCoreControl')){
        /* add mete core */
        require( get_template_directory() . '/inc/metacore/core.options.php' );
        /* add meta options */
        require( get_template_directory() . '/inc/options/meta.options.php' );
    }
    
    /* tmp plugins. */
    require( get_template_directory() . '/inc/options/require.plugins.php' );
}

/* Add Template functions */
require( get_template_directory() . '/inc/template.functions.php' );

/* Static css. */
require( get_template_directory() . '/inc/dynamic/static.css.php' );

/* Dynamic css*/
require( get_template_directory() . '/inc/dynamic/dynamic.css.php' );

/* Add mega menu */
if(!class_exists('HeroMenuWalker') && (isset($smof_data['menu_mega']) && $smof_data['menu_mega'] == 1)) {
    require( get_template_directory() . '/inc/megamenu/mega-menu.php' );
}

/* Add widgets */
require( get_template_directory() . '/inc/widgets/cart_search.php' );
require( get_template_directory() . '/inc/widgets/news_tabs.php' );
require( get_template_directory() . '/inc/widgets/cms-recentposts.php' );
require( get_template_directory() . '/inc/widgets/cms-social.php' );
require( get_template_directory() . '/inc/widgets/flickrphotos.php' );
//require( get_template_directory() . '/inc/widgets/instagram.php' );
require( get_template_directory() . '/inc/widgets/tweets.php' );
//require( get_template_directory() . '/inc/widgets/lists-magazine.php' );

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * CMS Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * CMS Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 1.0.0
 */
function haswell_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'wp_haswell' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp_haswell', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds title tag
	add_theme_support( "title-tag" );
	
	// Add woocommerce
	add_theme_support('woocommerce');
	
	// Adds custom header
	add_theme_support( 'custom-header' );
	
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'video', 'audio' , 'gallery', 'link') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'wp_haswell' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size('blog-thumb', 650);
	add_image_size('blog-slider', 844, 475, true);
	add_image_size('portfolio-wide', 650, 415, true);
	add_image_size('portfolio-square', 480, 480, true);
	add_image_size('team', 336, 376, true);
	add_image_size('team-square', 500, 500, true);
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}


add_action( 'after_setup_theme', 'haswell_setup' );

/**
 * Get meta data.
 * @author Fox
 * @return mixed|NULL
 */
function haswell_meta_data(){
    global $post, $haswell_meta;
    
    if(!isset($post->ID)) return ;
    
    $haswell_meta = json_decode(get_post_meta($post->ID, '_cms_meta_data', true));
    
    if(empty($haswell_meta)) return ;
    
    foreach ($haswell_meta as $key => $meta){
        $haswell_meta->$key = rawurldecode($meta);
    }
}
add_action('wp', 'haswell_meta_data');

/**
 * Get post meta data.
 * @author Fox
 * @return mixed|NULL
 */
function haswell_post_meta_data($post_id = null){
    global $post;
    
    if(!$post_id){
    	if(isset($post->ID)){
    		$post_id=$post->ID;
    	}else{
    		return null;
    	}
    }
    
    $post_meta = json_decode(get_post_meta($post_id, '_cms_meta_data', true));
    
    if(empty($post_meta)) return null;
    
    foreach ($post_meta as $key => $meta){
        $post_meta->$key = rawurldecode($meta);
    }
    
    return $post_meta;
}

/**
 * Enqueue scripts and styles for front-end.
 * @author Fox
 * @since CMS SuperHeroes 1.0
 */
function haswell_scripts_styles() {
    
	global $smof_data, $wp_styles, $haswell_meta, $is_IE;
	$header_fixed = (is_page() && !empty($haswell_meta->_cms_enable_header_fixed)) ? $haswell_meta->_cms_enable_header_fixed : $smof_data['menu_sticky'];
	/** theme options. */
	$script_options = array(
	    'menu_sticky'=> $header_fixed,
	    'menu_sticky_tablets'=> $smof_data['menu_sticky_tablets'],
	    'menu_sticky_mobile'=> $smof_data['menu_sticky_mobile'],
	    'paralax' => 1,
	    'back_to_top'=> $smof_data['footer_botton_back_to_top'],
	    'headder_height_normal' => intval($smof_data['header_height']['height']),
	    'headder_height_sticky' => intval($smof_data['menu_sticky_height']['height']),
	);

	/*------------------------------------- JavaScript ---------------------------------------*/


	/** --------------------------libs--------------------------------- */


	/* Adds JavaScript Bootstrap. */
	wp_enqueue_script('cmssuperheroes-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '3.3.2');

	/* Add parallax plugin. */
	wp_enqueue_script('cmssuperheroes-parallax', get_template_directory_uri() . '/assets/js/jquery.parallax-1.1.3.js', array( 'jquery' ), '1.1.3', true);

	/* Add smoothscroll plugin */
	if($smof_data['smoothscroll']){
	   wp_enqueue_script('cmssuperheroes-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.min.js', array( 'jquery' ), '1.0.0', true);
	}

	/* Add One Page plugin. */
	if(is_page() && isset($haswell_meta->_cms_one_page) && $haswell_meta->_cms_one_page){
	    wp_enqueue_script('jquery.singlePageNav', get_template_directory_uri() . '/assets/js/jquery.singlePageNav.js', array( 'jquery' ), '1.0.0', true);

	    if(!empty($haswell_meta->_cms_one_page_easing)){
	        wp_enqueue_script('jquery-effects-core');
	        $script_options['one_page_easing'] = !empty($haswell_meta->_cms_one_page_easing) ? $haswell_meta->_cms_one_page_easing : 'swing';
	    }

	    $script_options['one_page'] = true;
	    $script_options['one_page_speed'] = !empty($haswell_meta->_cms_one_page_speed) ? $haswell_meta->_cms_one_page_speed : 1000;
	}

	wp_enqueue_script('cms-wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.1.2', true);
	wp_enqueue_script('cms-mousewheel', get_template_directory_uri() . '/assets/js/jquery.mousewheel.min.js', array( 'jquery' ), '3.1.13', true);
	wp_enqueue_script('cms-placeholders', get_template_directory_uri() . '/assets/js/placeholders.min.js', array( 'jquery' ), '4.0.1', true);
	wp_enqueue_script('text-rotator', get_template_directory_uri() . '/assets/js/jquery.simple-text-rotator.min.js', array( 'jquery' ), '1.0.0', true);

	if ( !wp_script_is('', 'owl-carousel')) {
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '2.0.0', true);
	}
	wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/jquery.imagesloaded.js', array('jquery'));
	
	wp_enqueue_script('cmssuperheroes-magnific', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array( 'jquery' ), '2.0.0', true);
	wp_enqueue_script('cmssuperheroes-appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array( 'jquery' ), '1.0.0', true);
	wp_enqueue_script('cmssuperheroes-fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true);
	wp_enqueue_script('cmssuperheroes-equalheights', get_template_directory_uri() . '/assets/js/jquery.equalheights.js', array( 'jquery' ), '1.5.1', true);

	/** --------------------------custom------------------------------- */

	/* Add main.js */
	wp_register_script('cmssuperheroes-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '1.0.0', true);
	wp_localize_script('cmssuperheroes-main', 'CMSOptions', $script_options);
	wp_enqueue_script('cmssuperheroes-main');
	/* Add menu.js */
    wp_enqueue_script('cmssuperheroes-menu', get_template_directory_uri() . '/assets/js/menu.js', array( 'jquery' ), '1.0.0', true);
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

    /*------------------------------------- Stylesheet ---------------------------------------*/

	/** --------------------------libs--------------------------------- */

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('cmssuperheroes-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');

	/* Loads Bootstrap stylesheet. */
	wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');

	/** --------------------------custom------------------------------- */

	/* Loads our main stylesheet. */
	wp_enqueue_style( 'cmssuperheroes-style', get_stylesheet_uri(), array( 'cmssuperheroes-bootstrap' ));

	/* Loads the Internet Explorer specific stylesheet. */
	//wp_enqueue_style( 'wp_haswell-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'cmssuperheroes-style' ), '20121010' );
 //$wp_styles->add_data( 'wp_haswell-ie', 'conditional', 'lt IE 9' );

	if($is_IE){
		wp_enqueue_style( 'wp_haswell-ie', get_template_directory_uri() . '/assets/css/ie.css', array( 'cmssuperheroes-style' ), '20121010' );
 
	}
	/* WooCommerce */
	if(class_exists('WooCommerce')){
	    wp_enqueue_style( 'woocommerce', get_template_directory_uri() . "/assets/css/woocommerce.css", array(), '1.0.0');
	}

	wp_enqueue_style('cmssuperheroes-owl', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.0.0');
	wp_enqueue_style('cmssuperheroes-owl', get_template_directory_uri() . '/assets/css/owl.theme.default.css', array(), '2.0.0');

	/* Load icon font*/
	wp_enqueue_style('cmssuperheroes-icon-font', get_template_directory_uri() . '/assets/css/icons-fonts.css', array( 'cmssuperheroes-style' ), '1.0.0');

	/* Load animate */
	wp_enqueue_style('cmssuperheroes-animate', get_template_directory_uri() . '/assets/css/animate.min.css', array( 'cmssuperheroes-style' ), '1.0.0');
	
	/* Load static css*/
	wp_enqueue_style('cmssuperheroes-static', get_template_directory_uri() . '/assets/css/static.css', array( 'cmssuperheroes-style' ), '1.0.0');
}
global $pagenow;
add_action( 'wp_enqueue_scripts', 'haswell_scripts_styles' );

if($pagenow == 'post.php' || $pagenow == 'post-new.php'){
	add_action('admin_enqueue_scripts', 'haswell_admin_scripts');
}

function haswell_admin_scripts() {
	wp_enqueue_style('cmssuperheroes-admin-icon-font', get_template_directory_uri() . '/assets/css/icons-fonts.css', array(), '1.0.0');
}

function haswell_admin_load_css() {
	wp_enqueue_style('cms-admin-css', get_template_directory_uri() . '/assets/css/cms_admin_css.css', array(), '1.0.0');
}
add_action('admin_enqueue_scripts', 'haswell_admin_load_css');

/**
 * Load ajax url.
 */
function haswell_ajax_url_head() {
    echo '<script type="text/javascript"> var ajaxurl = "'.admin_url('admin-ajax.php').'"; </script>';
}
add_action( 'wp_head', 'haswell_ajax_url_head');

/**
 * Add field subtitle to post.
 * 
 * @since 1.0.0
 */
function haswell_add_subtitle_field(){
    global $post, $haswell_meta;
    
    /* get current_screen. */
    $screen = get_current_screen();
    
    /* show field in post. */
    if(in_array($screen->id, array('post'))){
        
        /* get value. */
        $value = get_post_meta($post->ID, 'post_subtitle', true);
        
        /* html. */
        echo '<div class="subtitle"><input type="text" name="post_subtitle" value="'.esc_attr($value).'" id="subtitle" placeholder = "'.__('Subtitle - suitable for category is Construction or Cars', 'cms-theme-framework').'" style="width: 100%;margin-top: 4px;"></div>';
    }
}
add_action( 'edit_form_after_title', 'haswell_add_subtitle_field' );

/**
 * Save custom theme meta. 
 * 
 * @since 1.0.0
 */
function haswell_save_meta_boxes($post_id) {
    
    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    /* update field subtitle */
    if(isset($_POST['post_subtitle'])){
        update_post_meta($post_id, 'post_subtitle', $_POST['post_subtitle']);
    }
}

add_action('save_post', 'haswell_save_meta_boxes');

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Fox
 */
function haswell_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'wp_haswell' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Topbar Left Sidebar', 'wp_haswell' ),
		'id' => 'topbar-left-sidebar',
		'description' => __( '', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Topbar Right Sidebar', 'wp_haswell' ),  
		'id' => 'topbar-right-sidebar',
		'description' => __( '', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Left Sidebar', 'wp_haswell' ),
		'id' => 'left-sidebar',
		'description' => __( '', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'wp_haswell' ),
		'id' => 'right-sidebar',
		'description' => __( '', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'SideMenu Area', 'wp_haswell' ),
		'id' => 'sidemenu-area',
		'description' => __( 'Only appear for custom header is side-menu', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Full Screen Menu Area', 'wp_haswell' ),
		'id' => 'fullscreen-menu-area',
		'description' => __( 'Only appear for custom header is fullscreen-menu', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Left Menu Area', 'wp_haswell' ),
		'id' => 'left-menu-area',
		'description' => __( 'Only appear for custom header is left-menu', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Magazine Widget Area', 'wp_haswell' ),
		'id' => 'magazine-area',
		'description' => __( 'Only appear for magazine page', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Shortcodes Sidebar', 'wp_amilia' ),
		'id' => 'shortcodes-sidebar',
		'description' => __( '', 'wp_amilia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Typography Sidebar', 'wp_amilia' ),
		'id' => 'typography-sidebar',
		'description' => __( '', 'wp_amilia' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	if(class_exists('WooCommerce')) {
		register_sidebar( array(
			'name' => __( 'Woocommerce Sidebar', 'wp_haswell' ),
			'id' => 'woocommerce_sidebar',
			'description' => __( '', 'wp_haswell' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="wg-title">',
			'after_title' => '</h3>',
		) );
	}

	register_sidebar( array(
		'name' => __( 'Top Cart Search', 'wp_haswell' ),
		'id' => 'cart-search-top',
		'description' => __( '', 'wp_haswell' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="wg-title">',
		'after_title' => '</h3>',
	) );
	
	/*register_sidebar( array(
    	'name' => __( 'Menu Right', 'wp_haswell' ),
    	'id' => 'sidebar-4',
    	'description' => __( 'Appears when using the optional Menu with a page set as Menu right', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );*/

	register_sidebar( array(
    	'name' => __( 'Newsletter Area', 'wp_haswell' ),
    	'id' => 'bottom-area',
    	'description' => __( 'Appears when using the optional Bottom with a page set as Bottom Area', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => __( 'Newsletter In Row', 'wp_haswell' ),
    	'id' => 'newsletter-inrow',
    	'description' => __( 'Appears when using the optional Bottom with a page set as Bottom Area', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	/* For Footer 1 */
	register_sidebar( array(
    	'name' => __( 'Footer 1: Row 1', 'wp_haswell' ),
    	'id' => 'footer_1_1',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => __( 'Footer 1: Row 2', 'wp_haswell' ),
    	'id' => 'footer_1_2',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	/* For Footer 2 */
	register_sidebar( array(
    	'name' => __( 'Footer 2: Column 1', 'wp_haswell' ),
    	'id' => 'sidebar-5',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 2: Column 2', 'wp_haswell' ),
    	'id' => 'sidebar-6',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 2: Column 3', 'wp_haswell' ),
    	'id' => 'sidebar-7',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 2: Column 4', 'wp_haswell' ),
    	'id' => 'sidebar-8',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	/* For Footer 3 */
	register_sidebar( array(
    	'name' => __( 'Footer 3: Column 1', 'wp_haswell' ),
    	'id' => 'footer3-col1',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 3: Column 2', 'wp_haswell' ),
    	'id' => 'footer3-col2',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 3: Column 3', 'wp_haswell' ),
    	'id' => 'footer3-col3',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => __( 'Footer 3: Column 4', 'wp_haswell' ),
    	'id' => 'footer3-col4',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	/* For Footer 4 */
	register_sidebar( array(
    	'name' => __( 'Footer 4: Column 1', 'wp_haswell' ),
    	'id' => 'footer4-col1',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 4: Column 2', 'wp_haswell' ),
    	'id' => 'footer4-col2',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer 4: Column 3', 'wp_haswell' ),
    	'id' => 'footer4-col3',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );

	register_sidebar( array(
    	'name' => __( 'Footer 4: Column 4', 'wp_haswell' ),
    	'id' => 'footer4-col4',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer Bottom Left', 'wp_haswell' ),
    	'id' => 'sidebar-9',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
    	'name' => __( 'Footer Bottom Right', 'wp_haswell' ),
    	'id' => 'sidebar-10',
    	'description' => __( '', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
	register_sidebar( array(
    	'name' => __( 'Menu Widget Area', 'wp_haswell' ),
    	'id' => 'sidebar-11',
    	'description' => __( 'Suitable with text widget', 'wp_haswell' ),
    	'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    	'after_widget' => '</aside>',
    	'before_title' => '<h3 class="wg-title">',
    	'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'haswell_widgets_init' );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since 1.0.0
 */
function haswell_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'haswell_page_menu_args' );

/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since 1.0.0
 */
function haswell_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'wp_haswell' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'wp_haswell' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'wp_haswell' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since 1.0.0
 */
function haswell_paging_nav() {
    // Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'wp_haswell' ),
			'next_text' => __( '<i class="fa fa-angle-right"></i>', 'wp_haswell' ),
	) );

	if ( $links ) :

	?>
	<nav class="navigation blog-pag clearfix">
		<div class="pagination loop-pagination m-0">
			<?php echo ''.$links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
	<?php
	endif;
}

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function haswell_post_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
			  <a class="post-prev pull-left" href="<?php echo get_permalink( $prev_post->ID ); ?>"><i class="icon icon-arrows-left"></i><?php _e('Prev', 'wp_haswell'); ?></a>
			<?php endif; ?>

			<a class="work-all" href="<?php esc_url(haswell_get_category_url('post')); ?>"><?php _e('All Posts', 'wp_haswell') ?></a>

			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
			  <a class="post-next pull-right" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php _e('Next', 'wp_haswell') ?><i class="icon icon-arrows-right"></i></a>
			<?php } ?>
			</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/**
 * Ajax post like.
 *
 * @since 1.0.0
 */
function haswell_post_like_callback(){
    global $smof_data;

    $post_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

    $likes = null;

    if($post_id && !isset($_COOKIE['cms_post_like_'. $post_id])){

        /* get old like. */
        $likes = get_post_meta($post_id , '_cms_post_likes', true);

        /* check old like. */
        $likes = $likes ? $likes : 0 ;

        $likes++;

        /* update */
        update_post_meta($post_id, '_cms_post_likes' , $likes);

        /* set cookie. */
        setcookie('cms_post_like_'. $post_id, $post_id, time() * 20, '/');
    }

    echo esc_attr($likes);

    exit();
}

add_action('wp_ajax_cms_post_like', 'haswell_post_like_callback');
add_action('wp_ajax_nopriv_cms_post_like', 'haswell_post_like_callback');

/**
* Display navigation to next/previous post when applicable.
*
* @since 1.0.0
*/
function haswell_portfolio_nav() {
    global $post;

    // Don't print empty markup if there's nowhere to navigate.
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links clearfix">
			<?php
			$prev_post = get_previous_post(); $prev_link = (!empty( $prev_post )) ? $prev_post->ID : '#'; ?>
			<a class="post-prev pull-left" href="<?php echo get_permalink( $prev_link ); ?>"><i class=""></i>
			  	<i class="icon <?php echo (!empty( $prev_post )) ? 'icon-arrows-left' : '' ?>"></i><?php echo (!empty( $prev_post )) ? __('Prev', 'wp_haswell') : '';?>
			</a>
			<a class="work-all" href="<?php esc_url(haswell_get_category_url('portfolio')); ?>"><i class="icon icon-arrows-squares"></i></a>

			<?php
			$next_post = get_next_post();
			if ( is_a( $next_post , 'WP_Post' ) ) { ?>
			  <a class="post-next pull-right" href="<?php echo get_permalink( $next_post->ID ); ?>"><?php _e('Next', 'wp_haswell') ?><i class="icon icon-arrows-right"></i></a>
			<?php } ?>
			</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}

/* Add Custom Comment */
function haswell_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ). 'clearfix' ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
    <?php endif; ?>
    <div class="comment-author-image vcard pull-left">
    	<?php echo get_avatar( $comment, 90 ); ?>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
    	<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' , 'wp_haswell'); ?></em>
    <?php endif; ?>
    <div class="comment-main">
    	<div class="comment-content">
    		<div class="comment-meta commentmetadata">
	    		<span class="comment-author"><?php echo get_comment_author_link(); ?></span>
	    		<span class="comment-date">
	    		<?php
	    			echo comment_time('M d, Y, \a\t g:i');
	    		?>
	    		</span>
	    		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    	</div>

    		<div class="comment-text"><?php comment_text(); ?></div>
    	</div>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
}

/**
 * 
 */
function haswell_new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'haswell_new_excerpt_more');

/**
 * limit words
 * 
 * @since 1.0.0
 */
if (!function_exists('haswell_limit_words')) {
    function haswell_limit_words($string, $word_limit) {
        $words = explode(' ', $string, ($word_limit + 1));
        if (count($words) > $word_limit) {
            array_pop($words);
        }
        return implode(' ', $words)."";
    }
}

/**
 * Cms Animation lib
 */
function haswell_animate_lib() {
	$animate = array(
		__( 'None', 'js_composer' ) => 'cms_animate',
        __( 'FadeIn', 'js_composer' ) => 'cms_animate fadeIn wow',
        __( 'FadeOut', 'js_composer' ) => 'cms_animate fadeOut wow',
        __( 'FadeInUp', 'js_composer' ) => 'cms_animate wow fadeInUp',
        __( 'FadeInDown', 'js_composer' ) => 'cms_animate wow fadeInDown',
        __( 'FadeInLeft', 'js_composer' ) => 'cms_animate wow fadeInLeft',
        __( 'FadeInRight', 'js_composer' ) => 'cms_animate wow fadeInRight',
	);

	return $animate;
}

/**
 * Cms get Category for VC query
 * @return array
 */
function haswell_get_category() {
	$cms_categories = array();  

	$cms_categories_obj = get_categories($agrs = array('hide_empty' => 0, 'orderby' => 'ID', 'order' => 'ASC'));
	foreach ($cms_categories_obj as $of_cat) {
	    $cms_categories[$of_cat->cat_ID] = $of_cat->cat_name;
    }
    return $cms_categories;
}

/**
 * replace css to pass validate w3c
 *
 */
function haswellValidateStylesheet($src) {
	if(strstr($src,'font-awesome-css')|| strstr($src,'bootstrap-progressbar-css') || strstr($src,'mediaelement-css') || strstr($src,'wp-mediaelement-css') ){
		return str_replace('rel', 'property="stylesheet" rel', $src);
	}
	else{
		return $src;
	}
}
add_filter('style_loader_tag', 'haswellValidateStylesheet');