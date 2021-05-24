<?php

    // How To Get Number Of Comment Related To This Category

    $comments_args = array(
        'status' => 'approve' // Get Only Approved Cmments
    );

    $all_comments = get_comments( $comments_args ); // Retrive a List Of Comments

    /* [0] => WP_Comment Object
        (
            [comment_ID] => 3
            [comment_post_ID] => 31
            [comment_author] => zakariaazaraf@gmail.com
            [comment_author_email] => zakariaazaraf@gmail.com
            [comment_author_url] => http://localhost/wordpressTest
            [comment_author_IP] => ::1
            [comment_date] => 2021-05-20 22:12:58
            [comment_date_gmt] => 2021-05-20 22:12:58
            [comment_content] => Programs without OOP aren't even close to be consider programming
            [comment_karma] => 0
            [comment_approved] => 1
            [comment_agent] => Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36 Edg/90.0.818.62
            [comment_type] => comment
            [comment_parent] => 0
            [user_id] => 1
            [children:protected] => 
            [populated_children:protected] => 
            [post_fields:protected] => Array
                (
                    [0] => post_author
                    [1] => post_date
                    [2] => post_date_gmt
                    [3] => post_content
                    [4] => post_title
                    [5] => post_excerpt
                    [6] => post_status
                    [7] => comment_status
                    [8] => ping_status
                    [9] => post_name
                    [10] => to_ping
                    [11] => pinged
                    [12] => post_modified
                    [13] => post_modified_gmt
                    [14] => post_content_filtered
                    [15] => post_parent
                    [16] => guid
                    [17] => menu_order
                    [18] => post_type
                    [19] => post_mime_type
                    [20] => comment_count
                )

        ) */
    
    $comment_count = 0; //  Comment Counter

    foreach($all_comments as $comment){ // Loop Throught Comment To Check If The comment from this Category
        if( in_category( 'programming', $comment->comment_post_ID )){
            $comment_count++;
        }
    }

    /* echo '<pre>';
    print_r($all_comments);
    echo '</pre>'; */

    // Get The Category's Posts 
    $categoryPostCount = get_queried_object(  )->count;
    /* echo '<pre>';
    print_r(get_queried_object(  ));
    echo '</pre>'; */

    /* Get The Latest Category's Posts */

    $posts_args = array(
        'posts_per_page' => 5,
        'cat' => 4// Get Category Id From The Admin DashBoard
    );

    $query = new WP_Query( $posts_args );

    /* echo '<pre>';
    print_r($query);
    echo '</pre>'; */

    

?>

<div class="sidebar-programming">
    <div class="widget">
        <h5 class="widget-title bg-alert"><?php single_cat_title(  ); ?> Statics</h5>
        <div class="widget-content">
            <ul class='list-unstyled'>
                <li class=''>
                    <span class="badge badge-primary badge-pill"><?php echo $comment_count; ?></span>
                    Comments
                </li>
                <li class=''>
                    <span class="badge badge-primary badge-pill">
                        <?php echo $categoryPostCount; ?>
                    </span>
                    Posts
                </li>
                
            </ul>
        </div>
    </div>
    <div class="widget">
        <h5 class="widget-title">Latest Politics</h5>
        <div class="widget-content">
            <ul class='list-unstyled'>
                <?php

                    if($query->have_posts()){
                        while($query->have_posts()){
                            $query->the_post();
                            ?>
                                <li>
                                    <a href="<?php echo the_permalink();?>" target='_blank'><?php the_title(  ); ?></a>
                                </li>
                            <?php
                        }
                    }

                    wp_reset_postdata(  );
                ?>
            </ul>
        </div>
    </div>
    <div class="widget">
        <h5 class="widget-title">Traend Post</h5>
        <div class="widget-content">
            <ul class="list-unstyled">
                <?php
                    // Get The Tranding Post Depanding On Comment Count
                    $trand_post_args = array(
                        'posts_per_page' => 1, // The Only Trand
                        'orderby' => 'comment_count'
                    );

                    $trandQuery = new WP_Query( $trand_post_args );

                    if( $trandQuery->have_posts() ){
                        while( $trandQuery->have_posts() ){
                            $trandQuery->the_post();
                            ?>
                                <li>
                                    <a href="<?php echo the_permalink(); ?>" target='_blank'><?php the_title(); ?></a>
                                </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>