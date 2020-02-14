// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
}

jQuery( document ).ready(function($) {

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

	// selecteer de regio na klikken op knop
	$('.knoppen li').click(function() {
		$('.knoppen li').addClass('disabled');
		$(this).removeClass('disabled');
		var regio = $(this).attr('id');
		$('article').attr('id', regio);
		maakGrafiek( regio );
	});
})

function maakGrafiek(regio) {
	//console.log( gegevens );

	var aantal_bedrijven_per_jaar = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2019;
	var aantal_bedrijven_per_jaar_2018 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2018;
	var aantal_bedrijven_per_jaar_2017 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2017;
	var aantal_bedrijven_per_jaar_2016 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2016;

	var x2_aantal_bedrijven_per_jaar_2018 = aantal_bedrijven_per_jaar_2018 * 487 / aantal_bedrijven_per_jaar;
	var x2_aantal_bedrijven_per_jaar_2017 = aantal_bedrijven_per_jaar_2017 * 487 / aantal_bedrijven_per_jaar;
	var x2_aantal_bedrijven_per_jaar_2016 = aantal_bedrijven_per_jaar_2016 * 487 / aantal_bedrijven_per_jaar;

	var aantal_bedrijven_per_kwartaal_1 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_1;
	var aantal_bedrijven_per_kwartaal_2 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2;
	var aantal_bedrijven_per_kwartaal_3 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_3;
	var aantal_bedrijven_per_kwartaal_4 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_4;

	var aantal_zzp_ers_2019 = gegevens[regio].aantal_zzp_ers.jaar_2019;

	var minder_dan_25_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.minder_dan_25_werknemers;
	var van_25_tot_250_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.van_25_tot_250_werknemers;
	var meer_dan_250_werknemers = gegevens[regio].werknemers_bedrijfsgrootte.meer_dan_250_werknemers;
	
	var element_bedrijfsgrootte_klein = document.getElementById("circle_bedrijfsgrootte_klein");
	var pathLength = element_bedrijfsgrootte_klein.getTotalLength();
	
	document.getElementById("aantal_meer_dan_250_werknemers").textContent = formatNumber(meer_dan_250_werknemers);
	document.getElementById("aantal_van_25_tot_250_werknemers").textContent = formatNumber(van_25_tot_250_werknemers);
	document.getElementById("aantal_minder_dan_25_werknemers").textContent = formatNumber(minder_dan_25_werknemers);

	document.getElementById("aantal_zzp_ers").textContent = formatNumber(aantal_zzp_ers_2019);
	document.getElementById("aantal_bedrijven").textContent = formatNumber(aantal_bedrijven_per_jaar);

	document.getElementById("aantal_bedrijven_per_jaar_2018").textContent = formatNumber(aantal_bedrijven_per_jaar_2018);
	document.getElementById("aantal_bedrijven_per_jaar_2017").textContent = formatNumber(aantal_bedrijven_per_jaar_2017);
	document.getElementById("aantal_bedrijven_per_jaar_2016").textContent = formatNumber(aantal_bedrijven_per_jaar_2016);

	document.getElementById("aantal_bedrijven_per_kwartaal_1").textContent = formatNumber(aantal_bedrijven_per_kwartaal_1);
	document.getElementById("aantal_bedrijven_per_kwartaal_2").textContent = formatNumber(aantal_bedrijven_per_kwartaal_2);
	document.getElementById("aantal_bedrijven_per_kwartaal_3").textContent = formatNumber(aantal_bedrijven_per_kwartaal_3);
	document.getElementById("aantal_bedrijven_per_kwartaal_4").textContent = formatNumber(aantal_bedrijven_per_kwartaal_4);

	var bedrijfsgroottes = ["g_", "m_", "k_"];
	
	bedrijfsgroottes.forEach(function(grootte) {
	
		var element_minder_dan_25_werknemers = document.getElementById( grootte + "minder_dan_25_werknemers");
		var element_van_25_tot_250_werknemers = document.getElementById( grootte + "van_25_tot_250_werknemers");
		var element_meer_dan_250_werknemers = document.getElementById( grootte + "meer_dan_250_werknemers");
	
		var na_element_minder_dan_25_werknemers = document.getElementById( grootte + "na_minder_dan_25_werknemers");
		var na_element_van_25_tot_250_werknemers = document.getElementById( grootte + "na_van_25_tot_250_werknemers");
		var na_element_meer_dan_250_werknemers = document.getElementById( grootte + "na_meer_dan_250_werknemers");
	
		// minder dan 25 werknemers
		section_minder_dan_25_werknemers = minder_dan_25_werknemers * pathLength / aantal_bedrijven_per_jaar;
		element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers - 2;
		na_element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers;
	
		// van 25 tot 250 werknemers
		section_van_25_tot_250_werknemers = van_25_tot_250_werknemers * pathLength / aantal_bedrijven_per_jaar;
		element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
		// meer dan 250 werknemers
		section_meer_dan_250_werknemers = meer_dan_250_werknemers * pathLength / aantal_bedrijven_per_jaar;
		element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
	})

	jQuery('#download-pdf').attr('href', '/wp-content/themes/trendfiles-theme/pdf/factsheet_technischeinstallatiebranche_' + regio + '.pdf');

	jQuery('#vulling_aantal_bedrijven_per_jaar_2018').attr('x2', x2_aantal_bedrijven_per_jaar_2018);
	jQuery('#vulling_aantal_bedrijven_per_jaar_2017').attr('x2', x2_aantal_bedrijven_per_jaar_2017);
	jQuery('#vulling_aantal_bedrijven_per_jaar_2016').attr('x2', x2_aantal_bedrijven_per_jaar_2016);

	jQuery('#aantal_bedrijven_per_jaar_2018').attr('x', x2_aantal_bedrijven_per_jaar_2018 + 10);
	jQuery('#aantal_bedrijven_per_jaar_2017').attr('x', x2_aantal_bedrijven_per_jaar_2017 + 10);
	jQuery('#aantal_bedrijven_per_jaar_2016').attr('x', x2_aantal_bedrijven_per_jaar_2016 + 10);

}