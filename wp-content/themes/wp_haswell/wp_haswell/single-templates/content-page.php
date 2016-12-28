<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package CMSSuperHeroes
 * @subpackage CMS Theme
 * @since 1.0.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
			<?php the_content(); ?>
	</div><!-- .entry-content -->
	<!--footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', 'wp_haswell' ), '<span class="edit-link">', '</span>' ); ?>
	</footer--><!-- .entry-meta -->
</div><!-- #post -->