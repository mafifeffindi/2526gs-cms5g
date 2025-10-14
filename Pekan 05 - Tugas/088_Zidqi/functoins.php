<?php
function classic_theme_setup() {
  register_sidebar(array(
    'name' => 'Main Sidebar',
    'id' => 'main-sidebar',
    'description' => 'Sidebar kanan untuk widget.',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'classic_theme_setup');
