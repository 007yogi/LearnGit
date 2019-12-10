<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php $thumb = ( get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'giving-featured-medium' ) : false; ?>




	<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-img post-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);" <?php } ?>>
			<h2 class="headline img-headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php the_post_thumbnail( 'giving-featured-medium' ); ?>
		</div>
	<?php } ?>



