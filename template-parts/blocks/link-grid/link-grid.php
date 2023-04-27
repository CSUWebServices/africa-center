<?php

/**
 * Link Grid Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'link-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'link-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$count = count( get_field('link_grid') );
if( have_rows('link_grid') ): ?>
	<div class="link-grid <?php echo esc_attr($className); ?> <?php echo 'grid-' . $count; ?>" data-aos="fade-up">
		<?php while( have_rows('link_grid') ): the_row();
			$link = get_sub_field('link');
			$image = get_sub_field('image'); ?>

			<a class="link-grid-item item-<?php echo get_row_index(); ?> <?php if($image): echo 'link-block-image '; endif; ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" style="background-image:url('<?php echo $image; ?>');">
				<h3><?php echo $link['title']; ?></h3>
			</a>
		<?php endwhile; ?>
	</div> <!-- .quote-slider -->
<?php endif;