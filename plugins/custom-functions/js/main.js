jQuery( document ).ready( function( $ ) {
	$( '#select-status' ).on( 'change', function() {
		if ( $( this ).val() == 'employer' ) {
			window.location =home_url + '/employer/home' ;
		} else {
			window.location = home_url + '/jobseeker/home' ;
		}
	});

});