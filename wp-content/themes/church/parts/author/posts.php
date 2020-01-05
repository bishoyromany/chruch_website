<!-- user posts -->
<div class="author-posts">
    <?php 
    $template_url = get_template_directory_uri();
    $max_excerpt_words = 35;

    $posts_per_page = 10 ;
    // get the user posts
    $author_posts_args = array(
        'author' => $author_id , 
        'posts_per_page' => $posts_per_page 
    );
    $author_query = new WP_Query($author_posts_args);

    if($author_query->have_posts()): // cheack if there was posts ?>
        <h2 class="text-center posts-head"><?php the_author_meta("first_name"); ?>'s Latest
            <?php if($posts_per_page <= $count_posts): echo $posts_per_page ; endif; ?>
            Posts
        </h2>
        <div class="fix"></div>
        <div class="cat-container category_section_of_posts">
            <div class="post-container">
            <?php
                while($author_query->have_posts()):
                    $posts_args = array(
                        'posts_per_page' => 10 
                    );
                    $author_query->the_post($posts_args); ?>

                        <div class="post-rand-li col-md-6">
                            <div>
                                <!-- image container -->
                                <div class="img-container">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('' , array(
                                            'class' => 'img-responsive' , 
                                            'title' => 'Post Image'
                                        )); ?>
                                    </a>
                                    <!-- read more hover effect -->
                                    <a class="read_more" href="<?php the_permalink(); ?>">
                                        <div>
                                            <span>
                                                Read More
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                
                                <!-- text content -->
                                <div class="header_ex">
                                    <!-- post title -->
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink();// link of the post ?>">
                                            <?php the_title(); // title of the post?>
                                        </a>
                                    </h3>
                                    
                                    <div class="excerpt">
                                        <?php   
                                            $excerpt = '';
                                            $words = explode(' ' , get_the_excerpt());
                                            for($v = 0 ; $v <= $max_excerpt_words && $v < count($words) ; $v++){
                                                $excerpt .= $words[$v] . ' ';
                                            }

                                            echo $excerpt. '...';
                                        ?>
                                    </div>
                                </div>
                                
                                <!-- border bottom -->
                                <div class="comments_section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="pull-left">
                                                <div class="comments">
                                                    <img src="<?php echo $template_url ?>/imgs/categories/comment.svg" alt="Comments">
                                                    <div class="count"><?php echo get_comments_number(); ?></div>
                                                    Comments
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="pull-right">
                                                <!-- category -->
                                                <?php 
                                                    /*
                                                    if(isset($cat)){
                                                        $name = $cat->name;
                                                        $id = $cat->term_id;
                                                        $link = get_category_link($id);
                                                    ?>
                                                    <a class="category" href="<?php echo $link ?>">
                                                        <img src="<?php echo $icons[$cat_info->slug]; ?>" alt="<?php echo $cat_info->name; ?>">
                                                        <?php echo $name ?>
                                                    </a>
                                                    <?php } */ 
                                                ?>
                                            </div>
                                        </div>
                                    </div>                                   

                                </div>
                            </div>
                        </div>

                    <?php
                endwhile;
                /* 
                ** reset it after finishing the wordpress query
                */
                wp_reset_postdata(); // reset the posts query 
    endif; ?>
        </div>
    </div>
</div>