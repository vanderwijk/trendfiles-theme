<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Wij Techniek
 */
?>

	<footer class="footer">
		<div class="row">
			<div class="col">
				<div class="block">
					<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="breadcrumb">','</div>'); } ?>
					<?php if ( !is_front_page() ) { ?>
					<div class="pagination">
						<?php $paginate_args = array(
							'show_all'           => true,
							'prev_next'          => true,
							'prev_text'          => __('Vorige |'),
							'next_text'          => __('| Volgende')
						);
						echo paginate_links( $paginate_args ); ?>
					</div>
					<?php } ?>
					<div class="wij-techniek-logo">
						<a href="https://www.wij-techniek.nl"><img src="/wp-content/themes/trendfiles-theme/img/wij-techniek-logo.svg"></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
