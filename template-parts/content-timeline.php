<?php 

/*

@package TheSpectrum_Experience

*/ 

?>

<div class="series-col c-timeline-node--line u-center u-main-timeline-node">
  <div class="u-divider--outer"></div>
  <div class="u-divider--inner series-col ">
    <div class="c-timeline-node series-row">
      <div class="c-timeline-node-dot --right series-row u-center bp">
        <div class="c-timeline-node-meta --date"> Date</div>
        <div class="c-timeline-node-meta --time"> Time </div>
      </div>
    </div>
  </div>
  <div class="u-divider--outer"></div>
</div>

  <?php echo get_the_date(); ?>

<div class="rpsv-timeline u-parent-width u-timeline-entry--<?php echo $dir_class ?>">
  <div class="u-parent-width series-row u-timeline--main-head u-timeline-entry-head--<?php echo $dir_class ?>">
    <div class="v-timeline-entry-head">
      <div class="u-timeline-entry-head-text v-head"><?php the_title() ?></div>
      <div class="v-timeline-entry-desc">
        <?php the_excerpt(); ?>
      </div>
      <div class="c-entry-tag">
        <div class="relative-cntr series-row --equalize-margin">
          <div class="c-tag">Campus Activity</div>
          <div class="c-tag">Investigative</div>
        </div>
      </div>
    </div>
  </div>
  <?php if(has_post_thumbnail() ): ?>
  <div class="c-timeline--ts_thumb v-timeline-thumb u-cover_bg series-row u-start_<?php $dir_class ?>">
    <div class="v-timeline-thumb u-timeline--ts_thumb c-entry_post-thumb" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
  </div>
<?php endif; ?>
  <div class="rpsv-desc">
    <div class="v-timeline-entry-desc"    >
      <?php the_excerpt(); ?>
    </div>
  </div>
  <div class="pusher"></div>
</div>
