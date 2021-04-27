<?php

/**
 * @package ZakariaAzaraf
 */


/*
Plugin Name: curl remote request
Plugin URI: https://zakariaazaraf.github.io/#works
Description: this plugin test curl features
Version: 1.0.0
Author: Zakaria Azaraf
Author URI: https://zakariaazaraf.github.io
License: GPLv2 or later
Text Domain: zakariaazaraf-plugin
*/



// SOMEOEN HAVE ACCESS TO THIS PLUGIN OUTSIDE CMS, THIS CONST WONT'T BE DEFINED

defined('ABSPATH') or die('Hey you can\'t access this plugin\file ...');


add_shortcode( 'curl_wordpress', function (){
    $get = wp_remote_get( rest_url( 'wp/v2/posts' ) );
    
    $body = wp_remote_retrieve_body( $get );

    $data = json_decode($body, true);

    return print_r($data, true);
    
} );