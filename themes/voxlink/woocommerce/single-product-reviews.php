<?php
/**
 * Display single product reviews (comments)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product-reviews.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! comments_open() ) {
	return;
}

?>
<div id="reviews" class="woocommerce-Reviews">
	<div class="reviews-tree">
		<?php
			$args = array (
				'post_type' => 'product',
				'post_id' => $product->get_id(),
				"status" => "approve"
			);
	    	$reviews = get_comments( $args );
		?>

		<h4><?php echo plural_form(count($reviews), array("Отзыв","Отзыва","Отзывов")); ?></h4>

		<?php
			foreach($reviews as $review){
				$avatar = get_avatar_url($review->comment_author_email);
	    		$rating = get_comment_meta( $review->comment_ID, "rating")[0];
			?>
	    	<div class="review">
				<div class="review-avatar" style="background-image: url(<?php echo $avatar; ?>);"></div>
				<div class="review-content">
					<div class="review-author"><?php echo $review->comment_author; ?></div>
					<div class="review-text"><?php echo $review->comment_content; ?></div>
					<div class="review-date">
						<?php $date = get_comment_date("j F, Y", $review->comment_ID); ?>
						<?php echo $date;?>
					</div>
				</div>
				<?php
					$width = $rating*100/5;
				?>
				<div class="single-star-rating">
					<div class="star-rating">
						<div class="star-rating-empty">
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
						</div>
						<div class="star-rating-full" style="width: <?php echo $width; ?>%">
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
							<div class="sr-item"></div>
						</div>
					</div>
				</div>
	    	</div>
	    <?php } ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>

		<div class="review-form">
			<?php
				$commenter = wp_get_current_commenter();

				$comment_form = array(
					'title_reply'          => "Добавить отзыв",
					'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
					'title_reply_before'   => '<h4>',
					'title_reply_after'    => '</h4><p>
						Ваш электронный адрес не будет опубликован. Обязательные поля помечены <strong>*</strong>
					</p>',
					'comment_notes_before' => '',
					'comment_notes_after'  => '',
					'fields'               => array(
						'author' => '<label class="author-field">
							<span>Ваше имя <strong>*</strong></span>
							<div class="input-container">
								<input type="text" name="author">
							</div>
						</label>',
						'email'  => '<label class="email-field">
							<span>Ваш email <strong>*</strong></span>
							<div class="input-container">
								<input type="email" name="email">
							</div>
						</label>',
					),
					'label_submit'  => "Добавить",
					'logged_in_as'  => '',
					'comment_field' => '',
					'class_submit' => 'product-item-btn'
				);

				if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
				}

				if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
					$comment_form['comment_field'] = '<label>
						<span>Рейтинг</span>
						<div class="select-rating">
							<div class="sr-item selected" data-value="1"></div>
							<div class="sr-item selected" data-value="2"></div>
							<div class="sr-item selected" data-value="3"></div>
							<div class="sr-item selected" data-value="4"></div>
							<div class="sr-item selected" data-value="5"></div>
						</div>
						<input type="hidden" name="rating" value="5">
					</label>
					<input type="hidden" name="action" value="add-review" />
					<input type="hidden" name="product_id" value="'.$product->get_id().'">
					';
				}

				$comment_form['comment_field'] .= '<label class="text-field">
					<span>Ваш отзыв <strong>*</strong></span>
					<div class="input-container">
						<textarea name="comment"></textarea>
					</div>
				</label>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
			?>
		</div>

	<?php else : ?>

		<p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

	<?php endif; ?>
</div>

<div id="reviews-success" class="reviews-popup mfp-hide">
	Спасибо за Ваш отзыв ! <br>
	Он будет размещен на сайте после одобрения администратором
</div>
<a href="#reviews-success" class="open-popup-link"></a>
