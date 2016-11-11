<?php
/**
 * Template Name: Werkvoorraad
 */

get_header(); ?>

<script src="//www.google.com/jsapi"></script>
<!--<script src="//jquery-csv.googlecode.com/files/jquery.csv-0.71.js"></script>-->
<script type="text/javascript">
	google.load("visualization", "1", { packages:["corechart"] });
	google.setOnLoadCallback(drawChart);
	function drawChart() {


		// 0a: Omzetverwachting
		var data0a = google.visualization.arrayToDataTable([
			['Periode', 'Vorig kwartaal', 'Huidig kwartaal' ],
			['< 5%', 5, 4 ],
			['≤ 2,5%', 5, 10 ],
			['< 2,5%', 42, 32 ],
			['≥ 2,5%', 22, 22 ],
			['> 5%', 23, 31 ],
		]);

		var view = new google.visualization.DataView(data0a);
		view.setColumns([0,1]);

		var options0a = {
			titleTextStyle: {
					color: '',
					fontName: '',
					fontSize: '',
					bold: true,
					italic: ''
			},
			title: 'Omzetverwachting',
			legend: { position: 'bottom', maxLines: 3 },
			vAxis: {
				title: 'Respondenten [%]',
				textStyle: {
					color: '#000',
					fontName: 'Roboto'
				}
			},
			hAxis: { },
			colors: ['#896478', '#462e3c']
		};

		var chart0a = new google.visualization.ColumnChart(document.getElementById('chart0a'));
		chart0a.draw(data0a, options0a);

		// 0b: Aantal monteurs in loondienst
		var data0b = google.visualization.arrayToDataTable([
			['Periode', 'Vorig kwartaal', 'Huidig kwartaal' ],
			['dalen', 5, 6 ],
			['gelijk', 59, 51 ],
			['stijgen', 38, 45 ],
		]);

		var view = new google.visualization.DataView(data0b);
		view.setColumns([0,1]);

		var options0b = {
			titleTextStyle: {
					color: '',
					fontName: '',
					fontSize: '',
					bold: true,
					italic: ''
			},
			title: 'Aantal monteurs in loondienst',
			legend: { position: 'bottom', maxLines: 3 },
			vAxis: {
				title: 'Respondenten [%]',
				textStyle: {
					color: '#000',
					fontName: 'Roboto'
				}
			},
			hAxis: { },
			colors: ['#896478', '#462e3c']
		};

		var chart0b = new google.visualization.ColumnChart(document.getElementById('chart0b'));
		chart0b.draw(data0b, options0b);


		// 0c: Aantal inleners
		var data0c = google.visualization.arrayToDataTable([
			['Periode', 'Vorig kwartaal', 'Huidig kwartaal' ],
			['dalen', 10, 12 ],
			['gelijk', 50, 38 ],
			['stijgen', 40, 49 ],
		]);

		var view = new google.visualization.DataView(data0c);
		view.setColumns([0,1]);

		var options0c = {
			titleTextStyle: {
					color: '',
					fontName: '',
					fontSize: '',
					bold: true,
					italic: ''
			},
			title: 'Aantal inleners',
			legend: { position: 'bottom', maxLines: 3 },
			vAxis: {
				title: 'Respondenten [%]',
				textStyle: {
					color: '#000',
					fontName: 'Roboto'
				}
			},
			hAxis: { },
			colors: ['#896478', '#462e3c']
		};

		var chart0c = new google.visualization.ColumnChart(document.getElementById('chart0c'));
		chart0c.draw(data0c, options0c);



		// 1a: Leden
		var data1a = google.visualization.arrayToDataTable([
			[ 'Bedrijfsgrootte', 'Leden'],
			[ 'Groot', 1 ],
			[ 'Midden', 10 ],
			[ 'Klein', 89 ],
		]);

		var view = new google.visualization.DataView(data1a);
		view.setColumns([0,1]);

		var options1a = {
			title: 'Leden',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart1a = new google.visualization.PieChart(document.getElementById('chart1a'));
		chart1a.draw(data1a, options1a);

		// 2a: Omzet
		var data2a = google.visualization.arrayToDataTable([
			[ 'Bedrijfsgrootte', 'Omzet'],
			[ 'Groot', 52 ],
			[ 'Midden', 28 ],
			[ 'Klein', 20 ],
		]);

		var view = new google.visualization.DataView(data2a);
		view.setColumns([0,1]);

		var options2a = {
			title: 'Omzet',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart2a = new google.visualization.PieChart(document.getElementById('chart2a'));
		chart2a.draw(data2a, options2a);

		// 3a: Personeel
		var data3a = google.visualization.arrayToDataTable([
			[ 'Bedrijfsgrootte', 'Personeel'],
			[ 'Groot', 47 ],
			[ 'Midden', 29 ],
			[ 'Klein', 24 ],
		]);

		var view = new google.visualization.DataView(data3a);
		view.setColumns([0,1]);

		var options3a = {
			title: 'Personeel',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart3a = new google.visualization.PieChart(document.getElementById('chart3a'));
		chart3a.draw(data3a, options3a);















		// 1: Omzet naar bedrijfsgrootte (2014)
		var data1 = google.visualization.arrayToDataTable([
			[ 'Bedrijfsgrootte', 'Omzet'],
			[ 'grote bedrijven (> 250 werknemers)', 52 ],
			[ 'middelgrote bedrijven (25 - 250 werknemers)', 28 ],
			[ 'kleine bedrijven (< 25 werknemers)', 20 ],
		]);

		var view = new google.visualization.DataView(data1);
		view.setColumns([0,1]);

		var options1 = {
			title: 'Omzet naar bedrijfsgrootte (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart1 = new google.visualization.PieChart(document.getElementById('chart1'));
		chart1.draw(data1, options1);


		// 2: Aantal medewerkers naar bedrijfsgrootte (2014)
		var data2 = google.visualization.arrayToDataTable([
			[ 'Bedrijfsgrootte', 'Aantal medewerkers', { role: 'style' } ],
			[ 'grote bedrijven (> 250 werknemers)', 46000, '#896478'],
			[ 'middelgrote bedrijven (25 - 250 werknemers)', 28000, '#462e3c'],
			[ 'kleine bedrijven (< 25 werknemers)', 23000, '#939598'],
		]);

		var view = new google.visualization.DataView(data2);
		view.setColumns([0,1]);

		var options2 = {
			title: 'Aantal medewerkers naar bedrijfsgrootte (2014)',
			legend: { position: 'none', alignment: 'start' },
			hAxis: { title: 'Bedrijfsgrootte', titleTextStyle: { color: '#fff'} },
		};

		var chart2 = new google.visualization.ColumnChart(document.getElementById('chart2'));
		chart2.draw(data2, options2);


		// 3: Omzet per medewerker in euro (2014)
		var data3 = google.visualization.arrayToDataTable([
			['Bedrijfsgrootte', 'Omzet', { role: 'style' }],
			['grote bedrijven (> 250 werknemers)', 172500, '#896478'],
			['middelgrote bedrijven (25 - 250 werknemers)', 139300, '#462e3c'],
			['kleine bedrijven (< 25 werknemers)', 113790, '#939598'],
			['gemiddeld per werknemer', 149200, '#414142' ],
		]);

		// selecteer een subset van de data voor de aslabes
		var view = new google.visualization.DataView(data3);
		view.setColumns([0,1]);

		var options3 = {
			title: 'Bruto omzet per medewerker in euro (2014)',
			legend: { position: 'none', alignment: 'start' },
			hAxis: {title: 'Bedrijfsgrootte', titleTextStyle: {color: '#fff'} },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart3 = new google.visualization.ColumnChart(document.getElementById('chart3'));
		chart3.draw(data3, options3);


		// 4: Omzet naar discipline (2014)
		var data4 = google.visualization.arrayToDataTable([
			[ 'Disciplinje', 'Omzet'],
			[ 'Electra', 56 ],
			[ 'Klimaat', 30 ],
			[ 'Sanitair', 10 ],
			[ 'Overig', 4 ]
		]);

		var view = new google.visualization.DataView(data4);
		view.setColumns([0,1]);

		var options4 = {
			title: 'Omzet naar discipline (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' }
			}
		};

		var chart4 = new google.visualization.PieChart(document.getElementById('chart4'));
		chart4.draw(data4, options4);


		// 5: Omzet verdeeld over nieuwbouw, renovatie en onderhoud (2014)
		var data5 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Nieuwbouw', 39 ],
			[ 'Renovatie', 34 ],
			[ 'Onderhoud', 28 ],
		]);

		var view = new google.visualization.DataView(data5);
		view.setColumns([0,1]);

		var options5 = {
			title: 'Omzet verdeeld over nieuwbouw, renovatie en onderhoud (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart5 = new google.visualization.PieChart(document.getElementById('chart5'));
		chart5.draw(data5, options5);


		// 6: Omzet verdeeld over woningbouw, u-bouw, industrie en infra (2014)
		var data6 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Woningbouw', 19 ],
			[ 'Utiliteitsbouw', 47 ],
			[ 'Industrie', 20 ],
			[ 'Infra', 14 ]
		]);

		var options6 = {
			title: 'Omzet verdeeld over woningbouw, u-bouw, industrie en infra (2014)',
			legend: { position: 'bottom' },
			tooltip: { text: 'percentage' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' }
			}
		};

		var chart6 = new google.visualization.PieChart( document.getElementById( 'chart6'  ));
		chart6.draw( data6, options6 );


		//7 : Omzet Groep Groot naar discipline (2014)
		var data7 = google.visualization.arrayToDataTable([
			[ 'Discipline', 'Omzet'],
			[ 'Electra', 66 ],
			[ 'Klimaat', 30 ],
			[ 'Sanitair', 4 ],
		]);

		var view = new google.visualization.DataView(data7);
		view.setColumns([0,1]);

		var options7 = {
			title: 'Omzet Groep Groot naar discipline (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart7 = new google.visualization.PieChart(document.getElementById('chart7'));
		chart7.draw(data7, options7);


		//8 : Omzet Groep Groot verdeeld over nieuwbouw, renovatie en onderhoud (2014)
		var data8 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Nieuwbouw', 40 ],
			[ 'Renovatie', 31 ],
			[ 'Onderhoud', 29 ],
		]);

		var view = new google.visualization.DataView(data8);
		view.setColumns([0,1]);

		var options8 = {
			title: 'Omzet Groep Groot verdeeld over nieuwbouw, renovatie en onderhoud (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart8 = new google.visualization.PieChart(document.getElementById('chart8'));
		chart8.draw(data8, options8);


		//9 : Omzet Groep Groot verdeeld over woningbouw, u-bouw, industrie en infra (2014)
		var data9 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Woningbouw', 7 ],
			[ 'Utiliteitsbouw', 48 ],
			[ 'Industrie', 24 ],
			[ 'Infra', 21 ],
		]);

		var view = new google.visualization.DataView(data9);
		view.setColumns([0,1]);

		var options9 = {
			title: 'Omzet Groep Groot verdeeld over woningbouw, u-bouw, industrie en infra (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart9 = new google.visualization.PieChart(document.getElementById('chart9'));
		chart9.draw(data9, options9);


		//10 : Omzet Groep Midden naar discipline (2014)
		var data10 = google.visualization.arrayToDataTable([
			[ 'Discipline', 'Omzet'],
			[ 'Electra', 49 ],
			[ 'Klimaat', 33 ],
			[ 'Sanitair', 14 ],
			[ 'Overig', 4 ],
		]);

		var view = new google.visualization.DataView(data10);
		view.setColumns([0,1]);

		var options10 = {
			title: 'Omzet Groep Midden naar discipline (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart10 = new google.visualization.PieChart(document.getElementById('chart10'));
		chart10.draw(data10, options10);


		//11 : Omzet Groep Midden verdeeld over nieuwbouw, renovatie en onderhoud (2014)
		var data11 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Nieuwbouw', 43 ],
			[ 'Renovatie', 34 ],
			[ 'Onderhoud', 23 ],
		]);

		var view = new google.visualization.DataView(data11);
		view.setColumns([0,1]);

		var options11 = {
			title: 'Omzet Groep Midden verdeeld over nieuwbouw, renovatie en onderhoud (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart11 = new google.visualization.PieChart(document.getElementById('chart11'));
		chart11.draw(data11, options11);


		//12 : Omzet Groep Midden verdeeld over woningbouw, u-bouw, industrie en infra (2014)
		var data12 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Woningbouw', 27 ],
			[ 'Utiliteitsbouw', 45 ],
			[ 'Industrie', 20 ],
			[ 'Infra', 8 ]
		]);

		var options12 = {
			title: 'Omzet Groep Midden verdeeld over woningbouw, u-bouw, industrie en infra (2014)',
			legend: { position: 'bottom' },
			tooltip: { text: 'percentage' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' }
			}
		};

		var chart12 = new google.visualization.PieChart(document.getElementById('chart12'));
		chart12.draw(data12, options12);


		//13 : Omzet Groep Klein naar discipline (2014)
		var data13 = google.visualization.arrayToDataTable([
			[ 'Discipline', 'Omzet'],
			[ 'Electra', 40 ],
			[ 'Klimaat', 22 ],
			[ 'Sanitair', 20 ],
			[ 'Overig', 18 ],
		]);

		var view = new google.visualization.DataView(data13);
		view.setColumns([0,1]);

		var options13 = {
			title: 'Omzet Groep Klein naar discipline (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart13 = new google.visualization.PieChart(document.getElementById('chart13'));
		chart13.draw(data13, options13);


		//14 : Omzet Groep Klein verdeeld over nieuwbouw, renovatie en onderhoud (2014)
		var data14 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Nieuwbouw', 28 ],
			[ 'Renovatie', 41 ],
			[ 'Onderhoud', 31 ],
		]);

		var view = new google.visualization.DataView(data14);
		view.setColumns([0,1]);

		var options14 = {
			title: 'Omzet naar bedrijfsgrootte (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#414142' },
			}
		};

		var chart14 = new google.visualization.PieChart(document.getElementById('chart14'));
		chart14.draw(data14, options14);


		//15 : Omzet Groep Klein verdeeld over woningbouw, u-bouw, industrie en infra (2014)
		var data15 = google.visualization.arrayToDataTable([
			[ 'Type', 'Omzet'],
			[ 'Woningbouw', 46 ],
			[ 'Utiliteitsbouw', 44 ],
			[ 'Industrie', 8 ],
			[ 'Infra', 2 ],
		]);

		var view = new google.visualization.DataView(data15);
		view.setColumns([0,1]);

		var options15 = {
			title: 'Omzet Groep Klein verdeeld over woningbouw, u-bouw, industrie en infra (2014)',
			legend: { position: 'bottom', alignment: 'start' },
			slices: {
				0: { color: '#896478' },
				1: { color: '#462e3c' },
				2: { color: '#939598' },
				3: { color: '#415152' },
			}
		};

		var chart15 = new google.visualization.PieChart(document.getElementById('chart15'));
		chart15.draw(data15, options15);

	}
	</script>


<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title"><?php the_title(); ?><span style="color:#424244;font-size:13px;text-transform:none;font-family:'Droid Sans',sans-serif;font-weight:200;float:right;">Bijgewerkt op 11-11-2016</span></h1>
			</header>
		</div>
		<div class="col">
			<div class="block entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<style>
.collapsible {}
</style>


	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title">Conjunctuurgegevens</h1>
			</header>
		</div>
			<div class="col one-third">
				<div class="block">
					<div id="chart0a"></div>
				</div>
			</div>
			<div class="col one-third">
				<div class="block">
					<div id="chart0b"></div>
				</div>
			</div>
			<div class="col one-third">
				<div class="block">
					<div id="chart0c"></div>
				</div>
			</div>
		</div>


	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Algemeen</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart1a"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart2a"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart3a"></div>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Kenmerken per bedrijfsgrootte</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart1"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart2"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart3"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Omzetverdeling totaal</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart4"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart5"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart6"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Groep Groot (>250 werknemers)</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart7"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart8"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart9"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Groep Midden (25 - 250 werknemers)</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart10"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart11"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart12"></div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title collapsed">Groep Klein (< 25 werknemers)</h1>
			</header>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart13"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart14"></div>
			</div>
		</div>
		<div class="col one-third delayed">
			<div class="block">
				<div id="chart15"></div>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
