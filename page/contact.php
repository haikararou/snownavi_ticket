<?php
/*
Template Name: お問い合わせ
 */
get_header(); ?>

<div class="c-main__wrapper">
  <section class="c-section c-page">
    <?php if(get_field('lead_access')): ?>
    <h1>CONTACT<span>お問い合わせ</span></h1>
    <h2>各種お問い合わせ・広告のお問い合わせ</h2>
    <p>早割リフト券、割引クーポン、Snownavi への広告掲載等、各種のお問合せはお電話（TEL.0261-71-1302、9～17時、土日休）または下記フォームにてお願いいたします。</p>
    <div class="c-form"><?php echo do_shortcode('[contact-form-7 id="190" title="コンタクトフォーム JP"]'); ?></div>
    <?php else:?>
    <h1>CONTACT</h1>
    <h2>Inquiry about the Advertisement and Others</h2>
    <p>For advance lift tickets, discount coupons and Snownavi advertising, please contact us by phone (TEL.0261-71-1302, 9 a.m.-5 p.m., Weekdays) or the form below.</p>
    <div class="c-form"><?php echo do_shortcode('[contact-form-7 id="190" title="コンタクトフォーム EN"]'); ?></div>
    <?php endif;?>
  </section>
</div>

<?php get_footer(); ?>