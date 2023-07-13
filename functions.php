<?php
/**
 * Theme Functions
 * 
 * @package tomatotheme
 */

 function tomatotheme_enqueue_scripts() {

    wp_register_style( 'style', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css'), 'all' );
    wp_register_script( 'main', get_template_directory_uri() . '/assets/main.js', array('jquery', ), filemtime( get_template_directory() . '/assets/main.js'), true );

    wp_enqueue_style('style');
    wp_enqueue_script('main');

 }
 add_action( 'wp_enqueue_scripts', 'tomatotheme_enqueue_scripts');

 ?>