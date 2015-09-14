<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package unlacing
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="featured-image">
		<?php echo get_the_post_thumbnail( $page->ID, 'full'); ?> 
	</div>
	<div class="entry-content">
		<?php edit_post_link( __( 'Edit', 'unlacing' ), '<span class="edit-link">', '</span>' ); ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'unlacing' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
