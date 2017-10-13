<?php
include get_template_directory().'/framework/variables/variables-post-layout.php';
// post_title_position
$post_title_position = 'below';
	?>
<div class="container-main <?php writepress_sidebar_and_class('show','hide','post');?>">  
<div class="container-padding">
<div class="zolo-container">
    <div class="inner-content post_layout_style2">
      <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">
          <?php /* The loop */ ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( 'post' ); ?>>
            <div class="blogpage_content">

            <?php //Post Thumbnail Start  ?> 
			<?php  //if not quote Start 
			if (!$format_quote):
				if( ! post_password_required($post->ID) ):
					if( ( $featured_images_single == 'on' && $show_hide_featured != 'hide' ) || ( $featured_images_single == 'off' && $show_hide_featured == 'show' ) ):
						writepress_single_layout_thumbnail_video();
					endif;
				endif;
			endif; 
			?>
            <?php //Post Thumbnail End ?>
            <div class="single_post_content_wrapper">
            <div class="post_layout_content_area">
            <div class="post_layout_content">
            <?php if($post_title_position == 'below'){
               		 writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
                
                <div class="blog_text_area">
                    <div class="post-content">
                   
                        <div class="entry-content">
                       	<?php the_content( __( 'Подробнее <span class="meta-nav">&rarr;</span>', 'writepress' ) ); ?>
                       		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'writepress' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
                        </div>
                        <?php writepress_tags();?>
                    <!-- .entry-content -->
                    <!-- .entry-meta --> 
                    </div>
                </div>
            
			<?php //Share Box Start ?>
            <?php if( ( $social_sharing_box == 'on' && $show_hide_sharing != 'no' ) ||  ( $social_sharing_box == 'off' && $show_hide_sharing == 'yes' ) ): ?>
            <div class="share-box">
            <h4><?php echo ($sharing_social_tagline)? $sharing_social_tagline : '';?></h4>
            <?php writepress_social_sharing(); ?>
          </div>
            <?php endif; ?>
          <?php //Share Box End ?>
          
          
          <?php
            //Author Area Start
            writepress_author_info();
            //Author Area End  
            ?>
            
          <?php  //Related Post Start ?>
          
		<?php if( ( $related_posts == 'on' && $show_hide_related_posts != 'no' ) ||  ( $related_posts == 'off' && $show_hide_related_posts == 'yes' ) ): ?>
        <?php $related_post = writepress_get_related_posts($post->ID);  ?>
        
        <?php if($related_post->have_posts()){ ?>
          <div class="related_post_area">
          	<h3><?php echo __('Еще о здоровом питании', 'writepress'); ?></h3>
            <ul class="related_post_list">
              <?php while($related_post->have_posts()): $related_post->the_post(); ?>
              <li class="fitrow_col">
                <div class="entry-thumbnail"> 
                <?php 
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                   		echo '<span class="zolo_zilla_likes_box"> ';
                    		zolo_zilla_likes();
                    	echo '</span>';
                    }
                    ?>
                    
                	<a href="<?php the_permalink(); ?>">
                	<?php  if ( has_post_thumbnail() ) { the_post_thumbnail( 'writepress_thumb_blog_medium' ); } ?>
                	</a> 
                </div>
                <?php the_title( '<h4><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' ); ?>   
              </li>
              <?php endwhile;?>
            </ul>
          </div>
          <?php } ?>
          
            <?php endif; ?>
            <?php  //Related Post End ?>
          
          <?php //Comments Area Start ?>
          
          <?php if( ( $blog_comments == 'on' && $show_hide_post_comments != 'no' ) || ( $blog_comments == 'off' && $show_hide_post_comments == 'yes' ) ): ?>
				  <?php
				  	wp_reset_postdata();
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
        </article>
      </div>
      </div>
      <!-- #primary -->      
		 <?php writepress_sidebar_and_class('hide','show','post');?>
    </div>
  </div>
  </div>
<?php // Previous/next post navigation Start 
if($post_navigation_style == 'style1'){
	echo '<div class="zolo-container">';
}
if( ( $blog_pn_nav == 'on' && $show_hide_post_pagination != 'no' ) ||  ( $blog_pn_nav == 'off'  && $show_hide_post_pagination == 'yes' ) ):
writepress_single_page_nav();
endif;
if($post_navigation_style == 'style1'){
echo '</div>';
} 
// Previous/next post navigation End ?>	

</div>