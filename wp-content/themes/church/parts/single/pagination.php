<!-- prev and next post -->
<?php if(get_previous_post_link() || get_next_post_link()): 
?>
<div class="posts-pagination text-center">
    <ol>
        <?php 
            // get the prev and next post
            if(get_previous_post_link('%link','<i class="fa fa-arrow-left"></i> %title' , true)):
                echo '<li class="prev-link">';
                    previous_post_link('%link','<i class="fa fa-arrow-left"></i> %title' , true);
                echo '</li>';
            endif;
            // next post
            if(get_next_post_link('%link','<i class="fa fa-arrow-left"></i> %title' , true)):
                echo '<li class="next-link">';
                    next_post_link('%link',' %title <i class="fa fa-arrow-right"></i>' , true);
                echo '</li>';
            endif;
            echo '<div class="fix"></div>';
        ?>
    </ol>
</div>
<?php endif; ?>