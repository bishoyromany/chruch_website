<!-- user comments section -->
<div class="row author-comments-section">
<div class="col-md-9 col-md-push-3">
    <?php 
        $comments_num = 6 ;
        // the comemnts query args
        $comment_args_author = array(
            'include_unapproved' => false, // don't include unapproved
            'ID' => $author_id, // the author id
            'number' => $comments_num, // number of comments
        );
        // comments query
        $comments_query = new WP_Comment_Query;
        $comments = $comments_query->query($comment_args_author);
    ?>
    <h2 class="text-center"><?php the_author_meta('first_name'); ?>'s Latest <?php 
     if($comments_num <= $count_comments):
        echo $comments_num; endif;
    ?>
    Comments <i class='fa fa-comments fa-fw'></i>
    </h2>
    
    <?php if($comments): 
        foreach($comments as $comment): // foreach the comments
            $post_title = get_the_title($comment->comment_post_ID);
            $post_link  = get_permalink($comment->comment_post_ID); ?>
        <div class="comment">
            <h4 class="post"><a href="<?php echo $post_link ?>"><?php echo $post_title ?></a></h4>
            <span class="date"><?php echo mysql2date('l, F j, Y' , $comment->comment_date , true) ?> 
            <i class="fa fa-calendar fa-fw"></i></span>
            <div class="content"><?php echo $comment->comment_content ?></div>
        </div>
        <?php endforeach; 
            else : echo 'no comments was found';
            endif; ?>  

</div>
</div>