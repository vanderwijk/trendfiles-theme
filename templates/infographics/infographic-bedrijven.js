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
	var aantal_bedrijven = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2021_1;
	document.getElementById('aantal_bedrijven').textContent = formatNumber(aantal_bedrijven);

	var aantal_zzp_ers = gegevens[regio].aantal_zzp_ers.jaar_2019;
	document.getElementById('aantal_zzp_ers').textContent = formatNumber(aantal_zzp_ers);

	var minder_dan_25_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.minder_dan_25_werknemers;
	var van_25_tot_250_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.van_25_tot_250_werknemers;
	var meer_dan_250_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.meer_dan_250_werknemers;
	
	document.getElementById('aantal_meer_dan_250_werknemers').textContent = formatNumber(meer_dan_250_werknemers);
	document.getElementById('aantal_van_25_tot_250_werknemers').textContent = formatNumber(van_25_tot_250_werknemers);
	document.getElementById('aantal_minder_dan_25_werknemers').textContent = formatNumber(minder_dan_25_werknemers);

	var bedrijfsgroottes = ["g_", "m_", "k_"];
	
	bedrijfsgroottes.forEach(function(grootte) {
	
		var element_minder_dan_25_werknemers = document.getElementById( grootte + 'minder_dan_25_werknemers');
		var element_van_25_tot_250_werknemers = document.getElementById( grootte + 'van_25_tot_250_werknemers');
		var element_meer_dan_250_werknemers = document.getElementById( grootte + 'meer_dan_250_werknemers');
	
		var na_element_minder_dan_25_werknemers = document.getElementById( grootte + 'na_minder_dan_25_werknemers');
		var na_element_van_25_tot_250_werknemers = document.getElementById( grootte + 'na_van_25_tot_250_werknemers');
		var na_element_meer_dan_250_werknemers = document.getElementById( grootte + 'na_meer_dan_250_werknemers');
	
		// minder dan 25 werknemers
		section_minder_dan_25_werknemers = minder_dan_25_werknemers * 408.4070 / aantal_bedrijven;
		element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers - 2;
		na_element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers;
	
		// van 25 tot 250 werknemers
		section_van_25_tot_250_werknemers = van_25_tot_250_werknemers * 408.4070 / aantal_bedrijven;
		element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
		// meer dan 250 werknemers
		section_meer_dan_250_werknemers = meer_dan_250_werknemers * 408.4070 / aantal_bedrijven;
		element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
	})
}