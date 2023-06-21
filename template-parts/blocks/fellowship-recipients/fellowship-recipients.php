<?php

/**
 * Fellowship Recipients Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'fellowship-recipients-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'fellowship-recipients';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
} ?>

<div id="<?php echo $id ?>" class="<?php echo $className; ?>">
    
    <?php 
		$args = array(
			'post_type'      => 'fellowship_recipient',
			'posts_per_page' => 4,
			'nopaging'       => true
		);

		// The Query
		$recipients = new WP_Query( $args );

		// The Loop
		if ( $recipients->have_posts() ) {
			echo '<div class="fellowship-recipients-wrapper">';
				while ( $recipients->have_posts() ) {
				$recipients->the_post(); 

				$id = get_the_ID();
				$title = get_the_title();
				$url = get_permalink();
				$image = get_the_post_thumbnail_url();
				$class = get_field('class', $id);
				if( has_post_thumbnail() ) {
					$image = get_the_post_thumbnail_url();
				} else {
					$image = get_stylesheet_directory_uri() . '/inc/images/cam-square.jpg';
				} ?>

					<a href="<?php echo $url; ?>" class="recipient-link">
						<div class="recipient-container" style="background-image:url('<?php echo $image; ?>');">
							<h3><?php echo $title; ?></h3>
							<p><?php echo $class; ?></p>
						</div><!-- .recipient-container -->
					</a>

				<?php }
			echo '</div>';

			echo '<div class="more-recipients text-link">';
				echo '<a href="/fellowship-recipients/">View All Recipients</a>';
			echo '</div>';
		} else {
			// no posts found
		}
		
		/* Restore original Post Data */
		wp_reset_postdata();
	?>

</div> <!-- .wp-block-fellowship-recipients -->