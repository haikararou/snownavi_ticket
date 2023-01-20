<h3><?php echo $args['title']; ?></h3>
<ul class="anker">
    <?php
    $taxonomy_name = $args['tax'];
    $term_id = $args['id'];
    $termchildren = get_term_children( $term_id, $taxonomy_name );
    foreach ( $termchildren as $child ) :?>
    <?php $term = get_term_by( 'id', $child, $taxonomy_name );?>
    <li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
    <?php endforeach; ?>
</ul>

<?php // WordPress タームの親・子・孫の一覧に孫タームの投稿一覧を表示する方法
$term_id = $args['id'];
$taxonomy_slug = $args['tax']; // タクソノミースラッグを指定
$post_type_slug = $args['post']; // ポストタイプの指定
$parents = get_terms($taxonomy_slug,'parent=0'); // 親のいないタームを取り出します、つまり親
foreach ( $parents as $parent ) { // 親タームのループを開始
    $children = get_terms($taxonomy_slug,'hierarchical=0&parent='.$term_id);
    foreach ( $children as $child ) { // 子タームのループを開始
        echo '<h4 id="' . $child->slug . '">' . esc_html($child->name) . '</h4>'; // 子タームのタイトルを表示
        //echo '<ul class="c-page__clm04">';
            $term_slug = $child->slug; // 以下孫タームに紐づく投稿一覧のクエリを設定
            $args = array( // クエリの作成
            'post_type' => $post_type_slug, // ポストタイプを指定
            $taxonomy_slug => $term_slug , // タクソノミーにタームを指定
            'post_status' => 'publish', // 公開された投稿を指定
            'posts_per_page' => -1, // 条件に当てはまる投稿を全て表示
            );
            $myquery = new WP_Query( $args ); // クエリのセット
?>
            <?php if ( $myquery->have_posts()): ?>
            <?php while($myquery->have_posts()): $myquery->the_post(); ?>
                <?php if(have_rows('shop-voucher')): ?>
                    <ul class="c-page__clm04">
                <?php while(have_rows('shop-voucher')): the_row(); ?>
                    <li>
                        <a target="_blank" href="<?php the_sub_field('shop-voucher_url'); ?>">
                            <em><?php the_sub_field('shop-voucher_title'); ?></em>
                            <?php the_sub_field('shop-voucher_txt'); ?>
                            <?php if(have_rows('shop-voucher_ul')): ?>
                            <ul class="astarisk">
                            <?php while(have_rows('shop-voucher_ul')): the_row(); ?>
                            <li><?php the_sub_field('shop-voucher_ul_li'); ?></li>
                            <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endwhile; ?>
                </ul>
                <?php else: ?>
                <?php $locale = get_locale(); if($locale == 'ja'):?>
                <p>該当する施設がありません</p>
                <?php else:?>
                <p>There are no applicable facilities.</p>
                <?php endif;?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    <?php } // 子ターム終了 ?>
    <?php break;?>
<?php } // 親ターム終了 ?>