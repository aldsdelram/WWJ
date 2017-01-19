		<footer id="main-footer" class="<?= str_replace( ' ', '-', strtolower( get_the_title() ) ) . '-footer' ?>">
			<?php if ( !is_page( 'splash' ) ): ?>
				<div class="google-map">
					<h3>Address:</h3>
					<p>400 Orchard Road #09-08 Singapore 238875</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.780303929788!2d103.82671431416932!3d1.306990999046742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da198cc0aefd57%3A0xca8ff9109e38059!2s400+Orchard+Rd%2C+Singapore+238875!5e0!3m2!1sen!2ssg!4v1482376814182" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div> <!-- end of .google-map -->
				<div class="information">
					<div class="container">
						<div class="rd-row rd-between-xs">
							<div class="rd-col-md-6 rd-col-xs-12">
								<?php dynamic_sidebar( 'footer-1' ) ?>
							</div>
							<div class="rd-col-md-6 rd-col-xs-12">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
						</div>
					</div> <!-- end of .container -->
				</div> <!-- end of .information -->
				<div class="other-information">
					<div class="container">
						<div class="rd-row rd-between-xs rd-middle-xs">
							<div class="rd-col-md-4 rd-col-xs-12">
								<div class="copyright">&copy; 2015 WorkWorkJay. All Rights Reserved</div>
							</div>
							<div class="rd-col-md-4 rd-col-xs-12 text-xs-center">
								<!-- a href="#main-header"><i class="fa fa-arrow-circle-up fa-fw fa-lg" aria-hidden="true"></i></a-->
							</div>
							<div class="rd-col-md-4 rd-col-xs-12">
								<ul class="social-links rd-row rd-end-md rd-middle-xs">
									<li>
										<a href="#"><i class="fa fa-facebook fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-twitter fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-google-plus fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-instagram fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-pinterest-p fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-vimeo fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-linkedin fa-fw fa-lg" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div> <!-- end of .other-information -->
			<?php else: ?>
				<div class="company-details rd-row rd-center-xs">
					<ul class="rd-row rd-middle-xs">
						<li>WorkWorkJay Private Limited</li>
						<li>400 Orchard Road #09-08 Singapore 238875</li>
					</ul>
				</div> <!-- end of .company-details -->
				<div class="registration-number rd-row rd-center-xs">
					<ul class="rd-row rd-middle-xs">
						<li>EA Registration Number 15C7486</li>
						<li>RCB 201434206M</li>
					</ul>
				</div>
				<p class="copyright text-xs-center">Copyright &copy; <?= date( 'Y' ); ?> WORKWORK JAY</p>
			<?php endif ?>	
		</footer> <!-- end of #main-footer -->
	</main> <!-- end of #main-wrapper -->
	<div class="arrow-top">
		<a href="#" id="back-to-top" title="Back to top"><i class="fa fa-arrow-up fa-fw fa-lg" aria-hidden="true"></i></a>
	</div>
	<?php get_template_part( 'includes/modal', 'templates' ); ?>
	<?php wp_footer(); ?>
	
</body> 
</html>