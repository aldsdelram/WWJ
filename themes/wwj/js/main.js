var listObj = null;
var listObj2 = null;

jQuery( document ).ready( function($) {

	if ($( '.arrow-top' ).length) {
	    var scrollTrigger = 200, // px
	        backToTop = function () {
	            var scrollTop = $(window).scrollTop();
	            if (scrollTop > scrollTrigger) {
	                $( '.arrow-top' ).addClass('show');
	            } else {
	                $( '.arrow-top' ).removeClass('show');
	            }
	        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $( '.arrow-top' ).on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}

	// =dashboard =sidebar
	$( '.toggle-sidebar' ).on( 'click', function() {
		$( this ).closest( '.dashboard-page' ).toggleClass( 'close-sidebar' );

		if($('.sidebar--container').is(':visible')) {
		    $('.sidebar--container').fadeOut(150);
		} else {
			$('.sidebar--container').delay(200).fadeIn(500);
		}

	});

	$(document).on('click', '.has-sub-menu', function(e){
		e.preventDefault();
		$(this).parent().toggleClass('active');
		$(this).next('.sub-menu').slideToggle('fast');
		$(this).find('i').toggleClass('fa-caret-down fa-caret-right');
	});


	//calendar
	$( function() {
		$( '.datepicker' ).datepicker({

		});
	});

	$(document).on('focus', '.input-field', function(){
			focus_field( this );
	});
	$(document).on('blur', '.input-field', function() {
			out_focus_field( this );
	});


	$(document).on('focus', '.dropdown-data', function(event) {
		$( this ).closest( '.dropdown-input').addClass( 'opened' );
		event.stopPropagation();
	});

	$(document).on( 'click', '.dropdown-input > ul > li', function(event) {
		var text = $( this ).html();
		$( this ).closest( '.dropdown-input' ).find( '.dropdown-data' ).val( text );
		$( this ).closest( '.dropdown-input' ).removeClass( 'opened' );
		event.stopPropagation();
	});

	$( 'html' ).on( 'click', function() {
		if(!$(".dropdown-input input").is(":focus"))
			$( '.dropdown-input' ).removeClass( 'opened' );
	});

	$(document).find( '.dropdown-input' ).blur(function(){
		$(this).removeClass( 'opened' );
	});

	//auto expand textarea
	jQuery.each(jQuery('textarea[data-autoresize]'), function() {
	    var offset = this.offsetHeight - this.clientHeight;
	 
	    var resizeTextarea = function(el) {
	        jQuery(el).css('height', 'auto').css( 'height', el.scrollHeight + offset );
	    };

	    jQuery( this ).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
	});

	//field repeater
	// $( '#add-field' ).on( 'click', function() {
	// 	var repeat = $( '.fields-repeater' ).html();
	// 	$( '.fields-repeated' ).append( '<div><div class="delete-field" onClick="delete_field( this );"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>' + repeat + '</div>' );
	// 	return false;
	// });

	$( '.language-item input[type=checkbox]' ).change( function() {
		if ( $( this ).is( ':checked' ) ) {
			$( this ).closest( '.language-item' ).find( '.language-show' ).show( 500 );
		} else {
			$( this ).closest( '.language-item' ).find( '.language-show' ).hide( 500 );	
		}
	});
	
	//modal scripts
	$(document).on('click', '.show-modal' , function() {
		var modal = $( this ).data( 'modal' );

		$( 'html' ).css( 'overflow', 'hidden' );
		$( modal ).fadeIn();
	});

	$(document).on('click', '.close-modal', function() {
		$( 'html' ).css( 'overflow-y', 'scroll' );
		$( this ).closest( '.modal-area' ).fadeOut();
	});

	//accordion
	$( '.accord-header' ).on( 'click', function() {
		if ( $( this ).next( 'div' ).is( ':visible' ) ) {
			$( this ).next( 'div' ).slideUp();
			$( '.accord-header' ).removeClass( 'active' );
		} else {
			$( '.accord-content' ).slideUp();
			$( this ).next( 'div' ).slideToggle();
			$( '.accord-header' ).removeClass( 'active' );
			$ ( this ).addClass( 'active' );
		}
	});

		// pagination
	var paginationTopOptions = {
		name: "paginationTop",
		paginationClass: "paginationTop"
	};
	var paginationBottomOptions = {
		name: "paginationBottom",
		paginationClass: "paginationBottom"
	};
	var listOptions = {
		valueNames: [ 'desired_position', 'industry', 'salary', 'region', 'availability', 'yoe'],
		page: 8,
		indexAsync: true,
		plugins: [
		    ListPagination(paginationTopOptions),
		    ListPagination(paginationBottomOptions)
		]
	};
	listObj = new List('candidateListing-container', listOptions);


	var paginationTopOptions2 = {
		name: "paginationTop",
		paginationClass: "paginationTop"
	};
	var paginationBottomOptions2 = {
		name: "paginationBottom",
		paginationClass: "paginationBottom"
	};
	var listOptions2 = {
	valueNames: [ 'job_title', 'job_type', 'job_region', 'category' ],
	page: 5,
	plugins: [
	    ListPagination(paginationTopOptions2),
	    ListPagination(paginationBottomOptions2)
	]
	};

	//debugger;
	listObj2 = new List('jobListing-container', listOptions2);

	// learn more accordion
	jQuery('.lm--accord_set .fa').on( 'click', function(event) {
		jQuery(this).toggleClass('fa-minus', 'fa-plus');
	    jQuery(this).closest('.lm--accord_set').find('.lma--toggle_content').slideToggle('fast');
	});
	

	jQuery('.testimonial-fade').slick({
	    swipe: false,
	    touchMove: false,
	    swipeToSlide: false,
	    arrows: true,
	    dots: true,
	    infinite: false,
	    speed: 300,
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    autoplay: false,
	    autoplaySpeed: 5000,
	    responsive: [
	        {
	          breakpoint: 1024,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1,
	            infinite: false,
	            arrows: false,
	            dots: true
	          }
	        },
	        {
	          breakpoint: 992,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1,
	            infinite: false,
	            arrows: false,
	            dots: true
	          }
	        },
	        {
	          breakpoint: 641,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1,
	            arrows: false,
	            dots: true
	          }
	        },
	        {
	          breakpoint: 541,
	          settings: {
	            slidesToShow: 1,
	            slidesToScroll: 1,
	            arrows: false,
	            dots: false
	          }
	        }
	    ]
	});

	jQuery('.cm--invite_btn').on('click', function(e) {
		e.preventDefault();
		jQuery('.cm--invite_form').slideToggle('fast');

		if( jQuery('.cm--unlock_form').is(':visible') ) {
			jQuery('.cm--unlock_form').slideToggle('fast');
		}
	});

	jQuery('.cm--unlock_btn, .cm--unlock_no').on('click', function(e) {
		e.preventDefault();
		jQuery('.cm--unlock_form').slideToggle('fast');

		if( jQuery('.cm--invite_form').is(':visible') ) {
			jQuery('.cm--invite_form').slideToggle('fast');
		}
	});

});


function delete_field( $delete_field ) {
	jQuery( $delete_field ).parent( 'div' ).remove();
}

function focus_field( $focus_field ) {
	jQuery( $focus_field ).closest( '.form-group' ).addClass( 'focused' );
}

function out_focus_field( $out_focus_field ) {
	jQuery( $out_focus_field ).closest( '.form-group' ).removeClass( 'focused' );
}


jQuery(document).on('focus', '.input-field', function(){
	jQuery(this).closest('.form-group').addClass('focused');
});

jQuery(document).on('blur', '.input-field', function(){
	jQuery(this).closest('.form-group').removeClass('focused');
});








