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

			<div class="posts-list">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post(); ?>

					<a class="post-card" href="<?php echo get_permalink(); ?>" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
	        			<?php /* if($image) {
	        				echo $image;
	        			} */ ?>
	                    <div class="card-content">
	                        <h3><?php echo get_title(); ?></h3>
	                        <hr />
	                        <?php echo '<p class="date">' . get_the_date() . '</p>'; ?>
	                        <?php if( has_excerpt() ) {
	                            echo '<p class="excerpt">' . get_excerpt() . '</p>';
	                        } ?>
	                    </div> <!-- .card-content -->
	        		</a>

				<?php endwhile;

				the_posts_pagination();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</div> <!-- .posts-list -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
