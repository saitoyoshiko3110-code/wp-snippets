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