<?php
/**
 * Template Name: Kerngegevens
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<div class="row">
		<div class="col">
			<header class="block header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
		</div>
	</div>
	<div class="row">
		<div class="col one-third">
			<div class="block entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col one-third">
			<div class="block entry-content">
				<ul class="kerngegevens-knoppen">
					<li class="bedrijven"><a href="/kerngegevens/bedrijven/">Bedrijven</a></li>
					<li class="omzet-en-werkvoorraad"><a href="/kerngegevens/omzet-en-werkvoorraad/">Omzet en werkvoorraad</a></li>
					<li class="werknemers"><a href="/kerngegevens/werknemers/">Werknemers</a></li>
				</ul>
			</div>
		</div>
		<div class="col one-third">
			<div class="block">
				<ul class="kerngegevens-knoppen">
					<li class="leerlingen"><a href="/kerngegevens/leerlingen/">Leerlingen</a></li>
					<li class="leerwerkbanen"><a href="/kerngegevens/leerwerkbanen/">Leerwerkbanen</a></li>
				</ul>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
