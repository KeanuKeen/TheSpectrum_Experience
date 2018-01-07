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
				'style' 								=> '',
				'hide_title_if_empty' 	=> false,
				'taxonomy' 							=> 'category',
				'post_per_page' 				=> 4,
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

			wp_reset_postdata();

		?>
	</div>
</section>

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
		<?php 

			$today_date = current_time('mysql');
			$post_per_page = 4;
			$paged = 1;


			$args = array(
				'cat' 						=> '7', 
				'orderby'					=> array(
					'meta_value'		=> 'ASC',
				),
				'posts_per_page' 	=> $post_per_page,
				'paged'						=> $paged,
				'meta_query'			=> array(
					array(
						'key'					=> 'event_date',
						'value'				=> "''",
						'type'				=> 'DATETIME',
						'compare'			=> '!='
					),
					array(
						'key'					=> 'event_date',
						'value'				=> $today_date,
						'type'				=> 'DATETIME',
						'compare'			=> '>=',
					),
				),

			);	

			$the_query = new WP_Query( $args );
			$the_query->posts = array_reverse($the_query->posts);

			$post_count_total = $the_query -> found_posts;
			$post_count_page = $the_query -> post_count;
			$n = $post_count_page	;
			$dir_class = null;

			if( $the_query -> have_posts() ):

				while( $the_query -> have_posts() ): $the_query -> the_post();

				$event_date = get_field( 'event_date', false, false );
				$event_date = new DateTime($event_date);
				$event_month =  $event_date->format('m');
				$event_day = $event_date->format('d');
		
					if( $n%2 == 0 ){
						$dir_class = 'right';
					} else{
						$dir_class = 'left';
					}
	
					$n--;

					require(locate_template('template-parts/content-upcoming.php'));

			endwhile;
			endif;

			wp_reset_postdata();
		?>
	</div>

</section>


<div class="ts-posts-container">
<section id="cntr-timeline" class="series-col u-center u-constraint--main">
	<div ID="cntr-editors_pick-head" class="o-div_cta -head--inline -head--styled">
		<div class="series-col c-div_cta-head">
			<div class="u-h1 v-head">
				<span>Timeline</span>
			</div>
		</div>
		<div class="u-center u-parent-width series-row">
			<div class="c-div_cta-divider"></div>
			<div class="c-div_cta-cta u-div_cta-cta--main">MORE ></div>
		</div>
	</div>
	<?php 

		$post_count = 0;
		$dir_class = null;
		$post_per_page = 4;
		$paged = 1;

		$args = array(
			'post_type' 			=> 'post',
			'paged' 					=> $paged,
			'order'						=> 'DESC',
			'posts_per_page' 	=> $post_per_page,
		);

		$the_query = new WP_Query($args);
		$post_count_total = $the_query -> found_posts;
		$post_count_page = $the_query -> post_count;
		$n = $post_count_total - ($paged - 1)*$post_per_page;
		$dir_class = null;

		if( $the_query -> have_posts() ):
			while( $the_query -> have_posts() ): $the_query -> the_post();

				if($post_per_page == -1):
					$post_per_page = 0;
				endif;

				echo $n;

				if( $n%2 == 0 ){
					$dir_class = 'right';
				} else{
					$dir_class = 'left';
				}

				$n--;

				require(locate_template('template-parts/content-timeline.php'));

			endwhile;
		endif;

		wp_reset_postdata();
	
	?>


</section>
</div>
	
	





<div class="btn-load_more" data-page="1" data-url="<?php echo admin_url('admin-ajax.php') ?>">
	<span>Load More</span>
</div>

<?php get_footer(); ?>