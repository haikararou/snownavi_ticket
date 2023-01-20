<?php
/*-----------------------------------------------------------------------------------
キャッシュしたWP_Queryを削除
-----------------------------------------------------------------------------------*/
/*worksの記事を更新したとき*/
// function clear_transient_works_cache() {
//   delete_transient('new_graphic_list');
//   delete_transient('new_web_list');
// }

// add_action( 'publish_works', 'clear_transient_works_cache');
// add_action( 'deleted_works', 'clear_transient_works_cache');
// add_action( 'save_works', 'clear_transient_works_cache');
// add_action( 'edit_works', 'clear_transient_works_cache');


/* ---------------------------------------------------------------------
reCAPTCHAを読み込む
-------------------------------------------------------------------------*/
// add_action('wp_enqueue_scripts', function(){
//   if(is_page('contact') || is_page('download') || is_page('entry')) return;
//     wp_deregister_script('google-recaptcha');
// }, 100, 0);

/*-----------------------------------------------------------------------------------
Contact form 送信後のリダイレクト
-----------------------------------------------------------------------------------*/

