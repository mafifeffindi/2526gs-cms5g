<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="post-meta">
                <small>Diposting pada <?php the_time('d M Y'); ?> oleh <?php the_author(); ?></small>
            </div>
            <div class="post-content">
                <?php the_excerpt(); ?>
            </div>
        </article>
        <hr>
    <?php endwhile; ?>
<?php else : ?>
    <p>Tidak ada posting ditemukan.</p>
<?php endif; ?>

<?php get_footer(); ?>
