<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
get_header();
global $smof_data;
$primary_colum = $secord_col = '';
$tracking_layout = (!empty( $smof_data['blog_layout'] )) ? $smof_data['blog_layout'] : 'right-sidebar';
if ( !empty($tracking_layout) && $tracking_layout == 'full-width' ) {
    $primary_colum = 'col-sm-12';
} elseif ( !empty($tracking_layout) && $tracking_layout == 'left-sidebar' ) {
    $primary_colum = 'col-sm-8 col-md-offset-1';
    $secord_col = 'col-sm-4 col-md-3';
} else {
    $primary_colum = 'col-sm-8';
    $secord_col = 'col-sm-4 col-md-3 col-md-offset-1';
}
?>
    <div class="<?php haswell_main_class(); ?>">
        <div class="row">
            <?php if ($tracking_layout == 'left-sidebar' ): ?>
            <div class="<?php echo esc_attr($secord_col); ?>">
                <?php get_sidebar(); ?>
            </div>    
            <?php endif ?>
            <div id="primary" class="<?php echo esc_attr($primary_colum); ?>">
                <div id="content" role="main">
                    <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'single-templates/content/content', get_post_format() ); ?>
                        <?php endwhile; ?>
                        
                        <?php haswell_paging_nav(); ?>

                    <?php else : ?>

                        <article id="post-0" class="post no-results not-found">

                            <?php if ( current_user_can( 'edit_posts' ) ) :
                                // Show a different message to a logged-in user who can add posts.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'No posts to display', 'wp_haswell' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'wp_haswell' ), admin_url( 'post-new.php' ) ); ?></p>
                                </div><!-- .entry-content -->

                            <?php else :
                                // Show the default message to everyone else.
                                ?>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php _e( 'Nothing Found', 'wp_haswell' ); ?></h1>
                                </header>

                                <div class="entry-content">
                                    <p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'wp_haswell' ); ?></p>
                                    <?php get_search_form(); ?>
                                </div><!-- .entry-content -->
                            <?php endif; // end current_user_can() check ?>

                        </article><!-- #post-0 -->

                    <?php endif; // end have_posts() check ?>

                </div><!-- #content -->
            </div><!-- #primary -->
            <?php if ($tracking_layout == 'right-sidebar' ): ?>
            <div class="<?php echo esc_attr($secord_col); ?>">
                <?php get_sidebar(); ?>
            </div>    
            <?php endif ?>
        </div>
    </div>
<?php get_footer(); ?>