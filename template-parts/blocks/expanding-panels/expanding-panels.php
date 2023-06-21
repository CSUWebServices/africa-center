<?php

/**
 * Expanding Panels Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'expanding-panels-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'expanding-panels';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$count = count( get_field('expanding_panels') );
$color = get_field('panels_divider_color');
if( have_rows('expanding_panels') ): ?>
	<div class="expanding-panels alignfull">
	    <ul class="<?php echo 'grid-' . $count; ?>">
	    <?php while( have_rows('expanding_panels') ): the_row(); 
	    	$title = get_sub_field('title');
	    	$image = get_sub_field('image');
	    	$link = get_sub_field('link');
	        $description = get_sub_field('description');
	        ?>
	        
	        <li>
	        	<span class="expanding-panel-cover">
	        		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
	        	</span>
	        	<a href="<?php echo esc_url( $link ); ?>" <?php if($description){echo 'class="has-description"';} ?>>
        			<div class="panel-description">
        				<?php if($description): ?>
        					<p><?php echo $description; ?></p>
        				<?php endif; ?>
        			</div> <!-- .panel-description -->
	        		<div class="panel-title">
		        		<h3 class="<?php echo 'divider-' . $color; ?>"><?php echo $title; ?></h3>
						<?php if($link !== '#'): ?>
		        			<span class="learn-more">Learn More <span class="material-icons">arrow_right_alt</span></span>
						<?php endif; ?>
	        		</div> <!-- .panel-title -->
	        	</a>
	        </li> <!-- .single-panel -->

	    <?php endwhile; ?>
	    </ul>
	</div> <!-- .expanding-panels -->
<?php endif; ?>