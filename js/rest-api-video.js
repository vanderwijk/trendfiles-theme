jQuery(function($) {

	var load_posts = function() {

		onderwerp = $( "#onderwerp" ).val();
		persoon = $( '#persoon' ).val();

		$.ajax({
			type       : "POST",
			data       : {
				onderwerp: onderwerp,
				persoon: persoon
			},
			dataType   : "html",
			url        : "/wp-content/themes/trendfiles-theme/ajax-video.php",
			beforeSend : function(){  
				jQuery('#submit').addClass('loading');
			},
			success    : function(data){
				$( ".scroll" ).html(data);
				console.log(data);
			},
			complete   : function(data){
				console.log('complete');
				jQuery('#submit').removeClass('loading');

			},
		});
	}

	$('#submit').click(function() {
		load_posts();
	});

	//load_posts();

});