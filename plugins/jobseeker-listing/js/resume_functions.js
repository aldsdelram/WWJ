/*___________________________________RESUME FUNCTIONS___________________________________*/
(function($) { 

    /* THE GLOBALS */
        var inputProfilePicture;                //variable for the element where the profile picture to be saved.
        var to_repeat_verification;
        var to_repeat_certification;
        var month = [''];
        var localStream;

    /* MAIN FUNCTION */
    $(document).ready(function(){
        init();
        onChanges();
        onClick();
        onSubmit();

        validate_form();
    });

    /* ____________REUSABLE FUNCTIONS_____________*/

        function readURL(input, target) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    b64Image = e.target.result;
                    $(target).css('background-image', 'url(\''+b64Image+'\')');
                    $(inputProfilePicture).val(b64Image);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        function formatDropdownInput(){
            the_input_field = [];
            $('.dropdown-input').each(function(key, value){
                $(this).attr('readonly', true);
                the_dropdow_data = $(this).find('.dropdown-data');
                name = the_dropdow_data.attr('name');
                the_value = the_dropdow_data.attr('value');
                f_value = the_dropdow_data.attr('data-fvalue');
                data_value = the_dropdow_data.attr('data-value');


                classList = the_dropdow_data.attr('class');
                if(classList != null)
                    class_array = classList.split(/\s+/);
                else
                    class_array = [];

                new_class = "dropdown_real_input ";
                for (var i = 0; i < class_array.length; i++) {
                    new_class+=("real_"+class_array[i]+" ");
                }

                input_field = $('<input></input>')
                    .attr('name', name)
                    .attr('readonly', true)
                    .attr('class', new_class)
                    .hide();

                if(the_value){
                    input_field.val(data_value);
                    the_dropdow_data.val(data_value);
                }
                if(f_value){
                    input_field.val(data_value);
                    the_dropdow_data.val(f_value);
                }

                the_input_field.push(input_field);
                $(this).append(the_input_field[key]);
                the_dropdow_data.attr('name', 'o_'+name);

                $(this).find('li').each(function(){
                    $(this).click(function(){
                        if($(this)[0].hasAttribute("data-value")){
                            the_input_field[key].val($(this).attr('data-value'));
                        }
                        else{
                            the_input_field[key].val($(this).html());
                        }
                    });
                });

            });

        }


        function rearrangeVerificationFields(){
            key = $('.verification_form').attr('data-key');
            number = 0;
            $(document).find('.verification_form').find('.verification_name').each(function(){
                $(this).attr('name', 'verification['+key+'][firstname]['+number+']');
                number++;
            });

            number = 0;
            $(document).find('.verification_form').find('.verification_email').each(function(){
                $(this).attr('name', 'verification['+key+'][email]['+number+']');
                number++;
            });

            number = 0;
            $(document).find('.verification_form').find('.verification_contact').each(function(){
                $(this).attr('name', 'verification['+key+'][contact]['+number+']');
                number++;
            });
        }

        /**
         * Creates an input.
         *
         * @param      {<string>}  name    The name
         * @param      {<string>}  value   The value
         * @return     {<object>}  { return an object "input field" }
         */
        function createInput(name, value){
            return $('<input>')
                .attr('name', name)
                .attr('type', 'text')
                .val(value)
                .css('display', 'none');
        }


        /**
         * Gets the month name.
         *
         * @param      {int}  input   The number equivalent of the month
         * @return     {String}   The month name.
         */
        function getMonthName(input){
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
            return monthNames[parseInt(input)-1];
        }


    /* ____________FUNCTIONS FOR MAIN____________*/

        //to initialize the inputs and everything
        function init(){

            formatDropdownInput();
            modal_fade_box();
            init_portal_next();

            inputProfilePicture = 'input[name=photo_base_64]';
            $('.portal--modal-image-capture').hide();

            $('#birthday').datepicker("destroy");
            $('#birthday').datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
                maxDate: "-16Y"
            });

            $('.company_year_error').hide();

            to_repeat_verification  = $('.verification_form').find('.fields-repeater').html();
            to_repeat_certification = $('.certificate_repeater').html();
            $('.other_language_field').fadeOut('fast');

            $('.slick-slider-variant-1').slick({
                swipe: false,
                touchMove: false,
                swipeToSlide: false,
                arrows: false,
                dots: false,
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
                        dots: false
                      }
                    },
                    {
                      breakpoint: 992,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: false,
                        arrows: false,
                        dots: false
                      }
                    },
                    {
                      breakpoint: 641,
                      settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        dots: false
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


            $( '.language-item input[type=checkbox]' ).each( function() {
                if( $(this).attr("data-checked")){
                    $( this ).closest( '.language-item' ).find( '.language-show' ).show( 500 );
                    $(this).attr("checked", true);
                    $(this).closest('.language-item').find('.dropdown-data').addClass('required');                   
                    if($(this).attr("id") == 'other_language')
                        $('.other_language_field').fadeIn('fast');
                }
            });


            $( '.filter-dropdown' ).keyup(function(){
                var value = $( this ).val();
                $( this ).closest( '.dropdown-list' ).find( 'li' ).each( function() {
                if ( $( this ).text().search( new RegExp(value, 'i' ) ) > -1 ) {
                    $( this ).show();
                } else {
                $( this ).hide();
                }
                });
            });


        }

        /*EVENT LISTENERS*/

        //on change
        function onChanges(){

            $("#inputProfilePicture").change(function(){
                readURL(this, '.upload-photo .img-container');
            });

            $('.field_of_expertise').parent().find('li').each(function(){
                $(this).click(function(){
                    $('span.industry_name').html($(this).html());
                });
            });


            $('.skills_group').find('input').each(function(){
                $(this).change(function(){
                    // $('.skills_group').find('input').each(function(){
                    if($(this).is(':checked')){
                        $(document).find('input[name="o_rating['+$(this).val()+']"]').parent().parent().show();
                        $(document).find('input[name="o_rating['+$(this).val()+']"]').addClass("required");
                    }
                    else{
                        $(document).find('input[name="o_rating['+$(this).val()+']"]').parent().parent().hide();
                        $(document).find('input[name="o_rating['+$(this).val()+']"]').removeClass("required");
                    }
                    // });
                });
            });


            $('.language-items').find('input').each(function(){
                $(this).change(function(){
                    if($(this).is(':checked')){
                        $(this).closest('.language-item').find('.dropdown-data').addClass('required');
                    }
                    else{
                        $(this).closest('.language-item').find('.dropdown-data').removeClass('required');
                    } 
                });
            });

            $('#other_language').change(function(){
                if($(this).is(':checked')){
                    $('.other_language_field').addClass('required');
                    $('.other_language_field').fadeIn('fast');
                }
                else{
                    $('.other_language_field').removeClass('required');
                    $('.other_language_field').fadeOut('fast');
                } 
            });


            var the_cert_image = '';
            $(document).on('change', '.cert_image',function(){
                input = $(this)[0];
                // the_base_64_input = $(this).closest('.cert_image_64');
                the_cert_image = $(this).attr('data-name');
                the_base_64_input = $(this).parent().find('.cert_image_64');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        b64Image = e.target.result;
                        $(the_base_64_input).val(b64Image);
                        console.log($(document).find('div[data-name="'+the_cert_image+'"]'));
                        if($(document).find('div[data-name="'+the_cert_image+'"]').length){
                            $(document).find('div[data-name="'+the_cert_image+'"]').css('background-image', 'url(\''+b64Image+'\'');
                        }
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // function func_select_skills_2() {
            //   $('.portal--ratings').html('');
            //   var html = '';
            //   var selected_skills = [];

            //   $('#field_5_100 input[type="checkbox"]:checked').each(function() {
            //     html += '<div>';
            //     html += ('<label>' + $(this).next('label').html() + '</label>');
            //     html += '<select name="ratings[]">';
            //     for (var i = 1; i <= 5; i++)
            //       html += '<option value="' + i + '">' + i + '</option>';
            //     html += '</select> ';
            //     html += '</div>';
            //   });

            //   $('.portal--ratings').html(html);
            // }

        }

        //on click
        function onClick(){

            $('.take-photo').click(function(e) {
                e.preventDefault();
                // Grab elements, create settings, etc.
                var video = document.getElementById('video');
                // Get access to the camera!
                if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                    // Not adding `{ audio: true }` since we only want video now
                    navigator.mediaDevices.getUserMedia({
                        video: true
                    }).then(function(stream) {
                        $('.portal--modal-image-capture').show();
                        video.src = window.URL.createObjectURL(stream);
                        video.play();

                        // re-add the stop function
                        if(!stream.stop && stream.getTracks) {
                            stream.stop = function(){         
                              this.getTracks().forEach(function (track) {
                                 track.stop();
                              });
                            };
                        }

                        localStream = stream;
                    });

                    
                }
            });

            $('#snap').click(function() {
                // Elements for taking the snapshot
                var canvas = document.getElementById('canvas');
                var context = canvas.getContext('2d');
                var video = document.getElementById('video');

                context.drawImage(video, 0, 0, 500, 500);
                var url = canvas.toDataURL();

                $('.upload-photo .img-container').css('background-image', 'url(\''+url+'\')');
                $(inputProfilePicture).val(url);

                $('.portal--modal-image-capture').fadeOut('fast');

                localStream.stop();
            });

            $('.add_field_with_modal').click(function(e){
                e.preventDefault();
                $('.workplace_container').find(':input').each(function(){
                    $(this).val('');
                });

                $('.verification_container').find(':input').each(function(){
                    $(this).val('');
                });

                modal = '.' + $(this).attr('data-modal');
                $(modal).fadeIn('slow');
            });


            $('.help-button i').click(function(e){
                e.preventDefault();

                modal = '.' + $(this).attr('data-modal');
                $(modal).fadeIn('fast');
            });


            



            /*______________ close modal on click gray area _______________________*/

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


            /*______________add workplace functions_______________________*/

            var startMonth;
            var endMonth;
            var startYear;
            var endYear;

            var company_name;
            var job_title;
            var key_tasks;


            $('.workplace_container .btnCancel').click(function(e){
                e.preventDefault();
                $('.workplace_container').fadeOut('slow');
                $('.company_year_error').hide();
            });

            $('.workplace_container .btnAddWorkplace').click(function(e){
                e.preventDefault();


                startMonth = $('input[name="o_start_month[]"]').val();
                endMonth = $('input[name="o_end_month[]"]').val();
                startYear = $('input[name="start_year[]"]').val();
                endYear = $('input[name="end_year[]"]').val();

                company_name = $('input[name="company_name[]"]').val();
                job_title = $('input[name="job_title[]"]').val();
                key_tasks = $('textarea[name="key_tasks[]"').val();

                if(startMonth != null && endMonth != null && startYear != null && endYear != null){
                    var dateStart = new Date(startYear+"-"+startMonth+"-01");
                    var dateEnd = new Date(endYear+"-"+endMonth+"-01");
                    if(dateStart > dateEnd){
                        $('.company_year_error').slideDown('fast');
                    }
                    else{
                        $('.company_year_error').fadeOut('slow');
                    }                    
                }


                if($('.company_form').valid()){
                    $('.company_year_error').hide();

                    var dateStart = new Date(startYear+"-"+startMonth+"-01");
                    var dateEnd = new Date(endYear+"-"+endMonth+"-01");
                    if(dateStart > dateEnd){
                        $('.company_year_error').slideDown('fast');
                    }
                    else{

                        $('.verification_container .wv-desc').html(job_title);
                        $('.verification_container .wv-company').html(company_name);


                        $('.workplace_container').fadeOut('slow');
                        $('.verification_container').fadeIn('slow');
                    }
                }
            });

            /*______________add verification functions_______________________*/

            $('.verification_container .btnBack').click(function(e){
                e.preventDefault();
                $('.workplace_container').fadeIn('slow');
                $('.verification_container').fadeOut('slow');
                $('.company_year_error').hide();
            });

            $('.verification_container .btnAddWorkplace').click(function(e){
                e.preventDefault();

                if($('.verification_form').valid()){
                    the_form = $('.work_experience_back');
                    index = $(document).find('.work_experience_back').find('.the_row').length;
                    the_row = $('<div class="the_row"></div>');

                    the_row.append(createInput('job['+index+']', job_title));
                    the_row.append(createInput('company_name['+index+']', company_name));
                    the_row.append(createInput('keytasks['+index+']', key_tasks));

                    the_row.append(createInput('start_month['+index+']', startMonth));
                    the_row.append(createInput('start_year['+index+']', startYear));
                    the_row.append(createInput('end_month['+index+']', endMonth));
                    the_row.append(createInput('end_year['+index+']', endYear));

                    $(document).find('.verification_name').each(function(){
                        the_row.append(createInput('verification['+index+'][firstname][]', $(this).val()));
                    });

                    $(document).find('.verification_email').each(function(){
                        the_row.append(createInput('verification['+index+'][email][]', $(this).val()));
                    });

                    $(document).find('.verification_contact').each(function(){
                        the_row.append(createInput('verification['+index+'][contact][]', $(this).val()));
                    });
                    the_form.append(the_row);

                    the_front = $('.work_experience_front');

                    html = '<div class="row">'
                            + '<div class="col-sm-2 col-xs-12">'
                                +getMonthName(startMonth)+' '+startYear+' - '+getMonthName(endMonth)+' '+endYear
                            +'</div>'
                            +'<div class="col-sm-9 col-xs-12">'
                                +'<h1>'+job_title+' at '+company_name+'</h1>'
                                +'<p>'+key_tasks+'</p>'
                            +'</div>'
                        +'</div>';
                    the_front.append(html);

                    $('.verification_container').fadeOut('slow');
                }
            });


            $('.add_more_verification').click(function(e){
                e.preventDefault();

                number = $(document).find('.verification_form').find('.verification_name').length;
                appended = $('<div><div class="delete-field" onClick="delete_field( this );"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>' + to_repeat_verification + '</div>');
                if($('#experience_edit').length){
                    key = $('.verification_form').attr('data-key');

                    number = 0;
                    $(document).find('.verification_form').find('.verification_name').each(function(){
                        $(this).attr('name', 'verification['+key+'][firstname]['+number+']');
                        number++;
                    });

                    number = 0;
                    $(document).find('.verification_form').find('.verification_email').each(function(){
                        $(this).attr('name', 'verification['+key+'][email]['+number+']');
                        number++;
                    });

                    number = 0;
                    $(document).find('.verification_form').find('.verification_contact').each(function(){
                        $(this).attr('name', 'verification['+key+'][contact]['+number+']');
                        number++;
                    });

                    appended.find('.verification_name').attr('name', 'verification['+key+'][firstname]['+number+']').val('').removeAttr('value');
                    appended.find('.verification_email').attr('name', 'verification['+key+'][email]['+number+']').val('').removeAttr('value');
                    appended.find('.verification_contact').attr('name', 'verification['+key+'][contact]['+number+']').val('').removeAttr('value');
                }
                else{
                    appended.find('.verification_name').attr('name', 'verification_name['+number+']');
                    appended.find('.verification_email').attr('name', 'verification_email['+number+']');
                    appended.find('.verification_contact').attr('name', 'verification_contact['+number+']');
                }
                $('.fields-repeated').append('<div><div class="delete-field" onClick="delete_field( this ); style="z-index:999"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>' + appended.html() + '</div>');

                return false;
            });

            $('.add-certification').click(function(e){
                e.preventDefault();

                number = $(document).find('.certificate_container').find('.cert_image_64').length;
                appended = $('<div><div class="delete-field" onClick="delete_field( this );"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>' + to_repeat_certification + '</div>');
                appended.find('.cert_image_64').attr('name', 'cert_image['+number+']');
                appended.find('.cert_award').attr('name', 'awards_certification['+number+']');
                appended.find('.cert_body_corporate').attr('name', 'body_corporate['+number+']');
                appended.find('.cert_year').attr('name', 'o_year['+number+']');
                appended.find('.real_cert_year').attr('name', 'cert_year['+number+']');
                appended.find('.cert_image').attr('data-name', 'cert_image['+number+']');
                appended.find('.cert_image_container').attr('data-name', 'cert_image['+number+']');

                $('.fields-repeated').append('<div><div class="delete-field" onClick="delete_field( this ); style="z-index:999"><i class="fa fa-times fa-fw" aria-hidden="true"></i> Delete</div>' + appended.html() + '</div>');                

            });

            $('.slider-next').click(function(e) {
                e.preventDefault();
                $('.slick-slider-variant-1').slick('slickNext');
            });

            $('#hello-content #resend_link').click(function(e){
                e.preventDefault();
                original_text = $(this).html();
                $(this).html("PLEASE WAIT...");
                the_element = $(this);
                jQuery.ajax({
                    url: ajax_url,
                    type: "POST",
                    data: {
                        action: "resend_ver_mail",
                    },
                    cached: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log(the_element);
                        if(response.status){
                            the_element.html(original_text);
                        }
                    }
                });
            });

        }

        function onSubmit(){
            $('#experience_edit').submit(function(e){
                rearrangeVerificationFields();

                startMonth = $('input[name^=o_start_month]').val();
                endMonth = $('input[name^=o_end_month]').val();
                startYear = $('input[name^=start_year]').val();
                endYear = $('input[name^=end_year]').val();

                if(startMonth != null && endMonth != null && startYear != null && endYear != null){
                    var dateStart = new Date(startYear+"-"+startMonth+"-01");
                    var dateEnd = new Date(endYear+"-"+endMonth+"-01");
                    if(dateStart > dateEnd){
                        $('.company_year_error').slideDown('fast');
                    }
                    else{
                        $('.company_year_error').fadeOut('slow');
                    }                    
                }

                if($($(this)).valid()){
                    var dateStart = new Date(startYear+"-"+startMonth+"-01");
                    var dateEnd = new Date(endYear+"-"+endMonth+"-01");
                    if(dateStart > dateEnd){
                        $('.company_year_error').slideDown('fast');
                        e.preventDefault();
                    }
                }
                else
                    e.preventDefault();
            });
        }

        function validate_form(){
            $( '#resume1' ).validate({
                rules: {
                    work_authorization:{
                        required: true
                    },
                    "mobile_contact": {
                        required: true
                    },
                    "birthday": {
                        required: true
                    },
                    "gender": {
                        required: true
                    },
                    "email_address": {
                        required: true
                    },
                    "tertiary": {
                        required: true
                    },
                    "course": {
                        required: true
                    },
                    "o_start_year": {
                        required: true
                    },
                    "o_end_year": {
                        required: true
                    },
                    "career_objective": {
                        required: true
                    }
                },
                submitHandler: function(form) {
                  form.submit();
                }
            });

            $( '#resume2' ).validate({
                rules: {
                    "o_field_of_expertise": {
                        required: true
                    },
                    "desired_salary": {
                        required: true
                    },
                    "o_expertise_years": {
                        required: true
                    },

                    
                },
                submitHandler: function(form) {
                  form.submit();
                }
            });

            $('.company_form').validate({
                rules: {
                    "job_title[]" : {
                        required: true
                    },
                    "company_name[]" : {
                        required: true
                    },
                    "key_tasks[]":{
                        required: true
                    },
                    "o_start_month[]":{
                        required: true
                    },
                    "o_end_month[]":{
                        required: true
                    },
                    "start_year[]":{
                        required: true
                    },
                    "end_year[]":{
                        required: true
                    },                    
                }
            });


            $('form.verification_form').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });

            $('#resume3').validate({
                rules:{
                    // 'verification_name[]':{
                    //     required: true
                    // },
                    // 'verification_email[]':{
                    //     required: true
                    // },
                    // 'verification_contact[]':{
                    //     required: true
                    // },
                    // 
                    // 
                    '.required':{
                        required: true
                    }
                }
            });


            $('#experience_edit').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });


            $('#basic_edit').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });



            $('#about_me_edit').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });


            $('#language_edit').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });

        }

        function modal_fade_box() {
            $('.simple-fading-divs > div').each(function(i) {
                if (i == 0) {
                    $('.sfd--bullets').append($('<span class="box-nav bn--active" box-no="'+(i+1)+'"></span>'))
                } else {
                    $('.sfd--bullets').append($('<span class="box-nav" box-no="'+(i+1)+'"></span>'))
                }
            });


            $('.sfd--bullets span').on('click', function(e) {
                e.preventDefault();
                change_box_div(this);
            });
            
            function change_box_div(el) {
                $('.sfd--bullets span').removeClass('bn--active');
                $(el).addClass('bn--active');

                var _box_nav = $(el).attr('box-no');
                $('.simple-fading-divs > div').hide();
                $('.simple-fading-divs > .box-no-'+_box_nav).fadeIn();
            }
        }

        function init_portal_next(){
            $('#location_preference_1').change(function(){
                if($(this).prop('checked') == true){
                    $(this).next('label').css('background', '#e2373f');
                    $('.other-locations').find('input').each(function(){
                        $(this).prop('checked', true);
                    });
                }
                else{
                    $(this).next('label').css('background', '#ff141d');
                    $('.other-locations').find('input').each(function(){
                        $(this).prop('checked', false);
                    });
                }
            });

            $('.portal-next--show_other_loc').click(function(e){
                e.preventDefault();
                $('.other-locations').slideToggle('fast');
            });

                $('.other-locations').hide();

            var other_loc = null;
            $('.other-locations').find('input').each(function(){
                $(this).change(function(){
                    if($('#location_preference_1').prop('checked')){
                        $('#location_preference_1').prop('checked', false);
                        $('#location_preference_1').next('label').css('background', '#ff141d');
                            $('.other-locations').find('input').each(function(){
                                $(this).prop('checked', false);
                            });
                        $(this).prop('checked', true);
                        return true;
                    }
                    else{
                        if($(this).prop('checked'))
                            var is_checked = true;
                        else
                            var is_checked = false;

                        $('.other-locations').find('input').each(function(){
                            $(this).prop('checked', false);
                        });

                        $(this).prop('checked', is_checked);

                        return true;
                    }
                });
            });

            var that;
            $('.shift-container input').each(function(){
                $(this).change(function(){
                    that = $(this);
                    $('.shift-container input').each(function(){
                        if($(this) != that)
                            $(this).removeAttr('checked');
                    });

                    that.prop('checked', true);
                });
            });
        }

})(jQuery);



