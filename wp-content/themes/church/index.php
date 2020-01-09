<?php 
    /* 
    ** This function get the page header 
    */
    get_header(); 

?>
<!-- all posts container -->
<?php 
    /**
     * get the images slider
     */
    // require_once (get_template_directory() . "/parts/home/images_slider.php");
?>

<div class="cotainer_all_data">
    <?php 
        /**
         * get the Recommended posts for main page
         */
    ?>
    <div class="container">
        <div class="row">
            <!-- left sidebar -->
            <!-- <div class="col-md-3"> -->
                <?php //require_once (get_template_directory() . "/left_sidebar.php"); ?>
            <!-- </div> -->

            <div class="col-md-9 content_center">
                <?php 
                    /**
                     * get the Recommended posts for main page
                     */
                    require_once (get_template_directory() . "/parts/home/recommend_posts.php");
                ?>          
            </div>
            
            <?php 
                /**
                 * get the main cats posts max 5
                 */
                $pages = me_pages_menu();
                $x = 0;
                foreach($pages as $page){
                    $x ++;
                    $id = get_post_meta($page->ID , '_menu_item_object_id', true);
                    $page = get_post($id);
                    /**
                     * get the page title and subtitle
                     */
                    $title = $page->post_title; 
                    $url = get_page_link($page->ID);
                    if (has_post_thumbnail($page->ID)): 
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID))[0]; 
                    else: 
                        $image = false;
                    endif;
                    if($x < 4):
                    ?>
                        <div class="col-md-3 pages-container-home">
                            <div class="content text-center">
                                <!-- image container -->
                                <a class="img-container" href="<?php echo $url; ?>">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                                </a>
                                <h3> <a href="<?php echo $url; ?>"> <?php echo $title; ?></a></h3>
                                <?php if(strlen($page->post_content)): ?>
                                    <p><?php echo $page->post_content; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: 
                        if($x == 4){
                            echo "<div class='clear'></div>";
                        }    
                        
                    ?>
                        <div class="pages-container-home-flex move-left" style="
                        <?php if($x == 4){echo 'margin-left:5px;';} ?> ">
                            <div class="content text-center">
                                <!-- image container -->
                                <a class="img-container" href="<?php echo $url; ?>">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                                </a>
                                <h3> <a href="<?php echo $url; ?>"> <?php echo $title; ?></a></h3>
                                <?php if(strlen($page->post_content)): ?>
                                    <p><?php echo $page->post_content; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php
                    endif;
                }

            ?>

            <!-- up comding events -->
            <div class="upcoming-events pull-right">
                <div class="header">
                    <div class="text">
                        Upcoming Events
                    </div>
                    <a class="more" href="<?php echo get_site_url(); ?>">
                        More <div class="img-container"><img src="<?php echo get_template_directory_uri(); ?>/imgs/church/arrow_right.svg" alt="More"></div>
                    </a>
                </div>

                <div class="content">
                    <ul class="list-unstyled">
                        <?php 
                            $events = Upcoming_Events_Lists_Event::get_events();
                            foreach($events as $event){ ?>
                                <li>
                                    <div class="date">
                                        <div class="month"><?php echo date('M' , $event->get_start_date()); ?></div>
                                        <div class="day"><?php echo date('d' , $event->get_start_date()); ?></div>
                                    </div>
                                    <div class="text">
                                        <div class="title"><?php echo $event->get_title() ?></div>
                                        <div class="p"><?php echo $event->get_post()->post_content ?></div>
                                    </div>
                                </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>


            <!-- right sidebar -->
            <div class="col-md-3 sidebar_data">
                <?php //get_sidebar(); ?>
            </div>

        </div>
    </div>
</div>

<!-- end all posts container -->
<?php
    /*
    ** this function get the footer
    */
    get_footer(); 
?>