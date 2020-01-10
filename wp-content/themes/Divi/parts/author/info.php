<div class="col-md-3"></div>
<div class="col-md-3 author-info">
        <!-- target user name -->
    <h2 class="author-name text-center">
        <div class="author-img">
            <?php 
                // author img args
                $image_args = array(
                    'class'   => 'img-circle img-thumbnail'
                );
                echo get_avatar($author_id , 140 , '' 
                , get_the_author_meta('Nickname') , $image_args) 
            ?>
        </div>
        <?php the_author_meta('first_name'); ?>
        <?php the_author_meta('last_name'); ?>
    </h2>

    <!-- some info about the user -->
    <ul class="list-unstyled author-meta">
        <li>User Posts : <?php echo $count_posts; ?></li>
        <li>User Comments :  
            <!-- get the comments number -->
            <?php $comment_args = array(
                'user_id' => $author_id,
                'count' => true, // get comments count not data
            );
            $count_comments = get_comments( $comment_args ); echo $count_comments; ?> 
            <i class="fa fa-comments fa-fw"></i>
        </li>

        <li>User Status : <?php $user_data = get_userdata($author_id);
            if($user_data->user_status == 0): // get the user status
                echo "Active <i class='fa fa-check-circle fa-fw'></i>";
            else:
                echo "Not Active <i class='fa fa-times fa-fw'></i>";
            endif;
                
        ?></li>
        <li>User Rank : <?php 
            if(get_the_author_meta('user_level') == 10): // get the user level
                echo "Admin <i class='fa fa-star fa-fw'></i>";
            else:
                echo "User <i class='fa fa-user fa-fw'></i>";
            endif;
                
        ?> </li>
    </ul>
</div>