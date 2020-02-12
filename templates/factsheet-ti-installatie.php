<?php
get_header(); ?>

<script src="https://trendfiles.otib.nl/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.js" type="text/javascript"></script>

<article <?php post_class('article'); ?>>
	<div class="row header">
		<div class="col">
			<header class="block">
				<h1 class="category">Technische Installatiebranche</h1>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block entry-content">
				<?php echo file_get_contents('https://trendfiles.otib.nl/wp-content/themes/trendfiles-theme/img/factsheet-ti-installatie.svg'); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>

<script>
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
</script>