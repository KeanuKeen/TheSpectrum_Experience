<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

<div class="o--equalized">
	<div class="o-entry_post--compact series-col">
		<div class="c-entry_post-thumb v-thumb-prev">
			<?php
				if( has_post_thumbnail() ):
					the_post_thumbnail();
			 endif; ?>
		</div>
		<div class="o-entry_post-info series-col">
			<div class="c-entry_post-head">
				<div class="c-entry_post-head-title v-head">
					<?php the_title() ?>
				</div>
			</div>
			<div class="c-entry_post-desc">
				<?php the_excerpt() ?>
			</div>
			<div class="c-entry_post-footer-inv u-col-flush_bottom">
				<div class="c-entry_post-datepub">
					<?php echo ts_entry_posted_meta() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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

			<?php endif; ?>

		<div class="entry-exceprt">
			C
		</div>

	</div>

</article> -->