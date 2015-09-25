<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package unlacing
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'unlacing' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<h2 class="site-description"><?php echo get_bloginfo( 'description' ); ?></h2>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-text"><?php _e( 'Menu', 'unlacing' ); ?></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<div id="social" class="social-icons">
			<a href="http://www.facebook.com"><img src="/wp-content/themes/unlacing/icons/social/facebook.svg" alt="facebook"></a>
			<a href="http://www.twitter.com"><img src="/wp-content/themes/unlacing/icons/social/twitter.svg" alt="twitter"></a>
			<a href="http://www.linkedin.com"><img src="/wp-content/themes/unlacing/icons/social/linkedin.svg" alt="linkedin"></a>
		</div><!-- #social -->
		<?php if (! get_field('banner_image') == null || ! get_field('banner_quote') == null  ) : ?>
			<div class="banner-image-quote-wrapper">
			<?php if ( ! get_field('banner_image') == null ) : ?>
			<div class="banner-image aligncenter">
				<?php $image_id = get_field('banner_image');
				$image = wp_get_attachment_image_src ($image_id, 'bannerthumb');?>
				<img src="<?php echo $image[0]; ?>" />
				<?php if ( ! get_field('featured_image_caption') == null ) : ?>
				<div class="credit"><?php the_field('featured_image_caption');?></div>
				<?php endif; ?>
			</div><!-- .banner-imagee -->
			<?php endif; ?>
			<?php if ( ! get_field('banner_quote') == null ) : ?>
				<div class="banner-quote">
					<?php the_field('banner_quote'); ?>
				</div><!-- .banner-quote -->
			<?php endif; ?>
			</div>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
