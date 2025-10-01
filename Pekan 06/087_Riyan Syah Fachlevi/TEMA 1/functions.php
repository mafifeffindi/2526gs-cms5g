<?php
// Theme support
function pastel_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'pastel_theme_setup');

// Register menus
function pastel_theme_menus() {
  register_nav_menus([
    'primary' => __('Menu Utama', 'pastel-theme'),
    'footer'  => __('Menu Footer', 'pastel-theme'),
  ]);
}
add_action('init', 'pastel_theme_menus');
