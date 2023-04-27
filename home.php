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

			<section class="posts-filter-wrapper">
				<div class="posts-filter-inner">
					<h2 id="filter-title">Filter by Category</h2>
					<div class="posts-filter" data-aos="zoom-in-left" role="radiogroup">
						<button data-filter="*">All</button>
						<?php 
							$categories = get_categories();
							foreach ($categories as $category) {
								echo '<button data-filter=".category-' . $category->slug . '" aria-checked="false" aria-labelledby="filter-title" role="radio" aria-checked="false">' . $category->name . '</button>';
							}
						?>
					</div> <!-- .posts-filter -->
				</div>
			</section>

			<section class="posts-wrapper">
				<div class="posts-list filter">

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

						<a class="post-card <?php foreach( $categories as $category ) { echo 'category-' . $category->slug . ' '; } ?>" href="<?php echo get_permalink(); ?>">
							<div class="image-title" style="background-image:url('<?php echo $image_link; ?>');">
				                <h2><?php echo get_the_title(); ?></h2>
				            </div> <!-- .image-title -->
		                    <div class="card-content">
		                        <?php echo '<p class="date">' . get_the_date() . '</p>'; ?>
		                        <?php if( has_excerpt() ) {
		                            echo '<p class="excerpt">' . get_the_excerpt() . '</p>';
		                        } ?>
		                    </div> <!-- .card-content -->
		        		</a>

					<?php endwhile;

					the_posts_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>

				</div> <!-- .posts-list -->
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
