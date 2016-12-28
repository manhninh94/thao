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

<article id="post-<?php the_ID(); ?>" <?php post_class('cms-blog-item wow fadeIn pb-50 cms-single-blog clearfix'); ?>>
	<?php if (has_post_thumbnail() ) : ?>	
		<div class="entry-feature entry-feature-image mb-30">
			<?php the_post_thumbnail( 'full' ); ?>
		</div>
	<?php endif; ?>
	<header class="entry-header">
		<h3 class="entry-title">
    		<?php
	    		if(is_sticky()) {
	                echo "<i class='fa fa-thumb-tack'></i>";
	            }
	    	?>
    		<?php the_title(); ?>
	    </h3>
	</header>
	<div class="entry-meta mb-20">
		<?php haswell_archive_detail(); ?>
	</div>
	<div class="entry-content">
		<?php the_content();
    		wp_link_pages( array(
        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','wp_haswell') . '</span>',
        		'after'       => '</div>',
        		'link_before' => '<span class="page-numbers">',
        		'link_after'  => '</span>',
    		) );
		?>
	</div>
	<footer class="entry-footer">
	    <?php haswell_single_footer(); ?>
	</footer>
</article>
<!-- #post -->
