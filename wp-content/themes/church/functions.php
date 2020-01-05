<?php
    // get bootstrap nav walker
    require_once __DIR__."/assists/wp-bootstrap-navwalker.php";
    /*
    ** get all custom css style function
    ** wp_enqueue_style('name' , get_template_directory_uri() , depends on array , versoin , head or bottom);
    */
    function me_add_styles(){
        // get bootstrap v4
        wp_enqueue_style("bootstrap4-css" , get_template_directory_uri() . "/assists/bootstrap.min.css" , array() , false);
        // get fontawesome
        // wp_enqueue_style("fonte-css" , get_template_directory_uri() . "/fonts/css/all.min.css" , array() , false);
        // get slick css
        wp_enqueue_style("slick-css" , get_template_directory_uri() . "/assists/slick.css" , array() , false);
        // get main css
        wp_enqueue_style("main-css" , get_template_directory_uri() . "/css/main.css" , array() , true);
    }

    /*
    ** get all custom js style function
    ** wp_enqueue_script('name' , get_template_directory_uri() , depends on array , versoin , head or bottom);
    */
    function me_add_scripts(){
        // get json file test ment
        //wp_enqueue_script("test-json" , get_template_directory_uri() . "/me.json" , array() , false , true);
        // de register jquery from wordpress
        wp_deregister_script("jquery");
        // register jquery to add into footer
        wp_register_script("jquery" , includes_url("/js/jquery/jquery.js") , array() , false , true);
        wp_enqueue_script("jquery");
        // get bootstrap v4
        wp_enqueue_script("bootstrap4-js" , get_template_directory_uri() . "/assists/bootstrap.min.js" , array('jquery') , false , true);
        // get fontawesome
        // wp_enqueue_script("fonte-js" , get_template_directory_uri() . "/fonts/js/all.min.js" , array() , false , true);
        // get slick 
        wp_enqueue_script("slick-js" , get_template_directory_uri() . "/assists/slick.min.js" , array() , false , true);
        // get main js
        wp_enqueue_script("main-js" , get_template_directory_uri() . "/js/main.js" , array() , false , true);
        // get header js
        wp_enqueue_script("header-js" , get_template_directory_uri() . "/js/header.js" , array() , false , true);
        // homepage js
        wp_enqueue_script("homepage-js" , get_template_directory_uri() . "/js/homepage.js" , array() , false , true);
    }

    /* 
    ** call the functions of getting custom styles
    ** add_action('string' , 'function()');
    ** wp_enqueue_scripts(); add all js and css
    */
    add_action('wp_enqueue_scripts' , 'me_add_styles'); // styles
    add_action('wp_enqueue_scripts' , 'me_add_scripts'); // scripts

    /*
    ** add custom menu
    ** register_nav_menu('name' , __('desc'));
    */
    function me_custom_menu(){
        register_nav_menus(array(
            "navbar-menu" => 'navigation bar',
            'footer-menu' => 'Footer Menu'
        ));
    }

    add_action('init' , 'me_custom_menu'); // register the menu

    /* 
    ** this function get the menu
    ** wp_nav_menu();
    */
    function me_navbar_menu(){
        wp_nav_menu(array(
            'theme_location'  => 'navbar-menu' ,
            'menu_class'      => 'navbar_cats' , 
            'depth'           => 3 ,
        ));
    }
    /**
     * this function get footer menu
     * wp_nav_menu()
     */
    function me_footer_menu(){
        wp_nav_menu(array(
            'theme_location'    => 'footer-menu',
            'menu_class'        => 'footer-menu',
            'depth'             => 2
        ));
    }
    /*
    ** this function add post outside image feature
    ** add_theme_support('post-thumbnails');
    */
    add_theme_support('post-thumbnails');

    /*
    ** this functino get's the read more custom
    ** add_filter('excerpt_length' , 'my function)
    */
    function me_custom_readmore($length){
        if(is_author()):
            return 20 ;
        elseif(is_category()):
            return 50 ;
        elseif(is_home()):
            return 18;
        elseif(is_single()):
            return 20;
        else: 
            return 35 ;
        endif;
    }
    add_filter('excerpt_length' , 'me_custom_readmore');

    /*  
    ** this functino changes the end of readmore
    ** add_filter('excerpt_length' , 'my function')
    */
    function me_custom_dots($more){
        return ' <a href="' . get_permalink() .'">Read More...</a>';
    }
    add_filter('excerpt_more' , 'me_custom_dots');


    /*
    ** numbring pagination 
    ** $wp_query->max_num_pages all pages number
    ** get_query_var('paged') current pagination number
    ** paginate_links(array()) get the paginate links
    ** get_pagenum_link() link if page number
    */
    function numbring_pagination(){
        global $wp_query; // glob the query
        $all_pages = $wp_query->max_num_pages; // get the all pages number
        if(is_category() && $wp_query->post_count < 3):
            $all_pages = ceil($all_pages * 0.5);
        endif;
        $current_page = max(1 , get_query_var('paged')); // get the current page
        if($all_pages > 1): // only one page ?!
            return paginate_links(array(
                'base'      => get_pagenum_link() . '%_%', // start from
                'format'    => 'page/%#%', // how to build
                'current'   => $current_page, // current page
                'total'     => $all_pages, // all pages num
                'prev_text' => '<i class="fa fa-angle-double-left"></i>', // prev text
                'next_text' => '<i class="fa fa-angle-double-right"></i>', // next text
                //'mid_size'  => 2 , // minimum num between points
                //'end_size'  => 1 , // last one and first one
            ));
        endif;
    }

    /* add sidebar 
    ** register_sidebar();
    **
    */
    function me_main_sidebar_category(){
        // register main sidebar
        register_sidebar(array(
            'name'              => 'category sidebar' , 
            'id'                => 'category-sidebar' , 
            'description'       => 'category sidebar' ,
            'class'             => 'cat-sidebar'      ,
            'before_widget'     => '<div class="cat-widget-content">',
            'after_widget'      => '</div>',
            'before_title'      => '<h3 class="cat-widget-title"><span>',
            'after_title'       => '</span></h3>',
        ));
    }

    add_action('widgets_init' , 'me_main_sidebar_category');


    /*
    ** add filter p wpautop();
    ** 
    */

    function me_remove_autop($content){
        remove_filter('the_content' , 'wpautop');

        return $content;
    }
    add_filter('the_content' , 'me_remove_autop' , 0);

    /**
     * get excerpt by id
     */
    function me_get_the_excerpt($post_id) {
        global $post;  
        $save_post = $post;
        $post = get_post($post_id);
        $output = get_the_excerpt();
        $post = $save_post;
        return $output;
    }

    /**
     * sessions
     */
    function register_my_session()
    {
        if( !session_id() )
        {
            session_start();
        }
    }
    add_action('init', 'register_my_session');