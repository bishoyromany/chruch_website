<?php 
    $template_url = get_template_directory_uri();
    // cats icons
    $icons = [
        'family-category' => $template_url . '/imgs/categories/family-category.svg',
        'woman-category' => $template_url . '/imgs/categories/woman-category.svg',
        'baby-category' => $template_url . '/imgs/categories/baby-category.svg',
    ];

    $all_cats_args = array(
        'orderby'   => 'ID' , 
        'order'     => 'ASC',
        'parent'    => 0 , 
    );
    $all_cats = get_categories($all_cats_args);
    $limit = 3; 
    $counter = 0;
    if(!empty($all_cats) && $counter <= $limit):
    $counter += $counter +1;
    $y = -1; 
    foreach($all_cats as $cat_info):
        /**
         * check category class 
         */
        $isFirst = false;

        $y = $y + 1;
        if($y % 2 == 0){
            $isFirst = true;
        }else{
            $isFirst = false;
        }

        // category id
        $cat_id = $cat_info->term_id; ?>
        <div class="cat-container <?php echo $isFirst ? 'first_cat' : 'second_cat' ?>">

            <!-- category title -->
            <h2 class="cat-title">
                <a href="<?php echo get_category_link($cat_id); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/family_icon.png" alt="<?php echo $cat_info->name ?>" />
                    <?php echo strtoupper($cat_info->name); ?>
                </a>
            </h2>

            <div class="post-container">
                
                <?php 
                    // get this category posts
                    $cat_posts_args = array(
                        'post_type'     => 'post' , 
                        'cat'           => $cat_id , 
                        'posts_per_page'=> 6    ,
                        'orderby'       => 'ID' , 
                        'order'         => 'DESC'
                    );
                    $cat_posts = new WP_Query($cat_posts_args);
                    // check if posts exist
                    if($cat_posts->have_posts()):
                        // posts counter
                        $x = 0; 
                        // echo the posts
                        echo "<div class='row'>";
                            while($cat_posts->have_posts()): $cat_posts->the_post(); $x += 1; 
                                if($isFirst):
                                 //echo $x == 2 ? '<div class="col-md-4"><div class="row">' : null ?>
                                    <div class="post-rand-li col-md-6
                                    ">
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

                                            <div class="header_ex">
                                                <!-- post title -->
                                                <h3 class="post-title">
                                                    <a href="<?php the_permalink();// link of the post ?>">
                                                        <?php the_title(); // title of the post?>
                                                    </a>
                                                </h3>
                                                
                                                <div class="excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                
                                <?php else: //echo $x == 3 ? '</div"></div></div>' : null ?>
                                    <div class="post-rand-li col-md-12
                                    ">
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
                                                <!-- post title -->
                                                <h3 class="post-title">
                                                    <a href="<?php the_permalink();// link of the post ?>">
                                                        <?php the_title(); // title of the post?>
                                                    </a>
                                                </h3>
                                                
                                                <div class="excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
                                            </div>
                                                

                                            <div class="down_sider">
                                            
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <?php 
                                                            $comments = get_comments_number();
                                                            var_dump($comments);
                                                        ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
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
                                                    </div>

                                                </div>



                                            </div>


                                        </div>

                                    </div>
                                <?php endif; ?>
                            <?php endwhile; 
                        echo "</div>";
                        wp_reset_postdata(); // rest all values 
                    endif;
                ?>

            </div>

        </div>
    <?php endforeach; 
    wp_reset_postdata(); // rest the post data
    endif; ?>