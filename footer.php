<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage OTIB
 */
?>

	<footer class="footer">
		<div class="row">
			<div class="col">
				<div class="block">
					<div class="breadcrumb">
						<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('',''); } ?>
					</div>
					<?php if ( !is_front_page() ) { ?>
					<div class="pagination">
						<?php if ( function_exists ( 'wp_pagenavi' ) ) { wp_pagenavi(); } ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>