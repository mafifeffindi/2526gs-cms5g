<?php get_header(); ?>

<main class="main-content">

    <?php 
    // Memulai The Loop WordPress
    if ( have_posts() ) : 
        while ( have_posts() ) : the_post(); 
    ?>

        <article class="post">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <small>Ditulis pada <?php the_time('F j, Y'); ?> oleh <?php the_author(); ?></small>
            
            <div class="entry-content">
                <?php the_excerpt(); // Menampilkan ringkasan artikel ?>
            </div>
            <hr>
        </article>

    <?php 
        endwhile; 
    else : 
    ?>
        <p>Belum ada postingan yang ditemukan.</p>
    <?php endif; ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>