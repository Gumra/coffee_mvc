$(document).ready(function() {
	$('form').submit(function(event) {
		var json;
		event.preventDefault();
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(result) {
				json = jQuery.parseJSON(result);
				if (json.url) {
					if (json.url==='/') {
						window.location.href = json.url;
					}
					window.location.href = '/' + json.url;
				}
				else {
					Swal.fire({
						position:'center',
						icon: json.status,
						text: json.message,
					});
				}
			},
		});
	});
});