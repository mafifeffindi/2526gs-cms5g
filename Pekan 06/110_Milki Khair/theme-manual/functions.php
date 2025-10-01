<?php
// load style.css
add_action('wp_enqueue_scripts', function () {
  wp_enqueue_style('main', get_stylesheet_uri(), [], null);
});

// register sidebar (kalau pakai sidebar.php)
add_action('widgets_init', function () {
  register_sidebar([
    'name'          => 'Primary Sidebar',
    'id'            => 'primary-sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ]);
});
