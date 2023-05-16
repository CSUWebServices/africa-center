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

// Load values and assign defaults.
if( have_rows('slider') ): ?>
	
	<div class="<?php echo $className; ?>" data-aos="fade-in">

		<?php while( have_rows('slider') ): the_row();

			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$text = get_sub_field('text');
			$link = get_sub_field('link'); ?>

			<div class="slide">
				<div class="container">
					
				</div>
			</div> <!-- .slide -->

		<?php endwhile; ?>

	</div> <!-- .slider -->

<?php endif;