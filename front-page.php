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
					<?php if(get_sub_field('slider_sp')): ?>
					<div class="item"><picture><source media="(min-width: 1024px)" srcset="<?php the_sub_field('slider_pc'); ?>"><img src="<?php the_sub_field('slider_sp'); ?>" alt="<?php echo $pcAlt ; ?>"></picture></div>
					<?php else:?>
					<div class="item"><img src="<?php the_sub_field('slider_pc'); ?>" alt="<?php echo $pcAlt ; ?>"></div>
					<?php endif; ?>
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

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<!-- <div class="c-bnr__main_out"> -->
		<section class="c-section__home c-section__home__ctr  c-bnr c-bnr__clm02 c-bnr__main">
			<ul>
				<li class="ticket"><a href="<?php echo home_url('/ticket'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_lift2.png" alt="早割リフト券 全国送料＆事務手数料無料"><div>早割リフト券<span>全国送料＆事務手数料無料</span></div></a></li>
				<li class="coupon"><a href="<?php echo home_url('/coupon'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_coupon2.png" alt="割引クーポン プリントしてすぐ利用可能"><div>割引クーポン<span>プリントしてすぐ利用可能</span></div></a></li>
			</ul>
		</section>
	<!-- </div> -->
<?php else:?>
		<section class="c-section__home c-section__home__ctr  c-bnr c-bnr__clm02 c-bnr__main">
			<ul>
				<li class="ticket"><a href="<?php echo home_url('/en/ticket'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_lift2.png" alt="EARLY-BIRD TICKETS Domestic Shipping Only"><div>EARLY-BIRD TICKETS<span>Domestic Shipping Only</span></div></a></li>
				<li class="coupon"><a href="<?php echo home_url('/en/coupon'); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/banner/bottom_coupon2.png" alt="COUPON Available right after printing"><div>COUPON<span>Available right after printing</span></div></a></li>
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
				<div class="p-index__news__more"><a href="<?php echo home_url(); ?>/news" class="c-arw">一覧</a></div>
				<?php else:?>
				<h2>NEWS</h2>
				<div class="p-index__news__more"><a href="<?php echo home_url('/en/news'); ?>" class="c-arw">More</a></div>
				<?php endif;?>
			</div>

			<div class="p-index__news__post">
				<?php $news_posts = get_posts('post_type=news&posts_per_page=3'); if ( !empty($news_posts) ): ?>
				<ul>
				<?php foreach ( $news_posts as $post ): setup_postdata($post); ?>
					<li><span><a href="<?php the_permalink();?>"><dl><dt><?php the_time('Y.m.d') ?></dt><dd><?php the_title(); ?></dd></dl></a></span></li>
				<?php endforeach; wp_reset_postdata(); ?>
				</ul>
				<?php endif; ?>
				<?php $locale = get_locale(); if($locale == 'ja'):?>
				<div class="p-index__news__more"><a href="<?php echo home_url(); ?>/news" class="c-arw">一覧</a></div>
				<?php else:?>
				<div class="p-index__news__more"><a href="<?php echo home_url('/en/news'); ?>" class="c-arw">More</a></div>
				<?php endif;?>
			</div>
			<?php $locale = get_locale(); if($locale == 'ja'):?>
			<div class="c-portal -jp">
				<a target="_blank" href="https://www.snownavi.com/">
					<div class="c-portal__wrapper">
						<div class="c-portal__txt__box">
							<div class="bnr_portal_pc">
								<img src="<?php bloginfo('template_url') ?>/assets/img/common/bnr_portal_pc.jpg" alt="Snoenavi 情報ポータル 白馬・志賀・野沢・妙高・菅平等のスキー場、ホテル、飲食、観光情報">
							</div>
							<div class="bnr_portal_sp">
								<div class="c-portal__txt__box__L">
									<img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi">
									<em>情報ポータル</em>
								</div>
								<div class="c-portal__txt__box__R">
									<span class="c-sp">白馬・志賀・野沢・妙高・<br>菅平等のスキー場、ホテル、<br>飲食、観光情報</span>
									<span class="c-pc">白馬・志賀・野沢・妙高・菅平等の<br>スキー場、ホテル、飲食、観光情報</span>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php else:?>
			<div class="c-portal">
				<a target="_blank" href="https://www.snownavi.com/en">
					<div class="c-portal__wrapper">
						<div class="c-portal__txt__box">
							<div class="c-portal__txt__box__L">
								<img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi">
								<em>WEB PORTAL</em>
							</div>
							<div class="c-portal__txt__box__R">
								<span class="c-sp">Sightseeing information of the Hakuba, Shiga, Nozawa, Myoko, Sugadaira and more.</span>
								<span class="c-pc">Sightseeing information of the Hakuba, Shiga, Nozawa, Myoko, Sugadaira and more.</span>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php endif;?>
		</section>
	</div>

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
					<p>Accommodation <br>Discount Coupon<span>You can get coupon for JPY1, 000 off the price</span></p>
				</a></li>
				<li><a href="./shop-voucher">
					<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_coupon.jpg" alt="">
					<p>Shop & Restaurant Discount Coupon<span>You can get coupon for JPY500 off the price</span></p>
				</a></li>
			</ul>
		</div>
	</section>
<?php endif;?>


<?php get_footer(); ?>