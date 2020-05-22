// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($) {

	var regio = 'nederland';
	jQuery.ajax({
		url: '/wp-content/themes/trendfiles-theme/js/factsheet-leerwerkbanen-rendement.json',
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
		$('article').attr('id', regio);
		$('#download-pdf').attr('href', '/wp-content/themes/trendfiles-theme/pdf/factsheet_leerwerkbanen_rendement_' + regio + '.pdf');
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

	var leerlingen_niveau_1_2 = gegevens[regio].mbo_bbl_leerlingen.leerlingen_niveau_1_2;
	var leerlingen_niveau_3_4 = gegevens[regio].mbo_bbl_leerlingen.leerlingen_niveau_3_4;

	var totaal_aantal_leerlingen_mbo = leerlingen_niveau_1_2 + leerlingen_niveau_3_4;

	document.getElementById('totaal_aantal_leerlingen_mbo').textContent = formatNumber(totaal_aantal_leerlingen_mbo);

	document.getElementById('startende_bbl_leerlingen_1_2').textContent = formatNumber(leerlingen_niveau_1_2);
	document.getElementById('startende_bbl_leerlingen_3_4').textContent = formatNumber(leerlingen_niveau_3_4);

	var percentage_mannen = gegevens[regio].geslacht.percentage_mannen;
	var percentage_vrouwen = gegevens[regio].geslacht.percentage_vrouwen;

	document.getElementById('percentage_mannen').textContent = percentage_mannen + '%';
	document.getElementById('percentage_vrouwen').textContent = percentage_vrouwen + '%';

	var jonger_dan_25_jaar = gegevens[regio].leeftijd.jonger_dan_25_jaar;
	var van_26_tot_34_jaar = gegevens[regio].leeftijd.van_26_tot_34_jaar;
	var ouder_dan_35_jaar = gegevens[regio].leeftijd.ouder_dan_35_jaar;

	document.getElementById('jonger_dan_25_jaar').textContent = formatNumber(jonger_dan_25_jaar);
	document.getElementById('van_26_tot_34_jaar').textContent = formatNumber(van_26_tot_34_jaar);
	document.getElementById('ouder_dan_35_jaar').textContent = formatNumber(ouder_dan_35_jaar);

	var totaal_leeftijden = jonger_dan_25_jaar + van_26_tot_34_jaar + ouder_dan_35_jaar;

	hoogte_jonger_dan_25_jaar = jonger_dan_25_jaar * 218 / totaal_leeftijden;
	hoogte_van_26_tot_34_jaar = van_26_tot_34_jaar * 218 / totaal_leeftijden;
	hoogte_ouder_dan_35_jaar = ouder_dan_35_jaar * 218 / totaal_leeftijden;

	document.getElementById('line_jonger_dan_25_jaar').setAttribute('height', hoogte_jonger_dan_25_jaar);
	document.getElementById('line_jonger_dan_25_jaar').setAttribute('y', 725 + ( 218 - hoogte_jonger_dan_25_jaar));

	document.getElementById('line_van_26_tot_34_jaar').setAttribute('height', hoogte_van_26_tot_34_jaar);
	document.getElementById('line_van_26_tot_34_jaar').setAttribute('y', 725 + ( 218 - hoogte_van_26_tot_34_jaar));

	document.getElementById('line_ouder_dan_35_jaar').setAttribute('height', hoogte_ouder_dan_35_jaar);
	document.getElementById('line_ouder_dan_35_jaar').setAttribute('y', 725 + ( 218 - hoogte_ouder_dan_35_jaar));

	var percentage_actief_leerbedrijf_installatie = gegevens[regio].actieve_leerbedrijven.percentage_actief_leerbedrijf_installatie;
	var percentage_actief_leerbedrijf_overige = gegevens[regio].actieve_leerbedrijven.percentage_actief_leerbedrijf_overige;

	document.getElementById('percentage_actief_leerbedrijf_installatie').textContent = percentage_actief_leerbedrijf_installatie + '% actief leerbedrijf';
	document.getElementById('percentage_actief_leerbedrijf_overige').textContent = percentage_actief_leerbedrijf_overige + '% actief leerbedrijf';

	hoogte_actief_leerbedrijf_installatie = ( percentage_actief_leerbedrijf_installatie * 149 ) / 100;
	hoogte_actief_leerbedrijf_overige = percentage_actief_leerbedrijf_overige * 149 / 100;

	document.getElementById('line_actief_leerbedrijf_installatie').setAttribute('height', hoogte_actief_leerbedrijf_installatie);
	document.getElementById('line_actief_leerbedrijf_installatie').setAttribute('y', 1524 - hoogte_actief_leerbedrijf_installatie);

	document.getElementById('line_actief_leerbedrijf_overige').setAttribute('height', hoogte_actief_leerbedrijf_overige);
	document.getElementById('line_actief_leerbedrijf_overige').setAttribute('y', 1526 - hoogte_actief_leerbedrijf_overige);

	var leerlingen_leerwerkbanen_installatiebedrijf = gegevens[regio].uitsplitsing_leerwerkbanen.leerlingen_leerwerkbanen_installatiebedrijf;
	var leerlingen_leerwerkbanen_overige_technische_bedrijven = gegevens[regio].uitsplitsing_leerwerkbanen.leerlingen_leerwerkbanen_overige_technische_bedrijven;
	var leerlingen_leerwerkbanen_totaal = leerlingen_leerwerkbanen_installatiebedrijf + leerlingen_leerwerkbanen_overige_technische_bedrijven;

	document.getElementById('leerlingen_leerwerkbanen_installatiebedrijf').textContent = formatNumber(leerlingen_leerwerkbanen_installatiebedrijf);
	document.getElementById('leerlingen_leerwerkbanen_overige_technische_bedrijven').textContent = formatNumber(leerlingen_leerwerkbanen_overige_technische_bedrijven);

	var percentage_leerlingen_leerwerkbanen_installatiebedrijf = Math.round(leerlingen_leerwerkbanen_installatiebedrijf * 100 / leerlingen_leerwerkbanen_totaal);
	document.getElementById('percentage_leerlingen_leerwerkbanen_installatiebedrijf').textContent = percentage_leerlingen_leerwerkbanen_installatiebedrijf + '%';

	var circle_leerlingen_leerwerkbanen_installatiebedrijf = document.getElementById('circle_leerlingen_leerwerkbanen_installatiebedrijf');
	stroke_leerlingen_leerwerkbanen_installatiebedrijf = leerlingen_leerwerkbanen_installatiebedrijf * 942.48 / leerlingen_leerwerkbanen_totaal;
	circle_leerlingen_leerwerkbanen_installatiebedrijf.style.strokeDasharray =  stroke_leerlingen_leerwerkbanen_installatiebedrijf;

	var circle_leerlingen_leerwerkbanen_overige_technische_bedrijven = document.getElementById('circle_leerlingen_leerwerkbanen_overige_technische_bedrijven');
	stroke_leerlingen_leerwerkbanen_overige_technische_bedrijven = leerlingen_leerwerkbanen_overige_technische_bedrijven * 942.48 / leerlingen_leerwerkbanen_totaal;
	circle_leerlingen_leerwerkbanen_overige_technische_bedrijven.style.strokeDasharray = stroke_leerlingen_leerwerkbanen_overige_technische_bedrijven + " 942.48";

	var percentage_leerlingen_overige_technische_bedrijven = Math.round(leerlingen_leerwerkbanen_overige_technische_bedrijven * 100 / leerlingen_leerwerkbanen_totaal);
	document.getElementById('percentage_leerlingen_leerwerkbanen_overige_technische_bedrijven').textContent = percentage_leerlingen_overige_technische_bedrijven + '%';

	var diplomarendement_leerwerkbanen_installatiebedrijf = gegevens[regio].diplomarendement.diplomarendement_leerwerkbanen_installatiebedrijf;
	var diplomarendement_leerwerkbanen_overig = gegevens[regio].diplomarendement.diplomarendement_leerwerkbanen_overig;
	document.getElementById('diplomarendement_leerwerkbanen_installatiebedrijf').textContent = formatNumber(diplomarendement_leerwerkbanen_installatiebedrijf);
	document.getElementById('diplomarendement_leerwerkbanen_overig').textContent = formatNumber(diplomarendement_leerwerkbanen_overig);

	var percentage_diplomarendement_leerwerkbanen_installatiebedrijf = Math.round(diplomarendement_leerwerkbanen_installatiebedrijf * 100 / leerlingen_leerwerkbanen_installatiebedrijf);
	document.getElementById('percentage_diplomarendement_leerwerkbanen_installatiebedrijf').textContent = percentage_diplomarendement_leerwerkbanen_installatiebedrijf + '%';

	var percentage_diplomarendement_leerwerkbanen_overig = Math.round(diplomarendement_leerwerkbanen_overig * 100 / leerlingen_leerwerkbanen_overige_technische_bedrijven);
	document.getElementById('percentage_diplomarendement_leerwerkbanen_overig').textContent = percentage_diplomarendement_leerwerkbanen_overig + '%';

	var rendement_installatiebedrijf_branche = gegevens[regio].brancherendement.rendement_installatiebedrijf_branche;
	var rendement_overig_branche = gegevens[regio].brancherendement.rendement_overig_branche;

	document.getElementById('rendement_installatiebedrijf_branche').textContent = formatNumber(rendement_installatiebedrijf_branche);
	document.getElementById('rendement_overig_branche').textContent = formatNumber(rendement_overig_branche);

	percentage_rendement_installatiebedrijf_branche = Math.round(rendement_installatiebedrijf_branche * 100 / diplomarendement_leerwerkbanen_installatiebedrijf);
	document.getElementById('percentage_rendement_installatiebedrijf_branche').textContent = percentage_rendement_installatiebedrijf_branche + '%';
	hoogte_rendement_installatiebedrijf_branche = percentage_rendement_installatiebedrijf_branche * 118 / 100;
	document.getElementById('rect_rendement_installatiebedrijf_branche').setAttribute('height', hoogte_rendement_installatiebedrijf_branche);
	document.getElementById('rect_rendement_installatiebedrijf_branche').setAttribute('y', 2505 - hoogte_rendement_installatiebedrijf_branche);
	document.getElementById('percentage_rendement_installatiebedrijf_branche').setAttribute('y', 2498 - hoogte_rendement_installatiebedrijf_branche);

	percentage_rendement_overig_branche = Math.round(rendement_overig_branche * 100 / diplomarendement_leerwerkbanen_overig);
	document.getElementById('percentage_rendement_overig_branche').textContent = percentage_rendement_overig_branche + '%';
	hoogte_rendement_overig_branche = percentage_rendement_overig_branche * 118 / 100;
	document.getElementById('rect_rendement_overig_branche').setAttribute('height', hoogte_rendement_overig_branche);
	document.getElementById('rect_rendement_overig_branche').setAttribute('y', 2505 - hoogte_rendement_overig_branche);
	document.getElementById('percentage_rendement_overig_branche').setAttribute('y', 2498 - hoogte_rendement_overig_branche);

	var rendement_installatiebedrijf_sector = gegevens[regio].sectorrendement.rendement_installatiebedrijf_sector;
	var rendement_overig_sector = gegevens[regio].sectorrendement.rendement_overig_sector;

	document.getElementById('rendement_installatiebedrijf_sector').textContent = formatNumber(rendement_installatiebedrijf_sector);
	document.getElementById('rendement_overig_sector').textContent = formatNumber(rendement_overig_sector);

	percentage_rendement_installatiebedrijf_sector = Math.round(rendement_installatiebedrijf_sector * 100 / diplomarendement_leerwerkbanen_installatiebedrijf);
	document.getElementById('percentage_rendement_installatiebedrijf_sector').textContent = percentage_rendement_installatiebedrijf_sector + '%';
	hoogte_rendement_installatiebedrijf_sector = percentage_rendement_installatiebedrijf_sector * 118 / 100;
	document.getElementById('rect_rendement_installatiebedrijf_sector').setAttribute('height', hoogte_rendement_installatiebedrijf_sector);
	document.getElementById('rect_rendement_installatiebedrijf_sector').setAttribute('y', 2505 - hoogte_rendement_installatiebedrijf_sector);
	document.getElementById('percentage_rendement_installatiebedrijf_sector').setAttribute('y', 2498 - hoogte_rendement_installatiebedrijf_sector);

	percentage_rendement_overig_sector = Math.round(rendement_overig_sector * 100 / diplomarendement_leerwerkbanen_overig);
	document.getElementById('percentage_rendement_overig_sector').textContent = percentage_rendement_overig_sector + '%';
	hoogte_rendement_overig_sector = percentage_rendement_overig_sector * 118 / 100;
	document.getElementById('rect_rendement_overig_sector').setAttribute('height', hoogte_rendement_overig_sector);
	document.getElementById('rect_rendement_overig_sector').setAttribute('y', 2505 - hoogte_rendement_overig_sector);
	document.getElementById('percentage_rendement_overig_sector').setAttribute('y', 2498 - hoogte_rendement_overig_sector);

	var rendement_installatiebedrijf_uitstroom = gegevens[regio].uitstroom.rendement_installatiebedrijf_uitstroom;
	var rendement_overig_uitstroom= gegevens[regio].uitstroom.rendement_overig_uitstroom;

	document.getElementById('rendement_installatiebedrijf_uitstroom').textContent = formatNumber(rendement_installatiebedrijf_uitstroom);
	document.getElementById('rendement_overig_uitstroom').textContent = formatNumber(rendement_overig_uitstroom);

	percentage_rendement_installatiebedrijf_uitstroom = Math.round(rendement_installatiebedrijf_uitstroom * 100 / diplomarendement_leerwerkbanen_installatiebedrijf);
	document.getElementById('percentage_rendement_installatiebedrijf_uitstroom').textContent = percentage_rendement_installatiebedrijf_uitstroom + '%';
	hoogte_rendement_installatiebedrijf_uitstroom = percentage_rendement_installatiebedrijf_uitstroom * 118 / 100;
	document.getElementById('rect_rendement_installatiebedrijf_uitstroom').setAttribute('height', hoogte_rendement_installatiebedrijf_uitstroom);
	document.getElementById('rect_rendement_installatiebedrijf_uitstroom').setAttribute('y', 2505 - hoogte_rendement_installatiebedrijf_uitstroom);
	document.getElementById('percentage_rendement_installatiebedrijf_uitstroom').setAttribute('y', 2498 - hoogte_rendement_installatiebedrijf_uitstroom);

	percentage_rendement_overig_uitstroom = Math.round(rendement_overig_uitstroom * 100 / diplomarendement_leerwerkbanen_overig);
	document.getElementById('percentage_rendement_overig_uitstroom').textContent = percentage_rendement_overig_uitstroom + '%';
	hoogte_rendement_overig_uitstroom = percentage_rendement_overig_uitstroom * 118 / 100;
	document.getElementById('rect_rendement_overig_uitstroom').setAttribute('height', hoogte_rendement_overig_uitstroom);
	document.getElementById('rect_rendement_overig_uitstroom').setAttribute('y', 2505 - hoogte_rendement_overig_uitstroom);
	document.getElementById('percentage_rendement_overig_uitstroom').setAttribute('y', 2498 - hoogte_rendement_overig_uitstroom);


}