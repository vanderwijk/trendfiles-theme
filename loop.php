<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage OTIB
 */ ?>

<div class="row">
	<div class="col">
		<div class="block">
			<?php 
				$category = get_the_category(); 
				if( $category[0] ) {
					echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . $category[0]->cat_name . '" class="category">';
					echo $category[0]->cat_name . ' &raquo;';
					echo '</a>';
				}
			?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col one-third">
		<div class="block">
			<div class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</div>
			<div class="postmeta">
				<span class="date updated"><?php the_modified_date(' j F Y'); ?></span>
				<span class="vcard author">
					<span class="fn"><?php the_author_posts_link(); ?></span>
				</span>
			</div>
			<?php if ( has_post_thumbnail() ) { ?>
			<div class="figure">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-article' ); ?>
				<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
			</div>
			<?php }

			$args = array(
				'post_type' => 'attachment',
				'numberposts' => -1,
				'post_status' => null,
				'post_parent' => $post->ID
			);

			$attachments = get_posts( $args );
			if ( $attachments ) {
				foreach ( $attachments as $attachment ) { ?>
					<div class="figure">
						<?php 
							$image = wp_get_attachment_image_src( $attachment->ID , 'thumb' );
							$lightbox = wp_get_attachment_image_src( $attachment->ID, 'original' );
						?>
						<a class="lightbox" href="<?php echo $lightbox[0]; ?>">
							<img class="thumbnail" src="<?php echo $image[0]; ?>" alt="<?php the_title_attribute(); ?>" />
						</a>
					</div>
					<?php
				}
			} ?>

			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar')) : endif; ?>

		</div>
	</div>
	<div class="col one-third">
		<div class="block entry-content">
			<?php the_content(); ?>
			<?php get_template_part( 'module-sharing', get_post_format() ); ?>
		</div>
	</div>
</div>