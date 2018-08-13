<?php 
$path = $_SERVER['DOCUMENT_ROOT'];
define('WP_USE_THEMES', false);
require($path .'/wp-load.php');

$onderwerp = $_POST['onderwerp'];
$persoon = $_POST['persoon'];

$tax_query = array('relation' => 'AND');
if ( isset($persoon ) && !empty($persoon) ) {
	$tax_query[] = array(
			'taxonomy' => 'persoon',
			'field' => 'id',
			'terms' => $persoon
	);
}
if ( isset($onderwerp ) && !empty($onderwerp) ) {
	$tax_query[] = array(
			'taxonomy' => 'onderwerp',
			'field' => 'id',
			'terms' => $onderwerp
	);
}

$args = array(
	'post_status' => 'publish',
	'post_type' => array( 'quote' ),
	'orderby' => 'date',
	'order' => 'DESC',
	'numberposts' => -1,
	/*'meta_query'	=> array(
		'relation'		=> 'OR',
		array(
			'key'		=> 'fragmenten_$_zoekwoorden',
			'compare'	=> 'LIKE',
			'value'		=> $onderwerp
		),
		array(
			'key'		=> 'fragmenten_$_persoon',
			'compare'	=> 'LIKE',
			'value'		=> $persoon
		)
	)*/
	'tax_query' => $tax_query
);
$query = new WP_Query($args);

if ( $query->have_posts() ) {

	while( $query->have_posts() ): $query->the_post(); ?>

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
					<h2><?php echo $video->post_title; ?></h2>
				</div>
				<div class="figure">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $video->ID ), 'thumb-video' ); ?>
					<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
					<img class="icon-play" src="/wp-content/themes/otib/img/play-circle.svg" alt="Video afspelen">
				</div>
				<div class="intro">
					<strong>Quote:</strong><br />
					<?php the_excerpt(); ?>
				</div>
			</a>
		</div>
	</div>

	<?php endwhile;

} else { ?>
	<div class="col one-third">
		<div <?php post_class( 'block' ); ?>>
			Niets gevonden
		</div>
	</div>
<?php }