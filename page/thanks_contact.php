<?php
/*
Template Name: お問い合わせ完了
 */
get_header(); ?>
    <main class="l-main -column -bottom-space p-thanks__contact">
    <h1 class="c-title-page js-title-page"><span class="c-title-page__en">Contact</span>送信完了しました</h1>
    <div class="l-main__main-column">
      <div class="l-main__container">
        <div class="l-main__inner -maincolumn-std">
          <p class="c-text-lead">お問い合わせありがとうございました<br>
            お客様あてに自動返信メールが送信されましたので、ご確認ください。<br>
お問い合わせ内容につきましては、改めて担当者よりご連絡させていただきます。</p>
          <div class="l-spacer -em3">
            <a href="<?php echo home_url(); ?>" class="c-button-all -black" data-barba-prevent>トップへ戻る</a>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>

