<?php

/**
 * Link Blocks Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'link-blocks-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'link-blocks';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
if( have_rows('link_blocks') ): ?>
	<div class="link-blocks <?php echo esc_attr($className); ?>" data-aos="fade-up">
		<?php while( have_rows('link_blocks') ): the_row();
			$link = get_sub_field('link');
			$image = get_sub_field('image'); ?>

			<a class="link-block" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>" style="background-image:url('<?php echo $image; ?>');">
				<span><?php echo $link['title']; ?></span>
			</a>
		<?php endwhile; ?>
	</div> <!-- .quote-slider -->
<?php endif;