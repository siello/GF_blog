<?php
get_header(); 
global $writepress_data; 
$sidebar_position_class = writepress_search_sidebar_class('show','hide');
?>

<div class="container-main <?php if($sidebar_position_class){echo esc_attr($sidebar_position_class);}?>">
  <div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
      <div id="primary" class="content-area">
      <p><?php echo __("Если ничего не нашли, попробуйте другой запрос:", "writepress" ); ?></p>
      <?php get_search_form(); ?>
      
        <div id="content" class="site-content" role="main">
          <?php if ( have_posts() ) : ?>
          <?php /* The loop */ ?>
          <ul class="searchpage_list">
		  <?php while ( have_posts() ) : the_post(); ?>
          <li>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blogpage_content"> 
              
              <h3 class="entry-title with-bor"> <a href="<?php the_permalink(); ?>" rel="bookmark"><?php esc_attr(the_title()); ?></a></h3>
              <div class="post-bottom-info">
              <?php __('On','writepress');?>  <?php echo get_the_date(); ?> , <?php __('By','writepress');?>  <?php the_author(); ?>
              </div>
              
            </div>
          </article>
          </li>
          <?php endwhile; ?>
          </ul>
          <?php //writepress_paging_nav(); ?>
          <?php writepress_pagination(); ?>
          <?php endif; ?>
        </div>
        <!-- #content --> 
      </div>
      <!-- #primary -->
      
      <?php
		writepress_search_sidebar_class('hide','show');
	  ?>
    </div>
  </div>
  </div>
</div>
<?php get_footer(); ?>
