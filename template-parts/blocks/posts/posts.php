<?php

/**
 * Posts Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'posts-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'wp-block-posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$header = get_field('header');
$featured = get_field('featured_post');
$featured_id = $featured->ID;
$select_posts = get_field('select_posts');
$secondary_posts = get_field('secondary_posts'); ?>

<?php if( $header ) { ?>
    <h2 class="section-title"><?php echo $header; ?></h2>
<?php } ?>

<div id="<?php echo $id ?>" class="<?php echo $className; ?>">
    
    <?php if( $featured ) {

            $categories = get_the_category( $featured_id );
            $permalink = get_permalink( $featured_id );
            $title = get_the_title( $featured_id );
            $thumbnail = get_the_post_thumbnail_url( $featured_id );
            $date = get_the_date( 'F jS, Y', $featured_id ); ?>

            <a href="<?php echo $permalink; ?>" class="featured-post featured-link">
                <div class="featured-card" style="background-image:url('<?php echo $thumbnail; ?>');">

                    <?php  if( ! empty( $categories ) ) { ?>
                        <p class="featured-category">
                            <?php echo esc_html( $categories[0]->name ); ?>
                        </p>
                    <?php } ?>

                    <div class="card-meta">
                        <h3><?php echo $title; ?></h3>
                        <p><?php echo $date; ?></p>
                    </div><!-- .card-meta -->

                </div><!-- .featured-card -->
            </a><!-- .featured-post -->

    <?php } else {
        echo '<h2>Please select a featured post.</h2>';
    }

    // Secondary Posts
    if( $select_posts ) {  // If the user selected manual posts, show those ?>
        <div class="secondary-posts">
            <?php if( $secondary_posts ): foreach ($secondary_posts as $post): setup_postdata($post);
                $categories = get_the_category($post); ?>

                <a href="<?php the_permalink(); ?>" class="secondary-post featured-link">
                    <div class="featured-card" style="background-image:url('<?php echo get_the_post_thumbnail_url($post); ?>');">

                        <?php  if( ! empty( $categories ) ) { ?>
                            <p class="featured-category">
                                <?php echo esc_html( $categories[0]->name ); ?>
                            </p>
                        <?php } ?>

                        <div class="card-meta">
                            <h3><?php echo get_the_title($post); ?></h3>
                            <p><?php echo get_the_date('F jS, Y', $post); ?></p>
                        </div><!-- .card-meta -->

                    </div><!-- .featured-card -->
                </a><!-- .secondary-post -->

            <?php endforeach; wp_reset_postdata(); endif; ?>
        </div><!-- .secondary-posts -->

    <?php } else {  // If the user did not select posts, display the latest posts excluding the featured post
        $args = array(
            'post_type'      => 'post',
            'post__not_in'   => array($featured_id),
            'posts_per_page' => 4
        );
        
        $recent_posts = new WP_Query($args);

        if ( $recent_posts->have_posts() ) { ?>
            <div class="secondary-posts">
                <?php while ( $recent_posts->have_posts() ) { $recent_posts->the_post();
                    $categories = get_the_category(); ?>

                    <a href="<?php the_permalink(); ?>" class="secondary-post featured-link">
                        <div class="featured-card" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>');">

                            <?php  if( ! empty( $categories ) ) { ?>
                                <p class="featured-category">
                                    <?php echo esc_html( $categories[0]->name ); ?>
                                </p>
                            <?php } ?>

                            <div class="card-meta">
                                <h3><?php echo get_the_title(); ?></h3>
                                <p><?php echo get_the_date('F jS, Y'); ?></p>
                            </div><!-- .card-meta -->

                        </div><!-- .featured-card -->
                    </a><!-- .secondary-post -->

                <?php } ?>
            </div><!-- .secondary-posts -->
        <?php }
    } ?>

</div> <!-- .wp-block-posts -->