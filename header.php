<?php
/**
 * ヘッダーテンプレート
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WKZ97XW6');</script>
<!-- End Google Tag Manager -->
<?php get_template_part('inc/ga'); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<?php wp_head(); ?>
<meta name="description" content="<?php print_description(); ?>">
<!-- OGP -->
<meta property="og:type" content="website">
<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="<?php echo print_ogp_title(); ?>">
<meta property="og:description" content="<?php print_description(); ?>">
<meta property="og:url" content="<?php print_url(); ?>">
<meta property="og:image" content="<?php echo get_ogpimg_url(); ?>">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="<?php print_ogp_title(); ?>">
<meta name="twitter:description" content="<?php print_description(); ?>">
<meta name="twitter:image:src" content="<?php echo get_ogpimg_url(); ?>">
<!-- style -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<?php if(is_home() || is_front_page()): ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css'>
<?php endif; ?>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T99B97GG95"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'G-T99B97GG95');
</script>

</head>

<?php
if ( is_home() || is_front_page() ) {
$my_body_class = 'index';
} else if ( is_single() ) {
$my_body_class = 'single ' . $post->post_name . '';
} else if ( is_page() ) {
$my_body_class = 'page ' . $post->post_name . '';
} else if ( is_category() ) {
$category = get_the_category();
$my_body_class = 'category category_' . $category[0]->category_nicename . '';
}
?>

<?php $locale = get_locale(); if($locale == 'ja'):?>
	<?php if(is_home() || is_front_page()): ?>
	<body <?php echo ( $my_body_class ) ? ' class="' . $my_body_class . '"' : ''; ?> data-barba="wrapper">
	<?php elseif(is_post_type_archive('coupon')): ?>
	<body class="coupon">
	<?php elseif(is_post_type_archive('ticket')): ?>
	<body class="ticket">
	<?php elseif(is_post_type_archive('hotel-voucher')): ?>
	<body class="hotel-voucher page">
	<?php elseif(is_post_type_archive('shop-voucher')): ?>
	<body class="shop-voucher page">
	<?php endif; ?>
<?php else:?>
	<?php if(is_home() || is_front_page()): ?>
	<body <?php echo ( $my_body_class ) ? ' class="' . $my_body_class . ' __english"' : ''; ?> data-barba="wrapper">
	<?php elseif(is_post_type_archive('coupon')): ?>
	<body class="coupon">
	<?php elseif(is_post_type_archive('ticket')): ?>
	<body class="ticket">
	<?php elseif(is_post_type_archive('hotel-voucher')): ?>
	<body class="hotel-voucher page __english">
	<?php elseif(is_post_type_archive('shop-voucher')): ?>
	<body class="shop-voucher page __english">
	<?php else: ?>
	<body class="page __english">
	<?php endif; ?>
<?php endif;?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKZ97XW6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php get_template_part('inc/tag'); ?>

<header class="l-header" role="banner">
	<div class="l-header__wrapper">
		<div class="l-header__sitelogo">
		<?php $locale = get_locale(); if($locale == 'ja'):?>
			<a href="<?php echo home_url('/'); ?>">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="234.2" height="34.78" viewBox="0 0 234.2 34.78">
					<path class="cls-1" d="M28.06,31.21c-1.19,2.08-4.67,3.1-10.41,3.1h-16C.6,34.31.09,33.76.09,32.66A3.47,3.47,0,0,1,.3,31.12c.21-.42.68-.59,1.36-.59h16c4.29,0,6.46-.81,6.46-2.42V25.94c0-1.58-2.08-2.43-6.25-2.51q-10.65-.32-11.61-.51C2.08,22.24,0,20.37,0,17.35V15.48c0-3,1.66-5,4.89-5.87A41.48,41.48,0,0,1,13.48,9a1.46,1.46,0,0,1,1.66,1.62v.51a1.47,1.47,0,0,1-1.66,1.66c-.09,0-.38,0-.89,0H11.44c-4.55,0-6.81.89-6.81,2.67v1.75c0,1.1.94,1.83,2.81,2.17a31.39,31.39,0,0,0,4.08.17h6.17a18.8,18.8,0,0,1,7,1.14c2.68,1.07,4,2.81,4,5.11V28A6.58,6.58,0,0,1,28.06,31.21Z"/><path class="cls-1" d="M56.93,34.31A8.77,8.77,0,0,1,55,34.19a1.43,1.43,0,0,1-.89-1.53V20c0-.89-.73-1.53-2.26-1.78a27.33,27.33,0,0,0-3.27-.09H41.46a28.77,28.77,0,0,0-3.36.09c-1.53.3-2.3.89-2.3,1.83V32.66a1.46,1.46,0,0,1-1.66,1.65,8.56,8.56,0,0,1-1.87-.12,1.45,1.45,0,0,1-.89-1.53V20.07c0-3.79,3.36-5.66,10.08-5.66H48.6q9.94,0,9.95,5.62V32.66A1.45,1.45,0,0,1,56.93,34.31Z"/><path class="cls-1" d="M85,33.12a14.77,14.77,0,0,1-6.34,1.19H71.39a16,16,0,0,1-6.51-1.23c-2.42-1.06-3.65-2.72-3.65-5V20.79c0-2.21,1.23-3.87,3.65-5.06a15,15,0,0,1,6.51-1.32H78.7c6.47,0,9.7,2.09,9.7,6.34v7.36A5.26,5.26,0,0,1,85,33.12ZM84,20.45c0-1.57-1.83-2.34-5.4-2.34H71.43a11.74,11.74,0,0,0-3.57.47c-1.49.51-2.21,1.23-2.21,2.21v7.32c0,1,.77,1.65,2.3,2.08a12.45,12.45,0,0,0,3.52.42h7.11a10.15,10.15,0,0,0,3.27-.46c1.4-.47,2.13-1.15,2.13-2Z"/><path class="cls-1" d="M120.93,32.53a2.7,2.7,0,0,1-2.64,1.4,2.65,2.65,0,0,1-2.59-1.36l-6.47-12.12-6.59,12.16a3.3,3.3,0,0,1-5.4-.08L89.29,16.75a2.53,2.53,0,0,1-.25-1c0-.93.68-1.4,2-1.4,1.19,0,2,.3,2.33,1l6.72,13,6.55-12.08a2.71,2.71,0,0,1,2.55-1.49,2.62,2.62,0,0,1,2.47,1.45l6.59,12.12,6.67-13c.34-.64,1.11-1,2.34-1s2,.47,2,1.4a2.1,2.1,0,0,1-.29,1Z"/><path class="cls-1" d="M157.58,34.31a8.89,8.89,0,0,1-1.92-.12,1.45,1.45,0,0,1-.89-1.53V20c0-.89-.72-1.53-2.25-1.78a27.53,27.53,0,0,0-3.28-.09H142.1a28.77,28.77,0,0,0-3.36.09c-1.53.3-2.29.89-2.29,1.83V32.66a1.47,1.47,0,0,1-1.66,1.65,8.5,8.5,0,0,1-1.87-.12,1.44,1.44,0,0,1-.9-1.53V20.07c0-3.79,3.36-5.66,10.08-5.66h7.14q10,0,9.95,5.62V32.66A1.45,1.45,0,0,1,157.58,34.31Z"/><path class="cls-1" d="M182.07,34.31H171.35A13.33,13.33,0,0,1,165.4,33c-2.25-1.07-3.4-2.56-3.4-4.47V26a5,5,0,0,1,3.23-4.68,13.64,13.64,0,0,1,6-1.23h15.48c-.21-1.36-2.17-2.08-5.91-2.08-.42,0-.89,0-1.49,0s-.93,0-1.06,0a1.46,1.46,0,0,1-1.62-1.66V16a1.45,1.45,0,0,1,1.62-1.62,33.6,33.6,0,0,1,8,.68c3.18.9,4.8,2.73,4.8,5.45v7.78C191,32.32,188,34.31,182.07,34.31Zm-11-10.5a8.58,8.58,0,0,0-2.81.51c-1.27.43-1.91,1-1.91,1.66v2.51c0,.72.64,1.27,2,1.7a9.88,9.88,0,0,0,2.9.42h10.88c1.91,0,3.23-.25,3.83-.76a3.27,3.27,0,0,0,.76-2.55c0-.3,0-.81,0-1.58V23.81Z"/><path class="cls-1" d="M209.49,33.93a2.13,2.13,0,0,1-1.66.85,2.07,2.07,0,0,1-1.61-.81l-14-16.92a2,2,0,0,1-.6-1.32c0-.93.77-1.4,2.38-1.4a2.46,2.46,0,0,1,2,.68l11.91,14.5L219.7,15a2.35,2.35,0,0,1,2-.68c1.57,0,2.34.47,2.34,1.4a2,2,0,0,1-.6,1.32Z"/><path class="cls-1" d="M229.9,34.31a5.45,5.45,0,0,1-1.87-.17c-.55-.17-.85-.68-.85-1.48V15.94a1.44,1.44,0,0,1,1.62-1.61,7.51,7.51,0,0,1,1.87.13,1.38,1.38,0,0,1,.85,1.48V32.66A1.43,1.43,0,0,1,229.9,34.31Z"/><path class="cls-1" d="M234.2,4.85A4.85,4.85,0,1,1,229.35,0,4.85,4.85,0,0,1,234.2,4.85Z"/></svg>
				<p>全国のスキー場の格安、お得な<br>早割リフト券販売サイト</p>
			</a>
		<?php else:?>
			<a href="<?php echo home_url('/en'); ?>">
				<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="234.2" height="34.78" viewBox="0 0 234.2 34.78">
					<path class="cls-1" d="M28.06,31.21c-1.19,2.08-4.67,3.1-10.41,3.1h-16C.6,34.31.09,33.76.09,32.66A3.47,3.47,0,0,1,.3,31.12c.21-.42.68-.59,1.36-.59h16c4.29,0,6.46-.81,6.46-2.42V25.94c0-1.58-2.08-2.43-6.25-2.51q-10.65-.32-11.61-.51C2.08,22.24,0,20.37,0,17.35V15.48c0-3,1.66-5,4.89-5.87A41.48,41.48,0,0,1,13.48,9a1.46,1.46,0,0,1,1.66,1.62v.51a1.47,1.47,0,0,1-1.66,1.66c-.09,0-.38,0-.89,0H11.44c-4.55,0-6.81.89-6.81,2.67v1.75c0,1.1.94,1.83,2.81,2.17a31.39,31.39,0,0,0,4.08.17h6.17a18.8,18.8,0,0,1,7,1.14c2.68,1.07,4,2.81,4,5.11V28A6.58,6.58,0,0,1,28.06,31.21Z"/><path class="cls-1" d="M56.93,34.31A8.77,8.77,0,0,1,55,34.19a1.43,1.43,0,0,1-.89-1.53V20c0-.89-.73-1.53-2.26-1.78a27.33,27.33,0,0,0-3.27-.09H41.46a28.77,28.77,0,0,0-3.36.09c-1.53.3-2.3.89-2.3,1.83V32.66a1.46,1.46,0,0,1-1.66,1.65,8.56,8.56,0,0,1-1.87-.12,1.45,1.45,0,0,1-.89-1.53V20.07c0-3.79,3.36-5.66,10.08-5.66H48.6q9.94,0,9.95,5.62V32.66A1.45,1.45,0,0,1,56.93,34.31Z"/><path class="cls-1" d="M85,33.12a14.77,14.77,0,0,1-6.34,1.19H71.39a16,16,0,0,1-6.51-1.23c-2.42-1.06-3.65-2.72-3.65-5V20.79c0-2.21,1.23-3.87,3.65-5.06a15,15,0,0,1,6.51-1.32H78.7c6.47,0,9.7,2.09,9.7,6.34v7.36A5.26,5.26,0,0,1,85,33.12ZM84,20.45c0-1.57-1.83-2.34-5.4-2.34H71.43a11.74,11.74,0,0,0-3.57.47c-1.49.51-2.21,1.23-2.21,2.21v7.32c0,1,.77,1.65,2.3,2.08a12.45,12.45,0,0,0,3.52.42h7.11a10.15,10.15,0,0,0,3.27-.46c1.4-.47,2.13-1.15,2.13-2Z"/><path class="cls-1" d="M120.93,32.53a2.7,2.7,0,0,1-2.64,1.4,2.65,2.65,0,0,1-2.59-1.36l-6.47-12.12-6.59,12.16a3.3,3.3,0,0,1-5.4-.08L89.29,16.75a2.53,2.53,0,0,1-.25-1c0-.93.68-1.4,2-1.4,1.19,0,2,.3,2.33,1l6.72,13,6.55-12.08a2.71,2.71,0,0,1,2.55-1.49,2.62,2.62,0,0,1,2.47,1.45l6.59,12.12,6.67-13c.34-.64,1.11-1,2.34-1s2,.47,2,1.4a2.1,2.1,0,0,1-.29,1Z"/><path class="cls-1" d="M157.58,34.31a8.89,8.89,0,0,1-1.92-.12,1.45,1.45,0,0,1-.89-1.53V20c0-.89-.72-1.53-2.25-1.78a27.53,27.53,0,0,0-3.28-.09H142.1a28.77,28.77,0,0,0-3.36.09c-1.53.3-2.29.89-2.29,1.83V32.66a1.47,1.47,0,0,1-1.66,1.65,8.5,8.5,0,0,1-1.87-.12,1.44,1.44,0,0,1-.9-1.53V20.07c0-3.79,3.36-5.66,10.08-5.66h7.14q10,0,9.95,5.62V32.66A1.45,1.45,0,0,1,157.58,34.31Z"/><path class="cls-1" d="M182.07,34.31H171.35A13.33,13.33,0,0,1,165.4,33c-2.25-1.07-3.4-2.56-3.4-4.47V26a5,5,0,0,1,3.23-4.68,13.64,13.64,0,0,1,6-1.23h15.48c-.21-1.36-2.17-2.08-5.91-2.08-.42,0-.89,0-1.49,0s-.93,0-1.06,0a1.46,1.46,0,0,1-1.62-1.66V16a1.45,1.45,0,0,1,1.62-1.62,33.6,33.6,0,0,1,8,.68c3.18.9,4.8,2.73,4.8,5.45v7.78C191,32.32,188,34.31,182.07,34.31Zm-11-10.5a8.58,8.58,0,0,0-2.81.51c-1.27.43-1.91,1-1.91,1.66v2.51c0,.72.64,1.27,2,1.7a9.88,9.88,0,0,0,2.9.42h10.88c1.91,0,3.23-.25,3.83-.76a3.27,3.27,0,0,0,.76-2.55c0-.3,0-.81,0-1.58V23.81Z"/><path class="cls-1" d="M209.49,33.93a2.13,2.13,0,0,1-1.66.85,2.07,2.07,0,0,1-1.61-.81l-14-16.92a2,2,0,0,1-.6-1.32c0-.93.77-1.4,2.38-1.4a2.46,2.46,0,0,1,2,.68l11.91,14.5L219.7,15a2.35,2.35,0,0,1,2-.68c1.57,0,2.34.47,2.34,1.4a2,2,0,0,1-.6,1.32Z"/><path class="cls-1" d="M229.9,34.31a5.45,5.45,0,0,1-1.87-.17c-.55-.17-.85-.68-.85-1.48V15.94a1.44,1.44,0,0,1,1.62-1.61,7.51,7.51,0,0,1,1.87.13,1.38,1.38,0,0,1,.85,1.48V32.66A1.43,1.43,0,0,1,229.9,34.31Z"/><path class="cls-1" d="M234.2,4.85A4.85,4.85,0,1,1,229.35,0,4.85,4.85,0,0,1,234.2,4.85Z"/></svg>
				<p>Cheap and advantageous early bird lift ticket sales site for ski resorts nationwide.</p>
			</a>
		<?php endif;?>
		</div>
		<div class="l-header__pcnav">
			<ul>
			<?php $locale = get_locale(); if($locale == 'ja'):?>
				<li><a target="_blank" href="https://www.snownavi.com/wp/contact">お問い合わせ</a></li>
			<?php else:?>
				<li><a target="_blank" href="https://www.snownavi.com/wp/en/contact">Contact Us</a></li>
			<?php endif;?>
				<li><a target="_blank" href="https://twitter.com/snownavi">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path id="icn_twitter" d="M19.6,4.1c-0.7,0.3-1.5,0.5-2.3,0.6c0.8-0.5,1.4-1.3,1.7-2.2c-0.8,0.5-1.6,0.8-2.5,1
	c-1.5-1.6-4-1.7-5.6-0.2C10.2,4,9.8,5.1,9.8,6.2c0,0.3,0,0.6,0.1,0.9C6.7,6.9,3.8,5.4,1.8,2.9C0.7,4.7,1.2,7,3,8.2
	C2.3,8.2,1.7,8,1.2,7.7v0c0,1.9,1.3,3.5,3.1,3.9c-0.3,0.1-0.7,0.1-1,0.1c-0.2,0-0.5,0-0.7-0.1c0.5,1.6,2,2.7,3.7,2.7
	c-1.4,1.1-3.1,1.7-4.9,1.7c-0.3,0-0.6,0-0.9-0.1c5.2,3.3,12.1,1.8,15.4-3.4c1.1-1.8,1.8-3.9,1.8-6c0-0.2,0-0.3,0-0.5
	C18.4,5.6,19,4.9,19.6,4.1L19.6,4.1z"/>
					</svg>
				</a></li>
				<li><a target="_blank" href="https://www.facebook.com/snownavijp">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path id="icn_facebook" d="M19.8,10.1c0-5.3-4.3-9.6-9.6-9.6c-5.3,0-9.6,4.3-9.6,9.6c0,4.7,3.4,8.7,8.1,9.5v-6.7H6.3
	v-2.8h2.4V7.9c-0.2-1.9,1.1-3.5,3-3.7c0.2,0,0.4,0,0.6,0c0.7,0,1.4,0.1,2.1,0.2v2.4h-1.2c-0.8-0.1-1.5,0.4-1.6,1.2
	c0,0.1,0,0.2,0,0.3v1.8h2.7l-0.4,2.8h-2.2v6.7C16.4,18.8,19.8,14.8,19.8,10.1z"/>
					</svg>
				</a></li>
				<li><a target="_blank" href="https://www.instagram.com/snownavi">
					<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
						<path id="icn_instagram01" d="M10,2.3c2.6,0,2.9,0,3.9,0.1c0.6,0,1.2,0.1,1.8,0.3c0.8,0.3,1.5,1,1.8,1.8c0.2,0.6,0.3,1.2,0.3,1.8
c0,1,0.1,1.3,0.1,3.9s0,2.9-0.1,3.9c0,0.6-0.1,1.2-0.3,1.8c-0.3,0.8-1,1.5-1.8,1.8c-0.6,0.2-1.2,0.3-1.8,0.3c-1,0-1.3,0.1-3.9,0.1
s-2.9,0-3.9-0.1c-0.6,0-1.2-0.1-1.8-0.3c-0.8-0.3-1.5-1-1.8-1.8c-0.2-0.6-0.3-1.2-0.3-1.8c0-1-0.1-1.3-0.1-3.9s0-2.9,0.1-3.9
c0-0.6,0.1-1.2,0.3-1.8c0.3-0.8,1-1.5,1.8-1.8c0.6-0.2,1.2-0.3,1.8-0.3C7.2,2.3,7.5,2.3,10,2.3z M10,0.5c-2.6,0-2.9,0-3.9,0.1
C5.3,0.6,4.5,0.8,3.8,1C2.5,1.5,1.5,2.5,1,3.8C0.7,4.5,0.6,5.3,0.6,6.1c0,1-0.1,1.3-0.1,3.9s0,2.9,0.1,3.9c0,0.8,0.2,1.6,0.4,2.3
c0.5,1.3,1.5,2.3,2.8,2.8c0.7,0.3,1.5,0.4,2.3,0.4c1,0,1.3,0.1,3.9,0.1s2.9,0,3.9-0.1c0.8,0,1.6-0.2,2.3-0.4
c1.3-0.5,2.3-1.5,2.8-2.8c0.3-0.7,0.4-1.5,0.4-2.3c0-1,0.1-1.3,0.1-3.9s0-2.9-0.1-3.9c0-0.8-0.2-1.6-0.4-2.3
c-0.5-1.3-1.5-2.3-2.8-2.8c-0.7-0.3-1.5-0.4-2.3-0.4C13,0.5,12.6,0.5,10,0.5z"/>
						<path id="icn_instagram02" d="M10,5.2c-2.7,0-4.9,2.2-4.9,4.9S7.3,15,10,15c2.7,0,4.9-2.2,4.9-4.9C15,7.4,12.8,5.2,10,5.2L10,5.2z
 M10,13.3c-1.8,0-3.2-1.4-3.2-3.2c0-1.8,1.4-3.2,3.2-3.2c1.8,0,3.2,1.4,3.2,3.2l0,0C13.2,11.9,11.8,13.3,10,13.3z"/>
						<path id="icn_instagram03" d="M16.3,5c0,0.6-0.5,1.1-1.1,1.1S14.1,5.6,14.1,5s0.5-1.1,1.1-1.1l0,0C15.8,3.8,16.3,4.4,16.3,5z"/>
					</svg>
				</a></li>
				<?php $locale = get_locale(); if($locale == 'ja'):?>
				<li><a href="<?php echo home_url('/en'); ?>">EN</a></li>
				<?php else:?>
				<li><a href="/wp/">JP</a></li>
				<?php endif;?>
			</ul>
			<?php $locale = get_locale(); if($locale == 'ja'):?>
			<ul>
				<li><a href="<?php echo home_url('/ticket'); ?>">LIFT TICKETS</a></li>
				<li><a href="<?php echo home_url('/coupon'); ?>">LIFT COUPONS</a></li>
				<li><a href="<?php echo home_url('/hotel-voucher'); ?>">TIE-UP HOTELS</a></li>
				<li><a href="<?php echo home_url('/shop-voucher'); ?>">TIE-UP SHOPS</a></li>
			</ul>
			<?php else:?>
			<ul>
				<li><a href="<?php echo home_url('/en/ticket'); ?>">LIFT TICKETS</a></li>
				<li><a href="<?php echo home_url('/en/coupon'); ?>">LIFT COUPONS</a></li>
				<li><a href="<?php echo home_url('/en/hotel-voucher'); ?>">TIE-UP HOTELS</a></li>
				<li><a href="<?php echo home_url('/en/shop-voucher'); ?>">TIE-UP SHOPS</a></li>
			</ul>
			<?php endif;?>
		</div>
		<div class="l-header__hamburger"><span></span><span></span></div>
		<nav class="l-header__nav" role="navigation">
			<div class="l-header__nav__scroll">
				<div class="l-header__nav__box">
					<?php $locale = get_locale(); if($locale == 'ja'):?>
					<ul>
						<li><a href="<?php echo home_url('/'); ?>">TOP</a></li>
						<li><a href="<?php echo home_url('/en'); ?>">ENGLISH TOP</a></li>
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
					<?php else:?>
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
					<?php endif;?>
					<ul>
						<li><a target="_blank" href="https://twitter.com/snownavi"><picture>
							<source srcset="<?php bloginfo('template_url') ?>/assets/img/common/icn_tw_b.svg" media="(min-width: 1280px)">
							<img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_tw_w.svg" alt="twitter@snownavi">
						</picture></a></li>
						<li><a target="_blank" href="https://www.facebook.com/snownavijp"><picture>
							<source srcset="<?php bloginfo('template_url') ?>/assets/img/common/icn_fb_b.svg" media="(min-width: 1280px)">
							<img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_fb_w.svg" alt="facebook@snownavi">
						</picture></a></li>
						<li><a target="_blank" href="https://www.instagram.com/snownavi"><picture>
							<source srcset="<?php bloginfo('template_url') ?>/assets/img/common/icn_ig_b.svg" media="(min-width: 1280px)">
							<img src="<?php bloginfo('template_url') ?>/assets/img/common/icn_ig_w.svg" alt="instagram@snownavi">
						</picture></a></li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</header>

<?php if(is_home() || is_front_page()): ?>
<main class="l-main  p-index" role="main">
<?php elseif(is_post_type_archive('ticket') || is_post_type_archive('coupon')): ?>
<main class="l-main" role="main">
<?php else : ?>
<main class="c-main" role="main">
<?php endif; ?>







