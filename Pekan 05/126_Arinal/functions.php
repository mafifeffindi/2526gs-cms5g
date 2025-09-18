<?php
/**
 * Fungsi dan definisi untuk tema Arinal.
 */

// 1. Fungsi Setup Tema
if ( ! function_exists( 'arinal_setup' ) ) {
    function arinal_setup() {
        // Menambahkan dukungan untuk judul dinamis
        add_theme_support( 'title-tag' );

        // Menambahkan dukungan untuk "Featured Image" (Gambar Unggulan)
        add_theme_support( 'post-thumbnails' );

        // Menambahkan dukungan untuk Custom Logo
        add_theme_support( 'custom-logo' );

        // Mendaftarkan lokasi menu navigasi
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'arinal' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'arinal_setup' );


// 2. Memuat (Enqueue) file CSS dan JavaScript
function arinal_scripts() {
    // Memuat file style.css utama
    wp_enqueue_style( 'arinal-style', get_stylesheet_uri() );

    // Jika Anda punya file JS, Anda bisa memuatnya seperti ini:
    // wp_enqueue_script( 'arinal-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'arinal_scripts' );


// 3. Mendaftarkan Area Widget (Sidebar)
function arinal_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'arinal' ),
        'id'            => 'sidebar-1', // ID ini harus sama dengan yang di sidebar.php
        'description'   => __( 'Tambahkan widget di sini.', 'arinal' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'arinal_widgets_init' );

?>