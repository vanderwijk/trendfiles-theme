<?php get_header(); ?>

<div class="row">
	<div class="col">
		<div class="block" style="padding-left: 0; padding-right: 0;">
			<?php
				$category_id = get_query_var( 'cat' );
				$category_link = get_category_link( $category_id );
				$category_name = get_cat_name ( $category_id );
				if( $category_id ) {
					echo '<a href="' . esc_url( $category_link ) . '" title="' . $category_name . '" class="category">' . $category_name . '</a>';
				}
			?>
		</div>
	</div>
</div>

<div class="row main" id="equalheight">
<?php 
	if ( have_posts() ) :
		while( have_posts() ): the_post();
			get_template_part( 'content', get_post_format() );
		endwhile;
	endif;
?>
</div>

<?php get_footer(); ?>