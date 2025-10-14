<?php get_header(); ?>

<div id="container">
  <div id="content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <small>Posted on <?php the_time('F j, Y'); ?> by <?php the_author(); ?></small>
      <
      <div>
        <?php the_excerpt(); ?>
      </div>
      <hr>
    <?php endwhile; else : ?>
      <p>No posts found.</p>
    <?php endif; ?>
  </div>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
