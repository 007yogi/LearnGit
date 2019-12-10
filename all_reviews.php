<?php
add_shortcode( 'shortcode_of_all_reviews', 'display_all_reviews' );
//Display all reviews
if (!function_exists('display_all_reviews')) {
	function display_all_reviews(){
		$args = array(
		   'status' => 'approve',
		   'type' => 'review'
		);

		// The Query
		$comments_query = new WP_Comment_Query;
		$comments = $comments_query->query( $args );

		// Comment Loop
		if ( $comments ) {
			echo "<ol>";
			foreach ( $comments as $comment ): ?>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<p class="meta waiting-approval-info">
					<em><?php _e( 'Thanks, your review is awaiting approval', 'woocommerce' ); ?></em>
				</p>
				<?php endif;  ?>
				<li itemprop="reviews" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-review-<?php echo $comment->comment_ID; ?>">
					<div id="review-<?php echo $comment->comment_ID; ?>" class="review_container">
						<div class="review-avatar">
							<?php echo get_avatar( $comment->comment_author_email, $size = '50' ); ?>
						</div>
						<div class="review-author">
							<div class="review-author-name" itemprop="author"><?php echo $comment->comment_author; ?></div>
							<div class='star-rating-container'>
								<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo esc_attr( get_comment_meta( $comment->comment_ID, 'rating', true ) ); ?>">
									<span style="width:<?php echo get_comment_meta( $comment->comment_ID, 'rating', true )*22; ?>px"><span itemprop="ratingValue"><?php echo get_comment_meta( $comment->comment_ID, 'rating', true ); ?></span> <?php _e('out of 5', 'woocommerce'); ?></span>
									
										<?php
											$timestamp = strtotime( $comment->comment_date ); //Changing comment time to timestamp
											$date = date('F d, Y', $timestamp);
										?>
								</div>
								<em class="review-date">
									<time itemprop="datePublished" datetime="<?php echo $comment->comment_date; ?>"><?php echo $date; ?></time>
								</em>
							</div>
						</div>
						<div class="clear"></div>
						<div class="review-text">
							<div itemprop="description" class="description">
								<?php echo $comment->comment_content; ?>
							</div>
							<div class="clear"></div>
						</div>
					<div class="clear"></div>			
				</div>
			</li>

			<?php 
			endforeach;
			echo "</ol>";
		} else {
			echo "This product hasn't been rated yet.";
		}
	}
}