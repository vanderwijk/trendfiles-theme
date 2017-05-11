// Laad gegevens via JSON vanaf externe server
var gegevens;
jQuery.ajax({
	url: 'http://trendfiles.otib.nl/data/json-figuur-3.json',
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

function maakGrafiek( regio, functie ) {

	//console.log( 'Regio: ' + regio );
	//console.log( 'Functie: ' + functie );
	//console.log( 'LocalStorage regio: ' + regio );
	//console.log( 'LocalStorage functie: ' + functie );
	//console.log( gegevens );
	//console.log( kleuren );

	// Kleur regio's aan de hand van kleuren json
	jQuery( '#kaart path' ).css({ fill: kleuren.totaal_regios.licht });
	jQuery( '#kaart #' + regio + ' path' ).css({ fill: kleuren[regio].licht });

	// Kleur 2017 aan de hand van geselecteerde regio
	jQuery( '#bodem_2016' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#staaf_2016_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#bodem_2017' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#staaf_2017_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#bodem_2018' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#staaf_2018_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#bodem_2019' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#staaf_2019_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#bodem_2020' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#staaf_2020_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#label_zijinstroom' ).css({ fill: kleuren[regio].hoofdkleur });

	// Voeg CSS class "selected" toe aan de knoppen op basis van de gekozen regio en functie
	jQuery( '#knoppen_functies button').removeClass( "selected" );
	jQuery( '#knoppen_regios button').removeClass( "selected" );
	jQuery( "#knop_" + regio ).addClass( "selected" );
	jQuery( "#knop_" + functie ).addClass( "selected" );

	// Toon figuur aan de hand van de gekozen functie
	jQuery( '#functies g').hide();
	jQuery( '#' + functie ).show();

	// Activeer svg elementen voor svg.js
	var staaf_2016_zijinstroom = SVG.get('staaf_2016_zijinstroom');
	var staaf_2016_SVTI_TIverwantdiploma = SVG.get('staaf_2016_SVTI_TIverwantdiploma');
	var staaf_2016_SVoverig = SVG.get('staaf_2016_SVoverig');

	var staaf_2017_zijinstroom = SVG.get('staaf_2017_zijinstroom');
	var staaf_2017_SVTI_TIverwantdiploma = SVG.get('staaf_2017_SVTI_TIverwantdiploma');
	var staaf_2017_SVoverig = SVG.get('staaf_2017_SVoverig');

	var staaf_2018_zijinstroom = SVG.get('staaf_2018_zijinstroom');
	var staaf_2018_SVTI_TIverwantdiploma = SVG.get('staaf_2018_SVTI_TIverwantdiploma');
	var staaf_2018_SVoverig = SVG.get('staaf_2018_SVoverig');

	var staaf_2019_zijinstroom = SVG.get('staaf_2019_zijinstroom');
	var staaf_2019_SVTI_TIverwantdiploma = SVG.get('staaf_2019_SVTI_TIverwantdiploma');
	var staaf_2019_SVoverig = SVG.get('staaf_2019_SVoverig');

	var staaf_2020_zijinstroom = SVG.get('staaf_2020_zijinstroom');
	var staaf_2020_SVTI_TIverwantdiploma = SVG.get('staaf_2020_SVTI_TIverwantdiploma');
	var staaf_2020_SVoverig = SVG.get('staaf_2020_SVoverig');

	function formatNumber (num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
	}

	// Waarden in tekst
	jQuery( "#wb_2016" ).text( formatNumber (gegevens.jaar_2016[regio][functie].wb_totaal ));
	jQuery( "#wb_2017" ).text( formatNumber (gegevens.jaar_2017[regio][functie].wb_totaal ));
	jQuery( "#wb_2018" ).text( formatNumber (gegevens.jaar_2018[regio][functie].wb_totaal ));
	jQuery( "#wb_2019" ).text( formatNumber (gegevens.jaar_2019[regio][functie].wb_totaal ));
	jQuery( "#wb_2020" ).text( formatNumber (gegevens.jaar_2020[regio][functie].wb_totaal ));

	jQuery( '#staaf_2016_zijinstroom title' ).text( formatNumber (gegevens.jaar_2016[regio][functie].zijinstroom ));
	jQuery( '#staaf_2017_zijinstroom title' ).text( formatNumber (gegevens.jaar_2017[regio][functie].zijinstroom ));
	jQuery( '#staaf_2018_zijinstroom title' ).text( formatNumber (gegevens.jaar_2018[regio][functie].zijinstroom ));
	jQuery( '#staaf_2019_zijinstroom title' ).text( formatNumber (gegevens.jaar_2019[regio][functie].zijinstroom ));
	jQuery( '#staaf_2020_zijinstroom title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].zijinstroom ));

	jQuery( '#staaf_2016_SVTI_TIverwantdiploma title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma ));
	jQuery( '#staaf_2017_SVTI_TIverwantdiploma title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma ));
	jQuery( '#staaf_2018_SVTI_TIverwantdiploma title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma ));
	jQuery( '#staaf_2019_SVTI_TIverwantdiploma title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma ));
	jQuery( '#staaf_2020_SVTI_TIverwantdiploma title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma ));

	jQuery( '#staaf_2016_SVoverig title' ).text( formatNumber (gegevens.jaar_2016[regio][functie].SVoverig ));
	jQuery( '#staaf_2017_SVoverig title' ).text( formatNumber (gegevens.jaar_2017[regio][functie].SVoverig ));
	jQuery( '#staaf_2018_SVoverig title' ).text( formatNumber (gegevens.jaar_2018[regio][functie].SVoverig ));
	jQuery( '#staaf_2019_SVoverig title' ).text( formatNumber (gegevens.jaar_2019[regio][functie].SVoverig ));
	jQuery( '#staaf_2020_SVoverig title' ).text( formatNumber (gegevens.jaar_2020[regio][functie].SVoverig ));

	// Bereken percentages
	percentage_zijinstroom_2016 = 100 * gegevens.jaar_2016[regio][functie].zijinstroom / gegevens.jaar_2016[regio][functie].wb_totaal;
	percentage_SVTI_TIverwantdiploma_2016 = 100 * gegevens.jaar_2016[regio][functie].SVTI_TIverwantdiploma / gegevens.jaar_2016[regio][functie].wb_totaal;
	percentage_SVoverig_2016 = 100 * gegevens.jaar_2016[regio][functie].SVoverig / gegevens.jaar_2016[regio][functie].wb_totaal;

	percentage_zijinstroom_2017 = 100 * gegevens.jaar_2017[regio][functie].zijinstroom / gegevens.jaar_2017[regio][functie].wb_totaal;
	percentage_SVTI_TIverwantdiploma_2017 = 100 * gegevens.jaar_2017[regio][functie].SVTI_TIverwantdiploma / gegevens.jaar_2017[regio][functie].wb_totaal;
	percentage_SVoverig_2017 = 100 * gegevens.jaar_2017[regio][functie].SVoverig / gegevens.jaar_2017[regio][functie].wb_totaal;

	percentage_zijinstroom_2018 = 100 * gegevens.jaar_2018[regio][functie].zijinstroom / gegevens.jaar_2018[regio][functie].wb_totaal;
	percentage_SVTI_TIverwantdiploma_2018 = 100 * gegevens.jaar_2018[regio][functie].SVTI_TIverwantdiploma / gegevens.jaar_2018[regio][functie].wb_totaal;
	percentage_SVoverig_2018 = 100 * gegevens.jaar_2018[regio][functie].SVoverig / gegevens.jaar_2018[regio][functie].wb_totaal;

	percentage_zijinstroom_2019 = 100 * gegevens.jaar_2019[regio][functie].zijinstroom / gegevens.jaar_2019[regio][functie].wb_totaal;
	percentage_SVTI_TIverwantdiploma_2019 = 100 * gegevens.jaar_2019[regio][functie].SVTI_TIverwantdiploma / gegevens.jaar_2019[regio][functie].wb_totaal;
	percentage_SVoverig_2019 = 100 * gegevens.jaar_2019[regio][functie].SVoverig / gegevens.jaar_2019[regio][functie].wb_totaal;

	percentage_zijinstroom_2020 = 100 * gegevens.jaar_2020[regio][functie].zijinstroom / gegevens.jaar_2020[regio][functie].wb_totaal;
	percentage_SVTI_TIverwantdiploma_2020 = 100 * gegevens.jaar_2020[regio][functie].SVTI_TIverwantdiploma / gegevens.jaar_2020[regio][functie].wb_totaal;
	percentage_SVoverig_2020 = 100 * gegevens.jaar_2020[regio][functie].SVoverig / gegevens.jaar_2020[regio][functie].wb_totaal;

	// Converteer ingevoerde percentage naar absolute svg data
	var hoogte_staaf_zijinstroom_2016 = (percentage_zijinstroom_2016 / 100 * 41);
	var hoogte_staaf_SVTI_TIverwantdiploma_2016 = (percentage_SVTI_TIverwantdiploma_2016 / 100 * 41);
	var hoogte_staaf_SVoverig_2016 = (percentage_SVoverig_2016 / 100 * 41);

	var hoogte_staaf_zijinstroom_2017 = (percentage_zijinstroom_2017 / 100 * 41);
	var hoogte_staaf_SVTI_TIverwantdiploma_2017 = (percentage_SVTI_TIverwantdiploma_2017 / 100 * 41);
	var hoogte_staaf_SVoverig_2017 = (percentage_SVoverig_2017 / 100 * 41);

	var hoogte_staaf_zijinstroom_2018 = (percentage_zijinstroom_2018 / 100 * 41);
	var hoogte_staaf_SVTI_TIverwantdiploma_2018 = (percentage_SVTI_TIverwantdiploma_2018 / 100 * 41);
	var hoogte_staaf_SVoverig_2018 = (percentage_SVoverig_2018 / 100 * 41);

	var hoogte_staaf_zijinstroom_2019 = (percentage_zijinstroom_2019 / 100 * 41);
	var hoogte_staaf_SVTI_TIverwantdiploma_2019 = (percentage_SVTI_TIverwantdiploma_2019 / 100 * 41);
	var hoogte_staaf_SVoverig_2019 = (percentage_SVoverig_2019 / 100 * 41);

	var hoogte_staaf_zijinstroom_2020 = (percentage_zijinstroom_2020 / 100 * 41);
	var hoogte_staaf_SVTI_TIverwantdiploma_2020 = (percentage_SVTI_TIverwantdiploma_2020 / 100 * 41);
	var hoogte_staaf_SVoverig_2020 = (percentage_SVoverig_2020 / 100 * 41);

	// Animaties
	staaf_2016_zijinstroom.animate().attr('height', hoogte_staaf_zijinstroom_2016 ).y(192.4 - hoogte_staaf_zijinstroom_2016);
	staaf_2016_SVTI_TIverwantdiploma.animate().attr('height', hoogte_staaf_SVTI_TIverwantdiploma_2016 ).y(192.4 - hoogte_staaf_SVTI_TIverwantdiploma_2016 - hoogte_staaf_zijinstroom_2016 );
	staaf_2016_SVoverig.animate().attr('height', hoogte_staaf_SVoverig_2016 ).y(192.4 - hoogte_staaf_SVoverig_2016 - hoogte_staaf_zijinstroom_2016 - hoogte_staaf_SVTI_TIverwantdiploma_2016);

	staaf_2017_zijinstroom.animate().attr('height', hoogte_staaf_zijinstroom_2017 ).y(192.4 - hoogte_staaf_zijinstroom_2017);
	staaf_2017_SVTI_TIverwantdiploma.animate().attr('height', hoogte_staaf_SVTI_TIverwantdiploma_2017 ).y(192.4 - hoogte_staaf_SVTI_TIverwantdiploma_2017 - hoogte_staaf_zijinstroom_2017 );
	staaf_2017_SVoverig.animate().attr('height', hoogte_staaf_SVoverig_2017 ).y(192.4 - hoogte_staaf_SVoverig_2017 - hoogte_staaf_zijinstroom_2017 - hoogte_staaf_SVTI_TIverwantdiploma_2017 );

	staaf_2018_zijinstroom.animate().attr('height', hoogte_staaf_zijinstroom_2018 ).y(192.4 - hoogte_staaf_zijinstroom_2018 );
	staaf_2018_SVTI_TIverwantdiploma.animate().attr('height', hoogte_staaf_SVTI_TIverwantdiploma_2018 ).y(192.4 - hoogte_staaf_SVTI_TIverwantdiploma_2016 - hoogte_staaf_zijinstroom_2018 );
	staaf_2018_SVoverig.animate().attr('height', hoogte_staaf_SVoverig_2018 ).y(192.4 - hoogte_staaf_SVoverig_2016 - hoogte_staaf_zijinstroom_2016 - hoogte_staaf_SVTI_TIverwantdiploma_2018 );

	staaf_2019_zijinstroom.animate().attr('height', hoogte_staaf_zijinstroom_2019 ).y(192.4 - hoogte_staaf_zijinstroom_2019 );
	staaf_2019_SVTI_TIverwantdiploma.animate().attr('height', hoogte_staaf_SVTI_TIverwantdiploma_2019 ).y(192.4 - hoogte_staaf_SVTI_TIverwantdiploma_2019 - hoogte_staaf_zijinstroom_2019 );
	staaf_2019_SVoverig.animate().attr('height', hoogte_staaf_SVoverig_2019 ).y(192.4 - hoogte_staaf_SVoverig_2019 - hoogte_staaf_zijinstroom_2019 - hoogte_staaf_SVTI_TIverwantdiploma_2019 );

	staaf_2020_zijinstroom.animate().attr('height', hoogte_staaf_zijinstroom_2020 ).y(192.4 - hoogte_staaf_zijinstroom_2020 );
	staaf_2020_SVTI_TIverwantdiploma.animate().attr('height', hoogte_staaf_SVTI_TIverwantdiploma_2020 ).y(192.4 - hoogte_staaf_SVTI_TIverwantdiploma_2020 - hoogte_staaf_zijinstroom_2020 );
	staaf_2020_SVoverig.animate().attr('height', hoogte_staaf_SVoverig_2020 ).y(192.4 - hoogte_staaf_SVoverig_2020 - hoogte_staaf_zijinstroom_2020 - hoogte_staaf_SVTI_TIverwantdiploma_2020 );

}