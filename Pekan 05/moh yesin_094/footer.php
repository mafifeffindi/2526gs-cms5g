<?php get_header(); // Memanggil file header.php ?>

<main id="content">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); // Memulai The Loop ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

                <h2 class="post-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <div class="post-content">
                    <?php the_content('Lanjutkan membaca...'); ?>
                </div>

            </article>

        <?php endwhile; ?>

    <?php else : ?>

        <p>Maaf, tidak ada postingan yang ditemukan.</p>

    <?php endif; ?>

</main>

<?php get_footer(); // Memanggil file footer.php ?>