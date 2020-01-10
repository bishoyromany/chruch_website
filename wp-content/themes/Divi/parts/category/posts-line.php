<div class="cat-design-post-line">
    <!-- post title -->
    <h3 class="post-title">
        <a href="<?php the_permalink();// link of the post ?>">
            <?php the_title(); // title of the post?> 
        </a>
    </h3>
    <!-- post author -->
    <span class="post-author">
        <i class="fa fa-user fa-fw"></i> 
        <?php the_author_posts_link(); ?>
    </span>
    <!-- post date -->
    <span class="post-date">
        <i class="fa fa-calendar fa-fw"></i> 
        <?php echo get_the_date(); // get the author ?>
    </span>
    <!-- comments number -->
    <span class="post-comments">
        <i class="fa fa-comments fa-fw"></i> 
        <?php comments_popup_link('No Comments' , 'One Comment' , '( % ) Comments' , 'comment-url' , 'Comments Disabled'); ?>
    </span>
    <div class="fix"></div>
    <!-- image container -->
    <div class="img-container col-md-3">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('' , array(
                'class' => 'img-responsive img-thumbnail' , 
                'title' => 'Post Image'
            )); ?>
        </a>
    </div>
    <!-- post content -->
    <div class="post-summery col-md-9">
        <?php the_excerpt(); ?>
    </div>
    <hr>
    <div class="fix"></div>
    <!-- categories -->
    <p class="post-coategories"> <i class="fa fa-tags fa-fw fa-lg"></i> 
        <?php the_category(' '); ?>
    </p>
    <!-- tags -->
    <p class="post-tags">
        <?php 
            if(has_tag()):
                the_tags();
            else:
                echo '<span class="post-no-tags">No Tags Was Found.</span>';
            endif;    
        ?>
    </p>
</div>