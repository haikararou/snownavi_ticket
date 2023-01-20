<?php
/*
Template Name: マップ
 */
get_header(); ?>

<div class="c-main__wrapper">

<section class="c-section p-map">
  <?php if(get_field('lead_access')): ?>
	<h1>MAP<span>エリアマップ</span></h1>
  <?php else:?>
  <h1>MAP</h1>
  <?php endif;?>
  <div class="p-index__map__tab p-map__nav">

    <?php if(have_rows('map')): ?>
    <div class="p-map__nav__button-outer">
      <ul id="p-map__nav__button">
    <?php while(have_rows('map')): the_row(); ?>
        <li><a href="#<?php the_sub_field('map_slag'); ?>"><?php the_sub_field('map_title'); ?></a></li>
    <?php endwhile; ?>
      </ul>
    </div>
    <?php endif; ?>
    <?php if(have_rows('map')): ?>
    <div class="c-select p-map__nav__select-outer">
      <select id="p-map__nav__select">
    <?php while(have_rows('map')): the_row(); ?>
        <option value="#<?php the_sub_field('map_slag'); ?>"><?php the_sub_field('map_title'); ?></option>
    <?php endwhile; ?>
      </select>
    </div>
    <?php endif; ?>

    <?php if(have_rows('map')): ?>
    <?php while(have_rows('map')): the_row(); ?>
    <div id="<?php the_sub_field('map_slag'); ?>" class="p-map__info p-map__nav__contents">
      <div class="c-ggmap">
        <iframe src="<?php the_sub_field('map_iframe'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <?php if(have_rows('map_access')): ?>
      <div class="p-map__info__txt">
        <?php if(get_field('lead_access')): ?>
        <h2>アクセス</h2>
        <?php else:?>
        <h2>Access</h2>
        <?php endif;?>
        <dl>
        <?php while(have_rows('map_access')): the_row(); ?>
          <dt><?php the_sub_field('map_access_title'); ?></dt><dd><?php the_sub_field('map_access_txt'); ?></dd>
        <?php endwhile; ?>
        </dl>
      </div>
      <?php endif; ?>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>

  </div>
</section>

</div>

<?php get_footer(); ?>

