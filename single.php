<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage OTIB
 */

get_header(); ?>

<article <?php post_class( 'article' ); ?> role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'loop', get_post_format() ); ?>
	<?php endwhile; // end of the loop. ?>
</article>

<nav class="post-navigation" role="navigation">
	<?php previous_post_link('%link'); ?> 
	<?php next_post_link('%link'); ?> 
</nav>

<?php get_footer(); ?>