<?php


    /* COMMENTS TEMPLATE */
    if( comments_open(  )){
        $comments_args = array(
            'max_depth' => 3,
            'type' => 'comment',
            'avatar_size' => 64
        );

        // COMMENT NUMBER
        echo "<h5>" . comments_number( '0 Comm', '1 Comm', '% Commns' ) . "</h5>";
        
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