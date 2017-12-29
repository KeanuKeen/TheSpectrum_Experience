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
				'style' 				=> '',
				'hide_title_if_empty' 	=> false,
				'taxonomy' 				=> 'category'
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

<section id="cntr-editors_pick" class="series-col u-constraint--main">
	<div ID="cntr-editors_pick-head" class="o-div_cta -head--inline -head--styled">
		<div class="series-col c-div_cta-head">
			<div class="u-h1 v-head">
				<span>Editor’s pick</span>
			</div>
		</div>
		<div class="u-center u-parent-width series-row">
			<div class="c-div_cta-divider"></div>
			<div class="c-div_cta-cta u-div_cta-cta--main">MORE ></div>
		</div>
	</div>
	<div id="cntr-editors_pick-entry" class="series-row u--trim-padding-by_col-2 u-padding-5 u-wrap u-start_left">
		<?php 

			$args = array(
				'posts_per_page'	=> '-1',
			);

			$the_query = new WP_Query($args);

			if( $the_query -> have_posts() ):
				while( $the_query -> have_posts() ): $the_query -> the_post();
					
					$is_picked = get_field('editors_pick');
					
					if($is_picked):
						get_template_part( 'template-parts/content', 'editors' );
					endif; 

				endwhile;
			endif;

		?>
	</div>
</section>

<h2>Upcoming</h2>

<section id="cntr-upcoming" class="series-col u-center v-dark">
	<div class="series-col u-center o-section-head--center u-section-head--center u-constraint--main">
		<div class="series-col u-center u-parent-width">
			<div class="c-section-head-sub">Upcoming this</div>
			<div class="c-section-head-header">week</div>
			<div class="series-row o-divider--three u-parent-width">
				<div class="u-parent-width u-divider--outer"></div>
				<div class="u-divider--inner c-natural_form-under"></div>
				<div class="u-parent-width u-divider--outer"></div>
			</div>
		</div>
	</div>
	<div id="cntr-upcoming-entry" class="series-col u-parent-width u-center">
	
	</div>

</section>

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