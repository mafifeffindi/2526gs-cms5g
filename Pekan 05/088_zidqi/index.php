<?php
/**
* The main template file for the theme (index)
*/
get_header();
?>


<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
<header class="entry-header">
<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<div class="entry-meta">
<span class="posted-on"><?php echo get_the_date(); ?></span>
<?php if ( get_the_author_meta( 'display_name' ) ) : ?>
<span class="byline"> — <?php the_author(); ?></span>
<?php endif; ?>
</div>
</header>


<div class="entry-content">
<?php the_excerpt(); ?>
<p><a href="<?php the_permalink(); ?>">Read more</a></p>
</div>
</article>
<?php endwhile; ?>


<nav class="pagination">
<?php the_posts_pagination( array(
'mid_size' => 1,
'prev_text' => __( 'Previous', 'minimal-onecol' ),
'next_text' => __( 'Next', 'minimal-onecol' ),
) ); ?>
</nav>


<?php else : ?>
<article class="no-posts">
<h2><?php esc_html_e( 'Nothing Found', 'minimal-onecol' ); ?></h2>
<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'minimal-onecol' ); ?></p>
</article>
<?php endif; ?>


<?php get_footer(); ?>
