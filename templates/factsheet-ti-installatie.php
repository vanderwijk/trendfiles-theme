<?php
get_header();

?>

<script src="<?php echo $protocol . $host . '/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.js'; ?>"></script>

<article <?php post_class('article'); ?> id="nederland">
	<div class="row header">
		<div class="col">
			<header class="block">
				<h1 class="category">Technische Installatiebranche</h1>
				<ul class="knoppen" id="regioselectie">
					<li id="nederland">Nederland</li>
					<li class="disabled" id="noord_nederland">Noord Nederland</li>
					<li class="disabled" id="noord_holland">Noord-Holland</li>
					<li class="disabled" id="midden_nederland">Midden Nederland</li>
					<li class="disabled" id="gelderland_overijssel">Gelderland/Overijssel</li>
					<li class="disabled" id="zuid_nederland">Zuid Nederland</li>
					<li class="disabled" id="zuid_holland">Zuid-Holland</li>
				</ul>
				<ul class="knoppen pdf">
					<li><a id="download-pdf" href="/wp-content/themes/trendfiles-theme/pdf/factsheet_technischeinstallatiebranche_nederland.pdf">PDF / Printversie</a></li>
				</ul>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block entry-content">
				<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-ti-installatie.svg'); ?>
			</div>
		</div>
	</div>
</article>

<script>
jQuery(document).ready(function($) {

	// only use svgPanZoom on mobile
	if (jQuery('header').width() <= 375 ) {
		var panZoomTiger = svgPanZoom('#factsheet-ti-installatie', {
			panEnabled: true
			, controlIconsEnabled: true
			, zoomEnabled: true
			, dblClickZoomEnabled: true
			, mouseWheelZoomEnabled: false
			, preventMouseEventsDefault: true
			, zoomScaleSensitivity: 0.2
			, minZoom: 1
			, maxZoom: 10
			, fit: true
			, contain: false
			, center: true
			, refreshRate: 'auto'
			, beforeZoom: function(){}
			, onZoom: function(){}
			, beforePan: function(){}
			, onPan: function(){}
			, onUpdatedCTM: function(){}
			, eventsListenerElement: null
		});
	}

});
</script>

<?php get_footer(); ?>