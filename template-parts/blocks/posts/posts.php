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
$className = 'posts';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$header = get_field('header');
$category = get_field('category') ?: 'Select category of posts to display';
$category_title = get_cat_name($category);

global $post;

$catPosts = get_posts( array(
    'posts_per_page' => 3,
    'category'       => $category
) );

if( $catPosts ) { ?>
    <div class="wp-block-posts alignfull">
        <?php /* <h2 class="section-title"><?php echo $category_title; ?> Stories</h2> */ ?>
        <?php if( $header ) { ?>
            <h2 class="section-title"><?php echo $header; ?></h2>
        <?php } ?>
    	<div class="posts-list grid" data-aos="fade-up">
    		<?php foreach($catPosts as $post) { 
                setup_postdata( $post );

            	$image = get_the_post_thumbnail( $post->ID, 'large' );
                $permalink = get_permalink( $post->ID );
                $title = get_the_title( $post->ID );
                $excerpt = get_the_excerpt( $post->ID );
                if($image) {
                    $image_link = get_the_post_thumbnail_url( $post->ID, 'large' );
                } else {
                    $image_link = get_field('default_image', 'option');
                } ?>
        		<a class="post-card" href="<?php echo $permalink; ?>">
        			<div class="image-title" style="background-image:url('<?php echo $image_link; ?>');">
                        <h3><?php echo $title; ?></h3>
                    </div> <!-- .image-title -->
                    <div class="card-content">
                        <!-- <h3><?php echo $title; ?></h3>
                        <hr /> -->
                        <?php echo '<p class="date">' . get_the_date() . '</p>'; ?>
                        <?php if($excerpt) {
                            echo '<p class="excerpt">' . $excerpt . '</p>';
                        } ?>
                    </div> <!-- .card-content -->
        		</a>
    		<?php } wp_reset_postdata(); ?>
    	</div> <!-- .posts-list -->
        <div class="more-stories" data-aos="zoom-in" data-aos-delay="500">
            <a class="button" href="/blog">More Impact Stories</a>
        </div> <!-- .more-stories -->
    </div> <!-- .wp-block-posts -->
<?php }