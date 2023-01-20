<?php if(get_field('thumb')): ?>
<?php
$phId = get_field('thumb');
$phimg = wp_get_attachment_image_src($phId);
$phAlt = get_post_meta ( get_post ($phId) -> ID , '_wp_attachment_image_alt' , true );
?>
<figure><img src="<?php echo $phimg[0]; ?>" width="<?php echo $phimg[1]; ?>" height="<?php echo $phimg[2]; ?>" alt="<?php echo $phAlt ; ?>"></figure>
<?php endif; ?>

<?php the_content(); ?>

<?php while(has_sub_field('page_article_block01')): $x++; ?>
<?php if( get_sub_field('page_article') ): ?>
    <?php while( the_flexible_field("page_article") ): ?>
        <?php if( get_row_layout() == "page_article_text" ): ?>
            <?php the_sub_field('page_article_editer'); ?>
        <?php elseif( get_row_layout() == "page_article_title02" ): ?>
            <h2 class="title2 conts"><?php the_sub_field('page_article_h2'); ?></h2>
        <?php elseif( get_row_layout() == "page_article_title03" ): ?>
            <h3 class="title3 conts"><?php the_sub_field('page_article_h3'); ?></h3>
        <?php elseif( get_row_layout() == "page_article_title04" ): ?>
            <h4 class="title4 conts"><?php the_sub_field('page_article_h4'); ?></h4>
        <?php elseif( get_row_layout() == "page_article_img01" ): ?>
            <?php if(have_rows('page_article_img')): ?>
                <div class="editer conts">
                <?php while(have_rows('page_article_img')) : the_row();?>
                    <figure>
                        <img src="<?php the_sub_field('page_article_img_figure');?>" alt="">
                        <figcaption><?php the_sub_field('page_article_img_figcaption');?></figcaption>
                    </figure>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_list01" ): ?>
            <?php if(have_rows('page_article_ul')): ?>
                <ul class="dot conts">
                <?php while(have_rows('page_article_ul')) : the_row();?>
                    <li><?php the_sub_field('page_article_ul_li');?></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_list03" ): ?>
            <?php if(have_rows('page_article_ol')): ?>
                <ol class="decimal conts">
                <?php while(have_rows('page_article_ol')) : the_row();?>
                    <li><?php the_sub_field('page_article_ol_li');?></li>
                <?php endwhile; ?>
                </ol>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_list02" ): ?>
            <?php if(have_rows('page_article_dl')): ?>
                <dl class="conts">
                <?php while(have_rows('page_article_dl')) : the_row();?>
                    <div>
                    <dt><?php the_sub_field('page_article_dt');?></dt>
                    <dd><?php the_sub_field('page_article_dd');?></dd>
                    </div>
                <?php endwhile; ?>
                </dl>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_button" ): ?>
            <?php if(have_rows('page_article_btn')): ?>
                <?php while(have_rows('page_article_btn')) : the_row();?>
                    <div class="btn-wrap conts"><a href="<?php the_sub_field('page_article_btn_url');?>" class="btn"><span><?php the_sub_field('page_article_btn_txt');?></span></a></div>
                <?php endwhile; ?>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_column01" ): ?>
            <?php if(have_rows('page_article_column')): ?>
            <?php while(have_rows('page_article_column')) : the_row();?>
                <div class="column-flex box-column2 contents <?php if(get_sub_field('row-revers')): ?>row-revers<?php endif; ?> conts">
                <figure class="img-wrap box-column-size1"><img src="<?php the_sub_field('page_article_img_figure');?>" alt=""></figure>
                <div class="box-column-size1 text-wrap"><?php the_sub_field('page_article_editer'); ?></div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_slide" ): ?>
                <div class="conts">
                <div class="swiper-container">
                <div class="swiper-wrapper">
            <?php if(have_rows('page_article_slide_img')): ?>
            <?php while(have_rows('page_article_slide_img')) : the_row();?>
                <div class="swiper-slide"><img src="<?php the_sub_field('page_article_slide_img_figure');?>" alt=""></div>
            <?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
                </div>
                </div>
            <?php endif; ?>
        <?php elseif( get_row_layout() == "page_article_img02" ): ?>
            <?php if(have_rows('page_article_img')): ?>
                <div class="column-flex2 flex_img conts">
                <?php while(have_rows('page_article_img')) : the_row();?>
                    <figure>
                        <img src="<?php the_sub_field('page_article_img_figure');?>" alt="">
                        <figcaption><?php the_sub_field('page_article_img_figcaption');?></figcaption>
                    </figure>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
