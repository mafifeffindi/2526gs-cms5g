<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php endif; ?>
            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <?php
            // Menampilkan menu navigasi utama
            wp_nav_menu( array(
                'theme_location' => 'primary', // Lokasi menu yang akan kita daftarkan di functions.php
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </nav>
    </div>
</header>

<div id="content" class="site-content"></div>