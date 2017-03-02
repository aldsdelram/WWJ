(function($) { 
	$(document).ready(function(){

		$('.registration-message').hide();


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

		$(document).on('click', 'a.page', function(){
			checkIfLoggedIn();
		})

		function prev(the_element){
			if($('#candidateListing-container').length){
				number_to_show = listObj.page;
				the_i = listObj.i - number_to_show;
				listObj.show(the_i, number_to_show);				
			}
			else{
				number_to_show = listObj2.page;
				the_i = listObj2.i - number_to_show;
				listObj2.show(the_i, number_to_show);					
			}
		}

		function next(the_element){

			if($('#candidateListing-container').length){
				number_to_show = listObj.page;
				the_i = listObj.i + number_to_show;
				listObj.show(the_i, number_to_show);
			}
			else{
				number_to_show = listObj2.page;
				the_i = listObj2.i + number_to_show;
				listObj2.show(the_i, number_to_show);					
			}
		}

		function checkIfLoggedIn(){


			login_link = '#login-emp-modal';
			reg_link = '#register-emp-modal';
			if($('body.jobseeker').length){
				login_link = '#login-cand-modal';
				reg_link = '#register-cand-modal';
			}


			var html = '';
			html += '<div class="reg-container">';
			html +=	'<h1>NOTICE</h1>';  
			html += 'We\'ve notice that you\'re not logged in. To view more candidates,'
						+ 'you may <a href="javascript:void(0)" class="show-modal" data-modal="'+ login_link +'">Login</a>'
						+ ' or <a href="javascript:void(0)" class="show-modal" data-modal="'+ reg_link +'">Register</a>.'
						+ ' Thanks!';
			html += '</div>';
			$('.registration-message').html(html);


			if($('#candidateListing-container').length){
				if(listObj.i > 1){
					if($('body.logged-in').length == 0)
						$('.registration-message').fadeIn('fast');
				}
				else
					$('.registration-message').fadeOut('fast');
			}
			else{
				page = parseInt($(document).find('.paginationTop').find('.active a.page').html());
				// console.log(page);
				if(page > 2){
					if($('body.logged-in').length == 0)
						$('.registration-message').fadeIn('fast');
				}
				else
					$('.registration-message').fadeOut('fast');	
			}
		}


		$('#show_per').change(function(){
			if($('#candidateListing-container').length)
				listObj.show(listObj.i, $(this).val());
			else
				listObj2.show(listObj2.i, $(this).val());
			$('.show-per').find('select').val($(this).val()).click();
		})
	});
})(jQuery);