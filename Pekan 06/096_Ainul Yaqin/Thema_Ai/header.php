<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
  <div class="brand">
    <div class="logo-box">
      <?php
      $logo = get_theme_mod('thema_branding_logo');
      if ( $logo ) {
        echo '<img src="'.esc_url($logo).'" alt="'.esc_attr(get_bloginfo('name')).'" style="width:28px;height:28px;border-radius:6px;object-fit:cover;">';
      } else {
        echo 'De';
      }
      ?>
    </div>
    <div style="color:#fff;margin-left:8px;font-weight:700;"><?php bloginfo('name'); ?></div>
  </div>

  <nav class="main-nav" aria-label="Menu Utama">
    <?php
      wp_nav_menu( array(
        'theme_location' => 'primary',
        'container' => false,
        'menu_class' => '',
        'items_wrap' => '<ul>%3$s</ul>'
      ) );
    ?>
  </nav>
</header>
