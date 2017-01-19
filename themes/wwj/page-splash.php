<?php get_header(); ?>

	<div id="<?= str_replace( ' ', '-', strtolower( get_the_title() ) ) . '-content' ?>" class="content-details">
		<div class="logo-container text-xs-center">
			<img src="<?= home_url( 'skubbswp/wp-content/uploads/2016/12/logo-splash.png' ); ?>" />
		</div> <!-- end of .logo-container -->
		<div class="splash-details rd-row rd-middle-xs rd-center-xs">
			<div>
				<div class="rd-row rd-center-xs rd-middle-md rd-bottom-xs">
					<div class="rd-col-xs-6 rd-col-lg-auto rd-order-lg-1 rd-order-xs-2">
						<div class="employer">
							<div class="icon text-xs-center"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2016/12/icon-employer.png' ); ?>"/></div>
							<a href="<?= home_url( 'employer/home' ); ?>" class="link-to-home">Employer</a>
						</div> <!-- end of .employer -->
					</div>
					<div class="rd-col-xs-12 rd-col-lg-auto text-xs-center rd-order-lg-2 rd-order-xs-1">
						<img src="<?= home_url( 'skubbswp/wp-content/uploads/2016/12/icon-coat.png' ); ?>" class="icon-coat" />
					</div>
					<div class="rd-col-xs-6 rd-col-lg-auto rd-order-lg-3 rd-order-xs-3">
						<div class="jobseeker">
							<div class="icon text-xs-center"><img src="<?= home_url( 'skubbswp/wp-content/uploads/2016/12/icon-jobseeker.png' ); ?>" /></div>
							<a href="<?= home_url( 'jobseeker/home' ); ?>" class="link-to-home">Jobseeker</a>
						</div> <!-- end of .jobseeker -->
					</div>
				</div>
			</div>
		</div> <!-- end of .splash-details -->
	</div> <!-- end of .content-details -->

<?php get_footer(); ?>