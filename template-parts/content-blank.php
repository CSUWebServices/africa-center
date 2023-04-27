<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package csu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php /*
	<header class="page-header entry-header no-header-image" style="background-image:url('<?php echo $default_image; ?>');">
		<div class="entry-header-wrapper" data-aos="fade-up" data-aos-duration="1000">
			<?php $subtitle = get_field('subtitle');
			if( $subtitle ) { ?>
				<div class="title-subtitle">
					<div class="subtitle-inner">
						<?php the_title( '<h1 class="small-title">', '</h1>' ); ?>
					</div> <!-- .subtitle-container -->
					<div class="title-container">
						<div class="title-inner">
							<?php echo '<h2 class="large-title">' . $subtitle . '</h2>'; ?>
						</div> <!-- .title-inner -->
					</div> <!-- .title-container -->
				</div> <!-- .title-subtitle -->
			<?php } else { ?>
				<div class="title-container">
					<div class="title-inner">
						<?php the_title( '<h1 class="large-title">', '</h1>' ); ?>
					</div> <!-- .title-only -->
				</div> <!-- .title-container -->
			<?php } ?>
		</div> <!-- .entry-header-wrapper -->
	</header><!-- .entry-header -->
	*/ ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'csu' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'csu' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
