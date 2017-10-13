<?php
/**
 * Template Name: Full Width Template
 */

get_header(); 
global $writepress_data;
$blog_comments = isset($writepress_data["blog_comments"]) ? $writepress_data["blog_comments"] : 'on';
?>

<div class="container-main">
  <div class="container-padding">
  <div class="inner-content">
    <div id="primary" class="content-area">
      <div id="content" class="site-content" role="main">
        <?php /* The loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'writepress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
          </div>
          <!-- .entry-content -->
          <!-- .entry-meta --> 
        </article>
        <!-- #post -->
        <?php //Comments Area Start ?>
            <?php if($blog_comments == 'on'): ?>
				  <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }	
          		 ?>
                 <?php endif; ?>
          <?php //Comments Area End ?>
        <?php endwhile; ?>
      </div>
      <!-- #content --> 
    </div>
  </div>
  </div>
</div>
<?php get_footer(); ?>
