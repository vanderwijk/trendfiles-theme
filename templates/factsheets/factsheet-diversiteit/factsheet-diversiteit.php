<?php
get_header();
?>

<script src="<?php echo $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/factsheet-diversiteit/factsheet-diversiteit.js'; ?>"></script>

<article <?php post_class('article'); ?> id="nederland">
	<div class="row header">
		<div class="col">
			<header class="block">
				<h1 class="category">Diversiteit</h1>
				<div class="knoppen-container">
					<ul class="knoppen" id="regioselectie">
						<li class="pdf"><a download id="download-pdf" href="/wp-content/themes/trendfiles-theme/pdf/factsheet_diversiteit_nederland.pdf">PDF / Printversie</a></li>
					</ul>
				</div>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="block entry-content no-border">
				<svg id="factsheet-ti-installatie" width="1888" height="2699" viewBox="0 0 1888 2699" fill="none" xmlns="http://www.w3.org/2000/svg">
					<defs>
						<style type="text/css">@import url('//fonts.googleapis.com/css?family=Roboto:700,500,400,300');</style>
					</defs>
					<?php // echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/factsheet-diversiteit-achtergrond.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/factsheet-diversiteit/factsheet-diversiteit.svg'); ?>
					<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/factsheets/factsheet-diversiteit/factsheet-diversiteit-data.svg'); ?>
				</svg>
			</div>
		</div>
		<div class="col">
			<div class="block no-border">
				<ul class="knoppen" id="vergelijkingselectie">
					<li class="vergelijkingknop geslacht" data-vergelijking="geslacht" onClick="ververs('geslacht')">Vrouwen</li>
					<li class="vergelijkingknop afkomst" data-vergelijking="afkomst" onClick="ververs('afkomst')">Migratieachtergrond </li>
					<li class="vergelijkingknop leeftijd" data-vergelijking="leeftijd" onClick="ververs('leeftijd')">55 jaar en ouder</li>
				</ul>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>