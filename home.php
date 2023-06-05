<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package csu
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<?php get_template_part('template-parts/archive', 'header'); ?>

			<section class="posts-wrapper">
				<div class="posts-list">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						$categories = get_the_category();
						$image = get_the_post_thumbnail( $post->ID, 'large' );
						if($image) {
						    $image_link = get_the_post_thumbnail_url( $post->ID, 'large' );
						} else {
						    $image_link = get_field('default_image', 'option');
						}
						?>

						<a href="<?php the_permalink(); ?>" class="featured-link" data-aos="fade-up">
							<div class="featured-card" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">

								<?php  if( ! empty( $categories ) ) { ?>
									<p class="featured-category">
										<?php echo esc_html( $categories[0]->name ); ?>
									</p>
								<?php } ?>

								<div class="card-meta">
									<h3><?php echo get_the_title(); ?></h3>
									<p><?php echo get_the_date('F jS, Y'); ?></p>
								</div><!-- .card-meta -->

							</div><!-- .featured-card -->
						</a><!-- .secondary-post -->

					<?php endwhile;

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</div> <!-- .posts-list -->
			</section>

			<?php the_posts_pagination(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
