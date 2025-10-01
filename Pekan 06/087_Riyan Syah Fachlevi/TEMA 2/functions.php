<?php
function pastel_theme_setup() {
  register_nav_menus([
    'primary' => 'Menu Utama'
  ]);
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'pastel_theme_setup');

function pastel_theme_scripts() {
  wp_enqueue_style('pastel-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'pastel_theme_scripts');

function pastel_widgets_init() {
  register_sidebar([
    'name'          => 'Main Sidebar',
    'id'            => 'main-sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ]);
}
add_action('widgets_init', 'pastel_widgets_init');
