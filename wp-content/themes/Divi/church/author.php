<?php 
    /* 
    ** This function get the page header 
    */
    get_header(); 
    // author id 
    $author_id = get_the_author_meta('ID');
    $count_posts = count_user_posts($author_id);
?>
<div class="container author-page">
    <div class="row">
        <?php 
            /* // side bar of the user
            ** require the author info 
            */
            require_once (get_template_directory()."/parts/author/info.php");
        ?>
        <div class="col-md-9">
            <?php 
                //require_once (get_template_directory()."/parts/breadcrumb.php");
                /*
                ** require the author posts
                */
                require_once (get_template_directory()."/parts/author/posts.php");
            ?>
        </div>

    </div>

    <!-- <hr class="dotted"> -->

    <?php 
        /*
        ** require the author comments
        */
       // require_once (get_template_directory()."/parts/author/comments.php");
    ?>

</div>

<?php 

    get_footer();
?>