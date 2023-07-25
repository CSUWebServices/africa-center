<?php

/**
 * Staff Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'staff-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$staff_category = get_field('staff_category') ?: 'Select category of staff to display';
$term = get_term( $staff_category, 'staff-category' );
$category_title = $term->name;

$args = array(
    'post_type'      => 'staff',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'staff-category',
            'field'    => 'id',
            'terms'    => $staff_category,
        ),
    ),
);

$query = new WP_query($args);

if( $query->have_posts() ) { ?>
    <div class="wp-block-staff">
        <?php if( $category_title ) { ?>
            <h3 class="section-title"><?php echo $category_title; ?></h3>
        <?php } ?>
    	<div class="staff-list grid" data-aos="fade-up">
    		<?php while ( $query->have_posts() ) : $query->the_post();

                $id = get_the_ID();

                $image = get_the_post_thumbnail( $id, 'large' ); 
                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                $image_url = get_the_post_thumbnail_url( $id );
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                $link = get_permalink( $id );
                $title = get_the_title($id);
                $job_title = get_field('job_title', $id);
                $office = get_field('office', $id);
                $phone = get_field('phone', $id);
                $phoneNumber = preg_replace('/[^0-9]/', '', $phone);
                $email = get_field('email', $id);
                $department = get_field('department', $id); ?>

        		<div class="staff-card" href="<?php echo $permalink; ?>">

                    <a href="<?php echo $link; ?>">
                        <?php if($image) { ?>
                            <div class="staff-image" style="background-image:url('<?php echo $image_url; ?>');"></div>
                        <?php } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/inc/logos/ramhead.png" alt="">
                        <?php } ?>
                        <h3 class="staff-name"><?php echo $title; ?></h3>
                    </a>

                    <?php if($job_title) { ?>
                        <p class="job-title"><?php echo $job_title; ?></p>
                    <?php } ?>
                    <?php if($email) { ?>
                        <a class="staff-email" href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                    <?php } ?>
        		</div>

    		<?php endwhile; ?>
    	</div> <!-- .staff-list -->
    </div> <!-- .wp-block-staff -->
<?php }

/* Restore original Post Data */
wp_reset_postdata();