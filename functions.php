<?php
/* ---------------------------------------------------------------------
テーマでアイキャッチ機能を有効化
-------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

update_option( 'medium_crop',true ); // 中サイズのトリミング
update_option( 'large_crop',true ); // 大サイズのトリミング


/* ---------------------------------------------------------------------
GutenbergエディタにCSSを適用
-------------------------------------------------------------------------*/
function gutenberg_support_setup() {
  add_theme_support( 'editor-styles' );
  add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'gutenberg_support_setup' );

/* ---------------------------------------------------------------------
正しいURLを入力しないとログイン画面を表示しないようにする
-------------------------------------------------------------------------*/
remove_action( 'template_redirect', 'wp_redirect_admin_locations', 1000 );

function remove_redirect_guess_404_permalink( $redirect_url ) {
    if ( is_404() )
        return false;
    return $redirect_url;
}
add_filter( 'redirect_canonical', 'remove_redirect_guess_404_permalink' );



/* ---------------------------------------------------------------------
SVGのアップロードを許可
-------------------------------------------------------------------------*/
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/* ---------------------------------------------------------------------
CSS・JSを登録する
-------------------------------------------------------------------------*/
function register_files() {
//wp_register_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
wp_register_style( 'theme-common', get_template_directory_uri() . '/assets/css/common.css');
wp_register_style( 'editor-style', get_template_directory_uri() . '/assets/css/editor-style.css');
wp_register_style( 'theme-font', 'https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap');
wp_deregister_script('jquery');
// wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
// wp_register_style( 'swiper.min', get_template_directory_uri() . '/assets/css/swiper.min.css');
// wp_register_script( 'active_home', get_template_directory_uri() . '/assets/js/active_home.js');
// wp_register_script( 'active', get_template_directory_uri() . '/assets/js/active.js');
// wp_register_script( 'common2', get_template_directory_uri() . '/assets/js/common.js');
}
function my_enqueue_files() {
register_files();
//wp_enqueue_style( 'animate' );
wp_enqueue_style( 'theme-common' );
wp_enqueue_style( 'editor-style' );
//wp_enqueue_style( 'swiper.min' );
wp_enqueue_style( 'theme-font' );
wp_enqueue_script( 'jquery' );
// wp_enqueue_script( 'active_home' );
// wp_enqueue_script( 'active' );
// wp_enqueue_script( 'common2' );
//if(is_page('about') ) {
// wp_enqueue_style( 'about' );
//}
//if(is_page('contact') ) {
// wp_enqueue_style( 'contact' );
//}
}
add_action( 'wp_enqueue_scripts', 'my_enqueue_files' );

// wp_footerにCSS・JSを書き出す
function my_load_widget_scripts() {
wp_enqueue_script( 'jquery2', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
wp_register_script( 'config', get_template_directory_uri() . '/assets/js/config.js');
wp_register_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js');
wp_register_script( 'animation', get_template_directory_uri() . '/assets/js/animation.gsap.min.js');
wp_register_script( 'TweenMax', get_template_directory_uri() . '/assets/js/TweenMax.min.js');
wp_register_script( 'header-js', get_template_directory_uri() . '/assets/js/header.js');
wp_register_script( 'tab-js', get_template_directory_uri() . '/assets/js/tab.js');
wp_register_script( 'accordion-js', get_template_directory_uri() . '/assets/js/accordion.js');
wp_register_style( 'swiper-bundle-css', 'https://unpkg.com/swiper@7/swiper-bundle.min.css');
wp_enqueue_script( 'swiper-bundle-js', 'https://unpkg.com/swiper@7/swiper-bundle.min.js');
//wp_register_script( 'swiper-js', get_template_directory_uri() . '/assets/js/swiper.js');
wp_register_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js');
wp_register_script( 'script2', get_template_directory_uri() . '/assets/js/script2.js');
wp_register_script( 'masonry', get_template_directory_uri() . '/assets/js/jquery.masonry.min.js');
wp_register_script( 'tile-js', get_template_directory_uri() . '/assets/js/tile.js');
wp_register_style( 'wpadminbar', get_template_directory_uri() . '/assets/css/wpadminbar.css');
wp_register_style( 'map', get_template_directory_uri() . '/assets/css/map.css');
wp_enqueue_script( 'jquery2');
wp_enqueue_script( 'config');
wp_enqueue_script( 'easing' );
wp_enqueue_script( 'animation-js' );
wp_enqueue_script( 'TweenMax' );
wp_enqueue_script( 'header-js' );
wp_enqueue_script( 'tab-js' );
wp_enqueue_script( 'accordion' );
wp_enqueue_style( 'swiper-bundle-css' );
wp_enqueue_script( 'swiper-bundle-js' );
//wp_enqueue_script( 'swiper-js' );
wp_enqueue_script( 'slick' );
wp_enqueue_script( 'script2' );
wp_enqueue_script( 'masonry' );
wp_enqueue_script( 'tile-js' );
wp_enqueue_style( 'wpadminbar' );
wp_enqueue_style( 'map' );
// wp_enqueue_script( 'swiper02' );
}
add_action('wp_footer', 'my_load_widget_scripts');


/* ---------------------------------------------------------------------
JSをdeferで読み込む
-------------------------------------------------------------------------*/
function add_defer($tag, $handle) {
  if(is_admin()) return;
    $targets = [
        // wp-includes/script-loader.php
        // 'jquery-core',
        // 'underscore',
        // 'backbone',
        // 'clipboard',

      // theme JS
		'config',
		'accordion',
        'animation.gsap.min',
        'tab',
        'TweenMax.min',

        // contact-form-7
        'contact-form-7',
      ];

    if ( in_array( $handle, $targets, true ) ) {
        $tag = str_replace( '<script ', '<script defer ', $tag );
    }
    return $tag;
}

if (!is_admin() ) {
  add_filter('script_loader_tag', 'add_defer', 10, 2);
}




/*--------------------------------------
適用テンプレートのパスを変更
--------------------------------------*/
function get_custom_template( $page_template ) {
global $wp_query;

//single
if(is_singular('ticket')) {
$page_template = dirname( __FILE__ ) . "/ticket/single.php";
}
if(is_singular('coupon')) {
$page_template = dirname( __FILE__ ) . "/coupon/single.php";
}
if(is_singular('hotel-voucher')) {
$page_template = dirname( __FILE__ ) . "/hotel-voucher/single.php";
}
if(is_singular('shop-voucher')) {
$page_template = dirname( __FILE__ ) . "/shop-voucher/single.php";
}
if(is_singular('news')) {
$page_template = dirname( __FILE__ ) . "/news/single.php";
}


//archive
else if(is_post_type_archive('ticket')){
$page_template = dirname( __FILE__ ) . "/ticket/archive.php";
}
else if(is_post_type_archive('coupon')){
$page_template = dirname( __FILE__ ) . "/coupon/archive.php";
}
else if(is_post_type_archive('hotel-voucher')){
$page_template = dirname( __FILE__ ) . "/hotel-voucher/archive.php";
}
else if(is_post_type_archive('shop-voucher')){
$page_template = dirname( __FILE__ ) . "/shop-voucher/archive.php";
}
else if(is_post_type_archive('news')){
$page_template = dirname( __FILE__ ) . "/news/archive.php";
}

//taxonomy
else if(is_tax('ticket_cat')){
$page_template = dirname( __FILE__ ) . "/ticket/taxonomy.php";
}
else if(is_tax('coupon_cat')){
$page_template = dirname( __FILE__ ) . "/coupon/taxonomy.php";
}
else if(is_tax('hotel-voucher_cat')){
$page_template = dirname( __FILE__ ) . "/hotel-voucher/taxonomy.php";
}
else if(is_tax('shop-voucher_cat')){
$page_template = dirname( __FILE__ ) . "/shop-voucher/taxonomy.php";
}
else if(is_tax('news_cat')){
$page_template = dirname( __FILE__ ) . "/news/taxonomy.php";
}

return $page_template;
}
add_filter('single_template', 'get_custom_template');
add_filter('archive_template', 'get_custom_template');




/* ---------------------------------------------------------------------
その他の機能
-------------------------------------------------------------------------*/

/*初期設定*/
include_once( get_template_directory().'/functions/initial-setting.php' );

/*メタタグ類の設定*/
include_once( get_template_directory().'/functions/meta-setting.php' );

/*カスタム投稿タイプを追加*/
include_once( get_template_directory().'/functions/custompost.php' );

/*便利な関数*/
include_once( get_template_directory().'/functions/utility.php' );

/*ダッシュボードのカスタマイズ*/
//include_once( get_template_directory().'/functions/dashboard.php' );




/*-----------------------------------------
アイキャッチ画像がなかったら記事内の一番目の画像を取得し、さらに画像がなかったら定義した画像を表示する
-------------------------------------------*/
function catch_that_image() {
global $post, $posts;
$first_img = '';
ob_start();
ob_end_clean();
$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
$first_img = $matches [1] [0];

if(has_post_thumbnail()) {
$img_id = get_post_thumbnail_id();
$img_url = wp_get_attachment_image_src($img_id, 'thumbnail', true);
$first_img = $img_url[0];
}
if(empty($first_img)) {
// アイキャッチ画像があればそちらを表示する
if(has_post_thumbnail()) {
$img_id = get_post_thumbnail_id();
$img_url = wp_get_attachment_image_src($img_id, 'thumbnail', true);
$first_img = $img_url[0];
} else {
// 記事内で画像がなかった時のための画像を指定（ディレクトリ先や画像名称は任意）
$first_img = esc_url(get_template_directory_uri()) . "/assets/img/noImage.png";
}
}
return $first_img;
}




/*-----------------------------------------
* スラッグの日本語禁止
-------------------------------------------*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
}
return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );



/*-----------------------------------------
* 説明文に自動挿入されるpタグを省く
-------------------------------------------*/
remove_filter('category_description','wpautop');
remove_filter('tag_description','wpautop');
remove_filter('term_description','wpautop');



/*-----------------------------------------
* 管理画面にカテゴリーを表示
-------------------------------------------*/
function add_custom_column( $defaults ) {
$defaults['ticket_cat'] = 'カテゴリ';
return $defaults;
}
add_filter('manage_ticket_posts_columns', 'add_custom_column');
function add_custom_column_id($column_name, $id) {
$terms = get_the_terms($id, $column_name);
if ( $terms && ! is_wp_error( $terms ) ){
$ticket_cat_links = array();
foreach ( $terms as $term ) {
$ticket_cat_links[] = $term->name;
}
echo join( ", ", $ticket_cat_links );
}
}
add_action('manage_ticket_posts_custom_column', 'add_custom_column_id', 10, 2);


function add_custom_column2( $defaults ) {
$defaults['coupon_cat'] = 'カテゴリ';
return $defaults;
}
add_filter('manage_coupon_posts_columns', 'add_custom_column2');
function add_custom_column_id2($column_name, $id) {
$terms = get_the_terms($id, $column_name);
if ( $terms && ! is_wp_error( $terms ) ){
$coupon_cat_links = array();
foreach ( $terms as $term ) {
$coupon_cat_links[] = $term->name;
}
echo join( ", ", $coupon_cat_links );
}
}
add_action('manage_coupon_posts_custom_column', 'add_custom_column_id2', 10, 2);


function add_custom_column3( $defaults ) {
$defaults['hotel-voucher_cat'] = 'カテゴリ';
return $defaults;
}
add_filter('manage_hotel-voucher_posts_columns', 'add_custom_column3');
function add_custom_column_id3($column_name, $id) {
$terms = get_the_terms($id, $column_name);
if ( $terms && ! is_wp_error( $terms ) ){
$hotelvoucher_cat_links = array();
foreach ( $terms as $term ) {
$hotelvoucher_cat_links[] = $term->name;
}
echo join( ", ", $hotelvoucher_cat_links );
}
}
add_action('manage_hotel-voucher_posts_custom_column', 'add_custom_column_id3', 10, 2);


function add_custom_column4( $defaults ) {
$defaults['shop-voucher_cat'] = 'カテゴリ';
return $defaults;
}
add_filter('manage_shop-voucher_posts_columns', 'add_custom_column4');
function add_custom_column_id4($column_name, $id) {
$terms = get_the_terms($id, $column_name);
if ( $terms && ! is_wp_error( $terms ) ){
$shopvoucher_cat_links = array();
foreach ( $terms as $term ) {
$shopvoucher_cat_links[] = $term->name;
}
echo join( ", ", $shopvoucher_cat_links );
}
}
add_action('manage_shop-voucher_posts_custom_column', 'add_custom_column_id4', 10, 2);


function add_custom_column5( $defaults ) {
$defaults['news_cat'] = 'カテゴリ';
return $defaults;
}
add_filter('manage_news_posts_columns', 'add_custom_column5');
function add_custom_column_id5($column_name, $id) {
$terms = get_the_terms($id, $column_name);
if ( $terms && ! is_wp_error( $terms ) ){
$shopvoucher_cat_links = array();
foreach ( $terms as $term ) {
$shopvoucher_cat_links[] = $term->name;
}
echo join( ", ", $shopvoucher_cat_links );
}
}
add_action('manage_news_posts_custom_column', 'add_custom_column_id5', 10, 2);


/*-----------------------------------------
* カスタム投稿用の検索結果ページを分ける
-------------------------------------------*/
add_filter('template_include','custom_search_template');
function custom_search_template($template){
	if ( is_search() ){
		$post_types = get_query_var('post_type');
		foreach ( (array) $post_types as $post_type )
		$templates[] = "search-{$post_type}.php";
		$templates[] = 'search.php';
		$template = get_query_template('search',$templates);
	}
	return $template;
}




/*-----------------------------------------
* 子カテゴリーを選択したら自動で親カテゴリーがチェックするようにする
-------------------------------------------*/
function category_parent_check_script() {
	wp_enqueue_script('parent-check', get_template_directory_uri().'/assets/js/parent-check.js', array('jquery'));
}
add_action('admin_print_scripts-post.php', 'category_parent_check_script');
add_action('admin_print_scripts-post-new.php', 'category_parent_check_script');







/*-----------------------------------------
カスタム投稿タイプ用カレンダー
-------------------------------------------*/
function get_cpt_calendar($cpt, $initial = true, $echo = true) {
  global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;
  
  $cache = array();
  $key = md5( $m . $monthnum . $year );
  if ( $cache = wp_cache_get( 'get_calendar', 'calendar' ) ) {
      if ( is_array($cache) && isset( $cache[ $key ] ) ) {
      if ( $echo ) {
          echo apply_filters( 'get_calendar',  $cache[$key] );
          return;
      } else {
          return apply_filters( 'get_calendar',  $cache[$key] );
      }
      }
  }
  
  if ( !is_array($cache) )
  $cache = array();
  
  // Quick check. If we have no posts at all, abort!
  if ( !$posts ) {
      $gotsome = $wpdb->get_var("SELECT 1 as test FROM $wpdb->posts WHERE post_type = '$cpt' AND post_status = 'publish' LIMIT 1");
      if ( !$gotsome ) {
          $cache[ $key ] = '';
          wp_cache_set( 'get_calendar', $cache, 'calendar' );
          return;
      }
  }
  
  if ( isset($_GET['w']) )
  $w = ''.intval($_GET['w']);
  
  // week_begins = 0 stands for Sunday
  $week_begins = intval(get_option('start_of_week'));
  
  // Let's figure out when we are
  if ( !empty($monthnum) && !empty($year) ) {
  $thismonth = ''.zeroise(intval($monthnum), 2);
  $thisyear = ''.intval($year);
  } elseif ( !empty($w) ) {
  // We need to get the month from MySQL
  $thisyear = ''.intval(substr($m, 0, 4));
  $d = (($w - 1) * 7) + 6; //it seems MySQL's weeks disagree with PHP's
  $thismonth = $wpdb->get_var("SELECT DATE_FORMAT((DATE_ADD('{$thisyear}0101', INTERVAL $d DAY) ), '%m')");
  } elseif ( !empty($m) ) {
  $thisyear = ''.intval(substr($m, 0, 4));
  if ( strlen($m) < 6 )
          $thismonth = '01';
  else
          $thismonth = ''.zeroise(intval(substr($m, 4, 2)), 2);
  } else {
  $thisyear = gmdate('Y', current_time('timestamp'));
  $thismonth = gmdate('m', current_time('timestamp'));
  }
  
  $unixmonth = mktime(0, 0 , 0, $thismonth, 1, $thisyear);
  $last_day = date('t', $unixmonth);
  
  // Get the next and previous month and year with at least one post
  $previous = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
      FROM $wpdb->posts
      WHERE post_date < '$thisyear-$thismonth-01'
      AND post_type = '$cpt' AND post_status = 'publish'
      ORDER BY post_date DESC
      LIMIT 1");
  $next = $wpdb->get_row("SELECT MONTH(post_date) AS month, YEAR(post_date) AS year
  FROM $wpdb->posts
  WHERE post_date > '$thisyear-$thismonth-{$last_day} 23:59:59'
  AND post_type = '$cpt' AND post_status = 'publish'
      ORDER BY post_date ASC
      LIMIT 1");
  
  /* translators: Calendar caption: 1: month name, 2: 4-digit year */
  $calendar_caption = _x('%1$s %2$s', 'calendar caption');
  $calendar_output = '<div class="c-sidebar__calender c-sidebar__box"><table class="calendar">
  <caption>' . sprintf($calendar_caption, $wp_locale->get_month($thismonth), date('Y', $unixmonth)) . '</caption>
  <thead>
  <tr>';
  
  $myweek = array();
  
  for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
  $myweek[] = $wp_locale->get_weekday(($wdcount+$week_begins)%7);
  }
  
  foreach ( $myweek as $wd ) {
  $day_name = (true == $initial) ? $wp_locale->get_weekday_initial($wd) : $wp_locale->get_weekday_abbrev($wd);
  $wd = esc_attr($wd);
  $calendar_output .= "\n\t\t<th scope=\"col\" title=\"$wd\">$day_name</th>";
  }
  
  $calendar_output .= '
  </tr>
  </thead>
  
  <tfoot>
  <tr>';
  
  if ( $previous ) {
  $calendar_output .= "\n\t\t".'<td colspan="3" id="prev"><a href="' . get_month_link($previous->year, $previous->month) . '?post_type='.$cpt.'" title="' . esc_attr( sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($previous->month), date('Y', mktime(0, 0 , 0, $previous->month, 1, $previous->year)))) . '">&laquo; ' . $wp_locale->get_month_abbrev($wp_locale->get_month($previous->month)) . '</a></td>';
  } else {
  $calendar_output .= "\n\t\t".'<td colspan="3" id="prev" class="pad">&nbsp;</td>';
  }
  
  $calendar_output .= "\n\t\t".'<td class="pad">&nbsp;</td>';
  
  if ( $next ) {
  $calendar_output .= "\n\t\t".'<td colspan="3" id="next"><a href="' . get_month_link($next->year, $next->month) . '?post_type='.$cpt.'" title="' . esc_attr( sprintf(__('View posts for %1$s %2$s'), $wp_locale->get_month($next->month), date('Y', mktime(0, 0 , 0, $next->month, 1, $next->year))) ) . '">' . $wp_locale->get_month_abbrev($wp_locale->get_month($next->month)) . ' &raquo;</a></td>';
  } else {
  $calendar_output .= "\n\t\t".'<td colspan="3" id="next" class="pad">&nbsp;</td>';
  }
  
  $calendar_output .= '
  </tr>
  </tfoot>
  
  <tbody>
  <tr>';
  
  // Get days with posts
  $dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date)
  FROM $wpdb->posts WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00'
  AND post_type = '$cpt' AND post_status = 'publish'
  AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59'", ARRAY_N);
  if ( $dayswithposts ) {
  foreach ( (array) $dayswithposts as $daywith ) {
      $daywithpost[] = $daywith[0];
  }
  } else {
  $daywithpost = array();
  }
  
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'camino') !== false || stripos($_SERVER['HTTP_USER_AGENT'], 'safari') !== false)
  $ak_title_separator = "\n";
  else
  $ak_title_separator = ', ';
  
  $ak_titles_for_day = array();
  $ak_post_titles = $wpdb->get_results("SELECT ID, post_title, DAYOFMONTH(post_date) as dom "
  ."FROM $wpdb->posts "
  ."WHERE post_date >= '{$thisyear}-{$thismonth}-01 00:00:00' "
  ."AND post_date <= '{$thisyear}-{$thismonth}-{$last_day} 23:59:59' "
  ."AND post_type = '$cpt' AND post_status = 'publish'"
  );
  if ( $ak_post_titles ) {
  foreach ( (array) $ak_post_titles as $ak_post_title ) {
      /** This filter is documented in wp-includes/post-template.php */
      $post_title = esc_attr( apply_filters( 'the_title', $ak_post_title->post_title, $ak_post_title->ID ) );
  
      if ( empty($ak_titles_for_day['day_'.$ak_post_title->dom]) )
      $ak_titles_for_day['day_'.$ak_post_title->dom] = '';
      if ( empty($ak_titles_for_day["$ak_post_title->dom"]) ) // first one
      $ak_titles_for_day["$ak_post_title->dom"] = $post_title;
      else
      $ak_titles_for_day["$ak_post_title->dom"] .= $ak_title_separator . $post_title;
  }
  }
  
  // See how much we should pad in the beginning
  $pad = calendar_week_mod(date('w', $unixmonth)-$week_begins);
  if ( 0 != $pad )
  $calendar_output .= "\n\t\t".'<td colspan="'. esc_attr($pad) .'" class="pad">&nbsp;</td>';
  
  $daysinmonth = intval(date('t', $unixmonth));
  for ( $day = 1; $day <= $daysinmonth; ++$day ) {
  if ( isset($newrow) && $newrow )
      $calendar_output .= "\n\t</tr>\n\t<tr>\n\t\t";
  $newrow = false;
  
  if ( $day == gmdate('j', current_time('timestamp')) && $thismonth == gmdate('m', current_time('timestamp')) && $thisyear == gmdate('Y', current_time('timestamp')) )
      $calendar_output .= '<td id="today">';
  else
      $calendar_output .= '<td>';
  
  if ( in_array($day, $daywithpost) ) // any posts today?
          $calendar_output .= '<a href="' . get_day_link( $thisyear, $thismonth, $day ) . '?post_type='.$cpt.'" title="' . esc_attr( $ak_titles_for_day[ $day ] ) . "\">$day</a>";
  else
      $calendar_output .= $day;
  $calendar_output .= '</td>';
  
  if ( 6 == calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins) )
      $newrow = true;
  }
  
  $pad = 7 - calendar_week_mod(date('w', mktime(0, 0 , 0, $thismonth, $day, $thisyear))-$week_begins);
  if ( $pad != 0 && $pad != 7 )
  $calendar_output .= "\n\t\t".'<td class="pad" colspan="'. esc_attr($pad) .'">&nbsp;</td>';
  
  $calendar_output .= "\n\t</tr>\n\t</tbody>\n\t</table></div>";
  
  $cache[ $key ] = $calendar_output;
  wp_cache_set( 'get_calendar', $cache, 'calendar' );
  
  if ( $echo )
  echo apply_filters( 'get_calendar',  $calendar_output );
  else
  return apply_filters( 'get_calendar',  $calendar_output );
  }
  