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

	<!-- Roll-Up Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-NXMZ4TD');</script>
	<!-- End Google Tag Manager -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'csu' ); ?></a>

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
				<p><a href="https://sustainability.colostate.edu/"><img src="<?php echo get_stylesheet_directory_uri() . '/inc/logos/soges.png'; ?>" alt="School of Environmental Sustainability logo"><span>School of Global Environmental Sustainability</span></a></p>
			</div> <!-- .header-right -->

		</div><!-- .top-header -->

		<nav id="site-navigation" class="main-navigation" aria-label="Site Navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
