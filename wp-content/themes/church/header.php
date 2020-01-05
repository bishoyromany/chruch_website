<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php require_once (get_template_directory() . '/parts/meta.php'); ?>
    <title>
      <?php wp_title('-' , true , 'right'); ?> 
      <?php bloginfo('name'); ?>
    </title>

    <link rel="pingpack" href="<?php bloginfo('pingpack_url'); ?>" />

    <?php wp_head(); ?>
</head>
<body style="
    background-color: #ffffff;
    background-image: url(<?php echo get_template_directory_uri(); ?>/imgs/church/body_background.png);
    background-position: center top;
    background-size: auto;
    background-repeat: repeat;
    background-attachment: fixed;
">
<diV id="pageContainer">
<nav id="navbar">
    
    <div class="upper">
        <div class="container">
          <!-- logo -->
          <div class="logo_social">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <a class="logo" href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/imgs/church/title.png" alt="Logo"></a>
                        <a class="logo_phone" href="<?php bloginfo('url'); ?>"><img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/imgs/church/title.png" alt="Logo"></a>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/imgs/church/in_memory.jpg" alt="In Memory">
                    </div>
                    <div class="col-md-2">
                        <div class="live_streaming_container">
                            <a href="http://live.saint-mary.net/">
                                <img class="img-responsive live_streaming" src="<?php echo get_template_directory_uri(); ?>/imgs/church/live_streaming.png" alt="Live Streaming">
                            </a>
                        </div>
                    </div>
                </div>
          </div>
        </div>
    </div>




    <!-- news -->
    <?php 
        /**
         * get posts if exist
         */
        $args = array( 'numberposts' => 1 , 'order' => 'desc', 'category_name' => 'news-marquee' );
        $posts = get_posts( $args );
        if(count($posts) > 0):
    ?>
        <div class="news_marquee">
            <?php foreach( $posts as $post ): setup_postdata($post); ?>
                <marquee><?php echo $post->post_content ?></marquee>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="container navbar_container_fixed_zero">
    
      <!-- toggle button -->
      <div class="d-none d-sm-block toggle_nav_links">
            <div class="toggle_navs">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span class="title_toggle_navs d-none d-sm-block">Menu</span>
            <!-- social links -->
            <div class="social_links_pc">
                <a class="facebook" href="#" target="_blank">
                    <img class="img-responsive facebook_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/facebook_1.svg" alt="Facebook">
                    <img class="img-responsive facebook_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/facebook.svg" alt="Facebook">
                </a>
                
                <a class="instagram" href="#" target="_blank">
                    <img class="img-responsive instagram_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/instagram_1.svg" alt="Instagram">
                    <img class="img-responsive instagram_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/instagram.svg" alt="Instagram">
                </a>

                <a class="youtube" href="#" target="_blank">
                    <img class="img-responsive youtube_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/youtube_1.svg" alt="Youtube">
                    <img class="img-responsive youtube_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/youtube.svg" alt="Youtube">
                </a>

                <a class="patreon" href="#" target="_blank">
                    <img class="img-responsive patreon_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/patreon_1.svg" alt="Patreon">
                    <img class="img-responsive patreon_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/patreon.svg" alt="Patreon">
                </a>
                <a class="whats_app" href="#" target="_blank">
                    <img class="img-responsive whats_app_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/whats_app_1.svg" alt="Whats App">
                    <img class="img-responsive whats_app_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/whats_app.svg" alt="Whats App">
                </a>
            </div>
      </div>
      
      <!-- nav links -->
      <div class="nav_links">
          <div class="container">
            <?php me_navbar_menu() ?>
            <!-- social links -->
            <div class="social_links_pc">
                <a class="facebook" href="#" target="_blank">
                    <img class="img-responsive facebook_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/facebook_1.svg" alt="Facebook">
                    <img class="img-responsive facebook_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/facebook.svg" alt="Facebook">
                </a>
                
                <a class="instagram" href="#" target="_blank">
                    <img class="img-responsive instagram_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/instagram_1.svg" alt="Instagram">
                    <img class="img-responsive instagram_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/instagram.svg" alt="Instagram">
                </a>

                <a class="youtube" href="#" target="_blank">
                    <img class="img-responsive youtube_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/youtube_1.svg" alt="Youtube">
                    <img class="img-responsive youtube_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/youtube.svg" alt="Youtube">
                </a>

                <a class="patreon" href="#" target="_blank">
                    <img class="img-responsive patreon_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/patreon_1.svg" alt="Patreon">
                    <img class="img-responsive patreon_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/patreon.svg" alt="Patreon">
                </a>
                <a class="whats_app" href="#" target="_blank">
                    <img class="img-responsive whats_app_1" src="<?php echo get_template_directory_uri(); ?>/imgs/social/whats_app_1.svg" alt="Whats App">
                    <img class="img-responsive whats_app_0" src="<?php echo get_template_directory_uri(); ?>/imgs/social/whats_app.svg" alt="Whats App">
                </a>
            </div>
          </div>
      </div>

  </div>
</nav>



