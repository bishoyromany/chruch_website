<!-- author meta for single post page -->
<div class="author-meta col-xs-12">

    <div class="name col-md-3 col-xs-12">
        <div class="author-img">
            <?php 
                // author img args
                $image_args = array(
                    'class'   => 'img-thumbnail'
                );
                echo get_avatar(get_the_author_meta('ID') , 96 , '' 
                , get_the_author_meta('Nickname') , $image_args);
            ?> 
        </div>

        <div class="author-posts-count">
            <span>Author Posts </span> : 
            <span class="count"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>
        </div>
    </div>
    <div class="desc-name col-xs-12 col-md-9">
        <a class="first-last-name" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <i class="fa fa-user"></i>
            <?php the_author_meta('first_name') ?>
            <?php the_author_meta('last_name'); ?>
        </a>
        <p class="description">
            <?php if(get_the_author_meta("description")): ?>
                <?php the_author_meta("description") ?>
            <?php else: ?>
                <div class="alert alert-danger">No Information Was Found</div>
            <?php endif; ?>
        </p>
    </div>
</div>