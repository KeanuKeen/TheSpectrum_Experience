<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

<!-- <div class="o--equalized">
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
</div> -->


	

<div class="o--equalized">
	<div class="timeline-compact u-parent-width o-row--timeline u-timeline-entry--right">
		<div class="u-parent-width u-timeline-entry-head--right">
			<div class="v-timeline-entry-head">
				<div class="u-timeline-entry-head-text">
					<?php the_title() ?>
				</div>
				<div class="c-entry-tag">
					<div class="relative-cntr series-row --equalize-margin">
						<div class="c-tag">Campus Activity</div>
						<div class=" c-tag">Investigative</div>
					</div>
				</div>
			</div>
		</div>
		<div class="c-timeline--ts_thumb series-row u-start_left">
			<div class="v-thumb-prev v-timeline-thumb u-timeline--ts_thumb">
				 <?php 
					if( has_post_thumbnail() ):
						the_post_thumbnail();
					endif;
				 ?>
			</div>
		</div>
		<div class="rpsv-desc">
			<div class="v-timeline-entry-desc">
				<?php the_excerpt() ?>
			</div>
		</div>
		<div class="series-row c-timeline-foot">
			<div class="c-timeline_cta-divider"></div>
			<div class="c-timeline_cta-text">View Activity</div>
		</div>
		<div class="pusher"></div>
	</div>
</div>
	
	

