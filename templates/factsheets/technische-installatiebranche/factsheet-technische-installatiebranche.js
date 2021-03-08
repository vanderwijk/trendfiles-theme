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

	// selecteer de regio na klikken op knop
	$('#regioselectie li.regioknop').click(function() {
		$('#regioselectie li.regioknop').addClass('disabled');
		$(this).removeClass('disabled');
		var regio = $(this).attr('data-regio');
		var regio_label = $(this).html();
		$('#regio_label').html(regio_label);
		console.log(regio_label);
		$('article').attr('id', regio);
		$('#download-pdf').attr('href', '/wp-content/themes/trendfiles-theme/pdf/factsheet_technischeinstallatiebranche_' + regio + '.pdf');
		maakGrafiek( regio );
	});

	var elementPosition = $('#regioselectie').offset();

	$(window).scroll(function(){
		if($(window).scrollTop() > elementPosition.top){
			$('#regioselectie').addClass('fixed');
		} else {
			$('#regioselectie').removeClass('fixed');
		}
	});

})

function maakGrafiek(regio) {
	//console.log( gegevens );

	var aantal_bedrijven_per_jaar = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2021_1;

	document.getElementById('aantal_bedrijven').textContent = formatNumber(aantal_bedrijven_per_jaar);

	var aantal_bedrijven_per_jaar_2020 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2020;
	var aantal_bedrijven_per_jaar_2019 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2019;
	var aantal_bedrijven_per_jaar_2018 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2018;
	//var aantal_bedrijven_per_jaar_2017 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2017;
	//var aantal_bedrijven_per_jaar_2016 = gegevens[regio].aantal_bedrijven_per_jaar.jaar_2016;

	document.getElementById('aantal_bedrijven_per_jaar_2020').textContent = formatNumber(aantal_bedrijven_per_jaar_2020);
	document.getElementById('aantal_bedrijven_per_jaar_2019').textContent = formatNumber(aantal_bedrijven_per_jaar_2019);
	document.getElementById('aantal_bedrijven_per_jaar_2018').textContent = formatNumber(aantal_bedrijven_per_jaar_2018);
	//document.getElementById('aantal_bedrijven_per_jaar_2017').textContent = formatNumber(aantal_bedrijven_per_jaar_2017);
	//document.getElementById('aantal_bedrijven_per_jaar_2016').textContent = formatNumber(aantal_bedrijven_per_jaar_2016);

	var x2_aantal_bedrijven_per_jaar_2020 = aantal_bedrijven_per_jaar_2020 * 487 / aantal_bedrijven_per_jaar;
	var x2_aantal_bedrijven_per_jaar_2019 = aantal_bedrijven_per_jaar_2019 * 487 / aantal_bedrijven_per_jaar;
	var x2_aantal_bedrijven_per_jaar_2018 = aantal_bedrijven_per_jaar_2018 * 487 / aantal_bedrijven_per_jaar;
	//var x2_aantal_bedrijven_per_jaar_2017 = aantal_bedrijven_per_jaar_2017 * 487 / aantal_bedrijven_per_jaar;
	//var x2_aantal_bedrijven_per_jaar_2016 = aantal_bedrijven_per_jaar_2016 * 487 / aantal_bedrijven_per_jaar;

	document.getElementById('vulling_aantal_bedrijven_per_jaar_2020').setAttribute('x2', x2_aantal_bedrijven_per_jaar_2020);
	document.getElementById('vulling_aantal_bedrijven_per_jaar_2019').setAttribute('x2', x2_aantal_bedrijven_per_jaar_2019);
	document.getElementById('vulling_aantal_bedrijven_per_jaar_2018').setAttribute('x2', x2_aantal_bedrijven_per_jaar_2018);
	//document.getElementById('vulling_aantal_bedrijven_per_jaar_2017').setAttribute('x2', x2_aantal_bedrijven_per_jaar_2017);
	//document.getElementById('vulling_aantal_bedrijven_per_jaar_2016').setAttribute('x2', x2_aantal_bedrijven_per_jaar_2016);

	document.getElementById('aantal_bedrijven_per_jaar_2020').setAttribute('x', x2_aantal_bedrijven_per_jaar_2020 + 10);
	document.getElementById('aantal_bedrijven_per_jaar_2019').setAttribute('x', x2_aantal_bedrijven_per_jaar_2019 + 10);
	document.getElementById('aantal_bedrijven_per_jaar_2018').setAttribute('x', x2_aantal_bedrijven_per_jaar_2018 + 10);
	//document.getElementById('aantal_bedrijven_per_jaar_2017').setAttribute('x', x2_aantal_bedrijven_per_jaar_2017 + 10);
	//document.getElementById('aantal_bedrijven_per_jaar_2016').setAttribute('x', x2_aantal_bedrijven_per_jaar_2016 + 10);

	var aantal_bedrijven_per_kwartaal_1 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2021_1;
	var aantal_bedrijven_per_kwartaal_2 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2020_2;
	var aantal_bedrijven_per_kwartaal_3 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2020_3;
	var aantal_bedrijven_per_kwartaal_4 = gegevens[regio].aantal_bedrijven_per_kwartaal.kwartaal_2020_4;

	document.getElementById('aantal_bedrijven_per_kwartaal_1').textContent = formatNumber(aantal_bedrijven_per_kwartaal_1);
	document.getElementById('aantal_bedrijven_per_kwartaal_2').textContent = formatNumber(aantal_bedrijven_per_kwartaal_2);
	document.getElementById('aantal_bedrijven_per_kwartaal_3').textContent = formatNumber(aantal_bedrijven_per_kwartaal_3);
	document.getElementById('aantal_bedrijven_per_kwartaal_4').textContent = formatNumber(aantal_bedrijven_per_kwartaal_4);

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
		section_minder_dan_25_werknemers = minder_dan_25_werknemers * 534.0708 / aantal_bedrijven_per_jaar;
		element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers - 2;
		na_element_minder_dan_25_werknemers.style.strokeDasharray = section_minder_dan_25_werknemers;
	
		// van 25 tot 250 werknemers
		section_van_25_tot_250_werknemers = van_25_tot_250_werknemers * 534.0708 / aantal_bedrijven_per_jaar;
		element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_van_25_tot_250_werknemers.style.strokeDasharray = section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
		// meer dan 250 werknemers
		section_meer_dan_250_werknemers = meer_dan_250_werknemers * 534.0708 / aantal_bedrijven_per_jaar;
		element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers - 2;
		na_element_meer_dan_250_werknemers.style.strokeDasharray = section_meer_dan_250_werknemers + section_van_25_tot_250_werknemers + section_minder_dan_25_werknemers;
	
	})

	var aantal_zzp_ers_2019 = gegevens[regio].aantal_zzp_ers.jaar_2019;
	document.getElementById('aantal_zzp_ers').textContent = formatNumber(aantal_zzp_ers_2019);

	var aantal_werknemers_per_jaar = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2021_1;
	document.getElementById('aantal_werknemers').textContent = formatNumber(aantal_werknemers_per_jaar);

	var aantal_werknemers_per_jaar_2020 = gegevens[regio].aantal_werknemers_per_jaar.jaar_2020;
	var aantal_werknemers_per_jaar_2019 = gegevens[regio].aantal_werknemers_per_jaar.jaar_2019;
	var aantal_werknemers_per_jaar_2018 = gegevens[regio].aantal_werknemers_per_jaar.jaar_2018;

	document.getElementById('aantal_werknemers_per_jaar_2020').textContent = formatNumber(aantal_werknemers_per_jaar_2020);
	document.getElementById('aantal_werknemers_per_jaar_2019').textContent = formatNumber(aantal_werknemers_per_jaar_2019);
	document.getElementById('aantal_werknemers_per_jaar_2018').textContent = formatNumber(aantal_werknemers_per_jaar_2018);

	var x2_aantal_werknemers_per_jaar_2020 = aantal_werknemers_per_jaar_2020 * 487 / aantal_werknemers_per_jaar;
	var x2_aantal_werknemers_per_jaar_2019 = aantal_werknemers_per_jaar_2019 * 487 / aantal_werknemers_per_jaar;
	var x2_aantal_werknemers_per_jaar_2018 = aantal_werknemers_per_jaar_2018 * 487 / aantal_werknemers_per_jaar;

	document.getElementById('vulling_aantal_werknemers_per_jaar_2020').setAttribute('x2', x2_aantal_werknemers_per_jaar_2020);
	document.getElementById('vulling_aantal_werknemers_per_jaar_2019').setAttribute('x2', x2_aantal_werknemers_per_jaar_2019);
	document.getElementById('vulling_aantal_werknemers_per_jaar_2018').setAttribute('x2', x2_aantal_werknemers_per_jaar_2018);

	document.getElementById('aantal_werknemers_per_jaar_2020').setAttribute('x', x2_aantal_werknemers_per_jaar_2020 + 10);
	document.getElementById('aantal_werknemers_per_jaar_2019').setAttribute('x', x2_aantal_werknemers_per_jaar_2019 + 10);
	document.getElementById('aantal_werknemers_per_jaar_2018').setAttribute('x', x2_aantal_werknemers_per_jaar_2018 + 10);

	var aantal_werknemers_per_kwartaal_1 = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2021_1;
	var aantal_werknemers_per_kwartaal_2 = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2020_2;
	var aantal_werknemers_per_kwartaal_3 = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2020_3;
	var aantal_werknemers_per_kwartaal_4 = gegevens[regio].aantal_werknemers_per_kwartaal.kwartaal_2020_4;

	document.getElementById('aantal_werknemers_per_kwartaal_1').textContent = formatNumber(aantal_werknemers_per_kwartaal_1);
	document.getElementById('aantal_werknemers_per_kwartaal_2').textContent = formatNumber(aantal_werknemers_per_kwartaal_2);
	document.getElementById('aantal_werknemers_per_kwartaal_3').textContent = formatNumber(aantal_werknemers_per_kwartaal_3);
	document.getElementById('aantal_werknemers_per_kwartaal_4').textContent = formatNumber(aantal_werknemers_per_kwartaal_4);

	var mannen = gegevens[regio].geslacht.mannen;
	var vrouwen = gegevens[regio].geslacht.vrouwen;
	document.getElementById('mannen').textContent = '(' + formatNumber(mannen) + ')';
	document.getElementById('vrouwen').textContent = '(' + formatNumber(vrouwen) + ')';

	var percentage_mannen = Math.round(mannen * 100 / (mannen + vrouwen));
	var percentage_vrouwen = Math.round(vrouwen * 100 / (mannen + vrouwen));
	document.getElementById('percentage_mannen').textContent = percentage_mannen + '%';
	document.getElementById('percentage_vrouwen').textContent = percentage_vrouwen + '%';

	var jonger_dan_25_jaar = gegevens[regio].leeftijd.jonger_dan_25_jaar;
	var van_25_tot_34_jaar = gegevens[regio].leeftijd.van_25_tot_34_jaar;
	var van_35_tot_44_jaar = gegevens[regio].leeftijd.van_35_tot_44_jaar;
	var van_45_tot_54_jaar = gegevens[regio].leeftijd.van_45_tot_54_jaar;
	var ouder_dan_55_jaar = gegevens[regio].leeftijd.ouder_dan_55_jaar;

	document.getElementById('jonger_dan_25_jaar').textContent = formatNumber(jonger_dan_25_jaar);
	document.getElementById('van_25_tot_34_jaar').textContent = formatNumber(van_25_tot_34_jaar);
	document.getElementById('van_35_tot_44_jaar').textContent = formatNumber(van_35_tot_44_jaar);
	document.getElementById('van_45_tot_54_jaar').textContent = formatNumber(van_45_tot_54_jaar);
	document.getElementById('ouder_dan_55_jaar').textContent = formatNumber(ouder_dan_55_jaar);

	totaal_leeftijden = jonger_dan_25_jaar + van_25_tot_34_jaar + van_35_tot_44_jaar + van_45_tot_54_jaar + ouder_dan_55_jaar;

	hoogte_ouder_dan_55_jaar = ouder_dan_55_jaar * 860 / totaal_leeftijden;
	hoogte_van_45_tot_54_jaar = van_45_tot_54_jaar * 860 / totaal_leeftijden;
	hoogte_van_35_tot_44_jaar = van_35_tot_44_jaar * 860 / totaal_leeftijden;
	hoogte_van_25_tot_34_jaar = van_25_tot_34_jaar * 860 / totaal_leeftijden;
	hoogte_jonger_dan_25_jaar = jonger_dan_25_jaar * 860 / totaal_leeftijden;

	document.getElementById('line_ouder_dan_55_jaar').setAttribute('height', hoogte_ouder_dan_55_jaar);

	document.getElementById('line_van_45_tot_54_jaar').setAttribute('height', hoogte_van_45_tot_54_jaar);
	document.getElementById('line_van_45_tot_54_jaar').setAttribute('y', hoogte_ouder_dan_55_jaar + 839);

	document.getElementById('line_van_35_tot_44_jaar').setAttribute('height', hoogte_van_35_tot_44_jaar);
	document.getElementById('line_van_35_tot_44_jaar').setAttribute('y', hoogte_ouder_dan_55_jaar + hoogte_van_45_tot_54_jaar + 849);

	document.getElementById('line_van_25_tot_34_jaar').setAttribute('height', hoogte_van_25_tot_34_jaar);
	document.getElementById('line_van_25_tot_34_jaar').setAttribute('y', hoogte_ouder_dan_55_jaar + hoogte_van_45_tot_54_jaar + hoogte_van_35_tot_44_jaar + 859);

	document.getElementById('line_jonger_dan_25_jaar').setAttribute('height', hoogte_jonger_dan_25_jaar);
	document.getElementById('line_jonger_dan_25_jaar').setAttribute('y', hoogte_ouder_dan_55_jaar + hoogte_van_45_tot_54_jaar + hoogte_van_35_tot_44_jaar + hoogte_van_25_tot_34_jaar + 869);

	var erkend_actief = gegevens[regio].leerbedrijven.erkend_actief;
	var erkend_inactief = gegevens[regio].leerbedrijven.erkend_inactief;
	var geen_leerbedrijf = gegevens[regio].leerbedrijven.geen_leerbedrijf;

	totaal_leerbedrijven = erkend_actief + erkend_inactief + geen_leerbedrijf;

	var percentage_erkend_actief = Math.round(erkend_actief * 100 / totaal_leerbedrijven);
	var percentage_erkend_inactief = Math.round(erkend_inactief * 100 / totaal_leerbedrijven);
	var percentage_geen_leerbedrijf = Math.round(geen_leerbedrijf * 100 / totaal_leerbedrijven);

	hoogte_erkend_actief = erkend_actief * 328 / totaal_leerbedrijven;
	hoogte_erkend_inactief = erkend_inactief * 328 / totaal_leerbedrijven;
	hoogte_geen_leerbedrijf = geen_leerbedrijf * 328 / totaal_leerbedrijven;

	document.getElementById('erkend_actief').textContent = '(' + formatNumber(erkend_actief) + ')';
	document.getElementById('erkend_inactief').textContent = '(' + formatNumber(erkend_inactief) + ')';
	document.getElementById('geen_leerbedrijf').textContent = '(' + formatNumber(geen_leerbedrijf) + ')';

	document.getElementById('percentage_erkend_actief').textContent = percentage_erkend_actief + '%';
	document.getElementById('percentage_erkend_inactief').textContent = percentage_erkend_inactief + '%';
	document.getElementById('percentage_geen_leerbedrijf').textContent = percentage_geen_leerbedrijf + '%';

	document.getElementById('line_erkend_actief').setAttribute('height', hoogte_erkend_actief);
	document.getElementById('line_erkend_actief').setAttribute('y', hoogte_erkend_inactief + hoogte_geen_leerbedrijf + 1368);

	document.getElementById('line_erkend_inactief').setAttribute('height', hoogte_erkend_inactief);
	document.getElementById('line_erkend_inactief').setAttribute('y', hoogte_geen_leerbedrijf + 1368);

	var leerbedrijven = gegevens[regio].leerlingen_leerbedrijven.leerbedrijven;
	var leerlingen_leerbedrijven = gegevens[regio].leerlingen_leerbedrijven.leerlingen;

	var opleidingscentra = gegevens[regio].leerlingen_opleidingscentra.opleidingscentra;
	var leerlingen_opleidingscentra = gegevens[regio].leerlingen_opleidingscentra.leerlingen;

	totaal_leerlingen = leerlingen_opleidingscentra + leerlingen_leerbedrijven;

	var percentage_leerlingen_opleidingscentra = Math.round(leerlingen_opleidingscentra * 100 / totaal_leerlingen);
	var percentage_leerlingen_leerbedrijven = Math.round(leerlingen_leerbedrijven * 100 / totaal_leerlingen);

	document.getElementById('leerbedrijven').textContent = formatNumber(leerbedrijven);
	document.getElementById('leerlingen_leerbedrijven').textContent = formatNumber(leerlingen_leerbedrijven);

	document.getElementById('opleidingscentra').textContent = formatNumber(opleidingscentra);
	document.getElementById('leerlingen_opleidingscentra').textContent = formatNumber(leerlingen_opleidingscentra);

	document.getElementById('percentage_leerlingen_leerbedrijven').textContent = '(' + formatNumber(percentage_leerlingen_leerbedrijven) + '%)';
	document.getElementById('percentage_leerlingen_opleidingscentra').textContent = '(' + formatNumber(percentage_leerlingen_opleidingscentra) + '%)';

	var techniek_ti = gegevens[regio].opleidingen.techniek_ti;
	var techniek_overig = gegevens[regio].opleidingen.techniek_overig;
	var overig = gegevens[regio].opleidingen.overig;
	var opleidingen_totaal = techniek_ti + techniek_overig + overig;

	document.getElementById('techniek_ti').textContent = formatNumber(techniek_ti);
	document.getElementById('techniek_overig').textContent = formatNumber(techniek_overig);
	document.getElementById('overig').textContent = formatNumber(overig);

	var element_leerlingen_leerbedrijven = document.getElementById('circle_leerlingen_leerbedrijven');
	stroke_leerlingen_leerbedrijven = leerlingen_leerbedrijven * 829.3805 / totaal_leerlingen;
	element_leerlingen_leerbedrijven.style.strokeDasharray =  "0 " + stroke_leerlingen_leerbedrijven + " 829.38";

	var element_leerlingen_opleidingscentra = document.getElementById('circle_leerlingen_opleidingscentra');
	var testtest = 829.38 - stroke_leerlingen_leerbedrijven;
	element_leerlingen_opleidingscentra.style.strokeDasharray = stroke_leerlingen_leerbedrijven + " " + testtest;

	var circle_techniek_ti = document.getElementById('circle_techniek_ti');
	stroke_circle_techniek_ti = techniek_ti * 753.9822 / opleidingen_totaal;
	circle_techniek_ti.style.strokeDasharray = stroke_circle_techniek_ti;

	var circle_techniek_overig = document.getElementById('circle_techniek_overig');
	stroke_circle_techniek_overig = techniek_overig * 753.9822 / opleidingen_totaal;
	circle_techniek_overig.style.strokeDasharray = stroke_circle_techniek_overig + " 753.98";

	var circle_overig = document.getElementById('circle_overig');
	stroke_circle_overig = overig * 753.9822 / opleidingen_totaal;
	circle_overig.style.strokeDasharray = stroke_circle_overig  + " 753.98";

}