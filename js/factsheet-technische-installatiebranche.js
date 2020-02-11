// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

jQuery( document ).ready(function() {

// Laad gegevens via JSON vanaf externe server
var gegevens;
var regio = 'totaal_regios';
var functie;
jQuery.ajax({
	url: '/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.json',
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

	//console.log( 'Regio: ' + regio );
	//console.log( 'Functie: ' + functie );
	//console.log( 'LocalStorage regio: ' + regio );
	//console.log( 'LocalStorage functie: ' + functie );
	console.log( gegevens );
	//console.log( kleuren );

	// Voeg CSS class "selected" toe aan de knoppen op basis van de gekozen regio en functie
	jQuery('#knoppen_functies button').removeClass( "selected");
	jQuery('#knoppen_regios button').removeClass( "selected");
	jQuery( "#knop_" + regio).addClass( "selected");
	jQuery( "#knop_" + functie).addClass( "selected");

	// Toon figuur aan de hand van de gekozen functie
	jQuery('#functies g').hide();
	jQuery('#' + functie).show();

	jQuery('#aantal-1-25-werknemers tspan').text(formatNumber(gegevens.werknemers_bedrijfsgrootte.totaal_regios.minder_dan_25_werknemers));

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

	// Kleur regio's aan de hand van kleuren json
	jQuery('#kaart path').css({ fill: kleuren.totaal_regios.licht });
	jQuery('#kaart #' + regio + ' path').css({ fill: kleuren[regio].licht });
	jQuery( '#label_totaal' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#label_wervingsbehoefte' ).css({ stroke: kleuren[regio].hoofdkleur });

	// Activeer svg elementen voor svg.js
	/*var staaf_2016 = SVG.get('staaf_2016');
	var staaf_2017 = SVG.get('staaf_2017');
	var staaf_2018 = SVG.get('staaf_2018');
	var staaf_2019 = SVG.get('staaf_2019');
	var staaf_2020 = SVG.get('staaf_2020');

	var staaf_2016_wervingsbehoefte = SVG.get('staaf_2016_wervingsbehoefte');
	var staaf_2017_wervingsbehoefte = SVG.get('staaf_2017_wervingsbehoefte');
	var staaf_2018_wervingsbehoefte = SVG.get('staaf_2018_wervingsbehoefte');
	var staaf_2019_wervingsbehoefte = SVG.get('staaf_2019_wervingsbehoefte');
	var staaf_2020_wervingsbehoefte = SVG.get('staaf_2020_wervingsbehoefte');

	var staaf_2016_uitstroom = SVG.get('staaf_2016_uitstroom');
	var staaf_2017_uitstroom = SVG.get('staaf_2017_uitstroom');
	var staaf_2018_uitstroom = SVG.get('staaf_2018_uitstroom');
	var staaf_2019_uitstroom = SVG.get('staaf_2019_uitstroom');
	var staaf_2020_uitstroom = SVG.get('staaf_2020_uitstroom');

	var staaf_2016_groei = SVG.get('staaf_2016_groei');
	var staaf_2017_groei = SVG.get('staaf_2017_groei');
	var staaf_2018_groei = SVG.get('staaf_2018_groei');
	var staaf_2019_groei = SVG.get('staaf_2019_groei');
	var staaf_2020_groei = SVG.get('staaf_2020_groei');

	// Bereken percentages
	hoogte_staaf_2016 = gegevens.jaar_2016[regio][functie].referentiejaar * 163 / max_schaal;
	hoogte_staaf_2017 = gegevens.jaar_2017[regio][functie].referentiejaar * 163 / max_schaal;
	hoogte_staaf_2018 = gegevens.jaar_2018[regio][functie].referentiejaar * 163 / max_schaal;
	hoogte_staaf_2019 = gegevens.jaar_2019[regio][functie].referentiejaar * 163 / max_schaal;
	hoogte_staaf_2020 = gegevens.jaar_2020[regio][functie].referentiejaar * 163 / max_schaal;

	hoogte_staaf_2016_wervingsbehoefte = gegevens.jaar_2016[regio][functie].wervingsbehoefte * 163 / max_schaal;
	hoogte_staaf_2017_wervingsbehoefte = gegevens.jaar_2017[regio][functie].wervingsbehoefte * 163 / max_schaal;
	hoogte_staaf_2018_wervingsbehoefte = gegevens.jaar_2018[regio][functie].wervingsbehoefte * 163 / max_schaal;
	hoogte_staaf_2019_wervingsbehoefte = gegevens.jaar_2019[regio][functie].wervingsbehoefte * 163 / max_schaal;
	hoogte_staaf_2020_wervingsbehoefte = gegevens.jaar_2020[regio][functie].wervingsbehoefte * 163 / max_schaal;

	hoogte_staaf_2016_uitstroom = gegevens.jaar_2016[regio][functie].uit_regio_en_functie * 163 / max_schaal;
	hoogte_staaf_2017_uitstroom = gegevens.jaar_2017[regio][functie].uit_regio_en_functie * 163 / max_schaal;
	hoogte_staaf_2018_uitstroom = gegevens.jaar_2018[regio][functie].uit_regio_en_functie * 163 / max_schaal;
	hoogte_staaf_2019_uitstroom = gegevens.jaar_2019[regio][functie].uit_regio_en_functie * 163 / max_schaal;
	hoogte_staaf_2020_uitstroom = gegevens.jaar_2020[regio][functie].uit_regio_en_functie * 163 / max_schaal;

	hoogte_staaf_2016_groei = gegevens.jaar_2016[regio][functie].groei * 163 / max_schaal;
	hoogte_staaf_2017_groei = gegevens.jaar_2017[regio][functie].groei * 163 / max_schaal;
	hoogte_staaf_2018_groei = gegevens.jaar_2018[regio][functie].groei * 163 / max_schaal;
	hoogte_staaf_2019_groei = gegevens.jaar_2019[regio][functie].groei * 163 / max_schaal;
	hoogte_staaf_2020_groei = gegevens.jaar_2020[regio][functie].groei * 163 / max_schaal;

	// Animaties (SVG.js is nodig omdat jQuery geen x en y variabelen of animaties op SVG elementen ondersteunt)
	staaf_2016.attr('height', hoogte_staaf_2016).y( 196.7 - hoogte_staaf_2016);
	staaf_2017.attr('height', hoogte_staaf_2017).y( 196.7 - hoogte_staaf_2017);
	staaf_2018.attr('height', hoogte_staaf_2018).y( 196.7 - hoogte_staaf_2018);
	staaf_2019.attr('height', hoogte_staaf_2019).y( 196.7 - hoogte_staaf_2019);
	staaf_2020.attr('height', hoogte_staaf_2020).y( 196.7 - hoogte_staaf_2020);

	staaf_2016_wervingsbehoefte.attr('height', 0).y( 196.7 - hoogte_staaf_2016).attr('height', hoogte_staaf_2016_wervingsbehoefte);
	staaf_2017_wervingsbehoefte.attr('height', 0).y( 196.7 - hoogte_staaf_2017).attr('height', hoogte_staaf_2017_wervingsbehoefte);
	staaf_2018_wervingsbehoefte.attr('height', 0).y( 196.7 - hoogte_staaf_2018).attr('height', hoogte_staaf_2018_wervingsbehoefte);
	staaf_2019_wervingsbehoefte.attr('height', 0).y( 196.7 - hoogte_staaf_2019).attr('height', hoogte_staaf_2019_wervingsbehoefte);
	staaf_2020_wervingsbehoefte.attr('height', 0).y( 196.7 - hoogte_staaf_2020).attr('height', hoogte_staaf_2020_wervingsbehoefte);

	staaf_2016_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2016 + hoogte_staaf_2016_groei).attr('height', hoogte_staaf_2016_uitstroom);
	staaf_2017_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2017 + hoogte_staaf_2017_groei).attr('height', hoogte_staaf_2017_uitstroom);
	staaf_2018_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2018 + hoogte_staaf_2018_groei).attr('height', hoogte_staaf_2018_uitstroom);
	staaf_2019_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2019 + hoogte_staaf_2019_groei).attr('height', hoogte_staaf_2019_uitstroom);
	staaf_2020_uitstroom.attr('height', 0).y( 196.7 - hoogte_staaf_2020 + hoogte_staaf_2020_groei).attr('height', hoogte_staaf_2020_uitstroom);

	staaf_2016_groei.attr('height', 0).y( 196.7 - hoogte_staaf_2016).attr('height', hoogte_staaf_2016_groei);
	staaf_2017_groei.attr('height', 0).y( 196.7 - hoogte_staaf_2017).attr('height', hoogte_staaf_2017_groei);
	staaf_2018_groei.attr('height', 0).y( 196.7 - hoogte_staaf_2018).attr('height', hoogte_staaf_2018_groei);
	staaf_2019_groei.attr('height', 0).y( 196.7 - hoogte_staaf_2019).attr('height', hoogte_staaf_2019_groei);
	staaf_2020_groei.attr('height', 0).y( 196.7 - hoogte_staaf_2020).attr('height', hoogte_staaf_2020_groei);

	var jaren = [ 2016, 2017, 2018, 2019, 2020 ];
	jQuery.each( jaren, function( i, jaartal ) {

		// Kleur staven aan de hand van geselecteerde regio
		jQuery('#staaf_' + jaartal).css({ fill: kleuren[regio].hoofdkleur });
		jQuery('#staaf_' + jaartal).css({ stroke: kleuren[regio].hoofdkleur });
		jQuery('#staaf_' + jaartal + '_wervingsbehoefte').css({ stroke: kleuren[regio].hoofdkleur });
		
		// Tooltips
		jQuery('#staaf_' + jaartal).tooltipster('content', 'Totaal aantal werknemers: ' + formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].referentiejaar + gegevens.jaar_' + jaartal + '[regio][functie].groei')));
		jQuery('#staaf_' + jaartal + '_wervingsbehoefte').tooltipster('content', 'Wervingsbehoefte: ' + formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].wervingsbehoefte')));
		jQuery('#staaf_' + jaartal + '_uitstroom').tooltipster('content', 'Uitstroom: ' + formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].uit_regio_en_functie')));
		jQuery('#staaf_' + jaartal + '_groei').tooltipster('content', 'Groei: ' + formatNumber(eval('gegevens.jaar_' + jaartal + '[regio][functie].groei')));

	}); */

}

})