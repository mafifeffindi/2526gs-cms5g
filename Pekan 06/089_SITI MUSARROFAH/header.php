<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header>
  <div class="container">
    <h1><?php bloginfo('name'); ?></h1>
    <p><?php bloginfo('description'); ?></p>
    <nav>
      <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'container' => false,
        'items_wrap' => '<ul>%3$s</ul>'
      )); ?>
    </nav>
  </div>
</header>
<div class="container">
