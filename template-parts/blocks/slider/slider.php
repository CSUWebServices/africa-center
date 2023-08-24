<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
if( have_rows('slider') ): ?>
	
	<div class="<?php echo $className; ?>" data-aos="fade-in">

		<?php while( have_rows('slider') ): the_row();

			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$text = get_sub_field('description');
			$link = get_sub_field('link');
			$link_url = $link['url'];
			$link_title = $link['title'];
			$link_target = $link['target'] ? $link['target'] : '_self'; ?>

			<div class="slide" style="background-image:url('<?php echo $image; ?>');">
				<div class="container">
					<div class="slide-content">

						<?php if( $title ) {
							echo '<h2>' . $title . '</h2>';
						} ?>

						<?php if( $text ) {
							echo '<p>' . $text . '</p>';
						} ?>

						<?php if( $link_url ) {
							echo '<a class="button" href="' . $link_url . '" target="' . $link_target . '">' . $link_title . '</a>';
						} ?>

					</div><!-- .slide-content -->
				</div><!-- .container -->
			</div> <!-- .slide -->

		<?php endwhile; ?>

	</div> <!-- .slider -->

<?php endif;