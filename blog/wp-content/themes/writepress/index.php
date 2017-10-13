<?php get_header(); 
include get_template_directory().'/framework/variables/variables-blog.php';
?>
<!-- Container Main Start-->
<div class="container-main blog_layout <?php if($sidebar_position_class){echo esc_attr($sidebar_position_class);}?>">
  <div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
      <div id="primary" class="content-area">
        <?php if ( have_posts() ) : ?>
        <?php /* The loop */ ?>
        <div id="content" class="site-content <?php echo esc_attr($blog_layout_masonry_class.' '.$blog_layout_column_class.' blog_layout_'.$blog_post_design);?>" role="main">
          <?php while ( have_posts() ) : the_post(); 
		  include get_template_directory().'/framework/variables/variables-post-loop.php';
		  ?>      
          <article id="post-<?php the_ID(); ?>" <?php post_class( $masonry_item ); ?>>
            <div class="blogpage_content <?php echo esc_attr($posthasno_thumb);?>">
            
              <?php if($post_title_position == 'above'){
               		 writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
				<?php 	
                //if not quote Start
                if (!$format_quote && !$format_audio){
                	writepress_single_layout_thumbnail_video();
                }
                ?>
              <?php 
			  //Post Thumbnail End ?>
              
              <?php if($post_title_position == 'below'){
               		 writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
              <div class="blog_text_area">
                <div class="post-content">
					<?php 
                    //if quote Start 
                    if ( $format_quote){ 
                    echo '<div class="entry-content">';
                    
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                    echo '<span class="zolo_zilla_likes_box"> ';
                    zolo_zilla_likes();
                    echo '</span>';
                    }
                    
                    echo '<a href="'.esc_url(get_permalink()).'">';
                    the_content();
                    echo '</a>';
                    echo '</div>';
                    }elseif($format_audio){
                    echo '<div class="entry-content">';
                    the_content();
                    echo '</div>';
                    }else{
                    $post_content = the_excerpt();
                    $strip_shortcodes = strip_shortcodes($post_content);
                    }
                    ?>
                  
                  <!-- .entry-content -->
					<?php //if not quote Start
                    if (!$format_quote){
                    	if($post_social_sharing_show_hide == 'show'){
                    		get_template_part('framework/social_sharing');
                    	}
                    }
                    ?>
                </div>
              </div>
            </div>
            <?php if($post_separator_show_hide == 'show'){
				echo '<div class="post_separator"><img src="'.esc_url($writepress_data['post_separator_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/></div>';
				} ?>
          </article>
          <?php endwhile; ?>
        </div>
        <?php writepress_pagination(); ?>
        <?php else : ?>
        <div id="content" class="site-content" role="main">
          <?php get_template_part( 'content', 'none' ); ?>
        </div>
        <?php endif; ?>
        
        <!-- #content --> 
      </div>
      <!-- #primary --> 
      <!--Call Sidebar-->
      <?php get_sidebar(); ?>
    </div>
  </div>
  </div>
</div>
<?php get_footer(); ?>
