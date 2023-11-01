<?php
/**
 * フッターテンプレート
 */
?>
</main>

<?php $locale = get_locale(); if($locale == 'ja'):?>
<footer class="l-footer" role="contentinfo">
	<div class="l-footer__inner">
		<nav class="l-footer__nav" role="navigation">
			<ul>
				<li><a href="<?php echo home_url(); ?>">トップ</a></li>
				<li><a href="<?php echo home_url('/en'); ?>">ENGLISH</a></li>
			</ul>
			<ul>
				<li><a href="<?php echo home_url('/ticket'); ?>">LIFT TICKETS</a></li>
				<li><a href="<?php echo home_url('/coupon'); ?>">LIFT COUPONS</a></li>
				<li><a href="<?php echo home_url('/hotel-voucher'); ?>">TIE-UP HOTELS</a></li>
				<li><a href="<?php echo home_url('/shop-voucher'); ?>">TIE-UP SHOPS</a></li>
				<li><a href="<?php echo home_url('/news'); ?>">NEWS</a></li>
			</ul>
			<ul>
				<li><a target="_blank" href="https://www.snownavi.com/wp/contact" class="c-arw">お問い合わせ</a></li>
				<li><a target="_blank" href="https://www.snownavi.com/wp/company">会社案内</a></li>
				<li><a target="_blank" href="https://www.snownavi.com/wp/privacy">プライバシーポリシー</a></li>
			</ul>
		</nav>
		<div class="l-footer__logo">
			<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi"></a>
			<div class="l-footer__add">
				<address>株式会社スノーナビ<br>〒399-9301　長野県北安曇郡白馬村北城6330-3<br>TEL：<a href="tel:0261711302">0261-71-1302</a>　FAX：0261-71-1312</address>
				<ul class="l-footer__sns">
					<li><a target="_blank" href="https://twitter.com/snownavi"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_tw_w.svg" alt="twitter@snownavi"></a></li>
					<li><a target="_blank" href="https://www.facebook.com/snownavijp"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_fb_w.svg" alt="facebook@snownavi"></a></li>
					<li><a target="_blank" href="https://www.instagram.com/snownavi"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_ig_w.svg" alt="instagram@snownavi"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="l-copyright">&copy; 2022 snownavi</div>
</footer>
<?php else:?>
<footer class="l-footer" role="contentinfo">
	<div class="l-footer__inner">
		<nav class="l-footer__nav" role="navigation">
			<ul>
				<li><a href="/wp/">JP</a></li>
				<li><a href="<?php echo home_url('/en'); ?>">EN</a></li>
			</ul>
			<ul>
				<li><a href="<?php echo home_url('/en/ticket'); ?>">LIFT TICKETS</a></li>
				<li><a href="<?php echo home_url('/en/coupon'); ?>">LIFT COUPONS</a></li>
				<li><a href="<?php echo home_url('/en/hotel-voucher'); ?>">TIE-UP HOTELS</a></li>
				<li><a href="<?php echo home_url('/en/shop-voucher'); ?>">TIE-UP SHOPS</a></li>
				<li><a href="<?php echo home_url('/en/news'); ?>">NEWS</a></li>
			</ul>
			<ul>
				<li><a target="_blank" href="https://www.snownavi.com/wp/en/contact" class="c-arw">CONTACT US</a></li>
				<li><a target="_blank" href="https://www.snownavi.com/wp/en/company">ABOUT US</a></li>
				<li><a target="_blank" href="https://www.snownavi.com/wp/en/privacy">PRIVACY POLICY</a></li>
			</ul>
		</nav>
		<div class="l-footer__logo">
			<a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url') ?>/assets/img/common/logo_w.svg" alt="Snownavi"></a>
			<div class="l-footer__add">
				<address>Snownavi Co., Ltd.<br>6330-3, Hokujo, Hakuba-mura Kitaazumi-gun, NAGANO<br>TEL：<a href="tel:0261711302">TEL.0261-71-1302</a>（8:30-17:00 Holidays: Sat. & Sun.）</address>
				<ul class="l-footer__sns">
					<li><a target="_blank" href="https://twitter.com/snownavi"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_tw_w.svg" alt="twitter@snownavi"></a></li>
					<li><a target="_blank" href="https://www.facebook.com/snownavijp"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_fb_w.svg" alt="facebook@snownavi"></a></li>
					<li><a target="_blank" href="https://www.instagram.com/snownavi"><img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_ig_w.svg" alt="instagram@snownavi"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="l-copyright">&copy; 2022 snownavi</div>
</footer>
<?php endif;?>



<?php wp_footer(); ?>

<?php if (is_post_type_archive('ticket') || is_post_type_archive('coupon')): ?>
<script src="<?php bloginfo('template_url') ?>/assets/js/slinky.min.js" id="slinky-js"></script>
<script>
	window.slinky = $('#menu').slinky()
</script>
<?php
(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']
?>
<?php
if(isset($_GET['a'])) { $a = $_GET['a']; }
if(isset($_GET['b'])) { $b = $_GET['b']; }
if(isset($_GET['c'])) { $c = $_GET['c']; }
//if(isset($_GET['d'])) { $d = $_GET['d']; }
$hierarchy01 = '.hierarchy'.$a;
$hierarchy02 = '.hierarchy'.$a.$b;
$hierarchy03 = '.hierarchy'.$a.$b.$c;
//$hierarchy04 = '.hierarchy'.$a.$b.$c.$d;
echo "<script>$(window).on('load', function() {";
echo "$('".$hierarchy02."').css({'display':'block'});";
echo "$('".$hierarchy03."').css({'display':'block'});";
//echo "$('".$hierarchy04."').css({'display':'block'});";
//echo "$('".$hierarchy01."').css({'left':'-300%'});";
echo "$('".$hierarchy01."').css({'left':'-100%'});";
echo "var height = $('".$hierarchy03."').height();";
//echo "var height = $('".$hierarchy04."').height();";
echo "$('.slinky-menu').css({'height':height});";
echo "});</script>";
?>
<script>
$(window).load(function() {
	var height = $(".l-header").height();
	var ahash = location.hash;
	var gotoNum = $(ahash).offset().top - height;
	$('html,body').delay(1000).animate({ scrollTop: gotoNum }, 'slow');
	return false;
});
</script>
<?php endif; ?>

<?php if (is_post_type_archive('hotel-voucher')): ?>
<script src="<?php bloginfo('template_url') ?>/assets/js/tab.js" id="tab-js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/tab-select.js" id="tab-js"></script>
<?php endif; ?>

</body>
</html>
