<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package csu
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<div class="top-footer-container">
			<div class="top-footer">
				<div class="footer-left">
					
				</div> <!-- .footer-left -->
				<div class="footer-middle">
		
				</div> <!-- .footer-middle -->
				<div class="footer-right">
					
				</div> <!-- .footer-right -->
			</div> <!-- .top-footer -->
		</div><!-- .footer-container -->

		<div class="bottom-footer-container">
			<div class="bottom-footer">
				<!-- CSU Links -->
				<div class="csu-links">
					<nav aria-label="Footer legal">
						<ul>
							<!-- <li><a href="https://admissions.colostate.edu/">Apply to CSU</a></li> -->
							<li><a href="https://accessibility.colostate.edu/">Accessibility</a></li>
							<li><a href="https://www.colostate.edu/equal-opportunity/">Equal Opportunity</a></li>
							<li><a href="https://www.colostate.edu/disclaimer/">Disclaimer</a></li>
							<li><a href="https://www.colostate.edu/privacy/">Privacy</a></li>
							<li><a href="https://www.colostate.edu/search/">Search CSU</a></li>
						</ul>
					</nav>
					<!-- Copyright -->
					<div class="copyright">
						<small class="source-org">&copy; <?php echo date('Y'); ?> Colorado State University, Fort Collins, Colorado 80523 USA</small>
					</div>
				</div> <!-- .csu-links -->
				<div class="csu-footer-logo">
					<a href="https://www.colostate.edu/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/inc/logos/csu-linear.svg" alt="Colorado State University Logo"></a>
				</div>
			</div> <!-- .bottom-footer -->
		</div><!-- .footer-container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="mobile-navigation" aria-label="Mobile Navigation">
	<?php wp_nav_menu( array( 
		'theme_location' => 'primary',
		'menu_id'        => 'primary-mobile-menu',
		'container'      => null
		// 'items_wrap'     => '<ul id="%1$s" class="%2$s" data-dropdown-menu>%3$s</ul>'
	) ); ?>
</nav><!-- #site-navigation -->

<?php wp_footer(); ?>

<?php get_template_part( 'template-parts/design', 'output' ); ?>

</body>
</html>
