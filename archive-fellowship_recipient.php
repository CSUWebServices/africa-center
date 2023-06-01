<?php
/**
 * The template for displaying the archive page for fellowship recipients.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package csu
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) { ?>

				<h1 class="entry-title">Fellowship Recipients</h1>

				<div class="fellowship-list">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						$title = get_the_title();
						$url = get_permalink();
						$image = get_the_post_thumbnail_url();
						$class = get_field('class');
						if( has_post_thumbnail() ) {
							$image = get_the_post_thumbnail_url();
						} else {
							$image = get_stylesheet_directory_uri() . '/inc/images/cam-square.jpg';
						} ?>

							<a href="<?php echo $url; ?>" class="recipient-link">
								<div class="recipient-container" style="background-image:url('<?php echo $image; ?>');">
									<h3><?php echo $title; ?></h3>
									<p><?php echo $class; ?></p>
								</div><!-- .recipient-container -->
							</a>

					<?php endwhile;

				the_posts_pagination();

			} else {

				get_template_part( 'template-parts/content', 'none' );

			} ?>

			</div> <!-- .fellowship-list -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
