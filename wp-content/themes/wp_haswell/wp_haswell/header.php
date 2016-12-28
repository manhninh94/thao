<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<?php global $smof_data; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="initial-scale=1, width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ): ?>
<link rel="icon" type="image/png" href="<?php echo esc_url($smof_data['favicon_icon']['url']); ?>"/>
<?php endif; ?>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Loaded Page -->
<!-- <div id="loader-overflow">
	<div id="loader3">Please enable JS</div>
</div> -->

<?php global $smof_data, $haswell_meta; ?>
<?php haswell_get_page_loading(); ?>
<div id="page" class="<?php haswell_page_class(); ?>">
	<?php haswell_header(); ?>

	<?php
		$page_general_padding = (isset($haswell_meta->_cms_page_general_padding)) ? $haswell_meta->_cms_page_general_padding : '';
	?>
	<?php do_action('haswell_before_show_menu'); ?>
    <?php haswell_page_title(); ?>
	<div id="main" class="<?php echo (empty($page_general_padding)) ? 'p-140-cont' : '' ?>">