<?php
/**
 * The Template for displaying all single video posts
 *
 * @package WordPress
 * @subpackage Wij Techniek
 */ ?>

<div class="row">
	<div class="col">
		<div class="block">
			<?php 
				$category = get_the_category(); 
				if( $category[0] ) {
					echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . $category[0]->cat_name . '" class="category">';
					echo $category[0]->cat_name . ' &raquo;';
					echo '</a>';
				}
			?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col one-third">
		<div class="block">
			<div class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>
			<div class="postmeta">
				<span class="date updated"><?php the_modified_date(' j F Y'); ?></span>
				<span class="vcard author">
					<span class="fn"><?php the_author_posts_link(); ?></span>
				</span>
			</div>
			<div class="intro">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
	<div class="col two-thirds">
		<div class="block entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php $persoon = wp_get_post_terms( $post->ID, 'persoon', array( 'fields' => 'ids' ) );
	if ( isset($persoon ) && !empty($persoon) ) {
		$tax_query[] = array(
				'taxonomy' => 'persoon',
				'field' => 'id',
				'terms' => $persoon
		);

		$args = array(
			'post_status' => 'publish',
			'post_type' => array( 'quote' ),
			'orderby' => 'ID',
			'order' => 'DESC',
			'posts_per_page' => -1,
			'tax_query' => $tax_query
		);

}
$query = new WP_Query($args);

if ( $query->have_posts() ) { ?>

<div class="row">
	<div class="col">
		<div class="block">
			Quotes uit deze Talk:
		</div>
	</div>
</div>

<div class="row">
	<div class="scroll">

	<?php while( $query->have_posts() ): $query->the_post(); ?>

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

			$video = get_field( 'video' );
			$tijdcode = get_field( 'tijdcode' );

			//print_r($video);

			?>
			<a href="<?php the_permalink(); ?>" data-fancybox data-type="iframe" data-src="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="lightbox-video article-link">
				<div class="header">
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="figure">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'thumb-video' ); ?>
					<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
					<img class="icon-play" src="/wp-content/themes/trendfiles-theme/img/play-circle.svg" alt="Video afspelen">
				</div>
				<div class="intro">
					<strong>Quote:</strong><br />
					<?php the_excerpt(); ?>
				</div>
			</a>
		</div>
	</div>

	<?php endwhile; ?>

	</div>
</div>

<?php } ?>
