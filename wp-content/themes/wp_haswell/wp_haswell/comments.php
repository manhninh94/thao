<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package cshero
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php // You can start editing here -- including this comment! ?>
	<?php if ( have_comments() ) : ?>
		<div class="clearfix mt-40">
	        <div class="comments-wrap clearfix">
	            <h4 class="comments-title blog-page-title mb-15">
	                <?php //comments_number(__('COMMENTS <small>1</small>','wp_haswell'),__('COMMENTS <small>0</small>','wp_haswell'),__('COMMENTS <small>%</small>','wp_haswell')); ?>
	                <?php _e('COMMENTS', 'wp_haswell'); ?><small><?php comments_number(__('','wp_haswell'),__('1','wp_haswell'),__('%','wp_haswell')); ?></small>
	            </h4>
	            <ol class="comment-list">
					<?php wp_list_comments( 'type=comment&callback=haswell_comment' ); ?>
				</ol>
				<?php haswell_comment_nav(); ?>
	        </div>
        </div>
        <hr class="mt-30 mb-0 from-comment-form">
	<?php endif; // have_comments() ?>
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name__mail' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'title_reply'       => __( '<h4 class="related-post-heading blog-page-title mt-50 mb-25">LEAVE A COMMENT</h4>','wp_haswell'),
			'title_reply_to'    => __( 'Leave A Reply To %s','wp_haswell'),
			'cancel_reply_link' => __( 'Cancel Reply','wp_haswell'),
			'label_submit'      => __( 'Send Message','wp_haswell'),
			'comment_notes_before' => '',
			'comment_notes_after' => '',
			'fields' => apply_filters( 'comment_form_default_fields', array(

					'author' =>
					'<div class="col-md-6 mb-30">'.
					'<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.__('NAME','wp_haswell').'"/></div>',

					'email' =>
					'<div class="col-md-6 mb-30">'.
					'<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
					'" size="30"' . $aria_req . ' placeholder="'.__('EMAIL','wp_haswell').'"/></div>',
			)
			),
			'comment_field' =>  '<div class="col-md-12 mb-40"><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" placeholder="'.__('MESSAGE','wp_haswell').'" aria-required="true">' .
			'</textarea></div>',
	);
	comment_form($args);
	?>
</div><!-- #comments -->
