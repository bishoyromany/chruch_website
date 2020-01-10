<?php 
    if(have_posts()):
        while(have_posts()):
                the_post();

                $title = get_the_title();
                $image = get_the_post_thumbnail_url();
                $all_cats = get_the_category();

            ?>
                <div style="
                    background : url(<?php echo $image ?>) no-repeat fixed center center;
                    background-size : cover;
                ">
                    <div class="all_container">
                        <h2><?php echo $title; ?></h2>
                        <div class="breadcrumb-container-header">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="<?php echo get_home_url(); ?>">
                                        <?php echo get_bloginfo('name'); ?>
                                    </a>
                                </li> 
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                            <path style="fill:#1E201D;" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
                                                C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
                                                c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>

                                <?php if(!is_author()): ?>
                                    <li>
                                        <a href="<?php echo esc_url(get_category_link($all_cats[0]->term_id)); ?>"><?php echo esc_html($all_cats[0]->name); ?></a>
                                    </li> 
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 31.49 31.49" style="enable-background:new 0 0 31.49 31.49;" xml:space="preserve">
                                        <path style="fill:#1E201D;" d="M21.205,5.007c-0.429-0.444-1.143-0.444-1.587,0c-0.429,0.429-0.429,1.143,0,1.571l8.047,8.047H1.111
                                            C0.492,14.626,0,15.118,0,15.737c0,0.619,0.492,1.127,1.111,1.127h26.554l-8.047,8.032c-0.429,0.444-0.429,1.159,0,1.587
                                            c0.444,0.444,1.159,0.444,1.587,0l9.952-9.952c0.444-0.429,0.444-1.143,0-1.571L21.205,5.007z"/>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                        <g>
                                        </g>
                                    </svg>
                                    <li class="last-one"><?php echo get_the_title(); ?></li>
                                <?php else: ?>
                                    <li> <i class="fa fa-user fa-fw"></i> <?php the_author_meta("first_name"); ?> <?php the_author_meta("last_name"); ?></li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </div>
                    <div class="overly"></div>
                </div>

            <?php 
            // wp_reset_postdata(); // rest all values 
        endwhile;
    endif;
?>