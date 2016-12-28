<?php
/**
 * The Template for displaying all single posts
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */

$portfolio_meta = haswell_post_meta_data();
$portfolio_single_layout = !empty($portfolio_meta->_cms_single_portfolio_style) ? $portfolio_meta->_cms_single_portfolio_style : 'style1';
get_header(); ?>
<div class="<?php haswell_main_class(); ?>">
    <div class="row">
        <div id="primary" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="content" role="main">

                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'single-templates/single/portfolio', $portfolio_single_layout); ?>
                    
                    <?php if ($portfolio_single_layout != 'style3') : ?>
                        <hr class="mt-0 mb-0">
                        <div class="work-navigation plr-10 clearfix">
                            <?php haswell_portfolio_nav(); ?>    
                        </div>
                    <?php endif; ?>

                    <?php the_content(); ?>

                    <div class="portfolio-related-wrap mt-80 mb-0">
                        <div class="container">
                            <h4 class="blog-page-title mt-0 mb-40"><?php _e('RELATED PROJECT', 'wp_haswell') ?></h3>
                            <?php $portfolio_category = '';
                            $terms = get_the_terms(get_the_ID(), 'category-portfolio');
                            if(!empty($terms)) {
                                
                                $portfolio_category = array();
                                
                                foreach ($terms as $term){
                                     $portfolio_category[] = $term->term_id;
                                }   
                                
                                $portfolio_category = '|tax_query:'.implode(',', $portfolio_category);
                            }?>  
                            <?php   
                                echo apply_filters('the_content','[cms_grid layout="masonry" col_xs="1" col_sm="2" col_md="2" col_lg="4" cms_portfolio_gutter="15px" source="size:4|order_by:date|post_type:portfolio|'.$portfolio_category.'" cms_template="cms_grid--portfolio-boxed.php"]');
                            ?>
                        </div>
                    </div>
                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
    </div>
</div>
<?php get_footer(); ?>