<?php
get_header(); 
include get_template_directory().'/framework/variables/variables-archive.php';
$sidebar_position_class = writepress_archive_sidebar_class('show','hide');
?>
<!-- Container Main Start-->
<div class="container-main blog_layout <?php echo esc_attr($sidebar_position_class);?>">
<div class="container-padding">
  <div class="zolo-container">
    <div class="inner-content">
      <div id="primary" class="content-area">
	<?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        $cur_user_id = $curauth->ID;
        
        $author_designation = get_user_meta($curauth->ID, 'author_title', true);
        
        $author_facebook = get_user_meta($curauth->ID, 'author_facebook', true);
        $author_gplus = get_user_meta($curauth->ID, 'author_gplus', true);
        $author_instagram = get_user_meta($curauth->ID, 'author_instagram', true);
        $author_linkedin = get_user_meta($curauth->ID, 'author_linkedin', true);
        $author_pinterest = get_user_meta($curauth->ID, 'author_pinterest', true);
        $author_twitter = get_user_meta($curauth->ID, 'author_twitter', true);
        $author_vk = get_user_meta($curauth->ID, 'author_vk', true);
        $author_youtube = get_user_meta($curauth->ID, 'author_youtube', true);
        $user_email = get_the_author_meta( 'user_email' );
        ?>
        <?php if($curauth->user_description){ ?>
        <div class="author-info">             
          
            <div class="author-description">
                <div class="author-avatar">
					<?php		
                    $author_bio_avatar_size = apply_filters( 'writepress_author_bio_avatar_size', 74 );
                    echo get_avatar( $user_email, $author_bio_avatar_size );
                    ?>
                </div>
            <?php if($curauth->display_name){?><h2><?php echo esc_html($curauth->display_name); ?><?php if($author_designation){?><span class="author_designation"><?php echo esc_html($author_designation);?></span><?php }?></h2><?php }?>
            <div>
            <?php if($curauth->user_url){ ?><p><?php echo esc_html('Website:', 'writepress');?> <a href="<?php echo esc_url($curauth->user_url); ?>"><?php echo esc_url($curauth->user_url); ?></a> </p><?php } ?>
            <?php if($curauth->user_description){?><p><?php echo esc_html($curauth->user_description); ?></p><?php }?>
            </div>
            
            <ul class="zolo-author-social">
            <?php
            if($author_facebook){echo '<li class="facebook"><a target="_blank" title="Facebook" href="'.esc_url($author_facebook).'"><i class="fa fa-facebook"></i></a></li>';}
            if($author_gplus){echo '<li class="google-plus"><a target="_blank" title="GooglePlus" href="'.esc_url($author_gplus).'"><i class="fa fa-google-plus"></i></a></li>';}
            if($author_instagram){echo '<li class="instagram"><a target="_blank" title="Instagram" href="'.esc_url($author_instagram).'"><i class="fa fa-instagram"></i></a></li>';}
            if($author_linkedin){echo '<li class="linkedin"><a target="_blank" title="LinkedIn" href="'.esc_url($author_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';}
            if($author_pinterest){echo '<li class="pinterest"><a target="_blank" title="Pinterest" href="'.esc_url($author_pinterest).'"><i class="fa fa-pinterest"></i></a></li>';}
            if($author_twitter){echo '<li class="twitter"><a target="_blank" title="Twitter" href="'.esc_url($author_twitter).'"><i class="fa fa-twitter"></i></a></li>';}
            if($author_vk){echo '<li class="vk"><a target="_blank" title="VK" href="'.esc_url($author_vk).'"><i class="fa fa-vk"></i></a></li>';}
            if($author_youtube){echo '<li class="youtube-play"><a target="_blank" title="Youtube" href="'.esc_url($author_youtube).'"><i class="fa fa-youtube-play"></i></a></li>';}
            if($user_email){echo '<li class="user-mail"><a target="_blank" title="Email" href="mailto:'.esc_attr($user_email).'"><i class="fa fa-envelope-o"></i></a></li>';}
            ?>
            </ul>
            
            </div>
            
        </div>
        <?php } ?>
        <div id="content" class="site-content <?php echo esc_attr($blog_layout_masonry_class.' '.$blog_layout_column_class.' blog_layout_'.$blog_post_design);?>" role="main">
          <?php /* The loop */ ?>
          <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class( $masonry_item ); ?>>
            <div class="blogpage_content <?php echo esc_attr($posthasno_thumb);?>">
             
             	<?php if($post_title_position == 'above'){
               		 writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
                
       
				<?php  //if not quote Start 
                	writepress_archive_thumbnail_video();
                ?>
              
              <?php if($post_title_position == 'below'){
               		 writepress_entry_meta($post_meta,$format_quote, $post_title_alignment,$post_title_position);
                }?>
              
              <div class="blog_text_area">
                <div class="post-content">
             
             
            
                  <?php 
					//if not quote Start 
				   if ( $format_audio ){ ?>
                  <div class="entry-content">
                  <?php 
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                   		echo '<span class="zolo_zilla_likes_box"> ';
                    		zolo_zilla_likes();
                    	echo '</span>';
                    }
                    ?>
                    
                    <?php the_content(); ?>
                  </div>
                  <?php }elseif(!$format_quote){ ?>
                  
                  <div class="entry-content">
                    <?php the_excerpt(); ?>
                  </div>
                  
                  <?php }else{ ?>
                  
                  <?php 
                    //zolo_zilla_likes
                    if( function_exists('zolo_zilla_likes') ){ 
                   		echo '<span class="zolo_zilla_likes_box"> ';
                    		zolo_zilla_likes();
                    	echo '</span>';
                    } ?>
                    
                  <a href="<?php the_permalink(); ?> ">
                  <?php the_content(); ?>
                  </a>
                  
                  <?php  }?>
                  
                  <!-- .entry-content -->
      
      			 <?php //if not quote Start
				   if (!$format_quote){
                    if($post_social_sharing_show_hide == 'show'){
					get_template_part('framework/social_sharing');
					}
					
				   }?>
                   
                </div>
              </div>
            </div>
            <?php if($post_separator_show_hide == 'show'){echo '<div class="post_separator"><img src="'.esc_url($writepress_data['post_separator_img']['url']).'" alt="'.esc_attr( get_bloginfo( 'name' ) ).'"/></div>';} ?>
            
          </article>
          <?php endwhile; ?>
        </div>
        <?php //writepress_paging_nav(); ?>
        <?php writepress_pagination(); ?>
        <?php else : ?>
        <div id="content" class="site-content" role="main">
          <?php get_template_part( 'content', 'none' ); ?>
        </div>
        <?php endif;?>
        
        <!-- #content --> 
      </div>
      <!-- #primary -->
      <?php 
	  writepress_archive_sidebar_class('hide','show');
	  ?>
      <!-- .widget-area --> 
    </div>
  </div>
</div>
</div>
<?php get_footer(); ?>
