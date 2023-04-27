<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package csu
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'csu' ); ?></a>

	<?php get_template_part( 'template-parts/global', 'nav' ); ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="top-header">
			<div class="site-branding">
				<!-- CSU Logo -->
				<a class="csu-desktop" href="https://www.colostate.edu"><img src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-linear.svg" alt="Colorado State University"></a>
				<a class="csu-tablet" href="https://www.colostate.edu"><img src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-stacked.svg" alt="Colorado State University"></a>
				<a class="csu-mobile" href="https://www.colostate.edu/"><img src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-mobile.svg" alt="Colorado State University"></a>

				<?php // Site title
				if ( is_front_page() ) : ?>
					<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" aria-label="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<div class="header-right">
				<?php if( !is_page('dayofgiving') ): ?>
					<div class="header-give-wrapper">
						<a class="header-give" href="https://advancing.colostate.edu/GIVE">Give Now</a>
					</div> <!-- .header-give-wrapper -->
				<?php endif; ?>
				<button id="offcanvas-nav-button" title="Open Navigation" aria-haspopup="true" aria-controls="#site-navigation" aria-expanded="false" aria-label="Open Navigation"><i class="fa fa-th"></i><span>Menu</span></button>
			</div> <!-- .header-right -->

		</div><!-- .top-header -->

		<?php /*

		<div class="offcanvas-navigation-wrapper">
			<nav id="site-navigation" class="main-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div> <!-- .offcanvas-navigation-wrapper -->

		*/ ?>

		<div class="subsite-header-wrapper">
			<?php 
				// Get current page ID
				global $post;
				$currentID = $post->ID;

				// Set the subsite slug
				if( get_post_ancestors( $currentID )) { // If the page is a child page
					// Get the highest level ancestor's page ID
					$ancestors = get_post_ancestors( $currentID );
					$ancestorID = end( $ancestors );
					$ancestor = get_post( $ancestorID );
					$ancestorSlug = $ancestor->post_name;
					
					$subsiteID = $ancestorID;
					$subsiteSlug = $ancestorSlug;
					$subsiteName = $ancestor->post_title;

					$menu = wp_get_nav_menu_object( $subsiteName );
					$menuID = $menu->term_id;
				} else { // If the page is a parent page
					$subsiteID = $currentID;
					$subsiteSlug = $post->post_name;
					$subsiteName = $post->post_title;

					$menu = wp_get_nav_menu_object( $subsiteName );
					$menuID = $menu->term_id;
				}

				$subsiteNameOnly = apply_filters('the_content', '[subsite_title element="h2" wrapper="false" link="false"]');

				// Subsite Title
				echo apply_filters('the_content', '[subsite_title element="h2" wrapper="true"]');

				// Mobile nav open
				if( get_post_meta($subsiteID, '_is_subsite') ) {
					echo 
					'<button id="open-secondary-nav">
					     <div class="subsite-nav-icon"> 
					      <span></span>
					      <span></span>
					      <span></span>
					    </div>'
						. $subsiteNameOnly .
					'</button>';
				}

				// Subsite Navigation
				do_shortcode('[subsite_nav container_class="subsite-nav main-navigation" menu_class="menu" items_wrap="<ul id=\'%1$s\' class=\'%2$s\'>%3$s</ul>"]');
				do_shortcode('[subsite_nav container_class="subsite-nav mobile-nav" menu_class="menu" items_wrap="<ul id=\'%1$s\' class=\'%2$s\'>%3$s</ul>"]');
			?>
		</div> <!-- .subsite-header-wrapper -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
