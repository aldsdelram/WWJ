/*___________________________________CANDIDATE LISTING FUNCTIONS___________________________________*/
(function($) { 

    /* THE GLOBALS */
        var filters      = [];   //id of all filters

        //VARIABLES TO BE USED FOR FILTERING
        var position;
        var region;
        var name;
        var type = [];
        
    /* ____________REUSABLE FUNCTIONS_____________*/
        function do_the_filter(){
            listObj2.filter(function(item) {
                var string = [];
                for(var i=0; i<4; i++)
                    string.push(1);


                //"{"job_title":"Image Record Assistant","job_type":"12|13","job_region":"23","category":"6"}"

                var i = 0;
                if(position)
                    if(item.values().category != position){
                        string[i] = 0;
                    }
                i++;
                if(region)
                    if(item.values().job_region != region)
                        string[i] = 0;
                i++;
                if(name){
                	string = item.values().job_title;
				    substring = name;
					if(string.indexOf(substring) == -1)
						string[i]=0;
        		}
        		// if(type.length){
        		// 	$.each(type)
        		// 	if($.inArray(, string) != -1){

        		// 	}
        		// }

        		if($.inArray(0, string) != -1){
                    return false;
                }
                else{
                    return true;
                }
            }); 
        }


    /* ____________FUNCTIONS FOR MAIN____________*/

        //to initialize the inputs and everything
        function init(){
         

            $(document).on('focus', '.dropdown-data', function(event) {
                $( this ).closest( '.dropdown-search-input').addClass( 'opened' );
                event.stopPropagation();
            });

            $(document).on( 'click', 'dropdown-search-input > ul > li', function(event) {
                var text = $( this ).html();
                $( this ).closest( '.dropdown-search-input' ).find( '.dropdown-data' ).val( text );
                $( this ).closest( '.dropdown-search-input' ).removeClass( 'opened' );
                event.stopPropagation();
            });

            $( 'html' ).on( 'click', function() {
                if(!$(".dropdown-search-input input").is(":focus"))
                    $( '.dropdown-search-input' ).removeClass( 'opened' );
            });

            $(document).find( '.dropdown-search-input' ).blur(function(){
                $(this).removeClass( 'opened' );
            });


            $( document ).find( '.dropdown-list' ).each( function() {
                var height = $( this ).children( 'ul' ).actual( 'outerHeight' );
                console.log(height);
                $( this ).css( 'height', height );
            });



        }

        /*EVENT LISTENERS*/

        //on change
        function onChanges(){        
            // $.each(filters, function(key, element_id){
            //     value = $('#'+element_id);
            //     value.change(function(){
            //         the_value = $(this).val();
            //         switch($(this).attr("id")){
            //             case('sort_industry'):
            //                 $('.sort_industry_container').find('select').val($(this).val()).click();
            //                 position     = the_value;   
            //                 break;
            //             case('location'):        region       = the_value;   break;
            //             case('salary_range'):    salary       = the_value;   break;
            //             case('availability'):    availability = the_value;   break;
            //             case('yoe'):             yoe          = the_value;   break;
            //         }

            //         if(salary){
            //             var r = /\d+/g;
            //             matches = salary.match(r);
            //             if(matches.length > 1){
            //                 min_salary = matches[0];
            //                 max_salary = matches[1];
            //             }
            //             else
            //             {
            //                 min_salary = -1;
            //                 max_salary = matches[0];
            //             }
            //         }
            //         do_the_filter();
            //     });
            // });
        }


        //on click
        function onClick(){
        	$('.filter-job button').click(function(){
        		name = $('#job_keyword').val();
        		region = $('#location').val();
        		position = $('#category').val();
        		type = [];
        		$('input[name=job_types]:checked').each(function(){
        			type.push($(this).val());
        		});
        		do_the_filter();
        	});

            $('.skills_options').find('li').each(function(){
                $(this).click(function(){
                    console.log($(this).attr('data-value'));
                    $(document).find('.skill_parent_'+$(this).attr('data-value')).show();
                    // console.log($(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').parent().parent().parent());
                    // $(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').parent().parent().parent().parent().show();
                    $(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').addClass("required");
                    $(document).find('.skill_parent_'+$(this).attr('data-value')).find('.input_skill').attr('name', 'skills[]');
                });
            });

            $(document).on('click', '.delete_skill', function(e){
                $(document).find('.skill_parent_'+$(this).attr('data-value')).hide();
                $(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').removeClass("required");
                $(document).find('.skill_parent_'+$(this).attr('data-value')).find('.input_skill').removeAttr('name');
            });
        // $(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').parent().parent()..hide();
        // $(document).find('input[name="o_rating['+$(this).attr('data-value')+']"]').removeClass("required");


            $('#edit_skills').validate({
                rules:{
                    '.required':{
                        required: true
                    }
                }
            });

            $('#edit_skills .save-btn-variant-1').click(function(e){
                if(jQuery('input[name^=skills]').length == 0){
                    e.preventDefault();
                    alert("You must have at least one skill to continue");
                }
            });

        }

        
    /* MAIN FUNCTION */
    $(document).ready(function(){
        init();
        onChanges();
        onClick();

    });

})(jQuery);



