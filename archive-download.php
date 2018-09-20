<?php
/**
 * Template Name: Downloads
 */

get_header(); ?>

<?php
$cat_args = array(
	'orderby' => 'slug', // kan ook name zijn
	'order' => 'ASC',
	'taxonomy' => 'download_categories'
);
$categories = get_categories( $cat_args ); 

foreach( $categories as $category ) { ?>

<div class="row main flex <?php echo $category -> slug; if ( $category -> name == 'Enquêtes' ) { echo ' collapsed'; } ?>">
	<div class="col">
		<div class="block">
			<h1 class="entry-title"><?php echo $category -> name; ?><span class="meer">Meer <?php echo $category -> name; ?></span></h1>
		</div>
	</div>

	<?php
	$downloads = new WP_Query( 'post_type=download&download_categories=' . $category -> slug . '&post_status=publish&posts_per_page=-1' );
	if ( $downloads -> have_posts() ) { 
		while ( $downloads -> have_posts() ) { 
			$downloads -> the_post();
			// Toon alle bijgesloten Word en PDF attachments
			$args = array(
				'post_type' => 'attachment',
				'post_mime_type' => 'application/pdf,application/msword',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $post -> ID,
				'orderby' => 'menu_order',
				'order' => 'desc'
			);
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ($attachments as $attachment) {
					$attachment_url = wp_get_attachment_url($attachment -> ID);
				}
			} ?>
			<div class="col one-fifth">
				<div class="block download <?php echo $category -> slug; ?>">
				<?php if ($attachment_url) { ?>
				<a href="<?php echo $attachment_url; ?>">
				<?php } ?>
					<figure class="figure">
						<?php the_post_thumbnail( 'download-cover' ); ?>
					</figure>
					<div class="description-wrap">
						<h3>
							<?php the_title(); ?>
						</h3>
						<?php the_excerpt(); ?>
					</div>
					<div class="link-wrap">
					<?php
						// Toon de download url uit de post meta
						/*if ( get_post_meta($post -> ID, 'download_url', true) !== '' ) {
							$download_url = get_post_meta($post -> ID, 'download_url', true);
							echo '<p><a href="' . $download_url . '" rel="external">Bestel</a></p>';
						};*/
						
						// Toon de themanummer url uit de post meta
						if ( get_post_meta($post -> ID, 'themanummer_url', true) !== '' ) {
							$themanummer_url = get_post_meta($post -> ID, 'themanummer_url', true);
							echo '<p><a href="' . $themanummer_url . '" rel="external">Bekijk</a></p>';
						}; ?>
					</div>
				<?php if ($attachment_url) { ?>
				</a>
				<?php } ?>
				</div>
			</div>
			<?php
		}
	} ?>
	</div>
<?php }
wp_reset_postdata(); ?>

<div class="row main">
<?php $link_args = array(
	'orderby'          => 'name',
	'order'            => 'ASC',
	'limit'            => -1,
	'category'         => 2,
	'hide_invisible'   => 1,
	'show_updated'     => 0,
	'echo'             => 1,
	'categorize'       => 0,
	'title_li'         => __('Links'),
	'title_before'     => '<h2 class="entry-title">',
	'title_after'      => '</h2>',
	'category_orderby' => 'name',
	'category_order'   => 'ASC',
	'class'            => 'linkcat',
	'category_before'  => '',
	'category_after'   => '' );
wp_list_bookmarks( $link_args ); ?>
</div>

<?php get_footer(); ?>