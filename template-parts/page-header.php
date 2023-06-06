<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$default_images = get_field('default_images', 'option');
shuffle($default_images);
$default_image = $default_images[0];
$position = get_field('image_position');
$hide_thumbnail = get_field('no_header_image');
if( has_post_thumbnail() ) {
	$header_image = $featured_image;
} else {
	$header_image = $default_image;
} ?>

<?php if( $hide_thumbnail ) { // Hide the header image and display just the title and subtitle ?>

<header class="page-header entry-header no-header-image">
<?php $subtitle = get_field('subtitle'); ?>
	<div class="title-container" data-aos="fade-up" data-aos-duration="1000">
		<div class="title-inner">
			<?php if( $subtitle ): ?>
				<div class="subtitle-inner">
					<?php echo '<h2 class="small-title">' . $subtitle . '</h2>'; ?>
				</div> <!-- .subtitle-container -->
			<?php endif; ?>
			<?php the_title( '<h1 class="large-title">', '</h1>' ); ?>
		</div> <!-- .title-only -->
	</div> <!-- .title-container -->

</header><!-- .entry-header -->

<?php } else { // Display the header image ?>

<header class="page-header entry-header" style="background-image:url('<?php echo $header_image; ?>'); background-position: <?php if($position == 'top') {echo 'top';} elseif($position == 'center') {echo 'center';} elseif($position == 'bottom') {echo 'bottom';} ?>">
<?php $subtitle = get_field('subtitle'); ?>
	<div class="title-container" data-aos="fade-up" data-aos-duration="1000">
		<div class="title-inner">
			<?php if( $subtitle ): ?>
				<div class="subtitle-inner">
					<?php echo '<h2 class="small-title">' . $subtitle . '</h2>'; ?>
				</div> <!-- .subtitle-container -->
			<?php endif; ?>
			<?php the_title( '<h1 class="large-title">', '</h1>' ); ?>
		</div> <!-- .title-only -->
	</div> <!-- .title-container -->

</header><!-- .entry-header -->

<?php } ?>