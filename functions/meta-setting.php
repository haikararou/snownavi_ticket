<?php
/*---------------------------------------------------------
タイトル出力設定
-----------------------------------------------------------*/
//titleタグの出力
//機能をOFFにしたい場合は、以下をコメントアウトしてください。
add_theme_support( 'title-tag' );


/*---------------------------------------------------------
titleタグのカスタマイズ
-----------------------------------------------------------*/
//タイトルからキャッチフレーズを削除する

function remove_tagline($title) {
  if ( isset($title['tagline']) ) {
    unset( $title['tagline'] );
  }
  return $title;
}
add_filter( 'document_title_parts', 'remove_tagline' );


//セパレータを任意のものに変更する。
function custom_title_separator($sep) {
  $sep = '|';
  return $sep;
}
add_filter( 'document_title_separator', 'custom_title_separator' );


/*meta title以外は、サイト名等の情報を表示しない*/
function edit_document_title($title){
	if(!doing_action('wp_head')){
		$title['tagline'] = '';
		$title['page'] = '';
		$title['site'] = '';
	}
	return $title;
}
add_filter('document_title_parts','edit_document_title');


function change_title_tag( $title ) {
	if(doing_action('wp_head')){
    //条件分岐タグ等を使ってページにより $title を変更する処理
    if (is_single()) {
      $title = get_the_title().' | '.get_current_post_type_label().' | '.get_bloginfo( 'name' );
    } else if ( is_tax() ) {
      $title = single_tag_title('',false).' | '.get_current_post_type_label().' | '.get_bloginfo( 'name' );
    }
  }
  return $title;
}
add_filter( 'pre_get_document_title', 'change_title_tag' );


/*---------------------------------------------------------
descriptionを出力
-----------------------------------------------------------*/
function print_description() {
  if  (is_front_page() || is_home()) {
		echo '白馬八方・栂池・五竜等のスキー場周辺ホテル宿泊施設情報。ホテル旅館ペンション民宿貸別荘を探すならスノーナビ白馬で。夏は白馬村、長野市、安曇野市、松本市周辺の観光、トレッキング、登山情報も。';
  }
	else if (is_page('about')) {
    echo '';
  }
}

/*---------------------------------------------------------
現在のページのURLを出力(OGP設定用)
-----------------------------------------------------------*/
	function print_url() {
    echo (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
/*---------------------------------------------------------
タイトル出力を出力(OGP設定用)
-----------------------------------------------------------*/
function print_ogp_title() {
  if(is_home() || is_front_page()) {
    echo bloginfo('name');
  } else {
    echo wp_get_document_title();
    if(is_singular() && !is_page()) {
      echo ' | ';
      echo get_current_post_type_label();
    }
    if(!is_home()) {
      echo ' | ';
      echo bloginfo('name');
    }
  }
}

/*-----------------------------------------------------------------------------------
OGP画像のURLを取得
投稿・カスタム投稿の記事ページ、固定ページはアイキャッチ画像を使用
その他のページ、アイキャッチがない場合はデフォルトのOGP画像を使用する
-----------------------------------------------------------------------------------*/
function get_ogpimg_url() {
	$ogp_url = '';
  if (is_single() || is_page()) {
    if(has_post_thumbnail() ){
      $ogp_url =  wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
      $ogp_url =  $ogp_url[0];
    }
    else if(is_page('recruit')) {
      $ogp_url = get_template_directory_uri().'/assets/img/recruit/recruit_ogp.jpg';
    } else {
      $ogp_url = first_image();
      if($ogp_url == '' ){
        $ogp_url = get_template_directory_uri().'/assets/img/common/share.jpg';
      }
    }
  }
	else {
    $ogp_url = get_template_directory_uri().'/assets/img/common/share.jpg';
	}
	return $ogp_url;
}

/*-----------------------------------------------------------------------------------
ページのスラッグを取得(Barba.js namespace用)
-----------------------------------------------------------------------------------*/
// function get_page_slug () {
//   $page_slug = '';
//   global $wp_query;
//   $post_obj = $wp_query->get_queried_object();
//   if(is_page()) {
//     $page_slug = $post_obj->post_name;  //固定ページのスラッグ
//   }
//   else if(is_singular()) {
//     $page_slug = get_current_post_type_slug().'-single';  //記事ページのスラッグ
//   }
//   if(is_tax()) {
//     $page_slug =  get_query_var('term');  //カテゴリーアーカイブページのスラッグ
//   }
//   if(is_post_type_archive()) {
//     $page_slug =  get_current_post_type_slug();
//   }
//   return $page_slug;
// }