<?php get_header(); 
global $writepress_data;
$blog_comments = isset($writepress_data["blog_comments"]) ? $writepress_data["blog_comments"] : 'on';
$sidebar_position_class = writepress_page_sidebar_class('show','hide');
$show_hide_featured = get_post_meta($post->ID, 'zt_show_hide_featured', true ); 

?>
<!-- Container Main Start-->
<div class="container-main <?php if(isset($sidebar_position_class)){echo esc_attr($sidebar_position_class);}?>">
  <div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
    
      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          
              <?php //Post Thumbnail Start  ?>
              <?php if($show_hide_featured != 'hide'){ ?>
              	<?php writepress_single_layout_thumbnail_video();?>
              <?php } ?>
              <?php //Post Thumbnail eND  ?>
            
            <div class="entry-content">
			
              <?php the_content(); ?>
              <?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'writepress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
            </div>
            <!-- .entry-content -->
            <!-- .entry-meta --> 
          </article>
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
      <!-- #primary -->    
	<?php
    //Page sidebar
    writepress_page_sidebar_class('hide','show')
	?>    
    </div>
  </div>
  </div>
</div>
<?php //onepage();?>
<?php get_footer(); ?>
