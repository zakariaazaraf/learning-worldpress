<?php

/**
 * @package ZakariaAzaraf
 */


/*
Plugin Name: zakaria plugin
Plugin URI: https://zakariaazaraf.github.io/#works
Description: this plugin for testing this world
Version: 1.0.0
Author: Zakaria Azaraf
Author URI: https://zakariaazaraf.github.io
License: GPLv2 or later
Text Domain: zakariaazaraf-plugin
*/



// SOMEOEN HAVE ACCESS TO THIS PLUGIN OUTSIDE CMS, THIS CONST WONT'T BE DEFINED

/* if( ! defined('ABSPATH')){
    die;
} */

defined('ABSPATH') or die('Hey you can\'t access this plugin\file ...');

/* if(!function_exists('add_action')){
    echo 'Hey you can\'t access this plugin\file ...';
    exit();
} */

class ZakariaPlugin{

    function __construct(){
        add_action( 'init', array( $this , 'custom_post_type'));
    }

    function activate(){
        // generate custom post type
        $this->custom_post_type(); // The Init Might Be Failed
        // flush rewrite rules
        flush_rewrite_rules( );
    }
    
    function deactivate(){
        // flush rewrite rules
        flush_rewrite_rules( );
    }

    function uninstall(){
        // delete CPT
        // delte all the plugin data from the DB
    }

    function custom_post_type(){
        register_post_type( 'book', ['public' => true, 'label' => 'books' ] );
    }
}

if( class_exists('ZakariaPlugin') ){

    $zakariaPlugin = new ZakariaPlugin();
}

// WHEN YOU USE PLUGIN, WORDPRESS TRIGER THREE ACTIONS

// activation
//register_activation_hook(__FILE__, 'functionName'); // Simple Function
register_activation_hook(__FILE__, array( $zakariaPlugin , 'activate')); // OOP Functions


// deactivation
register_deactivation_hook( __FILE__ , array( $zakariaPlugin , 'deactivate' ) );

// ununstall
