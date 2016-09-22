<?php get_header(); ?>

<div class="row main flex">

	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Intro')) : endif; ?>

	<div class="col two-thirds">
		<div class="block">
			<a href="/categorie/video/" class="category videos">Video's</a>

			<?php
				$video_args = array(
					'numberposts' => 1,
					'category' => 25
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
			<a href="" class="category nieuws">Nieuws</a>

			<?php
				$news_args = array(
					'numberposts' => 2,
					'category' => 24
				);
				$news_posts = get_posts( $news_args );

				foreach( $news_posts as $post) {
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

			<p><strong><a href="/categorie/nieuws/">Bekijk hier meer nieuws >></a></strong></p>
		</div>
	</div>

</div>

<?php get_footer(); ?>
