<?php
/**
 * Template Name: Draaitabel bedrijven
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
		<div class="col">
			<div class="block entry-content">
				<?php the_content(); ?>

				<form method="post" action="<?php if(isset($_GET['test'])) {echo 'http://test.ti-bedrijfsgegevens.nl/protected/index.php'; } else { echo 'http://ti-bedrijfsgegevens.nl/protected/index.php'; } ?>">
					<input type="hidden" id="schoolsoort" name="schoolsoort" value="">
					<input type="hidden" id="schoolsoortaantal" name="schoolsoortaantal" value="0">
					<h3 id="klasse">Stap 1: Bedrijven</h3>
					<p>Selecteer het aantal werknemers</p>
					<div class="bedrijfsgrootte">
						<label><input type="radio" name="bedrijfsgrootte" value="alle-bedrijfsgroottes" checked>Totaal</label>
						<label><input type="radio" name="bedrijfsgrootte" value="selecteer-bedrijfsgrootte">Selecteer naar omvang (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input type="checkbox" value="1" name="klasse_id[]">1-5 werknemers</label></li>
							<li><label><input type="checkbox" value="2" name="klasse_id[]">6-15 werknemers</label></li>
							<li><label><input type="checkbox" value="3" name="klasse_id[]">16-50 werknemers</label></li>
							<li><label><input type="checkbox" value="4" name="klasse_id[]">51-100 werknemers</label></li>
							<li><label><input type="checkbox" value="5" name="klasse_id[]">100 en meer werknemers</label></li>
						</ul>
					</div>
					<h3 id="vakgebied">Stap 2: Vakgebied</h3>
					<p>Selecteer &eacute;&eacute;n of meerdere vakgebieden</p>
					<ul class="vakgebied">
						<li id="alle-vakgebieden" class="alle-vakgebieden donker"><label><input type="checkbox" name="">Alle vakgebieden</label></li>
						<li id="electrotechniek" class="electrotechniek"><label><input type="checkbox" value="1" name="vakgebied_id[]">Elektro techniek</label></li>
						<li id="installatietechniek" class="installatietechniek"><label><input type="checkbox" value="2" name="vakgebied_id[]">Installatie techniek</label></li>
						<li id="koeltechniek" class="koeltechniek"><label><input type="checkbox" value="3" name="vakgebied_id[]">Koeltechniek</label></li>
					</ul>
					<h3 id="rpa">Stap 3: Regio</h3>
					<div class="regio">
						<label><input type="radio" name="regio" value="alle-regios" checked>Totaal Nederland</label>
						<label><input type="radio" name="regio" value="selecteer-regio">Selecteer regio (meerdere keuzes mogelijk)</label>
						<ul>
							<li>
								<label class="noord-nederland"><input type="checkbox" value="1" class="noord-nederland" name="rpa_id[]">Noord Nederland</label>
							</li>
							<li>
								<label class="gelderland-overijssel"><input type="checkbox" value="2" class="gelderland-overijssel" name="rpa_id[]">Overijssel</label>
								<label class="gelderland-overijssel"><input type="checkbox" value="3" class="gelderland-overijssel" name="rpa_id[]">Gelderland</label>
							</li>
							<li>
								<label class="midden-nederland"><input type="checkbox" value="4" class="midden-nederland" name="rpa_id[]">Midden Nederland</label>
							</li>
							<li>
								<label class="noord-holland"><input type="checkbox" value="5" class="noord-holland" name="rpa_id[]">Noord-Holland</label>
							</li>
							<li>
								<label class="zuid-holland"><input type="checkbox" value="6" class="zuid-holland" name="rpa_id[]">Haagland/Rijn-Gouwe</label>
								<label class="zuid-holland"><input type="checkbox" value="7" class="zuid-holland" name="rpa_id[]">Rijnmond</label>
							</li>
							<li>
								<label class="zuid-nederland"><input type="checkbox" value="8" class="zuid-nederland" name="rpa_id[]">Zeeland</label>
								<label class="zuid-nederland"><input type="checkbox" value="9" class="zuid-nederland" name="rpa_id[]">West en Midden Brabant</label>
								<label class="zuid-nederland"><input type="checkbox" value="10" class="zuid-nederland" name="rpa_id[]">Oost Brabant</label>
								<label class="zuid-nederland"><input type="checkbox" value="11" class="zuid-nederland" name="rpa_id[]">Limburg</label>
							</li>
						</ul>
					</div>
					<div class="kaart">
						<object class="map" id="map" data="/wp-content/themes/otib/img/nederland.svg" width="186" height="235" type="image/svg+xml"></object>
					</div>
					<h3 id="jaar">Stap 4: Jaar</h3>
					<p>Sleep de balkjes om de tijdsperiode te selecteren</p>
					<div id="periode"></div>
					<ul class="periode">
						<li><label><input type="checkbox" id="2011" value="2011" name="jaar_id[]" checked>2011/12</label></li>
						<li><label><input type="checkbox" id="2012" value="2012" name="jaar_id[]">2012/13</label></li>
						<li><label><input type="checkbox" id="2013" value="2013" name="jaar_id[]">2013/14</label></li>
						<li><label><input type="checkbox" id="2014" value="2014" name="jaar_id[]">2014/15</label></li>
						<li><label><input type="checkbox" id="2015" value="2015" name="jaar_id[]">2015/16</label></li>
						<li><label><input type="checkbox" id="2016" value="2016" name="jaar_id[]">2016/17</label></li>
						<li><label><input type="checkbox" id="2017" value="2017" name="jaar_id[]">2017/18</label></li>
						<li><label><input type="checkbox" id="2018" value="2018" name="jaar_id[]">2018/19</label></li>
					</ul>
					<input type="submit" name="submit" value="Toon resultaat in grafiek">
					<input type="submit" name="export" value="Toon resultaat in Excel" id="exp">
				</form>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
