<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">
<header class="site-header" role="banner">
<div class="site-branding">
<?php if ( is_front_page() && is_home() ) : ?>
<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php else : ?>
<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
<?php endif; ?>


<?php if ( get_bloginfo( 'description' ) ) : ?>
<p class="site-description"><?php bloginfo( 'description' ); ?></p>
<?php endif; ?>
</div>
</header>


<main id="site-main" class="site-main" role="main">