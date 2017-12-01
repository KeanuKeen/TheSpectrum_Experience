<?php

/*

@package TheSpectrum_Experience

=================================
     AJAX FUNCTIONS
=================================

*/ 

add_action( 'wp_ajax_nopriv_ts_load_more', 'ts_load_more');
add_action( 'wp_ajax_ts_load_more', 'ts_load_more' );

function ts_load_more(){

	$paged = $_POST["page"] + 1;

	$query = new WP_Query( array(

		'post_type' 		=> 'post',
		'paged' 			=> $paged,
		'order'				=> 'DESC',
		'posts_per_page' 	=> 1 //get all posts

	) );

	if( $query -> have_posts() ):
		while( $query -> have_posts() ): $query -> the_post();
			
				_e('<br>', 'textdomain'); ?>
				
				<div class="<?php echo 'title' ?>"><?php the_title(); ?></div>
				<div class="<?php echo 'body' ?>"><?php the_content(); ?></div>
				<div class="<?php echo 'category' ?>"><?php the_category(); ?></div>
				<div class="<?php echo 'date' ?>"><?php the_date(); ?></div>

				<?php _e('<br>----<br><br>', 'textdomain');

		endwhile;
	endif;

	wp_reset_postdata();

	die();

}

