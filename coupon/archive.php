<?php get_header(); ?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<section class="p-index__coupon c-gooddeal">
		<h1 class="c-gooddeal__heading"><span>割引クーポン入手</span></h1>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box  c-gooddeal__box__map">
				<div class="c-gooddeal__head">
					<h2>マップから選ぶ</h2>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#map-nagano"><strong>長野県＆周辺県</strong></a></li>
						<li class="tab"><a href="#map-other"><strong>その他のエリア</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="map-nagano" class="panel c-tab__area c-gooddeal__area is-active">
						<div id="coupon__map__nagano">
							<?php get_template_part('inc/map/coupon_nagano'); ?>
						</div>
					</div>
					<div id="map-other" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__japan">
							<?php get_template_part('inc/map/coupon_japan'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="c-gooddeal__box  c-gooddeal__box__area c-slinky">
				<div class="c-gooddeal__head">
					<h2>エリアから選ぶ</h2>
				</div>
				<div id="menu">
					<ul class="hierarchy_01">
						<?php
						$args = ['tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('inc/hierarchical', null, $args);
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php else:?>
	<section class="p-index__coupon c-gooddeal">
		<h1 class="c-gooddeal__heading"><span>COUPON</span></h1>
		<div class="c-gooddeal__wrapper">
			<div class="c-gooddeal__box  c-gooddeal__box__map">
				<div class="c-gooddeal__head">
					<h2>Choose from Map</h2>
					<ul class="c-tabs">
						<li class="tab is-active"><a href="#map-nagano"><strong>NAGANO and NEIGHBORING</strong></a></li>
						<li class="tab"><a href="#map-other"><strong>OTHER</strong></a></li>
					</ul>
				</div>
				<div class="c-panels">
					<div id="map-nagano" class="panel c-tab__area c-gooddeal__area is-active">
						<div id="coupon__map__nagano">
							<?php get_template_part('inc/map/coupon_nagano_en'); ?>
						</div>
					</div>
					<div id="map-other" class="panel c-tab__area c-gooddeal__map">
						<div id="coupon__map__japan">
							<?php get_template_part('inc/map/coupon_japan_en'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="c-gooddeal__box  c-gooddeal__box__area c-slinky">
				<div class="c-gooddeal__head">
					<h2>Choose from Area</h2>
				</div>
				<div id="menu">
					<ul class="hierarchy_01">
						<?php
						$args = ['tax' => 'coupon_cat', 'post' => 'coupon']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('inc/hierarchical', null, $args);
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>
<?php endif;?>



<?php get_footer(); ?>

