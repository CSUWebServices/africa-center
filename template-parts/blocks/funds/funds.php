<?php

/**
 * Funds Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'funds-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'funds';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$funds = get_field('funds') ?: 'Select funds to display';

if( $funds ) { ?>
    <div class="wp-block-funds">
    	<div class="funds-list" data-aos="zoom-in-up">
    		<?php foreach($funds as $fund) { 

        	$image = get_the_post_thumbnail( $fund->ID, 'fund' );
            $image_link = get_the_post_thumbnail_url( $fund->ID, 'fund' );
            $permalink = get_permalink( $fund->ID );
            $link = get_field('fund_link', $fund);
            $title = get_the_title( $fund->ID );
            $excerpt = get_the_excerpt( $fund->ID ); ?>
            <?php /*
        		<a class="fund-card" href="<?php echo $permalink; ?>">
        			<?php if($image) {
        				echo $image;
        			} ?>
                    <div class="card-content">
                        <h3><?php echo $title; ?></h3>
                        <?php if($excerpt) {
                            echo '<p>' . $excerpt . '</p>';
                        } ?>
                    </div> <!-- .card-content -->
        		</a>
            */ ?>

                <a class="fund-card" href="<?php echo $link; ?>">
                    <div class="image-title" style="background-image:url('<?php echo $image_link; ?>');">
                        <h3><?php echo $title; ?></h3>
                    </div> <!-- .image-title -->
                    <div class="card-content">
                        <?php if($excerpt) { 
                            echo '<p class="fund-excerpt">' . $excerpt . '</p>';
                         } else {
                            echo '<p></p>';
                         } ?>
                        <p class="card-give-now">Give Now &raquo;</p>
                    </div> <!-- .card-content -->
                </a>
    		<?php } ?>
    	</div> <!-- .funds-list -->

        <div class="funds-additional-support">
            <?php 
                $url = $_SERVER["REQUEST_URI"];
                $isPassion = strpos($url, 'passions');
                if( $isPassion ) {
                    $title = get_the_title();
                } else {
                    $title = 'CSU';
                }
            ?>
            <p>Contact us for more ways to support <?php echo $title; ?>.</p>
            <p class="funds-contact-info">
                (970) 491-1895  |  <a href="mailto:support@colostate.edu">support@colostate.edu</a>
            </p>
        </div> <!-- .funds-additional-support -->

    </div> <!-- .wp-block-funds -->
<?php }