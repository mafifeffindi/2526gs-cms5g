<?php get_header(); ?>

<main class="wrap">
  <section class="content-area content-thin">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article <?php post_class('article-loop'); ?>>
        <header>
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="meta">Oleh: <?php the_author(); ?> — <?php the_time('j F Y'); ?></div>
        </header>
        <?php the_excerpt(); ?>
        <p><a class="read-more" href="<?php the_permalink(); ?>">Baca selengkapnya →</a></p>
      </article>
    <?php endwhile; else : ?>
      <article class="article-loop">
        <p>Maaf, tidak ada posting yang ditemukan!</p>
      </article>
    <?php endif; ?>
  </section>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
