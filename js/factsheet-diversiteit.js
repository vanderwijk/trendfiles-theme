// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($) {

	var vergelijking = 'geslacht';
	jQuery.ajax({
		url: '/wp-content/themes/trendfiles-theme/js/factsheet-diversiteit.json',
		dataType: 'json',
		success: function ( data, textStatus, jqXHR) {
			gegevens = data;
			maakGrafiek(vergelijking);
		},
		error: function( jqXHR, textStatus, errorThrown) {
			alert('Gegevens kunnen niet worden geladen.');
		}
	});

})

function ververs(vergelijking) {
	maakGrafiek(vergelijking);
}

function maakGrafiek(vergelijking) {

	var werknemers_2019_totaal = gegevens.nederland.werknemers.jaar_2019.totaal;
	document.getElementById('werknemers_2019_totaal').textContent = formatNumber(werknemers_2019_totaal);

	var beroepsbevolking_2019_totaal = gegevens.nederland.beroepsbevolking.jaar_2019.totaal;
	document.getElementById('beroepsbevolking_2019_totaal').textContent = formatNumber(beroepsbevolking_2019_totaal);

	var werknemers_2019_vrouwen = gegevens.nederland.werknemers.jaar_2019.vrouwen;
	var breedte_werknemers_2019_vrouwen = werknemers_2019_vrouwen * 735 / werknemers_2019_totaal;
	var werknemers_2019_vrouwen_percentage = Math.round(werknemers_2019_vrouwen * 100 / werknemers_2019_totaal);

	document.getElementById('werknemers_2019_vrouwen').textContent = formatNumber(werknemers_2019_vrouwen);
	document.getElementById('werknemers_2019_vrouwen').setAttribute('x', breedte_werknemers_2019_vrouwen + 64);
	document.getElementById('werknemers_2019_vrouwen_percentage').textContent = '(' + werknemers_2019_vrouwen_percentage + '%)';
	document.getElementById('werknemers_2019_vrouwen_percentage').setAttribute('x', breedte_werknemers_2019_vrouwen + 194);
	document.getElementById('werknemers_2019_vrouwen_rect').setAttribute('width', breedte_werknemers_2019_vrouwen);

	if (vergelijking === "afkomst") {
		document.getElementById('afkomst').style.display = 'block';
		document.getElementById('geslacht').style.display = 'none';
		document.getElementById('leeftijd').style.display = 'none';
		document.getElementById('vrouw-silhouet').style.display = 'none';
		document.getElementById('55plus-silhouet').style.display = 'none';
		document.getElementById('allochtoon-silhouet').style.display = 'block';
		var groep_1 = "westerse_migratieachtergrond";
		var groep_1_class = "fill_1";
		var groep_2 = "niet_westerse_migratieachtergrond";
		var groep_2_class = "fill_2";
		var groep_3 = "autochtoon";
	} else if (vergelijking === "geslacht") {
		document.getElementById('afkomst').style.display = 'none';
		document.getElementById('geslacht').style.display = 'block';
		document.getElementById('leeftijd').style.display = 'none';
		document.getElementById('vrouw-silhouet').style.display = 'block';
		document.getElementById('55plus-silhouet').style.display = 'none';
		document.getElementById('allochtoon-silhouet').style.display = 'none';
		var groep_1 = "vrouwen";
		var groep_1_class = "fill_5";
		var groep_3 = "mannen";

	} else if (vergelijking === "leeftijd") {
		document.getElementById('afkomst').style.display = 'none';
		document.getElementById('geslacht').style.display = 'none';
		document.getElementById('leeftijd').style.display = 'block';
		document.getElementById('vrouw-silhouet').style.display = 'none';
		document.getElementById('55plus-silhouet').style.display = 'block';
		document.getElementById('allochtoon-silhouet').style.display = 'none';
		var groep_1 = "ouder_dan_55_jaar";
		var groep_1_class = "fill_grey_2";
		var groep_3 = "jonger_dan_55_jaar";
	}


	var functies = ["directie", "ontwikkelen", "plannen_en_werkvoorbereiding", "tekenen", "technisch_voorbereidend_overig", "monteren_installeren", "leidinggevend_monteren_installeren", "voorbewerken", "staf_administratief_financieel", "staf_personeelsfunctionaris", "staf_verkopen", "staf_afdelingschef", "staf_bedrijfsleiding", "staf_overig", "overig_technisch_uitvoerend", "overig", "alle_functies"];

	functies.forEach(function(functie) {

		breedte_werknemers_2019_functie_2 = null;
		document.getElementById( functie + '_2').setAttribute('x', 0);
		document.getElementById('percentage_' + functie + '_2').setAttribute('x', 0);

		var werknemers_2019_functie_1 = gegevens.nederland[vergelijking][functie][groep_1];

		if ( typeof groep_2 != "undefined" ) {
			var werknemers_2019_functie_2 = gegevens.nederland[vergelijking][functie][groep_2];
			var breedte_werknemers_2019_functie_2 = werknemers_2019_functie_2 * 1221 / 100;
		}
		var werknemers_2019_functie_3 = gegevens.nederland[vergelijking][functie][groep_3];
		var breedte_werknemers_2019_functie_1 = werknemers_2019_functie_1 * 1221 / 100;
		
		document.getElementById( functie + '_1').setAttribute('width', breedte_werknemers_2019_functie_1);
		document.getElementById( functie + '_1').setAttribute('class', groep_1_class);
		document.getElementById('percentage_' + functie + '_1').setAttribute('class', groep_1_class);
		document.getElementById('percentage_' + functie + '_1').textContent = werknemers_2019_functie_1 + '%';
		document.getElementById('percentage_' + functie + '_1').setAttribute('x', breedte_werknemers_2019_functie_1 + breedte_werknemers_2019_functie_2 + 536);

		document.getElementById( functie + '_2').setAttribute('visibility', 'hidden');
		document.getElementById('percentage_' + functie + '_2').setAttribute('visibility', 'hidden');

		if ( typeof groep_2 != "undefined" ) {
			document.getElementById( functie + '_2').setAttribute('width', breedte_werknemers_2019_functie_2);
			document.getElementById( functie + '_2').setAttribute('x', breedte_werknemers_2019_functie_1 + 516);
			document.getElementById( functie + '_2').setAttribute('class', groep_2_class);
			document.getElementById( functie + '_2').setAttribute('visibility', 'visible');
			document.getElementById('percentage_' + functie + '_2').setAttribute('visibility', 'visible');
			document.getElementById('percentage_' + functie + '_2').setAttribute('class', groep_2_class);
			document.getElementById('percentage_' + functie + '_2').textContent = werknemers_2019_functie_2 + '%';
			document.getElementById('percentage_' + functie + '_2').setAttribute('x', breedte_werknemers_2019_functie_1 + breedte_werknemers_2019_functie_2 + 596);
		}
		document.getElementById('percentage_' + functie + '_3').textContent = werknemers_2019_functie_3 + '%';

	})

}