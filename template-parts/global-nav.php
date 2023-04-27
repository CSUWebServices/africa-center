<?php
/**
 * Template part for displaying global nav.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package csu
 */

?>

<div id="global-nav">

	<button id="close-global-nav" aria-label="Close Navigation"><i class="fa fa-times" title="Close Navigation"></i></button>

	<div class="global-nav-inner">

		<div class="global-header">

			<div class="nav-logo">
				<a class="csu-logo" href="/">
					<img class="desktop" src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-desktop-green.svg" alt="Colorado State University logo">
					<img class="tablet" src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-tablet-green.svg" alt="Colorado State University logo">
					<img class="mobile" src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-mobile-green.svg" alt="Colorado State University logo">
					<span><?php bloginfo( 'name' ); ?></span>
				</a>
			</div> <!-- .nav-logo -->

			<div class="global-contact">
				<ul>
					<li><a href="https://advancing.colostate.edu/community/" title="Donor Login"><i class="fa fa-user" aria-hidden></i>Donor Login</a></li>
					<li><a href="/contact" title="Contact"><i class="fa fa-mobile" aria-hidden></i>Contact</a></li>
				</ul>
			</div> <!-- .global-contact -->

		</div> <!-- .global-header -->

		<!-- <div class="nav-title">
			<a href="/">Giving</a>
		</div> -->

		<!-- <hr class="divider"></hr> -->

		<div class="global-nav-menus">
			<div class="menu-wrapper">
				<?php $global_one_title = get_term(get_nav_menu_locations()['global_1'], 'nav_menu')->name; ?>
				<h3 class="menu-title"><?php echo $global_one_title; ?></h3>
				<?php wp_nav_menu( array('theme_location' => 'global_1', 'container' => 'nav') ); ?>
			</div>
			<div class="menu-wrapper">
				<?php $global_two_title = get_term(get_nav_menu_locations()['global_2'], 'nav_menu')->name; ?>
				<h3 class="menu-title"><?php echo $global_two_title; ?></h3>
				<?php wp_nav_menu( array('theme_location' => 'global_2', 'container' => 'nav') ); ?>
			</div>
			<div class="menu-wrapper">
				<?php $global_three_title = get_term(get_nav_menu_locations()['global_3'], 'nav_menu')->name; ?>
				<h3 class="menu-title"><?php echo $global_three_title; ?></h3>
				<?php wp_nav_menu( array('theme_location' => 'global_3', 'container' => 'nav') ); ?>
			</div>
		</div> <!-- .global-nav-menus -->

		<div class="global-nav-footer">

			<div class="global-give-wrapper">
				<a class="global-give" href="https://advancing.colostate.edu/GIVE">Give Now</a>
			</div> <!-- .global-give-wrapper -->

			<ul class="global-social">
				<li><a href="https://www.facebook.com/coloradostateuniversity" title="Facebook" target="_blank"><i class="fa fa-facebook-f" title="Facebook"></i></a></li>
				<li><a href="https://www.instagram.com/coloradostateuniversity/" title="Instagram" target="_blank"><i class="fa fa-instagram" title="Instagram"></i></a></li>
				<li><a href="https://twitter.com/coloradostateu" title="Twitter" target="_blank"><i class="fa fa-twitter" title="Twitter"></i></a></li>
				<li><a href="https://www.instagram.com/coloradostateuniversity/" title="YouTube" target="_blank"><i class="fa fa-youtube" title="YouTube"></i></a></li>
				<li><a href="https://www.flickr.com/photos/coloradostateuniversity" title="Flickr" target="_blank"><i class="fa fa-flickr" title="Flickr"></i></a></li>
			</ul> <!-- .global-social -->

			<div class="div-search">
				<?php echo get_search_form(); ?>
			</div>

		</div> <!-- .global-nav-footer -->

	</div> <!-- .global-nav-inner -->
</div> <!-- #global-nav -->