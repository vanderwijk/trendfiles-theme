// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($) {

	var regio = 'nederland';
	jQuery.ajax({
		url: '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/factsheet-technische-installatiebranche.json',
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
	var aantal_werknemers_per_jaar = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2021_1;
	document.getElementById('aantal_werknemers').textContent = formatNumber(aantal_werknemers_per_jaar);

	var mannen = gegevens[regio].geslacht.mannen;
	var vrouwen = gegevens[regio].geslacht.vrouwen;

	var percentage_mannen = Math.round(mannen * 100 / (mannen + vrouwen));
	var percentage_vrouwen = Math.round(vrouwen * 100 / (mannen + vrouwen));
	document.getElementById('percentage_mannen').textContent = percentage_mannen + '%';
	document.getElementById('percentage_vrouwen').textContent = percentage_vrouwen + '%';

	var jonger_dan_25_jaar = gegevens[regio].leeftijd.jonger_dan_25_jaar;
	var van_25_tot_34_jaar = gegevens[regio].leeftijd.van_25_tot_34_jaar;
	var van_35_tot_44_jaar = gegevens[regio].leeftijd.van_35_tot_44_jaar;
	var van_45_tot_54_jaar = gegevens[regio].leeftijd.van_45_tot_54_jaar;
	var ouder_dan_55_jaar = gegevens[regio].leeftijd.ouder_dan_55_jaar;

	totaal_leeftijden = jonger_dan_25_jaar + van_25_tot_34_jaar + van_35_tot_44_jaar + van_45_tot_54_jaar + ouder_dan_55_jaar;

	var percentage_jonger_dan_25_jaar = Math.round(jonger_dan_25_jaar * 100 / totaal_leeftijden);
	var percentage_van_25_tot_34_jaar = Math.round(van_25_tot_34_jaar * 100 / totaal_leeftijden);
	var percentage_van_35_tot_44_jaar = Math.round(van_35_tot_44_jaar * 100 / totaal_leeftijden);
	var percentage_van_45_tot_54_jaar = Math.round(van_45_tot_54_jaar * 100 / totaal_leeftijden);
	var percentage_ouder_dan_55_jaar = Math.round(ouder_dan_55_jaar * 100 / totaal_leeftijden);

	document.getElementById('jonger_dan_25_jaar').textContent = percentage_jonger_dan_25_jaar + '%';
	document.getElementById('van_25_tot_34_jaar').textContent = percentage_van_25_tot_34_jaar + '%';
	document.getElementById('van_35_tot_44_jaar').textContent = percentage_van_35_tot_44_jaar + '%';
	document.getElementById('van_45_tot_54_jaar').textContent = percentage_van_45_tot_54_jaar + '%';
	document.getElementById('ouder_dan_55_jaar').textContent = percentage_ouder_dan_55_jaar + '%';
}