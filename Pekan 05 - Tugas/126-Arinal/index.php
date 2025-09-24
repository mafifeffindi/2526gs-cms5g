<?php get_header(); ?>

<div class="container site-content-wrapper">

    <main id="main" class="main-content">

        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                    
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('large'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-content">
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                        </header>

                        <div class="post-meta">
                            <span>Ditulis pada <?php echo get_the_date(); ?></span> | <span>Oleh <?php the_author_posts_link(); ?></span>
                        </div>

                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="read-more-btn">Baca Selengkapnya</a>

                    </div>

                </article>
                <?php
            endwhile;
        else :
            echo '<p>Maaf, tidak ada postingan yang cocok.</p>';
        endif;
        ?>

    </main>

    <?php get_sidebar(); // Memanggil sidebar ?>

</div>

<?php get_footer(); ?>