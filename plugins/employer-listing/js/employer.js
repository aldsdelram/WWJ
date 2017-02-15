jQuery( document ).ready( function($) {

	$(document).find('.emp--upload_box').each(function(){
		$(this).prepend('<div class="black_overlay_bg">');
	});

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
		var embed= "<iframe width='100%' height='300' frameborder='0' scrolling='no' marginheight='0' marginwidth='0'"+
		 	"src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( address ) +  "&amp;output=embed'></iframe>"; 
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

    var count = 1;
    $(document).find('.emp--upload_box').each(function(k,v){
    	the_id = $(this).attr('id');
    	if(the_id == null){
    		the_id = 'emp--upload_box_'+count;
    		$(this).attr('id', the_id);
    		count++;
    	}
    	var zone = new FileDrop(the_id, {input: false})
    	zone.multiple(false);
    	zone.event('send', function (files) {
		  // images() filter away all but image/* files:
		  files.images().each(function (file) {
		    file.readData(
		      function (uri) {
		        var img = new Image
		        img.src = uri
		        $(zone.el).attr('style', 'background-image: url(\''+ $(img).attr("src") + '\')');
		        $(zone.el).addClass('has-bg');
		        $(zone.el).find('.emp--upload-center').css('opacity', 0);
		        $(zone.el).find('.'+$(zone.el).find('.uploader').attr('data-target')).val($(img).attr("src"));
		      },
		      function (error) {
		        alert('Ph, noes! Cannot read your image.')
		      },
		      'uri'
		    )
		  })
		})
    });


    $(document).on('click', '.plus--repeater .fa-plus', function(){
    	container = $(this).closest('.plus--repeater');
    	to_repeat = container.find('.to_repeat').clone();
    	$(to_repeat).removeClass('to_repeat').addClass('repeated_row');
    	$(to_repeat).find('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
    	container.find('.repeated').prepend(to_repeat);
    	container.find('.to_repeat').find(':input').each(function(){
    		$(this).val('');
    	});
    });

    $(document).on('click', '.plus--repeater .fa-minus', function(){
    	$(this).closest('.repeated_row').remove();
    });


    $(document).on('change', '.uploader', function(){
    	target = '.' + $(this).attr('data-target');
    	container = $(this).closest('.emp--upload_box');
    	uploader(this, container, target);
        $(container).find('.emp--upload-center').css('opacity', 0);
        container.addClass('has-bg');
    });

    function uploader(input, targetContainer, targetField) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                b64Image = e.target.result;
                $(targetContainer).css('background-image', 'url(\''+b64Image+'\')');
                $(targetField).val(b64Image);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    } 


    form_id = $('.employer-reg-form-content').find('form').attr('id');

    validator = $('#'+form_id).validate({
	    rules:{
	        '.required':{
	            required: true
	        }
	    }
    });


    $(document).on('click', '.repeater_with_previews .btn_add', function(e){

	    $(document).find('.adder :input').each(function(){
	    	if($(this).attr('data-required')){
				$(this).addClass('required');    		
	    	}
	    });

    	var valid = true;
	    adder_container = $(this).closest('.repeater_with_previews').find('.adder');

	    adder_container.find(':input').each(function(i, v){
	        valid = validator.element(v) && valid;
	    });

	    if(!valid){
	        return;
	    }

    	found=false;
    	main_container = $(this).closest('.repeater_with_previews');
    	previews = $(this).closest('.repeater_with_previews').find('.previews');
		$(previews).find('.preview_container').each(function(){
			if($(this).hasClass('no-data') && !found){
				$(this).removeClass('no-data');
				container = $(this).find('.emp--upload_box');
		    	main_container.find('[data-name]').each(function(){
		    		container.find('[name^="'+$(this).attr('data-name')+'"]').val($(this).val());
		    	});
		    	input_uploader = main_container.find('[data-target-background]');
		    	container.css('background-image', 'url(\''+$(input_uploader).val()+'\'');
		    	found = true;
			}
		});
		$('[data-name]').each(function(){
			$(this).val('');
		});
		main_container.find('.emp--upload_box').each(function(){
			if($(this).has('.uploader').length == 1){
				$(this).css('background-image', 'none');
				$(this).removeClass('has-bg');
				$(this).find('.emp--upload-center').css('opacity', 1);
			}
		});
		count_of_no_data = 0;
		$(previews).find('.preview_container').each(function(){
			if($(this).hasClass('no-data')){
				count_of_no_data++;
			}
		});
		if(count_of_no_data == 0){
			adder_container.addClass('disable-upload');
		}
    });


    $(document).on('click', '.previews .edit', function(e){
    	adder_container = $(this).closest('.repeater_with_previews').find('.adder');
    	preview_container = $(this).closest('.preview_container');
    	the_id = $(this).attr('data-id');


    	adder_container.removeClass('disable-upload');
    	adder_container.addClass('editor');
    	adder_container.attr('data-target-id', the_id);

    	the_image = '';
    	preview_container.find('[data-edit]').each(function(){
    		adder_container.find('[data-name^="'+$(this).attr('data-edit')+'"]').val($(this).val());
    	});
    	preview_image_container = preview_container.find('[data-edit-background]');
    	adder_container.find('.emp--upload_box').css('background-image', 'url(\''+preview_image_container.val()+'\'');
    	adder_container.find('.emp--upload_box').addClass('has-bg');

	    btn_add = adder_container.find('.adder_button');
	    btn_add.removeClass('btn_add');
	    btn_add.addClass('btn_edit');
	    btn_add.html('EDIT');
    });


    $(document).on('click', '.editor .btn_edit', function(e){
    	adder_container = $(this).closest('.repeater_with_previews').find('.editor');
    	the_id = adder_container.attr('data-target-id');

    	main_container = $(this).closest('.repeater_with_previews');
    	previews = $(this).closest('.repeater_with_previews').find('.previews');

		$(previews).find('.preview_container').each(function(){
			if($(this).attr('data-id') == the_id){
				container = $(this).find('.emp--upload_box');
		    	main_container.find('[data-name]').each(function(){
		    		container.find('[name^="'+$(this).attr('data-name')+'"]').val($(this).val());
		    	});
		    	input_uploader = main_container.find('[data-target-background]');
		    	container.css('background-image', 'url(\''+$(input_uploader).val()+'\'');
		    	found = true;
			}
		});
		$('[data-name]').each(function(){
			$(this).val('');
		});
		main_container.find('.emp--upload_box').each(function(){
			if($(this).has('.uploader').length == 1){
				$(this).css('background-image', 'none');
				$(this).removeClass('has-bg');
				$(this).find('.emp--upload-center').css('opacity', 1);
			}
		});

	    btn_add = main_container.find('.adder_button');
	    btn_add.removeClass('btn_edit');
	    btn_add.addClass('btn_add');
	    btn_add.html('ADD');

	    count_of_no_data = 0;
		$(previews).find('.preview_container').each(function(){
			if($(this).hasClass('no-data')){
				count_of_no_data++;
			}
		});
		if(count_of_no_data == 0){
			adder_container.addClass('disable-upload');
		}
    });

    // $('#employer1').validate({
	   //  rules:{
	   //      '.required':{
	   //          required: true
	   //      }
	   //  }
    // });    


    $(document).on('focus', '.adder :input', function(){
    	if($(this).attr('data-required')){
			$(this).addClass('required');    		
    	}
    });

    $('.ebs--link').click(function(){
    	$('.adder').find(':input').each(function(){
    		$(this).removeClass('required');
    	});
    });


    $('.cp--testi_slider').slick({
        arrows: false,
        dots: true,
	  	infinite: true,
	  	speed: 300,
	  	slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
	  	responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: true,
		        arrows: false,
		        dots: true
		      }
		    },
		    {
		      breakpoint: 992,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        infinite: true,
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
		        dots: true
		      }
		    }
		]
    });


});

