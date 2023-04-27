<?php
$header_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
$default_image = get_field('default_image', 'option');
$position = get_field('image_position');
if( has_post_thumbnail() ) { ?>
	<header class="page-header entry-header custom-header-image" style="background-image:url('<?php echo $header_image; ?>'); background-position: <?php if($position == 'top') {echo 'top';} elseif($position == 'center') {echo 'center';} elseif($position == 'bottom') {echo 'bottom';} ?>">
<?php } else { ?>
	<header class="page-header entry-header default-header-image" style="background-image:url('<?php echo $default_image; ?>');">
<?php } ?>

		<div class="entry-header-wrapper" data-aos="fade-up" data-aos-duration="1000">
			<?php $subtitle = get_field('subtitle');
			if( $subtitle ) { ?>
				<div class="title-subtitle">
					<div class="subtitle-inner">
						<?php the_title( '<h1 class="small-title">', '</h1>' ); ?>
					</div> <!-- .subtitle-container -->
					<div class="title-container">
						<div class="title-inner">
							<?php echo '<h2 class="large-title">' . $subtitle . '</h2>'; ?>
						</div> <!-- .title-inner -->
					</div> <!-- .title-container -->
				</div> <!-- .title-subtitle -->
			<?php } else { ?>
				<div class="title-container">
					<div class="title-inner">
						<?php the_title( '<h1 class="large-title">', '</h1>' ); ?>
					</div> <!-- .title-only -->
				</div> <!-- .title-container -->
			<?php } ?>
		</div> <!-- .entry-header-wrapper -->

	</header><!-- .entry-header -->