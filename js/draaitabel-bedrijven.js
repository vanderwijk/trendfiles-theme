jQuery(document).ready(function($) {

	// Stap 1: Bedrijven
	$( 'input[name=bedrijfsgrootte]' ).on( 'click', function () {
		if ( $( 'input[value=alle-bedrijfsgroottes]' ).attr( 'checked') == 'checked' ) {
			$( '.bedrijfsgrootte ul input' ).attr( 'checked', false );
		}
	});
	$( '.bedrijfsgrootte ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-bedrijfsgrootte]' ).attr( 'checked', true );
	});

	// Stap 2: Vakgebied
	$('#alle-vakgebieden').click(function() {
		$('.vakgebied li').removeClass('donker');
		$('.vakgebied li input').attr('checked', false);
		$('#alle-vakgebieden').toggleClass('donker');
	});
	var cboxelectrotechniek = $('#electrotechniek input')[0];
	$('#electrotechniek').click(function() {
		cboxelectrotechniek.checked = !cboxelectrotechniek.checked;
		$('#alle-vakgebieden').removeClass('donker');
		$('#electrotechniek').toggleClass('donker');
	});
	var cboxinstallatietechniek = $('#installatietechniek input')[0];
	$('#installatietechniek').click(function() {
		cboxinstallatietechniek.checked = !cboxinstallatietechniek.checked;
		$('#alle-vakgebieden').removeClass('donker');
		$('#installatietechniek').toggleClass('donker');
	});
	var cboxkoeltechniek = $('#koeltechniek input')[0];
	$('#koeltechniek').click(function() {
		cboxkoeltechniek.checked = !cboxkoeltechniek.checked;
		$('#alle-vakgebieden').removeClass('donker');
		$('#koeltechniek').toggleClass('donker');
	});

	// Stap 3: Regio
	$( 'input[name=regio]' ).on( 'click', function () {
		if ( $( 'input[value=alle-regios]' ).attr( 'checked') == 'checked' ) {
			$( '.regio ul input' ).attr( 'checked', false );
		}
	});
	$( '.regio ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-regio]' ).attr( 'checked', true );
	});

	// Stap 4: Jaar
	var options = {
		change: updateSlider,
		max: 2016,
		min: 2009,
		step: 1,
		range: true,
		values: [ 2009, 2010 ]
	}
	var $slider = $("#periode").slider(options);
	
	// Pips voor labels
	$slider.slider("pips", { 
		 rest: "label",  
	});

	function updateSlider(e, ui) {
		var beginJaar = $("#periode").slider("values", 0);
		var eindJaar = $("#periode").slider("values", 1);

		// Maak een array van alle waarden op de slider en verwijder het laatste
		function range(start, end) {
			var arr = [];
			for(var i = start; i <= end; i++)
			arr.push(i);
			//arr.splice(-1,1)
			return arr;
		}
		var jaren = range(beginJaar, eindJaar);

		console.log(jaren);

		if (jQuery.inArray(2008, jaren) === -1) {
			$("#2008").prop('checked', false);
		} else {
			$("#2008").prop('checked', true);
		}
		if (jQuery.inArray(2009, jaren) === -1) {
			$("#2009").prop('checked', false);
		} else {
			$("#2009").prop('checked', true);
		}
		if (jQuery.inArray(2010, jaren) === -1) {
			$("#2010").prop('checked', false);
		} else {
			$("#2010").prop('checked', true);
		}
		if (jQuery.inArray(2011, jaren) === -1) {
			$("#2011").prop('checked', false);
		} else {
			$("#2011").prop('checked', true);
		}
		if (jQuery.inArray(2012, jaren) === -1) {
			$("#2012").prop('checked', false);
		} else {
			$("#2012").prop('checked', true);
		}
		if (jQuery.inArray(2013, jaren) === -1) {
			$("#2013").prop('checked', false);
		} else {
			$("#2013").prop('checked', true);
		}
		if (jQuery.inArray(2014, jaren) === -1) {
			$("#2014").prop('checked', false);
		} else {
			$("#2014").prop('checked', true);
		}
		if (jQuery.inArray(2015, jaren) === -1) {
			$("#2015").prop('checked', false);
		} else {
			$("#2015").prop('checked', true);
		}
		if (jQuery.inArray(2016, jaren) === -1) {
			$("#2016").prop('checked', false);
		} else {
			$("#2016").prop('checked', true);
		}

	}

});