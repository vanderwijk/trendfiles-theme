<?php get_header(); ?>

<div class="row main flex">

	<div class="col two-thirds">
		<div class="block">
			<a href="" class="category videos">Trends in Cijfers</a>

			<div class="factsheets">
				<?php echo do_shortcode('[content_block id=1963]'); ?>
			</div>

			<div class="kerngegevens">
				<?php echo do_shortcode('[content_block id=2353]'); ?>
			</div>

		</div>
	</div>

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Intro') ) : endif; ?>

	<div class="col one-third">
		<div class="block">
			<a href="/downloads-en-links/" class="category">Publicaties</a>

			<?php
				$publicaties_args = array(
					'posts_per_page' => 2,
					'post_type' => 'download',
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$publicaties_posts = get_posts( $publicaties_args );
				foreach( $publicaties_posts as $post ) {
					setup_postdata( $post );

					$attachments = get_children( 
						array(
							'post_parent' => get_the_ID(),
							'post_type' => 'attachment',
							'post_mime_type' => 'application/pdf,application/msword'
						)
					);
					if ( $attachments ) {
						foreach( $attachments as $attachment ) {
							echo '<div class="publicatie">';
							echo '<figure>';
							the_post_thumbnail('download-cover');
							echo '</figure>';
							echo '<div class="text">';
							echo '<h2>';
							echo '<a href="' . get_the_permalink() . '">';
							echo '<a data-fancybox data-type="iframe" data-src="'.wp_get_attachment_url($attachment -> ID).'" href="'.wp_get_attachment_url($attachment -> ID).'">';
							the_title();
							echo '</a>';
							echo '</h2>';
							the_excerpt();
							echo '</div>';
							echo '</div>';
						}
						wp_reset_postdata();
					}
			} ?>

			<p><strong><a href="/downloads-en-links/">Bekijk hier alle publicaties >></a></strong></p>
		</div>
	</div>

	<div class="col two-thirds">
		<div class="block">
			<a href="/categorie/video/" class="category videos">Video's</a>

			<?php
				$video_args = array(
					'numberposts' => 1,
					'category_name' => 'video'
				);
				$video_posts = get_posts( $video_args );
				foreach( $video_posts as $post ) {
					setup_postdata( $post );
					the_content();
					echo '<h2>';
					echo '<a href="' . get_the_permalink() . '">';
					the_title();
					echo '</a>';
					echo '</h2>';
					echo '<a href="' . get_the_permalink() . '">';
					the_excerpt();
					echo '</a>';
				}
				wp_reset_postdata();
				?>

			<p><strong><a href="/categorie/video/">Bekijk hier alle video's >></a></strong></p>
		</div>
	</div>

	<div class="col one-third">
		<div class="block">
			<a href="/categorie/artikelen/" class="category artikelen">Artikelen</a>

			<?php
				$article_args = array(
					'numberposts' => 2,
					'category_name' => 'artikelen'
				);
				$article_posts = get_posts( $article_args );

				foreach( $article_posts as $post ) {
					setup_postdata( $post );
					echo '<a href="' . get_permalink() . '">';
					the_post_thumbnail( 'thumbnail' );
					echo '</a>';
					echo '<h2>';
					echo '<a href="' . get_permalink() . '">';
					the_title();
					echo '</a>';
					echo '</h2>';
					echo '<a href="' . get_permalink() . '">';
					the_excerpt();
					echo '</a>';
				}
				wp_reset_postdata(); ?>

			<p><strong><a href="/categorie/artikelen/">Bekijk hier meer artikelen >></a></strong></p>
		</div>
	</div>

</div>

<?php get_footer(); ?>
