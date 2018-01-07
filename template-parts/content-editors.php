<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

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
			<?php if( has_post_thumbnail() ): ?>
			<div class="u-cover_bg v-timeline-thumb ">
				<div class="u-timeline--ts_thumb c-entry_post-thumb" style="background-image: url(<?php the_post_thumbnail_url() ?>)">
			</div>
			<?php endif; ?>
			</div>
		</div>
		<div class="rpsv-desc c-entry_post-desc">
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
	
	

