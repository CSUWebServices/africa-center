<?php

/**
 * Quote Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote-slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
if( have_rows('quote_slider') ):
	$color = get_field('color'); ?>
	<figure class="wp-block-pullquote alignfull has-background is-style-solid-color quote-slider-wrapper" style="background-color:<?php echo $color; ?>">
		<div class="slider quote-slider" data-aos="fade-in">
			<?php while( have_rows('quote_slider') ): the_row();
				$quote = get_sub_field('text');
				$citation = get_sub_field('citation'); ?>

				<blockquote class="quote-slide">
					<div class="quote-container">
						<?php if($quote): ?>
							<p><?php echo $quote; ?></p>
						<?php endif; ?>
						<?php if($citation): ?>
							<cite><?php echo $citation; ?></cite>
						<?php endif; ?>
					</div>
				</blockquote> <!-- .quote-slide -->

			<?php endwhile; ?>
		</div> <!-- .quote-slider -->
	</figure>
<?php endif;