<?php get_header(); ?>


<?php wp_head() ?>

<h2>Hero</h2>

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

<h2>Categories</h2>

<?php wp_list_categories( array('hide_title_if_empty' => false) ); ?>

<h4>Featured</h4>
<?php ts_get_category_posts('5', '-1'); ?>

<h4>Humans of La Salle</h4>
<?php ts_get_category_posts('3', '-1'); ?>

<h4>Uncategorized</h4>
<?php ts_get_category_posts('1', '-1'); ?>

<h2>Upcoming</h2>

<?php 

	$args = array(
		// 'cat' => $cat_id, 
		'meta_key' 			=> 'event_date',
		'meta_type'			=> 'DATETIME',
		'orderby'			=> 'meta_value',
		'order'				=> 'DESC',
        'posts_per_page' 	=> -1//get all posts
	);

	$the_query = new WP_Query( $args );

	if( $the_query -> have_posts() ):
		while( $the_query -> have_posts() ): $the_query -> the_post();
			
			$date = get_field( 'event_date' );

			if( $date ):


				_e('<br>', 'textdomain'); ?>
				
				<div class="<?php echo 'title' ?>"><?php the_title(); ?></div>
				<div class="<?php echo 'body' ?>"><?php the_content(); ?></div>
				<div class="<?php echo 'category' ?>"><?php the_category(); ?></div>
				<?php echo $date; ?>
				<Br>

				<?php _e('<br>----<br><br>', 'textdomain');

			endif;

		endwhile;
	endif;

	wp_reset_postdata();

?>

<h2>Timeline</h2>

<div class="ts-posts-container">
	
	<?php 

		$query = new WP_Query( array(

			'post_type' 		=> 'post',
			'paged' 			=> 1,
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
		

	?>

</div>

<div class="btn-load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php') ?>">
	Load More
</div>

<?php get_footer(); ?>