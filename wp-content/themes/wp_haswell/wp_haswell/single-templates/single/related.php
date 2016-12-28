<?php
$orig_post = $post;  
global $post;  
$tags = wp_get_post_tags($post->ID);  

if ($tags) {
    $tag_ids = array();  
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;  
    $args = array(  
        'tag__in' => $tag_ids,  
        'post__not_in' => array($post->ID),  
        'posts_per_page'=>3, // Number of related posts to display.  
        'ignore_sticky_posts'=>1  
    );

    $related_posts = new WP_Query($args);
    if ($related_posts->have_posts()) { ?>
		<hr class="mt-0 mb-0">
        <h4 class="related-post-heading blog-page-title mt-50 mb-25"><?php _e('RELATED POSTS', 'wp_haswell'); ?></h4>
        <div class="row related-posts">
        
    	<?php while( $related_posts->have_posts() ) {
	    	$related_posts->the_post();   
	    	?>
	    		<article id="related-post-<?php the_ID(); ?>" <?php post_class('cms-blog-item col-sm-12 col-md-4 col-lg-4 wow fadeIn pb-50'); ?>>
					<?php if(has_post_thumbnail()) : ?>
						<div class="entry-feature entry-feature-image mb-15">
							<?php the_post_thumbnail( 'portfolio-wide' ); ?>
						</div>
						<header class="entry-header">
							<h3 class="entry-title">
						    	<a href="<?php the_permalink(); ?>">
						    		<?php the_title(); ?>
						    	</a>
						    </h3>
						</header>
						<div class="entry-meta">
							<ul>
						        <li class="entry-date">
						            <span><?php echo get_the_date('F d') ?></span>
						        </li>
						        <li class="entry-author">
						            <?php the_author_posts_link(); ?>
						        </li>
						   	</ul>
						</div>
					<?php endif; ?>
				</article><!-- #post-## -->
	    	<?php
		}
		echo '</div>';
    }  
}
$post = $orig_post;
wp_reset_postdata();