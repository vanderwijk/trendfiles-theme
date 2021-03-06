<?php get_header(); ?>

<div class="row main">
	<div class="block techniekketen">
		<h1>De Techniekketen</h1>
		<p>Onder de techniekketen als hier bedoeld vallen alle bedrijven die zich bezig houden met het ontwerpen, adviseren, vervaardigen, installeren, distribueren, repareren van alle techniek in en rondom particuliere woningen, kantoren en industrie. De techniekketen is de omgeving waarin Technisch Installatiebedrijven opereren. Op Trendfiles zoomen we verder in op dit segment.</p>
	</div>
	<div class="block uitgelicht">
		<h2 class="category">uitgelicht</h2>
		<div class="card">
			<a href="/factsheet/leerwerkbanen-rendement/">
				<img src="/wp-content/themes/trendfiles-theme/img/update-factsheet-leerwerkbanen-rendement.svg" alt="UPDATE - Factsheet Leerwerkbanen & Rendement" />
				<h3>UPDATE - Factsheet</h3>
				<h4>Leerwerkbanen & Rendement</h4>
				<p>NL en per provincie<br>juli 2021</p>
			</a>
		</div>
		<div class="card">
			<a href="/video/trendfiles-talks/trendfiles-talks-frank-pot/">
				<img src="/wp-content/themes/trendfiles-theme/img/frank-pot.jpg" alt="Frank Pot" />
				<h3>NIEUW - Trendfiles Talks</h3>
				<h4>Frank Pot</h4>
				<p>Over de noodzaak van het aanbieden van een goede kwaliteit van arbeid en hoe dat te bereiken met sociale innovatie.</p>
			</a>
		</div>
		<div class="card">
			<a href="/factsheet/technische-installatiebranche/">
				<img src="/wp-content/themes/trendfiles-theme/img/update-factsheet-ti-installatie.svg" alt="Update-Factsheet Technische installatie" />
				<h3>UPDATE - Factsheet</h3>
				<h4>Technische installatiebranche</h4>
				<p>NL en per provincie<br>juli 2021</p>
			</a>
		</div>
		<div class="card">
			<a href="https://trendfiles.wij-techniek.nl/wp-content/uploads/instroom-vanuit-het-onderwijs-in-de-ti.pdf">
				<img src="/wp-content/themes/trendfiles-theme/img/instroom-vanuit-het-onderwijs-in-de-ti.png" alt="Instroom vanuit het onderwijs in de TI" />
				<h3>Themarapport</h3>
				<h4>Instroom vanuit het onderwijs in de TI</h4>
				<p>Trendanalyse periode 2008-2019</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="/video/trendfiles-talks/trendfiles-talks-rutger-leukfeldt/">
				<img src="/wp-content/themes/trendfiles-theme/img/rutger-leukfeldt.jpg" alt="Rutger Leukfeldt" />
				<h3>NIEUW - Trendfiles Talks</h3>
				<h4>Rutger Leukfeldt</h4>
				<p>Over cybersecurity in het MKB.</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="/video/themafilms/cybersecurity-in-de-praktijk/">
				<img src="/wp-content/themes/trendfiles-theme/img/cybersecurity.jpg" alt="Trendfiles themafilm Cybersecurity" />
				<h3>NIEUW - Trendfiles themafilm</h3>
				<h4>Cybersecurity in de praktijk</h4>
				<p>CS2 (venture Croonwolter&dros) over cybersecurity for control systems en hoe installatiebedrijven te maken krijgen met Cybersecurity.</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="https://trendfiles.wij-techniek.nl/wp-content/uploads/arbeidsmarkt-technische-installatiebranche-2020.pdf">
				<img src="/wp-content/themes/trendfiles-theme/img/arbeidsmarkt-technische-installatiebranche-2020.png" alt="Arbeidsmarkt technische installatiebranche 2020" />
				<h3>Enquête</h3>
				<h4>Arbeidsmarkt technische installatiebranche 2020</h4>
				<p>Uitkomsten van de telefonische en digitale enquête TI-bedrijven medio 2020</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="/video/trendfiles-talks/trendfiles-talks-juliette-walma-van-der-molen/">
				<img src="/wp-content/themes/trendfiles-theme/img/juliette-walma-van-der-molen.jpg" alt="Juliette Walma van der Molen" />
				<h3>NIEUW-Trendfiles Talks</h3>
				<h4>Juliette Walma van der Molen</h4>
				<p>Over leven lang leren en het belang van beeldvorming technische bedrijven.</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="/downloads-en-links/">
				<img src="/wp-content/themes/trendfiles-theme/img/scenario-2040.jpg" alt="Scenario 2040" />
				<h3>Publicatie</h3>
				<h4>Scenario 2040</h4>
				<p>Blik op 2040 vanuit de Technische Sector</p>
			</a>
		</div>
		<div class="card" style="display:none;">
			<a href="/downloads-en-links/">
				<img src="/wp-content/themes/trendfiles-theme/img/werkplekleren-in-de-techniek.png" alt="Werkplekleren in de techniek" />
				<h3>Publicatie</h3>
				<h4>Werkplekleren in de techniek</h4>
				<p>Over wat werkgevers en werknemers kunnen doen om het effect van werkplekleren te vergroten.</p>
			</a>
		</div>
	</div>
	<div class="block infographic">
		<div class="svg-wrap">
			<?php echo file_get_contents( $protocol . $host . '/wp-content/themes/trendfiles-theme/img/techniekketen-home.svg'); ?>
		</div>
		<p class="meer-button" style="text-align: center; width: 100%; position: relative; right: 4%;"><a href="/kerngegevens/">Technische Installatiebranche</a></p>
	</div>
</div>

<div class="row flex">
	<div class="col">
		<div class="block">
			<a href="/type/video/" class="category videos">Video's</a>
			<p style="width: 100%"><strong>Binnen alle video's kun je zoeken naar quotes op onderwerpen</strong></p>
			<div class="video-listing">
				<?php
					$video_cats = array(102,103); // 104 tijdelijk verwijderd
					foreach ($video_cats as $video_cat) {
						if ($video_cat === 102 ) {
							$numberposts = 2;
						} else {
							$numberposts = 1;
						}
						$video_args = array(
							'cat' => $video_cat,
							'numberposts' => $numberposts,
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

							$terms = get_the_terms( get_the_ID(), 'rubriek' );
							if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
								echo '</a>';
								foreach ($terms as $term) {
									echo '<p class="meer-button"><a href="' . esc_url( get_term_link($term->slug, 'rubriek')) .'">'.$term->name.'</a></p>';
								}
								echo '</div>';
							}

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