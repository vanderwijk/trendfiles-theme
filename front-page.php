<?php get_header(); ?>

<div class="row main flex">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Intro') ) : endif; ?>

	<div class="col four-fifths infographic">
		<div class="block">
			<?php echo file_get_contents('https://trendfiles.otib.nl/wp-content/themes/trendfiles-theme/img/home-techniekketen.svg'); ?>
			<p class="meer-button" style="text-align: center; width: 100%;"><a href="/factsheet/ti-installatie/">TI Installatie</a></p>
			<p style="text-align: center; width: 100%;">Bekijk alle trends, cijfers en ontwikkelingen binnen de TI branche.</p>
		</div>
	</div>

	<div class="col one-fifth uitgelicht">
		<div class="block">
			<?php echo file_get_contents('https://trendfiles.otib.nl/wp-content/themes/trendfiles-theme/img/home-uitgelicht.svg'); ?>
			<h2>Nog geen kwart van de installatiebedrijven is actief als leerbedrijf.</h2>
		</div>
	</div>

	<div class="col">
		<div class="block">
			<a href="/type/video/" class="category videos">Video's</a>
			<p style="width: 100%"><strong>Binnen alle video's kun je zoeken naar quotes op onderwerpen</strong></p>
			<div class="video-listing">
				<?php
					$video_cats = array(102,103,104);
					foreach ($video_cats as $video_cat) {
					$video_args = array(
						'cat' => $video_cat,
						'numberposts' => 1,
						'tax_query' => array(
							array(
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array( 'post-format-video' )
							)
						)
					);
					$video_posts = get_posts( $video_args );
					foreach( $video_posts as $post ) {
						setup_postdata( $post );
						echo '<div class="video-thumb">';
						echo '<h2>';
						the_title();
						echo '</h2>';

						echo '<a href="' . get_the_permalink() . '">';

						echo '<div class="figure">';
						the_post_thumbnail( 'large' );
						echo '<img class="icon-play" src="/wp-content/themes/trendfiles-theme/img/play-circle.svg" alt="Video afspelen">';
						echo '</div>';

						echo '<div class="video-excerpt">';
						the_excerpt();
						echo '</div>';

						$category_link = get_category_link( $video_cat );

						echo '</a>';
						echo '<p class="meer-button"><a href="' . esc_url( $category_link ) . '">' . get_cat_name( $category_id = $video_cat ) . '</a></p>';
						echo '</div>';
					}
					wp_reset_postdata();
				} ?>
			</div>

		</div>
	</div>

	<div class="col two-thirds">
		<div class="block">
			<a href="/categorie/artikelen/" class="category artikelen">Artikelen</a>
			<div class="artikel-listing">
				<?php
				$article_args = array(
					'numberposts' => 2,
					'category_name' => 'artikelen'
				);
				$article_posts = get_posts( $article_args );

				foreach( $article_posts as $post ) {
					setup_postdata( $post );
					echo '<div class="artikel">';
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
					echo '</div>';
				}
				wp_reset_postdata(); ?>
			</div>
			<p class="meer-button"><a href="/categorie/artikelen/">meer artikelen</a></p>
		</div>
	</div>

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

			<p class="meer-button"><a href="/downloads-en-links/">meer publicaties</a></p>
		</div>
	</div>

</div>

<?php get_footer(); ?>
