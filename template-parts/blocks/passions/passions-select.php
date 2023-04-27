<div class="passions-select-wrapper alignfull">
	<?php 
		$args = array (
		    'post_type'              => 'passions',
		    'numberposts'            => -1,
		    'post__not_in'           => array(get_the_ID())
		);

		$query = new WP_Query( $args );

		if( $query->have_posts() ): ?>
			<div class="passions-headline">
				<h2>Explore Your Passions</h2>
				<p>Select a passion to learn more.</p>
			</div> <!-- .passions-meta -->
			<dl class="passions-grid" data-aos="fade-up">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php 
						$id = get_the_ID();
						$icon = get_field('icon', $id); 
						$fund = get_field('featured_fund', $id);
					?>
					<dt tabindex="0">
						<?php if($icon) {
							echo '<img src="' . $icon . '" alt="">';
						} ?>
						<?php the_title(); ?>
					</dt>
					<dd>
						<div>
							<div class="passion-image">
								<?php echo get_the_post_thumbnail(); ?>
							</div> <!-- .passion-image -->
							<div class="passion-meta <?php if( !$fund ){echo 'no-fund';} ?>">
								<?php if( $fund ): ?>
									<div class="featured-fund">
										<?php $link = get_field('fund_link', $fund); ?>
										<a class="featured-fund-link" href="<?php echo $link; ?>">
											<p>Featured Fund: </p>
											<h3><?php echo get_the_title( $fund ); ?></h3>
										</a>
									</div> <!-- .featured-fund -->
								<?php endif; ?>
								<div class="passion-description">
									<?php echo get_the_excerpt(); ?>
									<br />
									<a class="button" href="<?php echo get_permalink(); ?>">Support <?php echo get_the_title(); ?></a>
								</div> <!-- .passion-description -->
							</div> <!-- .passion-meta -->
						</div>
					</dd>
				<?php endwhile; ?>
			</dl> <!-- .passions-grid -->
			<?php wp_reset_postdata();
		endif;
	?>
</div> <!-- .passions-select -->