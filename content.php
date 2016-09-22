<div class="col one-third">
	<div <?php post_class( 'block' ); ?>>
		<?php 
		if ( is_front_page() || is_search() && is_single() || is_category( 'thema' ) ) {
			$category = get_the_category(); 
			if ( $category[0] ) {
				echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . $category[0]->cat_name . '" class="category-link">';
				echo '<div class="category">';
				echo $category[0]->cat_name . ' &raquo;';
				echo '</div>';
				echo '</a>';
			}
		}
		?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-link">
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="figure">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-article' ); ?>
				<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
			</div>
			<?php } ?>
			<div class="header">
				<h2><?php the_title(); ?></h2>
			</div>
			<div class="intro">
				<?php the_excerpt(); ?>
			</div>
		</a>
	</div>
</div>