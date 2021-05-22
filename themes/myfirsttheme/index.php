    <?php get_header(); ?>

        <section class="posts mt-4">
            <div class="container">
                <div class="row">

                    <?php 
                        /* $args = array(
                            'posts_per_page' => 2,
                            'post_type' => 'post',
                            'paged'          => get_query_var( 'paged' ),
                        );

                        $post_query = new WP_Query($args); */
            
                        // LOOP THROUGH THE POSTS
                        if( have_posts() ){
                            while( have_posts() ){
                                the_post(  );
                                
                                ?>  
                                    <div class="post col-sm-8 col-md-6 my-2">
                                        <?php /* the_title( "<h3 class='post-title'>", "</h3>") */ ?>
                                        <h3 class='post-title'>
                                            <a href="<?php the_permalink(); ?>" title='<?php the_title(); ?>'>
                                                <?php the_title(); ?>
                                            </a>
                                        </h3>
                                        <div class="post-info s-flex">
                                            <span class="post-author"><i class='fa fa-user'></i><?php the_author_posts_link(); /* the_author() */ ?></span>
                                            <span class="post-date ml-2"><i class='fa fa-calendar'></i><?php the_date( ); ?></span>
                                            <span class="post-comments ml-2">
                                                <i class='fa fa-comments'></i>
                                                <?php comments_popup_link( 'no comments', '1 comment', '% comments', 'comment-link', 'comments disabled' ); ?>
                                            </span>
                                        </div>
                                        <div class="img-container">
                                            <!-- <img src="http://placehold.it/600x300/300" alt="post image"> -->
                                            <?php the_post_thumbnail( 'large', array('class' => 'img-reponsive' ) ); ?>
                                        </div>
                                        <div class="post-body">
                                            <?php /* the_content('Read more'); */ ?>
                                            <?php
                                                // CONVERT THE POST CONTENT TO STRING { REMOVE HTML TAGS, H1, h5, IMG ... } AND RETURN THE FIRST 55 WORDS 
                                                the_excerpt( );
                                                
                                            ?>
                                        </div>
                                        <p class="post-categories">
                                            <i class="fa fa-tag"></i> <?php the_category(', '); ?>
                                        </p>
                                        <p class="post-tags">
                                            <?php the_tags(); ?>
                                        </p>
                                        
                                    </div> 
                                <?php

                            }
                        }
                    ?>
                    
                </div>
                
                <?php
                
                    // PAGNATION LINKS
                    /* echo '<div class="d-flex justify-content-between">';
                        if(get_previous_posts_link(  )){
                            previous_posts_link("<< Prev");
                            
                        }else{
                            echo '  ';
                        }

                        if(get_next_posts_link( )  ){
                            next_posts_link( "Next >>" );
                            
                        }else{
                            echo '  ';
                        }
                    echo '</div>'; */
                ?>
                
                <div class="custom-pagination d-flex justify-content-end">    
                    <h3><?php echo numbering_pages(); ?></h3>
                </div>
            </div>
        </section>

<?php get_footer() ?>