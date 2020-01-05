<div class="cutom-sidebar cutom">
    <?php $directory_uri = get_template_directory_uri(); ?>

    <!-- free book -->
    <div class="box free_book">
        <img src="<?php echo $directory_uri ?>/imgs/book/book.png" class="img-responsive" alt="Book">
        <div class="form">
            <form  action="/subscribe-news-letters-pergenancy" method="post">
                <div class="data">
                    <input type="email" name="email" placeholder="Write Your Email">
                    <input type="hidden" name="get_free_book" value="yes">
                    <button>
                        <img src="<?php echo $directory_uri ?>/imgs/book/book_heart.svg" alt="Supmit">
                    </button>
                </div>
            </form>
            <h2 class="text-center">Get It Now For Free</h2>
        </div>
    </div>

    <!-- patreon -->
    <div class="box patreon">
        <a href="#" target="_blank">
            <h2>
                <span class="white">Support Us</span>
                <span class="orange">On Patreon</span>
            </h2>

            <div class="arrow">
                <img class="img-responsive" src="<?php echo $directory_uri ?>/imgs/patreon/arrow.svg" alt="Arrow">
            </div>

            <div>
                <img class="img-responsive" src="<?php echo $directory_uri ?>/imgs/patreon/patreon.svg" alt="Patreon">
            </div>
        </a>

    </div>

    <!-- chat -->
    <div class="box chat">
        <h3>
            <img src="<?php echo get_template_directory_uri(); ?>/imgs/chat/chat.svg" alt="Chat" /><span>Chat</span>
        </h3>
        <div class="chat_container"></div>
    </div>

    <!-- recent posts -->
    <div class="box recent">
        <h3>
            <img src="<?php echo get_template_directory_uri(); ?>/imgs/posts/star.svg" alt="Star" /><span>Recent Posts</span>
        </h3>
        <div class="post-container">
            <?php

                $recent_posts_args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 5     ,
                    'post_status'           => 'publish',
                    'orderby'               => 'ID',
                    'order'                 => 'DESC'
                ); 
                $recent_posts = new WP_Query($recent_posts_args);
                
                while($recent_posts->have_posts()):
                    $recent_posts->the_post(); ?>
                    <div class="post">
                        <div class="row">

                            <div class="col-xs-4">
                                <div class="img-container">
                                    <?php 
                                        // check if image exist or know
                                        if(get_the_post_thumbnail_url()):
                                            $img_link = get_the_post_thumbnail_url();
                                        else:
                                            $img_link =  get_template_directory_uri()."/imgs/404.png";
                                        endif;
                                    ?>
                                    <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo $img_link; ?>" alt="post image" class="img-responsive"></a>
                                </div>
                            </div>

                            <div class="col-xs-8">

                                <h4 class="post-head">
                                    <a href="<?php echo get_permalink(); ?>" target="_blank">
                                        <?php 
                                            $max_title_words = 5;
                                            $title = '';
                                            $title_words = explode(' ' , get_the_title());
                                            for($xx = 0 ; $xx <= $max_title_words && $xx < count($title_words) ; $xx++){
                                                $title .= $title_words[$xx].' ';
                                            }
                                            echo $title.'...';
                                        ?>
                                    </a>
                                </h4>

                                <div class="post_info">
                                    <div class="date">
                                        <?php the_date(); ?>
                                    </div>
                                    <div class="comments">
                                        <span><?php echo get_comments_number() ?></span> Comments
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <div class="fix"></div>
        </div>    
    </div>

    <!-- you may like posts -->
    <div class="box recent">
        <h3>
            <img src="<?php echo get_template_directory_uri(); ?>/imgs/posts/heart.svg" alt="Heart" /><span>You May Like</span>
        </h3>
        <div class="post-container">
            <?php
                $recent_posts_args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 5     ,
                    'post_status'           => 'publish',
                    'orderby'               => 'rand',
                ); 
                $recent_posts = new WP_Query($recent_posts_args);
                
                while($recent_posts->have_posts()):
                    $recent_posts->the_post(); ?>
                    <div class="post">
                        <div class="row">

                            <div class="col-xs-4">
                                <div class="img-container">
                                    <?php 
                                        // check if image exist or know
                                        if(get_the_post_thumbnail_url()):
                                            $img_link = get_the_post_thumbnail_url();
                                        else:
                                            $img_link =  get_template_directory_uri()."/imgs/404.png";
                                        endif;
                                    ?>
                                    <a href="<?php echo get_permalink(); ?>">
                                    <img src="<?php echo $img_link; ?>" alt="post image" class="img-responsive"></a>
                                </div>
                            </div>

                            <div class="col-xs-8">

                                <h4 class="post-head">
                                    <a href="<?php echo get_permalink(); ?>" target="_blank">
                                        <?php 
                                            $max_title_words = 5;
                                            $title = '';
                                            $title_words = explode(' ' , get_the_title());
                                            for($xx = 0 ; $xx <= $max_title_words && $xx < count($title_words) ; $xx++){
                                                $title .= $title_words[$xx].' ';
                                            }
                                            echo $title.'...';
                                        ?>
                                    </a>
                                </h4>

                                <div class="post_info">
                                    <div class="date">
                                        <?php the_date(); ?>
                                    </div>
                                    <div class="comments">
                                        <span><?php echo get_comments_number() ?></span> Comments
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>

            <div class="fix"></div>
        </div>    
    </div>

    <!-- hottest post -->
    <div class="hottest-post box">
        <h3><img src="<?php echo get_template_directory_uri(); ?>/imgs/hot.png" alt="Hottest Post" /><span>Hottest Article</span></h3>
        <div class="post-container">
            <?php 
                $hottest_post_args = array(
                    'post_type'     => 'post' , 
                    'posts_per_page'=> 1 , 
                    'orderby'       => 'comment_count' , 
                    'order'         => 'DESC'
                );
                $hottest_post = new WP_Query($hottest_post_args);
                while($hottest_post->have_posts()):
                    $hottest_post->the_post(); ?>
                    <div class="post">
                        <div class="img-container">
                            <?php 
                                // check if image exist or know
                                if(get_the_post_thumbnail_url()):
                                    $img_link = get_the_post_thumbnail_url();
                                else:
                                    $img_link =  get_template_directory_uri()."/imgs/404.png";
                                endif;
                            ?>
                            <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php echo $img_link; ?>" alt="post image" class="img-responsive"></a>
                        </div>
                        <h4 class="post-head"><a href="<?php echo get_permalink(); ?>" target="_blank">
                        <?php the_title(); ?></a></h4>
                        <a class="post-info" href="<?php echo get_permalink(); ?>" target="_blank">
                            <div class="ex-con">
                                <?php echo the_excerpt() ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            ?>
        </div>                      
    </div>

    <!-- custom categories list -->
    <div class="custom-cats box">
        <div>
            <h3><img src="<?php echo get_template_directory_uri() . '/imgs/categories/list.svg' ?>" alt="Categories"> <span>Categories</span></h3>
            <?php 
                // get categories list
                $list_cats_args = array(
                    'hide_title_if_empty' => true,
                    'hierarchical'        => true,
                    'show_count'          => false,
                    'show_option_none'    => __( 'No categories' ),
                    'title_li'            => null,
                    'use_desc_for_title'  => 1,
                    'parent'              => 0,
                );
            ?>
            <ul class="cats-container">
                <?php wp_list_categories($list_cats_args); ?>
            </ul>
        </div>
    </div>

    <?php if(is_category()): ?>
        <!-- category info -->
        <div class="current-cat-info box">
            <h3><span><?php single_cat_title(); ?> info <i class="fa fa-info fa-fw"></i></span></h3>
            <?php 
                // get comments count of this category
                $comments_count_args = array(
                    'status'    => 'approve', // only approved comments
                );
                $comments_count = 0 ;
                $all_c_count = get_comments($comments_count_args);
                foreach($all_c_count as $c_count):
                    $post_id = $c_count->comment_post_ID; // post id of comments
                    if(!in_category( get_query_var('cat') ,$post_id)):
                        continue;
                    endif;
                    $comments_count++; // counter
                endforeach;
            ?>
            <?php 
                $cat_info= get_queried_object();
                $posts_count = $cat_info->count;
            ?>
            <!-- post count -->
            <div class="posts-count">
                <span>Posts Count : </span>
                <?php echo $posts_count; ?>
            </div>
            <!-- comments count -->
            <div class="comments-count">
                <span>Comments Count <i class="fa fa-comments fa-fw"></i> : </span> 
                <?php echo $comments_count; ?>
            </div>
        </div>
    <?php endif; ?>



    <!-- custom search box -->
    <!-- <div class="search box">
        <h3><span>Search <i class="fa fa-search fa-fw"></i></span></h3>
        <form role="search" method="get" id="searchform" class="searchform form-horizental" action="<?php echo get_site_url(); ?>">
            <div>
                <input type="text" class="form-control" value="" name="s" id="s" placeholder="Search For A Post...">
                <button><i class="fa fa-search fa-fw"></i></button>
            </div>
        </form>
    </div> -->

    <!-- be in touch -->
    <!-- <div class="fb-box box">
        <h3><span>Be In Touch</span></h3>
        <div class="fb-page" data-href="https://www.facebook.com/TechDev-Websites-324417348213498" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/TechDev-Websites-324417348213498" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/TechDev-Websites-324417348213498">TechDev Websites</a></blockquote></div>
    </div> -->
    <!-- custom latest posts -->
    <!-- <div class="recent-posts box">
        <h3>
            <span>Latest Articles <img src="<?php echo get_template_directory_uri(); ?>/imgs/new_star.png" alt="Latest News" /> </span>
        </h3>
        <div class="post-container">
            <?php
                $recent_posts_args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 3     ,
                    'post_status'           => 'publish',
                    'orderby'               => 'ID',
                    'order'                 => 'DESC'
                ); 
                $recent_posts = new WP_Query($recent_posts_args);
                while($recent_posts->have_posts()):
                    $recent_posts->the_post(); ?>
                    <div class="post">
                        <div class="img-container">
                            <?php 
                                // check if image exist or know
                                if(get_the_post_thumbnail_url()):
                                    $img_link = get_the_post_thumbnail_url();
                                else:
                                    $img_link =  get_template_directory_uri()."/imgs/404.png";
                                endif;
                            ?>
                            <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php echo $img_link; ?>" alt="post image" class="img-responsive"></a>
                        </div>
                        <h4 class="post-head"><a href="<?php echo get_permalink(); ?>" target="_blank">
                        <?php the_title(); ?></a></h4>
                        <a class="post-info" href="<?php echo get_permalink(); ?>" target="_blank">
                            <div class="ex-con">
                                <?php echo the_excerpt() ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            ?>
            <div class="fix"></div>
        </div>
    </div> -->



    <!-- custom random posts -->
    <!-- <div class="rand-posts box">
        <h3><span>You May Like <img src="<?php echo get_template_directory_uri(); ?>/imgs/may_like.png" alt="Hottest Post" /> </span></h3>
        <div class="post-container">
            <?php
                $recent_posts_args = array(
                    'post_type'             => 'post',
                    'posts_per_page'        => 6     ,
                    'post_status'           => 'publish',
                    'orderby'               => 'rand',
                ); 
                $recent_posts = new WP_Query($recent_posts_args);
                while($recent_posts->have_posts()):
                    $recent_posts->the_post(); ?>
                    <div class="post">
                        <div class="img-container">
                            <?php 
                                // check if image exist or know
                                if(get_the_post_thumbnail_url()):
                                    $img_link = get_the_post_thumbnail_url();
                                else:
                                    $img_link =  get_template_directory_uri()."/imgs/404.png";
                                endif;
                            ?>
                            <a href="<?php echo get_permalink(); ?>">
                            <img src="<?php echo $img_link; ?>" alt="post image" class="img-responsive"></a>
                        </div>
                        <h4 class="post-head"><a href="<?php echo get_permalink(); ?>" target="_blank">
                        <?php the_title(); ?></a></h4>
                        <a class="post-info" href="<?php echo get_permalink(); ?>" target="_blank">
                            <div class="ex-con">
                                <?php echo the_excerpt() ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            ?>
            <div class="fix"></div>
        </div>
    </div> -->

    <!-- custom ad area -->
    <!-- <div class="a-d box">
        <h3><span>Ads<i class="fa fa-ad fa-fw"></i></span></h3>
        <div class="ad">
            300 X 236
        </div>
    </div> -->

    <!-- custom ad area -->
    <!-- <div class="a-d-s hidden box">
        <div class="ad">
            300 X 236
        </div>
    </div>    -->
    
</div>
