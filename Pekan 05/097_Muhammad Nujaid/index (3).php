<?php

/**
 * Mendaftarkan stylesheet utama tema.
 */
function tema_saya_register_styles() {
    // get_stylesheet_uri() akan otomatis mengambil URL dari file style.css di root tema.
    wp_enqueue_style( 'tema-saya-style', get_stylesheet_uri() );
}

// Menjalankan fungsi di atas saat WordPress memuat script dan style
add_action( 'wp_enqueue_scripts', 'tema_saya_register_styles' );

?>