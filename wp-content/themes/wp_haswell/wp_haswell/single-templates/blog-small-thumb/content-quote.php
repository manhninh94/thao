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

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 cms-blog-item wow fadeIn pb-70 clearfix'); ?>>
	<div class="entry-blog">
		<div class="entry-header">
			<div class="entry-date">
				<div class="arow-date"></div>
				<span><?php echo get_the_date("F d,Y"); ?></span>
			</div>
		    <h2 class="entry-title">
		    	<a href="<?php the_permalink(); ?>">
		    		<?php
			    		if(is_sticky()){
			                echo "<i class='fa fa-thumb-tack'></i>";
			            }
			    	?>
		    		<?php the_title(); ?>
		    	</a>
		    </h2>
		    <div class="entry-feature entry-quote"><?php haswell_archive_quote(); ?></div>
			<div class="entry-meta"><?php haswell_archive_detail(); ?></div>
		</div>
		<!-- .entry-header -->

		<div class="entry-content">
		    <?php echo apply_filters('get_the_excerpt', preg_match('/<blockquote>(.*)<\/blockquote>/', '', get_the_content()));
	    		wp_link_pages( array(
	        		'before'      => '<div class="pagination loop-pagination"><span class="page-links-title">' . __( 'Pages:','wp_haswell') . '</span>',
	        		'after'       => '</div>',
	        		'link_before' => '<span class="page-numbers">',
	        		'link_after'  => '</span>',
	    		) );
			?>
		</div>
		<!-- .entry-content -->

		<footer class="entry-footer">
		    <?php haswell_archive_readmore(); ?>
		    <!-- .readmore link -->
		</footer>
		<!-- .entry-footer -->
	</div>
	<!-- .entry-blog -->
</article>
<!-- #post -->
