<?php 
    $template_url = get_template_directory_uri();
    // cats icons
    $icons = [
        'family-category' => $template_url . '/imgs/categories/family-category.svg',
        'woman-category' => $template_url . '/imgs/categories/woman-category.svg',
        'baby-category' => $template_url . '/imgs/categories/baby-category.svg',
    ];

    // get the posts 
    $cat_id = get_query_var('cat');
    $posts_count_args = array(
        'cat'       => $cat_id,
        'count'     => true,
        'post_type' => 'post'
    );
    $posts_count = new WP_Query($posts_count_args);
?>
<div class="category-header-page">
    <?php 
        $image = $icons['family-category'];
    ?>

    <div style="
        background : url(<?php echo $image ?>) no-repeat fixed center center;
        background-size : cover;
    ">
        <div class="all_container">
            <h1>Wellcome To <span> <?php single_cat_title(); ?>'s</span> Category</h1>
        </div>

        <div class="overly"></div>
    </div>


</div>
