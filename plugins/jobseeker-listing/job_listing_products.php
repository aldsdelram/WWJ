<?php

	function jobseeker_products_func() {
		ob_start();
	?>

		<div class="jobseeker-products">
			<?php
				$query = new WP_Query( array(
					'post_type'	=> 'product',
					'orderby'	=> 'ID',
					'order'		=> 'asc',
					'tax_query' => array(
						array(
							'taxonomy'	=>	'product_cat',
							'field'		=>	'slug',
							'terms'		=>	'jobseeker'
						)
					)
				));
			?>
			<?php if ( $query->have_posts() ) : ?>
				<ul class="product-list">
					<?php
						while ( $query->have_posts() ) :
						$query->the_post();
						$img_bg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						global $product;
					?>
						<li class="list-item" id="product_<?= get_the_ID(); ?>">
							<h3 class="title"><?= get_the_title(); ?></h3>
							<div class="img-container" style="background: url( '<?= $img_bg[0]; ?>' ) no-repeat center; background-size: cover;"></div>
							<div class="product-details">
								<?php the_content(); ?>
								<div class="credits"><?php the_excerpt(); ?></div>
								<div class="btn-panel">
									<!--a href="<?= do_shortcode( '[add_to_cart_url id="' . get_the_ID() . '"]' ); ?>">Get Now</a-->

									<a href="#product_<?= get_the_ID(); ?>" class="get_now_button" data-product="<?= get_the_ID() ?>">Get Now</a>
								</div> <!-- end of .btn-panel -->
							</div> <!-- end of .product-details -->
						</li>
					<?php endwhile; ?>
				</ul>
			<?php wp_reset_postdata(); endif; ?>
		</div> <!-- end of .jobseeker-products -->

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'jobseeker_products', 'jobseeker_products_func' );

	function employer_products_func() {
		ob_start();
	?>

		<div class="employer-products">
			<?php
				$query = new WP_Query( array(
					'post_type'	=> 'product',
					'orderby'	=> 'ID',
					'order'		=> 'asc',
					'tax_query' => array(
						array(
							'taxonomy'	=>	'product_cat',
							'field'		=>	'slug',
							'terms'		=>	'employer'
						)
					)
				));
			?>
			<?php if ( $query->have_posts() ) : ?>
				<ul class="product-list">
					<?php
						while ( $query->have_posts() ) :
						$query->the_post();
						$img_bg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						global $product;
					?>
						<li class="list-item" id="product_<?= get_the_ID(); ?>">
							<h3 class="title"><?= get_the_title(); ?></h3>
							<div class="img-container" style="background: url( '<?= $img_bg[0]; ?>' ) no-repeat center; background-size: cover;"></div>
							<div class="product-details">
								<?php the_content(); ?>
								<div class="credits"><?php the_excerpt(); ?></div>
								<div class="btn-panel">
									<!--a href="<?= do_shortcode( '[add_to_cart_url id="' . get_the_ID() . '"]' ); ?>">Get Now</a-->

									<a href="#product_<?= get_the_ID(); ?>" class="get_now_button" data-product="<?= get_the_ID() ?>">Get Now</a>
								</div> <!-- end of .btn-panel -->
							</div> <!-- end of .product-details -->
						</li>
					<?php endwhile; ?>
				</ul>
			<?php wp_reset_postdata(); endif; ?>
		</div> <!-- end of .jobseeker-products -->

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'employer_products', 'employer_products_func' );

	function career_toolkit_func() {
		ob_start();
	?>
		
		<ul class="toolkit-list">
			<?php
				$query = new WP_Query( array(
					'post_type'	=> 'product',
					'orderby'	=> 'ID',
					'order'		=> 'asc',
					'tax_query' => array(
						array(
							'taxonomy'	=>	'product_cat',
							'field'		=>	'slug',
							'terms'		=>	'credit-joseeker'
						)
					)
				));
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						$first_name = explode( ' ', strtolower( get_the_title() ) );
						$price = get_post_meta( get_the_ID(), '_regular_price', true );
						$credits = get_post_meta( get_the_ID(), '_credits_amount', true );
			?>
				<li class="list-item">
					<div class="<?= '_' . $first_name[0]; ?>">
						<header class="item-header">
							<h3><?= get_the_title(); ?></h3>
							<p><?= get_the_excerpt(); ?></p>
						</header> <!-- end of .item-header -->
						<div class="price">
							<span class="number"><?= $price; ?></span>
						</div>
						<div class="details">
							<div class="product-credits">
								<div class="tagline"><?= get_field( 'tagline', get_the_ID() ); ?></div>
								<div class="credits"><?= $credits . ' Credits'; ?></div>
								<div><?= get_the_content(); ?></div>
							</div> <!-- end of .product-details -->
							<div class="btn-panel">
								<a href="javascript:void(0)" onclick="javascript:document.getElementById('add_to_cart_<?= get_the_ID(); ?>').submit();">Buy</a>
								<form id="add_to_cart_<?= get_the_ID(); ?>" method="post"><input name="add-to-cart" value="<?= get_the_ID(); ?>" type="hidden"><input name="wpuw_add_product" value="1" type="hidden"></form>
							</div>
						</div>
					</div>
				</li>
			<?php endwhile; endif; ?>
		</ul>

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'career_toolkit', 'career_toolkit_func' );

	function employer_career_toolkit_func() {
		ob_start();
	?>
		
		<ul class="toolkit-list">
			<?php
				$query = new WP_Query( array(
					'post_type'	=> 'product',
					'orderby'	=> 'ID',
					'order'		=> 'desc',
					'tax_query' => array(
						array(
							'taxonomy'	=>	'product_cat',
							'field'		=>	'slug',
							'terms'		=>	'credit-employer'
						)
					)
				));

				$mostpopular_count = 0;

				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						$first_name = explode( ' ', strtolower( get_the_title() ) );
						$price = get_post_meta( get_the_ID(), '_regular_price', true );
						$credits = get_post_meta( get_the_ID(), '_credits_amount', true );
			?>
				<li class="list-item">
					<div class="<?= '_' . $first_name[0]; ?>">
						<?php if( $mostpopular_count == 1 ) : ?>
							<img src="<?= wp_get_attachment_url(933); ?>" alt="Most Popular" class="most-popular-badge">
						<?php endif; ?>
						<header class="item-header">
							<h3><?= get_the_title(); ?></h3>
							<p><?= get_the_excerpt(); ?></p>
						</header> <!-- end of .item-header -->
						<div class="price">
							<span class="number"><?= $price; ?></span>
						</div>
						<div class="details">
							<div class="product-credits">
								<div class="tagline"><?= get_field( 'tagline', get_the_ID() ); ?></div>
								<div class="credits"><?= $credits . ' Credits'; ?></div>
								<div><?= get_the_content(); ?></div>
							</div> <!-- end of .product-details -->
							<div class="btn-panel">
								<a class="hvr-underline-from-center" href="javascript:void(0)" onclick="javascript:document.getElementById('add_to_cart_<?= get_the_ID(); ?>').submit();">Buy</a>
								<form id="add_to_cart_<?= get_the_ID(); ?>" method="post"><input name="add-to-cart" value="<?= get_the_ID(); ?>" type="hidden"><input name="wpuw_add_product" value="1" type="hidden"></form>
							</div>
						</div>
					</div>
				</li>
			<?php $mostpopular_count++; endwhile; endif; ?>
		</ul>

	<?php
		return ob_get_clean();
	}
	add_shortcode( 'employer_career_toolkit', 'employer_career_toolkit_func' );