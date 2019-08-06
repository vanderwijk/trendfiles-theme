<?php
/**
 * Template Name: Draaitabel beroepspraktijkvorming
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

				<form method="post" action="<?php if(isset($_GET['test'])) {echo 'http://test.ti-bedrijfsgegevens.nl/protected/bpv.php'; } else { echo 'http://ti-bedrijfsgegevens.nl/protected/bpv.php'; } ?>">
					<input type="hidden" id="schoolsoort" name="schoolsoort" value="">
					<input type="hidden" id="schoolsoortaantal" name="schoolsoortaantal" value="0">
					<h3 id="klasse">Stap 1: BPV overeenkomsten</h3>
					<div class="overeenkomsten">
						<label><input type="radio" name="overeenkomsten_id" value="1">Aantal lopende leerwerkbanen</label>
						<label><input type="radio" name="overeenkomsten_id" value="2">Aantal startende leerwerkbanen</label>
					</div>
					<h3 id="jaar">Stap 2: Schooljaar</h3>
					<p>Sleep de balk om de schooljaren te selecteren</p>
					<div id="periode"></div>
					<ul class="periode">
						<li><label><input type="checkbox" id="2009" value="2009" name="jaar_id[]" checked>2009/10</label></li>
						<li><label><input type="checkbox" id="2010" value="2010" name="jaar_id[]">2010/11</label></li>
						<li><label><input type="checkbox" id="2011" value="2011" name="jaar_id[]">2011/12</label></li>
						<li><label><input type="checkbox" id="2012" value="2012" name="jaar_id[]">2012/13</label></li>
						<li><label><input type="checkbox" id="2013" value="2013" name="jaar_id[]">2013/14</label></li>
						<li><label><input type="checkbox" id="2014" value="2014" name="jaar_id[]">2014/15</label></li>
						<li><label><input type="checkbox" id="2015" value="2015" name="jaar_id[]">2015/16</label></li>
						<li><label><input type="checkbox" id="2016" value="2016" name="jaar_id[]">2016/17</label></li>
						<li><label><input type="checkbox" id="2017" value="2017" name="jaar_id[]">2017/18</label></li>
						<li><label><input type="checkbox" id="2018" value="2018" name="jaar_id[]">2018/19</label></li>
					</ul>
					<h3 id="regio">Stap 3: Regio</h3>
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
					<h3 id="niveau">Stap 4: Niveau</h3>
					<div class="niveau">
						<label><input type="radio" name="niveau" value="alle-niveaus" checked>Alle niveaus</label>
						<label><input type="radio" name="niveau" value="selecteer-niveau">Selecteer het niveau (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input type="checkbox" value="1" name="id_niveau[]">Niveau 1</label></li>
							<li><label><input type="checkbox" value="2" name="id_niveau[]">Niveau 2</label></li>
							<li><label><input type="checkbox" value="3" name="id_niveau[]">Niveau 3</label></li>
							<li><label><input type="checkbox" value="4" name="id_niveau[]">Niveau 4</label></li>
						</ul>
					</div>
					<h3 id="klasse">Stap 5: Leeftijd</h3>
					<p>Selecteer een leeftijdscategorie</p>
					<div class="leeftijd">
						<label><input type="radio" name="leeftijd" value="alle-leeftijden" checked>Alle leeftijden</label>
						<label><input type="radio" name="leeftijd" value="selecteer-leeftijd">Selecteer leeftijdscategorie (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input name="leeftijd_id[]" value="1" type="checkbox">18 jaar en jonger</label></li>
							<li><label><input name="leeftijd_id[]" value="2" type="checkbox">19 tot 24 jaar</label></li>
							<li><label><input name="leeftijd_id[]" value="3" type="checkbox">25 tot 44 jaar</label></li>
							<li><label><input name="leeftijd_id[]" value="4" type="checkbox">45 jaar of ouder</label></li>
						</ul>
					</div>
					<h3 id="functie">Stap 6: Functie</h3>
					<div class="functie">
						<label><input type="radio" name="functie" value="alle-functies" checked>Alle functies</label>
						<label><input type="radio" name="functie" value="selecteer-functie">Selecteer functie (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input name="functie_id[]" value="1" type="checkbox">monteur niveau 1</label></li>
							<li><label><input name="functie_id[]" value="2" type="checkbox">monteur niveau 2</label></li>
							<li><label><input name="functie_id[]" value="3" type="checkbox">monteur niveau 3</label></li>
							<li><label><input name="functie_id[]" value="4" type="checkbox">technicus / monteur niveau 4</label></li>
							<li><label><input name="functie_id[]" value="5" type="checkbox">kader</label></li>
							<li><label><input name="functie_id[]" value="6" type="checkbox">overig</label></li>
						</ul>
					</div>
					<h3 id="soort">Stap 7: Soort leerbedrijf</h3>
					<div class="soort">
						<label><input type="radio" name="soort" value="alle-soorten" checked>Alle</label>
						<label><input type="radio" name="soort" value="selecteer-soort">Selecteer het soort leerbedrijf (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input type="checkbox" value="1" name="soort_id[]">IW, Goflex, GO</label></li>
							<li><label><input type="checkbox" value="2" name="soort_id[]">Overige praktijkopleidingscentra</label></li>
							<li><label><input type="checkbox" value="3" name="soort_id[]">Geen praktijkopleidingscentra</label></li>
						</ul>
					</div>
					<h3 id="klasse">Stap 8: Bedrijfsgrootte</h3>
					<p>Selecteer het aantal werknemers</p>
					<div class="bedrijfsgrootte">
						<label><input type="radio" name="bedrijfsgrootte" value="alle-bedrijfsgroottes" checked>Alle bedrijfsgroottes</label>
						<label><input type="radio" name="bedrijfsgrootte" value="selecteer-bedrijfsgrootte">Selecteer het aantal werknemers (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input type="checkbox" value="1" name="klasse_id[]">1-5 werknemers</label></li>
							<li><label><input type="checkbox" value="2" name="klasse_id[]">6-15 werknemers</label></li>
							<li><label><input type="checkbox" value="3" name="klasse_id[]">16-50 werknemers</label></li>
							<li><label><input type="checkbox" value="4" name="klasse_id[]">51-100 werknemers</label></li>
							<li><label><input type="checkbox" value="5" name="klasse_id[]">100 en meer werknemers</label></li>
						</ul>
					</div>
					<h3 id="kwalificatiedossier">Stap 9: Naar opleiding (kwalificatiedossier)</h3>
					<p>Selecteer het opleiding</p>
					<div class="opleiding">
						<label><input type="radio" name="opleiding" value="alle-opleidingen" checked>Alle opleidingen</label>
						<label><input type="radio" name="opleiding" value="selecteer-opleiding">Selecteer opleiding</label>
						<ul>
							<li>
								<select class="listbox" id="opleiding_id" name="opleiding_id">
									<option value="">Kies ...</option>
									<option value="1">Installeren - algemeen</option>
									<option value="2">Installeren - monteur electrotechnische installaties</option>
									<option value="3">Installeren - monteur koudetechniek</option>
									<option value="4">Service apparatuur en installaties - servicemonteur installatietechniek</option>
									<option value="5">Service apparatuur en installaties - algemeen</option>
									<option value="6">Assistent metaal-, elektro- en installatietechniek</option>
									<option value="7">EIPS - monteur</option>
									<option value="8">Installeren - monteur werktuigkundige installaties</option>
									<option value="9">Service apparatuur en installaties - onderhoudsmonteur installatietechniek</option>
									<option value="10">Infratechniek - monteur data / elektra</option>
									<option value="11">Infratechniek - monteur gas/warmte/water</option>
									<option value="12">Werkvoorbereiden - algemeen</option>
									<option value="13">Installeren - eerste monteur electrotechnische installaties</option>
									<option value="14">Service apparatuur en installaties - servicemonteur elektrotechniek</option>
									<option value="15">Infratechniek - eerste monteur data / elektra</option>
									<option value="16">Service apparatuur en installaties - inspectiemonteur koudetechniek</option>
									<option value="17">Infratechniek - eerste monteur gas/warmte/water</option>
									<option value="18">Service apparatuur en installaties - servicetechnicus elektrotechniek</option>
									<option value="19">Installeren - leidinggevend monteur electrotechnische installaties</option>
									<option value="20">Machinebouw mechatronica</option>
									<option value="21">Service apparatuur en installaties - servicetechnicus installatietechniek</option>
									<option value="22">Werkvoorbereiden - werkvoorbereider installatie</option>
									<option value="23">Middenkader engineering</option>
									<option value="24">EIPS - eerste monteur</option>
									<option value="25">Werkvoorbereiden - technisch tekenaar</option>
									<option value="26">Infratechniek - algemeen</option>
									<option value="27">Dakdekker</option>
									<option value="28">Infratechniek - technicus data / elektra</option>
									<option value="29">Service apparatuur en installaties - servicetechnicus werktuigbouw</option>
									<option value="30">Installeren - airco monteur</option>
									<option value="31">Installeren - eerste monteur werktuigkundige installaties</option>
									<option value="32">Service apparatuur en installaties - servicemonteur werktuigbouw</option>
									<option value="33">Installeren - leidinggevend monteur werktuigkundige installaties</option>
									<option value="34">EIPS - technicus</option>
									<option value="35">Installeren - eerste monteur dak</option>
									<option value="36">Werkvoorbereiden - tekenaar werkvoorbereider</option>
									<option value="37">Installeren - eerste monteur koudetechniek</option>
									<option value="38">Service apparatuur en installaties - servicetechnicus koudetechniek</option>
									<option value="39">Service apparatuur en installaties - onderhoudsmonteur industrie</option>
									<option value="40">Elektrotechnische Installaties - eerste monteur elektrotechnische installaties woning en utiliteit</option>
									<option value="41">Service- en onderhoudstechniek - technicus service en onderhoud werktuigkundige installaties</option>
									<option value="42">Werktuigkundige Installaties (Montage) - monteur werktuigkundige installaties</option>
									<option value="43">Infratechniek - monteur laagspanningsdistributie</option>
									<option value="44">Werktuigkundige Installaties (Montage) - eerste monteur woning</option>
									<option value="45">Koude- en klimaatsystemen - servicemonteur koude- en klimaatsystemen</option>
									<option value="46">Service- en onderhoudstechniek - eerste monteur service en onderhoud werktuigkundige installaties</option>
									<option value="47">Elektrotechnische Installaties - eerste monteur elektrotechnische industri&euml;le installaties en syste</option>
									<option value="48">Werktuigkundige Installaties (Montage) - eerste monteur utiliteit</option>
									<option value="49">Elektrotechnische systemen en installaties - technicus elektrotechnische installaties woning en util</option>
									<option value="50">Elektrotechnische systemen en installaties - technicus elektrotechnische industri&euml;le installaties e</option>
									<option value="51">Service- en onderhoudstechniek - technicus service en onderhoud werktuigbouw</option>
									<option value="52">Leidinggeven op basis van vakmanschap - technisch Leidinggevende</option>
									<option value="53">Technisch tekenen - tekenaar ontwerper werktuigkundige installaties</option>
									<option value="54">Service- en onderhoudstechniek - monteur service en onderhoud installaties en systemen</option>
									<option value="55">Infratechniek - eerste monteur laagspanningsdistributie</option>
									<option value="56">Koude- en klimaatsystemen - monteur koude- en klimaatsystemen</option>
									<option value="57">Infratechniek - monteur gas-, water- en warmtedistributie</option>
								</select>
							</li>
						</ul>
					</div>
					<input type="submit" name="submit" value="Toon resultaat in grafiek">
					<input type="submit" name="export" value="Toon resultaat in Excel" id="exp">
				</form>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>