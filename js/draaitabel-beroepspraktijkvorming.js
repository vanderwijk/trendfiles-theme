jQuery(document).ready(function($) {

	// Stap 1: BPV overeenkomsten

	// Stap 2: Periode
	var options = {
		change: updateSlider,
		max: 2017,
		min: 2008,
		step: 1,
		range: true,
		values: [ 2008, 2009 ]
	}
	var $slider = $("#periode").slider(options);
	
	// Pips voor labels
	$slider.slider("pips", { 
		 rest: "label",
		 labels: ['2008/2009', '2009/2010', '2010/2011', '2011/2012', '2012/2013', '2013/2014', '2014/2015', '2015/2016', '2016/2017', '2017/2018',] 
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
		if (jQuery.inArray(2017, jaren) === -1) {
			$("#2017").prop('checked', false);
		} else {
			$("#2017").prop('checked', true);
		}
	}

	// Stap 3: Regio
	$( 'input[name=regio]' ).on( 'click', function () {
		if ( $( 'input[value=alle-regios]' ).attr( 'checked') == 'checked' ) {
			$( '.regio ul input' ).attr( 'checked', false );
		}
	});
	$( '.regio ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-regio]' ).attr( 'checked', true );
	});

	// Stap 4: Niveau
	$( 'input[name=niveau]' ).on( 'click', function () {
		if ( $( 'input[value=alle-niveaus]' ).attr( 'checked') == 'checked' ) {
			$( '.niveau ul input' ).attr( 'checked', false );
		}
	});
	$( '.niveau ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-niveau]' ).attr( 'checked', true );
	});

	// Stap 5: Leeftijd
	$( 'input[name=leeftijd]' ).on( 'click', function () {
		if ( $( 'input[value=alle-leeftijden]' ).attr( 'checked') == 'checked' ) {
			$( '.leeftijd ul input' ).attr( 'checked', false );
		}
	});
	$( '.leeftijd ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-leeftijd]' ).attr( 'checked', true );
	});

	// Stap 6: Functie
	$( 'input[name=functie]' ).on( 'click', function () {
		if ( $( 'input[value=alle-functies]' ).attr( 'checked') == 'checked' ) {
			$( '.functie ul input' ).attr( 'checked', false );
		}
	});
	$( '.functie ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-functie]' ).attr( 'checked', true );
	});

	// Stap 7: Soort
	$( 'input[name=soort]' ).on( 'click', function () {
		if ( $( 'input[value=alle-soorten]' ).attr( 'checked') == 'checked' ) {
			$( '.soort ul input' ).attr( 'checked', false );
		}
	});
	$( '.soort ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-soort]' ).attr( 'checked', true );
	});

	// Stap 8: Bedrijven
	$( 'input[name=bedrijfsgrootte]' ).on( 'click', function () {
		if ( $( 'input[value=alle-bedrijfsgroottes]' ).attr( 'checked') == 'checked' ) {
			$( '.bedrijfsgrootte ul input' ).attr( 'checked', false );
		}
	});
	$( '.bedrijfsgrootte ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-bedrijfsgrootte]' ).attr( 'checked', true );
	});

	// Stap 9: Opleiding
	$( 'input[name=opleiding]' ).on( 'click', function () {
		if ( $( 'input[value=alle-opleidingen]' ).attr( 'checked') == 'checked' ) {
			$( '.opleiding ul select option:first' ).prop('selected',true);
		}
	});
	$( '.opleiding ul select' ).on( 'click', function () {
		$( 'input[value=selecteer-opleiding]' ).attr( 'checked', true );
	});

	// Stap 10: ROC
	$( 'input[name=roc]' ).on( 'click', function () {
		if ( $( 'input[value=alle-rocs]' ).attr( 'checked') == 'checked' ) {
			$( '.roc ul select option:first' ).prop('selected',true);
		}
	});
	$( '.roc ul select' ).on( 'click', function () {
		$( 'input[value=selecteer-roc]' ).attr( 'checked', true );
	});

});
