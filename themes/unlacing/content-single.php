<?php
/**
 * @package unlacing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php unlacing_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="featured-image">
		<?php echo get_the_post_thumbnail( $page->ID, 'full'); ?>
		<?php if ( ! get_field( 'featured_image_caption') == null ) : ?>
			<?php the_field('featured_image_caption'); ?>
		<?php endif; ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'unlacing' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php unlacing_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
