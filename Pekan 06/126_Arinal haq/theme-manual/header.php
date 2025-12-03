<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    
    <?php wp_head(); /* Hook wajib WP */ ?>
</head>

<body <?php body_class(); ?>>

<header>
    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
</header>

<div class="container"></div>