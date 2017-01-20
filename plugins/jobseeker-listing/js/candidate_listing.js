/*___________________________________CANDIDATE LISTING FUNCTIONS___________________________________*/
(function($) { 

    /* THE GLOBALS */
        var filters      = [];   //id of all filters

        //VARIABLES TO BE USED FOR FILTERING
        var position;
        var salary;
        var region;
        var availability;
        var yoe;
        var min_salary;
        var max_salary;

        
    /* ____________REUSABLE FUNCTIONS_____________*/
        function do_the_filter(){
            listObj.filter(function(item) {
                var string = [];
                for(var i=0; i<filters.length; i++)
                    string.push(1);

                var i = 0;
                if(position)
                    if(item.values().desired_position != position){
                        string[i] = 0;
                    }
                i++;
                if(salary){
                    if(min_salary == -1){
                        if(parseInt(item.values().salary) < parseInt(max_salary))
                           string[i] = 0;
                    }
                    else{
                        if( parseInt(item.values().salary) < parseInt(min_salary) || parseInt(item.values().salary) > parseInt(max_salary))
                            string[i] = 0;
                    }
                }
                i++;
                if(region)
                    if(item.values().region != region)
                        string[i] = 0;
                i++;
                if(availability)
                    if(item.values().availability != availability)
                        string[i] = 0;
                i++;
                if(yoe)
                    if(item.values().yoe != yoe)
                        string[i] = 0;
                i++;
                console.log(string);

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
            
        }

        /*EVENT LISTENERS*/

        //on change
        function onChanges(){        
            $.each(filters, function(key, element_id){
                value = $('#'+element_id);
                value.change(function(){
                    the_value = $(this).val();
                    switch($(this).attr("id")){
                        case('sort_industry'):
                            $('.sort_industry_container').find('select').val($(this).val()).click();
                            position     = the_value;   
                            break;
                        case('location'):        region       = the_value;   break;
                        case('salary_range'):    salary       = the_value;   break;
                        case('availability'):    availability = the_value;   break;
                        case('yoe'):             yoe          = the_value;   break;
                    }

                    if(salary){
                        var r = /\d+/g;
                        matches = salary.match(r);
                        if(matches.length > 1){
                            min_salary = matches[0];
                            max_salary = matches[1];
                        }
                        else
                        {
                            min_salary = -1;
                            max_salary = matches[0];
                        }
                    }
                    do_the_filter();
                });
            });
        }

    /* MAIN FUNCTION */
    $(document).ready(function(){
        /*REGISTER THE IDS of filters */
        filters.push('sort_industry');
        filters.push('location');
        filters.push('salary_range');
        filters.push('availability');
        filters.push('yoe');

        init();
        if($('#candidateListing-container').length){
            onChanges();
        }
    });

})(jQuery);