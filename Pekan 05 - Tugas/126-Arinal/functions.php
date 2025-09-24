<?php

/**
 * Fungsi untuk setup theme Arinal.
 */
function arinal_theme_setup() {
    // Menambahkan dukungan untuk judul halaman dinamis
    add_theme_support( 'title-tag' );

    // Menambahkan dukungan untuk Custom Logo
    add_theme_support( 'custom-logo', [
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ] );

    // Menambahkan dukungan untuk Post Thumbnails (Featured Image)
    add_theme_support( 'post-thumbnails' );

    // Mendaftarkan lokasi menu navigasi
    register_nav_menus( [
        'primary' => __( 'Primary Menu', 'arinal' ),
    ] );
}
add_action( 'after_setup_theme', 'arinal_theme_setup' );

/**
 * Memuat stylesheet dan font.
 */
function arinal_enqueue_scripts() {
    // Memanggil Google Fonts (Poppins dan Lato)
    wp_enqueue_style( 'arinal-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Lato:wght@400;700&display=swap', [], null );

    // Memanggil style.css dari folder theme
    wp_enqueue_style( 'arinal-style', get_stylesheet_uri(), array(), filemtime( get_template_directory() . '/style.css' ) );
}
add_action( 'wp_enqueue_scripts', 'arinal_enqueue_scripts' );


// --- TAMBAHKAN KODE BARU DI BAWAH INI ---

/**
 * Mendaftarkan area widget (sidebar).
 */
function arinal_widgets_init() {
    register_sidebar( [
        'name'          => __( 'Main Sidebar', 'arinal' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Tambahkan widget di sini untuk menampilkannya di sidebar utama.', 'arinal' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ] );
}
add_action( 'widgets_init', 'arinal_widgets_init' );

?>