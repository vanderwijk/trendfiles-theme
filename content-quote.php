<?php
/**
 * Archive template voor interviews (quote)
 */
?>
<div class="col one-third">
	<div <?php post_class( 'block' ); ?>>
		<?php 
		if ( is_front_page() || is_search() || is_category( 'thema' ) ) {
			$category = get_the_category();
			$category_link = get_category_link( $category[0]->term_id );
			$category_name = get_cat_name ( $category[0]->term_id );
			if ( $category[0] ) {
				echo '<a href="' . esc_url( $category_link ) . '" title="' . $category_name . '" class="category">' . $category_name . ' &raquo;' . '</a>';
			}
		}
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-link">
			<div class="intro">
				<?php the_excerpt(); ?>
				<p><strong>Lees het interview</strong></p>
			</div>
		</a>
	</div>
</div>