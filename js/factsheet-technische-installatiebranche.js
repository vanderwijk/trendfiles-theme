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

	var jsonKleuren = '{"noord_holland":{"hoofdkleur":"#a75634","donker":"#5b2f17","licht":"#d3a999"},"gelderland_overijssel":{"hoofdkleur":"#688f8c","donker":"#3c5553","licht":"#b3c7c5"},"noord_nederland":{"hoofdkleur":"#d4be59","donker":"#685f2c","licht":"#eadeac"},"zuid_holland":{"hoofdkleur":"#896377","donker":"#46233c","licht":"#c5b1bc"},"zuid_nederland":{"hoofdkleur":"#a29c5a","donker":"#5b5a30","licht":"#d0cdac"},"midden_nederland":{"hoofdkleur":"#6d8293","donker":"#3b4851","licht":"#b6c0c9"},"nederland":{"hoofdkleur":"#2E8D9E","donker":"#044954","licht":"#F4F9FA","medium":"919494"}}';
	kleuren = JSON.parse(jsonKleuren);

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
	//console.log( kleuren );

	var aantal_bedrijven_per_jaar = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2019;
	var aantal_bedrijven_per_jaar_2018 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2018;
	var aantal_bedrijven_per_jaar_2017 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2017;
	var aantal_bedrijven_per_jaar_2016 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2016;

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

	// Kleur regio's aan de hand van kleuren json
	jQuery('#achtergrond_bovenvlak').css({ fill: kleuren[regio].licht });
	jQuery('#achtergrond_ondervlak').css({ fill: kleuren[regio].licht });

	jQuery('#vulling_aantal_bedrijven_per_jaar_2018').css({ fill: kleuren[regio].hoofdkleur });
	jQuery('#vulling_aantal_bedrijven_per_jaar_2017').css({ fill: kleuren[regio].donker });

	jQuery('#aantal_bedrijven_per_jaar_2018').css({ fill: kleuren[regio].hoofdkleur });
	jQuery('#aantal_bedrijven_per_jaar_2017').css({ fill: kleuren[regio].donker });

	jQuery('#k_minder_dan_25_werknemers').css({ stroke: kleuren[regio].hoofdkleur });
	jQuery('#m_van_25_tot_250_werknemers').css({ stroke: kleuren[regio].donker });

	jQuery('#aantal_minder_dan_25_werknemers').css({ fill: kleuren[regio].hoofdkleur });
	jQuery('#aantal_van_25_tot_250_werknemers').css({ fill: kleuren[regio].donker });

	jQuery('#aantal_zzp_ers').css({ fill: kleuren[regio].hoofdkleur });
	jQuery('#plus').css({ fill: kleuren[regio].hoofdkleur });

	jQuery('#aantal_bedrijven').css({ fill: kleuren[regio].donker });

	jQuery( '#label_totaal' ).css({ fill: kleuren[regio].hoofdkleur });
	jQuery( '#label_wervingsbehoefte' ).css({ stroke: kleuren[regio].hoofdkleur });


}

