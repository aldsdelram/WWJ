<?php get_header(); ?>

	<section id="main-section">
		<div id="<?= str_replace( ' ', '-', strtolower( get_the_title() ) ) . '-content' ?>" class="content-details">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif ?>
		</div>
	</section> <!-- end of #main-section -->

<?php get_footer(); ?>