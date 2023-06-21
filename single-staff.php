<?php
/**
 * The template for displaying all single staff members.
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
			$image = get_the_post_thumbnail_url();
			$email = get_field('email');
			$job_title = get_field('job_title'); ?>

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

					// Job Title
					if($job_title) { ?>
                        <p class="job-title"><?php echo $job_title; ?></p>
                    <?php }

					// Email
					if( $email ) {
						echo '<a href="mailto:' . $email . '">' . $email . '</a>';
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
