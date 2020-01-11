<?php 
    /* 
    ** This function get the page header 
    */
    get_header(); 
?>


<div class="cotainer_all_data">
    <div class="container">
        <div class="row">
            <?php
                if ( have_posts() ) {
                    // Load posts loop.
                    while ( have_posts() ) {
                        the_post();
                            ?>

                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <header class="entry-header">
                                        <?php
                                        if ( is_sticky() && is_home() && ! is_paged() ) {
                                            printf( '<span class="sticky-post">%s</span>', _x( 'Featured', 'post', 'twentynineteen' ) );
                                        }
                                        if ( is_singular() ) :
                                            the_title( '<h1 class="entry-title">', '</h1>' );
                                        else :
                                            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                                        endif;
                                        ?>
                                    </header><!-- .entry-header -->

                                    <?php the_post_thumbnail(); ?>

                                    <div class="entry-content">
                                        <?php
                                        the_content(
                                            sprintf(
                                                wp_kses(
                                                    /* translators: %s: Post title. Only visible to screen readers. */
                                                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentynineteen' ),
                                                    array(
                                                        'span' => array(
                                                            'class' => array(),
                                                        ),
                                                    )
                                                ),
                                                get_the_title()
                                            )
                                        );

                                        wp_link_pages(
                                            array(
                                                'before' => '<div class="page-links">' . __( 'Pages:', 'twentynineteen' ),
                                                'after'  => '</div>',
                                            )
                                        );
                                        ?>
                                    </div><!-- .entry-content -->
                                </article><!-- #post-<?php the_ID(); ?> -->

                            <?php 
                        }
                } else {
                    echo "Calendar Doesn't Exist :\\";
                }
		    ?>
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