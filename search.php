<?php
/**
 * Template Name: Search Page
 */

get_header(); ?>

<div class="row main">
	<div class="col">
		<div class="block">

			<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search">
				<p><input type="text" name="s" placeholder="Zoeken" value="<?php echo get_query_var( 's' ) ?>"> <input type="submit" alt="Zoeken" value="&#xf179"></p>
				<p><strong>Filteren op:</strong></p>
					<?php $args = array(
						'show_option_all'    => 'Alles',
						'show_option_none'   => '',
						'orderby'            => 'ID', 
						'order'              => 'ASC',
						'show_count'         => 0,
						'hide_empty'         => 1, 
						'child_of'           => 0,
						'exclude'            => '1,19,21',
						'echo'               => 1,
						'selected'           => get_query_var( 'cat' ),
						'hierarchical'       => 0, 
						'name'               => 'cat',
						'id'                 => '',
						'class'              => 'postform',
						'depth'              => 0,
						'tab_index'          => 0,
						'taxonomy'           => 'category',
						'hide_if_empty'      => false,
					); ?>
				<p><label>Thema's</label> <?php wp_dropdown_categories( $args ); ?></p>
				<p><label>Soort content</label>
					<select id="post_format" class="postform" name="post_format">
						<option value="">Alles</option>
						<option value="post-format-image" <?php if ( get_query_var( 'post_format' ) == 'post-format-image' ) { echo 'selected="selected"'; } ?>>Artikel</option>
						<option value="post-format-video" <?php if ( get_query_var( 'post_format' ) == 'post-format-video' ) { echo 'selected="selected"'; } ?>>Video</option>
						<option value="post-format-quote" <?php if ( get_query_var( 'post_format' ) == 'post-format-quote' ) { echo 'selected="selected"'; } ?>>Interview</option>
						<option value="post-format-aside" <?php if ( get_query_var( 'post_format' ) == 'post-format-aside' ) { echo 'selected="selected"'; } ?>>Column</option>
					</select>
				</p>
			</form>

			<script>
			jQuery(document).ready(function($) {
				$(".postform").change(function() {
					$("#searchform").submit();
				});
			});
			</script>

		</div>
	</div>
</div>

<?php if ( strlen( trim(get_search_query()) ) != 0 ) : ?>

<?php if ( have_posts() ) : ?>

	<div id="equalheight" class="row main">
		<?php 
			while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile;
		?>
	</div>

<?php else : ?>

	<div class="row">
		<div class="col">
			<div class="block no-results not-found">
	
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Niets Gevonden', 'OTIB' ); ?></h1>
				</header>
	
				<div class="entry-content">
					<p><?php _e( 'Sorry, er zijn geen resultaten gevonden voor deze zoekopdracht. Probeer het opnieuw met andere zoekwoorden.', 'OTIB' ); ?></p>
				</div>

			</div>
		</div>
	</div>

<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>