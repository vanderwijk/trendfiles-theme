<?php
/**
 * Archive template voor columns (aside)
 */
?>

<div class="col one-third" data-mh="matchheight">
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
			<div class="header">
				<h2 style="display:none;"><?php the_title(); ?></h2>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="figure">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-aside' ); ?>
				<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
			</div>
			<?php } ?>
			<div class="intro">
				<?php the_excerpt(); ?>
				<p><strong>Lees de column</strong></p>
			</div>
		</a>
	</div>
</div>