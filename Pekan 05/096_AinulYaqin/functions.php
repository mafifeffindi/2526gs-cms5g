<?php
// Menambahkan dukungan title otomatis
add_theme_support( 'title-tag' );

// Menambahkan dukungan thumbnail
add_theme_support( 'post-thumbnails' );

// Register menu
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'themacms' ),
) );

// Register sidebar
function themacms_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Utama', 'themacms' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'themacms_widgets_init' );

// Load CSS & JS
function themacms_scripts() {
    wp_enqueue_style( 'themacms-style', get_stylesheet_uri() );
    wp_enqueue_style( 'themacms-custom', get_template_directory_uri() . '/assets/css/custom.css' );
    wp_enqueue_script( 'themacms-js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true );
}
add_action( 'wp_enqueue_scripts', 'themacms_scripts' );
