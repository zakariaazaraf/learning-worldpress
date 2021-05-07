    <?php get_header(); ?>
    </head>
    <body>

        <!-- BOOTSTRAP NAVBAR -->
        <header class='bg-dark'>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark justify-content-between">
                    <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <?php zakaria_wrapper_bootstrap_menu(); ?>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        <section class="single-post mt-4">
            <div class="container">
                <div class="post">
                    <?php   
                        if(have_posts(  )):
                            while(have_posts(  )):
                                the_post();
                    ?>
                                <?php /* the_title( "<h3 class='post-title'>", "</h3>") */ ?>
                                <?php 
                                    // EDIT THE POST
                                    edit_post_link( 'Edit Post <i class="fas fa-pencil-alt ml-1"></i>' ,'', '', 0, 'zikoClass'); 
                                ?>
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
                                    <?php the_post_thumbnail( 'large', array('class' => 'img-auto' ) ); ?>
                                </div>
                                <div class="post-body">
                                    <?php the_content(); ?>
                                    <?php
                                        // CONVERT THE POST CONTENT TO STRING { REMOVE HTML TAGS, H1, h5, IMG ... } AND RETURN THE FIRST 55 WORDS 
                                        /* the_excerpt( ); */
                                    ?>
                                </div>
                                <p class="post-categories">
                                    <i class="fa fa-tag"></i> <?php the_category(', '); ?>
                                </p>
                                <p class="post-tags">
                                    <?php the_tags(); ?>
                                </p>

                                <!-- THE AUTHOR METADATA FUNCTIONS  -->
                                <div class="author-info d-flex align-items-end mb-2">
                                    <?php
                                        // GET THE AUTHOR AVATAR
                                        $author_id = get_the_author_meta( 'ID' );

                                        /* get_avatar( $id_or_email:mixed, $size:integer, $default:string, $alt:string, $args:array|null ) */
                                        echo get_avatar($author_id, 64, '', 'author avatar', array('class' => 'img-avatar'));
                                    ?>
                                    <h4 class='m-0 ml-1 text-capitalize'>
                                        <?php the_author_meta( 'first_name' ); ?>
                                        <?php the_author_meta( 'last_name' ); ?>
                                        (<?php the_author_meta( 'nickname' ); ?>)    
                                    </h4>

                                </div>
                                <?php
                                    // CHECK THE DESCRIPTION OF THE AUTHOR
                                    if(get_the_author_meta( 'description' )){
                                        ?> <p><?php the_author_meta( 'description' ) ?></p> <?php
                                    }else{
                                        ?> <p>There's no description for the post author</p> <?php
                                    }
                                ?>

                    <?php
                            endwhile;
                        endif;
                    ?>
                </div>
                <?php
                    // PAGNATION LINKS
                    echo '<div class="d-flex justify-content-between">';
                        if( get_previous_post_link( ) ){
                            /* 
                                ADVANCE FEATURE, YOU COULD GET THE NEXT OR THE PREVIOUS POST
                                THAT SHARE THE SAME TAGS, CATEGORIES BY SPECIFING THE OTHER PARAMS
                            */
                            previous_post_link( '%link', '<< %title' );
                            
                        }else{
                            echo '';
                        }

                        if(get_next_post_link( ) ){
                            next_post_link( '%link', '%title >>' );
                        }else{
                            echo '';
                        }
                    echo '</div>';

                    // COMMENT TEMPLATE
                    comments_template(  );

                    // COMMENT FORM FOR INSERTING COMMENTS

                        // comment form args, used to costumize the form fileds
                        $comment_form_args = array(
                            // those fields are for unloged in users
                            'fields' => array(
                                'author' => '',
                                'email' => '',
                                'url' => ''
                            ),
                            // probably you should specify the name of each input
                            'comment_field' => '<div class="form-group"><label>Comm Text</label><textarea></textarea></div>'
                        );

                    comment_form(  );
                    /* comment_form( $comment_form_args ); */

                ?>
            </div>
        </section>

<?php get_footer() ?>