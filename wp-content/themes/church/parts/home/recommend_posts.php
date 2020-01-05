<?php 
    $recommended_posts_args = array(
        'post_type'         => 'post',
        'orderby'           => 'ID',
        'order'             => 'DESC',
        'tag'               => 'recommended',
        'posts_per_page'    => 12
    );

    $max_excerpt_words = 15;

    $recommended_posts = new WP_Query($recommended_posts_args); ?>
    <!-- the posts container div -->
    <div class="recommended-posts-container" id="homeRecommended">
        
        <!-- <h2 class="recommend-head text-left">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.481 19.481" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 19.481 19.481">
            <g>
                <path d="m10.201,.758l2.478,5.865 6.344,.545c0.44,0.038 0.619,0.587 0.285,0.876l-4.812,4.169 1.442,6.202c0.1,0.431-0.367,0.77-0.745,0.541l-5.452-3.288-5.452,3.288c-0.379,0.228-0.845-0.111-0.745-0.541l1.442-6.202-4.813-4.17c-0.334-0.289-0.156-0.838 0.285-0.876l6.344-.545 2.478-5.864c0.172-0.408 0.749-0.408 0.921,0z"/>
            </g>
            </svg>
            Recommended Articles 
        </h2> -->

        <div class="recommend-post">
            <?php if($recommended_posts->have_posts()): // check if there are posts 
                // posts counter
                $x = 0; 
                // echo the posts
                while($recommended_posts->have_posts()): $recommended_posts->the_post(); $x += 1; 
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