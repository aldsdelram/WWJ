/*___________________________________MAIN FUNCTIONS___________________________________*/
(function($) { 

    /* THE GLOBALS */

    /* MAIN FUNCTION */
    $(document).ready(function(){
        init();
        onChanges();
        onClick();

    });

    /* ____________REUSABLE FUNCTIONS_____________*/


    /* ____________FUNCTIONS FOR MAIN____________*/

        //to initialize the inputs and everything
        function init(){
            $('.wwj--custom_calendar').datepicker();

            $('[data-toggle="tooltip"]').tooltip(); 
        }

        /*EVENT LISTENERS*/

        //on change
        function onChanges(){

    		$( '#select-status' ).on( 'change', function() {
				if ( $( this ).val() == 'employer' ) {
					window.location =home_url + '/employer/home' ;
				} else {
					window.location = home_url + '/jobseeker/home' ;
				}
			});

        }


        //on click
        function onClick(){

        	$('.get_now_button').each(function(){
        		$(this).click(function(e){
	        	    e.preventDefault();
	        		product_id = $(this).attr('data-product');
	                the_element = $(this);
	                jQuery.ajax({
	                    url: ajax_url,
	                    type: "POST",
	                    data: {
	                        action: "add_to_cart",
	                        product_id: product_id,
	                    },
	                    cached: false,
	                    dataType: 'json',
	                    success: function(response) {
	                    	console.log(response);
	                        if(response.status){
	                        	$('.add_to_cart_modal_container').fadeIn("fast");
	                        }
	                    }
	                });
        		});
        	});

        	$('.add_to_cart_modal_container .no').click(function(e){
        		e.preventDefault();
        		$('.add_to_cart_modal_container').fadeOut("fast");
        	});


            // MAIN MODAL FUNCTION 
            function modalClick(classname) {
                $(classname).click(function(e){
                    e.preventDefault();

                    modal = '.' + $(this).attr('data-modal');
                    $(modal).fadeIn('fast');
                });
            }

            // _____ HELP BUTTON 
            modalClick('.help-button i');

            $('.help_modal_close').click(function(){
                $('.portal--modal').fadeOut();
            });


            // _____ CLOSE MODAL ON CLICK GRAY AREA
            $(document).mouseup(function (e) {
                var container = $(".portal--modal-content");

                if(container.is(':visible')) {
                    if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0) // ... nor a descendant of the container
                    {
                        $('.portal--modal').fadeOut();
                    }
                }
                
            });

            // _____ JOB INVITATION NOTIFICATION MODAL
            modalClick('.notifs i');

            // _____ MANAGE CANDIDATE MODALS
            modalClick('.listinglayout1__note-icon');
            
        }

})(jQuery);



