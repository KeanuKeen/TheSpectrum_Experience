<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

<div class="o--equalized">
	<div class="o-entry_post--compact series-col">
		<?php if( has_post_thumbnail($the_query->ID) ): ?>
		<div class="u-cover_bg --cat">
			<div id="<?php the_ID() ?>" class="c-entry_post-thumb" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
		</div>
		<?php	endif; ?>
		<div class="o-entry_post-info series-col">
			<div class="c-entry_post-head">
				<div class="c-entry_post-head-title v-head">
					<?php the_title() ?>
				</div>
			</div>
			<div class="c-entry_post-desc">
				<?php the_excerpt() ?>
			</div>
			<div class="c-entry_post-footer">
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