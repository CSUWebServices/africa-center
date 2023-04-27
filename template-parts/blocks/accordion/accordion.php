<?php

/**
 * Accordion Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
if( get_field('accordion_type') == 'classic' ) {
    $accordion_type = 'accordion-classic';
} else if( get_field('accordion_type') == 'toggle' ) {
	$accordion_type = 'accordion-toggle';
}

if( have_rows('panels') ): ?>
	<div class="accordion <?php echo esc_attr($className); ?> <?php echo $accordion_type; ?>" data-aos="fade-up">
		<?php while( have_rows('panels') ): the_row();
			$title = get_sub_field('title');
			$content = get_sub_field('content'); ?>

			<h3 class="accordion-title"><?php echo $title; ?></h3>
			<div class="accordion-content"><?php echo $content; ?></div>
		<?php endwhile; ?>
	</div> <!-- .quote-slider -->
<?php endif;