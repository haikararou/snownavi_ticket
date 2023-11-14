<?php
/*-----------------------------------------------------------------------------------
カスタム投稿タイプの追加
-----------------------------------------------------------------------------------*/
add_action('init', 'create_post_type' );
function create_post_type() {

	//ticket チケット　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'ticket', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( 'チケット' ), // 投稿タイプ名(表示名)
				'singular_name' => __( 'チケット' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'ticket',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
	register_taxonomy(
		'ticket_cat', //タクソノミー名
		'ticket', //カスタム投稿タイプ
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'チケットのエリア',// タクソノミー名（表示名）
			'singular_label' => 'チケットのエリア',// タクソノミー名（表示名）
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'ticket/area', //書き換え後のスラッグ
				//'with_front' => false //通常投稿のパーマリンク構造を引き継ぐかどうか (true/false)
				'hierarchical' => true //階層化したURLを使用可能にする
			)
		)
	);

	//coupon クーポン　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'coupon', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( 'クーポン' ), // 投稿タイプ名(表示名)
				'singular_name' => __( 'クーポン' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'coupon',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
	register_taxonomy(
		'coupon_cat', //タクソノミー名
		'coupon', //カスタム投稿タイプ
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'クーポンのエリア',// タクソノミー名（表示名）
			'singular_label' => 'クーポンのエリア',// タクソノミー名（表示名）
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'coupon/area', //書き換え後のスラッグ
				//'with_front' => false //通常投稿のパーマリンク構造を引き継ぐかどうか (true/false)
				'hierarchical' => true //階層化したURLを使用可能にする
			)
		)
	);

	//hotel-voucher 提携ホテル　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'hotel-voucher', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( '提携ホテル' ), // 投稿タイプ名(表示名)
				'singular_name' => __( '提携ホテル' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'hotel-voucher',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
	register_taxonomy(
		'hotel-voucher_cat', //タクソノミー名
		'hotel-voucher', //カスタム投稿タイプ
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => '提携ホテルのエリア',// タクソノミー名（表示名）
			'singular_label' => '提携ホテルのエリア',// タクソノミー名（表示名）
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'hotel-voucher/area', //書き換え後のスラッグ
				//'with_front' => false //通常投稿のパーマリンク構造を引き継ぐかどうか (true/false)
				'hierarchical' => true //階層化したURLを使用可能にする
			)
		)
	);

	//shop-voucher 提携ショップ　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'shop-voucher', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( '提携ショップ' ), // 投稿タイプ名(表示名)
				'singular_name' => __( '提携ショップ' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'shop-voucher',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
	register_taxonomy(
		'shop-voucher_cat', //タクソノミー名
		'shop-voucher', //カスタム投稿タイプ
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => '提携ショップのエリア',// タクソノミー名（表示名）
			'singular_label' => '提携ショップのエリア',// タクソノミー名（表示名）
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'shop-voucher/area', //書き換え後のスラッグ
				//'with_front' => false //通常投稿のパーマリンク構造を引き継ぐかどうか (true/false)
				'hierarchical' => true //階層化したURLを使用可能にする
			)
		)
	);

	//news ニュース　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'news', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( 'ニュース' ), // 投稿タイプ名(表示名)
				'singular_name' => __( 'ニュース' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'news',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
	register_taxonomy(
		'news_cat', //タクソノミー名
		'news', //カスタム投稿タイプ
		array(
			'hierarchical' => true,
			'update_count_callback' => '_update_post_term_count',
			'label' => 'ニュースのカテゴリ',// タクソノミー名（表示名）
			'singular_label' => 'ニュースのカテゴリ',// タクソノミー名（表示名）
			'public' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'rewrite' => array(
				'slug' => 'news/category', //書き換え後のスラッグ
				//'with_front' => false //通常投稿のパーマリンク構造を引き継ぐかどうか (true/false)
				'hierarchical' => true //階層化したURLを使用可能にする
			)
		)
	);
	//PRINT 割引クーポン印刷　カスタム投稿タイプを追加 //////////////////////////////////////////////////////////////////
	register_post_type( 'print', // 投稿タイプ名(スラッグ)
		array(
			'labels' => array(
				'name' => __( '割引クーポン印刷' ), // 投稿タイプ名(表示名)
				'singular_name' => __( '割引クーポン印刷' )// 投稿タイプ名(表示名)
			),
			'menu_icon' => 'dashicons-clipboard',
			'public' => true,
			'menu_position' =>5,
			'supports' => array('title', 'editor', 'thumbnail'), // この投稿タイプでサポートする機能。
			'has_archive' => true,
			'show_in_rest' => true,
			'rewrite' => array(
			'slug' => 'print',//投稿タイプ名(スラッグ) アーカイブページのURLになります
			'with_front' => false)
		)
	);
}


// URLに「/archives/」が含まれていたら、取り除いてリダイレクト
// $now_addr = (empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
// if(preg_match("/\/archives\//s",$now_addr)){
// 	$new_addr = preg_replace('/\/archives\//s', '/', $now_addr);
// 	// リダイレクト(移動)
// 	header( "Location: $new_addr" ) ;
// 	exit;
// }

/*-----------------------------------------------------------------------------------
カスタム投稿タイプのURLを数字ベースにする
-----------------------------------------------------------------------------------*/
// add_filter( 'post_type_link', 'my_post_type_link', 1, 2 );
// function my_post_type_link( $link, $post ){
// 	// if (('topics' === $post->post_type ) || ('note' === $post->post_type ) ) {
// 	if (('topics' === $post->post_type ) || ('note' === $post->post_type ) ) {
// 		return home_url( '/'.$post->post_type.'/'. $post->ID );
// 	}
// 	else {
// 		return $link;
// 	}
// }

// add_filter( 'rewrite_rules_array', 'my_rewrite_rules_array' );
// function my_rewrite_rules_array( $rules ) {
// 	$args = array('public'   => true, '_builtin' => false);
// 	$output = 'names';
// 	$operator = 'and';
// 	$post_types = get_post_types( $args, $output, $operator );
// 	$new_rules = array(
// 		'topics/([0-9]+)/?$' => 'index.php?post_type=topics&p=$matches[1]',
// 		'note/([0-9]+)/?$' => 'index.php?post_type=note&p=$matches[1]'
// 	);

// 	return $new_rules + $rules;
// }

/*-----------------------------------------------------------------------------------
カスタム投稿タイプのパーマリンク設定
-----------------------------------------------------------------------------------*/
add_rewrite_rule('ticket/category/([^/]+)/?$', 'index.php?ticket_cat=$matches[1]', 'top');
add_rewrite_rule('ticket/category/([^/]+)/page/([0-9]+)/?$', 'index.php?ticket_cat=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('coupon/category/([^/]+)/?$', 'index.php?coupon_cat=$matches[1]', 'top');
add_rewrite_rule('coupon/category/([^/]+)/page/([0-9]+)/?$', 'index.php?coupon_cat=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('hotel-voucher/category/([^/]+)/?$', 'index.php?hotel-voucher_cat=$matches[1]', 'top');
add_rewrite_rule('hotel-voucher/category/([^/]+)/page/([0-9]+)/?$', 'index.php?hotel-voucher_cat=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('shop-voucher/category/([^/]+)/?$', 'index.php?shop-voucher_cat=$matches[1]', 'top');
add_rewrite_rule('shop-voucher/category/([^/]+)/page/([0-9]+)/?$', 'index.php?shop-voucher_cat=$matches[1]&paged=$matches[2]', 'top');
add_rewrite_rule('news/category/([^/]+)/?$', 'index.php?news_cat=$matches[1]', 'top');
add_rewrite_rule('news/category/([^/]+)/page/([0-9]+)/?$', 'index.php?news_cat=$matches[1]&paged=$matches[2]', 'top');




//パーマリンクからタクソノミー名を削除
function my_custom_post_type_permalinks_set($termlink, $term, $taxonomy){
	return str_replace('/'.$taxonomy.'/', '/', $termlink);
}
add_filter('term_link', 'my_custom_post_type_permalinks_set',11,3);


/*-----------------------------------------------------------------------------------
カスタム投稿のアーカイブページの記事数を設定する。
-----------------------------------------------------------------------------------*/
// add_action('pre_get_posts', 'my_pre_get_posts');
// function my_pre_get_posts($query) {
// 	if(!is_admin() && $query->is_main_query()) {
// 		if (is_post_type_archive('works') || is_tax('works_cat') || is_tax('works_tag')) {
// 			$query->set('posts_per_page', -1);
// 		}
// 		if (is_post_type_archive('member')) {
// 			$query->set('posts_per_page', -1);
// 		}
// 		if (is_tax()) {
// 			$query->set('orderby', 'menu_order');
// 			$query->set('order', 'asc');
// 		}
// 	}
// }


/*-----------------------------------------------------------------------------------
SearchFilter：検索対象にカスタム投稿を追加
-----------------------------------------------------------------------------------*/
add_action( 'pre_get_posts','SearchFilter' );
function SearchFilter($query) {
	if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
	$query->set('post_type', array('post', 'page')); // arrayの中にカスタム投稿タイプ名を追加する。
	}
}
