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

			<label>
				Zoek onderwerp: 
				<?php $onderwerpen = get_terms( array(
					'taxonomy' => 'onderwerp',
					'hide_empty' => true,
				) ); ?>
				<select id="onderwerp">
					<option value="">Selecteer Onderwerp</option>
					<?php foreach ( $onderwerpen as $onderwerp ) {
						echo '<option value="' . $onderwerp -> term_id .'">' . $onderwerp -> name . '</option>';
					} ?>
				</select>
			</label>

			<label>
				Zoek persoon: 
				<?php $personen = get_terms( array(
					'taxonomy' => 'persoon',
					'hide_empty' => true,
				) ); ?>
				<select id="persoon">
					<option value="">Selecteer Persoon</option>
					<?php foreach ( $personen as $persoon ) {
						echo '<option value="' . $persoon -> term_id .'">' . $persoon -> name . '</option>';
					} ?>
				</select>
			</label>

			<input type="submit" id="submit" value="Zoek">

		</div>
	</div>
</div>

<div class="row">
	<div class="scroll">

	</div>
</div>

<?php
$args = array(
	'post_status' => 'publish',
	'post_type' => array( 'post' ),
	'order' => 'DESC',

	'tax_query' => array(
		array(
			'taxonomy' => 'rubriek',
			'field'    => 'slug',
			'terms'    => 'trendfiles-talks',
		),
	),
);
$query_talks = new WP_Query($args);

if ( $query_talks -> have_posts() ) { ?>
	<div class="row">
		<div class="col">
			<div class="block" style="padding-left: 0; padding-right: 0;">
				<a class="category" href="/rubriek/trendfiles-talks/">Trendfiles Talks</a>
			</div>
		</div>
	</div>
	<div class="row main" id="equalheight">
	<?php
		while( $query_talks->have_posts() ): $query_talks->the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>
	</div>
<?php } ?>

<?php
$args = array(
	'post_status' => 'publish',
	'post_type' => array( 'post' ),
	'order' => 'DESC',

	'tax_query' => array(
		array(
			'taxonomy' => 'rubriek',
			'field'    => 'slug',
			'terms'    => 'themafilms',
		),
	),
);
$query_themafilms = new WP_Query($args);

if ( $query_themafilms -> have_posts() ) { ?>
	<div class="row">
		<div class="col">
			<div class="block" style="padding-left: 0; padding-right: 0;">
				<a class="category" href="/rubriek/themafilms/">Themafilms</a>
			</div>
		</div>
	</div>
	<div class="row main" id="equalheight">
	<?php
		while( $query_themafilms->have_posts() ): $query_themafilms->the_post();
			get_template_part( 'content', get_post_format() );
		endwhile; ?>
	</div>
<?php } ?>

<?php get_footer(); ?>