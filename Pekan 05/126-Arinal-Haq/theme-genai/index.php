<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php bloginfo( 'name' ); ?></title>
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body>

<header>
    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <p><?php bloginfo( 'description' ); ?></p>
</header>

<main>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p>Tidak ada konten ditemukan.</p>
    <?php endif; ?>
</main>

<footer>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
    <?php wp_footer(); ?>
</footer>

</body>
</html>