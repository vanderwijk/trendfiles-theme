// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($) {

	var regio = 'nederland';
	jQuery.ajax({
		url: '/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.json',
		dataType: 'json',
		success: function ( data, textStatus, jqXHR) {
			gegevens = data;
			maakGrafiek( regio );
		},
		error: function( jqXHR, textStatus, errorThrown) {
			alert('Gegevens kunnen niet worden geladen.');
		}
	});

})

function maakGrafiek(regio) {

	var erkend_actief = gegevens[regio].leerbedrijven.erkend_actief;
	var erkend_inactief = gegevens[regio].leerbedrijven.erkend_inactief;
	var geen_leerbedrijf = gegevens[regio].leerbedrijven.geen_leerbedrijf;

	totaal_leerbedrijven = erkend_actief + erkend_inactief + geen_leerbedrijf;

	var percentage_erkend_actief = Math.round(erkend_actief * 100 / totaal_leerbedrijven);
	var percentage_erkend_inactief = Math.round(erkend_inactief * 100 / totaal_leerbedrijven);
	var percentage_geen_leerbedrijf = Math.round(geen_leerbedrijf * 100 / totaal_leerbedrijven);

	hoogte_erkend_actief = erkend_actief * 217 / totaal_leerbedrijven;
	hoogte_erkend_inactief = erkend_inactief * 217 / totaal_leerbedrijven;
	hoogte_geen_leerbedrijf = geen_leerbedrijf * 217 / totaal_leerbedrijven;

	document.getElementById('percentage_erkend_actief').textContent = percentage_erkend_actief + '%';
	document.getElementById('percentage_erkend_inactief').textContent = percentage_erkend_inactief + '%';
	document.getElementById('percentage_geen_leerbedrijf').textContent = percentage_geen_leerbedrijf + '%';

	document.getElementById('line_erkend_actief').setAttribute('height', hoogte_erkend_actief);
	document.getElementById('line_erkend_actief').setAttribute('y', hoogte_erkend_inactief + hoogte_geen_leerbedrijf + 188);

	document.getElementById('line_erkend_inactief').setAttribute('height', hoogte_erkend_inactief);
	document.getElementById('line_erkend_inactief').setAttribute('y', hoogte_geen_leerbedrijf + 188);

	var leerbedrijven = gegevens[regio].leerlingen_leerbedrijven.leerbedrijven;
	var leerlingen_leerbedrijven = gegevens[regio].leerlingen_leerbedrijven.leerlingen;

	var opleidingscentra = gegevens[regio].leerlingen_opleidingscentra.opleidingscentra;
	var leerlingen_opleidingscentra = gegevens[regio].leerlingen_opleidingscentra.leerlingen;

	totaal_leerlingen = leerlingen_opleidingscentra + leerlingen_leerbedrijven;

	document.getElementById('leerbedrijven').textContent = formatNumber(leerbedrijven);
	document.getElementById('leerlingen_leerbedrijven').textContent = formatNumber(leerlingen_leerbedrijven);

	document.getElementById('opleidingscentra').textContent = formatNumber(opleidingscentra);
	document.getElementById('leerlingen_opleidingscentra').textContent = formatNumber(leerlingen_opleidingscentra);

	var element_leerlingen_leerbedrijven = document.getElementById('circle_leerlingen_leerbedrijven');
	stroke_leerlingen_leerbedrijven = leerlingen_leerbedrijven * 439.823 / totaal_leerlingen;
	element_leerlingen_leerbedrijven.style.strokeDasharray =  "0 " + stroke_leerlingen_leerbedrijven + " 829.38";

	var element_leerlingen_opleidingscentra = document.getElementById('circle_leerlingen_opleidingscentra');
	var testtest = 439.823 - stroke_leerlingen_leerbedrijven;
	element_leerlingen_opleidingscentra.style.strokeDasharray = stroke_leerlingen_leerbedrijven + " " + testtest;

}