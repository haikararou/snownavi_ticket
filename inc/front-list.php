<?php // WordPress タームの親・子・孫の一覧に孫タームの投稿一覧を表示する方法
$term_id = $args['id'];
$taxonomy_slug = $args['tax']; // タクソノミースラッグを指定
$post_type_slug = $args['post']; // ポストタイプの指定
$parents = get_terms($taxonomy_slug,'parent=0'); // 親のいないタームを取り出します、つまり親
foreach ( $parents as $parent ) { // 親タームのループを開始
    $children = get_terms($taxonomy_slug,'hierarchical=0&parent='.$term_id);
    foreach ( $children as $child ) { // 子タームのループを開始
        echo '<div class="c-gooddeal__area__box">';
        echo '<h4>' . esc_html($child->name) . '<span></span></h4>'; // 子タームのタイトルを表示
        echo '<ul>';
        $grandchildren = get_terms($taxonomy_slug,'hierarchical=0&parent='.$child->term_id);
        foreach ( $grandchildren  as $grandson ) { // 孫タームのループを開始
            $term_slug = $grandson->slug; // 以下孫タームに紐づく投稿一覧のクエリを設定
            $args = array( // クエリの作成
            'post_type' => $post_type_slug, // ポストタイプを指定
            $taxonomy_slug => $term_slug , // タクソノミーにタームを指定
            'post_status' => 'publish', // 公開された投稿を指定
            'posts_per_page' => -1 // 条件に当てはまる投稿を全て表示
            );
            $myquery = new WP_Query( $args ); // クエリのセット
?>
            <?php if ( $myquery->have_posts()): ?>
                <li><a href="<?php echo home_url(); ?>/<?php echo $post_type_slug; ?>/?a=_01&b=_<?php echo $term_id; ?>&c=_<?php echo $child->term_id; ?>#d_<?php echo $grandson->term_id; ?>"><?php echo esc_html($grandson->name); ?>
            <?php while($myquery->have_posts()): $myquery->the_post(); ?>
                <!-- <span><?php the_title(); ?></span> -->
                <?php if(have_rows('ticket_list')): ?>
                <?php while(have_rows('ticket_list')): the_row(); ?>
                <!-- 繰り返しフィールドの内容ここから -->
                <?php if( get_sub_field('display') ): ?>
                <span><?php the_sub_field('ticket_list_title'); ?>
                <?php if( get_sub_field('ticket_list_memo') ): ?>
                <span><?php the_sub_field('ticket_list_memo'); ?></span>
                <?php endif; ?>
                </span>
                <?php endif; ?>
                <!-- 繰り返しフィールドの内容ここまで -->
                <?php endwhile; ?>
                <?php endif; ?>

            <?php endwhile; ?>
                </a></li>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <?php } // 孫ターム終了 ?>
        </ul>
    </div>
    <?php } // 子ターム終了 ?>
    <?php break;?>
<?php } // 親ターム終了 ?>