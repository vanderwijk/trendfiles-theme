jQuery(function($) {

	var load_posts = function() {
		$.ajax({
			type       : "GET",
			data       : {
				onderwerp: '30',
				persoon: '33'
			},
			dataType   : "html",
			url        : "/wp-content/themes/trendfiles-theme/ajax-video.php",
			beforeSend : function(){  
				console.log('click');
			},
			success    : function(data){
				$( ".scrollwrap" ).html(data);
				console.log(data);
			},
			complete   : function(data){
				console.log('complete');
			},
		});
	}

	$('#click').click(function() {
		load_posts();
	});

	load_posts();

});