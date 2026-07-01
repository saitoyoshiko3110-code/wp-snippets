<?php 

//繰り返しではない場合 ;?>
<?php if(get_field('company-branch-zip')): ?>〒<?php echo get_field('company-branch-zip'); ?><?php endif; ?>

<?php //シングル繰り返し;?>
<?php if(have_rows('your_repeater_field')): ?>
    <?php while(have_rows('your_repeater_field')): the_row(); ?>
        <?php if(get_sub_field('company-branch-zip')): ?>〒<?php echo get_sub_field('company-branch-zip'); ?><?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>


<?php //※親子繰り返し; ?>
<?php if(have_rows('officer-parent-loop')): ?>
<?php while(have_rows('officer-parent-loop')): the_row(); ?>
    <?php echo get_sub_field('officer-category'); ?>
    <?php if (have_rows('officer-child-loop')) : ?>
    <?php while (have_rows('officer-child-loop')) : the_row(); ?>	
    <?php echo get_sub_field('officer-position'); ?>
    <?php endwhile; ?>
    <?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>


<?php //柔軟なレイアウト; ?>
<?php if( have_rows('section_blocks') ): while( have_rows('section_blocks') ): the_row(); ?>

        <?php // レイアウトA: 見出し・説明・PDF
        if( get_row_layout() == 'text_block' ): ?>
            <div class="mb30">
                <h4 class="subtitle__black-bold mb20"><?php the_sub_field('h4_title'); ?></h4>
                <p class="lh18 fz12sp mb10"><?php echo nl2br(get_sub_field('body_text')); ?></p>
                <?php if( have_rows('pdf_list') ): ?>
                    <ul>
                        <?php while( have_rows('pdf_list') ): the_row(); ?>
                        <li class="pdf-icon"><a href="<?php the_sub_field('pdf_url'); ?>" target="_blank"><?php the_sub_field('pdf_label'); ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        <?php // レイアウトB: dl_block
        elseif( get_row_layout() == 'dl_block' ): ?>

            <div class="mb60">
                <h4 class="subtitle__black-bold mb10"><?php the_sub_field('group_title'); ?></h4>
                <?php $group_first_sentence = get_sub_field('group_first_sentence'); ?>
               <?php if ($group_first_sentence): ?> <p class="lh18 fz12sp mb10"><?php echo esc_html($group_first_sentence); ?></p><?php endif; ?>
                <?php if( have_rows('items') ): while( have_rows('items') ): the_row(); ?>
                    <dl class="flex list__border-bottom__dtw160">
                        <dt class="blue-txt"><?php echo nl2br(get_sub_field('dt_label')); ?></dt>
                        <dd>
                            <?php echo nl2br(get_sub_field('dd_text')); ?>
                            
                            <?php 
                            // ボタンの判定 (エラー対策済み)
                            $btns = get_sub_field('btn_list');
                            if( is_array($btns) && count($btns) > 0 ): ?>
                                <div class="mt10 mb10 <?php echo (count($btns) > 1) ? 'flex gap-20-10' : ''; ?>">
                                    <?php while( have_rows('btn_list') ): the_row(); ?>
                                    <a href="<?php the_sub_field('btn_url'); ?>" class="<?php the_sub_field('btn_class'); ?>"><?php the_sub_field('btn_name'); ?></a>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            
                            <?php 
                            // リストの判定 (エラー対策済み)
                            $subs = get_sub_field('sub_list');
                            if( is_array($subs) && count($subs) > 0 ): ?>
                                <ul class="disc-list mt10 mb10">
                                    <?php while( have_rows('sub_list') ): the_row(); ?>
                                    <li><span class="fw600 fz12sp"><?php the_sub_field('li_title'); ?></span><br><?php echo nl2br(get_sub_field('li_desc')); ?></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </dd>
                    </dl>
                <?php endwhile; endif; ?>
            </div>
        <?php endif; ?>
    <?php endwhile; endif; ?>