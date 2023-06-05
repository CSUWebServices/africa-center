<?php
$header_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$default_image = get_field('default_image', 'option');
$position = get_field('image_position');
if( has_post_thumbnail() ) { ?>
	<header class="post-header entry-header post-image" style="background-image:url('<?php echo $header_image; ?>'); background-position: <?php if($position == 'top') {echo 'top';} elseif($position == 'center') {echo 'center';} elseif($position == 'bottom') {echo 'bottom';} ?>">
<?php } else { ?>
	<header class="post-header entry-header post-image" style="background-image:url('<?php echo $default_image; ?>">
<?php } ?>

		<div class="entry-header-wrapper transparent" data-aos="fade-up" data-aos-duration="1000">
			<div class="entry-header-container">
				<?php 
					if( 'post' === get_post_type() ) {

						$subtitle = get_field('subtitle');

						echo '<div class="post-meta-wrapper">';
						if ( is_single() ) :
							echo '<div class="title-subtitle">';
								the_title( '<h1 class="entry-title">', '</h1>' );
								if( $subtitle ):
									echo '<p class="subtitle page-subtitle">' . $subtitle . '</p>';
								endif;
							echo '</div>';
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
					} else {
						echo '<div class="title-subtitle">';
							the_title( '<h1 class="entry-title">', '</h1>' );
							if( $subtitle ) {
								echo '<p class="subtitle page-subtitle">' . $subtitle . '</p>';
							}
						echo '</div>';
					}
				?>

				<?php if ( 'post' === get_post_type() ) :
					$categories = get_the_category(); ?>
					<div class="entry-meta">
						<?php if ( ! empty( $categories ) ) { ?>
							<ul class="post-categories">
								<?php foreach( $categories as $category ) { ?>
									<li><a href="<?php echo get_category_link($category); ?>" rel="category"><?php echo $category->name; ?></a></li>
								<?php } ?>
							</ul>
						<?php } ?>
						<p class="post-date"><?php the_date(); ?></p>
					</div><!-- .entry-meta -->
				</div><!-- .post-meta-wrapper-->
				<?php endif; ?>
			</div><!-- .entry-header-container -->
		</div> <!-- .entry-header-wrapper -->

	</header><!-- .entry-header -->