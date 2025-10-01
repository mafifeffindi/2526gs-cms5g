
<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header class="site-header">
    <div class="container navbar">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="brand">
        <span class="dot" aria-hidden="true"></span>
        <span><?php bloginfo('name'); ?></span>
      </a>
      <nav class="nav">
        <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '%3$s',
            'fallback_cb' => false
          ]);
        ?>
        <a class="btn alt" href="#order">Beli sekarang</a>
      </nav>
    </div>
  </header>
  <main>
