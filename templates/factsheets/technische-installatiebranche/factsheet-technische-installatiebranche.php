<?php
get_header();
?>

<script src="<?php echo $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/factsheet-technische-installatiebranche.js?ver=' . TRENDFILES_THEME_VER; ?>"></script>

<article <?php post_class('article'); ?> id="nederland">
	<div class="row header">
		<div class="col">
			<header class="block">
				<h1 class="category">Technische Installatiebranche</h1>
				<div class="knoppen-container">
					<ul class="knoppen" id="regioselectie">
						<li class="regioknop nederland" data-regio="nederland">Nederland</li>
						<li class="disabled regioknop groningen" data-regio="groningen">Groningen</li>
						<li class="disabled regioknop friesland" data-regio="friesland">Friesland</li>
						<li class="disabled regioknop drenthe" data-regio="drenthe">Drenthe</li>
						<li class="disabled regioknop overijssel" data-regio="overijssel">Overijssel</li>
						<li class="disabled regioknop gelderland" data-regio="gelderland">Gelderland</li>
						<li class="disabled regioknop flevoland" data-regio="flevoland">Flevoland</li>
						<li class="disabled regioknop utrecht" data-regio="utrecht">Utrecht</li>
						<li class="disabled regioknop noord_holland" data-regio="noord_holland">Noord-Holland</li>
						<li class="disabled regioknop zuid_holland" data-regio="zuid_holland">Zuid-Holland</li>
						<li class="disabled regioknop zeeland" data-regio="zeeland">Zeeland</li>
						<li class="disabled regioknop noord_brabant" data-regio="noord_brabant">Noord-Brabant</li>
						<li class="disabled regioknop limburg" data-regio="limburg">Limburg</li>
						<li class="pdf"><a download id="download-pdf" onClick="window.print();return false" href="/wp-content/themes/trendfiles-theme/pdf/factsheet_technischeinstallatiebranche_nederland.pdf">Print</a></li>
					</ul>
				</div>
				<div class="sharing">
					<span>Deel dit:</span>
					<a href="mailto:?subject=Factsheet Technische Installatiebranche&body=https://trendfiles.wij-techniek.nl/factsheet/technische-installatiebranche/" title="Stuur deze pagina per email"><div class="dashicons dashicons-email-alt"></div></a>
					<a href="http://twitter.com/home?status=Factsheet Technische Installatiebranche https://trendfiles.wij-techniek.nl/factsheet/technische-installatiebranche/ via @OTIBTrendfiles" title="Deel deze pagina op Twitter" target="_blank"><div class="dashicons dashicons-twitter"></div></a>
					<a href="https://www.linkedin.com/sharing/share-offsite/?url=https://trendfiles.wij-techniek.nl/factsheet/technische-installatiebranche/" title="Deel deze pagina op Linkedin" target="_blank"><div class="dashicons dashicons-linkedin"></div></a>
					<a href="whatsapp://send?text=Factsheet Technische Installatiebranche https://trendfiles.wij-techniek.nl/factsheet/technische-installatiebranche/" title="Deel deze pagina via WhatsApp"><div class="dashicons dashicons-whatsapp"></div></a>
				</div>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block entry-content no-border">
				<svg id="factsheet-ti-installatie" width="1888" height="2552" viewBox="0 0 1888 2552" fill="none" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<style type="text/css">@import url('//fonts.googleapis.com/css?family=Roboto:700,500,400,300');</style>
					</defs>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/achtergrond.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/factsheet-technische-installatiebranche.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/kaart.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/technische-installatiebranche/data.svg'); ?>
				</svg>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>