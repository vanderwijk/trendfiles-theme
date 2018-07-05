<?php get_header(); ?>

<div class="row">
	<div class="col">
		<div class="block searchfilters">
			<script>
			jQuery(document).ready(function($) {
				$(".postform").change(function() {
					$("#searchform").submit();
				});
			});
			</script>

			Zoek onderwerp: 
			<?php $onderwerpen = get_terms( array(
				'taxonomy' => 'onderwerp',
				'hide_empty' => false,
			) ); ?>
			<select>
				<option>Onderwerp</option>
				<?php foreach ( $onderwerpen as $onderwerp ) {
					echo '<option value="' . $onderwerp -> term_id .'">' . $onderwerp -> name . '</option>';
				} ?>
			</select>

			Zoek persoon: 
			<?php $personen = get_terms( array(
				'taxonomy' => 'persoon',
				'hide_empty' => false,
			) ); ?>
			<select>
				<option>Persoon</option>
				<?php foreach ( $personen as $persoon ) {
					echo '<option value="' . $persoon -> term_id .'">' . $persoon -> name . '</option>';
				} ?>
			</select>

			<input type="submit" id="click" value="Zoek">

		</div>
	</div>
</div>

<div class="row" style="overflow:hidden;">
	<div class="scrollwrap">
		<div class="col one-third">
			<div class="block post-2144 post type-post status-publish format-video has-post-thumbnail hentry category-video post_format-post-format-video" style="height: 420px;">
				<a href="https://vimeo.com/231986829#t=0m10s" title="Trendfiles Talks – Henk Volberda" class="lightbox-video article-link">
					<div class="header">
						<h2>Trendfiles Talks – Henk Volberda</h2>
					</div>
					<div class="figure">
						<img class="thumbnail" src="http://trendfiles.otib.local/wp-content/uploads/trendfiles-talks-henk-volberda-01-400x225.jpg" alt="Trendfiles Talks – Henk Volberda">
						<img class="icon-play" src="/wp-content/themes/otib/img/play-circle.svg" alt="Video afspelen">
					</div>
					<div class="intro">
						<p><strong>Quote:</strong></p>
						<p>"Mensen kunnen veel meer dan we denken. De meeste werknemers komen 's ochtends op hun werk, hangen hun talent aan de kapstok en gaan aan het werk!"</p>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="block" style="padding-left: 0; padding-right: 0;">
			<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
			$term_url = get_term_link( $term );
			$term_name = $term -> name; ?>
			<a class="category" href="<?php echo $term_url; ?>"><?php echo $term_name; ?></a>
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