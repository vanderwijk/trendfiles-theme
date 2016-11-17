<?php
/**
 * Template Name: Leerwerkbanen
 */

get_header(); ?>

<script src="//www.google.com/jsapi"></script>
<script type="text/javascript">
	google.load( "visualization", "1", { packages:["corechart"] } );
	google.setOnLoadCallback(drawChart);

	function drawChart() {

		// 1a: Leerwerkbanen
		var leerlingMonteurNederland = google.visualization.arrayToDataTable([
			['Opleiding', 'vmbo', 'niveau 2', 'niveau 3', 'niveau 4', 'hbo' ],
			['Wervingsbehoefte', 688, 118, 19, 21, 0 ],
			['Wervingskracht', 410, 185, 30, 11, 0 ],
		]);

		var zelfstandigMonteurNederland = google.visualization.arrayToDataTable([
			['Opleiding', 'vmbo', 'niveau 2', 'niveau 3', 'niveau 4', 'hbo' ],
			['Wervingsbehoefte', 211, 63, 32, 192, 86 ],
			['Wervingskracht', 5, 37, 21, 90, 13 ],
		]);

		var technischeStafNederland = google.visualization.arrayToDataTable([
			['Opleiding', 'vmbo', 'niveau 2', 'niveau 3', 'niveau 4', 'hbo' ],
			['Wervingsbehoefte', 0, 0, 0, 59, 72 ],
			['Wervingskracht', 0, 0, 1, 33, 21 ],
		]);

		var overigeFunctiesNederland = google.visualization.arrayToDataTable([
			['Opleiding', 'vmbo', 'niveau 2', 'niveau 3', 'niveau 4', 'hbo' ],
			['Wervingsbehoefte', 14, 1, 2, 10, 38 ],
			['Wervingskracht', 1, 1, 0, 7, 17 ],
		]);

		var view = new google.visualization.DataView( leerlingMonteurNederland );
		view.setColumns( [0,1] );

		var optionsLeerlingMonteur = {
			title: 'Leerling Monteur',
			legend: { position: 'bottom' },
			colors: [ '#888d91', '#4e4d26', '#a39d5b','#f5821f','#8f4a02' ],
			isStacked: true,
			height: 600,
			animation: {
				duration: 1000,
				easing: 'out',
			},
			vAxis: {
				minValue: 0,
				maxValue: 900
			},
		};

		var optionsZelfstandigMonteur = {
			title: 'Zelfstandig Monteur',
			legend: { position: 'bottom' },
			colors: [ '#888d91', '#4e4d26', '#a39d5b','#f5821f','#8f4a02' ],
			isStacked: true,
			height: 600,
			animation: {
				duration: 1000,
				easing: 'out',
			},
			vAxis: {
				minValue: 0,
				maxValue: 900
			},
		};

		var optionsTechnischeStaf = {
			title: 'Technische Staf',
			legend: { position: 'bottom' },
			colors: [ '#888d91', '#4e4d26', '#a39d5b','#f5821f','#8f4a02' ],
			isStacked: true,
			height: 600,
			animation: {
				duration: 1000,
				easing: 'out',
			},
			vAxis: {
				minValue: 0,
				maxValue: 900
			},
		};

		var optionsOverigeFuncties = {
			title: 'Overige Functies',
			legend: { position: 'bottom' },
			colors: [ '#888d91', '#4e4d26', '#a39d5b','#f5821f','#8f4a02' ],
			isStacked: true,
			height: 600,
			animation: {
				duration: 1000,
				easing: 'out',
			},
			vAxis: {
				minValue: 0,
				maxValue: 900
			},
		};

		var chart1a = new google.visualization.ColumnChart( document.getElementById( 'chart1a' ) );
		chart1a.draw( leerlingMonteurNederland, optionsLeerlingMonteur );

		document.getElementById( 'leerlingMonteur' ).onclick = function() {
			chart1a.draw( leerlingMonteurNederland, optionsLeerlingMonteur );
		}
		document.getElementById( 'zelfstandigMonteur' ).onclick = function() {
			chart1a.draw( zelfstandigMonteurNederland, optionsZelfstandigMonteur );
		}
		document.getElementById( 'technischeStaf' ).onclick = function() {
			chart1a.draw( technischeStafNederland, optionsTechnischeStaf );
		}
		document.getElementById( 'overigeFuncties' ).onclick = function() {
			chart1a.draw( overigeFunctiesNederland, optionsOverigeFuncties );
		}

}
</script>


<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>

	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		</div>
			<div class="col two-thirds">
				<div class="block">
					<div id="chart1a"></div>
				</div>
			</div>
			<div class="col one-third">
				<div class="block">
					<button id="leerlingMonteur">Leerling Monteur</button>
					<button id="zelfstandigMonteur">Zelfstandig Monteur</button>
					<button id="technischeStaf">Technische Staf</button>
					<button id="overigeFuncties">Overige functies</button>
				</div>
			</div>
			<div class="col">
				<div class="block entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

</article>
<?php endwhile; ?>

<?php get_footer(); ?>
