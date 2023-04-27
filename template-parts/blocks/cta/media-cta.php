<?php

/**
 * Media CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'media-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$media = get_field('media') ?: 'Select media';
$heading = get_field('heading') ?: 'Write a heading';
$subheading = get_field('subheading') ?: 'Write a subheading';
$link = get_field('link') ?: 'Select a link';
$default_image = get_field('default_image', 'option'); ?>

<div class="wp-block-media-cta alignfull">
	<?php if (strpos($media, 'mp4')) { // Video ?>

		<div class="cta video-cta-wrapper">

			<?php include 'cta-content.php'; ?>

			<video autoplay loop muted>
			    <source src="<?php echo $media; ?>" type="video/mp4" />Your browser does not support the video tag. Please upgrade your browser.
			    <img src="<?php echo $default_image; ?>" alt="">
			</video>

		</div> <!-- .video-cta-wrapper -->

	<?php } else { // Image ?>

		<div class="cta image-cta-wrapper" style="background-image:url('<?php echo $media; ?>');">

			<?php include 'cta-content.php'; ?>

		</div> <!-- .image-cta-wrapper -->

	<?php } ?>
</div> <!-- .wp-block-media-cta -->