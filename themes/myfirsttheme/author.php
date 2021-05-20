<?php get_header( ); ?>
    <div class="container">

        <!-- START THE AUTHOR INFORMATION ROW -->

        <div class="row author-profile py-5 align-items-center justify-content-center">
            <div class="col-md-8 text-center text-md-left">
                <h1 class='author-name'>
                    <?php the_author_meta( 'first_name' ); ?>
                    <?php the_author_meta( 'last_name' ); ?>
                </h1>
                <p class="description">
                    <?php the_author_meta('description'); ?>
                </p>
            </div>
            <div class="col-md-4 text-center text-lg-right">
                <?php
                    // GET THE AUTHOR AVATAR
                    $author_id = get_the_author_meta( 'ID' );

                    /* get_avatar( $id_or_email:mixed, $size:integer, $default:string, $alt:string, $args:array|null ) */
                    echo get_avatar($author_id, 64 * 4, '', 'author avatar', array('class' => 'img-avatar'));
                ?>
            </div>
        </div>
        <!-- END THE AUTHOR INFORMATION ROW -->

        <!-- START THE AUTHOR INFORMATION ROW -->
            <?php

                /* AUTHOR POSTS WITH WP QUERY */
                $query_args = array(
                    'author' => $author_id,
                    'posts_per_page' => 3 /* -1 => means all author posts */
                );
                $author_posts = new WP_Query($query_args);

                // SHOW AUTHOR POSTS
                if($author_posts->have_posts(  )):
                    ?>
                    <h2 class='text-capitalize py-2'><?php the_author_meta('first_name'); ?>'s posts</h2>
                    <div class="row author-posts">
                    <?php
                    while($author_posts->have_posts(  )):
                        $author_posts->the_post();
            ?>      
                        <!-- START POSTS -->
                        <div class="col-md-6 py-sm-2 py-0">
                            <div class="px-1 text-center">
                                <div class="img-container">
                                    <!-- <img src="http://placehold.it/600x300/300" alt="post image"> -->
                                    <a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'>
                                        <?php the_post_thumbnail( 'large', array('class' => '' ) ); ?>
                                    </a>
                                </div>
                                <h3 class='post-title'>
                                    <?php the_title(); ?>
                                </h3>
                                <div class="post-body">
                                    <?php /* the_content(); */ ?>
                                    <?php
                                        // CONVERT THE POST CONTENT TO STRING { REMOVE HTML TAGS, H1, h5, IMG ... } AND RETURN THE FIRST 55 WORDS 
                                        the_excerpt( );
                                        /* wp_trim_words( $text:string, $num_words:integer, $more:string|null ) */
                                        /* echo wp_trim_words( "the_excerpt( )", 25 , 'Read more'); */
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                        <!-- END POSTS -->
            <?php
                    endwhile;
                    echo '</div>';
                    // destroy the previous query and setup a new one
                    //wp_reset_query(  );

                    // Restores the $post query after looping throught the loop
                    wp_reset_postdata(  );
                    
                endif;
            ?>
        <!-- END THE AUTHOR INFORMATION ROW -->
        <!-- START AUTHOR STATISTICS -->
        <div class="row author-stats">
            <div class="col-4">
                <i class="fa fa-podcast" aria-hidden="true"></i>
                <span class='font-weight-bold'><?php echo count_user_posts( $author_id ); ?></span>
            </div>
            <div class="col-4">
                <i class="fa fa-comments" aria-hidden="true"></i>
                <span class='font-weight-bold'>
                    <?php
                        /* AUTHOR COMMENTS */
                        /* get_comments( $args:string|array ) */
                        $comments_args = array(
                            'user_id' => $author_id,
                            'count' => true // user comments on the site
                        );

                        echo get_comments($comments_args);
            
                    ?>
                </span>
            </div>
            <div class="col-4"><span></span></div>
            <div class="col-4"><span></span></div>
        </div>
        <!-- END AUTHOR STATISTICS -->

        <!-- START THE AUTHOR COMMENTS -->
        <?php
            // See Documentation
            $author_comments_args = array(
                'user_id' => $author_id,
                'status' => 'approve',
                'number' => '',
                'post_status' => 'publish',
                'post_type' => 'post'
            );

            $author_comments = get_comments($author_comments_args);

            foreach($author_comments as $comment){
                echo $comment->comment_post_ID . '<br>';
                echo $comment->comment_author . '<br>';
                echo $comment->comment_content . '<br>';
            }
        ?>
        <!-- END THE AUTHOR COMMENTS -->
    </div>    
<?php get_footer( ); ?>