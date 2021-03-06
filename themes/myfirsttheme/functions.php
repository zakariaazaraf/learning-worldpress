hd<?php

    // ADD FEATURE IMAGE SUPPORT
    add_theme_support( 'post-thumbnails');

    /**
     * Register Custom Navigation Walker
     */
    function register_navwalker(){
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action( 'after_setup_theme', 'register_navwalker' );

    

    /*
    ** add the style file
    ** added by zakaria azaraf
    **  v1
    */

    function add_style_file(){
        wp_enqueue_style( 'bootstrap-css-file', get_template_directory_uri() . '/assets/css/libs/bootstrap.min.css');
        wp_enqueue_style( 'font-awesome-css-file', get_template_directory_uri() . '/assets/css/all.min.css');
        wp_enqueue_style( 'main-css-file', get_template_directory_uri() . '/assets/css/custom/main.css');

        // NOTES : YOU CAN ADD THE SCRIPTS FOR OLD BROWSERS WITH COMMENT CONDITION BY
        //wp_script_add_data( $handle:string, $key:string, $value:mixed )
    }

    /*
    ** add the scripts files
    ** added by zakaria azaraf
    **  v1
    */

    function add_scripts_files(){
        
        // REMOVE JQUERY FROM REGISTED WP FILES
        wp_deregister_script( 'jquery' );
        // REGISTER JQUERY FROM REGISTERD FILES, AND SPECIFY THE IN FOOTER TO TRUE
        wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), array(), false, true );
        // ENQUEUE THE JQUERY FILE WITH SCRIPTS
        wp_enqueue_script('jquery');
        wp_enqueue_script( 'bootstrap-js-file', get_template_directory_uri() . '/assets/js/libs/bootstrap.min.js', array(), false, true );
        wp_enqueue_script( 'main-js-file', get_template_directory_uri() . '/assets/js/custom/main.js', array(), false, true );
    }

    /*
     **
     * ADD THE ACTIONS
     * ADDED BY ZAKARIA AZARAF
     * V1
     */

     add_action( 'wp_enqueue_scripts', 'add_style_file' );
     add_action( 'wp_enqueue_scripts', 'add_scripts_files' );


     /*
     **
     * REGISTER CUSTOM MENU
     * ADDED BY ZAKARIA AZARAF
     * V1
     */

     function custom_register_menu(){
         //register_nav_menu( 'custom-nav-menu', 'navigation bar');
         register_nav_menus(array(
            'header-menu' => 'Header navigation menu',
            'footer-menu' => 'Footer navigation menu'
         ));
     }

     add_action( 'init', 'custom_register_menu' );

     
     function zakaria_wrapper_bootstrap_menu(){
         // INSERT THE NAV MENU, WHICH INCLUDE MY PAGES
         //wp_nav_menu( );
    
         // CHOOSE WHICH MENU TO DISPLAY, OR INCLUDE TWO FUNTIONS IF YOU WANT TOW MENUS 
         wp_nav_menu( array(
             // VISIT THE DOC TO SEE OTHER USFULL PROPERTIES YOU MIGHT NEED THEM
            'theme_location' => 'header-menu',
            'menu_class' => 'navbar-nav', // ADD THIS CLASS NAME TO THE MENU
            'container' => false, // remove the default div that contain the ul
            'depth' => 2,
            'walker' => new WP_Bootstrap_Navwalker()
         ) );

     }

     /**
      * CUSTOM FILTERS
      * 
      */

    function custom_excerpt_length($length){
        // check if the author's page
        if(is_author(  )){
            return 20;
        }

        if( is_category(  ) ){ // If The Page Is Category
            return 25;
        }

        return 50; // return the first 25 word
    }
   
    function custom_excerpt_more($more){

        if( is_category(  ) ){ // If The Page Is Category
            return ' Read More...';
        }

        return ' ...';
        
    }
        
        
    add_filter( 'excerpt_length', 'custom_excerpt_length' );

    add_filter( 'excerpt_more', 'custom_excerpt_more' );


    /**
     *  Numbering pages 
     * 
     */

     function numbering_pages(){

        global $wp_query; // Object from the WP_QUERY Class, And make it global

        $all_posts_pages = $wp_query->max_num_pages; // Property return the number of the post pages

        $current_page = max(1, get_query_var( 'paged' ) ); // Get the current Page

        if($all_posts_pages > 1){

            $pagniate_links_args = array(
                'base' => get_pagenum_link(  ) . '%_%',  // Retrive a link for a page number
                'format' => 'page/%#%/', // Wordpres Pages Format
                'current' => $current_page,
                'mid_size' => 2,
                'end_size' => 2
                /* 'total' => $all_posts_pages, */ // By Default It Has The Total
            );

            return paginate_links( $pagniate_links_args );
        }

        return false;

     }
     

     /**
      * Register Sidebar feature
      */ 
    function zakaria_main_sidebar(){

        // Sidebar AArgummennts
        $sidebar_args = array(
            'name' => 'main sidebar',
            'id' => 'main-sidebar',
            'description' => 'this is the sidebar description, describe the content and the functionalties',
            'class' => 'main-sidebar ',
            'before_widget' => '<div class="widget-content">', // takes an HTML content
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">', // Takes HTMH content, Describe the Widget Title
            'after_title' => '</h4>'
        );

        register_sidebar( $sidebar_args ); // busild the deffination of the sidebar and return the sidebar ID
    }

    // ADD ACTION FOR WIDGETS
    add_action( 'widgets_init', 'zakaria_main_sidebar' );


    // Override wpautop filter

    function override_wpautop_filter( $content ){
        
        remove_filter( 'the_content', 'wpautop' );

        return $content;
    }

    add_filter( 'the_content' , 'override_wpautop_filter', 0); // Specify the Priority
    