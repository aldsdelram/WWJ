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

	function showmap(address) {
		var embed= "<iframe width='100%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( address ) +  "&amp;output=embed'></iframe>"; 
		$("#mapContainer").html(embed);
		$('.addresstomap').addClass('scrolloffmap');
	}

	showmap("");

	$("#location_address").on("keyup", function(e) {
		var addr = $(this).val();
		showmap(addr);
	});


	// ______ scroll map fix
	$('.gmap_div iframe').addClass('scrolloffmap');
	
    $('.gmap_div').on('click', function () {
        $(this).find('iframe').removeClass('scrolloffmap');
    });

    $(".gmap_div iframe").mouseleave(function () {
        $(this).addClass('scrolloffmap'); 
    });
});

