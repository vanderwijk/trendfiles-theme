<?php
get_header(); ?>

<script src="http://trendfiles.otib.local/wp-content/themes/trendfiles-theme/js/factsheet-technische-installatiebranche.js" type="text/javascript"></script>

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
				<?php echo file_get_contents('http://trendfiles.otib.local/wp-content/themes/trendfiles-theme/img/factsheet-ti-installatie.svg'); ?>
			</div>
		</div>
	</div>
</article>

<?php get_footer(); ?>