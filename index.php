<?php

/*

@package TheSpectrum_Experience

*/

 get_header(); ?>

<div class="content-area">
	<main class="site-main">
		<div class="container">
			<?php 

				if( have_posts() ):
					while( have_posts() ): the_post();

						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;
				endif;

			?>
		</div>
	</main>
</div> 

<?php get_footer(); ?>

