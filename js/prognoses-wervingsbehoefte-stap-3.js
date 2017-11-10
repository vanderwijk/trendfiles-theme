// Laad gegevens via JSON vanaf externe server
var gegevens;

// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

jQuery.ajax({
	url: 'http://trendfiles.otib.nl/wp-content/data/json-figuur-4.json',
	dataType: 'json',
	success: function ( data, textStatus, jqXHR ) {
		gegevens = data;
		maakGrafiek( regio, functie );
	},
	error: function( jqXHR, textStatus, errorThrown ) {
		alert( 'Gegevens kunnen niet worden geladen.' );
	}
});

var jsonKleuren = '{"noord_holland":{"hoofdkleur":"#a75634","donker":"#5b2f17","licht":"#d3a999"},"gelderland_overijssel":{"hoofdkleur":"#688f8c","donker":"#3c5553","licht":"#b3c7c5"},"noord_nederland":{"hoofdkleur":"#d4be59","donker":"#685f2c","licht":"#eadeac"},"zuid_holland":{"hoofdkleur":"#896377","donker":"#46233c","licht":"#c5b1bc"},"zuid_nederland":{"hoofdkleur":"#a29c5a","donker":"#5b5a30","licht":"#d0cdac"},"midden_nederland":{"hoofdkleur":"#6d8293","donker":"#3b4851","licht":"#b6c0c9"},"totaal_regios":{"hoofdkleur":"#2E8D9E","donker":"#044954","licht":"#d9d9d9"}}';
kleuren = JSON.parse(jsonKleuren);

// Bewaar regio in localstorage zodat deze ook in de volgende stap beschikbaar is
if ( localStorage.getItem('geselecteerde_regio') === null ) {
	regio = 'totaal_regios';
} else {
	regio = localStorage['geselecteerde_regio'];
}

// Bewaar functie in localstorage zodat deze ook in de volgende stap beschikbaar is
if ( localStorage.getItem('geselecteerde_functie') === null ) {
	functie = 'totaal_functies';
} else {
	functie = localStorage['geselecteerde_functie'];
}

// Selecteer de regio na klikken op knop
function kiesRegio( geselecteerde_regio ) {
	regio = geselecteerde_regio;
	maakGrafiek( regio, functie );
	localStorage['geselecteerde_regio'] = regio;
}

// Selecteer de functie na klikken op knop
function kiesFunctie( geselecteerde_functie ) {
	functie = geselecteerde_functie;
	maakGrafiek( regio, functie );
	localStorage['geselecteerde_functie'] = functie;
}

function maakGrafiek(regio, functie) {

	//console.log( 'Regio: ' + regio );
	//console.log( 'Functie: ' + functie );
	console.log( 'LocalStorage regio: ' + regio );
	console.log( 'LocalStorage functie: ' + functie );
	console.log( gegevens );
	//console.log( kleuren );

	// Kleur regio's aan de hand van kleuren json
	jQuery( '#kaart path' ).css({ fill: kleuren.totaal_regios.licht });
	jQuery( '#kaart #' + regio + ' path' ).css({ fill: kleuren[regio].licht });

	// Kleur mbo niveau 2 aan de hand van geselecteerde regio
	jQuery( '#bodem_mbo2' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#rechthoek_mbo2' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#plasje_mbo2' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#wk_mbo2' ).css({ fill: kleuren[regio].hoofdkleur });

	// Kleur mbo niveau 3 aan de hand van geselecteerde regio
	jQuery( '#bodem_mbo3' ).css({ fill: kleuren[regio].donker });
	jQuery( '#rechthoek_mbo3' ).css({ fill: kleuren[regio].donker });
	jQuery( '#plasje_mbo3' ).css({ fill: kleuren[regio].donker });
	jQuery( '#wk_mbo3' ).css({ fill: kleuren[regio].donker });

	// Voeg CSS class "selected" toe aan de knoppen op basis van de gekozen regio en functie
	jQuery( '#knoppen_functies button').removeClass( "selected" );
	jQuery( '#knoppen_regios button').removeClass( "selected" );
	jQuery( "#knop_" + regio ).addClass( "selected" );
	jQuery( "#knop_" + functie ).addClass( "selected" );

	// Toon figuur aan de hand van de gekozen functie
	jQuery( '#functies g').hide();
	jQuery( '#' + functie ).show();

	// Activeer svg elementen voor svg.js
	var bodem_vmbo = SVG.get('bodem_vmbo');
	var plasje_vmbo = SVG.get('plasje_vmbo');
	var rechthoek_vmbo = SVG.get('rechthoek_vmbo');

	var bodem_mbo2 = SVG.get('bodem_mbo2');
	var plasje_mbo2 = SVG.get('plasje_mbo2');
	var rechthoek_mbo2 = SVG.get('rechthoek_mbo2');

	var bodem_mbo3 = SVG.get('bodem_mbo3');
	var plasje_mbo3 = SVG.get('plasje_mbo3');
	var rechthoek_mbo3 = SVG.get('rechthoek_mbo3');

	var bodem_mbo4 = SVG.get('bodem_mbo4');
	var plasje_mbo4 = SVG.get('plasje_mbo4');
	var rechthoek_mbo4 = SVG.get('rechthoek_mbo4');

	var bodem_hbo = SVG.get('bodem_hbo');
	var plasje_hbo = SVG.get('plasje_hbo');
	var rechthoek_hbo = SVG.get('rechthoek_hbo');

	// Bereken percentages
	percentage_wk_vmbo = 100 * gegevens.jaar_2020[regio][functie].wk_vmbo / gegevens.jaar_2020[regio][functie].wb_vmbo;
	percentage_wk_mbo2 = 100 * gegevens.jaar_2020[regio][functie].wk_mbo2 / gegevens.jaar_2020[regio][functie].wb_mbo2;
	percentage_wk_mbo3 = 100 * gegevens.jaar_2020[regio][functie].wk_mbo3 / gegevens.jaar_2020[regio][functie].wb_mbo3;
	percentage_wk_mbo4 = 100 * gegevens.jaar_2020[regio][functie].wk_mbo4 / gegevens.jaar_2020[regio][functie].wb_mbo4;
	percentage_wk_hbo = 100 * gegevens.jaar_2020[regio][functie].wk_hbo / gegevens.jaar_2020[regio][functie].wb_hbo;
	
	// Converteer ingevoerde percentage naar absolute svg data
	var rechthoek_wk_vmbo = (percentage_wk_vmbo / 100 * 41);
	var rechthoek_wk_mbo2 = (percentage_wk_mbo2 / 100 * 41);
	var rechthoek_wk_mbo3 = (percentage_wk_mbo3 / 100 * 41);
	var rechthoek_wk_mbo4 = (percentage_wk_mbo4 / 100 * 41);
	var rechthoek_wk_hbo = (percentage_wk_hbo / 100 * 41);

	// Verberg bodem als percentage 0 is
	if ((percentage_wk_vmbo >= 0) || isFinite( percentage_wk_vmbo )) {
		bodem_vmbo.animate().opacity(1);
	} else {
		bodem_vmbo.animate().opacity(0);
	}
	if ((percentage_wk_mbo2 >= 0) || isFinite( percentage_wk_mbo2 )) {
		bodem_mbo2.animate().opacity(1);
	} else {
		bodem_mbo2.animate().opacity(0);
	}
	if ((percentage_wk_mbo3 >= 0) || isFinite( percentage_wk_mbo3 )) {
		bodem_mbo3.animate().opacity(1);
	} else {
		bodem_mbo3.animate().opacity(0);
	}
	if ((percentage_wk_mbo4 >= 0) || isFinite( percentage_wk_mbo4 )) {
		bodem_mbo4.animate().opacity(1);
	} else {
		bodem_mbo4.animate().opacity(0);
	}
	if ((percentage_wk_hbo >= 0) || isFinite( percentage_wk_hbo )) {
		bodem_hbo.animate().opacity(1);
	} else {
		bodem_hbo.animate().opacity(0);
	}

	console.log( 'percentage_wk_hbo: ' + percentage_wk_hbo );
	// Toon plasje als percentage hoger dan 100 is
	if ( isNaN( percentage_wk_vmbo ) || !isFinite( percentage_wk_vmbo ) || ( percentage_wk_vmbo <= 100 ) ) {
		plasje_vmbo.animate().opacity(0);
	} else {
		plasje_vmbo.animate().opacity(1);
	}
	if ( isNaN( percentage_wk_mbo2 ) || !isFinite( percentage_wk_mbo2 ) || ( percentage_wk_mbo2 <= 100 ) ) {
		plasje_mbo2.animate().opacity(0);
	} else {
		plasje_mbo2.animate().opacity(1);
	}
	if ( isNaN( percentage_wk_mbo3 ) || !isFinite( percentage_wk_mbo3 ) || ( percentage_wk_mbo3 <= 100 ) ) {
		plasje_mbo3.animate().opacity(0);
	} else {
		plasje_mbo3.animate().opacity(1);
	}
	if ( isNaN( percentage_wk_mbo4 ) || !isFinite( percentage_wk_mbo4 ) || ( percentage_wk_mbo4 <= 100 ) ) {
		plasje_mbo4.animate().opacity(0);
	} else {
		plasje_mbo4.animate().opacity(1);
	}
	if ( isNaN( percentage_wk_hbo ) || !isFinite( percentage_wk_hbo ) || ( percentage_wk_hbo <= 100 ) ) {
		plasje_hbo.animate().opacity(0);
	} else {
		plasje_hbo.animate().opacity(1);
	}

	// Waarden in tekst
	jQuery( "#wb_vmbo" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wb_vmbo ));
	jQuery( "#wk_vmbo" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wk_vmbo ));
	jQuery( "#wb_mbo2" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wb_mbo2 ));
	jQuery( "#wk_mbo2" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wk_mbo2 ));
	jQuery( "#wb_mbo3" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wb_mbo3 ));
	jQuery( "#wk_mbo3" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wk_mbo3 ));
	jQuery( "#wb_mbo4" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wb_mbo4 ));
	jQuery( "#wk_mbo4" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wk_mbo4 ));
	jQuery( "#wb_hbo" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wb_hbo ));
	jQuery( "#wk_hbo" ).text( formatNumber( gegevens.jaar_2020[regio][functie].wk_hbo ));

	// Animaties
	if ( isNaN ( percentage_wk_vmbo ) ) {
		rechthoek_vmbo.animate().attr('height', 0).y(192.7);
	} else {
		rechthoek_vmbo.animate().attr('height', rechthoek_wk_vmbo).y(192.7 - rechthoek_wk_vmbo);
	}
	if ( isNaN ( percentage_wk_mbo2 ) ) {
		rechthoek_mbo2.animate().attr('height', 0).y(192.7);
	} else {
		rechthoek_mbo2.animate().attr('height', rechthoek_wk_mbo2).y(192.7 - rechthoek_wk_mbo2);
	}
	if ( isNaN ( percentage_wk_mbo3 ) ) {
		rechthoek_mbo3.animate().attr('height', 0).y(192.7);
	} else {
		rechthoek_mbo3.animate().attr('height', rechthoek_wk_mbo3).y(192.7 - rechthoek_wk_mbo3);
	}
	if ( isNaN ( percentage_wk_mbo4 ) ) {
		rechthoek_mbo4.attr('height', 0).y(192.7);
	} else {
		rechthoek_mbo4.animate().attr('height', rechthoek_wk_mbo4).y(192.7 - rechthoek_wk_mbo4);
	}
	if ( isNaN ( percentage_wk_hbo ) ) {
		rechthoek_hbo.attr('height', 0).y(192.7);
	} else {
		rechthoek_hbo.animate().attr('height', rechthoek_wk_hbo).y(192.7 - rechthoek_wk_hbo);
	}	

	console.log( 'percentage_wk_vmbo: ' + percentage_wk_vmbo );


	jQuery('.tooltip:not(.tooltipstered)').tooltipster({
		'delay': 50
	});

	jQuery( '#rechthoek_vmbo' ).tooltipster('content', 'Wervingskracht: ' + formatNumber(gegevens.jaar_2020[regio][functie].wk_vmbo ));
	jQuery( '#rechthoek_mbo2' ).tooltipster('content', 'Wervingskracht: ' + formatNumber(gegevens.jaar_2020[regio][functie].wk_mbo2 ));
	jQuery( '#rechthoek_mbo3' ).tooltipster('content', 'Wervingskracht: ' + formatNumber(gegevens.jaar_2020[regio][functie].wk_mbo3 ));
	jQuery( '#rechthoek_mbo4' ).tooltipster('content', 'Wervingskracht: ' + formatNumber(gegevens.jaar_2020[regio][functie].wk_mbo4 ));
	jQuery( '#rechthoek_hbo' ).tooltipster('content', 'Wervingskracht: ' + formatNumber(gegevens.jaar_2020[regio][functie].wk_hbo ));

}