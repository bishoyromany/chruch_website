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
        // require_once (get_template_directory() . "/parts/home/recommend_posts.php");
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
                     * pergenant section *week by week*
                     */
                    // require_once (get_template_directory() . "/parts/home/week_by_week.php");
                ?>          
                <br>
                <?php 
                    /**
                     * get the main cats posts max 5
                     */
                    // require_once (get_template_directory() . "/parts/home/cat_posts.php");
                ?>

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