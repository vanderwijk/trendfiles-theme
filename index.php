<?php get_header(); ?>

<div class="row main" id="equalheight">
<?php if ( have_posts() ) : ?>
	<?php while( have_posts() ): the_post(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>
	<?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_footer(); ?>