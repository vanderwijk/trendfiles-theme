<?php
/*
Template Name: Sitemap
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
		<div class="col">
			<div class="block entry-content">
				<ul>
					<?php wp_list_pages("title_li=&exclude=" ); ?>
				</ul>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>