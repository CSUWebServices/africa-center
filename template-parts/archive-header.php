<?php
$queried_obj = get_queried_object();
$image_id = get_post_thumbnail_id( $queried_obj->ID );
$header_image = wp_get_attachment_url( $image_id );
$default_image = get_field('default_image', 'option');
$position = get_field('image_position');
if( $header_image ) { ?>
	<header class="page-header entry-header custom-header-image" style="background-image:url('<?php echo $header_image; ?>'); background-position: <?php if($position == 'top') {echo 'top';} elseif($position == 'center') {echo 'center';} elseif($position == 'bottom') {echo 'bottom';} ?>">
<?php } else { ?>
	<header class="page-header entry-header default-header-image" style="background-image:url('<?php echo $default_image; ?>');">
<?php } ?>

		<div class="entry-header-wrapper" data-aos="fade-up" data-aos-duration="1000">
			<div class="title-container">
				<div class="title-inner">
					<?php // the_archive_title( '<h1 class="large-title">', '</h1>' ); ?>
					<h1 class="large-title"><?php the_archive_title(); ?></h1>
				</div> <!-- .title-only -->
			</div> <!-- .title-container -->
		</div> <!-- .entry-header-wrapper -->

	</header><!-- .entry-header -->