<?php get_header(); ?>

<div class="row main" id="equalheight">
<?php 

if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Intro')) : endif;

$cat_args = array(
	'orderby' => 'id', // kan ook name zijn
	'order' => 'DESC',
	'child_of' => 0,
	'include' => '11,8,12,13,15'
);
$categories = get_categories($cat_args); 

foreach($categories as $category) { 
	$post_args = array(
		'numberposts' => 1,
		'category' => $category->term_id 
	);

	$posts = get_posts($post_args);

	foreach($posts as $post) {
		get_template_part( 'content', get_post_format() );
	}

}
?>

</div>

<?php get_footer(); ?>