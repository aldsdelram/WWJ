<?php

	function jobseeker_faq_func() {
		ob_start();
	?>
		
		<div class="jobseeker-faq">
			<?php
				$query = new WP_Query( array(
					'post_type'		=> 'jobseeker_faq',
					'orderby'		=>	'ID',
					'order'			=>	'asc'
				));
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
			?>
				<section class="accord-section">
					<header class="accord-header"><?= get_the_title(); ?></header>
					<div class="accord-content">
						<?= get_the_content(); ?>
					</div> <!-- end of .accord-content -->
				</section>
			<?php endwhile; endif; ?>
		</div> <!-- end of .jobseeker-faq -->

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'jobseeker_faq', 'jobseeker_faq_func' );