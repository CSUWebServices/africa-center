<?php
/**
 * The template for displaying all single fellowship recipients.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package csu
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();
			$class = get_field('class');
			$image = get_the_post_thumbnail_url(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<aside class="fellowship-recipient-info">
					<?php 

					// Image
					if( has_post_thumbnail() ) { ?>
						<div class="student-image" style="background-image:url('<?php echo $image; ?>');"></div>
					<?php } else {
						echo '<img class="student-image" src="' . get_stylesheet_directory_uri() . '/inc/images/cam-square.jpg" alt="Cam the Ram default photo">';
					}

					// Name
					the_title('<h1 class="entry-title">', '</h1>');

					// Class
					if( $class ) {
						echo '<p>' . $class . '</p>';
					} ?>
				</aside>

				<div class="entry-content">
					<?php
						the_content( sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'csu' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
