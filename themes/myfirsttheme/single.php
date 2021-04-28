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
                                

                    
                </div>
            </div>
        </section>

<?php get_footer() ?>