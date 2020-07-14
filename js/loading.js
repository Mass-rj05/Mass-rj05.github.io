const loading = () => {
	$(window).on('load', function() {
		setTimeout(
			function() {
				$("#loader-wrapper").fadeOut();
			});
		
	});
	}

	loading();