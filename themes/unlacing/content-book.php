<?php
/**
 * @package unlacing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="featured-image">
		<?php echo get_the_post_thumbnail( $page->ID, 'bookcover'); ?> 
	</div>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->
		<h2 class="subtitle"><?php the_field('subtitle'); ?></h2>
		<h3 class="author">by <?php the_field('author'); ?></h3>
	<div class="entry-content">
		<?php edit_post_link( __( 'Edit', 'unlacing' ), '<span class="edit-link">', '</span>' ); ?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'unlacing' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'unlacing' ),
				'after'  => '</div>',
			) );
		?>
		<?php if ( ! get_field( 'buy_from_amazon_link') == null ) : ?>
			<a class="button" href="<?php the_field('buy_from_amazon_link'); ?>" target="_blank">Buy the book</a>
		<?php endif; ?>
		<?php if ( ! get_field( 'buy_direct_wholesale') == null ) : ?>
			<a class="button" href="<?php the_field('buy_direct_wholesale'); ?>" target="_blank">Buy wholesale</a>
		<?php endif; ?>
		<?php if ( ! get_field( 'reviews') == null ) : ?>
			<div class="book-reviews">
				<h2>Reviews</h2>
				<?php the_field('reviews'); ?>
			</div>
		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->