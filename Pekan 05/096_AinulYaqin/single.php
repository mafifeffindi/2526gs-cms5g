<?php get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <p><small>Diposting pada <?php the_time('d F Y'); ?> oleh <?php the_author(); ?></small></p>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
