<?php
/**
 * functions.php - thema-branding
 * Bahasa: Indonesia
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* Load CSS & JS */
function thema_branding_enqueue_assets(){
    // style utama (style.css)
    wp_enqueue_style( 'thema-branding-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );

    // AOS via CDN (animate on scroll)
    wp_enqueue_style( 'aos-css', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array(), '2.3.1' );
    wp_enqueue_script( 'aos-js', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), '2.3.1', true );

    // script utama
    wp_enqueue_script( 'thema-branding-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery','aos-js'), wp_get_theme()->get('Version'), true );

    // font (Poppins) — juga di-import di style.css, ini cadangan
    wp_enqueue_style( 'thema-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'thema_branding_enqueue_assets' );

/* Register menu */
function thema_branding_setup(){
    register_nav_menus( array(
        'primary' => __( 'Menu Utama', 'thema-branding' ),
    ) );
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'thema_branding_setup' );

/* Customizer: image hero & logo */
function thema_branding_customizer( $wp_customize ){
    // Setting hero image
    $wp_customize->add_section( 'thema_branding_hero' , array(
        'title'    => __('Gambar Hero', 'thema-branding'),
        'priority' => 30,
        'description' => __('Upload gambar hero (layar penuh). Jika kosong akan gunakan assets/images/hero.jpg', 'thema-branding'),
    ) );

    $wp_customize->add_setting( 'thema_branding_hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'thema_branding_hero_image', array(
        'label'    => __( 'Pilih Gambar Hero', 'thema-branding' ),
        'section'  => 'thema_branding_hero',
        'settings' => 'thema_branding_hero_image',
    ) ) );

    // Setting logo kecil
    $wp_customize->add_setting( 'thema_branding_logo', array('default'=>'') );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'thema_branding_logo', array(
        'label' => __('Logo Situs (kecil)', 'thema-branding'),
        'section' => 'title_tagline',
        'settings' => 'thema_branding_logo',
    ) ) );
}
add_action( 'customize_register', 'thema_branding_customizer' );
