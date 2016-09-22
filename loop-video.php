<?php
/**
 * The Template for displaying all single video posts
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
			<div class="intro">
				<?php the_excerpt(); ?>
			</div>
		</div>
	</div>
	<div class="col two-thirds">
		<div class="block entry-content">
			<?php the_content(); ?>
		</div>
	</div>
</div>