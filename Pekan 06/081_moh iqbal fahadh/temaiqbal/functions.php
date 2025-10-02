<?php
function bluesky_enqueue_styles() {
    wp_enqueue_style('bluesky-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'bluesky_enqueue_styles');
