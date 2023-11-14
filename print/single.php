<?php
/**
 * 記事ページのテンプレート
 */
get_header(); ?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<section class="p-index__coupon c-gooddeal">
		<h1 class="c-gooddeal__heading"><span>割引クーポン入手</span></h1>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box ">
				<article class="c-article">
					<h2 class="coupon_title"><?php the_title(); ?></h2>
					<div class="coupon_img">
						<?php if(have_rows('coupon_img')): ?>
						<?php while(have_rows('coupon_img')): the_row(); ?>
						<figure><img src="<?php the_sub_field('img'); ?>" alr=""></figure>
						<?php endwhile; ?>
						<a href="javascript:void(0)" onclick="window.print();return false;" class="print"><span>クーポンを印刷する</span></a>
						<?php endif; ?>
					</div>
					<div class="c-article__body">
						<?php get_template_part('inc/template'); ?>
					</div>
				</article>
			</div>
		</div>
	</section>
<?php else:?>
	<section class="p-index__coupon c-gooddeal">
		<h1 class="c-gooddeal__heading"><span>COUPON</span></h1>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box ">
				<article class="c-article">
					<h2 class="coupon_title"><?php the_title(); ?></h2>
					<div class="coupon_img">
						<?php if(have_rows('coupon_img')): ?>
						<?php while(have_rows('coupon_img')): the_row(); ?>
						<figure><img src="<?php the_sub_field('img'); ?>" alr=""></figure>
						<?php endwhile; ?>
						<a href="javascript:void(0)" onclick="window.print();return false;" class="print"><span>PRINT</span></a>
						<?php endif; ?>
					</div>
					<div class="c-article__body">
						<?php get_template_part('inc/template'); ?>
					</div>
				</article>
			</div>
		</div>
	</section>
<?php endif;?>
<?php get_footer(); ?>


<style>
@media print {
	.l-header__pcnav,
	.l-header__hamburger,
	.l-header__nav,
	footer {
		display: none;
	}
	.c-gooddeal__wrapper {
		padding: 0;
		margin: 0 auto;
		width: 90%;
	}
	.c-gooddeal__box {
		margin: 0 auto;
	}
	.c-main {
		padding: 1rem 0;
		background: none;
	}
	.c-gooddeal {
		padding: 0;
	}
	.l-header__sitelogo a p {
		display: none;
	}
	.l-header__sitelogo {
		margin: 0 auto;
		width: auto;
	}
	.l-header__sitelogo a {
		max-width: 200px;
	}
	body {
		background: #fff;
	}
	.print {
		display: none;
	}
	.coupon_title {
		color: #000;
	}
}
</style>
