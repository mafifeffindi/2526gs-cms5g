<?php
function riyan_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_sidebar(array(
        'name' => 'Sidebar Utama',
        'id' => 'main-sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}
add_action('after_setup_theme', 'riyan_setup');

function riyan_enqueue_styles() {
    wp_enqueue_style('riyan-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'riyan_enqueue_styles');
