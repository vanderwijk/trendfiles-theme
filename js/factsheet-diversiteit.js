// Toon een punt bij duizendtallen
function formatNumber (num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}

jQuery(document).ready(function($) {

	var regio = 'nederland';
	jQuery.ajax({
		url: '/wp-content/themes/trendfiles-theme/js/factsheet-diversiteit.json',
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
		$('article').attr('id', regio);
		$('#download-pdf').attr('href', '/wp-content/themes/trendfiles-theme/pdf/factsheet_diversiteit_' + regio + '.pdf');
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


	var werknemers_2019_directie_vrouwen = gegevens.nederland.vrouw_vs_man.directie.vrouwen;
	var werknemers_2019_directie_mannen = gegevens.nederland.vrouw_vs_man.directie.mannen;
	var breedte_werknemers_2019_directie_vrouwen = werknemers_2019_directie_vrouwen * 1221 / 100;

	document.getElementById('directie_1').setAttribute('width', breedte_werknemers_2019_directie_vrouwen);
	document.getElementById('percentage_directie_1').textContent = werknemers_2019_directie_vrouwen + '%';
	document.getElementById('percentage_directie_1').setAttribute('x', breedte_werknemers_2019_directie_vrouwen + 536);
	document.getElementById('percentage_directie_3').textContent = werknemers_2019_directie_mannen + '%';

	var werknemers_2019_ontwikkelen_vrouwen = gegevens.nederland.vrouw_vs_man.ontwikkelen.vrouwen;
	var werknemers_2019_ontwikkelen_mannen = gegevens.nederland.vrouw_vs_man.ontwikkelen.mannen;
	var breedte_werknemers_2019_ontwikkelen_vrouwen = werknemers_2019_ontwikkelen_vrouwen * 1221 / 100;

	document.getElementById('ontwikkelen_1').setAttribute('width', breedte_werknemers_2019_ontwikkelen_vrouwen);
	document.getElementById('percentage_ontwikkelen_1').textContent = werknemers_2019_ontwikkelen_vrouwen + '%';
	document.getElementById('percentage_ontwikkelen_1').setAttribute('x', breedte_werknemers_2019_ontwikkelen_vrouwen + 536);
	document.getElementById('percentage_ontwikkelen_3').textContent = werknemers_2019_ontwikkelen_mannen + '%';

}