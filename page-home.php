<?php get_header(); ?>

<?php wp_list_categories( array('hide_title_if_empty' => false) ); ?>
<?php 
	
	global $wp_query;

	$args = array(
		// 'category__and' => 'category', 
		'cat' => '3, -5',
        'posts_per_page' => -1 //get all posts
	);

	$posts = get_posts($args);
		foreach ($posts as $post) :
			the_title();
			the_content();
			the_category();
			_e('----<br>', 'textdomain');
	endforeach;

	// query_posts('post_type=post');
	// if( have_posts() ):
	// 	while ( have_posts() ): the_post();
	// 		if( is_category( '3' ) ):
	// 			the_title();
	// 			the_content();
	// 			the_category();
	// 			_e('----<br>', 'textdomain');
	// 		endif;
	// 	endwhile;
	// endif;

	_e('Hello from page-home', 'textdomain');
 ?>

<?php get_footer(); ?>