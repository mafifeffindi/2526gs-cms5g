<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Keamanan

// Setup theme
function themayaqin_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'themayaqin' ),
    ) );
}
add_action( 'after_setup_theme', 'themayaqin_setup' );

// Load CSS & JS
function themayaqin_scripts() {
    wp_enqueue_style( 'themayaqin-style', get_stylesheet_uri() );
    wp_enqueue_style( 'themayaqin-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0', 'all' );

    wp_enqueue_script( 'themayaqin-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'themayaqin_scripts' );
