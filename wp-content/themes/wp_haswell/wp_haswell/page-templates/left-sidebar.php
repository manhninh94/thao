<?php
/**
 * Template Name: Left Sidebar
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 * @author Fox
 */

get_header();
$cms_sidebar = '';
$cms_sidebar = (isset($_GET['sidebar']) && $_GET['sidebar']== 'left-sidebar2') ? $_GET['sidebar'] : '';
?>
<div id="page-left-sidebar" class="page-has-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <?php
                    if ( !empty($cms_sidebar) && $cms_sidebar == 'left-sidebar2') {
                        dynamic_sidebar( $cms_sidebar );
                    }
                    elseif ( is_active_sidebar( 'left-sidebar' ) ) {
                        dynamic_sidebar( 'left-sidebar' );
                    }
                    else {
                        get_sidebar();
                    }
                ?>
            </div>
            <div id="primary" class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div id="content" role="main">

                   <?php
                        // Start the loop.
                        while ( have_posts() ) : the_post();

                            // Include the page content template.
                            get_template_part( 'single-templates/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        // End the loop.
                        endwhile;
                        ?>

                </div><!-- #content -->
            </div><!-- #primary -->
        </div><!-- #primary -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>