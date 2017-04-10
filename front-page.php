<?php get_header(); ?>

<div class="row main flex">

	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Intro') ) : endif; ?>

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
