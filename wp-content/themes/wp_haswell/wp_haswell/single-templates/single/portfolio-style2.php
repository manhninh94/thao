<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<?php
	$portfolio_meta = haswell_post_meta_data(); 
    /* get categories */
    $taxo = 'category-portfolio';
    $_category = array();
    if(!isset($atts['cat']) || $atts['cat']==''){
        $terms = get_terms($taxo);
        foreach ($terms as $cat){
            $_category[] = $cat->term_id;
        }
    } else {
        $_category  = explode(',', $atts['cat']);
    }
    $atts['categories'] = $_category;
    $client = !empty($portfolio_meta->_cms_single_portfolio_client) ? $portfolio_meta->_cms_single_portfolio_client : '';
    $online = !empty($portfolio_meta->_cms_single_portfolio_view_project) ? $portfolio_meta->_cms_single_portfolio_view_project : '';
    $desc = !empty($portfolio_meta->_cms_single_portfolio_project_description) ? $portfolio_meta->_cms_single_portfolio_project_description : '';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-portfolio container clearfix">

		<div class="entry-portfolio-wrapper row clearfix">
			<div class="col-sm-4 col-md-3">
				<div class="entry-port-info mb-30">
					<h4 class="blog-page-title mt-0 mb-20"><?php _e('PROJECT DETAIL', 'wp_haswell'); ?></h4>
					<div class="entry-port-info-inner">
						<?php if ($client) : ?>
							<p>
								<strong><?php _e('CLIENT:', 'wp_haswell'); ?></strong><?php echo esc_attr($client); ?>
							</p>
						<?php endif; ?>
						<p>
							<strong><?php _e('DATE:', 'wp_haswell'); ?></strong><?php echo get_the_date('d M, Y'); ?>
						</p>
						<p>
							<strong><?php _e('CATEGORY:', 'wp_haswell'); ?></strong>
							<?php echo get_the_term_list( get_the_ID(), $taxo, '', ', ', '' ); ?>
						</p>
						<?php if ($online) : ?>
							<p>
								<strong><?php _e('ONLINE:', 'wp_haswell'); ?></strong>
								<a target="_blank" href="<?php echo esc_url($online); ?>"><?php echo esc_attr($online); ?></a>
							</p>
						<?php endif; ?>
					</div>
				</div>
				<div class="mb-50">
					<?php echo esc_attr($desc); ?>
				</div>
			</div>
			<!-- .entry-header -->
			<div class="col-sm-8 col-md-offset-1 mb-80">
				<?php haswell_get_portfolio_gallery('style2') ?>
			</div>
		</div>
		
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
