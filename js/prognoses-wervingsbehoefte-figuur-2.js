// Laad gegevens via JSON vanaf externe server
var gegevens;
jQuery.ajax({
	url: 'http://trendfiles.otib.nl/data/json-figuur-1-2.json',
	dataType: 'json',
	success: function ( data, textStatus, jqXHR) {
		gegevens = data;
		maakGrafiek( regio, functie);
	},
	error: function( jqXHR, textStatus, errorThrown) {
		alert('Gegevens kunnen niet worden geladen.');
	}
});

var jsonKleuren = '{"noord_holland":{"hoofdkleur":"#a75634","donker":"#5b2f17","licht":"#d3a999"},"gelderland_overijssel":{"hoofdkleur":"#688f8c","donker":"#3c5553","licht":"#b3c7c5"},"noord_nederland":{"hoofdkleur":"#d4be59","donker":"#685f2c","licht":"#eadeac"},"zuid_holland":{"hoofdkleur":"#896377","donker":"#46233c","licht":"#c5b1bc"},"zuid_nederland":{"hoofdkleur":"#a29c5a","donker":"#5b5a30","licht":"#d0cdac"},"midden_nederland":{"hoofdkleur":"#6d8293","donker":"#3b4851","licht":"#b6c0c9"},"totaal_regios":{"hoofdkleur":"#2E8D9E","donker":"#044954","licht":"#d9d9d9"}}';
kleuren = JSON.parse(jsonKleuren);

// Bewaar regio in localstorage zodat deze ook in de volgende stap beschikbaar is
if ( localStorage.getItem('geselecteerde_regio') === null) {
	regio = 'totaal_regios';
} else {
	regio = localStorage['geselecteerde_regio'];
}

// Bewaar functie in localstorage zodat deze ook in de volgende stap beschikbaar is
if ( localStorage.getItem('geselecteerde_functie') === null) {
	functie = 'totaal_functies';
} else {
	functie = localStorage['geselecteerde_functie'];
}

// Selecteer de regio na klikken op knop
function kiesRegio( geselecteerde_regio) {
	regio = geselecteerde_regio;
	maakGrafiek( regio, functie);
	localStorage['geselecteerde_regio'] = regio;
}

// Selecteer de functie na klikken op knop
function kiesFunctie( geselecteerde_functie) {
	functie = geselecteerde_functie;
	maakGrafiek( regio, functie);
	localStorage['geselecteerde_functie'] = functie;
}

function maakGrafiek(regio, functie) {

	// Voeg CSS class "selected" toe aan de knoppen op basis van de gekozen regio en functie
	jQuery('#knoppen_functies button').removeClass( "selected");
	jQuery('#knoppen_regios button').removeClass( "selected");
	jQuery( "#knop_" + regio).addClass( "selected");
	jQuery( "#knop_" + functie).addClass( "selected");

	// Toon figuur aan de hand van de gekozen functie
	jQuery('#functies g').hide();
	jQuery('#' + functie).show();

	// Toon een punt bij duizendtallen
	function formatNumber (num) {
		return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
	}

	// Wijzig de schaal van de y-as als een specifieke regio is gekozen zodat de staven niet te kort worden
	if ( regio != 'totaal_regios') {
		max_schaal = 30000;
		jQuery('#y-1').text( formatNumber('6000'));
		jQuery('#y-2').text( formatNumber('12000'));
		jQuery('#y-3').text( formatNumber('18000'));
		jQuery('#y-4').text( formatNumber('24000'));
		jQuery('#y-5').text( formatNumber('30000'));
	} else {
		max_schaal = 150000;
		jQuery('#y-1').text( formatNumber('30000'));
		jQuery('#y-2').text( formatNumber('60000'));
		jQuery('#y-3').text( formatNumber('90000'));
		jQuery('#y-4').text( formatNumber('120000'));
		jQuery('#y-5').text( formatNumber('150000'));
	}

	jQuery('.tooltip:not(.tooltipstered)').tooltipster({
		'delay': 50,
		'side': 'right'
	});

	// Kleur regio's aan de hand van kleuren json
	jQuery('#kaart path').css({ fill: kleuren.totaal_regios.licht });
	jQuery('#kaart #' + regio + ' path').css({ fill: kleuren[regio].licht });

	// Activeer svg elementen voor svg.js
	var staaf_2016 = SVG.get('staaf_2016');
	var staaf_2017 = SVG.get('staaf_2017');
	var staaf_2018 = SVG.get('staaf_2018');
	var staaf_2019 = SVG.get('staaf_2019');
	var staaf_2020 = SVG.get('staaf_2020');

	var staaf_2016_uitstroom = SVG.get('staaf_2016_uitstroom');
	var staaf_2017_uitstroom = SVG.get('staaf_2017_uitstroom');
	var staaf_2018_uitstroom = SVG.get('staaf_2018_uitstroom');
	var staaf_2019_uitstroom = SVG.get('staaf_2019_uitstroom');
	var staaf_2020_uitstroom = SVG.get('staaf_2020_uitstroom');

	// Bereken percentages
	hoogte_staaf_2016 = gegevens.jaar_2016[regio][functie].totaalaantalTI * 163 / max_schaal;
	hoogte_staaf_2017 = gegevens.jaar_2017[regio][functie].totaalaantalTI * 163 / max_schaal;
	hoogte_staaf_2018 = gegevens.jaar_2018[regio][functie].totaalaantalTI * 163 / max_schaal;
	hoogte_staaf_2019 = gegevens.jaar_2019[regio][functie].totaalaantalTI * 163 / max_schaal;
	hoogte_staaf_2020 = gegevens.jaar_2020[regio][functie].totaalaantalTI * 163 / max_schaal;

	hoogte_staaf_2016_uitstroom = gegevens.jaar_2016[regio][functie].uitregio * 163 / max_schaal;
	hoogte_staaf_2017_uitstroom = gegevens.jaar_2017[regio][functie].uitregio * 163 / max_schaal;
	hoogte_staaf_2018_uitstroom = gegevens.jaar_2018[regio][functie].uitregio * 163 / max_schaal;
	hoogte_staaf_2019_uitstroom = gegevens.jaar_2019[regio][functie].uitregio * 163 / max_schaal;
	hoogte_staaf_2020_uitstroom = gegevens.jaar_2020[regio][functie].uitregio * 163 / max_schaal;

	// Animaties (SVG.js is nodig omdat jQuery geen x en y variabelen of animaties op SVG elementen ondersteunt)
	staaf_2016.attr('height', hoogte_staaf_2016).y( 196.7 - hoogte_staaf_2016);
	staaf_2017.attr('height', hoogte_staaf_2017).y( 196.7 - hoogte_staaf_2017);
	staaf_2018.attr('height', hoogte_staaf_2018).y( 196.7 - hoogte_staaf_2018);
	staaf_2019.attr('height', hoogte_staaf_2019).y( 196.7 - hoogte_staaf_2019);
	staaf_2020.attr('height', hoogte_staaf_2020).y( 196.7 - hoogte_staaf_2020);

	staaf_2016_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2016).animate().attr('height', hoogte_staaf_2016_uitstroom);
	staaf_2017_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2017).animate().attr('height', hoogte_staaf_2017_uitstroom);
	staaf_2018_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2018).animate().attr('height', hoogte_staaf_2018_uitstroom);
	staaf_2019_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2019).animate().attr('height', hoogte_staaf_2019_uitstroom);
	staaf_2020_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2020).animate().attr('height', hoogte_staaf_2020_uitstroom);

	var jaren = [ 2016, 2017, 2018, 2019, 2020 ];
	jQuery.each( jaren, function( i, jaartal ) {

		// Kleur staven aan de hand van geselecteerde regio
		jQuery('#staaf_' + jaartal).css({ fill: kleuren[regio].hoofdkleur });
		jQuery('#staaf_' + jaartal).css({ stroke: kleuren[regio].hoofdkleur });
		jQuery('#staaf_' + jaartal + '_uitstroom').css({ stroke: kleuren[regio].hoofdkleur });
		
		// Tooltips
		jQuery('#staaf_' + jaartal).tooltipster('content', formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].totaalaantalTI - gegevens.jaar_' + jaartal + '[regio][functie].uitregio')));
		jQuery('#staaf_' + jaartal + '_uitstroom').tooltipster('content', formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].uitregio')));

	});

}