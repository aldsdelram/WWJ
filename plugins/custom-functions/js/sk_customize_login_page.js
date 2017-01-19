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
            jQuery('[id^=upme-login-form]').find('label.upme-field-type')
                .find('span:not(".upme-required")').each( function(){
                    jQuery(this).parent().parent()
                        .find('input').attr('placeholder', jQuery(this).html())
                }
            );

        }

        function rearrange_login_form(container_id){
            to_remove = $(container_id + ' [id^=upme-login-form] .upme-button.upme-login').parent();
            $('<div class="new_container"></div>').insertAfter($(container_id + ' [id^=upme-login-form] .upme-button.upme-login').parent());
            $(container_id + ' .new_container').append( $(container_id + " a.upme-login-forgot-link").next(container_id + " a.upme-login-register-link").andSelf());
            $(container_id + ' .new_container').append( $(container_id + ' [id^=upme-login-form] .upme-button.upme-login'));

            the_password_field = $(container_id + ' #login_user_pass').parent().parent().next('.upme-clear');
            $(container_id + ' [id^=upme-login-form] .upme-login-register-link').detach().insertAfter(the_password_field);

            $(container_id + ' [id^=upme-login-form] a.upme-login-forgot-link').detach().insertAfter(container_id + ' [id^=upme-login-form] .upme-button.upme-login ');
            to_remove.hide();
        }

    /*EVENT LISTENERS*/

    function onChanges(){
    }

    function onClicks(){
        $('.upme-login-register-link ').click(function(e){
            e.preventDefault();
            if($('#login-emp-modal').length){
                $('#login-emp-modal .close-modal').click();
                jQuery("a[data-modal='#register-emp-modal']").click();                
            }
            else{
                $('#login-cand-modal .close-modal').click();
                jQuery("a[data-modal='#register-cand-modal']").click();
            }

        });
    }

    function init(){
        add_place_holder();

        rearrange_login_form('#login-emp-modal');
        rearrange_login_form('#login-cand-modal');
    }

    /* ____________MAIN FUNCTIONS_____________ */
    $(document).ready(function(){
        if($('[id^=upme-login-form]').length){
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