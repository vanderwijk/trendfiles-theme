jQuery(document).ready(function($) {

	// Validatie van veld leerlingen of gediplomeerden
	$('.id_leerling').click(function() {
		$('#stap-1 .check').show();
		$('#stap-1 .false').hide();
	});

	// Validatie van schoolsoort, tonen en verbergen vragengroep
	$('.schoolsoort').click(function() {
		$('#stap-3 .check').show();
		$('#stap-3 .false').hide();
		$('.group').hide();
		$('#vragen-' + $(this).val()).show('slow');
		$('.group').find(':checkbox').prop('checked',!this.checked);
		$('.group').find('.listbox').val('-1');
	});

	$( "input:radio[value=vmbo]" ).click(function() {
		if ( $( '#man input' ).is( ':checked' ) ) {
			$( '.gender li' ).removeClass( 'donker' );
			$( '.gender li input' ).attr( 'checked', false );
			$( '#man-vrouw' ).toggleClass( 'donker' );
			alert ( 'Bij de vmbo-gediplomeerden is het niet mogelijk om de gegevens uit te splitsen naar geslacht' );
		}
		if ( $( '#vrouw input' ).is( ':checked' ) ) {
			$( '.gender li' ).removeClass( 'donker' );
			$( '.gender li input' ).attr( 'checked', false );
			$( '#man-vrouw' ).toggleClass( 'donker' );
			alert ( 'Bij de vmbo-gediplomeerden is het niet mogelijk om de gegevens uit te splitsen naar geslacht' );
		}
	});

	$('#man-vrouw').click(function() {
		$('.gender li').removeClass('donker');
		$('.gender li input').attr('checked', false);
		$('#man-vrouw').toggleClass('donker');
	});

	var cboxman = $('#man input')[0];
	$('#man').click(function() {
		cboxman.checked = !cboxman.checked;
		$('#man-vrouw').removeClass('donker');
		$('#man').toggleClass('donker');
	});

	var cboxvrouw = $('#vrouw input')[0];
	$('#vrouw').click(function() {
		cboxvrouw.checked = !cboxvrouw.checked;
		$('#man-vrouw').removeClass('donker');
		$('#vrouw').toggleClass('donker');
	});
	


	$( 'input[name=rbpi_totaal]' ).on( 'click', function () {
		if ( $( '.alle-regios' ).attr( 'checked') == 'checked' ) {
			$( '.regio ul input' ).attr( 'checked', false );
		}
	});
	$( '.regio ul input' ).on( 'click', function () {
		$( 'input[value=selecteer-regio]' ).attr( 'checked', true );
	});
	
	// Selecteer alle checkboxes binnen dezelfde <ul>
	$('.checkall').on('click', function () {
		$(this).closest('ul').find(':checkbox').prop('checked', this.checked);
	});
	
	$('.ti-totaal').on('click', function () {
		$('.ti:checkbox').prop('checked', this.checked);
	});
	
	// Valideer formulier bij submit
	$('input:submit').bind('click',validate);
	function validate() {
		if (!$("input[name='id_leerling']:checked").val()) {
			$('#stap-1 .false').show();
			alert("U moet een keuze Leerlingen/Gediplomeerden aanvinken!");
			return false;
		} else {
			if (!$("input[name='schoolsoort']:checked").val()) {
				$('#stap-3 .false').show();
				alert("U heeft nog geen schoolkeuze gemaakt!");
				return false;
			}
		}
		return;
	}

});