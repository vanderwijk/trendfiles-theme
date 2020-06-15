<?php
/**
 * The Template for displaying all single video posts
 *
 * @package WordPress
 * @subpackage Wij Techniek
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
			<div class="intro">
				<?php the_excerpt(); ?>
			</div>
			<?php $quotes = get_posts(array(
				'post_type' => 'quote',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => 'video',
						'value' => get_the_ID(),
						'compare' => '=',
					)
				)
			)); ?>
			<?php if ( $quotes ) { ?>
			<div class="quotes">
				<h2>Quotes</h2>
				<ul>
				<?php foreach( $quotes as $quote ): ?>
				<?php $tijdcode = get_field( 'tijdcode', $quote->ID ); ?>
					<li>
						<a href="<?php echo get_permalink( $quote -> ID ); ?>" data-fancybox data-type="iframe" data-src="<?php echo get_permalink( $quote -> ID ); ?>">
							<?php echo get_the_title( $quote -> ID ); ?>
						</a> (<?php echo $tijdcode; ?>)
					</li>
				<?php endforeach; ?>
				<ul>
			</div>
			<?php } ?>
		</div>
	</div>
	<div class="col two-thirds">
		<div class="block entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</div>