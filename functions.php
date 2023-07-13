<?php
/**
 * Theme Functions
 * 
 * @package tomatotheme
 */

 function tomatotheme_enqueue_scripts() {

    //Register styles
    wp_register_style( 'style', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

    //Register scripts
    wp_register_script( 'main', get_template_directory_uri() . '/assets/main.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/main.js'), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', array( 'jquery' ), false, true );

    //Enqueue styles
    wp_enqueue_style('style');
    wp_enqueue_style('bootstrap-css');

    //Enqueue scripts
    wp_enqueue_script('main');
    wp_enqueue_script('bootstrap-js');

 }
 add_action( 'wp_enqueue_scripts', 'tomatotheme_enqueue_scripts');

 ?>