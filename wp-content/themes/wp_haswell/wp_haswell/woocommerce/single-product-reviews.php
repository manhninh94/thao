<?php
/**
 * Display single product reviews (comments)
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     9.0.0
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews">
	<div id="comments" class="comments-area">

		<?php if ( have_comments() ) : ?>

			<ol class="comment-list mb-30">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
					'type'      => 'list',
				) ) );
				echo '</nav>';
			endif; ?>

		<?php else : ?>

			<p class="woocommerce-noreviews"><?php _e( 'Không có bình luận nào.', 'woocommerce' ); ?></p>

		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
					$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply'          => have_comments() ? __( 'Thêm bình luận', 'woocommerce' ) : __( 'Bình luận về', 'woocommerce' ) . ' &ldquo;' . get_the_title() . '&rdquo;',
						'title_reply_to'       => __( 'Trả lời %s', 'woocommerce' ),
						'comment_notes_before' => '',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<div class="col-md-4 mb-30">' .
							            '<input id="author" class="comment-form-author form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" placeholder="'.__( 'TÊN', 'woocommerce' ).'"/></div>',
							'email'  => '<div class="col-md-4 mb-30"> ' .
							            '<input id="email" class="comment-form-email form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" placeholder="' . __( 'EMAIL', 'woocommerce' ) . '"/></div>',
						),
						'label_submit'  => __( 'GỬI BÌNH LUẬN', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => ''
					);

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="col-md-4 mb-30"><select name="rating" id="cms-rating">
							<option value="">' . __( 'ĐÁNH GIÁ', 'woocommerce' ) . '</option>
							<option value="5">' . __( '5', 'woocommerce' ) . '</option>
							<option value="4">' . __( '4', 'woocommerce' ) . '</option>
							<option value="3">' . __( '3', 'woocommerce' ) . '</option>
							<option value="2">' . __( '2', 'woocommerce' ) . '</option>
							<option value="1">' . __( '1', 'woocommerce' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<div class="col-md-12 mb-40"><textarea id="comment" class="comment-form-comment form-control" name="comment" placeholder="'.__('BÌNH LUẬN', 'woocommerce').'" maxlength="5000" aria-required="true"></textarea></div>';

					comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>

	<div class="clear"></div>
</div>
