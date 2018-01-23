jQuery(document).ready(function($) {

	// Stap 1: Vakgebied
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

	// Stap 2: Functie
	$( 'input[name=functie]' ).on( 'click', function () {
		if ( $( 'input[value=alle-functies]' ).attr( 'checked') == 'checked' ) {
			$( '.functie ul input' ).attr( 'checked', false );
		}
	});
	$( '.functie ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-functie]' ).attr( 'checked', true );
	});

	// Stap 3: Geslacht
	$('#man-vrouw').click(function() {
		$('.gender li').removeClass('donker');
		$('.gender li input').attr('checked', false);
		$('#man-vrouw').toggleClass('donker');
	});
	var cboxman = $('#man input')[0];
	$('#man').click(function() {
		cboxman.checked = !cboxman.checked;
		$('#man-vrouw').removeClass('donker');
		$('#man').toggleClass('donker');
	});
	var cboxvrouw = $('#vrouw input')[0];
	$('#vrouw').click(function() {
		cboxvrouw.checked = !cboxvrouw.checked;
		$('#man-vrouw').removeClass('donker');
		$('#vrouw').toggleClass('donker');
	});

	// Stap 4: Leeftijd
	$( 'input[name=leeftijd]' ).on( 'click', function () {
		if ( $( 'input[value=alle-leeftijden]' ).attr( 'checked') == 'checked' ) {
			$( '.leeftijd ul input' ).attr( 'checked', false );
		}
	});
	$( '.leeftijd ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-leeftijd]' ).attr( 'checked', true );
	});

	// Stap 5: Bedrijfsgrootte
	$( 'input[name=bedrijfsgrootte]' ).on( 'click', function () {
		if ( $( 'input[value=alle-bedrijfsgroottes]' ).attr( 'checked') == 'checked' ) {
			$( '.bedrijfsgrootte ul input' ).attr( 'checked', false );
		}
	});
	$( '.bedrijfsgrootte ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-bedrijfsgrootte]' ).attr( 'checked', true );
	});

	// Stap 6: Regio
	$( 'input[name=regio]' ).on( 'click', function () {
		if ( $( 'input[value=alle-regios]' ).attr( 'checked') == 'checked' ) {
			$( '.regio ul input' ).attr( 'checked', false );
		}
	});
	$( '.regio ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-regio]' ).attr( 'checked', true );
	});

	// Stap 7: Jaar
	var options = {
		change: updateSlider,
		max: 2018,
		min: 2011,
		step: 1,
		range: true,
		values: [ 2011, 2012 ]
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

		if (jQuery.inArray(2017, jaren) === -1) {
			$("#2017").prop('checked', false);
		} else {
			$("#2017").prop('checked', true);
		}

		if (jQuery.inArray(2018, jaren) === -1) {
			$("#2018").prop('checked', false);
		} else {
			$("#2018").prop('checked', true);
		}

	}

});
