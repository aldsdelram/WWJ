jQuery( document ).ready( function($) {
	$( '.searchHistory-list' ).slick({
		slidesToShow 	: 4,
		slidesToScroll 	: 4,
		dots 			: true,
		arrows 			: false
	});

	$( '.phoneSlider-list' ).slick({
		slidesToShow 	: 5,
		slidesToScroll 	: 1,
		dots 			: false,
		arrows 			: true,
		centerMode 		: true,
		centerPadding 	: '0px',
		swipe 			: false,
		swipeToSlide 	: false,
		touchMove 		: false,
		zIndex 			: 9999
	});

	$( '.slick-arrow' ).on( 'click', function() {
		$( '.phoneSlider-list' ).css( 'z-index', '0' );
		setTimeout( function() {
			$( '.phoneSlider-list' ).css( 'z-index', '2' );
		}, 500 );
	})
});