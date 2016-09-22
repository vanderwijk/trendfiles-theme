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
						<?php $paginate_args = array(
							'show_all'           => true,
							'prev_next'          => true,
							'prev_text'          => __('Vorige |'),
							'next_text'          => __('| Volgende')
						);
						echo paginate_links( $paginate_args ); ?>
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
