<?php
/**
 * トップページのテンプレート
 */
/*
Template Name: トップページのテンプレート
 */
get_header(); ?>

	<div class="p-index__black">
		<div class="split-slideshow">
			<div class="slideshow">
				<div class="slider">
				<?php if(have_rows('slider')): ?>
				<?php while(have_rows('slider')): the_row(); ?>
				<?php if(get_sub_field('slider_pc')): ?>
					<?php
						$pcId = get_sub_field('slider_pc');
						$pcimg = wp_get_attachment_image_src($pcId);
						$pcAlt = get_post_meta ( get_post ($pcId) -> ID , '_wp_attachment_image_alt' , true );
					?>
					<div class="item"><img src="<?php echo $pcimg[0]; ?>" alt="<?php echo $pcAlt ; ?>"></div>
				<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
				</div>
			</div>
			<div class="slideshow-text">
			<?php if(have_rows('slider')): ?>
			<?php while(have_rows('slider')): the_row(); ?>
			<?php if(get_sub_field('slider_pc')): ?>
				<?php if(get_sub_field('slider_h2')): ?><div class="item"><span><?php the_sub_field('slider_h2'); ?></span><?php if(get_sub_field('slider_h3')): ?><br><?php the_sub_field('slider_h3'); ?><?php endif; ?></div><?php endif; ?>
			<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
			</div>
		</div>

		<!-- <section class="c-section__home swiper p-index__swiper wrapper">
			<div class="swiper-container">
				<div class="swiper-wrapper">
				<?php if(have_rows('slider')): ?>
				<?php while(have_rows('slider')): the_row(); ?>
				<?php if(get_sub_field('slider_pc')): ?>
					<div class="swiper-slide">
						<?php
						$pcId = get_sub_field('slider_pc');
						$pcimg = wp_get_attachment_image_src($pcId);
						$pcAlt = get_post_meta ( get_post ($pcId) -> ID , '_wp_attachment_image_alt' , true );
						?>
						<img src="<?php echo $pcimg[0]; ?>" alt="<?php echo $pcAlt ; ?>">
						<div class="p-index__swiper__text">
							<p><span><?php the_sub_field('slider_h2'); ?><?php if(get_sub_field('slider_h3')): ?></span><br><span><?php the_sub_field('slider_h3'); ?></span><?php endif; ?></p>
							<?php if(get_sub_field('slider_url')): ?><a href="<?php the_sub_field('slider_url'); ?>"><?php endif; ?><?php the_sub_field('slider_txt'); ?><?php if(get_sub_field('slider_url')): ?></a><?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
				<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		</section> -->

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<!-- <div class="c-bnr__main_out"> -->
		<section class="c-section__home c-section__home__ctr  c-bnr c-bnr__clm02 c-bnr__main">
			<ul>
				<li><a href="<?php echo home_url('/ticket'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_lift2.png" alt="早割リフト券 全国送料＆事務手数料無料"></a></li>
				<li><a href="<?php echo home_url('/coupon'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_coupon2.png" alt="割引クーポン プリントしてすぐ利用可能"></a></li>
			</ul>
		</section>
	<!-- </div> -->
<?php else:?>
		<section class="c-section__home c-section__home__ctr  c-bnr c-bnr__clm02 c-bnr__main">
			<ul>
				<li><a href="<?php echo home_url('/en/ticket'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_lift2.png" alt="ADVANCE TICKET No International Shipping Domestic Bank Transfer Only"></a></li>
				<li><a href="<?php echo home_url('/en/coupon'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_coupon2.png" alt="COUPON Available right after printing"></a></li>
			</ul>
		</section>
<?php endif;?>

		<section class="c-section__home c-section__home__ctr c-bnr c-bnr__clm04 c-bnr__slide c-bnr__index01">
			<ul>
			<?php if(have_rows('banner_a')): ?>
			<?php while(have_rows('banner_a')): the_row(); ?>
				<?php
					$bnrAId = get_sub_field('banner_a_img');
					$bnrAimg = wp_get_attachment_image_src($bnrAId);
					$bnrAAlt = get_post_meta ( get_post ($bnrAId) -> ID , '_wp_attachment_image_alt' , true );
					?>
				<li><a <?php if(get_sub_field('banner_a_blank') == 1): ?>target="_blank" <?php else:?><?php endif; ?>  href="<?php the_sub_field('banner_a_url'); ?>"><img src="<?php echo $bnrAimg[0]; ?>" width="<?php echo $bnrAimg[1]; ?>" height="<?php echo $bnrAimg[2]; ?>" alt="<?php echo $bnrAAlt ; ?>"></a></li>
			<?php endwhile; ?>
			<?php endif; ?>
			</ul>
		</section>

		<section class="c-section__home  p-index__news">
			<div class="p-index__news__heading">
				<?php $locale = get_locale(); if($locale == 'ja'):?>
				<h2>NEWS<span>ニュース</span></h2>
				<div class="p-index__news__more"><a href="<?php echo home_url(); ?>/news" class="c-arw">ニュース一覧</a></div>
				<?php else:?>
				<h2>NEWS</h2>
				<div class="p-index__news__more"><a href="<?php echo home_url('/en/news'); ?>" class="c-arw">More</a></div>
				<?php endif;?>
			</div>
			<?php $news_posts = get_posts('post_type=news&posts_per_page=3'); if ( !empty($news_posts) ): ?>
			<div class="p-index__news__post">
				<ul>
				<?php foreach ( $news_posts as $post ): setup_postdata($post); ?>
					<li><span><a href="<?php the_permalink();?>"><dl><dt><?php the_time('Y.m.d') ?></dt><dd><?php the_title(); ?></dd></dl></a></span></li>
				<?php endforeach; wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
				<?php $locale = get_locale(); if($locale == 'ja'):?>
				<div class="p-index__news__more"><a href="<?php echo home_url(); ?>/news" class="c-arw">ニュース一覧</a></div>
				<?php else:?>
				<div class="p-index__news__more"><a href="<?php echo home_url('/en/news'); ?>" class="c-arw">More</a></div>
				<?php endif;?>
			</div>
			<?php $locale = get_locale(); if($locale == 'ja'):?>
			<div class="c-portal">
				<a target="_blank" href="https://www.snownavi.com/wp/">
					<div class="c-portal__wrapper">
						<!-- <div class="c-portal__txt"> -->
							<div class="c-portal__txt__box">
								<div class="c-portal__txt__box__L">
									<img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi">
									<em>情報ポータル</em>
								</div>
								<div class="c-portal__txt__box__R">
									<span class="c-sp">白馬・志賀・野沢・妙高・<br>菅平等のスキー場、ホテル、<br>飲食、観光情報</span>
									<span class="c-pc">白馬・志賀・野沢・妙高・菅平等の<br>スキー場、ホテル、飲食、観光情報</span>
								</div>
							</div>
						<!-- </div> -->
						<!-- <div class="c-portal__img">
							<img src="<?php bloginfo('template_url') ?>/assets/img/index/bg_portal.png" alt="" class="pc"><img src="<?php bloginfo('template_url') ?>/assets/img/index/bg_portal_sp.png" alt="" class="sp">
						</div> -->
					</div>
				</a>
			</div>
			<?php else:?>
			<div class="c-portal">
				<a target="_blank" href="https://www.snownavi.com/wp/en">
					<div class="c-portal__wrapper">
						<div class="c-portal__txt">
							<div class="c-portal__txt__box">
								<img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi">
								<em>Info Portal</em>
								<span class="c-sp">Sightseeing information of the Hakuba, Shiga, Nozawa, Myoko, Sugadaira and more.</span>
								<span class="c-pc">Sightseeing information of the Hakuba, Shiga, Nozawa, Myoko, Sugadaira and more.</span>
							</div>
						</div>
						<!-- <div class="c-portal__img">
							<img src="<?php bloginfo('template_url') ?>/assets/img/index/bg_portal.png" alt="" class="pc"><img src="<?php bloginfo('template_url') ?>/assets/img/index/bg_portal_sp.png" alt="" class="sp">
						</div> -->
					</div>
				</a>
			</div>
			<?php endif;?>
		</section>
	</div>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<section class="p-index__ticket c-gooddeal">
		<h2 class="c-gooddeal__heading"><span>早割チケット券購入</span></h2>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>長野県＆周辺県</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area01"><?php get_template_part('inc/svg/list'); ?><strong>エリア</strong>から選ぶ</a></li>
						<li class="tab"><a href="#map01"><?php get_template_part('inc/svg/pin'); ?><strong>マップ</strong>から選ぶ</a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area01" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
								<?php
								$args = ['id' => '25', 'tax' => 'ticket_cat', 'post' => 'ticket']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map01" class="panel c-tab__area c-gooddeal__map">
						<div id="ticket__map__nagano">
							<?php get_template_part('inc/map/nagano'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>その他のエリア</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area02"><?php get_template_part('inc/svg/list'); ?><strong>エリア</strong>から選ぶ</a></li>
						<li class="tab"><a href="#map02"><?php get_template_part('inc/svg/pin'); ?><strong>マップ</strong>から選ぶ</a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area02" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
								<?php
								$args = ['id' => '27', 'tax' => 'ticket_cat', 'post' => 'ticket']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map02" class="panel c-tab__area c-gooddeal__map">
						<div id="ticket__map__japan">
							<?php get_template_part('inc/map/japan'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else:?>
	<section class="p-index__ticket c-gooddeal">
		<h2 class="c-gooddeal__heading"><span>ADVANCE TICKET</span></h2>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>NAGANO and NEIGHBORING</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area01"><?php get_template_part('inc/svg/list'); ?><strong>AREA</strong></a></li>
						<li class="tab"><a href="#map01"><?php get_template_part('inc/svg/pin'); ?><strong>MAP</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area01" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
								<?php
								$args = ['id' => '231', 'tax' => 'ticket_cat', 'post' => 'ticket']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map01" class="panel c-tab__area c-gooddeal__map">
						<div id="ticket__map__nagano">
							<?php get_template_part('inc/map/nagano_en'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>OTHER</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area02"><?php get_template_part('inc/svg/list'); ?><strong>AREA</strong></a></li>
						<li class="tab"><a href="#map02"><?php get_template_part('inc/svg/pin'); ?><strong>MAP</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area02" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
								<?php
								$args = ['id' => '403', 'tax' => 'ticket_cat', 'post' => 'ticket']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map02" class="panel c-tab__area c-gooddeal__map">
						<div id="ticket__map__japan">
							<?php get_template_part('inc/map/japan_en'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<section class="p-index__coupon c-gooddeal">
		<h2 class="c-gooddeal__heading"><span>割引クーポン</span></h2>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>長野県＆周辺県</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area03"><?php get_template_part('inc/svg/list'); ?><strong>エリア</strong>から選ぶ</a></li>
						<li class="tab"><a href="#map03"><?php get_template_part('inc/svg/pin'); ?><strong>マップ</strong>から選ぶ</a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area03" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
							<?php
								$args = ['id' => '504', 'tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map03" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__nagano">
							<?php get_template_part('inc/map/nagano'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>その他のエリア</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area04"><?php get_template_part('inc/svg/list'); ?><strong>エリア</strong>から選ぶ</a></li>
						<li class="tab"><a href="#map04"><?php get_template_part('inc/svg/pin'); ?><strong>マップ</strong>から選ぶ</a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area04" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
							<?php
								$args = ['id' => '516', 'tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map04" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__japan">
							<?php get_template_part('inc/map/japan'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else:?>
	<section class="p-index__coupon c-gooddeal">
		<h2 class="c-gooddeal__heading"><span>COUPON</span></h2>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>NAGANO and NEIGHBORING</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area03"><?php get_template_part('inc/svg/list'); ?><strong>AREA</strong></a></li>
						<li class="tab"><a href="#map03"><?php get_template_part('inc/svg/pin'); ?><strong>MAP</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area03" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
							<?php
								$args = ['id' => '846', 'tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map03" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__nagano">
							<?php get_template_part('inc/map/nagano_en'); ?>
						</div>
					</div>
				</div>
			</div>

			<div class="c-gooddeal__box">
				<div class="c-gooddeal__head">
					<h3>OTHER</h3>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#area04"><?php get_template_part('inc/svg/list'); ?><strong>AREA</strong></a></li>
						<li class="tab"><a href="#map04"><?php get_template_part('inc/svg/pin'); ?><strong>MAP</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="area04" class="panel c-tab__area c-gooddeal__area is-active">
						<div class="c-gooddeal__area__wrapper">
							<div class="c-gooddeal__area__container clearfix">
							<?php
								$args = ['id' => '868', 'tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
								get_template_part('inc/front-list', null, $args);
								?>
							</div>
						</div>
					</div>
					<div id="map04" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__japan">
							<?php get_template_part('inc/map/japan_en'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<section class="c-section__home c-section__home__ctr  p-index__affiliated">
		<div class="p-index__affiliated__wrapper c-bnr c-bnr__clm02 ">
			<h2>AFFILIATED FACILITIES<span>提携施設優待</span></h2>
			<ul>
				<li><a href="./hotel-voucher">
					<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_ticket.jpg" alt="">
					<p>ご宿泊割引券<span>もれなく1,000円分の<br class="c-pc">ご宿泊割引券をプレゼント</span></p>
				</a></li>
				<li><a href="./shop-voucher">
					<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_coupon.jpg" alt="">
					<p>ショップ割引券<span>もれなく500円分の<br class="c-pc">ショップ割引券をプレゼント</span></p>
				</a></li>
			</ul>
		</div>
	</section>
<?php else:?>
	<section class="c-section__home c-section__home__ctr  p-index__affiliated">
		<div class="p-index__affiliated__wrapper c-bnr c-bnr__clm02 ">
			<h2>AFFILIATED FACILITIES</h2>
			<ul>
				<li><a href="./hotel-voucher">
					<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_ticket.jpg" alt="">
					<p>Accommodation Discount Coupon<span>You can get the accommodation discount coupon for JPY1, 000 off the price</span></p>
				</a></li>
				<li><a href="./shop-voucher">
					<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_coupon.jpg" alt="">
					<p>Shop & Restaurant Discount Coupon<span>You can get the shop discount coupon for JPY500 off the price</span></p>
				</a></li>
			</ul>
		</div>
	</section>
<?php endif;?>


<?php get_footer(); ?>