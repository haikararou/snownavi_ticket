<?php get_header(); ?>

	<div class="c-main__wrapper">
		<section class="c-section c-page news_list">
		<?php $locale = get_locale(); if($locale == 'ja'):?>
			<h1 class="news_list__heading">NEWS<span>ニュース</span></h1>
		<?php else:?>
			<h1 class="news_list__heading">NEWS</h1>
		<?php endif;?>
			<div class="c-page__wrapepr c-post">
				<div class="c-conts">
					<div class="news_list__post">
						<?php if ( have_posts() ): ?>
						<ul class="hierarchy_01">
						<?php while ( have_posts() ): the_post(); ?>
							<li><a href="<?php the_permalink();?>"><dl><dt><?php the_time('Y.m.d') ?></dt><dd><?php the_title(); ?></dd></dl></a></li>
						<?php endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
					<?php wp_pagenavi(); ?>
				</div>
				<?php get_template_part('news/sidebar'); ?>
			</div>
		</section>
	</div>

<?php get_footer(); ?>