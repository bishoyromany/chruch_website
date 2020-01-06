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
                Comming Events
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