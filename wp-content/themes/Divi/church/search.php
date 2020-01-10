<?php get_header(); ?>
<?php $search_phrase = isset($_GET['s']) ? FILTER_VAR($_GET['s'],FILTER_SANITIZE_STRING) : null ; ?>
<?php 
    $template_url = get_template_directory_uri();
    $max_excerpt_words = 35;
    // get the posts search args
    $search_posts_args = array(
        's'              => $search_phrase, 
        'post_type'      => 'post', 
        // 'posts_per_page' => 10,
        'orderby'        => 'ID', 
        'order'          => 'DESC', 
        'paged'         => get_query_var('paged'),
    );
    // get the all posts to be ready to be fetched
    $search_posts = new WP_Query($search_posts_args);
?>

<div class="search-container container">
    <div class="row">
       
        <!-- posts container -->
        <div class="col-md-9">
            <!-- search form and header in the same time -->
            <div class="search col-md-12">
                <form role="search" method="get" id="searchform" class="searchform form-horizental" action="<?php echo get_site_url(); ?>">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo $search_phrase; ?>" name="s" id="s" placeholder="Search for something...">
                        </div>
                        <button class="col-md-2 button-search">Search <i class="fa fa-search fa-fw"></i></button>
                    </div>
                </form>
            </div>

            <div class="cat-container category_section_of_posts">
                <div class="post-container">

                    <?php

                        if($search_posts->have_posts()):
                            while($search_posts->have_posts()):
                                $search_posts->the_post(); 
                        ?>

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
                                        <div class="header_ex" style="padding : 0px;">
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
                                                            if(count(get_the_category()) > 0){
                                                                $cat = get_the_category()[0];
                                                                $name = $cat->name;
                                                                $id = $cat->term_id;
                                                                $link = get_category_link($id);
                                                            ?>
                                                            <a class="category" href="<?php echo $link ?>">
                                                                <?php echo $name ?>
                                                            </a>
                                                            <?php } 
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>                                   
                                        </div>

                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>
                
                    <?php endif; ?>


                </div>
            </div>
                
            <div class="fix"></div>
                                                    
            <div class="pagination">
                <?php echo paginate_links(); ?>
            </div>
        </div>

        <!-- aside container -->
        <div class="col-md-3">
            <?php 
                /*
                 ** get the sidebar 
                */
                get_sidebar();
            ?>
        </div>
        
    </div>
</div>

<?php get_footer(); ?>