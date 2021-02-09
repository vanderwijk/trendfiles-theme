<?php
get_header();
?>

<script src="<?php echo $protocol . $host . '/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.js'; ?>"></script>

<article <?php post_class('article'); ?> id="nederland">
	<div class="row header">
		<div class="col">
			<header class="block">
				<h1 class="category">Technische Installatiebranche</h1>
				<div class="knoppen-container">
					<ul class="knoppen" id="regioselectie">
						<li class="regioknop nederland" data-regio="nederland">Nederland</li>
						<li class="disabled regioknop noord_nederland" data-regio="noord_nederland">Noord Nederland</li>
						<li class="disabled regioknop noord_holland" data-regio="noord_holland">Noord-Holland</li>
						<li class="disabled regioknop midden_nederland" data-regio="midden_nederland">Midden Nederland</li>
						<li class="disabled regioknop gelderland_overijssel" data-regio="gelderland_overijssel">Gelderland/Overijssel</li>
						<li class="disabled regioknop zuid_nederland" data-regio="zuid_nederland">Zuid Nederland</li>
						<li class="disabled regioknop zuid_holland" data-regio="zuid_holland">Zuid-Holland</li>

						<li class="pdf"><a download id="download-pdf" href="/wp-content/themes/trendfiles-theme/pdf/factsheet_technischeinstallatiebranche_nederland.pdf">PDF / Printversie</a></li>
					</ul>
				</div>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block entry-content no-border">
				<svg id="factsheet-ti-installatie" width="1888" height="2552" viewBox="0 0 1888 2552" fill="none" xmlns="http://www.w3.org/2000/svg">
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-technische-installatiebranche-achtergrond.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-technische-installatiebranche.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-technische-installatiebranche-kaart.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-technische-installatiebranche-data.svg'); ?>
				</svg>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>