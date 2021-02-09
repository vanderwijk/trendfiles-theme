<?php get_header(); ?>

<style>
header,
nav,
footer {
	display: none;
}
body {
	background: #fff;
	margin: 0;
	overflow: hidden;
}
.wrapper {
	box-shadow: none;
}
.circle {
	transform-box: fill-box;
	transform-origin: center;
	transform: rotate(-90deg);
	transition: stroke-dasharray .5s ease-in-out;
}
</style>

<script src="<?php echo $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/infographic-bedrijven.js'; ?>"></script>

<svg width="700" height="512" viewBox="0 0 700 512" fill="none" xmlns="http://www.w3.org/2000/svg">

<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/infographic-bedrijven.svg'); ?>
<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/templates/infographic-bedrijven-data.svg'); ?>

</svg>

<?php get_footer(); ?>