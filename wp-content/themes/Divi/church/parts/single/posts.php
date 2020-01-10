<?php 
    /*
     ** single post page this is the post
    */
    // loop the data of posts
    if(have_posts()): // cheack if there was posts
        while(have_posts()): the_post(); ?>
            <div class="main-post single-post">

                <!-- edit post -->
                <?php edit_post_link('Edit <i class="fa fa-edit fa-fw"></i>'); ?>

                <!-- image container -->
                <!-- <div class="img-container">
                    <?php the_post_thumbnail('' , array(
                        'class' => 'img-responsive' , 
                        'title' => 'Post Image'
                    )); ?>
                </div> -->

                <div class="data">
                    <!-- post title -->
                    <h1 class="post-title">
                        <a href="<?php the_permalink();// link of the post ?>">
                            <?php the_title(); // title of the post?>
                        </a>
                    </h1>

                    <!-- post author -->
                    <span class="post-author">
                        <i class="fa fa-user fa-fw"></i> 
                        <?php the_author_posts_link(); ?>
                    </span>

                    <!-- post date -->
                    <span class="post-date">
                        <i class="fa fa-calendar fa-fw"></i> 
                        <?php the_date(); // get the author ?>
                    </span>

                    <!-- comments number -->
                    <span class="post-comments">
                        <i class="fa fa-comments fa-fw"></i> 
                        <?php comments_popup_link('No Comments' , 'One Comment' , '( % ) Comments' , 'comment-url' , 'Comments Disabled'); ?>
                    </span>

                    <!-- all shares contaienr -->
                    <span class="share-container">
                        <!-- Your share button code facebook -->
                        <div class="fb-share-button" 
                            data-href="<?php the_permalink(); ?>" 
                            data-layout="button_count" 
                            data-size="large">
                        </div>
                        <!-- twitter share -->
                        <a class="twitter-share-button" 
                        onclick="window.open('https:/\/\\twitter.com/share?url=<?php the_permalink(); ?>','Share News','height=400,width=700'); return false;" 
                        href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/imgs/social/twitter.svg" alt="Twitter">
                            Tweet
                        </a>
                    </span>

                    <!-- post content -->
                    <div class="the-post">
                        <?php the_content(); ?>
                    </div>

                    <!-- categories -->
                    <?php 
                        /*
                            <hr>

                            <p class="post-coategories">
                                <?php the_category(' '); ?>
                            </p> 
                        */ 
                    ?>


                    <div class="next-prev-posts-single">
                        <h4>More Articles : </h4>
                        <!-- gonna create a custom page of next and previous comments -->
                        <?php
                            /*
                            ** get the next and prev posts 
                            */
                            require_once (get_template_directory() . '/parts/single/pagination.php');    
                        ?>
                    </div>

                    <hr>

                    <!-- tags -->
                    <p class="post-tags">
                        <?php 
                            if(has_tag()):
                                the_tags('' , ' ' , '');
                            else:
                                echo '<div class="text-center"><span class="post-no-tags">No Tags Was Found.</span></div>';
                            endif;    
                        ?>
                    </p>


                   <!-- all shares contaienr -->
                   <div class="bottom-shares">
                        <div class="copy">
                            <input type="text" id="copyText" value="<?php the_permalink(); ?>">
                            <button id="copyTextButton">Copy</button>
                        </div>
                        <div class="fix"></div>
                        <!-- Your share button code facebook -->
                        <div class="fb-share-button" 
                            data-href="<?php the_permalink(); ?>" 
                            data-layout="button_count" 
                            data-size="large">
                        </div>
                        <!-- twitter share -->
                        <a class="twitter-share-button" 
                        onclick="window.open('https:/\/\\twitter.com/share?url=<?php the_permalink(); ?>','Share News','height=400,width=700'); return false;" 
                        href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/imgs/social/twitter.svg" alt="Twitter">
                            Tweet
                        </a>
                    </div>


                </div>

            </div>
            <?php
        endwhile;
    endif;
?>
