<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
get_header();
global $smof_data;
$primary_colum = $secord_col = '';
$tracking_layout = (!empty( $smof_data['single_layout'] )) ? $smof_data['single_layout'] : 'right-sidebar';
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
            <div class="col-sm-4 col-md-3">
                <?php get_sidebar(); ?>
            </div>
        <?php endif; ?>
        <div id="primary" <?php post_class($primary_colum); ?>>
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'single-templates/single/content', get_post_format() ); ?>

                    <div class="entry-author-wrap clearfix mb-50">
                        <div class="author-avatar-wrap">
                            <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                        </div>
                        <div class="author-info">
                            <div class="author-name">
                                <?php echo get_the_author(); ?>
                            </div>
                            <div class="author-bio">
                                <?php echo get_the_author_meta('description'); ?>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-0 mb-0">
                    <div class="entry-navigation clearfix">
                        <?php haswell_post_nav(); ?>    
                    </div>

                    <?php
                    /* Related post */
                    get_template_part( 'single-templates/single/related'); ?>
                    
                    <?php if ( comments_open() ) : ?>
                        <?php if ( !empty($smof_data['comments_post_type']) && $smof_data['comments_post_type'] == 'facebook' ) : ?>
                            <div id="fbcomments"><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php the_permalink(); ?>" width="100%"></fb:comments></div>
                        <?php elseif (!empty($smof_data['comments_post_type']) && $smof_data['comments_post_type'] == 'default') : ?>
                            <hr class="mt-0 mb-0">
                            <?php comments_template( '', true ); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->

        <?php if ($tracking_layout == 'right-sidebar' ): ?>
            <div class="col-sm-4 col-md-3 col-md-offset-1">
                <?php get_sidebar(); ?>
            </div>
        <?php endif ?>
    </div>
</div>
<?php get_footer(); ?>