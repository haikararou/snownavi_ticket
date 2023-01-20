<div class="c-sidebar">
  <?php get_cpt_calendar('news'); ?>
  <?php
    $args = array(
    'post_type'=>'news',
    'type'             => 'monthly',
    'format'           => 'option',
    'show_post_count'  => '1',
    );
  ?>
  <div class="c-sidebar__monthly c-sidebar__box">
    <div class="c-select">
      <select onchange="document.location.href=this.options[this.selectedIndex].value;" class="select-blog-month">
      <?php $locale = get_locale(); if($locale == 'ja'):?>
      <option value="">月年月を選択</option>
      <?php else:?>
      <option value="">Select month</option>
      <?php endif;?>
      <?php wp_get_archives($args); ?>
      </select>
    </div>
  </div>
</div>