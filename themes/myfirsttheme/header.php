<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset='<?php bloginfo('charset') ?>' />
        <title>
            <?php wp_title( '|', true, 'right' )?>
            <?php bloginfo('name'); ?>
        </title>
        <link rel='pingback' href='<?php bloginfo('pingback_url')?>' >
        <?php wp_head(); // INCLUDE THE STYLES, METAS AND SCRIPTS ?>
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
