<?php // WordPress タームの親・子・孫の一覧に孫タームの投稿一覧を表示する方法
$taxonomy_slug = $args['tax']; // タクソノミースラッグを指定
$post_type_slug = $args['post']; // ポストタイプの指定
$parent_id = $args['id']; // ポストタイプの指定
$parents = get_terms($taxonomy_slug,'parent=0'); // 親のいないタームを取り出します、つまり親
foreach ( $parents as $parent ) { // 親タームのループを開始
// echo '<li><a href="#">' . esc_html($parent->name). '<span>' . esc_html($parent->description). '</span></a>';
// echo '<ul class="hierarchy_01_' . esc_html($parent->term_id). '">';
// echo '<li class="c-slinky__heading">' . esc_html($parent->name). '</li>';
?>

<?php
//$children = get_terms($taxonomy_slug,'hierarchical=0&parent='.$parent->term_id);
$children = get_terms($taxonomy_slug,'hierarchical=0&parent='.$parent_id);
foreach ( $children  as $child ) { // 子タームのループを開始
echo '<li><a href="#">' . esc_html($child->name). '</a>';
echo '<ul class="hierarchy_01_' . esc_html($parent->term_id). '_' . esc_html($child->term_id). '">';
echo '<li class="c-slinky__heading">' . esc_html($child->name). '</li>';
?>

<?php
$grandchildren = get_terms($taxonomy_slug,'hierarchical=0&parent='.$child->term_id);
foreach ( $grandchildren  as $grandson ) { // 孫タームのループを開始
//echo '<li><a href="#">' . esc_html($grandson->name). '</a>'; //////////////////////////////
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
<!--?php echo ' <li><span">' . esc_html($grandson->name). '</span>'; ?-->
<!--?php echo '<ul class="hierarchy_01_' . esc_html($parent->term_id). '_' . esc_html($child->term_id). '_' . esc_html($grandson->term_id). '">'; ?-->
<li class="c-slinky__heading"><?php echo esc_html($grandson->name); ?></li>
<?php while($myquery->have_posts()): $myquery->the_post(); ?>
    <?php if(have_rows('ticket_list')): ?>
    <?php while(have_rows('ticket_list')): the_row(); ?>
    <!-- 繰り返しフィールドの内容ここから -->
    <?php if( get_sub_field('display') ): ?>
    <li>
    <?php if( get_sub_field('ticket_list_url') ): ?>
        <a href="<?php the_sub_field('ticket_list_url'); ?>" class="waribiki <?php echo esc_html($parent->slug). '_' . esc_html($child->slug). '_' . esc_html($grandson->slug); ?><?php if( get_sub_field('ga4') ): ?> <?php the_sub_field('ga4'); ?><?php endif; ?>"><?php else: ?><div class="no_ticket"><span><span>
    <?php endif; ?>
        <?php the_sub_field('ticket_list_title'); ?>
    <?php if( get_sub_field('ticket_list_memo') ): ?>
        <span><?php the_sub_field('ticket_list_memo'); ?></span>
    <?php endif; ?>
    <?php if( get_sub_field('ticket_list_url') ): ?>
    </a><?php else: ?></span></span></div>
    <?php endif; ?>
    </li>
    <?php endif; ?>
    <!-- 繰り返しフィールドの内容ここまで -->
    <?php endwhile; ?>
    <?php endif; ?>
<?php endwhile; ?>
<!--/ul-->
<?php endif; ?>
<?php wp_reset_postdata(); ?>

</li>
<?php } // 子ターム終了 ?>
</ul>
</li>
<?php } // 子ターム終了 ?>
<!-- </ul>
</li> -->
<?php } // 親ターム終了 ?>


