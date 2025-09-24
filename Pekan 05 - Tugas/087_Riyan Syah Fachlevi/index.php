<?php get_header(); ?>

<div class="container">
    <main>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if (has_post_thumbnail()) the_post_thumbnail('medium'); ?>
                <div><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; else : ?>
            <p>Postingan tidak ditemukan.</p>
        <?php endif; ?>
    </main>

    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
