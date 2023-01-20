<?php

/*-----------------------------------------------------------------------------------
ビジュアルエディタで使えるタグを変更する
-----------------------------------------------------------------------------------*/
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
function custom_editor_settings( $initArray ){
	$initArray['block_formats'] = "見出し2=h2; 見出し3=h3; 見出し4=h4; 見出し5=h5; 段落=p; グループ=div; 整形済みテキスト=pre";
	return $initArray;
}


/*-----------------------------------------------------------------------------------
画像アップロード時に大きすぎる画像は縮小する
-----------------------------------------------------------------------------------*/
// この機能を有効にする場合は、次の行のコメントアウトを外してください。
// add_action('wp_handle_upload', 'edit_images_before_upload');
function edit_images_before_upload($file) 
{ 
    if (($file['type'] == 'image/jpeg') ||
				($file['type'] == 'image/gif' ) ||
				($file['type'] == 'image/png' ) ) {
        $image = wp_get_image_editor($file['file']); 
        if (! is_wp_error($image)) { 
            $exif = exif_read_data($file['file']); 
            $max_width = 2000; //最大の幅(px)
            $max_height = 2000; //最大の高さ(px)
            $size = $image->get_size(); 
            $width = $size['width']; 
            $height = $size['height']; 
            if ($width > $max_width || $height > $max_height) { 
                $image->resize($max_width, $max_height, false); 
                $image->save($file['file']); 
            }
        } 
    } 
    return $file; 
} 

/*-----------------------------------------------------------------------------------
 記事のカテゴリを一つしか選べないようにする
-----------------------------------------------------------------------------------*/
// この機能を有効にする場合は、次の行のコメントアウトを外してください。
// add_action( 'admin_print_footer_scripts', 'limit_category_select' );
function limit_category_select() {

?>
		<script type="text/javascript">
			jQuery(function($) {
				// 投稿画面のカテゴリー選択を制限
				var cat_checklist = $('.categorychecklist input[type=checkbox]');
				cat_checklist.click( function() {
					$(this).parents('.categorychecklist').find('input[type=checkbox]').attr('checked', false);
					$(this).attr('checked', true);
				});
				
				// クイック編集のカテゴリー選択を制限
				var quickedit_cat_checklist = $('.cat-checklist input[type=checkbox]');
				quickedit_cat_checklist.click( function() {
					$(this).parents('.cat-checklist').find('input[type=checkbox]').attr('checked', false);
					$(this).attr('checked', true);
				});
				
				$('.categorychecklist>li:first-child, .cat-checklist>li:first-child').before('<p style="padding-top:5px;">カテゴリーは1つだけ選択できます</p>');
			});
		</script>
<?php
	}


/*-----------------------------------------------------------------------------------
 抜粋をカスタマイズ
-----------------------------------------------------------------------------------*/
function get_custom_excerpt( $content=null, $length=30) {
	global $more;
	$more = true;    // more タグ無視で指定した文字数まで出力( more で切る場合は false に)

	if(!$length) {
		$length = 30;    // 抜粋文字数(p、br タグを含む文字数)
	}
	
	if( !$content ) {
		$content = apply_filters( 'the_content', get_the_content("") );
	}
	$content = preg_replace( "/\r\n|\r|\n/", "", trim( $content ) );

	// <p><br>タグは残して、他のタグを削除
	$content = strip_tags( $content, "<p><br>" );
	// <img ～>などを<p>で囲ってた場合、<p></p> の形で残るので削除
	$content = str_replace( "<p></p>", "", $content );

	$content = mb_substr( $content, 0, $length );    //文字列を指定した長さで切り取る

	// <p><br>タグの途中で文字列が切れた場合、中途半端に残ったタグを < が出てくるまで後ろから1文字づつ削除
	while( strrpos( $content, "<" ) > strrpos( $content, ">" ) ) {
		$content = mb_substr( $content, 0, -1 );
	}
	// 最後が<br>だったら削除
	if( substr( $content, -6 ) == "<br />" ) {
		$content = mb_substr( $content, 0, -6 );
	}
	elseif( substr( $content, -4 ) == "<br>" ) {
		$content = mb_substr( $content, 0, -4 );
	}

	// 三点リーダー付ける
	if( substr( $content, -4 ) == "</p>" ) {
		$content = mb_substr( $content, 0, -4 );
		$content .= " ...</p>";
	}
	else if(mb_strlen($content) == 0) { //抜粋の長さが0なら三点リーダーはなし
	}
	else {
		$content .= " ...";
	}

	// <p>タグの終了タグが無くなってた場合は終了タグを補完
	if( strrpos( $content, "<p>" ) > strrpos( $content, "</p>" ) ) {
		$content .= "</p>";
	}

	return $content;
}

/*-----------------------------------------------------------------------------------
アイキャッチ画像のURLを取得

引数：画像サイズ full / medium / large / thumbnail :初期値 full
     （引数なしの場合はfullサイズの画像のURLを返します）
-----------------------------------------------------------------------------------*/
function get_my_post_thumbnail_url($size='full') {
  
	$eyecatch_url = '';
	if (has_post_thumbnail() ){ //アイキャッチ
		$eyecatch_url =  get_the_post_thumbnail_url($post->ID, $size);
	}
	else { 
  	$eyecatch_url = get_template_directory_uri().'/img/eyecatch-dummy.jpg';
	}
	return $eyecatch_url;
}

/*-----------------------------------------------------------------------------------
 記事のカテゴリを取得(リンク付き)
-----------------------------------------------------------------------------------*/
function get_post_category_with_link($taxonomy, $sep = ', ') {
	$str ='';
	if(!$sep) { $sep = ', '; }
	$str = get_the_term_list($post->ID, $taxonomy, '', $sep);

	return $str;
}

/*-----------------------------------------------------------------------------------
 記事のカテゴリを取得(リンクなし)
-----------------------------------------------------------------------------------*/
function get_post_category_without_link($taxonomy, $sep = ', ') {
	$str = '';
	$terms = get_the_terms( get_the_ID(), $taxonomy);
	if ( !empty($terms) && !is_wp_error($terms) ) {
		foreach( $terms as $term ) { 
			$str .= $term->name . $sep;
		}
	}
	return rtrim($str, $sep);
}


/*-----------------------------------------------------------------------------------
 記事のカテゴリを取得(リンクなし)
-----------------------------------------------------------------------------------*/
function get_specific_post_category_without_link($post_id, $taxonomy, $sep = ', ') {
	$str = '';
	$terms = get_the_terms( $post_id,$taxonomy);
	if ( !empty($terms) && !is_wp_error($terms) ) {
		foreach( $terms as $term ) { 
			$str .= $term->name . $sep;
		}
	}
	return rtrim($str, $sep);
}

/*-----------------------------------------------------------------------------------
 現在の記事の投稿タイプの名前（「投稿」など）を取得
-----------------------------------------------------------------------------------*/
function get_current_post_type_label() {
	return esc_html( get_post_type_object(get_post_type())->label );
}


/*-----------------------------------------------------------------------------------
 現在の記事の投稿タイプのスラッグ（「post」など）を取得
-----------------------------------------------------------------------------------*/
function get_current_post_type_slug() {
	return esc_html( get_post_type_object(get_post_type())->name );
}

/*-----------------------------------------------------------------------------------
 URLが画像ファイルか？
-----------------------------------------------------------------------------------*/
function is_image_file($url) {
	return preg_match("([^\s]+(\.(?i)(jpg|png|gif|bmp|webp))$)", $url);
}

/*-----------------------------------------------------------------------------------
 URLが動画ファイルか？
-----------------------------------------------------------------------------------*/
function is_movie_file($url) {
	return preg_match( "/.*?\.mp4/i", $url);
}

/*-----------------------------------------------------------------------------------
 本文の一枚目の画像を取得
-----------------------------------------------------------------------------------*/
function first_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
  if(empty($first_img)){
    $first_img = '';
  }
  return $first_img;
}