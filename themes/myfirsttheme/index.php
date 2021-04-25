    <?php get_header(); ?>
    </head>
    <body>

        <!-- BOOTSTRAP NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand" href="#">Navbar</a>
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
        <section class="posts">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-6">
                        <h3 class="post-title">post title test</h3>
                        <span class="post-author">zakaria ben flann</span>
                        <span class="post-date">2021/04/24</span>
                        <div class="img-container">
                            <img src="http://placehold.it/500x300/300" alt="post image">
                        </div>
                        <p class="post-categories">
                            html, css, js
                        </p>
                    </div>
                </div>
            </div>
        </section>

<?php get_footer() ?>