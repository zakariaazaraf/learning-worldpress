<?php


    /* COMMENTS TEMPLATE */
    if( comments_open(  )){
        $comments_args = array(
            'max_depth' => 3,
            'type' => 'comment',
            'avatar_size' => 64
        );

        // COMMENT NUMBER
        ?>

        <h3><?php comments_number( '0 Comment', '1 Comment', '% Comments' ) ?> </h3>

        <?php
        

        echo '<ul class="comments-list">';
            wp_list_comments( $comments_args );
        echo '</ul>';
        

        /* foreach( $comments as $comment){
            comment_text(  );
            comment_author(  );
            comment_date(  );
        } */
        
    }else{
        echo 'Comment Are Closed';
    }