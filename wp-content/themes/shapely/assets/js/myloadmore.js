jQuery(function($){
	// we will remove the button and load its new copy with AJAX, that's why $('body').on()
	$('body').on('click', '#misha_loadmore', function(){
		$.ajax({
			url : misha_loadmore_params.ajaxurl,
			data : {
				'action': 'loadmore',
				'query': misha_loadmore_params.posts,
				'page' : misha_loadmore_params.current_page,
				'first_page' : misha_loadmore_params.first_page // here is the new parameter
			},
			type : 'POST',
			beforeSend : function ( xhr ) {
				$('#misha_loadmore').addClass('loading').find('span'); 
			},
			success : function( data ){
 $('.remove-after-load').remove();
				$('#misha_loadmore').remove(); // remove button
				$('#misha_pagination').before(data).remove(); // add new posts and remove pagination links
				misha_loadmore_params.current_page++;
 
 
			}
		});
		return false;
	});
});