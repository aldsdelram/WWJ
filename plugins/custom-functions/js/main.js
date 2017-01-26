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

            
        }

})(jQuery);



