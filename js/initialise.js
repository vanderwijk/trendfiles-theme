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

	$('.page-omzet-en-werkvoorraad .entry-title').click(function(){
		//$(this).parent().parent().next( '.collapsible' ).toggle();
		$(this).parent().parent().nextAll('.col').slice(0, 3).toggle();
		$(this).parent().toggleClass('collapsed');
	});

	$('.page-downloads-en-links .entry-title').click(function(){
		$(this).parents('.row.main').toggleClass('collapsed');
		$(this).parents('.row.main').children('.one-fifth:gt(4)').slideToggle();
	});

	$('.page-downloads-en-links .collapsed').children('.one-fifth:gt(4)').hide();

	function hideGraphs(){
		$('.post-1510 .col.delayed').hide();
	}
	setTimeout(hideGraphs, 1500);

});