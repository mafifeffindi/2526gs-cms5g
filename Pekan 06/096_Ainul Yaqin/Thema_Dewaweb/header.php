<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="site-header wrap" role="banner">
    <div class="site-branding">
      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
      <p class="site-desc"><?php bloginfo('description'); ?></p>
    </div>

    <nav class="site-nav" role="navigation" aria-label="Primary Menu">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'container' => false,
          'menu_class' => '',
          'fallback_cb' => 'wp_page_menu',
        ) );
      } else {
        // fallback: show pages
        wp_page_menu( array( 'show_home' => true ) );
      }
      ?>
    </nav>
  </header>
