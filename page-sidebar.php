<?php
/**
 * Template Name: Sidebar
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
		<div class="col two-thirds">
			<div class="block entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col one-third">
			<div class="block entry-content">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar')) : endif; ?>
				<?php if ( has_post_thumbnail() ) { ?>
				<div class="figure">
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
					<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>