<?php
/**
 * Template Name: Draaitabel leerlingen
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
				<form method="post" id="leerlingen" action="<?php if(isset($_GET['test'])) {echo 'http://test.opleidingsgegevens.nl/protected/index.php'; } else { echo 'http://otib.opleidingsgegevens.nl/protected/index.php'; } ?>">
					<input type="hidden" id="schoolsoortaantal" name="schoolsoortaantal" value="0">
					<h3 id="stap-1">Stap 1: Leerlingen of gediplomeerden <span class="check">✔</span><span class="false">✘</span></h3>
					<p>Wil je informatie over leerlingen of gediplomeerden?</p>
					<ul>
						<li><label><input type="radio" value="1" name="id_leerling" class="id_leerling">Leerlingen</label></li>
						<li><label><input type="radio" value="2" name="id_leerling" class="id_leerling">Gediplomeerden</label></li>
					</ul>
					<h3>Stap 2: Algemene informatie</h3>
					<p>Klik op een geslacht om het te selecteren</p>
					<ul class="gender">
						<li id="man-vrouw" class="man-vrouw licht donker"><label><input type="checkbox" value="">Totaal</label></li>
						<li id="man" class="man licht"><label><input class="id_geslacht" type="checkbox" value="M" name="id_geslacht[]">Mannen</label></li>
						<li id="vrouw" class="vrouw licht"><label><input class="id_geslacht" type="checkbox" value="V" name="id_geslacht[]">Vrouwen</label></li>
					</ul>
					<p>Klik op de kaart om een regio te selecteren. Je kunt meerdere regio's selecteren.</p>
					<p>
						<object class="map" id="map" data="/wp-content/themes/trendfiles-theme/img/nederland.svg" width="186" height="235" type="image/svg+xml"></object>
					</p>
					<div class="regio">
						<label><input type="radio" name="rbpi_totaal" value="99" class="alle-regios" checked>Totaal Nederland</label>
						<label><input type="radio" name="rbpi_totaal" value="selecteer-regio">Selecteer regio (meerdere keuzes mogelijk)</label>
						<ul>
							<li><label><input type="checkbox" value="1" name="id_rpbi[]" class="noord-nederland">Noord Nederland</label></li>
							<li><label><input type="checkbox" value="2" name="id_rpbi[]" class="gelderland-overijssel">Gelderland / Overijssel</label></li>
							<li><label><input type="checkbox" value="3" name="id_rpbi[]" class="midden-nederland">Midden Nederland</label></li>
							<li><label><input type="checkbox" value="4" name="id_rpbi[]" class="noord-holland">Noord Holland</label></li>
							<li><label><input type="checkbox" value="5" name="id_rpbi[]" class="zuid-holland">Zuid Holland</label></li>
							<li><label><input type="checkbox" value="6" name="id_rpbi[]" class="zuid-nederland">Zuid Nederland</label></li>
						</ul>
					</div>
					<h3 id="stap-3">Stap 3: Scholing  <span class="check">✔</span><span class="false">✘</span></h3>
					<p>Van welk type opleiding wil je informatie?</p>
					<ul>
						<li>
							<label><input type="radio" value="vmbo" name="schoolsoort" class="schoolsoort">VMBO</label>
							<fieldset class="group" id="vragen-vmbo">
								<fieldset class="subgroup">
									<label>Leerweg</label>
									<ul>
										<li>
											<label><input class="id_leerweg_vmbo" type="checkbox" value="1" name="id_leerweg_vmbo[]">Basisberoepsgerichte leerweg</label>
										</li>
										<li>
											<label><input type="checkbox" value="2" name="id_leerweg_vmbo[]">Kaderberoepsgerichte leerweg</label>
										</li>
										<li>
											<label><input type="checkbox" value="3" name="id_leerweg_vmbo[]">Gemengde leerweg</label>
										</li>
										<li>
											<label><input type="checkbox" value="4" name="id_leerweg_vmbo[]">Theoretische leerweg</label>
										</li>
									</ul>
								</fieldset>
								<fieldset class="subgroup">
									<label>Vakgebied</label>
									<ul>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="99" class="checkall">Techniek totaal</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="0" class="ti-totaal">TI totaal</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="1" class= "ti">TI - elektrotechniek (gaat over in PIE)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="2" class= "ti">TI - installatietechniek (gaat over in PIE)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="3" class= "ti">TI - instalektro (gaat over in PIE)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="4"> Metaal (gaat over in PIE)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="5"> Bouw (gaat over in BWI)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="6"> Sectorbreed</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="7"> Overige techniek</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="8"> Intersectoraal techniek</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="9"> Doorlopende leerlijn vmbo-mbo techniek</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="10"> Profiel: Produceren Installeren & Energie (PIE)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="11"> Profiel: Bouwen, Wonen en Interieur (BWI)</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="12"> Profiel: Mobiliteit en Transport</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="13"> Profiel: Media, Vormgeving en ICT</label></li>
										<li><label><input type="checkbox" name="id_vakgebied_vmbo[]" value="14"> Profiel: Maritiem en Techniek</label></li>
									</ul>
								</fieldset>
								<fieldset class="subgroup">
									<label>LPI</label>
									<ul>
										<li>
											<select class="listbox" id="id_lpi" name="id_lpi">
												<option value="-1"> Kies .. </option>
												<option value="11" title="LPI Groningen">LPI Groningen</option>
												<option value="12" title="LPI Friesland">LPI Friesland</option>
												<option value="13" title="LPI Drenthe">LPI Drenthe</option>
												<option value="21" title="LPI Twente">LPI Twente</option>
												<option value="22" title="LPI Zwolle">LPI Zwolle</option>
												<option value="23" title="LPI Harderwijk">LPI Harderwijk</option>
												<option value="24" title="LPI Vallei">LPI Vallei</option>
												<option value="25" title="LPI Tiel">LPI Tiel</option>
												<option value="26" title="LPI Stedendriehoek ApeldoornDeventerZutphen">LPI Stedendriehoek ApeldoornDeventerZutphen</option>
												<option value="27" title="LPI Arnhem">LPI Arnhem</option>
												<option value="28" title="LPI Nijmegen">LPI Nijmegen</option>
												<option value="29" title="LPI AchterhoekLiemers">LPI AchterhoekLiemers</option>
												<option value="31" title="LPI Gooi en Vechtstreek">LPI Gooi en Vechtstreek</option>
												<option value="32" title="LPI Zenderstreek">LPI Zenderstreek</option>
												<option value="33" title="LPI AmersfoortUtrechtse Heuvelrug">LPI AmersfoortUtrechtse Heuvelrug</option>
												<option value="34" title="LPI Utrecht Stad">LPI Utrecht Stad</option>
												<option value="35" title="LPI Flevoland/Noordoostpolder">LPI Flevoland/Noordoostpolder</option>
												<option value="41" title="LPI Noord Holland Noord">LPI Noord Holland Noord</option>
												<option value="42" title="LPI Zaanstreek Waterland">LPI Zaanstreek Waterland</option>
												<option value="43" title="LPI Haarlem e.o.">LPI Haarlem e.o.</option>
												<option value="44" title="LPI Amsterdam e.o.">LPI Amsterdam e.o.</option>
												<option value="45" title="LPI FlevolandNoord Oostpolder">LPI FlevolandNoord Oostpolder</option>
												<option value="51" title="LPI Rijnlanden">LPI Rijnlanden</option>
												<option value="52" title="LPI Haaglanden">LPI Haaglanden</option>
												<option value="53" title="LPI Gouda">LPI Gouda</option>
												<option value="54" title="LPI Zuid Holland Zuid">LPI Zuid Holland Zuid</option>
												<option value="55" title="LPI Rotterdam">LPI Rotterdam</option>
												<option value="61" title="LPI Zeeland">LPI Zeeland</option>
												<option value="62" title="LPI Bergen op Zoom">LPI Bergen op Zoom</option>
												<option value="63" title="LPI Breda">LPI Breda</option>
												<option value="71" title="LPI Limburg NoordMidden">LPI Limburg NoordMidden</option>
												<option value="72" title="LPI Limburg Zuid">LPI Limburg Zuid</option>
												<option value="73" title="LPI Helmond">LPI Helmond</option>
												<option value="74" title="LPI Eindhoven">LPI Eindhoven</option>
												<option value="75" title="LPI NoordOost Brabant">LPI NoordOost Brabant</option>
												<option value="76" title="LPI Tilburg">LPI Tilburg</option>
												<option value="77" title="LPI Den Bosch">LPI Den Bosch</option>
											</select>
										</li>
										<li>
											<label>Uitsplitsen naar school?<input type="checkbox" value="500" name="uitsplitsen_school"></label>
										</li>
									</ul>
								</fieldset>
							</fieldset>
						</li>
						<li>
							<label><input type="radio" value="mbo" name="schoolsoort" class="schoolsoort">MBO</label>
							<fieldset class="group" id="vragen-mbo">
								<fieldset class="subgroup">
									<label>Onderwijsvorm</label>
									<ul>
										<li>
											<label><input class="id_bol_bbl_mbo" type="checkbox" value="2" name="id_bol_bbl_mbo[]">BOL</label>
										</li>
										<li>
											<label><input class="id_bol_bbl_mbo" type="checkbox" value="1" name="id_bol_bbl_mbo[]">BBL</label>
										</li>
									</ul>
								</fieldset>
								<fieldset class="subgroup">
									<label>Vakgebied</label>
									<ul>
										<li>
											<label><input class="id_vakgebied_mbo checkall" type="checkbox" value="99" name="vakgebied_mbo">Techniek totaal</label>
										</li>
										<li>
											<label><input class="id_vakgebied_mbo" type="checkbox" value="1" name="id_vakgebied_mbo[]">TI</label>
										</li>
										<li>
											<label><input class="id_vakgebied_mbo" type="checkbox" value="2" name="id_vakgebied_mbo[]">TI verwant</label>
										</li>
										<li>
											<label><input class="id_vakgebied_mbo" type="checkbox" value="3" name="id_vakgebied_mbo[]">Overig techniek</label>
										</li>
									</ul>
								</fieldset>
							</fieldset>
						</li>
						<li>
							<label><input type="radio" value="hbo" name="schoolsoort" class="schoolsoort">HBO</label>
							<fieldset class="group" id="vragen-hbo">
								<fieldset class="subgroup">
									<label>Opleidingsvorm</label>
									<ul>
										<li>
											<label><input class="id_opleidingsvorm_hbo" type="checkbox" value="1" name="id_opleidingsvorm_hbo[]">Voltijd</label>
										</li>
										<li>
											<label><input class="id_opleidingsvorm_hbo" type="checkbox" value="2" name="id_opleidingsvorm_hbo[]">Deeltijd</label>
										</li>
										<li>
											<label><input class="id_opleidingsvorm_hbo" type="checkbox" value="3" name="id_opleidingsvorm_hbo[]">Duaal</label>
										</li>
									</ul>
								</fieldset>
								<fieldset class="subgroup">
									<label>Vakgebied</label>
									<ul>
										<li>
											<label><input class="id_vakgebied_hbo checkall" type="checkbox" value="99" name="vakgebied_hbo">TI-gerelateerd totaal</label>
										</li>
										<li>
											<label><input class="id_vakgebied_hbo" type="checkbox" value="1" name="id_vakgebied_hbo[]">Elektrotechniek</label>
										</li>
										<li>
											<label><input class="id_vakgebied_hbo" type="checkbox" value="4" name="id_vakgebied_hbo[]">Werktuigbouwkunde</label>
										</li>
										<li>
											<label><input class="id_vakgebied_hbo" type="checkbox" value="2" name="id_vakgebied_hbo[]">Engineering</label>
										</li>
										<li>
											<label><input class="id_vakgebied_hbo" type="checkbox" value="3" name="id_vakgebied_hbo[]">Technische bedrijfskunde</label>
										</li>
									</ul>
								</fieldset>
								<fieldset class="subgroup">
									<label>School</label>
									<ul>
										<li>
											<select class="listbox" id="id_schoolnaam_hbo" name="id_schoolnaam_hbo">
												<option value="-1"> Kies .. </option>
												<option value="14" title="avans hs.">avans hs.</option>
												<option value="52" title="chr. hs. windesheim">chr. hs. windesheim</option>
												<option value="87" title="fontys hs.">fontys hs.</option>
												<option value="99" title="haagse hs.">haagse hs.</option>
												<option value="100" title="hanzehogeschool groningen">hanzehogeschool groningen</option>
												<option value="113" title="hs. inholland">hs. inholland</option>
												<option value="114" title="hs. rotterdam">hs. rotterdam</option>
												<option value="115" title="hs. utrecht">hs. utrecht</option>
												<option value="116" title="hs. van amsterdam">hs. van amsterdam</option>
												<option value="117" title="hs. van arnhem en nijmegen">hs. van arnhem en nijmegen</option>
												<option value="118" title="hz university of applied sciences">hz university of applied sciences</option>
												<option value="159" title="noordelijke hs. leeuwarden">noordelijke hs. leeuwarden</option>
												<option value="222" title="saxion hs.">saxion hs.</option>
												<option value="275" title="stenden  hs.">stenden  hs.</option>
												<option value="301" title="zuyd hs.">zuyd hs.</option>
											</select>
										</li>
									</ul>
								</fieldset>
							</fieldset>
						</li>
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
