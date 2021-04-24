<?php

    /*
    ** add the style file
    ** added by zakaria azaraf
    **  v1
    */

    function add_style_file(){
        wp_enqueue_style( 'bootstrap-css-file', get_template_directory_uri() . '/assets/css/lib/bootstrap.min.css');
        wp_enqueue_style( 'font-awesome-css-file', get_template_directory_uri() . '/assets/css/all.min.css');
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
        wp_enqueue_script( 'bootstrap-js-file', get_template_directory_uri() . '/assetss/js/lib/bootstrap.min.js', array(), false, true );
        wp_enqueue_script( 'main-js-file', get_template_directory_uri() . '/assetss/js/custom/main.js', array(), false, true );
    }

    /*
     **
     * ADD THE ACTIONS
     * ADDED BY ZAKARIA AZARAF
     * V1
     */

     add_action( 'wp_enqueue_scripts', 'add_style_file' );
     add_action( 'wp_enqueue_scripts', 'add_scripts_files' );
     