<?php get_header(); ?>

<h2>Hero</h3>

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

<h2>Categories</h3>

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
        'posts_per_page' => -1 //get all posts
	);

	$the_query = new WP_Query( $args );

	if( $the_query -> have_posts() ):
		while( $the_query -> have_posts() ): $the_query -> the_post();
			
			$date = get_field( 'event_date' );

			if( $date ):


				_e('<br>', 'textdomain'); ?>

				<div class="<?php echo 'body' ?>"><?php the_content(); ?></div>
				<div class="<?php echo 'category' ?>"><?php the_category(); ?></div>
				<?php echo $date; ?>


				<?php _e('<br>----<br><br>', 'textdomain');

			endif;

		endwhile;
	endif;

?>

<?php get_footer(); ?>