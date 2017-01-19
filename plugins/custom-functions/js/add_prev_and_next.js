(function($) { 
	$(document).ready(function(){


		$(document).on('click', '.paginationTop > li.disabled:first-child a', function(){
			prev($(this));
		});

		$(document).on('click', '.paginationTop > li.disabled:last-child a', function(){
			next($(this));
		});
		$(document).on('click', '.paginationBottom > li.disabled:first-child a', function(){
			prev($(this));
		});
		$(document).on('click', '.paginationBottom > li.disabled:last-child a', function(){
			next($(this));
		});


		function prev(the_element){
			number_to_show = listObj.page;
			the_i = listObj.i - number_to_show;
			listObj.show(the_i, number_to_show);
		}

		function next(the_element){
			number_to_show = listObj.page;
			the_i = listObj.i + number_to_show;
			listObj.show(the_i, number_to_show);
		}
	});
})(jQuery);