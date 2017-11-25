<?php get_header(); ?>

<h3>Featured</h3>

<?php 

	$args = array(
		// 'category__and' => 'category', 
        'posts_per_page' => -1 //get all posts
	);

	$the_query = new WP_Query( $args );

	if( $the_query -> have_posts() ):
		while( $the_query -> have_posts() ): $the_query -> the_post();
			if( get_field( "hero_post" ) ):
				_e('<br>', 'textdomain');
				the_title();
				?><p><?php the_content();  ?></p><?php
				the_category();
				_e('----<br><br>', 'textdomain');
			endif;
		endwhile;
	endif;

 ?>

<h3>Categories</h3>

<?php wp_list_categories( array('hide_title_if_empty' => false) ); ?>

<?php get_footer(); ?>