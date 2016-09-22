jQuery(document).ready(function($) {
	$(".royalSlider").royalSlider({
		arrowsNav: false,
		autoScaleSlider: true,
		keyboardNavEnabled: true,
		autoPlay: {
			enabled: true,
			pauseOnHover: true,
			delay: 3000
		},
		autoHeight: true,
		slidesSpacing: 20
	});
});

jQuery(document).ready(function($) {
	$('.rsNav').appendTo('#custom_post_widget-2');
});