
<?php
if(have_posts()): // cheack if there was posts for facebook 
    while(have_posts()):
        the_post(); ?>
    <meta property="og:url"         content="<?php the_permalink(); ?>" />
    <meta property="og:type"        content="website" />
    <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt()); ?>" />
    <meta property="og:title"       content="<?php wp_title('-' , true , 'right'); bloginfo('name'); ?>" />
    <meta property="og:image"       content="<?php the_post_thumbnail_url('full'); ?>" />
    <!--
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height"content="300" />
    -->
    <meta property="fb:app_id"      content="341668066483156">
<?php endwhile; endif; ?>
<!-- main meta -->
<meta charset="<?php bloginfo('charset'); ?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- facebook share option -->
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=341668066483156&autoLogAppEvents=1"></script>
<!-- google plus option 
<script src="https://apis.google.com/js/platform.js" async defer></script>
-->

