<?php

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
        return 50; // return the first 25 word
    }
   
    function custom_excerpt_more($more){
        return ' ...';
        
    }
        
        
    add_filter( 'excerpt_length', 'custom_excerpt_length' );

    add_filter( 'excerpt_more', 'custom_excerpt_more' );
     