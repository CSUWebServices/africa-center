<div class="cta-content">
	<?php if($heading || $subheading): ?>
		<div class="cta-heading-wrapper" data-aos="fade-down" data-aos-duration="1000">
	<?php endif; ?>
		<?php if( $heading ): ?>
			<h2 class="cta-heading"><?php echo $heading; ?></h2>
		<?php endif; ?>

		<?php if( $subheading ): ?>
			<h3 class="cta-subheading"><?php echo $subheading; ?></h3>
		<?php endif; ?>
	<?php if($heading || $subheading): ?>
		</div> <!-- .cta-heading-wrapper -->
	<?php endif; ?>

	<?php if( $link ): ?>
		<div class="button-wrapper" data-aos="zoom-in" data-aos-delay="750">
			<a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
		</div>
	<?php endif; ?>
</div> <!-- .cta-content -->