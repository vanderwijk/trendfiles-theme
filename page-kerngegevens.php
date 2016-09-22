<?php
/**
 * Template Name: Kerngegevens
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col one-third">
			<div class="block entry-content">
				<?php the_content(); ?>
				<ul class="kerngegevens-knoppen">
					<li class="bedrijven"><a href="/kerngegevens/bedrijven/">Bedrijven</a></li>
					<li class="omzet-en-werkvoorraad"><a href="/kerngegevens/omzet-en-werkvoorraad/">Omzet en werkvoorraad</a></li>
					<li class="werknemers"><a href="/kerngegevens/werknemers/">Werknemers</a></li>
					<li class="leerlingen"><a href="/kerngegevens/leerlingen/">Leerlingen</a></li>
					<li class="leerwerkbanen"><a href="/kerngegevens/leerwerkbanen/">Leerwerkbanen</a></li>
				</ul>
			</div>
		</div>
		<div class="col one-third">
			<div class="block entry-content">
				<h2>Leeftijdsverdeling in- en uitstroom 2000-2014</h2>
				<p><iframe src="//player.vimeo.com/video/166344487?title=0&amp;byline=0&amp;portrait=0" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>
				<ul class="kerngegevens-downloads">
					<li><a href="/wp-content/uploads/pdf/factsheet-landelijk-2016.pdf" rel="external">Bekijk factsheet landelijk 2016</a></li>
					<li><a href="/wp-content/uploads/pdf/sheets-landelijk.zip" rel="external">Presentatiesheets landelijk 2016</a></li>
					<li><a href="/downloads-en-links/">Download het Trendrapport 2016</a></li>
					<li><a href="/wp-content/uploads/pdf/methodische-toelichting.pdf" rel="external">Methodologische toelichting</a></li>
				</ul>
			</div>
		</div>
		<div class="col one-third">
			<div class="block">
				<h2 style="font-weight: 600; text-transform: uppercase;">Regio Factsheets</h2>
				<p>Selecteer een regio en download de beschikbare regioinformatie</p>
				<object class="map" id="map" data="/wp-content/themes/otib/img/nederland.svg" width="186" height="235" type="image/svg+xml"></object>
				<div id="info-noord-holland" class="regio">
					<p><strong>Noord-Holland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-noord-holland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-noord-holland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<div id="info-noord-nederland" class="regio">
					<p><strong>Noord-Nederland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-noord-nederland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-noord-nederland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<div id="info-gelderland-overijssel" class="regio">
					<p><strong>Gelderland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-gelderland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-gelderland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<div id="info-midden-nederland" class="regio">
					<p><strong>Midden-Nederland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-midden-nederland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-midden-nederland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<div id="info-zuid-nederland" class="regio">
					<p><strong>Zuid-Nederland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-zuid-nederland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-zuid-nederland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<div id="info-zuid-holland" class="regio">
					<p><strong>Zuid-Holland</strong></p>
					<ul>
						<li><a href="/wp-content/uploads/pdf/regioprofiel-zuid-holland.pdf" target="_blank">Regio Factsheets (pdf)</a></li>
						<li><a href="/wp-content/uploads/pdf/regiosheets-zuid-holland.zip" target="_blank">Regio Presentatiesheets (zip)</a></li>
					</ul>
				</div>
				<h2>Thema factsheets</h2>
				<ul class="kerngegevens-downloads">
					<li><a href="/wp-content/uploads/pdf/factsheet-diversiteit-installatiebranche-2016.pdf" rel="external">Factsheet diversiteit</a></li>
					<li><a href="/wp-content/uploads/pdf/factsheets-innovatie-2016.pdf" rel="external">Factsheets Innovatie</a></li>
				</ul>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>