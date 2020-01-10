<?php
$post_id = get_queried_object_id(); // post id
// category id       
$cat_id = wp_get_post_categories($post_id);
$max_excerpt_words = 15;
// getting posts randomly
$random_args = array(
    'posts_per_page' => 10 , // posts limit
    'category__in'   => $cat_id, // only from this category
    'post_type'      => 'post' , // only posts
    'post_status'    => 'publish', // only published
    'orderby'        => 'rand' , // random posts
    'post__not_in'   => array($post_id)  // don't get current post 

);
$random_posts = new WP_Query($random_args); ?>

<!-- the posts container div -->
<div class="recommended-posts-container" id="homeRecommended">
    
    <h2 class="rand-head text-left">
        You May Like 
    </h2>

    <div class="recommend-post-single">
        <?php if($random_posts->have_posts()): // check if there are posts 
            // posts counter
            $x = 0; 
            // echo the posts
            while($random_posts->have_posts()): $random_posts->the_post(); $x += 1; 
                ?>

                <div class="post-rand-li">
                    <div>
                        <!-- image container -->
                        <div class="img-container">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('' , array(
                                    'class' => 'img-responsive' , 
                                    'title' => 'Post Image'
                                )); ?>
                            </a>
                        </div>
                            

                        <div class="header_ex">
                            <!-- category -->
                            <?php 
                                $cat = get_the_category();
                                if(count($cat) > 0){
                                    $name = $cat[0]->name;
                                    $id = $cat[0]->term_id;
                                    $link = get_category_link($id);
                                ?>
                                <a class="category" href="<?php echo $link ?>"><?php echo $name ?></a>
                            <?php } ?>

                            <!-- post title -->
                            <h3 class="post-title">
                                <a href="<?php the_permalink();// link of the post ?>">
                                    <?php the_title(); // title of the post?>
                                </a>
                            </h3>
                            
                            <div class="excerpt">
                                <a href="<?php the_permalink();// link of the post ?>">
                                    <?php 
                                        $excerpt = '';
                                        $words = explode(' ' , get_the_excerpt());
                                        
                                        for($x = 0 ; $x <= $max_excerpt_words && $x < count($words); $x++){
                                            $excerpt .= $words[$x] . ' ';
                                        }
                                        echo $excerpt . '...';
                                    ?>

                                    <span>Read More</span>
                                </a>
                            </div>


                        </div>

                    </div>
                </div>

            <?php endwhile; 
            wp_reset_postdata(); // rest all values 
        endif; ?>

    </div>
    
</div>