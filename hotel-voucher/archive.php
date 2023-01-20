<?php get_header(); ?>

<div class="c-main__wrapper">

	<section class="c-section c-page">
		<?php $locale = get_locale(); if($locale == 'ja'):?>
		<h1>ご宿泊割引券について</h1>
		<h2>利用方法</h2>
		<div class="c-page__box">
			<div class="c-page__box__img">
				<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_ticket.jpg" alt="">
			</div>
			<div class="c-page__box__txt">
				<p><strong>早割リフト券4枚ご購入ごとに、提携宿泊施設（※当ページ掲載宿）のホームページ掲載プランで利用できる1,000円分の金券をプレゼント！</strong></p>
				<ul class="astarisk">
					<li>1泊1組につき（2名様以上）、当割引券1枚のご利用とさせていただきます。<br>2泊目（連泊）以降については宿泊施設の規定によります。</li>
					<li>提携宿泊施設の各ホームページに掲載されている宿泊プランでご宿泊のみご利用可能。<br>旅行会社主催のプランや、「じゃらん」「楽天」などの旅行系サイトのプランにはご利用いただけません。</li>
					<li>有効期間は2021年12月1日～2022年4月30日です。</li>
				</ul>
				<h3>［ご利用方法］</h3>
				<ol>
					<li>ご予約時、当割引券利用の旨、宿泊施設へお伝えください。（必須）</li>
					<li>チェックインの際、ご宿泊先のフロントにご提示ください。</li>
					<li>ホテルによりご利用いただけない期間やプランもありますのでご注意ください。</li>
				</ol>
			</div>
		</div>
		<?php else:?>
		<h1>Accommodation Discount Coupon</h1>
		<h2>How to Use</h2>
		<div class="c-page__box">
			<div class="c-page__box__img">
				<img src="<?php bloginfo('template_url') ?>/assets/img/common/sample_ticket.jpg" alt="">
			</div>
			<div class="c-page__box__txt">
				<p><strong>You can get the accommodation discount coupon for JPY1, 000 off the price</strong></p>
				<p>A discount coupon is available by every purchase of 4 advance tickets. You will get JPY1,000 off discount for the accommodation plans which are carried in websites of the following tie-up hotels by using this coupon.</p>
				<ul class="astarisk">
					<li>Per one night for one group (2 persons or more), 1 discount coupon is available.<br>From the second night (consecutive stay), the way of use will conform to the regulation of the hotel.</li>
					<li>The discount coupon is available only for the accommodation plan that is carried in the website of the tie-up hotels.<br>The coupon is unavailable for plans of travel agencies and tourism agent websites, such as "Jalan" and "Rakuten".</li>
					<li>Valid period is from Dec. 1, 2020 to Apr. 30, 2021.</li>
					<li>This ticket can be combined with Go To Travel Campaigne.</li>
				</ul>
				<h3>[How to Use]</h3>
				<ol>
					<li>When you make a reservation, please tell the hotel that the discount coupon will be used. (Indispensable)</li>
					<li>Please show the discount coupon at the front desk of the hotel when you check in.</li>
					<li>Please understand that the discount coupon is unavailable for some accommodation plan.</li>
				</ol>
			</div>
		</div>
		<?php endif;?>

		<?php $locale = get_locale(); if($locale == 'ja'):?>
		<?php if(have_rows('affiliated_facility',152)): ?>
		<div class="c-page__wrapepr">
			<h2>提携宿泊施設の各ホームページに掲載されている宿泊プランでご宿泊のみご利用可能。</h2>
			<ul class="c-page__clm04">
		<?php while(have_rows('affiliated_facility',152)): the_row(); ?>
		<?php
			$bnrCId = get_sub_field('affiliated_facility_img');
			$bnrCimg = wp_get_attachment_image_src($bnrCId);
			$bnrCAlt = get_post_meta ( get_post ($bnrCId) -> ID , '_wp_attachment_image_alt' , true );
		?>
		<li><a href="<?php the_sub_field('affiliated_facility_url'); ?>" target="_blank"><img src="<?php echo $bnrCimg[0]; ?>"  alt="<?php echo $bnrCAlt ; ?>"></a></li>
		<?php endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php else:?>
		<?php if(have_rows('affiliated_facility',229)): ?>
		<div class="c-page__wrapepr">
			<h2>Tie-up Hotels</h2>
			<ul class="c-page__clm04">
		<?php while(have_rows('affiliated_facility',229)): the_row(); ?>
		<?php
			$bnrCId = get_sub_field('affiliated_facility_img');
			$bnrCimg = wp_get_attachment_image_src($bnrCId);
			$bnrCAlt = get_post_meta ( get_post ($bnrCId) -> ID , '_wp_attachment_image_alt' , true );
		?>
		<li><a href="<?php the_sub_field('affiliated_facility_url'); ?>"<?php if(get_sub_field('affiliated_facility_blank') == 1): ?> target="_blank"<?php else:?><?php endif; ?>><img src="<?php echo $bnrCimg[0]; ?>"  alt="<?php echo $bnrCAlt ; ?>"></a></li>
		<?php endwhile; ?>
			</ul>
		</div>
		<?php endif; ?>
		<?php endif;?>

		<div class="c-tab-select">
			<div class="c-tab-select__nav">
				<div class="c-tab-select__nav__button-outer">
					<ul class="c-tab-select__nav__button">
					<?php
					$terms = get_terms('hotel-voucher_cat','hide_empty=0');
					foreach ( $terms as $term ) {
						echo '<li><a href="#' . esc_html($term->slug). '">' . esc_html($term->name). '</a></li>';
					}
					?>
					</ul>
				</div>
				<div class="c-tab-select__nav__select-outer">
					<select class="c-tab-select__nav__select">
					<?php
					$terms = get_terms('hotel-voucher_cat','hide_empty=0');
					foreach ( $terms as $term ) {
						echo '<option value="#' . esc_html($term->slug). '">' . esc_html($term->name). '</option>';
					}
					?>
					</select>
				</div>
			</div>
			<?php
			$terms = get_terms('hotel-voucher_cat','hide_empty=0');
			foreach ( $terms as $term ) :
				$args = array(
					'post_type' => 'hotel-voucher',
					'taxonomy' => 'hotel-voucher_cat',
					'term' => $term->slug,
					'posts_per_page' => -1,
					'no_found_rows' => true,
				);
				$query = new WP_Query($args); ?>
				<?php if ( $query->have_posts() ) : ?>
					<div id="<?php echo esc_html($term->slug); ?>" class="c-tab-select__contents">
					<?php while ( $query->have_posts() ) : $query->the_post();?>
						<h4><?php the_title(); ?></h4>
						<ul class="c-page__clm04">
						<?php if(have_rows('hotel_voucher')): ?>
						<?php while(have_rows('hotel_voucher')): the_row(); ?>
						<?php
							$bnrCId = get_sub_field('hotel-voucher_img');
							$bnrCimg = wp_get_attachment_image_src($bnrCId);
							$bnrCAlt = get_post_meta ( get_post ($bnrCId) -> ID , '_wp_attachment_image_alt' , true );
						?>
						<li><a href="<?php the_sub_field('hotel-voucher_url'); ?>" target="_blank"><img src="<?php echo $bnrCimg[0]; ?>"  alt="<?php echo $bnrCAlt ; ?>"><?php the_sub_field('hotel-voucher_name'); ?></a></li>
						<?php endwhile; ?>
						<?php endif; ?>
						</ul>
					<?php endwhile;?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php else: ?>
					<div id="<?php echo esc_html($term->slug); ?>" class="c-tab-select__contents">
					<?php $locale = get_locale(); if($locale == 'ja'):?>
					<p>該当する施設がありません</p>
					<?php else:?>
					<p>There are no applicable facilities.</p>
					<?php endif;?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</section>

</div>

<?php get_footer(); ?>