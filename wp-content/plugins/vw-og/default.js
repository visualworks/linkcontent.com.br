jQuery(document).ready(function(){
	jQuery('body').on('submit', '.vw-og-form', function(event) {
		var postData = jQuery(this).serialize();
		postData = postData + '&action=vw_og_save_data';

		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: postData, // serializes the form's elements.
			// dataType: 'json',
			beforeSend: function() {
				// console.log(postData);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
				// jQuery('#alert').removeClass('hidden').addClass('alert-danger').show().append('<p>' + textStatus + '</p>').append('<p>' + errorThrown + '</p>');
			},
			success: function(data) {
				alert('Success');
				console.log(data);
				// jQuery('#alert').removeClass('hidden').addClass('alert-success').show().append('<p>' + data + '</p>');
			}
		});

		event.preventDefault();
	});
});


function show_upload_modal() {
	/*Thickbox function aimed to show the media window. This function accepts three parameters:
	 *
	 * Name of the window: "In our case Upload a Image"
	 * URL : Executes a WordPress library that handles and validates files.
	 * ImageGroup : As we are not going to work with groups of images but just with one that why we set it false.
	 */
	tb_show('Upload a Image', 'media-upload.php?referer=media_page&type=image&TB_iframe=true&post_id=0', false);
	return false;
}