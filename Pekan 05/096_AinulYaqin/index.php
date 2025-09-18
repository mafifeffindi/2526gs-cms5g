<?php get_header(); ?>

<div class="container">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><small>Diposting pada <?php the_time('d F Y'); ?> oleh <?php the_author(); ?></small></p>
                <div><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>">Baca Selengkapnya</a>
            </article>
        <?php endwhile; ?>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p>Tidak ada postingan ditemukan.</p>
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
