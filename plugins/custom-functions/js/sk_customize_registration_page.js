// JS FOR CUSTOMIZATION OF REGISTRATION PAGE
// THIS JS IS FOR UPME PLUGIN
// THIS JS IS FOR MAKING THE CREATED REGISTRATION FORM OF UPME TO BECOME 2-COLUMN FORM
(function($) { 


    /* THE GLOBALS */
        var column_wrapper    =   ''; // name of the column wrapper

    /* ____________REUSABLE FUNCTIONS_____________*/
 
        // to rearrange two divs |
        // the_field:string (the id of the input field to be rearrange)
        // after_field:string (the id of the field input to be inert after to)
        function rearrange_fields(the_field, after_field){
            /*
                after: the reference of the "the" to be insert after
                the: the one that will be rearranged
            */

            //getting the fields
            after = $('#'+after_field).parent().parent();
            clear_after = after.next('.upme-clear');
            the = $('#'+the_field).parent().parent();
            clear_div = the.next('.upme-clear');

            //rearranging the divs
            the.detach().insertAfter(clear_after);
            clear_div.detach().insertAfter(the);
        }

        function add_place_holder(){
            jQuery('#upme-registration-form label.upme-field-type')
                .find('span:not(".upme-required")').each( function(){
                    jQuery(this).parent().parent()
                        .find('input').attr('placeholder', jQuery(this).html())
                }
            );

        }

    /*EVENT LISTENERS*/

    function onChanges(){
    }


    function onClicks(){
        $('.login_link_for_registration').click(function(){
            if($('#login-emp-modal').length){
                $('#register-emp-modal .close-modal').click();
                jQuery("a[data-modal='#login-emp-modal']").click();
            }
            else{
                $('#register-cand-modal .close-modal').click();
                jQuery("a[data-modal='#login-cand-modal']").click();
            }
        })

    }

    function init(){
        $('#user_phone').attr('type', 'number');
        $('#user_phone').attr('min', '0');
        $('#user_phone').numeric();

        add_place_holder();

        jQuery('.login_link_for_registration').insertAfter("#upme-register");
    }

    /* ____________MAIN FUNCTIONS_____________ */
    $(document).ready(function(){
        if($('#upme-registration-form').length){
            init();

            //1. REARRANGE THE DIVS
            rearrange_fields('user_phone', 'reg_user_email');

            //2. ADD WRAPPER
                // column_wrapper = 'upme-registration-wrapper';
                // add_wrapper('user_title', 'reg_user_singapore_ic');

            //3. ADD LISTENERS
                onChanges();
                onClicks();
        }
    });

})(jQuery);