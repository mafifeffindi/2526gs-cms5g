<?php
// functions.php - enqueue styles, register menu & sidebar
if ( ! function_exists( 'themaegiluy_setup' ) ) {
    function themaegiluy_setup() {
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    }
}
add_action( 'after_setup_theme', 'themaegiluy_setup' );

function themaegiluy_scripts() {
    wp_enqueue_style( 'themaegiluy-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'themaegiluy_scripts' );

function themaegiluy_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'themaegiluy' ),
    ) );
}
add_action( 'init', 'themaegiluy_register_menus' );

function themaegiluy_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Primary Sidebar', 'themaegiluy' ),
        'id'            => 'primary-sidebar',
        'description'   => __( 'Sidebar utama', 'themaegiluy' ),
        'before_widget' => '<aside class="widget">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'themaegiluy_widgets_init' );
