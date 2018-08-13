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
		<?php
			$video = get_field( 'video' );
			$video_id = get_field( 'video_id' );
			$tijdcode = get_field( 'tijdcode' );
		?>
		<div style="padding:56.25% 0 0 0;position:relative;">
			<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?autoplay=1#t=<?php echo $tijdcode; ?>&amp;title=0&amp;byline=0&amp;portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
		<div class="row">
			<div class="col">
				<div class="block entry-content">
					<h1><?php echo $video->post_title; ?></h1>
					<?php the_content(); ?>
					<?php get_template_part( 'module-sharing', get_post_format() ); ?>
				<div>
			</div>
		</div>
		<script src="https://player.vimeo.com/api/player.js"></script>
	<?php endwhile; // end of the loop. ?>
</article>

<?php get_footer(); ?>