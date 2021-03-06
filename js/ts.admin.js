jQuery(document).ready(function($){


	var mediaUploader;

	$( '#upload-button' ).on('click', function(e) {
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return; 
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$( '#profile-picture' ).val(attachment.url);
			$( '#profile-picture-preview' ).attr('src', attachment.url);
		});

		console.log("hi");

		mediaUploader.open();
	});

	$( '#remove-button' ).on('click', function(e){
		e.preventDefault();
		var answer = confirm("Would you like to remove your Profile Picture?");
		if( answer ){
			$('#profile-picture').val(' ');
			$( '#profile-picture-preview' ).hide();
			$('.ts-general-form').submit();
		}else{
			
		}
	});

});
