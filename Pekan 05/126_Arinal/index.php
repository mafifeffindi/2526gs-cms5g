<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container">

            <?php
            // Memulai The Loop WordPress
            if ( have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

                        <header class="entry-header">
                            <h2>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                        </header>

                        <div class="post-meta">
                            <span>Ditulis pada: <?php the_date(); ?></span> |
                            <span>Oleh: <?php the_author(); ?></span>
                        </div>

                        <div class="entry-content">
                            <?php the_excerpt(); // Menampilkan ringkasan postingan ?>
                        </div>

                    </article>

                    <?php
                endwhile;

            else :
                // Pesan jika tidak ada postingan yang ditemukan
                echo '<p>Maaf, tidak ada postingan yang bisa ditampilkan.</p>';

            endif;
            ?>

        </div></main></div><?php get_sidebar(); ?>
<?php get_footer(); ?>