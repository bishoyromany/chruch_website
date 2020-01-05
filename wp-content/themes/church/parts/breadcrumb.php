<?php 
    $all_cats = get_the_category();
?>
<div class="breadcrumb-container">
    <ol class="breadcrumb">
        <li><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?> <i class="fa fa-home fa-fw"></i></a></li> <i class="fa fa-arrow-right fa-fw"></i>
        <?php if(!is_author()): ?>
            <li><a href="<?php echo esc_url(get_category_link($all_cats[0]->term_id)); ?>"><?php echo esc_html($all_cats[0]->name); ?></a></li> <i class="fa fa-arrow-right fa-fw"></i>
            <li class="last-one"><?php echo get_the_title(); ?></li>
        <?php else: ?>
            <li> <i class="fa fa-user fa-fw"></i> <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?></li>
        <?php endif; ?>
    </ol>
</div>