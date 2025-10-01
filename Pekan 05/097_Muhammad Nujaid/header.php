<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Hook penting, jangan dihapus! ?>
</head>
<body <?php body_class(); ?>>

<div class="container">
    <header class="site-header">
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
    </header>