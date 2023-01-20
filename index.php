<?php
/**
 * indexテンプレート
 */

get_header(); ?>

  <main class="page-main">
    <div class="contents-wrap">
      <?php get_template_part('inc/breadcrumb'); ?>
       <p class="title-template">表示中のテンプレート：index.php</p>
       
      <?php while (have_posts() ) : the_post(); ?>
         <h2 class="title-h2"><?php the_title(); ?></h2>
         <?php get_template_part('inc/template'); ?>
       <?php endwhile;?>
    </div>
  </main>

<?php get_footer(); ?>

