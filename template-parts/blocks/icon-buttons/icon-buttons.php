<?php

/**
 * Icon Buttons Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'icon-buttons-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'icon-buttons';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
if( have_rows('icon_buttons') ):
	$count = count(get_field('icon_buttons')); ?>
	<div class="<?php echo esc_attr($className) . ' count-' . $count ?>" id="<?php echo esc_attr($id); ?>" data-aos="fade-up">
		<?php while( have_rows('icon_buttons') ): the_row();
			$link = get_sub_field('link');
			$icon = get_sub_field('icon');
			$color = get_sub_field('color'); ?>

			<a class="icon-button <?php echo $color; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
				<span class="material-symbols-outlined">
					<?php echo $icon; ?>
				</span>
				<h3><?php echo $link['title']; ?></h3>
			</a>
		<?php endwhile; ?>
	</div> <!-- .quote-slider -->
<?php endif;