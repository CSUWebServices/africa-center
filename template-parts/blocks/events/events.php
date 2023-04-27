<?php 

/**
 * Events Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'events-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'events-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$event_cat_id = get_field('events_category');

// Ensure the global $post variable is in scope
global $post;

$events = tribe_get_events(
    array(
        'eventDisplay'   => 'upcoming',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'tribe_events_cat',
                'field' => 'term_id',
                'terms' => $event_cat_id
            )
        )
) );
 
if( $events ) {
	echo '<div class="' . esc_attr($className) . '">';
	echo '<h2>Upcoming Events</h2>';
		echo '<div class="events-wrapper">';
			foreach( $events as $event ) {
				// $url = tribe_get_event_meta( get_the_ID(), '_EventURL', true );
				// $url = tribe_get_event_website_url( $event );
				// $url = tribe_get_event_link( $event );
				$event_link = get_field('event_link', $event);
				$excerpt = get_the_excerpt($event);
				if($event_link) {
					echo '<a class="event-block" href="' . $event_link . '">';
				} else {
					echo '<div class="event-block no-link">';
				}
					echo '<h3>' . $event->post_title . '</h3>';
					echo '<p class="date-time">' . tribe_get_start_date( $event ) . '</p>';
					echo '<p class="event-description">' . $excerpt. '</p>';
				if($event_link) {
					echo '</a>';
				} else {
					echo '</div>';
				}
			}
		echo '</div>';
	echo '</div>';
}