<?php get_header(); ?>

<section id="cntr-hero" class="u-single">
	<div id="hero-thumb" class="c-thumb--main v-thumb-prev">
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
						_e('<br><br>', 'textdomain');
					endif;
				endwhile;
			endif;

		?>
	</div>
</section>

<section id="cntr-category" class="series-col u-constraint--main">
	<div id="cntr-category-table" class="series-col --equalize-border u-center">
		<div class="series-row u-center --equalize-border --row-trim-padding-upper table--category">
			<?php 
				$args = array(
					'style' 		=> '',
					'hide_title_if_empty' => false,
					'taxonomy' => 'category'
				);

				$categories = get_categories($args);

				foreach ($categories as $category ) {
					$cat_menu = '<div class="o-custom-cat u-center"><div class="c-custom-cat-title">'
						. $category->name . '</div></div>';
					echo $cat_menu;
				}

			?>

		</div>
	</div>
	<div class="series-col --equalize-margin">
		<?php 
			$args = array(
				'style' 		=> '',
				'hide_title_if_empty' => false,
				'taxonomy' => 'category'
			);	

			$categories = get_categories($args);

			foreach ($categories as $category ) {
				
				$cat_head = '
					<div class="category-head">
						<div class="o-div_cta">
							<div class="c-div_cta-head v-head">';
				$cat_head .= $category->name;
				$cat_head .= '
						</div>
						<div class="c-div_cta-foot u-center series-row">
							<div class="c-div_cta-divider"></div>
							<div class="c-div_cta-cta u-div_cta-cta--main">MORE ></div>
							</div>
						</div>
					</div>';

				$cat_body_head = '<div class="series-row u--trim-padding-by_col-2 u-padding-1 u-wrap u-start_left">';
				
				$cat_body_foot = '</div>';

				echo $cat_head;
				echo $cat_body_head;
				ts_get_category_posts($category->cat_ID.'', '-1');
				echo $cat_body_foot;
			}

		?>
		
			
		</div>
	
</section>

<h4>Featured</h4>
<?php  ?>

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
				
				<div class="<?php echo 'title' ?>"><a href="<?php get_permalink() ?>"><?php the_title(); ?></a></div>
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
					
					<div class="<?php echo 'title' ?>"><a href="<?php get_permalink() ?>"><?php the_title(); ?></a></div>
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
	<span>Load More</span>
</div>

<?php get_footer(); ?>