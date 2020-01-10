<?php 
$template_url = get_template_directory_uri();

// posts query
$cat_posts_args = array(
    'post_type'     => 'post' , 
    'cat'           => $cat   ,
    // 'posts_per_page'=> 1      , 
    'orderby'       => 'ID'   ,
    'order'         => 'DESC' ,
    'paged'         => get_query_var('paged'),
);
$cat_posts = new WP_Query($cat_posts_args);

$max_excerpt_words = 35;
$limit = 3; 
$counter = 0;
?>
<div class="cat-container category_section_of_posts">
<div class="post-container">

    <?php 
    // all posts
    if($cat_posts->have_posts()):
        // posts counter
        $x = 0; 
        // echo the posts
        echo "<div class='row'>";
            while($cat_posts->have_posts()): $cat_posts->the_post(); ?>
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
            <?php endwhile; 
        echo "</div>";
        wp_reset_postdata(); // rest all values 
    endif; ?>
</div>
</div>
