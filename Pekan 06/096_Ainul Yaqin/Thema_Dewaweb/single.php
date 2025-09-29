<?php get_header(); ?>

<main class="wrap">
  <section class="content-area content-thin">
    <?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article <?php post_class('article-full'); ?>>
        <header>
          <h2><?php the_title(); ?></h2>
          <div class="meta">Oleh: <?php the_author(); ?> — <?php the_time('j F Y'); ?></div>
        </header>
        <div class="post-content">
          <?php the_content(); ?>
        </div>
      </article>

      <?php
      // simple post navigation
      the_post_navigation( array(
        'prev_text' => '&laquo; %title',
        'next_text' => '%title &raquo;',
      ) );
      ?>

    <?php endwhile; else : ?>
      <article class="article-full">
        <p>Maaf, halaman tidak ditemukan!</p>
      </article>
    <?php endif; ?>
  </section>

  <?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>
