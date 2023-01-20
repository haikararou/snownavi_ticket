<?php
/**
 * 記事ページのテンプレート
 */
get_header(); ?>

	<div class="c-main__wrapper">
		<section class="c-section c-page news_list">
		<?php $locale = get_locale(); if($locale == 'ja'):?>
			<h1 class="news_list__heading">NEWS<span>ニュース</span></h1>
		<?php else:?>
			<h1 class="news_list__heading">NEWS</h1>
		<?php endif;?>
			<div class="c-page__wrapepr c-post">
				<div class="c-conts">
					<article class="c-article">
						<div class="c-article__meta"><?php the_time('Y.m.d'); ?></div>
						<h3><?php the_title(); ?></h3>
						<div class="c-article__body">
						<?php get_template_part('inc/template'); ?>
						</div>
						<div class="c-article__nav">
							<ul>
								<?php
								$prev = get_adjacent_post(false,'',true);
								if($prev) {
									echo '<li class="prev"><a href="'.get_permalink($prev).'"><span>prev</span></a></li>';
								}
								?>
								<?php $locale = get_locale(); if($locale == 'ja'):?>
								<li class="center"><a href="<?php echo home_url('/news'); ?>">一覧へ戻る</a></li>
								<?php else:?>
								<li class="center"><a href="<?php echo home_url('/en/news'); ?>">news</a></li>
								<?php endif;?>
								<?php
								$next = get_adjacent_post(false,'',false);
								if($next) {
									echo '<li class="next"><a href="'.get_permalink($next).'"><span>next</span></a></li>';
								}
								?>
							</ul>
						</div>
					</article>
				</div>
				<?php get_template_part('news/sidebar'); ?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>

