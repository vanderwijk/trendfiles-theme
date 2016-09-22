jQuery(document).ready(function($) {

	// Open external links in new window
	$(function() { $('a[rel~=external]').attr('target', '_blank'); });

	// Open menu toggle on click
	$( '.menu-toggle' ).on( 'click', function() {
		$( '.menu-primary-container' ).toggleClass( 'toggled-on' );
	});

	// Make columns equal height
	$('#equalheight .col .block').matchHeight();

	// Use arrow keys to navigate
	$(document).keydown(function(event) {
		var url = false;
		if (event.which == 37) {
			url = $( '.post-navigation a[rel="prev"]' ).attr( 'href' );
		}
		if (event.which == 39) {
			url = $( '.post-navigation a[rel="next"]' ).attr( 'href' );
		}
		if (url) {
			window.location = url;
		}
	});

});