

jQuery(document).ready( function($){

	/* Ajax Functions */
	$(document).on('click', '.btn-load_more', function(){

		var elem = $(this),
			page = elem.data('page'),
			ajaxUrl = elem.data('url');

		console.log(page);

		$.ajax({

			url: ajaxUrl,
			type: 'post',
			data: { // Container for custom data

				page: page,
				action: 'ts_load_more'

			},
			error: function( response ){
				console.log(response);
			},
			success: function( response ){
				$('.ts-posts-container').append( response );
				elem.data('page', page+1);
				console.log(page);
			}

		});


	});

});