

jQuery(document).ready( function($){

	/* Ajax Functions */
	$(document).on('click', '.btn-load_more:not(.btn-loading)', function(){

		var that = $(this),
			page = that.data('page'),
			ajaxUrl = that.data('url');

		that.removeClass('btn-error');
		that.addClass('btn-loading');

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
				that.removeClass('btn-loading');
				that.addClass('btn-error');
			},
			success: function( response ){
				$('.ts-posts-container').append( response );
				that.data('page', page+1);
				console.log(page);
				that.removeClass('btn-loading');
			}

		});


	});

});