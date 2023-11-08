<?php get_header(); ?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<div class="c-main__wrapper">
	<section class="c-section c-page">
		<h1>ショップ割引券について</h1>
		<h2>利用方法</h2>
		<div class="c-page__box">
			<div class="c-page__box__img">
				<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_coupon.jpg" alt="">
			</div>
			<div class="c-page__box__txt">
				<p><strong>もれなく500円分のショップ割引券をプレゼント</strong></p>
				<p>ご注文ごとに、提携ショップ（※当ページ掲載ショップ）で利用できる500円分の金券をプレゼント！</p>
				<ul class="astarisk">
					<li>500円の割引でなく、その他サービスの提供となる店舗もございます。</li>
					<li>当割引券はお1人様につき1枚のご利用とさせていただきます。</li>
					<li>有効期間は2021年12月1日～2022年4月30日です。</li>
					<li>提携ショップは期間途中で追加・変更がございます。ご利用前に最新情報をお確かめください。</li>
				</ul>
				<h3>［ご利用方法］</h3>
				<ol>
					<li>当割引券をご利用の旨、ショップまたはレストランへお伝えください。</li>
					<li>お会計時にご提示ください。（必須）</li>
				</ol>
			</div>
		</div>

		<div class="c-page__wrapepr">
			<ul class="c-tabs">
				<li class="tab is-active"><a href="#shop">提携ショップ</a></li>
				<li class="tab"><a href="#restaurant">提携レストラン</a></li>
			</ul>
			<div class="c-panels">
				<div id="shop" class="panel c-tab__area is-active">
					<?php
						$args = ['id' => '1174', 'tax' => 'shop-voucher_cat', 'post' => 'shop-voucher', 'title' => '提携ショップ']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('shop-voucher/list', null, $args);
					?>
				</div>
				<div id="restaurant" class="panel c-tab__area">
					<?php
						$args = ['id' => '1176', 'tax' => 'shop-voucher_cat', 'post' => 'shop-voucher', 'title' => '提携レストラン']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('shop-voucher/list', null, $args);
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php else:?>
	<div class="c-main__wrapper">
	<section class="c-section c-page">
		<h1>Shop & Restaurant Discount Coupon</h1>
		<h2>How to Use</h2>
		<div class="c-page__box">
			<div class="c-page__box__img">
				<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_coupon.jpg" alt="">
			</div>
			<div class="c-page__box__txt">
				<p><strong>You can get coupon for JPY500 off the price</strong></p>
				<p>A discount coupon is available by the purchase of the advance ticket. You will get JPY500 off discount at the purchase in the following tie-up shops.</p>
				<ul class="astarisk">
					<li>Some shops offer other services than JPY500 off discount.</li>
					<li>The discount shall be available with 1 coupon per person.</li>
					<li>The valid period is from Dec. 1, 2020 to Apr. 30, 2021.</li>
					<li>The list of the tie-up shops will be added or changed during the valid period. Please check on the latest information before using.</li>
				</ul>
				<h3>[How to Use]</h3>
				<ol>
					<li>Please tell the shop that the discount coupon will be used.</li>
					<li>Please present the discount coupon at the casher. (Indispensable)</li>
				</ol>
			</div>
		</div>

		<div class="c-page__wrapepr">
			<ul class="c-tabs">
				<li class="tab is-active"><a href="#shop">Tie-up Shops</a></li>
				<li class="tab"><a href="#restaurant">Tie-up Restaurants</a></li>
			</ul>
			<div class="c-panels">
				<div id="shop" class="panel c-tab__area is-active">
					<?php
						$args = ['id' => '1351', 'tax' => 'shop-voucher_cat', 'post' => 'shop-voucher', 'title' => 'Tie-up Shops']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('shop-voucher/list', null, $args);
					?>
				</div>
				<div id="restaurant" class="panel c-tab__area">
					<?php
						$args = ['id' => '1361', 'tax' => 'shop-voucher_cat', 'post' => 'shop-voucher', 'title' => 'Tie-up Restaurants']; //親タームID・タクソノミー・ポストタイプ
						get_template_part('shop-voucher/list', null, $args);
					?>
				</div>
			</div>
		</div>
	</section>
</div>
<?php endif;?>

<?php get_footer(); ?>