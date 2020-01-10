<?php
    if(comments_open()): ?>
        <?php
            // comments form
            $comment_class = is_user_logged_in() ? '' : 'col-md-8 pull-right';
            // add new comment or reply fields
            $fields = array(

                // author commenter field
                'author' => '<p class="comment-form-author col-md-4"><label for="author"> 
                <i class="fa fa-user fa-fw"></i>You Name<span class="required">*</span></label>
                <input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30" required /></p>',

                // email address field
                'email' => '<p class="comment-form-email col-md-4">
                <label for="email"><i class="fa fa-envelope fa-fw"></i>Email Address <span class="required">*</span></label>' .
                '<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30" required /> </p>',
                
                // website field
                'url' => null
            );

            // comment fields
            $reply_args = array(
                'title_reply'       => 'Write A New Comment' ,
                'title_reply_to'    => 'Write a Reply To [%s]',
                'cancel_reply_link' => 'Cancel',
                'class_submit'      => 'btn btn-primary',
                'label_submit'      => 'Add New Comment',
                'comment_field' => null ,
                'must_log_in' => '<p class="must-log-in">' .
                sprintf(
                    __( 'You Should <a href="%s">log in</a> to post a comment.' ),
                    wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
                ) . '</p>',
                // comment field
                'comment_field' =>  '<p class="comment-form-comment '. $comment_class .'">
                <textarea id="comment" placeholder="Please Write Your Comment..." name="comment" class="form-control" cols="45" rows="8" aria-required="true">' .
                '</textarea></p>',

                'comment_notes_before' => null,
            
                'comment_notes_after' => null,
            
                'fields' => apply_filters( 'comment_form_default_fields', $fields ),
            );
            //comment form
            comment_form($reply_args); 
        ?>

        <!-- comments -->
        <h3 class="comemnts-title"><?php comments_number('No Comments <i class="fa fa-comments fa-fw"></i> Was Found' , '1 Comment <i class="fa fa-comments fa-fw"></i> Was Found    ' , '% Comments <i class="fa fa-comments fa-fw"></i> Were Found'); // comments number ?></h3>
        <ul class="comment-container-main">
            <?php
                // foreach comments
                // comments attributes
                $comments_attr = array(
                    'max_depth'         => 4 ,  // max comment level
                    'reply_text'        => 'Reply', // replay word
                    'reverse_top_level' => true , // new comments first
                    'type'              => 'all' ,  // comments type
                    // 'per_page'          => 10,     // get 4 comments per page
                    'avatar_size'       => 40, // image size
                    
                );
                wp_list_comments($comments_attr);
            ?>
        </ul>


    <?php 
    else:
        echo "comments disabled";
    endif;

