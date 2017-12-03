<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="enty-header">
		
		<h3 class="entry-title">
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h3>

		<div class="entry-meta">	
			<?php echo ts_entry_posted_meta() ?>
		</div>

	</header>

	<div class="entry-content">
		
		<?php 

			if( has_post_thumbnail() ): ?>
				
				<div class="standard-thumb">
					<?php the_post_thumbnail(); ?>
				</div>	

			<?php endif;
		?>

		<div class="entry-exceprt">
			<?php the_excerpt() ?>
		</div>

	</div>

</article>