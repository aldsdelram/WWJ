<?php get_header(); ?>

	<section id="main-section">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; endif ?>
	</section> <!-- end of #main-section -->

<?php get_footer(); ?>