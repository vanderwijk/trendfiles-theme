<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Wij Techniek
 */

get_header(); ?>

<article <?php post_class( 'article' ); ?> role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop', get_post_format() ); ?>
	<?php endwhile; // end of the loop. ?>
</article>

<?php get_footer(); ?>