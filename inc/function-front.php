<?php

/*

@package TheSpectrum_Experience

===================
     THEME PAGE
===================

*/ 

// Admin

function ts_theme_setup(){

	add_theme_support( 'menus' );
	register_nav_menu( 'primary', 'Primary Site Navigation' );

}

add_action( 'init', 'ts_theme_setup' );

// #Front-End

// Modular category posts
function ts_get_category_posts( $cat_id, $no_of_post, array $class = array() ){

	$class = array(
		'title' => 'title_class',
		'body' => 'body_class',
		'category' => 'cat_class'
	);

	$args = array(
		'cat' => $cat_id, 
        'posts_per_page' => $no_of_post //get all posts
	);

	$the_query = new WP_Query( $args );

	if( $the_query -> have_posts() ):
		while( $the_query -> have_posts() ): $the_query -> the_post();

			 get_template_part( 'template-parts/content', get_post_format() ); 

		endwhile;
	endif;

}
