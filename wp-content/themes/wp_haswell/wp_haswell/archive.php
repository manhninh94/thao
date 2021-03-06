<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, CMS Theme already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
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
<div class="container">
    <div class="row">
        <?php if ($tracking_layout == 'left-sidebar' ): ?>
        <div class="<?php echo esc_attr($secord_col); ?>">
            <?php get_sidebar(); ?>
        </div>    
        <?php endif ?>
        <section id="primary" class="<?php echo esc_attr($primary_colum); ?>">
            <div id="content" role="main">

            <?php if ( have_posts() ) : ?>
            
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();

                    /* Include the post format-specific template for the content. If you want to
                     * this in a child theme then include a file called called content-___.php
                     * (where ___ is the post format) and that will be used instead.
                     */
                    get_template_part( 'single-templates/content/content', get_post_format() );

                endwhile;

                haswell_paging_nav();
                ?>

            <?php else : ?>
                <?php get_template_part( 'single-templates/content', 'none' ); ?>
            <?php endif; ?>

            </div><!-- #content -->
        </section><!-- #primary -->
        <?php if ($tracking_layout == 'right-sidebar' ): ?>
        <div class="<?php echo esc_attr($secord_col); ?>">
            <?php get_sidebar(); ?>
        </div>    
        <?php endif ?>
    </div>
</div>
<?php get_footer(); ?>