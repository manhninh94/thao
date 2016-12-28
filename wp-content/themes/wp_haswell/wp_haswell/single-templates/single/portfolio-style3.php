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
	global $haswell_meta, $haswell_base;
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
			</div>
			<!-- .entry-header -->
			<div class="col-sm-8 col-md-offset-1">
				<?php
					if (has_post_thumbnail()) { 
							$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
						?>
						<div class="mb-30 cms-popup-gallery wpb_single_image">
                            <a href="<?php echo esc_url($url);?>" class="lightbox">
                                <div class="vc_single_image-wrapper vc_box_border_grey"><img src="<?php echo esc_url($url);?>" alt="" /></div>
                            </a>
                        </div>
					<?php }
				?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row mt-30 mb-60 ">
			<div class="popup-gallery">
				<?php haswell_get_portfolio_gallery('style3') ?>
			</div>
		</div>
	</div>
	<hr class="mt-0 mb-0">
	<div class="container">
		<div class="row p-80-cont">
			<div class="col-md-12">
				<h4 class="blog-page-title mt-0 mb-20"><?php _e('PROJECT DESCRIPTION', 'wp_haswell'); ?></h4>
            </div>
            <?php
            	$text_desc = array();
            	$text_desc = explode('<br />', $desc);
            	if (count($text_desc)) {
            		echo '<div class="col-md-6">';
            		foreach ($text_desc as $key => $value) {
            			if ( $key > 0 && ($key+1)%2 == 0 ) {
            				echo '</div><div class="col-md-6">';
            			}
            			echo esc_attr($value);
            		}
            		echo '</div>';
            	}
            ?>
		</div>
	</div>
	<?php
		$port_media = isset($haswell_meta->_cms_single_portf_media) ? $haswell_meta->_cms_single_portf_media : '';
    	$gallery = $haswell_base->getShortcodeFromContent('gallery', $port_media);
    	if ($gallery) {
	        preg_match('/\[gallery.*ids=.(.*).\]/', $gallery, $ids);
	        if(!empty($ids)) {
	            $array_id = explode(",", $ids[1]);
	        ?>
	        	<div class="container mb-140">
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
				</div>
	        <?php
	        }
	    }
	?>
				

	<!-- .entry-blog -->
</article>
<!-- #post -->